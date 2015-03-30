<?php 
include '../config/koneksi2.php';
$judul=$_POST['judul'];
$jenis=$_POST['jenis'];
$keterangan=$_POST['keterangan'];
 
mysql_query("insert into tips values('','$judul','$keterangan','$jenis')");
header("location:homeadmin.php");
 
 ?>