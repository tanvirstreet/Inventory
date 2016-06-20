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
	<title>Inventory System || Add Category</title>
</head>
<body>
<center>
<h1>Add Category</h1>
<a href='category.php'>Category</a>
<hr>
	<form action="" method="POST">
		Category Name: <input type="text" name="ctg_name"> <br>
		Unit Name: <input type="text" name="unit_name"> <br>

		<input type="submit" name="submit" value="Submit">
	</form>
</center>
</body>
<?php
if(isset($_POST['submit'])){

	  $ctgName = $_POST['ctg_name'];
	  $unitName = $_POST['unit_name'];
	  mysql_query("INSERT INTO `category`(`ctg_name`, `unit_name`) VALUES ('$ctgName','$unitName')");
}

?>
</html>