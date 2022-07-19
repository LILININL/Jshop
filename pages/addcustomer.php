
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<form action="savecustomer.php" method="post" class = "form-group">
	<div id="ac">
    <span>โค้ดลูกค้า : </span><input type="text" name="cname" class = "form-control" required />
		<span>ชื่อลูกค้า : </span><input type="text" name="name" class = "form-control" required />
		<span>ที่อยู่ : </span><input type="text" name="address" class = "form-control"  required/>
		<span>เบอร์ติดต่อ*(ตัวเลขเท่านั้น) : </span><input type="text" name="contact" class = "form-control" maxlength = "10" onkeypress=" return isNumber(event)" required />
		<span>รหัสพนักงาน No: </span><input type="text" name="memno" class = "form-control"  required />
		<span>&nbsp;</span><input class="btnn btnn-gradient-border btnn-glow" type="submit" value="บันทึก" class = "form-control" required />
	</div>
</form>

<script type="text/javascript">
$(function(){
     $("#myform1").on("submit",function(){
         var form = $(this)[0];
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');         
     });     
});
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
