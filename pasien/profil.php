<?php
session_start();

//cek apakah user sudah login
if(!isset($_SESSION['userid'])){
    die("Anda belum login");//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['level']!=2){
    die("Anda bukan user");//jika bukan user jangan lanjut
}
include '../config/koneksi2.php';
$user=$_SESSION['userid'];
$q=mysql_query("select * from riwayatpasien where idp='$user'");
$q2=mysql_query("select * from profil where user='$user'");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Profil</title>
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
        <li><a href="homepasien.php">Tempat</a></li>
        <li><a href="tanyajawab.php">Tanya Jawab</a></li>
        <li><a href="tips.php">Tips</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
      <li class="active"><a><?php echo "".$_SESSION['userid']."";?></a></li>
        <li><a href="../config/koneksi.php?op=out">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
<div class="row">
<div class="col-lg-12">
	<h2 class="page-header">Profil</h2>
</div>
<?php
if(!$q){
    die( mysql_error() );
}
	while ( $row1 = mysql_fetch_array($q2)){ 
?>
<div class="col-lg-3">
	<img class="img-responsive" src="<?php echo "$row1[foto]" ?>" />
</div>
<div class="col-lg-9">
	<h4>Nama : <?php echo "$row1[nama]" ?></h4>
    <p>Alamat : <?php echo "$row1[alamat]" ?></p>
</div>
<?php } ?>
</div>
<hr>
<div class="row">
<div class="col-lg-12">
<h3>Riwayat Pasien</h3>
<table class="table table-striped">
<thead>
<th>Tanggal</th>
<th>IDKlinik</th>
<th>Sakit</th>
<th>Resep</th>
</thead>
<tbody>
<?php
if(!$q){
    die( mysql_error() );
}
	while ( $row = mysql_fetch_array($q)){ 
?>
<tr>
<td><?php echo "$row[tanggal]";?></td>
<td><?php echo "$row[idk]";?></td>
<td><?php echo "$row[sakit]";?></td>
<td><?php echo "$row[resep]";?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
	
      
</body>
</html>