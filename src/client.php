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
	<title>Inventory System || Client</title>
</head>
<body>
<a href="logout.php"> Log Out </a><br>
<a href="home.php"> Home </a>
<center>
	<a href="add_client.php"> Add Client </a><br/><br/>

	<table border="1">
		<thead>
			<tr>
				<th>Client ID</th>
				<th>Client Name</th>
				<th>Company Name</th>
				<th>Total Amount</th>
				<th>Paid</th>
				<th>Due</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$sql = "SELECT * FROM `client`";
			$result = mysql_query($sql);
			while($row = mysql_fetch_assoc($result)) {
					echo "<tr> <td>". $row["client_id"]."</td> <td>" . $row["client_name"]. "</td><td>".$row["client_com_name"]."</td><td>".$row["total_amount"]."</td><td>".$row["paid"]."</td><td>".$row["due"]."</td><td><a href='edit_client.php?client_id=". $row["client_id"]."'>Edit</a></td><td><a href='remove_client.php?client_id=". $row["client_id"]."'>Delete</a></td></tr>";
			}
		?>
		</tbody>
	</table>
</center>
</body>
</html>