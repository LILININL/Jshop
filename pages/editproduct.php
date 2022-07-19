<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
 <!-- Required meta tags -->
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Jshop</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->


<form action="saveeditproduct.php" method="post" class="form-group">
    <div id="ac">
        <input type="hidden" name="memi" value="<?php echo $id; ?>" />
        <span>โค้ดสินค้า : </span><input type="text" name="code" class="form-control"
            value="<?php echo $row['product_code']; ?>" required/>
        <span>ชื่อสินค้า : </span><input type="text" name="bname" class="form-control"
            value="<?php echo $row['product_name']; ?>" required/>
        <span>รายละเอี่ยดสินค้า : </span><input type="text" name="dname" class="form-control"
            value="<?php echo $row['description_name']; ?>" required/>
        <span>ราคารับมา(ตัวเลขเท่านั้น) : </span><input type="text" name="cost" class="form-control" value="<?php echo $row['cost']; ?>" onkeypress=" return isNumber(event)" required />
        <span>ราคาที่จะขาย(ตัวเลขเท่านั้น) : </span><input type="text" name="price" class="form-control" value="<?php echo $row['price']; ?>" onkeypress=" return isNumber(event)" required />
        <span>ผู้ขาย : </span>
        <select name="supplier" class="form-control">
            <option><?php echo $row['supplier']; ?></option>
            <?php
	$results = $db->prepare("SELECT * FROM supliers");
		$results->bindParam(':userid', $res);
		$results->execute();
		for($i=0; $rows = $results->fetch(); $i++){
	?>
            <option><?php echo $rows['suplier_name']; ?></option>
            <?php
	}
	?>
        </select>
        <span>หน่วยนับสินค้า: </span>
        <select name="unit" class="form-control">
        <?php            
                                include('connect.php');
                                $result1 = $db->prepare("SELECT * FROM unittype");
                                $result1->bindParam(':userid', $res);
                                $result1->execute();
                                for($i=0; $row = $result1->fetch(); $i++){
                                    ?>
                                 <option><?php echo $row['unittype']; ?></option>
                                <?php
                                }
                                ?> 
        </select>

        <span>ประเภทสินค้า: </span>
        <select name="categ" class="form-control">
        <?php            
                                include('connect.php');
                                $result1 = $db->prepare("SELECT * FROM producttype");
                                $result1->bindParam(':userid', $res);
                                $result1->execute();
                                for($i=0; $row = $result1->fetch(); $i++){
                                    ?>
                                 <option><?php echo $row['typeproduct']; ?></option>
                                <?php
                                }
                                ?>       
        </select>
        <span>&nbsp;</span><input class="btn btn-primary btn-block btnn-gradient-border btnn-glow" type="submit" class="form-control" value="บันทึก" />
    </div>
</form>
<?php
}
?>
<script type="text/javascript"> 
     function isNumber(evt)
		 {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true; }
    </script>
