<?php
include "db.php";

$sql = "TRUNCATE TABLE temp_purchase_trans";
	mysql_query($sql);

	header('Location: purchase.php');

?>