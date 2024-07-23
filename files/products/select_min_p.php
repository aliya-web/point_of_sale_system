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
        $select=mysqli_query($con,"SELECT * FROM categories as a, products as b, class as c where b.cate_id=a.cate_id and b.class_id=c.class_id and prod_qty<'5' and prod_qty>0 ");
        $count_pro=mysqli_query($con,"SELECT count(prod_id) from products where prod_qty<'5' and prod_qty>0 ");
        $count=mysqli_fetch_row($count_pro);
    ?>

<!-- ...............container-fluid................ -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow-lg mt-3">
                    <div class="tag-header">
                        <h2 class="mt-4 text-center title"><b><u>ລາຍງານຂໍ້ມູນສິນຄ້າທີ່ໃກ້ຈະໝົດ</u></b></h2>
                        <hr>
                    </div>
                    <div class="tag-body">
                        <!-- .... -->
                        
                    <p class="count"><u><b>ຈຳນວນລາຍການສິນຄ້າທີ່ໃກ້ຈະໝົດມີ: <?php echo $count[0];?> ລາຍການ</b></u></p>
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
                            </tr>
                            <?php
                                $num++;
                                }
                            ?>
                            <!-- .................................................. -->
                        </table>
                        </div>
                        <!-- .......... -->
                        <div class="show_prod" id="show_prod"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- ...end container... -->


</body>

<!-- ......................................... -->
    <script src="../link/jquery.js"></script>
    <script src="../link/sweetalert2.all.min.js"></script>

<?php
}
?>
</html>