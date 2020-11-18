<?php
if (!isset($_SESSION))session_start();
unset($_SESSION['userdangnhap']);
unset($_SESSION['giohang']);
header('location:../index.php');