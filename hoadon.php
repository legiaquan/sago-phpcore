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

$id_hoadon = isset($_GET['id_hoadon'])?$_GET['id_hoadon']:"";
if($id_hoadon=="")
	header('location:index.php');
echo $id_hoadon;
//truyvansql hoadon
$sql_hd="SELECT * FROM tbhoadon WHERE id_hoadon = '$id_hoadon'";
$data_hd = $o->query($sql_hd);
$arrHD = $data_hd->fetchAll();
//truyvansql cthd
$sql_cthd="SELECT tbsanpham.tensp, tbchitiethoadon.id_sanpham, tbchitiethoadon.id_hoadon, tbchitiethoadon.soluong, tbchitiethoadon.gia FROM tbchitiethoadon INNER JOIN tbsanpham ON tbchitiethoadon.id_sanpham = tbsanpham.id_sanpham";
$data_cthd = $o->query($sql_cthd);
$arrCTHD = $data_cthd->fetchAll();
//
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
						<h3 class="breadcrumb-header">Sago Order</h3>
						<ul class="breadcrumb-tree">
							<li><a href="index.php">Trang chủ</a></li>
							<li class="active">Hóa đơn của bạn</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->
		
		<!-- SECTION -->
		<section id="contact-page">
        <div class="container">
            <div class="center" align="center">        
                <h2>Hóa đơn</h2>
                <hr>
                <?php
                	foreach ($arrHD as $key => $v) {
                		# code...
                	
                ?>
                <p  style="font-style: italic;">Cảm ơn quý khách đã đặt hàng thành công!</p>
                <span style="left: 35%;position:absolute"><b>Mã hóa đơn:</b></span><span style="right: 35%;position:absolute"><?php echo $v['id_hoadon']; ?></span><br>
                <span style="left: 35%;position:absolute"><b>Ngày đặt:</b></span><span style="right: 35%;position:absolute"><?php echo $v['ngaydat']; ?></span><br>
                <span style="left: 35%;position:absolute"><b>Tên khách hàng:</b></span><span style="right: 35%;position:absolute"><?php echo $v['tennguoinhan']; ?></span><br>
                <span style="left: 35%;position:absolute"><b>Địa chỉ nhận hàng:</b></span><span style="right: 35%;position:absolute"><?php echo $v['diachinguoinhan']; ?></span><br>
                <span style="left: 35%;position:absolute"><b>Số điện thoại:</b></span><span style="right: 35%;position:absolute"><?php echo $v['sdtnguoinhan']; ?></span><br>
                <span style="left: 35%;position:absolute"><b>Ghi chú:</b></span><span style="right: 35%;position:absolute"><?php echo $v['ghichu']; ?></span><br>
            <?php }?>
                <span style="left: 35%;position:absolute"><b>Sản phẩm:</b></span><br>
                <?php
                $tonggia=0;
                foreach ($arrCTHD as $key => $value) {
                	if($value['id_hoadon']==$id_hoadon){
                ?>
                    <span style="left: 37%;position:absolute"><i>+ <?php echo $value['tensp']?></i><i style="color: red"> x<?php echo $value['soluong'];?></i></span><span style="right: 35%;position:absolute"><?php
                    $tinhgia=$value['gia']*$value['soluong'];
                    dinhdangso($tinhgia);?></span><br>
                     
                  <?php 
                  $tonggia+=$tinhgia;
              }}?>
                <span style="left: 35%;position:absolute"><b>Tổng giá:</b></span><span style="right: 35%;position:absolute"><b><?php echo dinhdangso($tonggia);?> VND</b></span><br><br>
                <span  style="left: 35%;position:absolute"><i><a href="index.php">Tiếp tục mua sắm</a></i></span>
                
                <br>
                <hr>
                

            </div> 

            
            <!--/.row-->
        </div><!--/.container-->
    </section><<!--/#contact-page-->
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
