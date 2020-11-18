<?php

	include "../include/connect.php";
	$hoten=isset($_POST['hoten'])?$_POST['hoten']:'';
	$id_user=isset($_POST['u'])?$_POST['u']:'';
	$pass=isset($_POST['p'])?md5($_POST['p']):'';
	$passre=isset($_POST['pre'])?md5($_POST['pre']):'';
	$email=isset($_POST['email'])?$_POST['email']:'';
	$sdt=isset($_POST['sdt'])?$_POST['sdt']:'';
	$diachi=isset($_POST['diachi'])?$_POST['diachi']:'';
	$date=date('Y-m-d');
	$sdtstring=(string)$sdt;
	$demsdt=strlen($sdtstring);
	echo "hoten: $hoten<br>tai khoan: $id_user<br>mật khẩu: $pass<br>email: $email<br>sdt: $sdt<br>diachi: $diachi";
	$sql_id = "select * from tbthanhvien WHERE id_user = '$id_user'";
	$data_id = $o->query($sql_id);
	$arrThanhvien = $data_id->fetchAll(PDO::FETCH_ASSOC);
	echo "<br>kiểm tra tồn tại thành viên<br>";
	print_r($arrThanhvien);
	echo "<br>".count($arrThanhvien);
	echo "<br>";
	//check mail kh
	echo "hoten: $hoten<br>tai khoan: $id_user<br>mật khẩu: $pass<br>email: $email<br>sdt: $sdt<br>diachi: $diachi";
	$sql_email = "select * from tbthanhvien WHERE email = '$email'";
	$data_email = $o->query($sql_email);
	$arrCheckEmail = $data_email->fetchAll(PDO::FETCH_ASSOC);
	if(count($arrCheckEmail)>0)
	{
		echo "<br>testemail :chua co email";
		//bao loi ton tai
		?>(-1)
		<script type="text/javascript">
			alert("Đã tồn tại email");
			window.history.go(-1);

		</script>
		<?php
	}
	//
	//
	
	if(count($arrThanhvien)==0)
		echo "chua co thanh vien nay";
	else echo "da co thanh vien nay";
	$checkuser=count($arrThanhvien);
	if($checkuser>0)
		header("Location:../dangnhap.php?id_user=errorid");//echo "<br>tai khoan '$id_user' da ton tai";
	else if($demsdt>11)
		header("Location:../dangnhap.php?id_user=errorsdt");
	else if($pass!=$passre)
		header("Location:../dangnhap.php?id_user=errorpassre");
	else{
		$sql_insertid = "insert into tbthanhvien (hoten,diachi,email,sdt,id_user,pass,hieuluc)
		VALUES ('$hoten','$diachi','$email',$sdt,'$id_user','$pass','$date')";
		//them tai khoan vao csdl
		$o->query($sql_insertid);
		if ($o->query($sql_insertid) === TRUE) {
		    echo "them thanh cong";
		} 
				
		header("Location:../dangnhap.php?id_user=suscess");//echo "<br> chua ton tai thanh vien";
	}
	
	

	
?>