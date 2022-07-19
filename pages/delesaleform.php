<?php
	include('connect.php');
	$result = $db->prepare("DELETE FROM sales_order");
	$result->execute();
?>

