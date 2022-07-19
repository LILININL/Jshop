<?php
	include('connect.php');
	$id=$_GET['id'];
	$c=$_GET['invoice'];
	$sdsd=$_GET['dle'];
	$qty=$_GET['qty'];
	$wapak=$_GET['code'];
	//edit qty
	$sql = "UPDATE sales_order 
			SET qty=qty+?
			WHERE qty=?";
	$q = $db->prepare($sql);
	$q->execute(array($qty,$wapak));
    $qty = $qty+$qty; 

	$result = $db->prepare("INSERT INTO sales_order WHERE transaction_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: sales.php?id=$sdsd&invoice=$c");
?>