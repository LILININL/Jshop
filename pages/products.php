<?php
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>J Shop</title>

    <link rel="shortcut icon" href="logoc.jpg">



    <!-- Required meta tags -->
    <meta charset="utf-8">
    
    <title>Jshop</title>
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
    <link rel="stylesheet" type="text/css" media="print" href="print.css" />
    <script src="lib/jquery.js" type="text/javascript"></script>
    <script src="src/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('a[rel*=facebox]').facebox({

                loadingImage: 'src/loading.gif',
                closeImage: 'src/closelabel.png'
            })

        })
    </script>

    <?php
    function productcode() {
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
    $pcode='JSHP-'.productcode();
    ?>

</head>

<body class="dark-edition sidebar-icon-only">
    <div class="container-scroller">
        <?php include('navfixed.php');?>
        <div id="page-wrapper" class="table-responsive">
            <div class="container" style="margin-left:15px;">
                <div class="row">
                    <div class="col-lg-12" >
                        <h1 class="page-header">รายการสินค้า</h1>
                    </div>
                    <div width="100%" class="table-responsive-xl">
                        <div id="maintable" class="table-responsive-xl">
                        <div style="margin-top: 15px; margin-bottom: 21px;">
                            <a href="#add" data-toggle="modal" class="btn btn-primary">เพิ่มสินค้า</a> 
                            <a href="typeproduct.php"  class="btn btn-primary">จัดการประเภทสินค้า</a>
                            <a href="addunittpye.php"  class="btn btn-primary">จัดการหน่วยนับสินค้า</a>                                 
                                <p><?php include 'addproduct.php'; ?></p>
                                <table width="100%"  class="table table-responsive table-hover text-light" name="datews" id="datews">
                                    <thead class="thead-inverse" width="100%">
                                        <tr>
                                            <th style="color:white"> รหัสสินค้า </th>
                                            <th style="color:white"> โค้ดสินค้า </th>
                                            <th style="color:white"> ชื่อสินค้า </th>
                                            <th style="color:white"> รายละเอี่ยด </th>
                                            <th style="color:white"> ประเภท </th>
                                            <th style="color:white"> ราคาที่รับมา </th>
                                            <th style="color:white"> ราคาที่จะขาย </th>
                                            <th style="color:white"> ชื่อผู้ขาย </th>
                                            <th style="color:white"> ปริมาณที่เหลือ </th>
                                            <th style="color:white"> หน่วยนับสินค้า </th>
                                            <th style="color:white"> จัดการ </th>
                                        </tr>
                                    </thead>
                                    <tbody>

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
                            // "SELECT * FROM products INNER JOIN unit_type ON products.Type_unit = unit_type.Type_unit"
                            $result = $db->prepare("SELECT * FROM products " );
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                                        <tr class="record">
                                            <td>JSH-<?php echo $row['product_id']; ?></td>
                                            <td><?php echo $row['product_code']; ?></td>
                                            <td><?php echo $row['product_name']; ?></td>
                                            <td><?php echo $row['description_name']; ?></td>
                                            <td><?php echo $row['category']; ?></td>
                                            <td align="right"><?php
                                        $pcost=$row['cost'];
                                        echo formatMoney($pcost, true);
                                        ?></td>
                                            <td align="right"><?php
                                            $pprice=$row['price'];
                                            echo formatMoney($pprice, true);
                                            ?></td>
                                            <td><?php echo $row['supplier']; ?></td>
                                            <td align="right"><?php echo $row['qty_left']; ?></td>
                                            <td><?php echo $row['unit']; ?></td>
                                            <td>
                                                <a rel="facebox" class="btn btn-primary"
                                                    href="editproduct.php?id=<?php echo $row['product_id']; ?>">
                                                    <i class="mdi mdi-pencil btn-icon-append"> แก้ไข</i>
                                                </a>
                                                <a onclick="return checkDelete()" class="btn btn-danger delbutton" 
                                                    href="deleteproduct.php?id=<?php echo $row['product_id']; ?>">
                                                    <i class="mdi mdi-delete btn-icon-delete"> ลบ</i>
                                                </a>
                                            </td>
                                       
                                        </tr>
                                        <?php
                                }
                                ?>

                                    </tbody>
                                </table>
                                </div>
                            
                                <!-- <a href="" onclick="window.print()" class="btnn btnn-gradient-border btnn-glow"><i class="icon-print icon-large"></i>
                        ปริ้น</a> -->
                                <!-- <a href= "product_exp.php" class = "btn btn-primary">ดูการหมดอายุของสินค้า</a> -->
                                <div class="clearfix"></div>
                            </div>

                            <script src="js/jquery.js"></script>
                            </div>
                            <!-- <script type="text/javascript">
                                $(function () {
                                    $(".delbutton").click(function () {

                                        //Save the link in a variable called element
                                        var element = $(this);

                                        //Find the id of the link that was clicked
                                        var del_id = element.attr("id");

                                        //Built a url to send
                                        var info = 'id=' + del_id;
                                        if (confirm("ยืนยันที่จะลบ ถ้าลบแล้วกู้กลับมาไม่ได้!")) {

                                            $.ajax({
                                                type: "GET",
                                                url: "deleteproduct.php",
                                                data: info,
                                                success: function () {
                                                    
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
                            </script> -->
                        
   
                        
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
        <script language="JavaScript" type="text/javascript">
            function checkDelete(){
                return confirm('หากลบแล้วไม่สามารถกู้คืนได้!!');
            }
</script>

        <!-- /#wrapper -->

        <!-- plugins:js -->
        <script src="assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
   
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
     <!-- Plugin js for this page --><!-- DataTables JavaScript -->
     <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script>
    $(document).ready(function () {
        $('#datews').DataTable( {
    
    })
     });
</script>


</body>

</html>