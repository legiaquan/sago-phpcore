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
//truyvantaikhoan
$id_user=$_SESSION['userdangnhap']['id_user'];
$sql_thongtin="select * from tbthanhvien where id_user='$id_user'";
$data_thongtin=$o->query($sql_thongtin);
$arrThongtin=$data_thongtin->fetchAll(PDO::FETCH_ASSOC);
//error
$errorpass=isset($_GET['errorpass'])?$_GET['errorpass']:"";
//echo $errorpass;
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
							<h3 class="aside-title">Quản lý tài khoản</h3>
							<!--qltk -->
							
							<div class="checkbox-filter">
								<div class="input-checkbox"><a ></a>
									
									<label for="category-1>">
										<a href="qltn.php">Chào bạn: <?php echo $_SESSION['userdangnhap']['hoten'];?>!
										</a>
									</label>
									<br>
									

								</div>
							</div>
							<!--/qltk -->
				
						</div>
						
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div>
							<h3>Thay đổi mật khẩu<span style="font-weight: normal;font-size: 15px"></span></h3>
							<!--<span style="left: 5%;position:absolute"><input type="text" name /></span><span style="right: 50%;position:absolute"> 01628248594</span><br>
			                <span style="left: 5%;position:absolute">chks.sago@gmail.com</span></span><span style="right: 50%;position:absolute">67/10 Đình Nghi Xuân	</span><br>-->
			                <form action="module/xuly_doimk.php" method="get">
			                	<?php
			                		if($errorpass=="saimk"){
			                			?>
			                			<p style="color: red"><i>Sai mật khẩu hoặc nhập không trùng khớp!</i></p>
			                		<?php } ?>
			                	<?php foreach ($arrThongtin as $key => $value) {
			                		# code...
			                	}?>
			                	Mật khẩu cũ: <input class="form-control"  style="width: 200px;left: 1%;position:absolute" type="password" name="pass" value="">
			                	<br><br><br>
			                	Mật khẩu mới: <input class="form-control"  style="width: 200px;left: 1%;position:absolute" type="password" name="pass1" value=""><br><br><br>
			                	Nhập lại mật khẩu mới: <input class="form-control"  style="width: 200px;left: 1%;position:absolute" type="password" name="pass1re" value=""><br><br><br><br>
			                	<input class="btn btn-primary btn-lg" type="submit" name="smedit" value="Lưu thay đổi" />

			                </form>
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
