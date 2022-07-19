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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>


   
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
    <!-- DataTables CSS -->
    <link href="../vendors/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendors/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
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
                        <h1 class="page-header">รายงานสินค้าส่งคืนและยกเลิก</h1>
                    </div>
                    <div class="table-responsive-xl">
                        <div id="maintable" class="table-responsive-xl">
                        <form name="passin">
                    <?php 
                            include ('connect.php');
                            $sql = "SELECT * FROM user ";
                            $query = $db->prepare($sql);
                            $query->execute();
                            $row = $query->fetch();
                            $naem = $row['name'];
                        ?>
                    <input type="password"  id="pass" value="<?php echo $naem ?>" hidden  disabled>
                    <input type="button" class="btn btn-success btn-sm" id="pps" value="ดาวโหลดรายงาน"/>&nbsp;
                    <button type="submit"  id="export_button" class="btn btn-success btn-sm" hidden disabled>ดาวโหลด</button>
                     
                    </form>  
                            <div style="margin-top: 15px; margin-bottom: 21px;">
                                <table width="100%" class="table table-responsive table-hover text-light colors "
                                    id="datews">
                                    <thead  >
                                        <tr>
                                            <th  style="color:white"> รหัสใบเสร็จ </th>
                                            <th  style="color:white"> รหัสสินค้า </th>
                                            <th  style="color:white"> ชื่อสินค้า </th>
                                            <th  style="color:white"> รายละเอี่ยด </th>
                                            <th  style="color:white"> สถาณะ </th>
                                            <th  style="color:white"> หมายเหตุ </th>
                                        </tr>
                                    </thead>

                                    <tbody colspan="5" style="border-top:2px solid #FFFFFF">

                                        <?php
                        include('connect.php');
                        $result = $db->prepare("SELECT * FROM purchases WHERE status= 'ส่งคืน' OR status= 'ยกเลิก'  ");
                        $result->execute();
                        for($i=0; $row = $result->fetch(); $i++){
                            ?>
                                        <tr class="record">
                                            <?php
                                 $rrrrrrr=$row['p_name'];
                                 $resultss = $db->prepare("SELECT * FROM products WHERE product_code= :asas");
                                 $resultss->bindParam(':asas', $rrrrrrr);
                                 $resultss->execute();
                                 for($i=0; $rowss = $resultss->fetch(); $i++){         
                                
                                ?>
                                            <td>JSH-<?php echo $row['transaction_id']; ?></td>
                                            <td><?php echo "JHSP-". $rowss['product_id']; ?></td>

                                            <td width="250px"><?php
                                 
                                    echo $rowss['product_name'];
                                
                                ?></td>
                                            <td><?php
                               
                            
                                    echo $rowss['description_name'];
                                
                                ?></td>
                                            <td><?php echo $row['status']; ?></td>
                                            <td><?php echo $row['remark']; ?></td>

                                            <?php }
                            ?>
                                        </tr>
                                        <?php
                        }
                        ?>

                                    </tbody>
                                </table>
                                <!-- <a href="" onclick="window.print()" class="btn btn-primary btnn-gradient-border btnn-glow"><i class="icon-print icon-large"></i> ปริ้น</a> -->
                                <div class="clearfix"></div>
                            </div>
                            <script src="js/jquery.js"></script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    


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
      <!-- DataTables JavaScript -->
      <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script>
    $(document).ready(function () {
        $("#datews").DataTable(
            {}
        );
        
    });
</script>
<script>
    document.getElementById("pps").onclick = function () {
    var password;
    var pass1= document.getElementById("pass").value;
   password = prompt("โปรดกรอกชื่อที่ลงทะเบียนเพือยืนยันการดาวโหลด !", "");
  if (password.length == 0) {
    alert('กรุณากรอกรหัสผ่าน!');
  }else if(password != pass1){
    alert('รหัสผ่านไม่ถูกต้อง');
  }else{
    alert('ข้อมูลถูกต้อง ! กดปุ่มอีกดาวโหลดรายงานครั้งเพื่อดาวโหลด');
    document.forms["passin"].querySelector("input[type=button]").onclick = function(e) {
    e.preventDefault();
    this.nextElementSibling.hidden = false;
    this.nextElementSibling.disabled = false;
    this.nextElementSibling.nextElementSibling.disabled = false;
    }
  }
}
</script>
    <script>
    function html_table_to_excel(type)
    {
        var data = document.getElementById('datews');
        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});
       
        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64'});

        XLSX.writeFile(file, 'รายงานสินค้าส่งคืนและยกเลิก.' + type);
    }
    const export_button = document.getElementById('export_button');
    export_button.addEventListener('click', () =>  {
        html_table_to_excel('xlsx');
    });
</script>
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
    <!-- Plugin js for this page -->
  
</body>

</html>