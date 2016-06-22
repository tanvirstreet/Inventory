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
	<title> || Print || </title>
	<script src="jquery-1.12.3.min.js"></script>
</head>
<body>
<center>
	<table border="1px">
		<thead>
			<tr>
				<th>Date</th>
				<th>Client Name</th>
				<th>Company Name</th>
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
			$sql = "SELECT t1.`date`, t1.`client_name`, t1.`client_com_name`, t1.`ctg_id`, t1.`product_id`, t1.`quantity`, t1.`unit_prize`, t1.`total_prize`, t2.`ctg_name`,t2.`unit_name`,t3.`product_name` FROM `temp_sales_trans` as t1 INNER JOIN `category` as t2 on t1.`ctg_id`=t2.`ctg_id` INNER JOIN `product` as t3 on t1.`product_id`= t3.`product_id`";
			$result = mysql_query($sql);
			while ($row = mysql_fetch_assoc($result)) {
				$date = $row['date'];
				$client_name = $row['client_name'];
				$client_com_name = $row['client_com_name'];
				$ctg_id = $row['ctg_id'];
				$product_id = $row['product_id'];
				$quantity = $row['quantity'];
				$unit_prize = $row['unit_prize'];
				$total_prize = $row['total_prize'];
				echo "<tr> 
						<td>". $date ."</td> 
						<td>". $client_name . "</td>
						<td>". $client_com_name ."</td>
						<td>". $row["ctg_name"] ."</td>
						<td>". $row["product_name"] ."</td>
						<td>". $quantity ."</td>
						<td>". $row["unit_name"] ."</td>
						<td>". $unit_prize ."</td>
						<td>". $total_prize ."</td>
					</tr>";
					//echo $client_name . "<br>";
					mysql_query("INSERT INTO `sales_trans`(`date`, `client_name`, `client_com_name`, `ctg_id`, `product_id`, `quantity`, `unit_prize`, `total_prize`) VALUES ('$date','$client_name','$client_com_name','$ctg_id','$product_id','$quantity','$unit_prize','$total_prize')");
					//$c++;
					
					//echo "Select from product for quantity<br>";
					$result2 = mysql_query("SELECT `quantity` FROM `product` WHERE `product_id`='$product_id'");
					$row1 = mysql_fetch_assoc($result2);
					$old_quantity = $row1['quantity'];
					//echo  "main =  old - new[sales_trans quantity]<br>"; 
					$main_quantity = $old_quantity - $quantity;
					//echo "update into product<br>";
					mysql_query("UPDATE `product` SET `quantity`='$main_quantity' WHERE `product_id`='$product_id'");
			}
		?>
		</tbody>
	</table>
</center>
</body>
<script type="text/javascript">
	$( document ).ready(function() {
    	window.print();
	});
</script>
<?php
	$sql = "TRUNCATE TABLE temp_sales_trans";
	mysql_query($sql);
?>
<script type="text/javascript">
	$( document ).ready(function() {
    	//alert("Invoice is printed");
		window.location="sales.php";
	});
</script>
</html>