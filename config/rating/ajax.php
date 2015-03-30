<?php
session_start();
require_once '../koneksi2.php';

    if($_POST['act'] == 'rate'){
    	//search if the user has already gave a note
    	$ip = $_SESSION['userid'];
    	$therate = $_POST['rate'];
    	$thepost = $_POST['post_id'];
		
		$query = mysql_query("SELECT * FROM wcd_rate where ip= '$ip' && id_post=$thepost");
    	while($data = mysql_fetch_assoc($query)){
    		$rate_db[] = $data;
		}
		if(@count($rate_db) == 0 ){
    		mysql_query("INSERT INTO wcd_rate (id_post, ip, rate)VALUES('$thepost', '$ip', '$therate')");
			} else {
    		mysql_query("UPDATE wcd_rate SET rate= '$therate' WHERE ip = '$ip'");
    	}
    } 
?>