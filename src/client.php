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
	<title>Inventory System || Clients</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<div class="add_ctg_heading">CLIENTS</div>
<div align="right" style="padding-right:20px; padding-top:20px"><a href="logout.php" class="btn btn-danger" style="width:110px">Logout</a></div>

	<table class="table-striped" style="margin-top:20px; width:75%">
		<thead>
			<tr>
				<th>Client Name</th>
				<th>Company Name</th>
				<th>Total Amount</th>
				<th>Paid</th>
				<th>Due</th>
				<th>Edit</th>
				<th>Remove</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$sql = "SELECT * FROM `client`";
			$result = mysql_query($sql);
			while($row = mysql_fetch_assoc($result)) {
					echo "<tr><td>" . $row["client_name"]. "</td><td>".$row["client_com_name"]."</td><td>".$row["total_amount"]."</td><td>".$row["paid"]."</td><td>".$row["due"]."</td><td><a href='edit_client.php?client_id=". $row["client_id"]."'>Edit</a></td><td><button onclick='removeItem(". $row["client_id"].");'>Remove</button</td></tr>";
			}
		?>
		</tbody>
	</table>
	<br>
	<br>
	<a href="add_client.php" class="btn btn-primary" style="width:100px">Add New</a>&nbsp;
	<a href="home.php" class="btn btn-primary" style="width:100px">Home</a>
</center>
</body>
<script type="text/javascript">

	function removeItem(id) {
		var r = confirm("Do you want Remove this Category ?");
		if (r == true) {
			window.location="remove_client.php?client_id=" + id;
		}
	}

</script>
<?php include 'footer2.php';?>
</html>