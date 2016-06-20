<?php
include "db.php";

$sql = "TRUNCATE TABLE temp_sales_trans";
	mysql_query($sql);

	header('Location: sales.php');

?>