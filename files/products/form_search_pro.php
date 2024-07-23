<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AM_Shop</title>
    <link rel="stylesheet" href="../../link/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../link/icon/css/all.min.css">
    <script src="../../link/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../link/jquery.js"></script>
    <script src="../../link/sweetalert2.all.min.js"></script>
    <script>
        $(function(){
            $(".click").click(function(){
                    var data = $(".search").val();
                    $.post("search_p.php",{
                        search : data
                    },
                    function(output){
                        $(".show").html(output);
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
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-3 pb-5">
                    <h2 class="title mt-4 text-center"><b><u>ຟອມຄົ້ນຫາຂໍ້ມູນສິນຄ້າ</u></b> </h2>
                    <center><hr width="50%"></center>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-7">
                            <input type="search" name="searcho" id="search" class="form-control search" placeholder="🔎 ປ້ອນຂໍ້ມູນທີ່ຕ້ອງການຊອກຫາ">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn bg-light text-primary click">🔎ຄົ້ນຫາ</button>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <!-- ............................ -->
                    <center><hr width="80%"></center>
                    <div class="search-table p-3">
                        <?php
                            include("../../Connect.php");
                            // $search_pro=$_POST['search'];
                            // $search=mysqli_query($con,"SELECT * FROM categories as a, products as b where b.cate_id=a.cate_id");
                            $search=mysqli_query($con,"SELECT * FROM categories as a, products as b, users as c, class as d where b.cate_id=a.cate_id and b.class_id=d.class_id
                            and b.user_id=c.user_id");
                        ?>
                        <!-- ............ -->
                        <!-- <table class="table table-hover table-bordered table-sm"> -->
                        <div class="show">
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
                                while($data = mysqli_fetch_array($search)){
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
                            <!-- ...../table............. -->
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</body>
<!-- ..... -->


</html>