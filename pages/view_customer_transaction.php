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
        <div class="container"  style="margin-left:20px; margin-top: -30px;" >
            <div class="row">
            <div class="col-lg-12" style="margin-top: 70px; margin-bottom: 15px; ">
                    <h1 class="page-header">บันทึกการทำธุรกรรมของลูกค้า</h1>
                </div>
                </div>
                <div class="table-responsive-xl">
                <div id="maintable" class="table-responsive-xl">
                    <div style="margin-top: -5px; margin-bottom: 21px;">
                        <a class="btn btn-primary" href="search_customer.php"><i
                                class="mdi mdi-arrow-left-bold">
                                ย้อนกลับ</i>
                            </a>
                                
                    </div>
                    <?php 
                            include ('connect.php');
                            $sql = "SELECT * FROM user ";
                            $query = $db->prepare($sql);
                            $query->execute();
                            $row = $query->fetch();
                            $naem = $row['name'];
                        ?>
                    <input type="password"  id="pass" value="<?php echo $naem ?>" hidden  disabled>
                    <button id="btnPrint" class="btn btn-primary">ปริ้น!</button>
                    <br></br>
                    <div  class="table-wrapper" style="margin-top: -19px; margin-bottom: 21px;">
                        <table width="100%" class="table table-responsive table-hover text-light  "
                            id="Tablesdata">
                            <thead id="printThis">
                                <tr>
                                    <th style="color:white">รหัสใบเสร็จ</th>
                                    <th style="color:white">โค้ดลูกค้า</th>
                                    <th style="color:white">ชนิดการชำระเงิน</th>
                                    <th style="color:white">ยอดราคาสินค้า</th>
                                    <th style="color:white">จำนวนเงินที่จ่ายมา</th>
                                    <th style="color:white">วันที่ชำระเงิน</th>
                                </tr>
                            </thead>
                            
                            <tbody >
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
                        $id=$_GET['id'];
                        $result = $db->prepare("SELECT * FROM sales WHERE name= :userid");
                        $result->bindParam(':userid', $id);
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                                <tr class="record" colspan="5" style="border-top:2px solid #FFFFFF">
                                    <td>JSH-<?php echo $row['transaction_id'];?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['type'];?></td>
                                    <td align="center"><?php echo $row['amount'];?></td>
                                    <td align="center"><?php echo $row['cash'];?></td>
                                    <td><?php echo $row['date'];?></td>
                                </tr>
                                <?php
                        }
                        ?>
                                <thead>
                                    <tr>
                                        <th colspan="1" style="border-top:2px solid #FFFFFF" ><font color="#FFFFFF"> รับเงินมา  </font>  </th>
                                        <td class="right" colspan="6" style="border-top:2px solid #FFFFFF">

                                            <?php
                                    $id = $_GET['id'];
                                    $results = $db->prepare("SELECT amount,cash,sum(cash-amount) AS TT FROM sales WHERE name = :name ");
                                    $results->bindParam(':name', $id);
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $dsdsd=$rows['cash'];
                                        echo formatMoney($dsdsd, true);
                                    }
                                    ?>
                                        </td>
                                    </tr>
                                </thead>
                                <thead>
                                    <tr>
                                        <th colspan="5" style="border-top:2px solid #FFFFFF"><font color="#FFFFFF">เงินทอน </font> </th>
                                        <th colspan="1" style="border-top:2px solid #FFFFFF">
                                        <th colspan="2" style="border-top:2px solid #FFFFFF"><font color="#FFFFFF">
                                            <?php
                                     $id = $_GET['id'];
                                     
                                     $results = $db->prepare("SELECT amount,cash,sum(cash-amount) AS TT FROM sales WHERE name = :name ");
                                     $results->bindParam(':name', $id);
                                     $results->execute();
                                     for($i=0; $rows = $results->fetch(); $i++){
                                        $dsdsd=$rows['TT'];
                                        echo formatMoney($dsdsd, true);
                                    }
                                    ?>
                                    </font>
                                        </th>
                                    </tr>
                                </thead>
                            </tbody>
                        </table>
                    </div>
                </div>
                    <div class="clearfix"></div>
                

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div> </div> </div>
    <!-- /#page-wrapper -->
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
    $(document).ready(function () {
        $("#Tablesdata").DataTable(
            {}
        );
    });
</script>
<script>
    document.getElementById("btnPrint").onclick = function () {
    var password;

		var pass1=document.getElementById("pass").value;

password=prompt('โปรดกรอกชื่อที่ลงทะเบียนเพือยืนยันการปริ้นหน้านี้ !',' ');

if (password==pass1)
{ 
  printElement(document.getElementById("printThis"));
}
}

function printElement(elem) {
    var domClone = elem.cloneNode(true);
    
    var $printSection = document.getElementById("printSection");
    
    if (!$printSection) {
        var $printSection = document.createElement("div");
        $printSection.id = "printSection";
        document.body.appendChild($printSection);
    }
    
    $printSection.innerHTML = "";
    $printSection.appendChild(domClone);
    window.print();
}

</script>

</body>

</html>