<?php
		if (!isset($_SESSION)) session_start();
	include "../include/connect.php";
	$idsp = isset($_GET['idsp'])?$_GET['idsp']:'';
	$thaotac = isset($_GET['thaotac'])?$_GET['thaotac']:'';
	//echo "$idsp <br>$thaotac";
	//print_r($_SESSION['giohang']);
	$arrGiohang=$_SESSION['giohang'];
	//echo $arrGiohang[$idsp];
	if($arrGiohang[$idsp]==1 && $thaotac=='giam'){
		unset($arrGiohang[$idsp]);
	}
	else if($arrGiohang[$idsp]>=1 && $thaotac=='tang')
		$arrGiohang[$idsp] ++;
	else if($arrGiohang[$idsp]>=1 && $thaotac=='giam')
		$arrGiohang[$idsp] --;
	$_SESSION['giohang']=$arrGiohang;
	header('location:../checkout.php');
?>