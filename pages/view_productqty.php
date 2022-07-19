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
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- DataTables CSS -->
    <link href="../vendors/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendors/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

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

        <div id="page-wrapper">
            <div class="container" style="margin-left:15px;">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">รายการสินค้าที่หมด</h2>
                    </div>
                    <div class="table-responsive-xl">
                        <div id="maintable" class="table-responsive-xl">
                                <table width="100%" class="table table-responsive  table-hover text-light"
                                    id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th width="220px"> รหัสสินค้า </th>
                                            <th width="100%"> ชื่อสินค้า </th>
                                            <th width="300px"> รายละเอี่ยดสินค้า </th>
                                            <th width="100%"> Supplier </th>
                                            <th width="100px"> จำนวนสินค้า </th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-responsive-xl">
                                        <?php
                          include('connect.php');
                          $result = $db->prepare("SELECT * FROM products where qty_left <= 5 ORDER BY product_id DESC");
                          $result->execute();
                          for($i=0; $row = $result->fetch(); $i++){
                            ?>
                                        <tr class="record">
                                            <td>
                                                <font style="color:red;">JSHP-<?php echo $row['product_id']; ?>
                                            </td>
                                            <td>
                                                <font style="color:red;"><?php echo $row['product_name']; ?>
                                            </td>
                                            <td>
                                                <font style="color:red;"><?php echo $row['description_name']; ?>
                                            </td>
                                            <td>
                                                <font style="color:red;"><?php echo $row['supplier']; ?>
                                            </td>
                                            <td>
                                                <font style="color:red;"><?php echo $row['qty_left']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                            ?>
                                    </tbody>
                                </table>
                             </div>
                </div>
            </div>
                            <div class="clearfix"></div>
                            <!-- /.container-fluid -->
                        </div>
                        <script src="js/jquery.js"></script>
                        <!-- /#page-wrapper -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

         <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
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
       <!-- Plugin js for this page --><!-- DataTables JavaScript -->
       <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
        <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
        </script>

</body>

</html>