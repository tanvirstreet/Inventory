<?php
	session_start();
    if (!isset($_SESSION['username'])) {
		header('Location: login.php');
		exit;
	}
	include "db.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inventory System || Report</title>
	<script src="jquery-1.12.3.min.js"></script>
</head>
<body>
<a href="logout.php"> Log Out </a><br>
<a href="home.php"> Home </a><hr>
<center>

	<button><a href="report_sales.php"><b>Sales Report</b></a></button>
	<button><a href="report_purchase.php"><b>Purchase Report</b></a></button>
	
</center>
</body>
</html>