<?php
include('connect.php');
$id=$_GET['id'];
$result = $db->prepare("SELECT * FROM customer WHERE customer_id= :userid");
$result->bindParam(':userid', $id);
$result->execute();
for($i=0; $row = $result->fetch(); $i++){
	?>

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


<form action="saveeditcustomer.php" method="post" class="form-group">
    <div id="ac">
        <input type="hidden" name="memi" value="<?php echo $id; ?>" />
        <span>โค้ดสมาชิก :</span><input type="text" name="cname" class="form-control" required
            value="<?php echo $row['first_name']; ?>" />
        <span>ชื่อ : </span><input type="text" name="fname" class="form-control" required
            value="<?php echo $row['first_name']; ?>" />
        <span>ชื่อกลาง (ถ้ามี) : </span><input type="text" name="mname" class="form-control" 
            value="<?php echo $row['middle_name']; ?>" />
        <span>นามสกุล : </span><input type="text" name="lname" class="form-control" required
            value="<?php echo $row['last_name']; ?>" />
        <span>ที่อยู่ : </span><input type="text" name="address" class="form-control" required
            value="<?php echo $row['address']; ?>" />
        <span>ติดต่อคุณ : </span><input type="text" name="contact" class="form-control" required
            value="<?php echo $row['contact']; ?>" />
        <span>เบอร์ติดต่อ*(ตัวเลขเท่านั้น): </span><input type="text" name="memno" class="form-control"  maxlength = "10" onkeypress="return isNumber(event)" required
            value="<?php echo $row['membership_number']; ?>" />
        <span>&nbsp;</span><input class="btn btn-primary btn-block btnn-gradient-border btnn-glow" type="submit" class="form-control" value="บันทึก" />
    </div>
</form>
<?php
}
?>
<script type="text/javascript">
$(function() {
    $("#myform1").on("submit", function() {
        var form = $(this)[0];
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});
</script>


 <!-- plugins:js -->
 <script src="assets/vendors/js/vendor.bundle.base.js"></script>
      <!-- endinject -->
      <!-- Plugin js for this page -->
      <!-- <script src="assets/vendors/chart.js/Chart.min.js"></script> -->
      <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
      <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
      <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
      <!-- End plugin js for this page -->
      <!-- inject:js -->
      <script src="assets/js/off-canvas.js"></script>
      <script src="assets/js/hoverable-collapse.js"></script>
      <script src="assets/js/misc.js"></script>
      <script src="assets/js/settings.js"></script>
      <script src="assets/js/todolist.js"></script>
      <!-- endinject -->
      <!-- Custom js for this page -->
      <script src="assets/js/dashboard.js"></script>
      <!-- End custom js for this page -->
      <!-- Custom js for this page -->

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
<script type="text/javascript">
  function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
</script>