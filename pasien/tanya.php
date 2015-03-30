<?php
include '../config/koneksi2.php';
$jenis=$_POST['jenis'];
$tanya=$_POST['tanya'];
$user=$_POST['user'];

mysql_query("insert into tanyajawab values('','$user','$jenis','$tanya','','Open')");
header("location:tanyajawab.php");
?>