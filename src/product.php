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
	<title>Inventory System || Product</title>
</head>
<body>
<a href="logout.php"> Log Out </a><br>
<a href="home.php"> Home </a>
<center>
	<a href="add_product.php"> Add Product </a><br/><br/>

	<table border="1">
		<thead>
			<tr>
				<th>ctg Name</th>
				<th>Product Name</th>
				<th>quantity</th>
				<th>total_prize</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$sql = "SELECT t1.`product_id`, t1.`product_name`, t2.`ctg_name`, t1.`quantity`, t1.`total_prize` FROM `product` as t1 INNER JOIN `category` as t2 on t1.`ctg_id` = t2.`ctg_id`";
			$result = mysql_query($sql);
			while($row = mysql_fetch_assoc($result)) {
					echo "<tr> <td>". $row["ctg_name"]."</td> <td>" . $row["product_name"]. "</td><td>".$row["quantity"]."</td><td>".$row["total_prize"]."</td><td><a href='remove_product.php?product_id=". $row["product_id"]."'>Remove</a></td> </tr>";
			}
		?>
		</tbody>
	</table>
</center>
</body>
</html>