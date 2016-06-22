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
	<title>Inventory System || Add Product</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<div class="add_ctg_heading">ADD PRODUCT</div>
<div align="right" style="padding-right:20px; padding-top:20px"><a href="logout.php" class="btn btn-danger" style="width:110px">Logout</a></div>
<?php
	$sql = "SELECT t1.`ctg_id`, t1.`ctg_name` FROM `category` as t1";
			$result = mysql_query($sql);
?>
<div class="add_ctg" style="padding-top:25px; padding-bottom:10px">
	<form action="" method="POST">
		<table class="add_ctg_table" >
		
		<tr class="form-group">
		<td style="padding-right: 15px; padding-top:10px;">Product Name</td>
		<td><input type="text" name="product_name" class="form-control"></td>
		</tr>
		
		<tr class="form-group">
		<td style="padding-right: 15px;">Category name</td>
		<td><select name="ctg_id" class="form-control" id="sel1">
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
		<td style="padding-right: 15px;">Quantity</td>
		<td><input type="number" name="quantity" class="form-control"></td>
		</tr>
		
		<tr>
		<td colspan="2"><input type="submit" name="submit" onclick="alert('Product Susccefully Added');" value="Submit" class="btn btn-primary"></td>
		</tr>
		</table>
	</form>
</div>
	<br>
	<a href="product.php" class="btn btn-primary" style="width:100px">Back</a>&nbsp;
	<a href="home.php" class="btn btn-primary" style="width:100px">Home</a>
</center>
</body>
<?php
if(isset($_POST['submit'])){

	  $ctgId = $_POST['ctg_id'];
	  $productName = $_POST['product_name'];
	  $quantity = $_POST['quantity'];

	  mysql_query("INSERT INTO `product`(`product_name`, `ctg_id`, `quantity`) VALUES ('$productName','$ctgId', '$quantity')");
	  header('Location: product.php');
}

?>
<?php include 'footer2.php';?>
<br>
<br>
</html>