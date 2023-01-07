<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM semester where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
include 'add_semester.php';
?>