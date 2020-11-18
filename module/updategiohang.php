<?php
	if (!isset($_SESSION)) session_start();
	if (!isset($_SESSION['giohang'])) $_SESSION['giohang'] = array();
	$id= isset($_GET['id'])?$_GET['id']:"";
	$sl = isset($_GET['soluong'])?$_GET['soluong']:1;
	echo "ma san pham la: $id, so luong: $sl";

	$tam = $_SESSION['giohang'];
	if (!isset($tam[$id])) $tam[$id] = $sl;
	else $tam[$id]+=$sl;
	$_SESSION['giohang']= $tam;
	//header('location:../index.php');
	//$_SERVER['HTTP_REFERER']: xác định địa chỉ người dùng bắt nguồn từ đâu
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit();
	