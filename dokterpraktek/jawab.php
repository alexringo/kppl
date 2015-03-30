<?php
include '../config/koneksi2.php';
$jawab=$_POST['jawab'];
$id=$_POST['id'];

mysql_query("UPDATE tanyajawab SET jawab='$jawab', status='terjawab' where id=$id");
header("location:tanyajawab.php");
?>