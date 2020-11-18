<?php
    include "../include/connect.php";

    $id_user = $_GET['id'];
    echo "$id_user";
    $sql_xoauser="DELETE FROM tbthanhvien WHERE id_user='$id_user'";
    $o->query($sql_xoauser);
    header('location:../user.php');


?>