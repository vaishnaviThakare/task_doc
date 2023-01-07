<?php
include 'db_connect.php';
$qry = $conn->query("UPDATE task_list SET status = 3");
?>
<p>Task Completed successfully</p>