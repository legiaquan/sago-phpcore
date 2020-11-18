<?php
	include "../include/connect.php";
	$id_sanpham=isset($_GET['id_sanpham'])?$_GET['id_sanpham']:"";
	$tensp=isset($_GET['tensp'])?$_GET['tensp']:"";
	$id_hangdt=isset($_GET['id_hangdt'])?$_GET['id_hangdt']:0;
	$id_nhom=isset($_GET['id_nhom'])?$_GET['id_nhom']:0;
	$gia=isset($_GET['gia'])?$_GET['gia']:0;
	$soluong=isset($_GET['soluong'])?$_GET['soluong']:0;
	$khuyenmai=isset($_GET['khuyenmai'])?$_GET['khuyenmai']:0;
	$new=isset($_GET['new'])?$_GET['new']:0;
	$seo=isset($_GET['seo'])?$_GET['seo']:0;
	$mota=isset($_GET['mota'])?$_GET['mota']:"";
	echo "$id_sanpham<br>$tensp<br>$id_hangdt<br>$id_nhom<br>$gia<br>$soluong<br>$khuyenmai<br>$new<br>$seo<br>$mota<br>";
	/*
	$sql_suasp="select * from tbsanpham where id_sanpham = $id_sanpham";
	
	$data_suasp=$o->query($sql_suasp);
	$arraysp = $data_suasp->FetchAll();
	echo "<br>";
	print_r($arraysp);*/
	
	echo "$id_sanpham<br>$tensp<br>$id_hangdt<br>$id_nhom<br>$gia<br>$soluong<br>$khuyenmai<br>$new<br>$seo<br>$mota<br>";
	$sql_suasp="UPDATE tbsanpham SET tensp = '$tensp', id_hangdt = $id_hangdt, id_nhom = $id_nhom, gia = $gia, soluong = $soluong
	, khuyenmai = $khuyenmai, new = $new, seo =$seo, mota = '$mota'
	WHERE id_sanpham=$id_sanpham";
	$o->query($sql_suasp);

	header('location:../datasp.php')
?>