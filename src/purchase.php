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
	<title>Inventory System || Purchase</title>
	<script src="jquery-1.12.3.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<div class="add_ctg_heading">PURCHASE</div>
<div align="right" style="padding-right:20px; padding-top:20px">
<a href="home.php" class="btn btn-info" style="width:110px">Home</a>
<a href="logout.php" class="btn btn-danger" style="width:110px">Logout</a>
</div>


<?php
$sql = "SELECT t1.`ctg_id`, t1.`ctg_name` FROM `category` as t1";
		$result = mysql_query($sql); 
?>
<div class="add_ctg" style="padding-top:20px; padding-bottom:5px">
	<form action="" method="post">
	<table class="add_ctg_table">
	<tr class="form-group">
		<td style="padding-right: 15px;">Date</td>
		<td><input type="date" name="date" placeholder="yyyy-mm-dd" class="form-control"></td>
	</tr>
	
	<tr class="form-group">
		<td style="padding-right: 15px;">Category Name</td>
		<td><select onchange="load_pro();" id="ctg_id" name="ctg_id" class="form-control" id="sel1">
							<option value="" disabled selected>select category</option>
							<?php
								while ($row = mysql_fetch_assoc($result)) {
									echo "<option value=".$row['ctg_id'].">".$row['ctg_name']."</option>";	
								}
							?>
						</select>
		</td>
	</tr>
	
	<tr class="form-group">
		<td style="padding-right: 15px;">Product Name</td>
		<td><select id="product_name" name="pro_id" class="form-control" id="sel1">
		<option value="" disabled selected>select product</option>
		</select></td>
	</tr>
	
	<tr class="form-group">
		<td style="padding-right: 15px;">Quantity</td>
		<td><input type="number" name="quantity" class="form-control"></td>
	</tr>
	
	<tr class="form-group">
		<td style="padding-right: 15px;">Unit Price</td>
		<td><input type="number" name="unit_prize" class="form-control"></td>
	</tr>
	
	<tr class="form-group">
		<td colspan="2"><input type="submit" name="submit" value="Add" class="btn btn-primary" style="width:80px"></td>
	</tr>
	
	<tr class="form-group">
		<td style="text-align:right"><a href="confirm_purchase.php" class="btn btn-primary" style="width:100px">Confirm</a></td>
		<td style="text-align:left; padding-left:20px"><a href="cancel_purchase.php" class="btn btn-primary" style="width:100px">Cancel</a></td>
	</tr>
	
	</table>
	</form>
</div>


	<?php
		if(isset($_POST['submit'])){

		  $date = $_POST['date'];
		  $ctg_id = $_POST['ctg_id'];
		  //$product_name
		  $product_id = $_POST['pro_id'];
			//echo $product_name;die();

		  //$product_id = $row['product_id'];
		  $quantity = $_POST['quantity'];
		  $unit_prize = $_POST['unit_prize'];
		  $total_prize = $quantity * $unit_prize;

		  mysql_query("INSERT INTO `temp_purchase_trans`(`date`, `ctg_id`, `product_id`, `quantity`, `unit_prize`, `total_prize`) VALUES ('$date','$ctg_id','$product_id','$quantity','$unit_prize','$total_prize')");
		}

	?>

	<table class="table-striped" style="margin-top:30px; width:80%">
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
				$sql = "SELECT t1.`date`, t1.`ctg_id`, t1.`product_id`, t1.`quantity`, t1.`unit_prize`, t1.`total_prize`, t2.`ctg_name`,t2.`unit_name`,t3.`product_name` FROM `temp_purchase_trans` as t1 INNER JOIN `category` as t2 on t1.`ctg_id`=t2.`ctg_id` INNER JOIN `product` as t3 on t1.`product_id`= t3.`product_id`";

				$result = mysql_query($sql);

			while ($row = mysql_fetch_assoc($result)) {
				echo "<tr> <td>". $row["date"]."</td><td>".$row["ctg_name"]."</td><td>".$row["product_name"]."</td><td>".$row["quantity"]."</td><td>".$row["unit_name"]."</td><td>".$row["unit_prize"]."</td><td>".$row["total_prize"]."</td></tr>";
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
					//alert(data);
					//$("#list").hide();
					$("#product_name").html(data);
				}
			});
		//alert("selected Subject: "+subject);

	}

</script>
<?php include 'footer2.php';?>
</html>