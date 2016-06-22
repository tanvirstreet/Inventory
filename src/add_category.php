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
	<title>Inventory System || Add Category</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<center>
<div class="add_ctg_heading">ADD CATEGORY</div>
<div align="right" style="padding-right:20px; padding-top:20px"><a href="logout.php" class="btn btn-danger" style="width:110px">Logout</a></div>
<div class="add_ctg">
	<form action="" method="POST">
		<table class="add_ctg_table">
			<tr class="form-group">
				<td style="padding-right: 15px;">Category Name</td>
				<td><input type="text" name="ctg_name" class="form-control" required></td><br>
			</tr>

			<tr class="form-group">
				<td style="padding-right: 15px">Unit Name</td>
				<td><input type="text" name="unit_name" class="form-control" required></td>
			</tr>
			
			<tr>
				<td colspan="2" align="right"><input type="submit" onclick="alert('Category Susccefully Added');" name="submit" value="Submit" class="btn btn-primary"></td>
			</tr>
			
		</table>
	</form>
</div>
<br>
	<a href="category.php" class="btn btn-primary" style="width:100px">Back</a>&nbsp;
	<a href="home.php" class="btn btn-primary" style="width:100px">Home</a>
	<br>
	<br>
</center>
</body>
<?php
if(isset($_POST['submit'])){

	  $ctgName = $_POST['ctg_name'];
	  $unitName = $_POST['unit_name'];
	  mysql_query("INSERT INTO `category`(`ctg_name`, `unit_name`) VALUES ('$ctgName','$unitName')");
	header('Location: category.php');
}
?>
<?php include 'footer.php';?>
</html>