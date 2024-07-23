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

<script>
    $(function(){
        $(".search").click(function(){
            var a =$('.date1').val();
            var b =$('.date2').val();

            $.post("search_r.php",{
                date1 : a,
                date2 : b
            },
            function(output){
                $(".show_search").html(output);
            })
        })
    })
</script>
</head>
<style>
* {
    font-family: Phetsarath OT;
}
body{
        margin-bottom: 5%;
        /* background-image: linear-gradient(to top, #ffffff 70%, #EACCF8 10%, #5e72e4 70%); */
        background-color: #5e72e4;
    }
    .card{
        backdrop-filter: blur(5px);
        border: 6px solid #ffffff;
        border-radius: 10px;
    }
    .tag-header,.tag-body{
        background-color: rgba(255, 255, 255, 0.3) ;
    }
.table{
      background-color: white;
      font-size: 15px;
  }
</style>
<body>
<!-- ........ -->
<?php
include("../../Connect.php");
    $select=mysqli_query($con,"SELECT * FROM products AS a, receives AS b, users AS c, class as d WHERE a.prod_id=b.prod_id and b.user_id=c.user_id and a.class_id=d.class_id order by r_id desc ");
    // ........
    $count_pro=mysqli_query($con,"SELECT count(r_id) from receives;");
    $count=mysqli_fetch_row($count_pro);
?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-3">
                    <div class="tag-header">
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-7 text-center">
                                <h3 class="mt-3 title">&emsp;<b><u>ລາຍງານຂໍ້ມູນສິນຄ້ານຳເຂົ້າ</u></b></h3>
                                <hr style="height:2px;border-width:0;color:red;background-color:red">
                            </div>
                            <div class="col-sm-3 text-center">
                            <a href="form_r.php">
                                <button type="button" class="btn btn-outline-primary mt-3">
                                <i class="fas fa-folder-plus"></i> ເພີ່ມຂໍ້ມູນ</button>
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="tag-body">
                        <div class="row">
                            <div class="col-sm-6">
                                    <!-- ............. -->
                                <p class="count mt-2">&emsp; <u><b>ຈຳນວນລາຍການສິນຄ້າທັງໝົດມີ: <?php echo $count[0];?> ລາຍການ</b></u></p>
                            </div>
                            <div class="col-sm-6">
                                <form action="" class="form-inline d-flex">
                                    <div class="form-group">
                                        <input type="date" name="" id="" class="form-control date1">
                                    </div>
                                    <div class="form-group mx-sm-4">
                                        <input type="date" name="" id="" class="form-control date2">
                                    </div>
                                    <div class="form-group mx-sm-2">
                                        <button type="button" class="btn bg-success text-white search">
                                            <i class="fas fa-search"></i> ຄົ້ນຫາ</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    <!-- ......... -->
                        <div class="show_search">
                            <table class="table table-hover table-bordered">
                                <tr class="text-center text-white">
                                    <th class="bg-primary">ລຳດັບ</th>
                                    <th class="bg-primary">ລະຫັດສິນຄ້າ</th>
                                    <th width="8%" class="bg-primary text-white">ຮູບສິນຄ້າ</th>
                                    <th class="bg-primary">ຊື່ສິນຄ້າ</th>
                                    <th class="bg-primary">ໂຊນສິນຄ້າ</th>
                                    <th class="bg-primary">ຈຳນວນ</th>
                                    <th class="bg-primary">ລາຄາຊື້</th>
                                    <th class="bg-primary">ເງິນລວມ</th>
                                    <th class="bg-primary">ວັນທີ່ ແລະ ເວລາ</th>
                                    <th class="bg-primary">ຊື່ຜູ້ນຳເຂົ້າ</th>
                                    <th class="bg-primary">ໝາຍເຫດ</th>
                                </tr>
                                    <?php
                                        $r_num=1;
                                        while($show=mysqli_fetch_array($select)){
                                    ?>
                                <tr class="">
                                    <td><?php echo $r_num; ?></td>
                                    <td><?php echo $show['prod_id']; ?></td>
                                    <td class="text-center"><img src="../image/<?php echo $show['img'] ?>" alt="" class="w-75 h-75"></td>
                                    <td><?php echo $show['prod_name']; ?></td>
                                    <td><?php echo $show['class_name']; ?></td>
                                    <td><?php echo $show['r_qty']; ?></td>
                                    <td><?php echo number_format($show['r_bprice']); ?></td>
                                    <td><?php echo number_format($show['r_amount']); ?></td>
                                    <td class="text-center"><?php echo $show['r_date']." | ".$show['r_time']; ?></td>
                                    <td><?php echo $show['fname']." ".$show['lname']; ?></td>
                                    <td><?php echo $show['r_remark']; ?></td>
                                </tr>
                                    <?php
                                        $r_num++; 
                                        }
                                    ?>

                            </table>
                        </div>
                        <!-- ............... -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>
<?php
}
?>
</html>