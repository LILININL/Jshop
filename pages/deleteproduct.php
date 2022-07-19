<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM products WHERE product_id = :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	header("location: products.php");
?>