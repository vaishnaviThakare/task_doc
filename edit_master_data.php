<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM template where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'add_master_data.php';
?>