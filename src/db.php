<?php
	$conn = mysql_connect('localhost', 'root', '');
	if(!$conn)
	{
		die('Error connecting database');
	}
	mysql_select_db('inventory_system', $conn);

?>