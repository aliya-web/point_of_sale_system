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
    <title>Ali_out_pro</title>
    <link rel="stylesheet" href="../../link/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../link/icon/css/all.min.css">
    <script src="../../link/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
<!-- ......................................... -->
    <script src="../link/jquery.js"></script>
    <script src="../link/sweetalert2.all.min.js"></script>

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
    .tag{
        /* background-image: linear-gradient(to top, #5e72e4 0%, #ffffff 55%, #ffffff 100%); */
        background-color: #ffffff;
        backdrop-filter: blur(5px);
        border: 6px solid #ffffff;
        border-radius: 10px;
    }
    /* .tag-header,.tag-body{
        background-color: rgba(255, 255, 255, 0.3) ;
    } */
.table{
      background-color: white;
      font-size: 15px;
  }
</style>


<body>
    <?php
        include("../../Connect.php");
        $sql = mysqli_query($con, "SELECT * from products as a, sells as b, users as c,class as d where b.prod_id=a.prod_id and a.class_id=d.class_id
        and b.user_id=c.user_id order by b.s_id desc ");
        $count_pro=mysqli_query($con,"SELECT count(prod_id) from sells");
        $count=mysqli_fetch_row($count_pro);
    ?>

<!-- ...............container-fluid................ -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="tag mt-3">
                    <div class="tag-header">
                        <!-- .... -->
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="mt-3 title"><b><i class="fa fa-table"></i> <u>ລາຍງານຂໍ້ມູນສິນຄ້າຂາຍອອກທັງໝົດ</u></b></h4>
                            </div>
                            <div class="col-sm-6 text-end mt-4">
                                <p class="count"><u><b>ຈຳນວນລາຍການສິນຄ້າທີ່ຂາຍອອກທັງໝົດມີ: <?php echo $count[0];?> ລາຍການ</b></u></p>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="tag-body">
                        <div class="show">
                        <table class="table table-hover table-bordered table-sm">
                            <tr>
                            <th class="bg-primary text-white">ລຳດັບ</th>
                            <th class="bg-primary text-white">ລະຫັດສິນຄ້າ</th>
                            <th width="8%" class="bg-primary text-white">ຮູບສິນຄ້າ</th>
                            <th class="bg-primary text-white">ຊື່ສິນຄ້າ</th>
                            <th class="bg-primary text-white">ໂຊນສິນຄ້າ</th>
                            <th class="bg-primary text-white">ຈຳນວນ</th>
                            <th class="bg-primary text-white">ລາຄາຂາຍ</th>
                            <th class="bg-primary text-white">ເງິນລວມ</th>
                            <th class="bg-primary text-white">ວັນທີ ແລະ ເວລາ</th>
                            <th class="bg-primary text-white">ໝາຍເຫດ</th>
                            <th class="bg-primary text-white">ເລກໃບບິນ</th>
                            </tr>
                            <?php
                            $a = 1;
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                                <td><?php echo $a; ?></td>
                                <td><?php echo $data['prod_id']; ?></td>
                                <td class="text-center"><img src="../image/<?php echo $data['img'] ?>" alt="" class="w-75 h-75"></td>
                                <td><?php echo $data['prod_name']; ?></td>
                                <td><?php echo $data['class_name']; ?></td>
                                <td><?php echo $data['s_qty']; ?></td>
                                <td><?php echo $data['sprice']; ?></td>
                                <td><?php echo $data['amount']; ?></td>
                                <td><?php echo $data['s_date'] . " " . $data['s_time']; ?></td>
                                <td><?php echo $data['s_remark']; ?></td>
                                <td><?php echo $data['bill']; ?></td>
                            </tr>
                            <?php
                            $a++;
                            }
                            ?>
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

<?php
}
?>
</html>