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
	<title>Inventory System || Purchase Report</title>
	<script src="jquery-1.12.3.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<center>
<div class="add_ctg_heading">PURCHASE REPORT</div>
<div align="right" style="padding-right:20px; padding-top:20px"><a href="logout.php" class="btn btn-danger" style="width:110px">Logout</a></div>

	<form action="" method="POST">
	<table>
	<tr>
	<td style="padding-right:15px"><b>Date From</b></td>
	<td style="padding-right:12px"><input type="date" name="date_from" placeholder="yyyy-mm-dd" class="form-control"></td>
	<td style="padding-right:5px"><b>To</b>&nbsp;&nbsp;</td>
	<td style="padding-right:13px"><input type="date" name="date_to" placeholder="yyyy-mm-dd" class="form-control"></td>
	<td><input type="submit" name="submit" value="Search" class="btn btn-primary"></td>
	
	<tr>
	<table>
	</form>
	<?php
		if(isset($_POST['submit'])){

			$date_from = $_POST['date_from'];
			$date_to = $_POST['date_to'];
			if ($date_from == "") {
				$sql = "SELECT t1.`date`, t1.`ctg_id`, t1.`product_id`, t1.`quantity`, t1.`unit_prize`, t1.`total_prize`, t2.`ctg_name`,t2.`unit_name`,t3.`product_name` FROM `purchase_trans` as t1 INNER JOIN `category` as t2 on t1.`ctg_id`=t2.`ctg_id` INNER JOIN `product` as t3 on t1.`product_id`= t3.`product_id` WHERE t1.`date`='$date_to'";
			}else if ($date_to == ""){
				$sql = "SELECT t1.`date`, t1.`ctg_id`, t1.`product_id`, t1.`quantity`, t1.`unit_prize`, t1.`total_prize`, t2.`ctg_name`,t2.`unit_name`,t3.`product_name` FROM `purchase_trans` as t1 INNER JOIN `category` as t2 on t1.`ctg_id`=t2.`ctg_id` INNER JOIN `product` as t3 on t1.`product_id`= t3.`product_id` WHERE t1.`date`='$date_from'";	
			}else{
				$sql = "SELECT t1.`date`, t1.`ctg_id`, t1.`product_id`, t1.`quantity`, t1.`unit_prize`, t1.`total_prize`, t2.`ctg_name`,t2.`unit_name`,t3.`product_name` FROM `purchase_trans` as t1 INNER JOIN `category` as t2 on t1.`ctg_id`=t2.`ctg_id` INNER JOIN `product` as t3 on t1.`product_id`= t3.`product_id` WHERE t1.`date` BETWEEN '$date_from' and '$date_to'";
			}

		}else{
			$sql = "SELECT t1.`date`, t1.`ctg_id`, t1.`product_id`, t1.`quantity`, t1.`unit_prize`, t1.`total_prize`, t2.`ctg_name`,t2.`unit_name`,t3.`product_name` FROM `purchase_trans` as t1 INNER JOIN `category` as t2 on t1.`ctg_id`=t2.`ctg_id` INNER JOIN `product` as t3 on t1.`product_id`= t3.`product_id`";
		}
	?>
	<br>
	<br>
	<table class="table-striped" style="width:80%">
		<thead>
			<tr>
				<th>Date</th>
				<th>Category</th>
				<th>Product</th>
				<th>Quantity</th>
				<th>Unit</th>
				<th>Unit Price</th>
				<th>Total Price</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$result = mysql_query($sql);

			while ($row = mysql_fetch_assoc($result)) {
				echo "<tr> <td>". $row["date"]."</td><td>".$row["ctg_name"]."</td><td>".$row["product_name"]."</td><td>".$row["quantity"]."</td><td>".$row["unit_name"]."</td><td>".$row["unit_prize"]."</td><td>".$row["total_prize"]."</td></tr>";
			}
			?>
		</tbody>
	</table>
	<br>
	<br>
	<a href="report_sales.php" class="btn btn-primary" style="width:140px; padding:7px">Sales Report</a><br><br>
	<a href="report.php" class="btn btn-primary" style="width:100px">Back</a>&nbsp;
	<a href="home.php" class="btn btn-primary" style="width:100px">Home</a>
</center>
</body>
<?php include 'footer2.php';?>
</html>