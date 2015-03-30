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
 <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckeditor/style.js"></script>
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
        <li><a href="./tanyajawab.php">Tanya Jawab</a></li>
        <li><a href="./homeadmin.php">Tips</a></li>
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
<form action="tambah.php" method="post">
<div class="form-group">
	<label for="jenis">Jenis</label>
    <select name="jenis" required>
    <option value="umum">Umum</option>
    <option value="kulit">Kulit</option>
    <option value="jantung">Jantung</option>
    <option value="gigi">Gigi</option>
    </select>
</div>
<div class="form-group">
	<label for="judul">Judul</label>
    <input type="text" class="form-control" name="judul" required/>
</div>
<div class="form-group">
<label for="keterangan">Keterangan</label>
<textarea name="keterangan" class="ckeditor" required></textarea>
</div>
<div class="form-group">
	<label></label>
    <input type="submit" class="btn btn-info" value="Simpan" />
</div>
</form>
</div>
</div>
</div>
	
      
</body>
</html>