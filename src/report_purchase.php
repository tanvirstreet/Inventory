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
<button><a href="report_sales.php"><b>Sales Report</b></a></button>
<center>

	<h3>Purchase Report</h3><br>
	<form action="" method="POST">
	Date From : <input type="date" name="date_from" placeholder="dd-mm-yyyy"> ::
	To : <input type="date" name="date_to" placeholder="dd-mm-yyyy">
	<input type="submit" name="submit" value=" Show ">
	</form>
	<br>
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
	<table border="1">
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
</center>
</body>
</html>