<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM unittype WHERE unitid= :userid");
	$result->bindParam(':userid',$id);
	$result->execute();
?>