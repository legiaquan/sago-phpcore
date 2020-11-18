<?php
	include "../include/connect.php";
	$id_user=$_SESSION['userdangnhap']['id_user'];
	$sql_thongtin="select * from tbthanhvien where id_user='$id_user'";
	$data_thongtin=$o->query($sql_thongtin);
	$arrThongtin=$data_thongtin->fetchAll(PDO::FETCH_ASSOC);
	$pass = isset($_GET['pass'])?md5($_GET['pass']):"";
	$pass1 = isset($_GET['pass1'])?md5($_GET['pass1']):"";
	$pass1re = isset($_GET['pass1re'])?md5($_GET['pass1re']):"";
	echo "$pass<br>$pass1<br>$pass1re<br>";
	$errorpass="";
	$errorpassre="";
	foreach ($arrThongtin as $key => $value) {
		if($value['pass']!=$pass)
			echo $errorpass="saimk";
		if($pass1 != $pass1re)
			echo $errorpassre="ktrung";
	}
	if($errorpass!=""||$errorpassre!="")
		header('location:../doimatkhau.php?errorpass=saimk');
	else{
		$id_user=$_SESSION['userdangnhap']['id_user'];
		$sql_update="update tbthanhvien set pass='$pass1' where id_user='$id_user'";
		$o->query($sql_update);
		header('location:../qltn.php?changemk=success');
	}
?>