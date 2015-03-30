<?php
session_start();
mysql_connect("localhost","root","") or die("Nggak bisa koneksi");
mysql_select_db("usermulti");//sesuaikan dengan nama database anda

$userid = $_POST['userid'];
$psw = $_POST['psw'];
$op = $_GET['op'];

if($op=="in"){
    $cek = mysql_query("SELECT * FROM tabeluser WHERE userid='$userid' AND password='$psw'");
    if(mysql_num_rows($cek)==1){//jika berhasil akan bernilai 1
        $c = mysql_fetch_array($cek);
        $_SESSION['userid'] = $c['userid'];
        $_SESSION['level'] = $c['level'];
        if($c['level']==1){
            header("location:../dokterpraktek/homeadmin.php");
        }else if($c['level'] ==2){
			header("location:../pasien/homepasien.php");
			}
		else if($c['level']==3){
            header("location:../stafahli/homestaf.php");
        }
    }else{
         die("Username atau Password yang anda masukkan salah <a href=\"javascript:history.back()\">kembali</a>");
    }
}else if($op=="out"){
    unset($_SESSION['userid']);
    unset($_SESSION['level']);
    header("location:../index.php");
}
?>