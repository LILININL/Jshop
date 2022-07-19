<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM supliers WHERE suplier_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	
    
?>

