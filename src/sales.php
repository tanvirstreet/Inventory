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
	<title>Inventory System || Sales</title>
	<script src="jquery-1.12.3.min.js"></script>
	<style type="text/css">
		@media print{
			body { font-size: 10pt }
        }
	</style>
</head>
<body>
<a href="logout.php"> Log Out </a><br>
<a href="home.php"> Home </a>
<center>
	<?php
		$sql = "SELECT t1.`ctg_id`, t1.`ctg_name` FROM `category` as t1";
				$result = mysql_query($sql);
	?>
	<form action="" method="post">
		Date : <input type="date" name="date" placeholder="dd-mm-yyyy" required><br>
		Client Name: <input type="text" name="client_name" required><br>
		Company Name: <input type="text" name="client_com_name"><br>

		Category Name: <select onchange="load_pro();" id="ctg_id" name="ctg_id" required>
							<option value=""></option>
							<?php
								while ($row = mysql_fetch_assoc($result)) {
									echo "<option value=".$row['ctg_id'].">".$row['ctg_name']."</option>";	
								}
							?>
						</select><br>
		Product Name: <select id="product_name" name="pro_id" required> </select><br>

		Quantity: <input type="number" name="quantity" required> <br>
		Unit Price: <input type="number" name="unit_prize" required><br>
		<input type="submit" name="submit" value="Add">
	</form>
	<button onclick="print()">Confirm</button>
	<button><a href="cancel_sales.php">Cancel</a></button>

	<br><br>
	<?php
		if(isset($_POST['submit'])){
		  $date = $_POST['date'];
		  $client_name = $_POST['client_name'];
		  $client_com_name = $_POST['client_com_name'];
		  $ctg_id = $_POST['ctg_id'];
		  $product_id = $_POST['pro_id'];
		  $quantity = $_POST['quantity'];
		  $unit_prize = $_POST['unit_prize'];
		  $total_prize = $quantity * $unit_prize;
		  mysql_query("INSERT INTO `temp_sales_trans`(`date`, `client_name`, `client_com_name`, `ctg_id`, `product_id`, `quantity`, `unit_prize`, `total_prize`) VALUES ('$date','$client_name','$client_com_name','$ctg_id','$product_id','$quantity','$unit_prize','$total_prize')");
		}
	?>

	<table border="1">
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
				echo "<tr> <td>". $row["date"]."</td> <td>" . $row["client_name"]. "</td><td>".$row["client_com_name"]."</td><td>".$row["ctg_name"]."</td><td>".$row["product_name"]."</td><td>".$row["quantity"]."</td><td>".$row["unit_name"]."</td><td>".$row["unit_prize"]."</td><td>".$row["total_prize"]."</td></tr>";
			}
			?>
		</tbody>
	</table>
</center>
</body>
<script type="text/javascript">
	function load_pro() {
		var ctg_id = $('#ctg_id').val();
		$.ajax({
				type: "POST",
				url: "ajax_loaded_item_option.php",
				data: { ctg_id : ctg_id },
				dataType: "html",
				success: function (data) {
					//$("#list").hide();
					$("#product_name").html(data);
				}
			});
	}
	function print(){
		window.location="confirm_sales.php";
	}
</script>
</html>