<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM supliers WHERE suplier_id= :userid");
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
  <div class="modal-content">   
  
  <div class="modal-body">
      
<form action="saveeditsupplier.php" method="post" class="form-group">
    <div id="ac">
        <input type="hidden" class="form-control" name="memi" value="<?php echo $id; ?>" />
        <span>ชื่อผู้ขาย : </span><input type="text" class="form-control" name="name"
            value="<?php echo $row['suplier_name']; ?>" />
        <span>ชื่อพนักงาน : </span><input type="text" class="form-control" name="cperson"
            value="<?php echo $row['contact_person']; ?>" />
        <span>ที่อยู่ : </span><input type="text" class="form-control" name="address"
            value="<?php echo $row['suplier_address']; ?>" />
        <span>เบอร์ติดต่อ*(เฉพาะตัวเลข) : </span><input id="num" maxlength="10" oninput="return onlynum()" type="text" class="form-control" name="contact" required
            value="<?php echo $row['suplier_contact']; ?>" />
        <span>&nbsp;</span><input class="btn btn-primary btn-block btnn-gradient-border btnn-glow" type="submit" value="บันทึก" class="form-control" />
    </div>
    </div>  </div></div>  </div>
</form>

<?php
}
?>
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
      <script>
    $(function() {
        $("input[name='numonly']").on('input', function(e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
    });
</script>
<script>
    function onlynum() {
        var fm = document.getElementById("form2");
        var ip = document.getElementById("num");
        var tag = document.getElementById("value");
        var res = ip.value;
  
        if (res != '') {
            if (isNaN(res)) {
                  
                // Set input value empty
                ip.value = "";
                  
                // Reset the form
                fm.reset();
                return false;
            } else {
                return true
            }
        }
    }
</script>
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
<script>
  function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
</script>