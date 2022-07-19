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
    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
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

    <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <!-- <script src="lib/jquery.js" type="text/javascript"></script> -->
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
        <div class="container" style="margin-left:15px;">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">รายงานการขายกำไรขาดทุน</h1>
                </div>
                    <div class="table-responsive-xl">
                <div id="maintable" class="table-responsive-xl" >
                    <p>
                    <div class="input-group-prepend"> 
                    <label class="input-group-text  bg-primary text-white">    
                    เลือกวันที่ที่ต้องการค้นหา : </lable>
                    <div class="col col-md-55 text-right">
                    <input type="text"  id="dateinput" name="dateinput"> 
                    </div>
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
                    </div>     
                    </p>   
                    <table width="100%"  class="table table-responsive table-hover text-light " id="Tablesdata">
                    <thead >
                            <tr>
                
                                <th scope="col" style="color:white"> วันที่ </th>
                                <th scope="col" style="color:white"> ชื่อสินค้า</th>
                                <th scope="col" style="color:white">ราคาขายต่อชิ้น</th>
                                <th scope="col" style="color:white">ราคาต้นทุนต่อชิ้น</th>
                                <th scope="col" style="color:white"> จำนวนที่ขาย</th>                                
                                <th scope="col" style="color:white"> ยอดกำไร</th>
                            
                            </tr>
                        </thead>
                        <tbody class="table-responsive-xl" >

                            <?php
                            include('connect.php');
                            $result = $db->prepare("SELECT date,A.name AS name,B.price AS Pr,qty,cost ,SUM((B.price - cost)*qty) as Profit FROM `sales_order` as A INNER JOIN products as B on A.product = B.product_code 
                            GROUP BY A.product ORDER BY `A`.`date` DESC;");
                            $result->execute();
                            for($i=0; $row = $result->fetch(); $i++){
                                ?>
                            <tr class="record">
                                
                           
                                <td><?php echo $row['date']; ?></td>
                               
                                </td>
                                <td ><?php
                                        echo $row['name'];                                        
                                        ?>
                                </td>
                                <td ><?php
                                        $pr=$row['Pr'];
                                        echo formatMoney($pr, true);                                         
                                        ?>
                                </td>
                                <td><?php
                                        $cost=$row['cost'];
                                        echo formatMoney($cost, true);
                                        ?>
                                </td>
                                <td><?php
                                      echo  $row['qty'];
                                        ?>
                                </td>
                                <td><?php
                                      echo  $row['Profit'];
                                        ?>
                                </td>                          
                               
                            </tr>
                            
                            <?php
                            }
                            ?>
                        </tbody>
                        <thead>
                            <tr>
                                <th colspan="5" style="border-top:2px solid #FFFFFF" ><font color="#FFFFFF"> จำนวนกำไรทั้งหมด </font></th>
                                <th colspan="5" style="border-top:2px solid #FFFFFF"><font color="#FFFFFF">
                                    <?php
                                    include('connect.php');
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
                                    $results = $db->prepare("SELECT date,A.name AS name,B.price AS Pr,qty,cost ,SUM((B.price - cost)*qty) as Profit FROM `sales_order` as A INNER JOIN products as B on A.product = B.product_code 
                                    ");
                                    $results->execute();
                                    for($i=0; $rows = $results->fetch(); $i++){
                                        $dsdsd=$rows['Profit'];
                                        echo formatMoney($dsdsd, true);
                                    
                                    
                                    ?>
                                    </font>
                                </th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th colspan="3" style="border-top:2px solid #FFFFFF"><font color="#FFFFFF">ยอดรวม </font></th>
                                <th colspan="1" style="border-top:2px solid #FFFFFF"> 
                                 <th colspan="1" style="border-top:2px solid #FFFFFF"> </th>
                                <th colspan="2" style="border-top:2px solid #FFFFFF"><font color="#FFFFFF"">
                                <?php
                                echo formatMoney($dsdsd, true);
                                   }
                                ?>  
                                    </font>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                </div>
            </div>
            
            <script src="js/jquery.js"></script>
          
<!--            
            <script type="text/javascript">
            $(function() {
                $(".delbutton").click(function() {
                    //Save the link in a variable called element
                    var element = $(this);
                    //Find the id of the link that was clicked
                    var del_id = element.attr("id");
                    //Built a url to send
                    var info = 'id=' + del_id;
                    if (confirm("ยืนยันที่จะลบ!")) {
                        $.ajax({
                            type: "GET",
                            url: "deletesales.php",
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
            </script> -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </div></div></div>
    <!-- /#page-wrapper -->
    <script>
    function print() {
        window.print();
    }
    </script>
    <!-- plugins:js -->
    <!-- <script src="assets/vendors/js/vendor.bundle.base.js"></script> -->
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
        $("#dateinput").datepicker({ dateFormat: 'mm/dd/yy' }).bind("change",function()
        {
        var x = document.getElementById("dateinput").value;
        var table = $('#Tablesdata').DataTable().search(x).draw();
        console.log(x);
        });
        $('#Tablesdata').DataTable();           
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
        var data = document.getElementById('Tablesdata');
        var file = XLSX.utils.table_to_book(data, {sheet: "sheet1"});
       
        XLSX.write(file, { bookType: type, bookSST: true, type: 'base64'});

        XLSX.writeFile(file, 'รายงานการขายกำไรขาดทุน.' + type);
    }
    const export_button = document.getElementById('export_button');
    export_button.addEventListener('click', () =>  {
        html_table_to_excel('xlsx');
    });
</script>

</body>
<br>
<?php include('footer.php'); ?>
</html>