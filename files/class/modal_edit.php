<div class="modal fade" id="modal_edit">
        <div class="modal-dialog"><!-- modal-dialog-centered -->
            <div class="modal-content">
                <div class="modal-header display-6 bg-primary">
                    <h3 class="text-center text-light"><b>ຟອມແກ້ໄຂຂໍ້ມູນຊົນສິນຄ້າ</b></h3>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body alert-dark">


                    <!-- <div class="card-body"> -->
                        <form action="update.php" method="POST" class="">
                            <div class="row">
                                <div class="col-sm-12">
                                    <!-- ............ -->
                                    <input type="hidden" name="class_id1" class="form-control class_id1" id="class_id1">
                                    <!-- ............ -->
                                    <div class="form-group">
                                        <label for="">ໂຊນສິນຄ້າ</label>
                                        <input type="text" name="class_name1" id="class_name1" class="form-control class_name1" 
                                         placeholder="ປ້ອນຊື່ໂຊນ.....">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">ໝາຍເຫດ</label>
                                    <textarea name="remark1" id="remark1" cols="20" rows="3" class="form-control remark1" 
                                     placeholder="ກາລຸນາປ້ອນໝາຍເຫດ"></textarea><br>
                                    <center>
                                        <button type="button" class="btn btn-outline-success" id="submit1">
                                            <i class="fas fa-download"></i> ສົ່ງຂໍ້ມູນ</button>
                                        <a href="select.php">
                                            <button type="button" class="btn btn-outline-danger" id="reset">
                                            <i class="fas fa-redo-alt fa-spin"></i> ກັບຄືນ</button>
                                        </a>
                                        
                                    </center>
                                </div>
                            </div>
                        </form>
                        <div id="show_emodal"></div>
                    <!-- </div> -->


                </div>
            </div>
        </div>


    </div>