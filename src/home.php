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
</head>
<body>
<a href="logout.php">Log Out</a>
<center>
	<a href="stock.php"><h2> Stock </h2></a><br/>
	<a href="sales.php"><h2> Sales </h2></a><br/>
	<a href="purchase.php"><h2> Purchase </h2></a><br/>
	<a href="client.php"><h2> Client </h2></a><br/>
	<a href="report.php"><h2> Report </h2></a>
	<a href="category.php"><h2> Category </h2></a><br/> 
	<a href="product.php"><h2> Product </h2></a><br/> 
</center>
</body>
</html>