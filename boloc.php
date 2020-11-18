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
/*Chuc nang loc*/
/*Chuc nang loc nhom*/

$checkNhom=isset($_GET['id_nhom'])?($_GET['id_nhom']):"";
//echo "nhom da chon la: $checkNhom";
//truy van loc nhom
if($checkNhom != ""){
	$sql_locnhom="select tbsanpham.id_sanpham, 	tbnhomsanpham.id_nhom, 	tbnhomsanpham.tennhom, 	tbsanpham.id_nhom, 	tbsanpham.tensp, 	tbsanpham.mota, 	tbsanpham.hinhsp, 	tbsanpham.gia, 	tbsanpham.soluong, 	tbsanpham.khuyenmai FROM 	tbsanpham 	INNER JOIN tbnhomsanpham ON tbsanpham.id_nhom = tbnhomsanpham.id_nhom 	INNER JOIN tbhangdt ON tbsanpham.id_hangdt = tbhangdt.id_hangdt  WHERE 	tbnhomsanpham.id_nhom = $checkNhom";
	$data_locnhom = $o->query($sql_locnhom);
	$arrLoc = $data_locnhom->fetchAll();
}
/*Chuc nang loc hangdt*/
$checkHangdt=isset($_GET['id_hangdt'])?($_GET['id_hangdt']):"";
//echo "hangdt da chon la: $checkHangdt";
//truy van loc nhom
if($checkHangdt != ""){
$sql_lochangdt="select tbhangdt.id_hangdt, tbhangdt.tenhang, tbsanpham.id_sanpham, tbsanpham.id_hangdt, tbsanpham.tensp, tbsanpham.mota, tbsanpham.hinhsp, tbsanpham.gia, tbsanpham.soluong, tbsanpham.khuyenmai FROM tbhangdt INNER JOIN tbsanpham ON tbsanpham.id_hangdt = tbhangdt.id_hangdt WHERE tbhangdt.id_hangdt = $checkHangdt";
	$data_lochangdt = $o->query($sql_lochangdt);
	$arrLoc = $data_lochangdt->fetchAll();
}
/*Chuc nang loc gia*/
$giamin = isset($_GET['giamin'])?($_GET['giamin']):0;
$giamax = isset($_GET['giamax'])?($_GET['giamax']):0;
//echo "$giamin <br>$giamax";
if($giamin>$giamax){
	header('location: store.php?error=loigia');
}
else if($giamax !=0){
	$sql_lochangdt="select * FROM tbsanpham WHERE gia>=$giamin and gia<=$giamax ORDER BY gia ASC";
	$data_lochangdt = $o->query($sql_lochangdt);
	$arrLoc = $data_lochangdt->fetchAll();
}
$dem=count($arrLoc);
//echo "<br>so san pham co trong mang la:$dem";
//print_r($arrLoc);
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
									if($v['id_nhom']==$checkNhom){
							?>
							<div class="checkbox-filter">
								<div class="input-checkbox"><a ></a>
									<input type="checkbox" id="category-1>" checked="">
									<label for="category-1">
										<span></span>
										<?php echo $v['tennhom'];?>
									</label>
								
								</div>
							</div>
							<?php } ?>
							<!--/Nhóm product -->
						<?php $i++;} ?>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<?php 
								if($giamax>0){
							?>
							<h3 class="aside-title">GIÁ</h3>
							<div class="price-filter">
								<form action="boloc.php" method="get">
								<div class="input-number price-min">
									<input  type="number" name="giamin" value="<?php echo $giamin?>" placeholder="₫ Từ">
									
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input  type="number" name="giamax" value="<?php echo $giamax?>" placeholder="₫ Đến">
									
								</div>
								
								
								<br>
						
								<div class="input-number price-max">
									<input  type="submit" class="primary-btn order-submit" value="Áp dụng">
									
								</div>

								</form>
							</div>
						<?php }?>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<?php
								$i=1;
								foreach ($arrHangdt as $key => $v) {
									if($v['id_hangdt']==$checkHangdt){
									# code...
								?>
							<h3 class="aside-title">HÃNG</h3>
							<div class="checkbox-filter">
								
								<div class="input-checkbox">
									<input type="checkbox" id="brand-<?php echo $i; ?>" checked="">
									<label for="brand-<?php echo $i; ?>">
										<span></span>
										<?php echo $v['tenhang']; ?>
									</label>
								</div>
								
							</div>
							<?php
								}	}# code...
								?>
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
								<label><!-- Nâng cấp
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
							if(count($arrLoc)<1){
								echo "<i style='color:red'>Không tìm thấy sản phẩm phù hợp với lựa chọn của bạn! Hãy thử lựa chọn khác</i><hr>";

							}

							if(isset($arrLoc)){
								foreach ($arrLoc as $key => $v) {
							
									
								
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
										<h3 class="product-name"><a href="product.php"><?php echo $v['tensp']; ?></a></h3>
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
										<a href="module/updategiohang.php?id=<?php echo $v['id_sanpham']; ?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
									</div>
								</div>
							</div>
													<?php  }}
													

							?>

							<!-- /product -->
							

							
							<!-- /product -->
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Trở lại <a href="store.php"><u>trang sản phẩm</u></a>
							</span>
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
