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
  

  <style>
    #chart {
      width       : 100%;
      height      : 500px;
      font-size   : 11px;
    } 
    .amcharts-pie-slice {
      transform: scale(1);
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

  <script language="javascript">
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
  </script>

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
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>


      </head>

      <body>


        <?php include('navfixed.php');?>    

        <!-- Page Content -->
        <div id="page-wrapper">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <h1 class="page-header">แผนภูมิชนิดของการจ่าย</h1>
              </div>
            </div>
            <!-- /.row -->

            <div class="content" id="content">
              <p> แผนภูมิการขายตามประเภทผลิตภัณฑ์</p>
              <div class="row">
                <?php 
                include('connect.php');
                $sql = "SELECT *, type as typ, count(name) as qcount FROM sales GROUP BY type";
                $query = $db->prepare($sql); 
                $query->execute();
                $fetch = $query->fetchAll();
                foreach ($fetch as $key => $value) {
                  $data[] = array('title'=>$value['typ'], 'value'=>$value['qcount']);
                }
                $chart = json_encode($data);
                ?>
                <div class="col-lg-12" style="margin-top: 70px; margin-bottom: 15px; ">
                  <div id="chart" id="dataTables-example" style="height: 500px;"></div>
                  <div>
                  <table width="100%" class="table table-responsive table-hover text-light  "
                            id="dataTables-example">
                    <thead>
                      <tr>
                        <th> รหัสใบเสร็จ </th>
                        <th> ชื่อพนักงงาน </th>
                        <th> ชนิดการชำระเงิน </th>
                        <th> วันที่ชำระเงิน </th>
                      </tr>
                    </thead>
                    <tbody class="table-responsive-xl" >
                      <?php
                      include('connect.php');
                      @ini_set('display_errors', '0');
                      $result = $db->prepare("SELECT * FROM sales");
                      $result->execute();
                      for($i=0; $row = $result->fetch(); $i++){
                        ?>
                        <tr class="record">
                          <td><?php echo $row['invoice_number']; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['type']; ?></td>
                          <td><?php echo $row['date']; ?></td>
                        </tr>
                        <?php
                      }
                      ?>

                    </tbody>
                  </table>

                </div>
              </div>
            </div>
          </div>
         
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /#page-wrapper -->

      <!-- jQuery -->
      <script src="../vendor/jquery/jquery.min.js"></script>
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

      <script src="plugins/amcharts/amcharts.js"></script>
      <script src="plugins/amcharts/animate.min.js"></script>
      <script src="plugins/amcharts/themes/light.js"></script>
      <script src="plugins/amcharts/export/export.min.js"></script>
      <script src="plugins/amcharts/themes/patterns.js"></script>
      <script type="plugins/export/export.css" type="text/css" media="all""></script>
      <script src="plugins/amcharts/plugins/responsive/responsive.min.js"></script>
      <script src="plugins/amcharts/serial.js"></script>
      <script src="plugins/amcharts/pie.js"></script>
        <!-- inject:js -->
         <!-- End custom js for this page -->
       <!-- Plugin js for this page --><!-- DataTables JavaScript -->
       <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script>
    $(document).ready(function () {
        $("#dataTables-example").DataTable(
            {}
        );
    });
</script>
      <script src="assets/js/off-canvas.js"></script>
      <script src="assets/js/hoverable-collapse.js"></script>
      <script src="assets/js/misc.js"></script>
      <script src="assets/js/settings.js"></script>
      <script src="assets/js/todolist.js"></script>
      <!-- endinject -->

      <script type="text/javascript">
        var raw = '<?php echo $chart; ?>';
        var data = JSON.parse(raw);
        var chart = AmCharts.makeChart( "chart", {
          "type": "pie",
          "theme": "light",
          "dataProvider": data ,
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
          "color": "#222",
        // "colors": ['#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222', '#222']
        "colors": ['#FF6600', '#FCD202', '#B0DE09', '#0D8ECF', '#2A0CD0', '#CD0D74', '#CC0000', '#00CC00', '#0000CC', '#DDDDDD', '#999999', '#222333', '#990000']
      } );
    </script>
 <script src="assets/js/dashboard.js"></script>
   

  </body>

  </html>
