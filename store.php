<?php
/*
//Ket noi csdl
$o = new PDO("mysql:host=localhost; dbname=dbsago", "root", "");
//Hien thi tieng viet co dau
$o->query("set names 'utf8' ");
//khoi tao session
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = array();
*/
include "include/connect.php";
//truyvansql sanpham
$sql_sp="select * from tbsanpham";
$data_sp = $o->query($sql_sp);
$arrSanpham = $data_sp->fetchAll();
//truyvansql nhomsp
$sql_Nhomsp = "select * from tbnhomsanpham";
$data_Nhomsp = $o->query($sql_Nhomsp);
$arrNhomsp = $data_Nhomsp->fetchAll();
//truyvansql hangdt
$sql_Hangdt = "select * from tbhangdt";
$data_Hangdt = $o->query($sql_Hangdt);
$arrHangdt = $data_Hangdt->fetchAll();
//error
$checkloi=isset($_GET['error'])?($_GET['error']):"";
function dinhdangso(&$number)
{
	$format_number = number_format($number, 0, '', '.');
	echo $format_number;
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>SagoPhone - Cửa hàng điện thoại chính hãng</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<?php
			include "include/header.php"
		?>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<?php include "include/menu.php" ?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Trang chủ</a></li>
							<li class="active">Sản phẩm</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">BỘ LỌC</h3>
							<!--Nhóm product -->
							<?php 
							$i=1;
								foreach ($arrNhomsp as $key => $v) {
							?>
							<div class="checkbox-filter">
								<div class="input-checkbox"><a ></a>
									<input type="checkbox" id="category-<?php echo $i; ?>">
									<label for="category-<?php echo $i; ?>">
										<span></span>
										<a href="boloc.php?id_nhom=<?php echo $v['id_nhom'];?>"><?php echo $v['tennhom'];?></a>
									</label>

								</div>
							</div>
							<!--/Nhóm product -->
						<?php $i++;} ?>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">GIÁ</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<form action="boloc.php" method="get">
								<div class="input-number price-min">
									<input  type="number" name="giamin" placeholder="₫ Từ">
									
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input  type="number" name="giamax" value="" placeholder="₫ Đến">
									
								</div>
								<?php
									if($checkloi=="loigia"){

								?>
								<i style="color: red">Vui lòng điền giá phù hợp</i>
								<br>
							<?php } ?>
								<div class="input-number price-max">
									<input  type="submit" class="primary-btn order-submit" value="Áp dụng">
									
								</div>

								</form>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">HÃNG</h3>
							<div class="checkbox-filter">
								<?php
								$i=1;
								foreach ($arrHangdt as $key => $v) {
									# code...
								?>
								<div class="input-checkbox">
									<input type="checkbox" id="brand-<?php echo $i; ?>">
									<label for="brand-<?php echo $i; ?>">
										<span></span>
										<a href="boloc.php?id_hangdt=<?php echo $v['id_hangdt'];?>"><?php echo $v['tenhang']; ?></a>
									</label>
								</div>
								<?php $i++; } ?>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">BÁN CHẠY</h3>
							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product01.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product02.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>

							<div class="product-widget">
								<div class="product-img">
									<img src="./img/product03.png" alt="">
								</div>
								<div class="product-body">
									<p class="product-category">Category</p>
									<h3 class="product-name"><a href="#">product name goes here</a></h3>
									<h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label><!--
									Sắp xếp:
									<select class="input-select">
										<option value="0">Yêu thích</option>
										<option value="1">Giá tăng</option>
										<option value="1">Giá giảm</option>
									</select>
								</label>-->
								<!--
								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							-->
							</div>
							
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
							<!-- product -->
							<?php
								foreach ($arrSanpham as $key => $v) {
									
								
							?>
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="img/<?php echo $v['hinhsp'];?>" alt="">
										<div class="product-label">
											<span class="sale">-<?php echo $v['khuyenmai']; ?>%</span>
											<span class="new">NEW</span>
										</div>
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?id=<?php echo $v['id_sanpham'];?>"><?php echo $v['tensp']; ?></a></h3>
										<h4 class="product-price"><?php 
													$giacu=$v['gia']*(100-$v['khuyenmai'])/100;
													echo dinhdangso($giacu);
												 ?> VND <del class="product-old-price">
												<?php echo dinhdangso($v['gia']); ?>
												 </del></h4>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<a href="module/updategiohang.php?id=<?php echo $v['id_sanpham']; ?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button></a>
									</div>
								</div>
							</div>
													<?php  }?>

							<!-- /product -->
							

							
							<!-- /product -->
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">SagoPhone <?php $demsp=count($arrSanpham);
							echo $demsp;
							?></span>
							<ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->

		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<?php include "include/footer.php"?>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
