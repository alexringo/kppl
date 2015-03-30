<?php 
include '../config/koneksi2.php';

$penesti=$_POST['penesti'];
$testi=$_POST['testi'];
$idk=$_POST['idk'];
 
mysql_query("insert into testimoni values('','$idk','$penesti','$testi')");
header("location:tempat.php?id=$idk");
 
 ?>