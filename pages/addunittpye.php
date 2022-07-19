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
        <div class="container"  style="width: 1500px; margin-left: 200px;">
            <div class="row">
                <div class="col-lg-12" style="margin-top: 70px; margin-bottom: 15px; ">
                    <h1 class="page-header">รายการหน่วยนับสินค้า</h1>
                </div>

                <div id="maintable">
                    <div style="margin-top: -25px; margin-bottom: 21px; ">
                    </div>
                    <!--<a rel="facebox" id="addd" href="addcustomer.php" class="btn btn-primary">Add Customer</a><br><br>-->
                        <!-- Button trigger modal -->
                        <a class="btn btn-primary" href="products.php"><i
                                class="mdi mdi-arrow-left-bold">
                                ย้อนกลับ</i></a>
                        <a href="#unitadd" data-toggle="modal" class="btn btn-primary">เพิ่มหน่วยนับสินค้า</a>     
                        <?php include 'addunit.php'; ?>  
                        <br><br>
                        <!-- Modal -->
                        <div class="modal fade" id="addc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>
                    <table class="table table-hover text-light" id="dataTables-example">
                        <thead colspan="5" style="border-top:2px solid #FFFFFF">
                            <tr>
                                <th style="color:white"> ประเภทสินค้า </th>
                                
                                <th style="color:white"> จัดการ </th>
                            </tr>
                        </thead>
                        <tbody colspan="5" style="border-top:2px solid #FFFFFF">

                            <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM unittype ORDER BY unittype");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                            <tr class="record" colspan="5" style="border-top:2px solid #FFFFFF">
                                <td><?php echo $row['unittype']; ?></td>
                                
                                <td><a rel="facebox" class="btn btn-primary"
                                        href="editunit.php?id=<?php echo $row['unitid']; ?>">
                                        <i class="mdi mdi-pencil"> แก้ไข</i>
                                    </a>
                                    <a id="<?php echo $row['unitid'];?>" class="btn btn-danger delbutton"
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
                                url: "deleteunit.php",
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