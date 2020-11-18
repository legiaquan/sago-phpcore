<?php
if (!isset($_SESSION)) session_start();
$u = isset($_POST['u'])?$_POST['u']:'';
$p = isset($_POST['p'])?md5($_POST['p']):'';

$smlogin = isset($_POST['smuserdangnhap'])?$_POST['smuserdangnhap']:'';
echo "tai khoan: $u, mật khẩu:$p, submit: $smlogin ";
/*if ($login!= 'userdangnhap' || $u=='') 
	{
		header('location:../dangnhap.php'); exit;
	}
*/
/*
$o = new PDO("mysql:host=localhost; dbname=dbsago", "root", "");
//Hien thi tieng viet co dau
$o->query("set names 'utf8' ");
*/
include "../include/connect.php";
$sql ="select id_user,pass,hoten from tbthanhvien where id_user='$u' and pass='$p'";
$data = $o->query($sql);

if ($data->rowCount()>0)
{
	//$arr = $data->fetchAll(PDO::FETCH_ASSOC);
	$arr = $data->fetchAll();
	$_SESSION['userdangnhap'] = $arr[0];
	header('location:../index.php');
}
else header('location:../dangnhap.php');
