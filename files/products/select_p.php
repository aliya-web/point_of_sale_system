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
    <!-- .................. -->
    <link rel="stylesheet" href="../../link/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../link/icon/css/all.min.css">
    <script src="../../link/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../link/jquery.js"></script>
    <script src="../../link/sweetalert/dist/sweetalert2.all.js"></script>
<!-- ................................... -->
<script>
    $(document).ready(function(){
        $(".delete").click(function(){
                var d1=$(this).attr("id");
                Swal.fire({
                    position:'top',
                 title: 'ທ່ານຕ້ອງການລົບຂໍ້ມູນ ຫຼື ບໍ່!!!',
                 text: "ກົດ 'ຕົກລົງ' ເພື່ອຢືນຢັນການລົບຂໍ້ມູນ",
                 icon: 'question',
                 showCancelButton: true,
                 confirmButtonColor: 'blue',
                 cancelButtonColor: 'red',
                 confirmButtonText: 'ຕົກລົງ',
                 cancelButtonText: 'ຍົກເລີກ',
                }).then((result)=>{
                if(result.isConfirmed){
                    Swal.fire({
                        position:'top ',
                        title:'ລົບຂໍ້ມູນສຳເລັດ',
                        icon: 'success',
                        showConfirmButton:false
                    })
                    setTimeout(()=>{
                        $.ajax({
                            url:'delete_p.php',
                            method:'post',
                            data:{delete_id:d1},
                            success:function(){
                                location.reload();
                            }
                        })
                    },2000);
                }
                });
             })
    })
</script>
<script>
    $(function(){
        $(".click").click(function(){
                var data = $(".search").val();
                $.post("search_p.php",{
                    search : data
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
        /* background-image: linear-gradient(to top, #5e72e4 0%, #ffffff 55%, #ffffff 100%); */
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
    <?php
        include("../../Connect.php");
        $select=mysqli_query($con,"SELECT * FROM products as a, categories as b, class as c,users as d where a.cate_id=b.cate_id and a.class_id=c.class_id and a.user_id=d.user_id");
        $count_pro=mysqli_query($con,"SELECT count(prod_id) from products;");
        $count=mysqli_fetch_row($count_pro);
    ?>
    <!-- ........................ -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow-lg mt-3 mb-3">
                    <div class="tag-header"><!-- sticky-sm-top -->
                        <div class="row titles">
                        <div class="col-sm-2 mt-3">
                                <a href="form_p.php">
                                <button type="button" class="btn btn-outline-primary mt-3">
                                    <i class="fas fa-folder-plus"></i> ເພີ່ມຂໍ້ມູນ</button>
                                </a>
                            </div>
                            <div class="col-sm-6">
                                <h3 class="mt-3 text-center title"><b><u>ລາຍງານຂໍ້ມູນສິນຄ້າທັງໝົດ</u></b></h3>
                                <hr style="height:2px;border-width:0;color:red;background-color:red">
                            </div>
                            <div class="col-sm-4 mt-3">
                                <div class="row text-center mt-3">
                                    <div class="col-sm-8">
                                        <input type="search" name="" id="" class="form-control search border-primary" placeholder="🔎 ຊອກຫາຂໍ້ມູນ...">
                                    </div>
                                    <div class="col-sm-4">
                                        <button type="button" class="btn btn-outline-primary click">🔎ຄົ້ນຫາ</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tag-body">
                        <!-- .................... -->
                    <p class="count">&emsp;<u><b>ຈຳນວນລາຍການສິນຄ້າທັງໝົດມີ: <?php echo $count[0];?> ລາຍການ</b></u></p>
                        <div class="show_search">
                        <table class="table table-hover table-bordered">
                            <tr class="text-center bg-primary text-light">
                                <th width="6%" class="">ລຳດັບ</th>
                                <th width="" class="">ລະຫັດສິນຄ້າ</th>
                                <th width="10%" class="">ຮູບສິນຄ້າ</th>
                                <th class="">ຊື່ສິນຄ້າ</th>
                                <th class="">ປະເພດ</th>
                                <th class="">ໂຊນສິນຄ້າ</th>
                                <th class="">ຈຳນວນ</th>
                                <th class="">ລາຄາຊື້</th>
                                <th class="">ລາຄາຂາຍ</th>
                                <th class="">ໝາຍເຫດ</th>
                                <th class="">ຜູ້ບັນທືກຂໍ້ມູນ</th>
                                <th width="6%" class="bg-warning text-white">ແກ້ໄຂ</th>
                                <th width="4%" class="bg-danger text-white">ລົບ</th>
                            </tr>
                            <!-- ............................................ -->
                            <?php
                                $num=1;
                                while($data = mysqli_fetch_array($select)){
                            ?>
                            <tr class="">
                                <td><?php echo $num?></td>
                                <td><?php echo $data['prod_id'] ?></td>
                                <td class="text-center"><img src="../img/<?php echo $data['img'] ?>" alt="" width="80px" height="80px" ></td><!-- class="w-75 h-75" -->
                                <td><?php echo $data['prod_name'] ?></td>
                                <td><?php echo $data['cate_name'] ?></td>
                                <td><?php echo $data['class_name'] ?></td>
                                <td><?php echo $data['prod_qty'] ?></td>
                                <td><?php echo number_format($data['bprice']) ?></td>
                                <td><?php echo number_format($data['sprice']) ?></td>
                                <td><?php echo $data['p_remark'] ?></td>

                                <td><?php echo $data['fname']."<br>".$data['lname']; ?></td>
                                
                                <td class="text-center">
                                    <a href="edit_p.php?edit_id=<?php echo $data['prod_id'];?>">
                                        <button class="btn bg-warning text-white">
                                            <i class="fas fa-edit"></i></button>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <button type="button" id="<?php echo $data['prod_id']; ?>" class="btn bg-danger text-white delete">
                                        <i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <?php
                                $num++;
                                }
                            ?>
                            <!-- .................................................. -->
                        </table>
                        </div>
                    </div>
                    <div class="show" id="show"></div>
                </div>
            </div>

        </div>
    </div>

</body>
<?php
}
?>
</html>
