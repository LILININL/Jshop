<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM producttype WHERE idtype= :userid");
	$result->bindParam(':userid',$id);
	$result->execute();
?>