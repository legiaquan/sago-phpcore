<?php
	include "../include/connect.php";
	$id_hoadon = isset($_GET['id'])?$_GET['id']:'';
	$thaotac = isset($_GET['thaotac'])?$_GET['thaotac']:'';
	echo "$id_hoadon<br>$thaotac";
	//kiểm tra tình trang ban đầu. Ràng buộc k cho phép chuyển đơn hàng từ trạng thái hủy sang các trạng thái khác
	$sql_checktinhtrang = "select tinhtrang,id_hoadon from tbhoadon where id_hoadon = '$id_hoadon'";
	$dataChecktinhtrang = $o->query($sql_checktinhtrang);
	$arrChecktinhtrang = $dataChecktinhtrang->FetchAll();
	foreach ($arrChecktinhtrang as $key => $value) {
		# code...
		if($value['tinhtrang']=='cancel')
		{
			header('Location: ../datadonhang.php?error=tinhtrangcancel');
			exit();
		}
		if($value['tinhtrang']=='complete')
		{
			header('Location: ../datadonhang.php?error=tinhtrangcomplete');
			exit();
		}
	}
	//
	$sql_updatetinhtrang="UPDATE tbhoadon SET tinhtrang = '$thaotac' WHERE id_hoadon = '$id_hoadon'";
	$o->query($sql_updatetinhtrang);
	header('Location: ../datadonhang.php');
?>