<?php 
include '../config/koneksi2.php';
$tanggal= date("Y-m-d");
$idp=$_POST['idp'];
$idk=$_POST['idk'];
$sakit=$_POST['sakit'];
$resep=$_POST['resep'];
 
mysql_query("insert into riwayatpasien values('','$tanggal','$idp','$idk','$sakit','$resep')");
header("location:homeadmin.php");
 
 ?>