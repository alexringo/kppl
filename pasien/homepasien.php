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

$query ="SELECT id,nama,alamat,gambar,keterangan FROM tempatpraktek";
$hasil = mysql_query($query);
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
        <li class="active"><a>Tempat</a></li>
        <li><a href="tanyajawab.php">Tanya Jawab</a></li>
        <li><a href="tips.php">Tips</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
      </form>
      <ul class="nav navbar-nav navbar-right">
      <li class=""><a href="./profil.php"><?php echo "".$_SESSION['userid']."";?></a></li>
        <li><a href="../config/koneksi.php?op=out">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

 <div class="container">
 <div class="row">
<div class="col-lg-12" align="right">
<form action="jenispraktek.php" method="post">
<label>Jenis Praktek :</label>
<select title="Pilih Jenis Praktek" name="jenis">
<option value"umum">Umum</option>
<option value"kulit">Kulit</option>
<option value"jantung">Jantung</option>
<option value"gigi">Gigi</option>
</select>
<input type="submit" class="btn btn-info btn-sm" value="Lihat" />
</form>
</div>
</div>
<hr />
<div class="row">
<?php
if(!$query){
    die( mysql_error() );
}
while( $rows = mysql_fetch_array($hasil) ){
    ?>
    
    <div class="col-md-3">
    <div class="thumbnail">
      <img src="../<?php echo "$rows[gambar]";?>" alt="...">
      <div class="caption">
        <h3><?php echo $rows[1]; ?></h3>
        <p><a href="tempat.php?id=<?=$rows['id']; ?>" class="btn btn-primary btn-sm" role="button">Lihat</a></p>
      </div>
    </div>
  </div>
<?php
}
?>
</div>
</div>
	
      
</body>
</html>