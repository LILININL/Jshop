<?php
	include('connect.php');
	$id=$_GET['id'];
	$sdsd=$_GET['purchases_item'];
	$result = $db->prepare("DELETE FROM purchases_item WHERE purchases_item = :a");
	$result->bindParam( ':a', $sdsd);
	$result->execute();
?>
