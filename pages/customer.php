<?php
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>J Shop</title>

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
            loadingImage: 'src/loading.gif',
            closeImage: 'src/closelabel.png'
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
                    <h1 class="page-header">รายชื่อสมาชิก(ลูกค้า)</h1>
                </div>

                <div id="maintable">
                    <div style="margin-top: -25px; margin-bottom: 21px; ">
                    </div>
                    <!--<a rel="facebox" id="addd" href="addcustomer.php" class="btn btn-primary">Add Customer</a><br><br>-->
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addc">
                            เพิ่มสามาชิก
                        </button>
                        <br><br>
                        <!-- Modal -->
                        <div class="modal fade" id="addc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel">เพิ่มสามาชิก</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="savecustomer.php" method="post" class="form-group ">
                                            <div id="ac">
                                                
                                                <span>ชื่อ : </span><input type="text" name="fname" class="form-control"
                                                    required />
                                                <span>ชื่อกลาง(ถ้ามี) : </span><input type="text" name="mname"
                                                    class="form-control"/>
                                                <span>นามสกุล : </span><input type="text" name="lname"
                                                    class="form-control" required />
                                                <span>ที่อยู่ : </span><input type="text" name="address"
                                                    class="form-control" required />
                                                <span>ติดต่อคุณ : </span><input type="text" name="contact"
                                                    class="form-control" required />
                                                <span>เบอร์ติดต่อ*(ตัวเลขเท่านั้น) : </span><input maxlength = "10" onkeypress="return isNumber(event)" oninput="maxLengthCheck(this)" type="text" name="memno"
                                                    class="form-control" required />
                                                <span>&nbsp;</span><input class="btn btn-primary btn-block btnn-gradient-border btnn-glow"
                                                    type="submit" value="บันทึก" class="form-control" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>
                    <table width="100%" class="table table-hover text-light" id="dataTables-example">
                        <thead  colspan="5" style="border-top:2px solid #FFFFFF">
                            <tr>
                                <th style="color:white"> โค้ดสมาชิก</th>
                                <th style="color:white"> ชื่อเต็ม</th>
                                <th style="color:white"> ชื่อ </th>
                                <th width="200px" style="color:white"> ชื่อกลาง</th>
                                <th style="color:white"> นามสกุล </th>
                                <th style="color:white"> ที่อยู่ </th>
                                <th style="color:white"> ติดต่อคุณ </th>
                                <th style="color:white"> เบอร์ติดต่อ </th>
                                <th style="color:white"> Action </th>
                            </tr>
                        </thead>
                        <tbody colspan="5" style="border-top:2px solid #FFFFFF">

                            <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM customer ORDER BY first_name");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record" colspan="5" style="border-top:2px solid #FFFFFF">
                                <td><?php echo $row['customer_name']; ?></td>
                                <td><?php echo $row['first_name'].
                                "&nbsp&nbsp".$row['middle_name'].
                                "&nbsp&nbsp".$row['last_name'] ?></td>
                                <td><?php echo $row['first_name']; ?></td>
                                <td><?php echo $row['middle_name']; ?></td>
                                <td><?php echo $row['last_name']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td align="right"><?php echo $row['contact']; ?></td>
                                <td align="right"><?php echo $row['membership_number']; ?></td>
                                <td><a rel="facebox" class="btn btn-primary"
                                        href="editcustomer.php?id=<?php echo $row['customer_id']; ?>">
                                        <i class="mdi mdi-pencil"> แก้ไข</i>
                                    </a>
                                    <a id="<?php echo $row['customer_id']; ?>" class="btn btn-danger delbutton"
                                        title="Click To Delete">
                                        <i class="mdi mdi-delete"> ลบ</i>
                                    </a>
                                </td>
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


                    $(".delbutton").click(function() {

                        //Save the link in a variable called element
                        var element = $(this);

                        //Find the id of the link that was clicked
                        var del_id = element.attr("id");

                        //Built a url to send
                        var info = 'id=' + del_id;
                        if (confirm("หากลบแล้วไม่สามารถกู้คืนได้!!")) {

                            $.ajax({
                                type: "GET",
                                url: "deletecustomer.php",
                                data: info,
                                success: function() {

                                }
                            });
                            $(this).parents(".record").animate({
                                    backgroundColor: "#fbc7c7"
                                }, "fast")
                                .animate({
                                    opacity: "hide"
                                }, "slow");

                        }

                        return false;

                    });

                });
                </script>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
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