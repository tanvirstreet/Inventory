<?php
include "db.php";
$ctg_id = $_GET['ctg_id'];

$sql = "DELETE FROM `product` WHERE  ctg_id='$ctg_id'";
mysql_query($sql);

$sql = "DELETE FROM `category` WHERE ctg_id='$ctg_id'";
mysql_query($sql);

header('Location: category.php');

?>