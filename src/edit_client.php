<?php
	session_start();
    if (!isset($_SESSION['username'])) {
		header('Location: login.php');
		exit;
	}
	include "db.php";

	if(isset($_GET['client_id'])){

	  $clientId = $_GET['client_id'];
	  $sql = "SELECT * FROM client WHERE client_id='$clientId'";
	  
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inventory System || Add Client</title>
</head>
<body>
<center>
<h1>Edit Client</h1>

<?php
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	$paid_before = $row['paid'];
?>
<hr>
	<form action="" method="POST">
		Client Name: <input type="text" name="client_name" value="<?php echo $row['client_name'];?>" readonly><br>
		Company Name : <input type="text" name="client_com_name" value="<?php echo $row['client_com_name'];?>" readonly><br>
		Total Amount : <input type="number" name="total_amount" value="<?php echo $row['total_amount'];?>"><br>
		Due : <input type="number" name="due" value="<?php echo $row['due'];?>" readonly><br>
		Paid : <input type="number" name="paid"  value="<?php echo $row['paid'];?>" required><span style="color: red">*</span><br>
		<input type="hidden" name="client_id" value="<?php echo $row['client_id'];?>">
		<input type="submit" name="submit" value="Save">
		<button><a href='client.php'>Cancel</a></button>
	</form>
</center>
</body>
<?php
if(isset($_POST['submit'])){

		$clientID = $_POST['client_id'];
		$clientName = $_POST['client_name'];
		$company = $_POST['client_com_name'];
		$totalAmount = $_POST['total_amount'];
		$newPay = $_POST['paid'];

		$paid = $paid_before + $newPay;
		$due = $totalAmount - $paid;
	//echo "be pa - ".$paid_before." nw pa -".$newPay ."<br>";
	//echo "now = " .$paid ."  due - ".$due." totalAmount" . $totalAmount;
	//	echo $clientID;
	//die();

	$sql = "UPDATE `client` SET `total_amount`='$totalAmount',`paid`='$paid',`due`='$due' WHERE `client_id`='$clientID'";

	mysql_query($sql);

	header('Location: client.php');
}

?>
</html>