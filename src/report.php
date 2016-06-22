<?php include 'header.php';?>
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
	<title>Inventory System || Reports</title>
	<script src="jquery-1.12.3.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<div class="add_ctg_heading">REPORTS</div>
<div align="right" style="padding-right:20px; padding-top:20px"><a href="logout.php" class="btn btn-danger" style="width:110px">Logout</a></div>

	<table class="reports">
	<tr>
	<td><a href="report_purchase.php" class="btn btn-success" style="padding-top:20px; padding-bottom:20px; width:100%; font-size:24px; font-style:italic; font-family:'calibri','arial'; font-weight:bold">Purchase Reports</a></td>
	</tr>
	
	<tr>
	<td><a href="report_sales.php" class="btn btn-success" style="padding-top:20px; padding-bottom:20px; width:100%;; font-size:24px; font-style:italic; font-family:'calibri','arial'; font-weight:bold">Sales Reports</a></td>
	</tr>
	</table>
<br>
<a href="home.php" class="btn btn-warning" style="width:20%; padding-top:15px; padding-bottom:15px; font-size:18px">Home</a>
</center>
</body>
<?php include 'footer.php';?>
</html>