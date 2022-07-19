 <div class="panel-body">
     <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel" >เพิ่มสินค้า</h4>                  
                     <button type="button" class="close" data-dismiss="modal"  aria-hidden="true">&times;</button></div>
                 <!-- //*หมวดเพิ่มประเภทสินค้า **// -->
                 
                 <div class="modal-body">
                     <form action="saveproduct.php" method="post" class="form-group">
                         <div id="ac">
                             <span>ประเภทสินค้า: </span>        
                                                 
                             <select name="categ" class="form-control">
                             <?php            
                                include('connect.php');
                                $result1 = $db->prepare("SELECT * FROM producttype");
                                $result1->bindParam(':userid', $res);
                                $result1->execute();
                                for($i=0; $row = $result1->fetch(); $i++){
                                    ?>
                                 <option><?php echo $row['typeproduct']; ?></option>
                                <?php
                                }
                                ?>                                
                             </select>
                             <span>หน่วยนับสินค้า : </span>
                             <select name="unit" class="form-control">
                             <?php            
                                include('connect.php');
                                $result1 = $db->prepare("SELECT * FROM unittype");
                                $result1->bindParam(':userid', $res);
                                $result1->execute();
                                for($i=0; $row = $result1->fetch(); $i++){
                                    ?>
                                 <option><?php echo $row['unittype']; ?></option>
                                <?php
                                }
                                ?> 
                             </select>
                             <!-- <span>หน่วยนับสินค้า : </span><input type="text" name="unit" class = "form-control" required/> -->
                             <span>โค้ดสินค้า : </span><input type="text" name="code" value="<?php echo $pcode ?>"
                                 class="form-control" />
                             <span>ชื่อสินค้า : </span><input type="text" name="bname" class="form-control" required />
                             <span>รายละเอี่ยดสินค้า : </span><input type="text" name="dname" class="form-control"
                                 required />

                             <span>ราคาที่รับมา(ตัวเลขเท่านั้น) : </span><input type="text" name="cost" class="form-control" onkeypress=" return isNumber(event)" required />
                             <span>ราคาที่จะขาย(ตัวเลขเท่านั้น) : </span><input type="text" name="price" class="form-control"
                             onkeypress=" return isNumber(event)" required />
                             <span>Supplier : </span>
                             <select name="supplier" class="form-control" required>
                                 <?php
                                include('connect.php');
                                $result = $db->prepare("SELECT * FROM supliers");
                                $result->bindParam(':userid', $res);
                                $result->execute();
                                for($i=0; $row = $result->fetch(); $i++){
                                    ?>
                                 <option><?php echo $row['suplier_name']; ?></option>
                                 <?php
                                }
                                ?>
                             </select>
                             <span>จำนวน(ตัวเลขเท่านั้น) : </span><input type="text" name="qty" class="form-control" onkeypress=" return isNumber(event)" required />
                             <span>วันที่รับเข้า: </span><input type="date" name="date_del" class="form-control"
                                 required />
                             <!-- <span>วันหมดอายุ: </span><input type="date" name="ex_date" class = "form-control" /> -->
                             <span>&nbsp;</span><input class="btn btn-primary btn-block btnn-gradient-border btnn-glow" type="submit"
                                 class="form-control" value="บันทึก" />
                         </div>
                 </div></div>
                 <div class="modal-footer">
                 </div>
             </div>
             <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
     </div>
     <!-- /.modal -->
     <script type="text/javascript">
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
     </script>
    <script type="text/javascript"> 
     function isNumber(evt)
		 {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true; }
    </script>