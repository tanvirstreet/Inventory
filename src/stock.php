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
	<title>Inventory System || Stock</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<div class="add_ctg_heading">STOCK</div>
<div align="right" style="padding-right:20px; padding-top:20px"><a href="logout.php" class="btn btn-danger" style="width:110px">Logout</a></div>
<form action="stock.php?ctg_id=" method="GET">

<table style="width:33%">
<tr>
<td style="text-align:right; padding-right:15px"><b>Category</b></td>
<td style="padding-right:15px">
<select name="ctg_id" class="form-control" id="sel1">

					<option value="" disabled selected>select category</option>
					<?php
					$sql = "SELECT t1.`ctg_id`, t1.`ctg_name` FROM `category` as t1";
							$result = mysql_query($sql);
						while ($row = mysql_fetch_assoc($result)) {
							echo "<option value=".$row['ctg_id'].">".$row['ctg_name']."</option>";	
						}
					?>
				</select>
</td>
<td>
<input type="submit" name="submit" value="Search" class="btn btn-primary">
</td>
</tr>
</form>
</table>
<br>

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
	<table class="table-striped">
		<thead>
			<tr>
				<th>Category</th>
				<th>Product</th>
				<th>Quantity</th>
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
	<br>
	<br>
	<a href="home.php" class="btn btn-primary" style="width:110px"> Home </a>
</center>
</body>
<?php include 'footer2.php';?>

</html>