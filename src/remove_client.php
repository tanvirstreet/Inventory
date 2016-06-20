<?php
include "db.php";
$client_id = $_GET['client_id'];
$sql = "DELETE FROM `client` WHERE client_id='$client_id'";
mysql_query($sql);

header('Location: client.php');

?>