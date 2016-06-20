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
	<title>Inventory System || Stock</title>
</head>
<body>
<a href="logout.php"> Log Out </a><br>
<a href="home.php"> Home </a>
<center>
<form action="stock.php?ctg_id=" method="GET">
Select Category: <select name="ctg_id">
					<option value=""></option>
					<?php
					$sql = "SELECT t1.`ctg_id`, t1.`ctg_name` FROM `category` as t1";
							$result = mysql_query($sql);
						while ($row = mysql_fetch_assoc($result)) {
							echo "<option value=".$row['ctg_id'].">".$row['ctg_name']."</option>";	
						}
					?>
				</select>
				<input type="submit" name="submit">
</form>

<?php
if(isset($_GET['ctg_id'])){

	  $ctgId = $_GET['ctg_id'];
	  if ($ctgId != "") {
	  	$sql = "SELECT t1.`product_id`, t1.`product_name`, t2.`ctg_name`, t1.`quantity`, t2.`unit_name` FROM `product` as t1 INNER JOIN `category` as t2 on t1.`ctg_id` = t2.`ctg_id` WHERE t1.`ctg_id`='$ctgId'";
	  }else{
	  	$sql = "SELECT t1.`product_id`, t1.`product_name`, t2.`ctg_name`, t1.`quantity`, t2.`unit_name` FROM `product` as t1 INNER JOIN `category` as t2 on t1.`ctg_id` = t2.`ctg_id`";	
	  }
	  
}else{
	$sql = "SELECT t1.`product_id`, t1.`product_name`, t2.`ctg_name`, t1.`quantity`, t2.`unit_name` FROM `product` as t1 INNER JOIN `category` as t2 on t1.`ctg_id` = t2.`ctg_id`";	
}
?>
	<table border="1">
		<thead>
			<tr>
				<th>Category Name</th>
				<th>Product Name</th>
				<th>quantity</th>
				<th>Unit</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$result = mysql_query($sql);
			while($row = mysql_fetch_assoc($result)) {
					echo "<tr> <td>". $row["ctg_name"]."</td> <td>" . $row["product_name"]. "</td><td>".$row["quantity"]."</td><td>".$row["unit_name"]."</td></tr>";
			}
		?>
		</tbody>
	</table>
</center>
</body>
</html>