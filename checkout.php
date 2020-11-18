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
//truyvansql
$sql="select * from tbsanpham";
$data = $o->query($sql);
$arrSanpham = $data->fetchAll();
//truy van thong tin khach
$sql_tv="select * FROM tbthanhvien";
$data_tv = $o->query($sql_tv);
$arrThanhvien = $data_tv->fetchAll();
//print_r($arrThanhvien);
//
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = array();
//print_r($_SESSION['giohang']);
if(!isset($_SESSION['userdangnhap']['hoten']))
	header("Location:../dangnhap.php?id_user=errorlogin");
//
$error = isset($_GET['error'])?$_GET['error']:'';
if($error == '0sp')
	echo "<script>alert('Chưa có sản phẩm nào trong giỏ hàng!');</script>";

function dinhdangso(&$number)
{
	$format_number = number_format($number, 0, '', '.');
	echo $format_number;
}
function km(&$gia,$km)
{
	$giamoi=$gia*(100-$km)/100;
	return $giamoi;
	
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
						<h3 class="breadcrumb-header">Giỏ hàng</h3>
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li class="active">Checkout</li>
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
				<form action="module/inhoadon.php" method="post">
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">

								<h3 class="title">Thông tin khách hàng</h3>
							</div>
							<?php
								foreach ($arrThanhvien as $key => $v) {
									if($v['id_user']==$_SESSION['userdangnhap']['id_user']){
									# code...
								
							?>
							<div class="form-group">
								<input class="input" type="text" name="hoten" placeholder="Họ" value="<?php echo $v['hoten'];?>">
							</div>
							
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email" value="<?php echo $v['email'];?>">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="diachi" placeholder="Địa chỉ nhận hàng" value="<?php echo $v['diachi'];?>">
							</div>
							
							<div class="form-group">
								<input class="input" type="tel" name="sdt" placeholder="Số điện thoại" value="<?php echo $v['sdt'];?>">
							</div>
							
							<div class="form-group">
								<input class="input" type="text" name="ghichu" placeholder="Ghi chú đơn hàng" value="">
							</div>
						<?php }}?>
						</div>
						<!-- /Billing Details -->

					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Thông tin giỏ hàng</h3>
						</div>

						<div class="order-summary">
							<div class="order-col">
								<div><strong>Tên sản phẩm</strong></div>
								<div style="right: 35%;position: absolute;" ><strong>Số lượng</strong></div>
								<div><strong>Giá</strong></div>
							</div>
							
							<div class="order-products">
								<!--/sanphamgiohang-->
								<?php
								$sumgia=0;
								foreach ($_SESSION['giohang'] as $key => $value) {
									$sql ="select * from tbsanpham where id_sanpham='$key' ";
									$data = $o->query($sql);
									$arr = $data->fetchAll();
									$id = $arr[0]['id_sanpham'];
									$ten = $arr[0]['tensp'];
									$gia = $arr[0]['gia'];
									$giasp=km($gia,$arr[0]['khuyenmai'])*$value;
									?>
								<div class="order-col">
									<div><a href="product.php?id=<?php echo $id; ?>"><?php echo $ten; ?></a><a style="color: red; font-size: 12px"> </a></div>
									<div style="right: 39%;position: absolute;" ><a href="module/xulysoluong.php?idsp=<?php echo $key;?>&thaotac=giam" style="font-size: 20px">-</a><?php echo $value;?><a href="module/xulysoluong.php?idsp=<?php echo $key;?>&thaotac=tang" style="font-size: 20px">+</a></div>
									<div ><?php echo dinhdangso($giasp); ?> VND</div>
								</div>
								<!--/sanphamgiohang-->
								<?php $sumgia+=$giasp; }?>
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total"><?php echo number_format($sumgia);?>VND</strong></div>
							</div>
						</div>
						<hr>
						<!--
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									Direct Bank Transfer
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2">
								<label for="payment-2">
									<span></span>
									Cheque Payment
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3">
								<label for="payment-3">
									<span></span>
									Paypal System
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
						</div>
						<hr>
					
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								Xác nhận thanh toán
							</label>
						</div>
					-->
						<input style="float: right;" type="submit" name="smdh" class="primary-btn order-submit"  value="Đặt hàng">
					</div>
					<!-- /Order Details -->
				</div>
			</form>
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