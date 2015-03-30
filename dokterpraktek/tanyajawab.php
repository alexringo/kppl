<?php
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['userid'])){
    die("Anda belum login");//jika belum login jangan lanjut..
}

//cek level user
if($_SESSION['level']!=1){
    die("Anda bukan user");//jika bukan user jangan lanjut
}

include '../config/koneksi2.php';
$q=mysql_query("select * from tanyajawab");
$q2=mysql_query("select * from tanyajawab");

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
        <li class="active"><a href="#">Tanya Jawab</a></li>
        <li><a href="./homeadmin.php">Tips</a></li>
        <li><a href="./riwayat.php">Catat Riwayat</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
      </form>
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
    <h3>Berikan Jawaban</h3>
    	<div class="well" align="right">
                    <form action="jawab.php" method="post">
                    <div class="form-group">
							<label>Jawab Pertanyaan ke- :</label>
                            <select name="id">
                            <?php 
								while ($rows = mysql_fetch_array($q2)){
								echo "<option value=$rows[id]>$rows[id]</option>";
								}
							 ?>
                            </select>
					</div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="jawab"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
    </div>
 </div>
 </div>
 
<div class="container">
<div class="row">
<div class="col-lg-12">
<h3>Daftar Tanya-Jawab</h3>
<div class="col-lg-2">
<div class="alert alert-success" align="center" role="alert">No</div>
</div>
<div class="col-lg-4">
<div class="alert alert-info" align="center" role="alert">User</div>
</div>
<div class="col-lg-4">
<div class="alert alert-warning" align="center" role="alert">Jenis</div>
</div>
<div class="col-lg-2">
<div class="alert alert-danger" align="center" role="alert">Status</div>
</div>
</div>

<?php
while ($rows=mysql_fetch_array($q)) {

?>

<div class="col-lg-12">
<div class="col-lg-2">
<div class="panel panel-default">
  <div class="panel-heading"><?php echo "$rows[id]"; ?></div>
</div>
</div>
<div class="col-lg-4">
<div class="panel panel-default">
  <div class="panel-heading"><?php echo "$rows[user]"; ?></div>
</div>
</div>
<div class="col-lg-4">
<div class="panel panel-default">
  <div class="panel-heading"><?php echo "$rows[jenis]"; ?></div>
</div>
</div>
<div class="col-lg-2">
<div class="panel panel-default">
  <div class="panel-heading"><?php echo "$rows[status]"; ?></div>
</div>
</div>

<div class="col-lg-12">
<div class="panel panel-default">
  <div class="panel-heading">Q: <?php echo "$rows[tanya]"; ?></div>
  <div class="panel-body">
    A: <?php echo "$rows[jawab]"; ?>
  </div>
</div>
</div>
<hr />

</div><!--punya col-12-->
<?php } ?>
</div>
</div>	
      
</body>
</html>