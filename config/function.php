<?php
function get_all_post(){
    $sql = "SELECT `id`, `nama`, `alamat`, `gambar`, `keterangan` FROM `tempatpraktek` order by id desc";
    $query = mysql_query($sql) or die ("Error found<br>reason: ".mysql_error());
 
    return($query);
}
 
function get_post_by_id($id){
    $sql = "SELECT `id`, `nama`, `alamat`, `gambar`, `keterangan` FROM `tempatpraktek` WHERE 1 where post_id='".$id."'";
    $query = mysql_query($sql) or die ("Error found<br>reason: ".mysql_error());
 
    return($query);
}
?>