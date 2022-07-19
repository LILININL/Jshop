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

        <style>
            #chartdiv {
                width       : 100%;
                height      : 400px;
                font-size   : 11px;
            }                   
        </style>


        <link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
        <script src="lib/jquery.js" type="text/javascript"></script>
        <script src="src/facebox.js" type="text/javascript"></script>
        <script type="text/javascript">
          jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox({
              loadingImage : 'src/loading.gif',
              closeImage   : 'src/closelabel.png'
          })
        })
    </script>


    <!-- <script language="javascript">
        function Clickheretoprint()
        { 
          var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
          disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
          var content_vlue = document.getElementById("content").innerHTML; 

          var docprint=window.open("","",disp_setting); 
          docprint.document.open(); 
          docprint.document.write('</head><body onLoad="self.print()" style="width: 1000px; height:400; font-size: 20px; font-family: arial;">');          
          docprint.document.write(content_vlue); 
          docprint.document.close(); 
          docprint.focus(); 
      }
  </script> -->

</head>

<body class="dark-edition">
<div class="container-scroller">
    <?php include('navfixed.php');?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container"  style="margin-left:20px; margin-top: -60px;" >
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 70px; margin-bottom: 15px; ">
                    <h1 class="page-header">ยอดขายรายเดือน</h1>
                </div>
                </div>
                <div class="content table-responsive-xl" id="content">
                    <p> แผนภูมิการขายรายเดือน</p>
                    <div class="row table-responsive-xl">
                        <?php 
                        include('connect.php');
                        @ini_set('display_errors', '0');
                        $sql = "SELECT *, month as mon, SUM(amount) as qcount FROM sales GROUP BY month";
                        $query = $db->prepare($sql); 
                        $query->execute();
                        $fetch = $query->fetchAll();
                        foreach ($fetch as $key => $value) {
                            $data[] = array('title'=>$value['mon'], 'value'=>$value['qcount']);
                        }
                        $d = json_encode($data);
                        ?>

                        <div id="chartdiv" class="table-responsive-xl"></div>       
                    </div>
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
        <!-- /.container-fluid -->
    </div>




    <!-- /#page-wrapper -->
    <script src="plugins/amcharts/amcharts.js"></script>
    <script src="plugins/amcharts/serial.js"></script>
    <script src="plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="plugins/export/export.css" type="text/css" media="all" />
    <script src="plugins/amcharts/themes/light.js"></script>

    <script>

        var raw = '<?php echo $d; ?>';
        var data = JSON.parse(raw);
        var chart = AmCharts.makeChart( "chartdiv", {
          "type": "serial",
          "theme": "light",
          "dataProvider": data,
          "valueAxes": [ {
            "gridColor": "#FFA500",
            "gridAlpha": 0.2,
            "dashLength": 0
        } ],
        "gridAboveGraphs": true,
        "startDuration": 1,
        "graphs": [ {
            "balloonText": "[[category]]: <b>Total Sales [[value]]</b>",
            "fillAlphas": 0.8,
            "lineAlpha": 0.2,
            "type": "column",
            "valueField": "value"
        } ],
        "chartCursor": {
            "categoryBalloonEnabled": false,
            "cursorAlpha": 0,
            "zoomable": false
        },
        "categoryField": "title",
        "categoryAxis": {
            "gridPosition": "start",
            "gridAlpha": 0,
            "tickPosition": "start",
            "tickLength": 20
        },
        "export": {
            "enabled": true
        },
          "color": "#FFA500",

    } );
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

</html>
