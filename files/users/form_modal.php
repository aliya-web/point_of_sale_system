
<div class="modal fade" id="modal_form">
        <div class="modal-dialog modal-lg"><!-- modal-dialog-centered   modal-lg -->
            <div class="modal-content">
                <div class="modal-header display-6 bg-primary">
                    <h3 class="text-center text-light"><b>ຟອມບັນທືກຂໍ້ມູນຜູ້ນຳໃຊ້</b></h3>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body alert-dark">


                    <!-- <div class="card-body"> -->
      <form action="">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for=""><b>ຊື່:</b> </label>
                        <input type="text" name="fname" id="fname" class="form-control fname" placeholder="ປ້ອນຊື່...">
                    </div>
                    <div class="form-group mt-3">
                        <label for=""><b>ນາມສະກຸນ:</b> </label>
                        <input type="text" name="lname" id="lname" class="form-control lname" placeholder="ປ້ອນນາມສະກຸນ...">
                    </div>
                    <div class="form-group mt-3">
                        <label for=""><b>ວັນເດືນອປີເກິດ:</b> </label>
                        <input type="date" name="dob" id="dob" class="form-control dob">
                    </div>
                </div>
    <!-- .............//////////////////////////////////............. -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for=""><b>ເພດ:</b> </label>
                        <div class="form-control">
                            <input type="radio" name="gender" id="gender" class="gender form-check-input" value="ຍິງ"> 
                            <label for="" class="f">ຍິງ</label>
                            <input type="radio" name="gender" id="gender" class="gender form-check-input" value="ຊາຍ"> 
                            <label for="" class="f">ຊາຍ</label>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for=""><b>ສະຖານະ:</b></label>
                        <select name="status" class="form-control status">
                            <option value="">ເລືອກສະຖານະ</option>
                            <option value="ຜູ້ນຳໃໍຊ້">ຜູ້ນຳໃໍຊ້</option>
                            <option value="ພະນັກງານຂາຍ">ພະນັກງານຂາຍ</option>
                            <option value="ຜູ້ບໍລິຫານ">ຜູ້ບໍລິຫານ</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for=""><b>ເບີໂທ:</b></label>
                        <input type="number" name="tel" id="tel" class="form-control tel" placeholder="ປ້ອນເບີໂທ">
                    </div>
                </div>
    <!-- ,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,, -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for=""><b>ແຂວງ:</b></label>
                        <input type="text" name="prov" id="prov" class="prov form-control" placeholder="ປ້ອນແຂວງ...">
                    </div>
                    <div class="form-group mt-3">
                        <label for=""><b>ເມືອງ:</b></label>
                        <input type="text" name="dis" id="dis" class="dis form-control" placeholder="ປ້ອນເມືອງ...">
                    </div>
                    <div class="form-group mt-3">
                        <label for=""><b>ບ້ານ:</b></label>
                        <input type="text" name="vill" id="vill" class="vill form-control" placeholder="ປ້ອນບ້ານ...">
                    </div>
                </div>
    <!-- .................................................. -->
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for=""><b>ຊື່ User:</b></label>
                        <input type="text" name="user_name" id="user_name" class="form-control user_name" placeholder="ປ້ອນຊື່ User...">
                    </div>
                    <div class="form-group mt-3">
                        <label for=""><b>ລະຫັດຜ່ານ:</b></label>
                        <input type="password" name="upassword1" id="upassword1" class="form-control upassword1" placeholder="ປ້ອນລະຫັດຜ່ານ...">
                    </div>
                    <div class="form-group mt-3">
                        <label for=""><b>ຢືນຢັນ:</b></label>
                        <input type="password" name="upassword2" id="upassword2" class="form-control upassword2" placeholder="ປ້ອນລະຫັດຜ່ານອິກຄັ້ງ...">
                    </div>
                </div>
                <!-- ............................... -->
                <div class="mt-3">
                    <label for=""><b>ໝາຍເຫດ:</b></label>
                    <textarea name="remark" id="remark" cols="20" rows="1" class="form-control remark" placeholder="ກາລຸນາປ້ອນໝາຍເຫດ" required></textarea><br>
                    <center>
                        <button type="button" class="btn bg-success text-light send" id="send">
                            <i class="fas fa-download"></i> ບັນທືກ</button>
                        <button type="reset" class="btn bg-danger text-light" id="reset">
                        <i class="fas fa-eraser"></i> ລ້າງຂໍ້ມູນ</button>
                        
                    </center>
                </div>
            </div>
        </form>
                        <div id="show"></div>
                    <!-- </div> -->


                </div>
            </div>
        </div>


    </div>