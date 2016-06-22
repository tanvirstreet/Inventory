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
	<title>Inventory System || Category</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<div class="add_ctg_heading">CATEGORY</div>
<div align="right" style="padding-right:20px; padding-top:20px"><a href="logout.php" class="btn btn-danger" style="width:110px">Logout</a></div>

	<table class="table-striped" style="margin-top:10px;">
		<thead>
			<tr>
				<th>Category Name</th>
				<th>Unit Name</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$sql = "SELECT * FROM `category`";
			$result = mysql_query($sql);
			while($row = mysql_fetch_assoc($result)) {
					echo "<tr> <td>". $row["ctg_name"]."</td> <td>" . $row["unit_name"]. "</td> <td><button onclick='removeItem(". $row["ctg_id"].");'>Remove</button></td> </tr>";
			}
		?>
		</tbody>
	</table>
	<br>
	<br>
	<a href="add_category.php" class="btn btn-primary" style="width:100px">Add New</a>&nbsp;
	<a href="home.php" class="btn btn-primary" style="width:100px">Home</a>
</center>
</body>
<script type="text/javascript">

	function removeItem(id) {
		var r = confirm("Do you want Remove this Category ?");
		if (r == true) {
			window.location="remove_category.php?ctg_id=" + id;
		}
	}

</script>
<?php include 'footer2.php';?>
</html>