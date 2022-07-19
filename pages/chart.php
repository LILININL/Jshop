<?php
require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="utf8">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>J shop</title>

    <link rel="shortcut icon" href="logoc.jpg">
    <style>
    #chart {
        width: 100%;
        height: 100%;
        font-size: 11px;
    }

    .amcharts-pie-slice {
        transform: scale(0.5);
        transform-origin: 50% 50%;
        transition-duration: 0.3s;
        transition: all .3s ease-out;
        -webkit-transition: all .3s ease-out;
        -moz-transition: all .3s ease-out;
        -o-transition: all .3s ease-out;
        cursor: pointer;
        box-shadow: 0 0 30px 0 #000;
    }

    .amcharts-pie-slice:hover {
        transform: scale(1.1);
        filter: url(#shadow);
    }
    </style>
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

    <script language="javascript">
    function Clickheretoprint() {
        var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
        disp_setting += "scrollbars=yes,width=800, height=400, left=100, top=25";
        var content_vlue = document.getElementById("content").innerHTML;

        var docprint = window.open("", "", disp_setting);
        docprint.document.open();
        docprint.document.write(
            '</head><body onLoad="self.print()" style="width: 1000px; height:400; font-size: 20px; font-family: arial;">'
            );
        docprint.document.write(content_vlue);
        docprint.document.close();
        docprint.focus();
    }
    </script>


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
            <div class="container" style="margin-left:20px; margin-top: -60px;">
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 70px; margin-bottom: 15px; ">
                        <h1 class="page-header">กราฟการขาย</h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="content table-responsive-xl" id="content">
                    <h4> กราฟการขายตามประเภทสินค้า</h4>
                    <div id="print" class="row table-responsive-xl">
                        <?php 
                        include('connect.php'); 
                        @ini_set('display_errors', '0');
                        $sql = "SELECT a.category ,SUM(qty) AS qtya,SUM(qty*a.price) AS pp  , SUM(cost*qty) AS cost, SUM(qty*a.price)-SUM(cost*qty) AS balacne FROM sales_order AS a INNER JOIN products AS b ON a.product=b.product_code GROUP BY category ORDER BY `a`.`category`;";
                        $query = $db->prepare($sql); 
                        $query->execute();
                        $fetch = $query->fetchAll();
                        foreach ($fetch as $key => $value) {
                          
                            $data[] = array('title'=>$value['category'], 'value'=>$value['qtya']);
                        }
                        $chart = json_encode($data);
                        ?>
                        <div class="col-lg-12">
                            <div id="chartt" style="height: 500px;"></div>
                        </div>
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
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>


    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

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

    <script src="plugins/amcharts/amcharts.js"></script>
    <script src="plugins/amcharts/animate.min.js"></script>
    <script src="plugins/amcharts/themes/light.js"></script>
    <script src="plugins/amcharts/export/export.min.js"></script>
    <script src="plugins/amcharts/themes/patterns.js"></script>
    <script type="plugins/export/export.css" type="text/css" media="all"></script>
    <script src="plugins/amcharts/plugins/responsive/responsive.min.js"></script>
    <script src="plugins/amcharts/serial.js"></script>
    <script src="plugins/amcharts/pie.js"></script>


    <script type="text/javascript">
    var raw = '<?php echo $chart; ?>';
    var data3 = JSON.parse(raw);
    var chart = AmCharts.makeChart("chartt", {
        "type": "pie",
        "theme": "light",
        "dataProvider": data3,
        "titleField": "title",
        "valueField": "value",
        "labelRadius": 25,

        "radius": "37%",
        "innerRadius": "40%",
        "labelText": " [[title]] ([[percents]]%)",
        "export": {
            "enabled": true
        },
        "depth3D": 10,
        "angle": 17,
        "fontFamily": "Helvetica",
        "fontSize": 13,
        "balloonText": "[[value]]",
        "color": "#808080",
        // "colors": ['#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222']
        "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00',
            '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000'
        ]
    });
    </script>
    <!-- Plugin js for this page -->
    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script>
    $(document).ready(function() {
        $("#dataTables-example").DataTable({});
    });
    </script>
    <script>
    document.getElementById("btnPrint").onclick = function () {
    var password;

		var pass1=document.getElementById("pass").value;

password=prompt('โปรดกรอกชื่อที่ลงทะเบียนเพือยืนยันการปริ้นหน้านี้ !','');

if (password==pass1)
{ 
    var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
        disp_setting += "scrollbars=yes,width=800, height=400, left=100, top=25";
        var content_vlue = document.getElementById("content").innerHTML;

        var docprint = window.open("", "", disp_setting);
        docprint.document.open();
        docprint.document.write(
            '</head><body onLoad="self.print()" style="width: 1000px; height:400;  font-size: 20px; font-family: arial;">'
            );
        docprint.document.write(content_vlue);
        docprint.document.close();
        docprint.focus();
    }
}
    

</script>
</body>

</html>