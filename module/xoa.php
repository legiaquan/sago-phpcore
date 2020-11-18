<?php

//Ket noi csdl
//$o = new PDO("mysql:host=localhost; dbname=dbsago", "root", "");
//Hien thi tieng viet co dau
//$o->query("set names 'utf8' ");
include "../include/connect.php";
if (!isset($_SESSION)) session_start();
$id = $_GET['id'];
unset($_SESSION['giohang'][$id] );
//header('location:../index.php');
header('Location: ' . $_SERVER['HTTP_REFERER']);

