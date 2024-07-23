<!DOCTYPE html>
<?php

session_start();
if(@$_SESSION['checked']<>1){
	echo "<script>alert('ລົງຊືີ່ເຂົ້າໃຊ້ກ່ອນ'); location='../index.php';
	</script>";
	}
else{

?>
<html lang="en">
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
    <!-- ............... -->
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
    include('../../Connect.php');
    include('form_modal.php');
    include('modal_edit.php');
    include('js.php');
    $select_r=mysqli_query($con,'select * from users');
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-3">
                    <div class="tag-header mt-3">
                        <div class="row">
                        <div class="col-sm-1"></div>
                            <div class="col-sm-8">
                                <h2 class="text-center title"><b>ລາຍງານຂໍ້ມູນຜູ້ໃຊ້ງານ</b></h2>
                                <hr style="height:2px;border-width:0;color:red;background-color:red">
                            </div>
                            <div class="col-sm-3 text-center">
                                <button type="button" class="mt-2 text-center btn btn-outline-primary btn_modal" data-bs-toggle="modal"
                                    data-bs-target="#modal_form">
                                    <i class="fas fa-folder-plus"></i> ເພີ່ມຂໍ້ມູນ
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="tag-body">
                        <table class="table table-hover table-bordered">
                            <tr class="text-center text-light">
                                <th class="bg-primary">ລຳດັບ</th>
                                <th class="bg-primary">ຊື່ ແລະ ນາມສະກຸນ</th>
                                <th class="bg-primary">ເພດ</th>
                                <th class="bg-primary">ວັນເດືອນປີເກິດ</th>
                                <th class="bg-primary">ບ້ານ ເມືອງ ແຂວງ</th>
                                <th class="bg-primary">ຊື້ຜູ້ໃຊ້</th>
                                <th class="bg-primary">ສະຖານະ</th>
                                <th class="bg-primary">ເບີໂທ</th>
                                <th class="bg-primary">ໝາຍເຫດ</th>
                                <th width="6%" class="bg-warning">ແກ້ໄຂ</th>
                                <th width="6%" class="bg-danger">ລົບ</th>
                            </tr>
                        <?php
                            $aa=1;
                            while($data=mysqli_fetch_array($select_r)){
                        ?>
                            <tr>
                                <td><?php echo $aa;?></td>
                                <td><?php echo $data['fname']." ".$data['lname'];?></td>
                                <td><?php echo $data['gender'];?></td>
                                <td class="text-center"><?php echo $data['dob'];?></td>
                                <td><?php echo "ບ.".$data['vill']." ມ.".$data['dis']." ຂ.".$data['prov'];?></td>
                                <td><?php echo $data['user_name'];?></td>
                                <td><?php echo $data['status'];?></td>
                                <td><?php echo $data['tel'];?></td>
                                <td><?php echo $data['u_remark'];?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-warning edit_btn" id="<?php echo $data['user_id'] ?>"><i class="fas fa-edit"></i></button>
                                </td>
                                <td class="text-center">
                                    <button type="button" id="<?php echo $data['user_id']; ?>" class="btn btn-outline-danger delete">
                                        <i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php $aa++; } ?>
                        </table>
                        <div class="show_emodal" id="show_emodal"></div>
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