<?php
include '/config/koneksi.php';
$jenis=$_POST['jenis'];
$tanya=$_POST['tanya'];

mysql_query("insert into tanyajawab values('','Guest','$jenis','$tanya','','Open')");
header("location:tanyajawab.php");
?>