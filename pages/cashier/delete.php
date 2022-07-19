<?php
	include('connect.php');
	$id=$_GET['id'];
	$inv=$_GET['invoice'];
	$dle=$_GET['dle'];
	$qty=$_GET['qty'];
	$pcode=$_GET['code'];
	//edit qty
	$sql = "UPDATE products 
			SET qty_left=qty_left+?
			WHERE product_code=?";
	$q = $db->prepare($sql);
	$q->execute(array($qty,$pcode));

	$result = $db->prepare("DELETE FROM sales_order WHERE transaction_id= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
	header("location: sales.php?id=$dle&invoice=$inv");
?>