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
$id= $_GET['id'];
$post_id= (int)$_GET['id'];
$q = mysql_query("SELECT * FROM tempatpraktek WHERE id=".(int)$_GET['id']);
$q2 = mysql_query("select * from testimoni where idk=".(int)$_GET['id']);

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
  <link rel="stylesheet" href="../config/rating/css/example.css" type="text/css">

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
        <li><a href="profil.php"><?php echo "".$_SESSION['userid']."";?></a></li>
        <li><a href="../config/koneksi.php?op=out">Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
<div class="row">
<?php
if(!$q){
	die(mysql_error());
	}
	while ($row = mysql_fetch_array($q)){
?>
<div class="col-md-5">
	<img class="img-responsive" src="../<?php echo "$row[gambar]" ?>" alt="..."/>
</div>
<div class="col-md-7">
	<h2>Nama :<span><?php echo "$row[nama]"; ?></span></h2>
    <h3>Alamat : <?php echo "$row[alamat]" ?></h3>
    <h3>Keterangan :</h3>
    <p><?php echo "$row[keterangan]" ?></p>
</div>

<?php
	}
?>
</div>
<div class="row">
<div class="col-lg-2">
<h3>Rating : </h3>
</div>
<div class="col-lg-4">
            <?php
                $query = mysql_query("SELECT * FROM wcd_rate where id_post=$post_id"); 
                while($data = mysql_fetch_assoc($query)){
                    $rate_db[] = $data;
                    $sum_rates[] = $data['rate'];
                }
                if(@count($rate_db)){
                    $rate_times = count($rate_db);
                    $sum_rates = array_sum($sum_rates);
                    $rate_value = $sum_rates/$rate_times;
                    $rate_bg = (($rate_value)/5)*100;
                }else{
                    $rate_times = 0;
                    $rate_value = 0;
                    $rate_bg = 0;
                }
            ?>
            <div class="rate-result-cnt">
                <div class="rate-bg" style="width:<?php echo $rate_bg; ?>%"></div>
                <div class="rate-stars"></div>
            </div>
<!-- /rate-result-cnt -->
</div>
<div class="col-lg-5">
<div class="rate-ex2-cnt">
            <div id="1" class="rate-btn-1 rate-btn"></div>
            <div id="2" class="rate-btn-2 rate-btn"></div>
            <div id="3" class="rate-btn-3 rate-btn"></div>
            <div id="4" class="rate-btn-4 rate-btn"></div>
            <div id="5" class="rate-btn-5 rate-btn"></div>
        </div>
</div>

<div class="col-lg-12">
<h2>Testimoni : </h2>
<div class="well" align="right">
                    <form action="beritesti.php" method="post">
                    <div class="form-group">
							<input type="hidden" class="form-control" name="idk" value="<?php echo $id ?>">
						</div>
                    	<div class="form-group">
							<input type="hidden" class="form-control" name="penesti" value="<?php echo $_SESSION['userid'] ?>">
						</div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="testi"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
<hr />
<div class="media">
                    <?php
			if(!$q2){
				die(mysql_error());
			}
			while ($row2 = mysql_fetch_array($q2)){
		?>
                    <h4 class="pull-left media-heading"><?php echo "$row2[nama]"; ?></h4>
                    <div class="media-body"><?php echo "$row2[testimoni]"; ?>
                    </div>
                    <hr />
                    <?php } ?>
                </div>
                </div>
</div>
</div>

<script>
        // rating script
        $(function(){ 
            $('.rate-btn').hover(function(){
                $('.rate-btn').removeClass('rate-btn-hover');
                var therate = $(this).attr('id');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-hover');
                };
            });
                            
            $('.rate-btn').click(function(){    
                var therate = $(this).attr('id');
                var dataRate = 'act=rate&post_id=<?php echo $post_id; ?>&rate='+therate; //
                $('.rate-btn').removeClass('rate-btn-active');
                for (var i = therate; i >= 0; i--) {
                    $('.rate-btn-'+i).addClass('rate-btn-active');
                };
                $.ajax({
                    type : "POST",
                    url : "../config/rating/ajax.php",
                    data: dataRate,
                    success:function(){}
                });
                
            });
        });
    </script>	
      
</body>
</html>