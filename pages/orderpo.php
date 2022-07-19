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

    <?php
function Password() {
    $chars = "003232303232023232023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}
$code='JSH-'.Password();
?>

</head>

<body class="dark-edition">
<div class="container-scroller">
    <?php include('navfixed.php');?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container"  style="margin-left:20px; margin-top: -60px;" >
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 70px; margin-bottom: 15px; ">
                    <h1 class="page-header">ใบสั่งซื้อ</h1>
                </div>
                <table width="100%" class="table table-hover text-light" id="dataTables-example">

                    <thead colspan="5" style="border-top:2px solid #FFFFFF">
                        <tr>
                            <!-- <th class="hidden">ID</th> -->
                            <th style="color:white"> Supplier </th>
                            <th style="color:white"> ใบสั่ง </th>
                        </tr>
                    </thead>
                    <tbody colspan="5" style="border-top:2px solid #FFFFFF">
                        <?php
                    include('connect.php');
                    $result = $db->prepare("SELECT * FROM supliers ORDER BY suplier_name");
                    $result->execute();
                    for($i=0; $row = $result->fetch(); $i++){
                        ?>
                        <tr class="record" colspan="5" style="border-top:2px solid #FFFFFF">
                            <!-- <td class="hidden"><?php echo $row['suplier_id']; ?></td> -->
                            <td width="80%"><?php echo $row['suplier_name']; ?></td>
                            <td width="10%"><a class="btn btn-primary"
                                    href="purchase.php?name=<?php echo $row['suplier_name']; ?>&invoice=<?php echo $code;?>"><span><i
                                            class="mdi mdi-cart"></i></span> สั่งซื้อ</a> </td>
                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                    <div class="clearfix"></div>
                </table>
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