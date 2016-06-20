<?php
include "db.php";

	$sql = "SELECT t1.`date`, t1.`ctg_id`, t1.`product_id`, t1.`quantity`, t1.`unit_prize`, t1.`total_prize`, t2.`ctg_name`,t2.`unit_name`,t3.`product_name` FROM `temp_purchase_trans` as t1 INNER JOIN `category` as t2 on t1.`ctg_id`=t2.`ctg_id` INNER JOIN `product` as t3 on t1.`product_id`= t3.`product_id`";

	$result = mysql_query($sql);
	$c = 0;

	while ($row = mysql_fetch_assoc($result)) {
		echo "insert in sales_trans <br>";
		$date = $row['date'];
		$client_name = $row['client_name'];
		$client_com_name = $row['client_com_name'];
		$ctg_id = $row['ctg_id'];
		$product_id = $row['product_id'];
		$quantity = $row['quantity'];
		$unit_prize = $row['unit_prize'];
		$total_prize = $row['total_prize'];

		echo $client_name . "<br>";
		mysql_query("INSERT INTO `purchase_trans`(`date`, `ctg_id`, `product_id`, `quantity`, `unit_prize`, `total_prize`) VALUES ('$date','$ctg_id','$product_id','$quantity','$unit_prize','$total_prize')");
		$c++;
		
		echo "Select from product for quantity<br>";

		$result2 = mysql_query("SELECT `quantity` FROM `product` WHERE `product_id`='$product_id'");
		$row1 = mysql_fetch_assoc($result2);
		$old_quantity = $row1['quantity'];

		echo  "main =  old - new[sales_trans quantity]<br>"; 
		$main_quantity = $old_quantity + $quantity;

		echo "update into product<br>";
		mysql_query("UPDATE `product` SET `quantity`='$main_quantity' WHERE `product_id`='$product_id'");

	}


		echo $c;
	//	die();
	$sql = "TRUNCATE TABLE temp_purchase_trans";
	mysql_query($sql);

	header('Location: purchase.php');

?>