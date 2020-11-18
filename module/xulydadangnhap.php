<?php
	if (!isset($_SESSION)) session_start();
	if (isset($_SESSION['userdangnhap']))
		header('location:../index.php');