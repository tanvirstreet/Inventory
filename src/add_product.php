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
</head>
<body>
<center>
<h1>Add Product</h1>
<a href='product.php'>Product</a>
<hr>
<?php
	$sql = "SELECT t1.`ctg_id`, t1.`ctg_name` FROM `category` as t1";
			$result = mysql_query($sql);
?>
	<form action="" method="POST">
		Product Name: <input type="text" name="product_name"> <br>
		Category name: <select name="ctg_id">
							<option value=""></option>
							<?php
								while ($row = mysql_fetch_assoc($result)) {
									echo "<option value=".$row['ctg_id'].">".$row['ctg_name']."</option>";	
								}
							?>
						</select><br>
		Quantity : <input type="number" name="quantity"><br>
		Unit price : <input type="number" name="unit_prize"><br>

		<input type="submit" name="submit" value="Submit">
	</form>
</center>
</body>
<?php
if(isset($_POST['submit'])){

	  $ctgId = $_POST['ctg_id'];
	  $productName = $_POST['product_name'];
	  $quantity = $_POST['quantity'];
	  $unit_prize = $_POST['unit_prize'];
	  $total_prize = $quantity * $unit_prize;

	  mysql_query("INSERT INTO `product`(`product_name`, `ctg_id`, `quantity`, `total_prize`) VALUES ('$productName','$ctgId', '$quantity','$total_prize')");
}

?>
</html>