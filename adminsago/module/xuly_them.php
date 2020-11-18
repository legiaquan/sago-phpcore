<?php
	$id_hang=isset($_POST['id_hang'])?$_POST['id_hang']:'';
	$id_nhom=isset($_POST['id_nhom'])?$_POST['id_nhom']:'';
	$tensp=isset($_POST['tensp'])?$_POST['tensp']:'';
	$mota=isset($_POST['mota'])?$_POST['mota']:'';
	//$arrImg= array("image/png", "image/jpeg", "image/bmp");
	$gia=isset($_POST['gia'])?$_POST['gia']:'';
	$soluong=isset($_POST['soluong'])?$_POST['soluong']:'';
	$km=isset($_POST['km'])?$_POST['km']:'';
	$new=isset($_POST['new'])?$_POST['new']:'';
	$id_sanpham=isset($_POST['id_sanpham'])?$_POST['id_sanpham']:'';
	$seo=isset($_POST['seo'])?$_POST['seo']:'';
	$arrImg = array("image/png", "image/jpeg", "image/bmp");
	$err = "";

	$errFile = $_FILES["hinh"]["error"];
	if ($errFile>0)
		$err .="Lỗi file hình <br>";
	else
	{
		$type = $_FILES["hinh"]["type"];
		if (!in_array($type, $arrImg))
			$err .="Không phải file hình <br>";
		else
		{	$temp = $_FILES["hinh"]["tmp_name"];
			$name = $_FILES["hinh"]["name"];
			if (!move_uploaded_file($temp, __DIR__."/../../img/".$name))
				$err .="Không thể lưu file<br>";
			
		}
	}
	
	echo "$id_sanpham<br>$id_hang<br>$id_nhom<br>$tensp<br>$mota<br>$gia<br>$soluong<br>$km<br>$new<br>$seo";
	//kiem tra id_sanpham trong csdl
	include "../include/connect.php";
	$sql_checktontai= "select * from tbsanpham where id_sanpham = $id_sanpham";
	$data_checktontai=$o->query($sql_checktontai);
	$arrChecktontai= $data_checktontai->FetchAll();
	$demtontai =count($arrChecktontai);
	echo "test ton tai: $demtontai";
	
	if($demtontai>0){
		header('location:../datasp.php?trangthai=loiid');
	}
	
	else{
		$sql_themsp="INSERT INTO tbsanpham (id_sanpham, id_hangdt, id_nhom, tensp, mota, gia,soluong,khuyenmai,hinhsp,new,seo) VALUES ($id_sanpham,$id_hang ,$id_nhom, '$tensp', '$mota', $gia, $soluong,$km,'$name',$new,$seo)";
		$o->query($sql_themsp);
		header('location:../datasp.php?trangthai=thanhcong');
	}
	

?>