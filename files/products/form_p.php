<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if(@$_SESSION['checked']<>1){
	echo "<script>alert('ລົງຊືີ່ເຂົ້າໃຊ້ກ່ອນ'); location='../../index.php';
	</script>";
	}
else{

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AM_Shop</title>
    <link rel="stylesheet" href="../../link/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../link/icon/css/all.min.css">
    <script src="../../link/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../link/jquery.js"></script>
    <script src="../../link/sweetalert/dist/sweetalert2.all.js"></script>
    <!-- ............................... -->
<script>
    $(function(){
        $("#go").on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url: 'insert_p.php',
                type: 'post',
                data: new FormData(this),
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    $("#show").html(data);
                }
            })
        })
    })
</script>

</head>
<style>
    *{font-family: phetsarath ot;}
    body{
        margin-bottom: 19%;
        background-image: linear-gradient(to top, #ffffff 60%, #5e72e4 10%, #5e72e4 70%);
    }
    .card{
        background-image: linear-gradient(to top, #5e72e4 0%, #ffffff 55%, #ffffff 100%);
        /* background-color: #5e72e4; */
        backdrop-filter: blur(5px);
        border: 6px solid #ffffff;
        border-radius: 10px;
    }
    .card-header,.card-body{
        background-color: rgba(255, 255, 255, 0.3) ;
    }
    .form-control{
        border: none;
        border-bottom: 2px solid;
    }
    input{
        background-color: rgba(255, 255, 255, 0.3);
        color: white;
    }
    .card-body{
        padding-right: 4%;
    }
    .choose_img{
        position: relative;
        border-radius: 5px;
        width: 100%;
        height: 63%;
    }
</style>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-9">
                                <h2 class="mt-3 text-center title"><b><u>ຟອມບັນທືກຂໍ້ມູນສິນຄ້າ</u></b></h2>
                            </div>
                            <div class="col-sm-3">
                                <a href="select_p.php">
                                <button type="button" class="btn bg-light text-primary mt-3">
                                <i class="fas fa-bars"></i> ເບິ່ງຂໍ້ມູນ</button>
                                </a>
                            </div>
                        </div>
                    </div>
            <!-- ........................ -->
                    <div class="card-body">
                        <form action="insert_p.php" id="go" method="post" enctype="multipart/form-data" class="">
                            <div class="row a1">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="">ເລືອກຮູບສິນຄ້າ</label>
                                        <input type="file" name="photo" id="photo" class="form-control photo" placeholder="ເລືອກຮູບ...">
                                    </div>
                                    <div class="choose_img text-center mt-2">
                                        <img src="" id="showimage" width="230px" height="220px" class="mt-2">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="row aa">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">ລະຫັດສິນຄ້າ</label>
                                                <input type="text" name="prod_id" id="prod_id" class="prod_id form-control" placeholder="ປ້ອນລະຫັດສິນຄ້າ...">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="">ຊື່ສິນຄ້າ</label>
                                                <input type="text" name="prod_name" id="prod_name" class="prod_name form-control" placeholder="ປ້ອນຊື່ສິນຄ້າ...">
                                            </div>
                                           
                                        </div>
                            <!-- ............................................. -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">ປະເພດສິນຄ້າ</label>
                                                <select name="cate_id" id="cate_id" class="form-control">
                                                    <option value="">ເລືອກປະເພດສິນຄ້າ</option>
                                                    <?php
                                                        include("../../Connect.php");
                                                        $select = mysqli_query($con,"SELECT * FROM categories");
                                                        while($data = mysqli_fetch_assoc($select)){
                                                    ?>
                                                    <option value="<?php echo $data['cate_id'] ?>"><?php echo $data['cate_name']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="">ໂຊນສິນຄ້າ</label>
                                                <select name="class_id" id="class_id" class="form-control">
                                                    <option value="">ເລືອກໂຊນສິນຄ້າ</option>
                                                    <?php
                                                        include("../../Connect.php");
                                                        $select = mysqli_query($con,"SELECT * FROM class");
                                                        while($data2 = mysqli_fetch_assoc($select)){
                                                    ?>
                                                    <option value="<?php echo $data2['class_id'] ?>"><?php echo $data2['class_name']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                    <div class="row bb">
                                        <div class="col-sm-4">
                                            <div class="form-group mt-2">
                                                <label for="">ລາຄາຊື້</label>
                                                <input type="number" name="bprice" id="bprice" class="bprice form-control" placeholder="ປ້ອນລາຄາຊື້..">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                             <div class="form-group mt-2">
                                                <label for="">ຈຳນວນ</label>
                                                <input type="number" name="qty" id="qty" class="qty form-control" value="0" placeholder="0..." readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group mt-2">
                                                <label for="">ລາຄາຂາຍ</label>
                                                <input type="number" name="sprice" id="sprice" class="sprice form-control" value="10000" placeholder="10.000" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                        <!-- ........................................................ -->
                                    <div class="form-group mt-2">
                                        <label for="">&emsp;<b>ໝາຍເຫດ</b></label>
                                        <textarea name="remark" id="remark" cols="30" rows="2" class="remark form-control" ></textarea>
                                    </div>
                        <!-- ................................... -->
                                    <center>
                                        <div class="form-group mt-3">
                                            <button type="submit" class="btn bg-success text-light" >
                                                <i class="fas fa-download"></i> ສົ່ງຂໍ້ມູນ</button>
                                            <button type="reset" class="btn bg-danger text-light" id="reset">
                                                <i class="fas fa-redo-alt fa-spin"></i> ລ້າງຂໍ້ມູນ</button>
                                        </div>
                                    </center>
                                </div>
                            </div>
                            
                        </form>
                        <div id="show"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
    <script>
        var img = document.getElementById("photo");
        var show = document.getElementById("showimage");
        img.onchange = e =>{
            var [file] = img.files;
            if(file){
                show.src = URL.createObjectURL(file);
            }
        }
    </script>
</body>
<?php 
}
?>
</html>