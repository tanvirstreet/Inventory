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
	<title>Inventory System || Home</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
<center>
</head>
<body>
<center>
<div class="add_ctg_heading">HOME</div>
<div align="right" style="padding-right:20px; padding-top:20px"><a href="logout.php" class="btn btn-danger" style="width:110px">Logout</a></div>

	<table class="home_table">
	<tr>
		<td colspan="2" align="center" style="padding-top: 20px; padding-bottom: 10px;"><a href="stock.php" class="btn btn-primary" style="width:100%;padding: 5px"><h4>Stock</h4></a></td>
	</tr>
	
	<tr>
		<td style="padding-right: 10px; padding-top: 5px; padding-bottom: 10px"><a href="category.php" class="btn btn-primary" style="width:100%; padding: 5px"><h4>Category</h4></td>
		<td style="padding-left: 10px; padding-top: 5px; padding-bottom: 10px"><a href="product.php" class="btn btn-primary" style="width:100%; padding: 5px"><h4>Product</h4></td>
	</tr>
	
	<tr>
		<td style="padding-right: 10px; padding-top: 5px; padding-bottom: 10px"><a href="purchase.php" class="btn btn-primary" style="width:100%; padding:5px"><h4>Purchase</h4></a></td>
		<td style="padding-left: 10px; padding-top: 5px; padding-bottom: 10px"><a href="sales.php" class="btn btn-primary" style="width:100%; padding:5px"><h4>Sales</h4></a></td>
	</tr>
	
	<tr>
		<td style="padding-right: 10px; padding-top: 5px; padding-bottom: 10px"><a href="report.php" class="btn btn-primary" style="width:100%; padding:5px"><h4>Reports</h4></a></td>
		<td style="padding-left: 10px; padding-top: 5px; padding-bottom: 10px"><a href="client.php" class="btn btn-primary" style="width:100%; padding:5px"><h4>Clients</h4></a></td>
	</tr>
	
	</table>
	</center>
</body>
<?php include 'footer.php';?>
</html>