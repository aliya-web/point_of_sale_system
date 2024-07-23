<div class="modal fade" id="modal_edit">
        <div class="modal-dialog modal-lg"><!-- modal-dialog-centered -->
            <div class="modal-content">
                <div class="modal-header display-6 bg-primary">
                    <h3 class="text-center text-light"><b>ແກ້ໄຂຂໍ້ມູນຜູ້ນຳໃຊ້</b></h3>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body alert-dark">


                    <!-- <div class="card-body"> -->
            <form action="">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input type="hidden" name="user_id" class="user_id" id="user_id">
                            <label for=""><b>ຊື່:</b> </label>
                            <input type="text" name="fname1" id="fname1" class="form-control fname1" placeholder="ປ້ອນຊື່...">
                        </div>
                        <div class="form-group mt-3">
                            <label for=""><b>ນາມສະກຸນ:</b> </label>
                            <input type="text" name="lname1" id="lname1" class="form-control lname1" placeholder="ປ້ອນນາມສະກຸນ...">
                        </div>
                        <div class="form-group mt-3">
                            <label for=""><b>ວັນເດືນອປີເກິດ:</b> </label>
                            <input type="date" name="dob1" id="dob1" class="form-control dob1">
                        </div>
                    </div>
        <!-- .............//////////////////////////////////............. -->
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for=""><b>ເພດ:</b> </label>
                            <div class="form-control">
                                <input type="radio" name="genders" id="genders" class="gender1 form-check-input" value="ຍິງ"> 
                                <label for="" class="f">ຍິງ</label>
                                <input type="radio" name="genders" id="genders" class="gender2 form-check-input" value="ຊາຍ"> 
                                <label for="" class="f">ຊາຍ</label>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for=""><b>ສະຖານະ:</b></label>
                            <select name="status1" class="form-control status1" id="status1">
                                <option value="">ເລືອກສະຖານະ</option>
                                <option value="ຜູ້ນຳໃໍຊ້">ຜູ້ນຳໃໍຊ້</option>
                                <option value="ພະນັກງານຂາຍ">ພະນັກງານຂາຍ</option>
                                <option value="ຜູ້ບໍລິຫານ">ຜູ້ບໍລິຫານ</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for=""><b>ເບີໂທ:</b></label>
                            <input type="number" name="tel1" id="tel1" class="form-control tel1" placeholder="ປ້ອນເບີໂທ">
                        </div>
                    </div>
        <!-- ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,, -->
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for=""><b>ແຂວງ:</b></label>
                            <input type="text" name="prov1" id="prov1" class="prov1 form-control" placeholder="ປ້ອນແຂວງ...">
                        </div>
                        <div class="form-group mt-3">
                            <label for=""><b>ເມືອງ:</b></label>
                            <input type="text" name="dis1" id="dis1" class="dis1 form-control" placeholder="ປ້ອນເມືອງ...">
                        </div>
                        <div class="form-group mt-3">
                            <label for=""><b>ບ້ານ:</b></label>
                            <input type="text" name="vill1" id="vill1" class="vill1 form-control" placeholder="ປ້ອນບ້ານ...">
                        </div>
                    </div>
        <!-- .................................................. -->
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for=""><b>ຊື່ User:</b></label>
                            <input type="text" name="user_name1" id="user_name1" class="form-control user_name1" placeholder="ປ້ອນຊື່ User...">
                        </div>
                        <div class="form-group mt-3">
                            <label for=""><b>ລະຫັດຜ່ານ:</b></label>
                            <input type="password" name="upassword12" id="upassword12" class="form-control upassword12" placeholder="ປ້ອນລະຫັດຜ່ານ...">
                        </div>
                        <div class="form-group mt-3">
                            <label for=""><b>ຢືນຢັນ:</b></label>
                            <input type="password" name="upassword22" id="upassword22" class="form-control upassword22" placeholder="ປ້ອນລະຫັດຜ່ານອິກຄັ້ງ...">
                        </div>
                    </div>
                    <!-- ............................... -->
                    <div class="mt-3">
                        <label for=""><b>ໝາຍເຫດ:</b></label>
                        <textarea name="remark1" id="remark1" cols="20" rows="1" class="form-control remark1" placeholder="ກາລຸນາປ້ອນໝາຍເຫດ" required></textarea><br>
                        <center>
                            <button type="button" class="btn bg-success text-light go" id="go">
                                <i class="fas fa-download"></i> ບັນທືກ</button>
                            <button type="reset" class="btn bg-danger text-light" id="resets">
                            <i class="fas fa-eraser"></i> ລ້າງຂໍ້ມູນ</button>
                            
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