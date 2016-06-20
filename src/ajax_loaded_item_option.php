<?php
	include "db.php";
	$ctg_id = $_POST['ctg_id'];
	
	$sql = "SELECT * FROM `product` WHERE ctg_id='$ctg_id'";
	$result = mysql_query($sql);
		echo "<option value=''></option>";
	while ($row = mysql_fetch_assoc($result)) {
		echo "<option value=".$row['product_id'].">".$row['product_name']."</option>";	
	}
?>