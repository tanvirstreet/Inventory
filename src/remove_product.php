<?php
include "db.php";
$product_id = $_GET['product_id'];
$sql = "DELETE FROM `product` WHERE product_id='$product_id'";
mysql_query($sql);

header('Location: product.php');

?>