    <div class="modal fade" id="addtypepro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">เพิ่มประเภทสินค้า</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>        
                <div class="modal-body">
                    <form action="savetype.php" method="post" class="form-group">
                        <div id="ac">
                            <span>ประเภทสินค้าที่ต้องการเพิ่ม : </span>
                            <input type="text" name="typesl" class="form-control" required />
                            <span>&nbsp;</span><input 
                                type="submit"
                                class="form-control btn btn-primary btn-block btnn-gradient-border btnn-glow" 
                                value="บันทึก" />
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->

<!-- /.modal -->
<!-- <script type="text/javascript">
    $(function () {
        $("#addtypepro").on("submit", function () {
            var form = $(this)[0];
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });
</script> -->