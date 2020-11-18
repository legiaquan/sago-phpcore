<?php
    include "../include/connect.php";

    /*$id_user = $_GET['id'];
    echo "$id_user";
    $sql_xoauser="DELETE FROM tbthanhvien WHERE id_user='$id_user'";
    $o->query($sql_xoauser);
    header('location:../user.php');
*/
    $id_sanpham = $_GET['id_sanpham'];
    echo "$id_sanpham";
    $sql_xoasp="DELETE FROM tbsanpham WHERE id_sanpham= $id_sanpham";
    $o->query($sql_xoasp);
    header('location:../datasp.php');


?>