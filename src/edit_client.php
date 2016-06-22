<?php include 'header.php';?>
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
	<title>Inventory System || Edit Client</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<div class="add_ctg_heading">EDIT CLIENT</div>
<div align="right" style="padding-right:20px; padding-top:20px"><a href="logout.php" class="btn btn-danger" style="width:110px">Logout</a></div>

<?php
	$result = mysql_query($sql);
	$row = mysql_fetch_assoc($result);
	$paid_before = $row['paid'];
?>

<div class="add_ctg" style="padding-top:25px; padding-bottom:10px">
	<form action="" method="POST">
	<table class="add_ctg_table">
	
	<tr class="form-group"><td style="padding-right: 15px;">Client Name</td>
		<td><input type="text" name="client_name" value="<?php echo $row['client_name'];?>"   class="form-control" readonly></td>
		</tr>
	
	<tr class="form-group"><td style="padding-right: 15px;">Company Name</td>
		<td><input type="text" name="client_com_name" value="<?php echo $row['client_com_name'];?>" class="form-control" readonly></td>
		</tr>
	
	<tr class="form-group"><td style="padding-right: 15px;">Total Amount</td>
		<td><input type="number" name="total_amount" value="<?php echo $row['total_amount'];?>"class="form-control"></td>
		</tr>
		
	<tr class="form-group"><td style="padding-right: 15px;">Due</td>
		<td><input type="number" name="due" value="<?php echo $row['due'];?>" class="form-control" readonly></td>
		</tr>
		
	<tr class="form-group"><td style="padding-right: 15px;">Paid</td>
		<td><input type="number" name="paid"  value="<?php echo $row['paid'];?>" class="form-control" required></td>
		</tr>
		
	<tr class="form-group">
		<input type="hidden" name="client_id" value="<?php echo $row['client_id'];?>">
		<td colspan="2"><input type="submit" name="submit" value="Save" class="btn btn-primary"style="width:20%"></td>
	</tr>
	</table>
	</form>
</div>
<br>
	<a href="client.php" class="btn btn-primary" style="width:100px">Back</a>&nbsp;
	<a href="home.php" class="btn btn-primary" style="width:100px">Home</a>
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
<?php include 'footer2.php';?>
</html>