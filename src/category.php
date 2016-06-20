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
</head>
<body>
<a href="logout.php"> Log Out </a><br>
<a href="home.php"> Home </a>
<center>
	<a href="add_category.php"> Add Category </a><br/><br/>

	<table border="1">
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
					echo "<tr> <td>". $row["ctg_name"]."</td> <td>" . $row["unit_name"]. "</td> <td><a href='remove_category.php?ctg_id=". $row["ctg_id"]."'>Remove</a></td> </tr>";
			}
		?>
		</tbody>
	</table>
</center>
</body>
</html>