<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>

	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


<form action="saveproduct_pullout.php" method="post" class = "form-group">
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>รหัสสินค้า : </span><input type="text" name="code" class = "form-control" value="<?php echo $row['product_code']; ?>" />
<span>ชื่อสินค้า : </span><input type="text" name="bname" class = "form-control" value="<?php echo $row['product_name']; ?>" />
<span>รายละเอี่ยดสินค้า : </span><input type="text" name="dname" class = "form-control" value="<?php echo $row['description_name']; ?>" />
<span>จำนวนสินค้า : </span><input type="text" name="qty" class = "form-control" value="<?php echo $row['qty_left']; ?>"> 
<span>ค่าใช้จ่าย : </span><input type="text" name="cost" class = "form-control" value="<?php echo $row['cost']; ?>" />
<span>ประเภท: </span><input type="text" name="categ" class = "form-control" value="<?php echo $row['category']; ?>" />
<input type="hidden" name="exdate" class = "form-control" value="<?php echo $row['expiration_date']; ?>" />
<span>&nbsp;</span><input class="btn btn-primary btn-block" type="submit" class = "form-control" value="Pull Out" />
</div>
</form>
<?php
}
?>