<?php include('auth.php');?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>J shop</title>
    
    <link rel="shortcut icon" href="logoc.jpg">
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

<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
        <script type="text/javascript">
          jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox({
              loadingImage : 'src/loading.gif',
              closeImage   : 'src/closelabel.png'
          })
        })
    </script>

</head>

<body class="dark-edition">
<div class="container-scroller">
    <?php include('navfixed.php');?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container"  style="margin-left:20px; margin-top: -60px;" >
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 70px; margin-bottom: 15px; ">
                    <h1 class="page-header">การจัดการผู้ขาย</h1>
                </div>
                <div id="maintable">
                    <div style="margin-top: -25px; margin-bottom: 21px; ">
                    </div>
                    <div class="panel-body">
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary " data-toggle="modal" data-target="#adds">
                        เพิ่มผู้ขาย
                        </button>
                        <br><br>
                        <!-- Modal -->
                        <div class="modal fade" id="adds" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">เพิ่มร้านค้า</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true" style="color:white">&times; </button>
                                    </div>
                                    <div class="modal-body">
                                     <form action="savesupplier.php" method="post" class = "form-group">
                                        <div id="ac">
                                            <span>ชื่อผู้ขาย : </span><input type="text" name="name" class = "form-control" required/>
                                            <span>ชื่อผู้ติดต่อ : </span><input type="text" name="cperson" class = "form-control" required/>
                                            <span>ที่อยู่ : </span><input type="text" name="address" class = "form-control" required/>
                                            <span>เบอร์ติดต่อ*(เฉพาะตัวเลข) : </span><input id="num"  oninput="return onlynum()" maxlength="10" type="text" name="contact" class = "form-control" required/>
                                            <span>&nbsp;</span><input class="btn btn-primary btn-block btnn-gradient-border btnn-glow"  type="submit" value="บันทึก" class = "form-control" />
                                        </div>
                                    </form>
                                </div></div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                </div>

                <table  class="table table-hover text-light " id="dataTables-example">
                    <thead colspan="4" style="border-top:2px solid #FFFFFF">
                        <tr>
                            <th style="color:white"> ชื่อผู้ขาย </th>
                            <th style="color:white"> ชื่อผู้ติดต่อ </th>
                            <th style="color:white"> ที่อยู่ </th>
                            <th style="color:white"> เบอร์ติดต่อ </th>
                            <th style="color:white"> จัดการ </th>
                        </tr>
                    </thead>
                    <tbody colspan="4" style="border-top:2px solid #FFFFFF">

                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM supliers ORDER BY suplier_id DESC");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record" colspan="4" style="border-top:2px solid #FFFFFF">
                                <td><?php echo $row['suplier_name']; ?></td>
                                <td><?php echo $row['contact_person']; ?></td>
                                <td><?php echo $row['suplier_address']; ?></td>
                                <td align="centers"><?php echo $row['suplier_contact']; ?></td>
                                <td>
                                <a rel="facebox" class="btn btn-primary" href="editsupplier.php?id=<?php echo $row['suplier_id']; ?>"> <i class="mdi mdi-pencil btn-icon-fa-pencil"> แก้ไข</i> </a> 
                                <a  class="btn btn-danger delbutton" href="deletesupplier.php?id=<?php echo $row['suplier_id']; ?>"><i class="mdi mdi-delete btn-icon-append"> ลบ</i> </a> 
                                 
                            </tr>
                            <?php
                        }
                        ?>

                    </tbody>
                </table>
                <div class="clearfix"></div>
            </div>
            <script src="js/jquery.js"></script>
            <script type="text/javascript">
                $(function() {


                    $(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
if(confirm("ยืนยันว่าจะลบ ลบแล้วเอากลับคืนมาไม่ได้ ?!"))
{

 $.ajax({
   type: "GET",
   url: "deletesupplier.php",
   data: info,
   success: function(){

   }
});
 $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
 .animate({ opacity: "hide" }, "slow");

}

return false;

});
                });
            </script>
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

        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->


<!-- Page-Level Demo Scripts - Tables - Use for reference -->





<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
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
      </body>
</html>
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