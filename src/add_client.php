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
</head>
<body>
<center>
<h1>Add Client</h1>
<a href='client.php'>Client</a>
<hr>
	<form action="" method="POST">
		Client Name: <input type="text" name="client_name" required><span style="color: red">*</span><br>
		Company Name : <input type="text" name="client_com_name"><br>
		Total Amount : <input type="number" name="total_amount" required><span style="color: red">*</span><br>
		Paid : <input type="number" name="paid" required><span style="color: red">*</span><br>

		<input type="submit" name="submit" value="Submit">
	</form>
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
}

?>
</html>