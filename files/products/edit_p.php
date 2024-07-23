<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ali_prod</title>
    <link rel="stylesheet" href="../../link/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../link/icon/css/all.min.css">
    <script src="../../link/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../link/jquery.js"></script>
    <script src="../../link/sweetalert/dist/sweetalert2.all.js"></script>
    <!-- .......................... -->
<script>
    $(function(){
        $("#go").on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url: 'update_p.php',
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
        background-image: linear-gradient(to top, #ffffff 70%, #EACCF8 10%, #5e72e4 70%);
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
    .show_eimg{
        position: relative;
        border-radius: 5px;
        width: 100%;
        height: 65%;
    }
</style>

<body>
<!-- ....................................... -->
    <?php
        include("../../Connect.php");
        $edit_id=$_GET['edit_id'];
        $edit=mysqli_query($con,"SELECT * FROM products as a, categories as b, class as c where a.cate_id=b.cate_id and a.class_id=c.class_id and prod_id='$edit_id' ");
        $data2=mysqli_fetch_array($edit);
    ?>
<!-- ....................................... -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="card mt-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="mt-3 text-center"><b>ຟອມແກ້ໄຂຂໍ້ມູນເສື້ອຜ້າ</b></h2>
                            </div>
                        </div>
                    </div>
            <!-- ........................ -->
                    <div class="card-body">
                        <form action="update_p.php" id="go" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="product_id" class="product_id form-control" id="product_id" value="<?php echo $data2['prod_id'] ?>">
                            <div class="row">
                                <!-- .................................... -->
                                <div class="col-sm-4 text-center">
                                    <label for="">ຮຸບສິນຄ້າ</label>
                                    <div class="show_eimg mt-3">
                                        <img src="../image/<?php echo $data2['img'] ?>" id="showimage" width="250px" height="250px" class="mt-1">
                                        <input type="hidden" name="photo2" id="photo2" value="<?php echo $data2['img'] ?>">
                                    </div>
                                </div>
                            <!-- ............ -->
                                <div class="col-sm-8">
                                    <div class="row aa">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">ລະຫັດສິນຄ້າ</label>
                                                <input type="text" name="prod_id" id="prod_id" class="prod_id form-control"
                                                value="<?php echo $data2['prod_id']; ?>" placeholder="ປ້ອນລະຫັດສິນຄ້າ..."readonly>
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="">ຊື່ສິນຄ້າ</label>
                                                <input type="text" name="prod_name" id="prod_name" class="prod_name form-control" 
                                                value="<?php echo $data2['prod_name']; ?>" placeholder="ປ້ອນຊື່ສິນຄ້າ...">
                                            </div>
                                            <div class="row mml">
                                                <div class="col-sm-8">
                                                    <div class="form-group mt-2">
                                                        <label for="">ເລືອກຮູບສິນຄ້າໃໝ່</label>
                                                        <input type="file" name="photo" id="photo" class="form-control photo"
                                                        placeholder="ເລືອກຮູບ...">
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group mt-2">
                                                        <label for="">ຈຳນວນ</label>
                                                        <input type="number" name="qty" id="qty" class="qty form-control" 
                                                        value="<?php echo $data2['prod_qty']; ?>" placeholder="ປ້ອນຈຳນວນ..." readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                            <!-- ............................................. -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">ປະເພດສິນຄ້າ</label>
                                                <select name="cate_id" id="cate_id" class="form-control">
                                                    <option value="<?php echo $data2['cate_id']; ?>"><?php echo $data2['cate_name']; ?></option>
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
                                                    <option value="<?php echo $data2['class_id']; ?>"><?php echo $data2['class_name']; ?></option>
                                                    <?php
                                                        include("../../Connect.php");
                                                        $selectclass = mysqli_query($con,"SELECT * FROM class");
                                                        while($data3 = mysqli_fetch_assoc($selectclass)){
                                                    ?>
                                                    <option value="<?php echo $data3['class_id'] ?>"><?php echo $data3['class_name']; ?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            
                                            <div class="row a mt-2">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">ລາຄາຊື້</label>
                                                        <input type="number" name="bprice" id="bprice" class="bprice form-control"
                                                        value="<?php echo $data2['bprice']; ?>" placeholder="ປ້ອນລາຄາຊື້...">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">ລາຄາຂາຍ</label>
                                                        <input type="number" name="sprice" id="sprice" class="sprice form-control"
                                                        value="<?php echo $data2['sprice'] ?>" placeholder="ປ້ອນລາຄາຂາຍ..." readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
            <!-- ........................................................ -->
                                    <div class="form-group mt-2">
                                        <label for="">&emsp;<b>ໝາຍເຫດ</b></label>
                                        <textarea name="remark" id="remark" cols="30" rows="2" class="remark form-control"></textarea>
                                    </div>
                        <!-- ................................... -->
                                    <center>
                                        <div class="form-group mt-3">
                                            <button type="submit" class="btn bg-success text-light" >
                                                <i class="fas fa-download"></i> ສົ່ງຂໍ້ມູນ</button>
                                            <a href="select_p.php">
                                                <button type="button" class="btn bg-danger text-light" id="reset">
                                                    <i class="fas fa-redo-alt fa-spin"></i> ກັບຄືນ</button>
                                            </a>
                                        </div>
                                    </center>
                                </div>
<!-- ............................................ -->
                            </div>
                        </form>
                        <div class="show" id="show"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
    <!-- .........tag change img -->
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



</html>