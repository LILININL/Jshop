<?php
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="utf-8">

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
                    <h1 class="page-header">รายการสั่งซื้อ </h1>
                </div>
                <div id="maintable">
                    <table width="100%" class="table table-hover text-light" id="dataTables-example">
                        <thead colspan="5" style="border-top:2px solid #FFFFFF">

                            <tr>


                                <th style="color:white"> รหัสใบเสร็จ. </th>
                                <th style="color:white"> วันที่สั่ง </th>
                                <th style="color:white"> Supplier </th>
                                <th style="color:white"> วันที่ส่งมอบ </th>

                                <th style="color:white"> ชื่อสินค้า </th>
                                <th style="color:white"> รายละเอี่ยดสินค้า </th>
                                <th style="color:white"> จำนวน </th>
                                <th style="color:white"> ค่าใช้จ่าย </th>
                                <th style="color:white"> สถาณะ </th>
                                <th style="color:white"> Action </th>
                            </tr>
                        </thead>
                        <tbody colspan="5" style="border-top:2px solid #FFFFFF">


                            <?php

           function formatMoney($number, $fractional=false) {
            if ($fractional) {
              $number = sprintf('%.2f', $number);
            }
            while (true) {
              $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
              if ($replaced != $number) {
                $number = $replaced;
              } else {
                break;
              }
            }
            return $number;
          }

          include('connect.php');
          
          $result = $db->prepare("SELECT * FROM purchases  ORDER BY transaction_id desc");
          $result->execute();

          for($i=0; $row = $result->fetch(); $i++){
            ?>
                            <tr class="record" colspan="5" style="border-top:2px solid #FFFFFF">
                               
                                <td>JSH-<?php echo $row['transaction_id']; ?></td>
                                <td><?php echo $row['date_order']; ?></td>
                                <td><?php echo $row['suplier']; ?></td>
                                <td><?php echo $row['date_deliver']; ?></td>

                                <!-- <td class="hidden"><?php echo $row['p_name']; ?></td> -->
                                <td><?php
               $rrrrrrr=$row['p_name'];
               $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
               $resultss->bindParam(':asas', $rrrrrrr);
               $resultss->execute();
               for($i=0; $rowss = $resultss->fetch(); $i++){
                echo $rowss['product_name'];
              }
              ?></td>

                                <td><?php
                                 
               $rrrrrrr=$row['p_name'];
               $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
               $resultss->bindParam(':asas', $rrrrrrr);
               $resultss->execute();
               for($i=0; $rowss = $resultss->fetch(); $i++){
                echo $rowss['description_name'];
              }
              ?></td>

                                <td><?php echo $row['qty']; ?></td>
                                <td><?php
                $dsdsd=$row['cost'];
                echo formatMoney($dsdsd, true);
                ?></td>

                                <td><?php echo $row['status']; ?></td>
                                <td><a href="#" id="<?php echo $row['transaction_id']; ?>"  
                                         class="btn btn-danger delbutton" id2="<?php echo $row['id']; ?>"
                                        title="Click To Delete">
                                        <span><i class="mdi mdi-delete"> ลบ</i></span>
                                    </a>
                                    <a rel="facebox" class="btn btn-success"
                                        href="stockin.php?name=<?php echo $row['p_name']; ?>&iv=<?php echo $row['invoice_number']; ?>&qty=<?php echo $row['qty']; ?>&date=<?php echo $row['date_order']; ?>&tid=<?php echo $row['transaction_id']; ?>">
                                        <span><i class="mdi mdi-pencil"></i> แก้ไข</span>
                                    </a>

                                    <a class="btn btn-primary"
                                        href="printpo.php?id=<?php echo $row['invoice_number']; ?>&supplier=<?php echo $row['suplier']; ?>"><span><i
                                                class="mdi mdi-eye"></i> ดูฟอร์ม</span></a>
                                </td>
                            </tr>
                            <?php
            }
            ?>

                        </tbody>
                    </table>
                    <div class="clearfix"></div>
                </div>

                <script type="text/javascript">
                $(function() {


                    $(".delbutton").click(function() {

                        //Save the link in a variable called element
                        var element = $(this);

                        //Find the id of the link that was clicked
                        var del_id = element.attr("id");
                        var del_id2 = element.attr("id2");
                        //Built a url to send
                        var info = 'id=' + del_id;
                        var info2 = 'id=' + del_id2;

                        if (confirm("ยืนยันว่าจะลบ!!")) {

                            $.ajax({
                                type: "GET",
                                url: "deletepppp.php",
                                data: info,
                                info2,

                                success: function() {

                                }
                            });
                            $(this).parents(".record").animate({
                                    backgroundColor: "#fbc7c7"
                                }, "fast")
                                .animate({
                                    opacity: "hide"
                                }, "fast");

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
<!-- <script type="text/javascript">
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
</script> -->



</body>

</html>