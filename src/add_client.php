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
	<title>Inventory System || Add Client</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<div class="add_ctg_heading">ADD CLIENT</div>
<div align="right" style="padding-right:20px; padding-top:20px"><a href="logout.php" class="btn btn-danger" style="width:110px">Logout</a></div>

<div class="add_ctg" style="padding-top:25px; padding-bottom:10px">
	<form action="" method="POST">
		<table class="add_ctg_table">
		<tr class="form-group"><td style="padding-right: 15px;">Client Name</td>
		<td><input type="text" name="client_name" class="form-control" required><td>
		</tr>
		
		<tr class="form-group"><td style="padding-right: 15px;">Company Name</td>
		<td><input type="text" name="client_com_name" class="form-control"></td>
		</tr>
		
		<tr class="form-group"><td style="padding-right: 15px;">Total Amount</td>
		<td><input type="number" name="total_amount" class="form-control" required></td>
		</tr>
		
		<tr class="form-group"><td style="padding-right: 15px;">Paid</td>
		<td><input type="number" name="paid" class="form-control" required></td>
		</tr>

		<tr>
		<td colspan="2"><input type="submit" name="submit" onclick="alert('Client Susccefully Added');" value="Submit" class="btn btn-primary"></td>
				</tr>
			</table>
			</form>
		</div>
		<br>'
	<a href="client.php" class="btn btn-primary" style="width:100px">Back</a>&nbsp;
	<a href="home.php" class="btn btn-primary" style="width:100px">Home</a>
</center>
</body>
<?php
if(isset($_POST['submit'])){

	  $clientName = $_POST['client_name'];
	  $company = $_POST['client_com_name'];
	  $totalAmount = $_POST['total_amount'];
	  $paid = $_POST['paid'];

	  $due = $totalAmount - $paid;

	  mysql_query("INSERT INTO `client`(`client_name`, `client_com_name`, `total_amount`, `paid`, `due`) VALUES ('$clientName','$company','$totalAmount','$paid','$due')");
	  header('Location: client.php');
}

?>
<?php include 'footer2.php';?>
</html>