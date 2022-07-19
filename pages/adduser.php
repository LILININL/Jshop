    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">                
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="myModalLabel">เพิ่มผู้ใช้</h4>
                </div>
                <div class="modal-body">
                    <form action="saveuser.php" method="post" class = "form-group" >
                        <div id="ac">
                            <span>ชื่อผู้ใช้ : </span><input type="text" name="user" class = "form-control" required />
                            <span>รหัสผ่าน: </span><input type="PASSWORD" name="pass" class = "form-control"  required/>
                            <span>ชื่อสกุล : </span><input type="text" name="name" class = "form-control" required/>
                            <span>ตำแหน่ง: </span>
                            <select name = "post" class = "form-control">
                                <option>Admin</option>
                            </select>    
                            <span>&nbsp;</span><input class="btn btn-primary btn-block btnn-gradient-border btnn-glow" type="submit" class = "form-control" value="บันทึก" />
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>