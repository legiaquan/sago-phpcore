<?php
if (!isset($_SESSION)) session_start();
$u = isset($_POST['username'])?$_POST['username']:'';
$p = isset($_POST['password'])?md5($_POST['password']):'';

$smlogin = isset($_POST['smdangnhap'])?$_POST['smdangnhap']:'';
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
$sql ="SELECT* from tbadmin where id_admin='$u' and matkhau ='$p'";
$data = $o->query($sql);

if ($data->rowCount()>0)
{
	//$arr = $data->fetchAll(PDO::FETCH_ASSOC);
	$arr = $data->fetchAll();
	$_SESSION['admindangnhap'] = $arr[0];
	header('location:../index.php');
}
else header('location:../dangnhap.php');
