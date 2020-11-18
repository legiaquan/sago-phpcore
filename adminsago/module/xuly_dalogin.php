<?php
if(!isset($_SESSION['admindangnhap']['hoten']))
{
    header('location:dangnhap.php');
}
?>