<?php
if(!isset($_SESSION)) session_start();
if (!isset($_SESSION['userdangnhap']))
{
header("location:../module/signup.php");exit;

}
if (count($_SESSION['giohang'])<1)
{
header("location:../checkout.php?error=0sp");exit;

}
//
$id_user = $_SESSION['userdangnhap']['id_user'];

  $id_hoadon = time() ."_". $id_user;
  $ngaydat = Date("Y-m-d");
  $hoten  = $_POST['hoten'];
  $diachi =  $_POST['diachi'];
  $sdt =  $_POST['sdt'];
  $ghichu= $_POST['ghichu'];
  

  	$o = new PDO('mysql:host=localhost; dbname=dbsago', 'root', '');
	$o->query("set names 'utf8' ");
	/*include "include/connect.php";*/
	$sql_ctgh ="insert into tbhoadon (id_hoadon, id_user, ngaydat,tennguoinhan,diachinguoinhan,sdtnguoinhan, tinhtrang,ghichu) VALUES ('$id_hoadon','$id_user','$ngaydat','$hoten','$diachi',$sdt,'pending','ghichu')";

	$o->query($sql_ctgh);
	

	foreach ($_SESSION['giohang'] as $key => $value) {
		$sql_dh ="select * from tbsanpham where id_sanpham='$key' ";
		$data_dh = $o->query($sql_dh);
		$arrDH = $data_dh->fetchAll();
		$id_sanpham = $key;
		$soluong = $value;
		$gia = $arrDH[0]['gia']*(100-$arrDH[0]['khuyenmai'])/100;
		echo "$gia";
		$sql ="insert into tbchitiethoadon (id_hoadon, id_sanpham, soluong, gia) VALUES ('$id_hoadon', '$id_sanpham', $soluong, $gia)";
		$o->query($sql);
	}
	unset($_SESSION['giohang']);
	header("location:../hoadon.php?id_hoadon=$id_hoadon");exit;
?>
