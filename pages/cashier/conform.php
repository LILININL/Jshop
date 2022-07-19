


<div class="modal fade" id="my" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
         <div class="modal-content">
             <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">ยืนยัน</h4>
                    </div>
                         <div class="modal-body">
                            <div class="alert alert-warning">แน่ใจหรือว่าต้องการซื้อสินค้าชิ้นนี้?</div>
                              </div>
                                 <div class="modal-footer">
                                  <a rel="facebox" id="cccc" class="btn btn-primary" href="checkout.php?pt=<?php echo $_GET['id']?>&invoice=<?php echo $_GET['invoice']?>&total=<?php echo $amountprice ?>&cashier=<?php echo $session_admin_name?>">ยืนยัน</a>
                                     <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                                    </div>
                                     </div>
                                     <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                    </div>