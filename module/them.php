<?php

//Ket noi csdl
$o = new PDO("mysql:host=localhost; dbname=dbsago", "root", "");
//Hien thi tieng viet co dau
$o->query("set names 'utf8' ");
$id = $_GET['id'];
echo "id la: $id";
$sql="insert into tbgiohang(`id_user`,`id_sanpham`,`soluong`) values('quan',$id,1)";
$o->query($sql);
header('location:../index.php');