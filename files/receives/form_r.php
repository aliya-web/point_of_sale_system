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
    <script src="../../link/sweetalert/dist/sweetalert2.all.min.js"></script>
    <!-- ......................... -->
    <script>
        $(function(){
            $("#prod_id").keyup(function(){
                var id = $("#prod_id").val();
            
                // ..........prod_name.................    
                    $.post("get_name.php",{
                        prod_id : id
                    },
                    function(output){
                        $("#prod_name").val(output);
                    })

                    // ..........prod_bprice.................    
                    $.post("get_bprice.php",{
                        prod_id : id
                    },
                    function(output){
                        $("#bprice").val(output);
                    })
                    // ..........prod_bprice.................    
                    $.post("get_img.php",{
                        prod_id : id
                    },
                    function(output){
                        $(".choose_img").html(output);
                    })
            })
        // ...........r_qty * bprice..................
            $("#r_qty").keyup(function(){
                var bprice = parseInt($("#bprice").val());
                var r_qty = parseInt($("#r_qty").val()); 
                var totals = parseFloat(bprice * r_qty) || 0;
                $("#amount").val(totals);
            })

        // .......................................
            $("#send").click(function(){
                var id = $("#prod_id").val();
                var price = $("#bprice").val();
                var qty = $("#r_qty").val();
                var amount = $("#amount").val();
                var remark = $("#remark").val();
                if(id==""){
                    Swal.fire(
                        'ປ້ອນບາໂຄດສິນຄ້າກ່ອນ...!',
                        'ກົດ ok ເພື່ອດຳເນີນການຕໍ່',
                        'warning'
                    )
                }
                else if(qty==""){
                    Swal.fire(
                        'ປ້ອນຈຳນວນສິນຄ້າກ່ອນ...!',
                        'ກົດ ok ເພື່ອດຳເນີນການຕໍ່',
                        'warning'
                    )
                }
                else{
                    $.post("insert_r.php",{
                        prod_id : id,
                        bprice : price,
                        r_qty : qty,
                        amount : amount,
                        remark : remark
                    },
                    function(output){
                        $(".show").html(output); 
                    })
                }
                
            })
        
            
        })
    </script>
    <!--  -->
</head>
<style>
    *{font-family: phetsarath ot;}
    body{
        margin-bottom: 19%;
        background-image: linear-gradient(to top, #ffffff 65%, #5e72e4 10%, #5e72e4 70%);
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
                            <div class="col-sm-9"><h2 class="text-center mt-3"><b><u>ຟອມບັນທືກສິນຄ້ານຳເຂົ້າ</u></b></h2></div>
                            <div class="col-sm-3">
                            <a href="select_r.php">
                                <button type="button" class="btn btn-outline-primary mt-3">
                                <i class="fas fa-bars"></i> ເບິ່ງຂໍ້ມູນ</button>
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" class="">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="text-center">ຮູບສິນຄ້າ</h6>
                                    <div class="choose_img text-center mt-2">
                                        <!-- <img src="" id="showimage" width="90%" height="90%" class="mt-2"> -->
                                    </div>
                                </div>
                                <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">ລະຫັດສິນຄ້າ:</label>
                                        <input type="text" name="prod_id" id="prod_id" class="form-control" placeholder="ປ້ອນລະຫັດ....">
                                    </div>
                                    
                                    <div class="form-group mt-2">
                                        <label for="">ຈຳນວນ:</label>
                                        <input type="number" name="r_qty" id="r_qty" class="form-control" placeholder="ປ້ອນຈຳນວນ....">
                                    </div>
                                </div>
                        <!-- ....................................... -->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">ຊື່ສິນຄ້າ:</label>
                                        <input type="text" name="prod_name" id="prod_name" class="form-control" placeholder="ປ້ອນຊື່...." readonly>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="">ລາຄາຊື້:</label>
                                        <input type="number" name="bprice" id="bprice" class="form-control" placeholder="ປ້ອນລາຄາຊື້...." readonly>
                                    </div>
                                    
                                </div>
                                <!-- ;;;;;;;;;;;;; -->
                                <div class="form-group mt-2">
                                        <label for=""><u><b>ເງີນລວມ:</b></u></label>
                                        <input type="number" name="amount" id="amount" class="form-control" placeholder="ປ້ອນເງີນລວມ...." readonly>
                                </div>
                        <!-- ............................................. -->
                                <div class="form-group">
                                    <label for="">ໝາຍເຫດ:</label>
                                    <textarea name="remark" id="remark" cols="20" rows="2" class="form-control remark" placeholder="ກາລຸນາປ້ອນໝາຍເຫດ"></textarea><br>
                                    <center>
                                        <button type="button" class="btn bg-success text-white send" id="send">
                                            <i class="fas fa-download"></i> ບັນທືກ</button>
                                        <button type="reset" class="btn bg-danger text-white" id="reset">
                                        <i class="fas fa-eraser"></i> ລ້າງຂໍ້ມູນ</button>
                                        
                                    </center>
                                </div>
                            </div>
                            </div>
                            </div>
                        </form>
                    </div>
                    <!-- ................. -->
                    <div class="show" id="show"></div>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>

    
</body>
<?php
}
?>
</html>