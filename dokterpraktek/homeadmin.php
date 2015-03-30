<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['userid'])){
    die("Anda belum login");//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['level']!=1){
    die("Anda bukan admin");//jika bukan admin jangan lanjut
}
include '../config/koneksi2.php';

$q = mysql_query("SELECT judul,keterangan FROM tips");

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="../css/bootstrap.css" type="text/css"> 
 <link rel="stylesheet" href="../css/bootstrap-responsive.css" type="text/css">
  <link rel="stylesheet" href="../css/bootstrap-theme.css" type="text/css"> 
 <script src="../js/jquery-1.11.2.min.js"></script>
 <script src="../js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Praktek Dokter</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="tanyajawab.php">Tanya Jawab</a></li>
        <li class="active"><a>Tips</a></li>
        <li><a href="riwayat.php">Catat Riwayat</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
      <li class=""><a><?php echo "".$_SESSION['userid']."";?></a></li>
        <li><a href="../config/koneksi.php?op=out">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <div class="container">
 <div class="row">
 <div class="col-lg-12">
 <center><a href="tips.php" title="Tambah Tips"><h1><span class="glyphicon glyphicon-plus-sign"</span></h1></a></center>
 </div>
<div class="col-lg-12">
<?php
if(!$q){
	die(mysql_error());
	}
	while ($row = mysql_fetch_array($q)){
?>
<div class="col-lg-6">
<h3><?php echo "$row[judul]"; ?></h3>
<p><?php echo "$row[keterangan]"; ?></p>
<hr>
</div>
<?php } ?>
</div>
 </div>
 </div>
	
      
</body>
</html>