<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['userid'])){
    die("Anda belum login");//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['level']!=1){
    die("Anda bukan Staf");//jika bukan user jangan lanjut
}

include '../config/koneksi2.php';
$q=mysql_query("select * from tabeluser where level=2");
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
 <script type="text/javascript" src="./ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="./ckeditor/style.js"></script>
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
        <li><a href="homeadmin.php">Tips</a></li>
        <li class="active"><a>Catat Riwayat</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a><?php echo "".$_SESSION['userid']."";?></a></li>
        <li><a href="../config/koneksi.php?op=out">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
 <div class="container">
 <div class="row">
	<div class="col-lg-12">
    	<h1 class="page-header">Catat Riwayat Pasien</h1>
    </div>
 </div>
 <div class="row">
 	<div class="col-lg-12">
    	<form action="catatriwayat.php" method="post">
            <div class="form-group">
				<label for="idp">ID Pasien</label>
    			<select name="idp">
                <?php 
					while ($row = mysql_fetch_array($q)){
					echo "<option value=$row[userid]>$row[userid]</option>";
					}
				 ?>
                 </select>
			</div>
			<div class="form-group">
				<label for="idk">ID Klinik</label>
				<input type="text" class="form-control" name="idk" required></input>
			</div>
            <div class="form-group">
				<label for="sakit">Penyakit</label>
				<input type="text" class="form-control" name="sakit" required></input>
			</div>
            <div class="form-group">
				<label for="resep">Resep</label>
				<textarea name="resep" class="ckeditor"></textarea>
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