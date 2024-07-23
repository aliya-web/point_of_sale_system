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
    <!-- ...................................................... -->

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
        include('js.php');
        include('form_modal.php');
        include('modal_edit.php');

        $select=mysqli_query($con,"SELECT *
        FROM class as a,users as b where a.user_id=b.user_id");
    ?>
    <!-- ........................ -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-3">
                    <div class="tag-header"><!-- sticky-sm-top -->
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-8">
                                <h2 class="mt-3 text-center title"><b>ລາຍງານໂຊນສິນຄ້າ</b></h2>
                                <hr style="height:2px;border-width:0;color:red;background-color:red">
                            </div>
                            <div class="col-sm-3 text-center mt-4">
                                <button type="button" class="mt-2 text-center btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#modal_form">
                                    <i class="fas fa-folder-plus"></i> ເພີ່ມຂໍ້ມູນ
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="tag-body mt-3">
                        <table class="table table-hover table-bordered">
                            <tr class="text-center">
                                <th class="bg-primary text-white">ລຳດັບ</th>
                                <th class="bg-primary text-white">ໂຊນສິນຄ້າ</th>
                                <th class="bg-primary text-white">ໝາຍເຫດ</th>
                                <th class="bg-primary text-white">ຜູ້ບັນທືກຂໍ້ມູນ</th>
                                <th width="8%" class="bg-warning text-white">ແກ້ໄຂ</th>
                                <th width="6%" class="bg-danger text-white">ລົບ</th>
                            </tr>
                            <!-- ............................................ -->
                            <?php
                                $a=1;
                                while($data = mysqli_fetch_array($select)){
                            ?>
                            <tr class="">
                                <td><?php echo $a?></td>
                                <td><a class="nav-link text-dark" href="select_class.php?class_id=<?php echo $data['class_id'];?>"><?php echo $data['class_name'] ?></a></td>
                                <td><?php echo $data['remark'] ?></td>

                                <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-warning edit_btn" id="<?php echo $data['class_id'] ?>"><i class="fas fa-edit"></i></button>
                                </td>
                                <td class="text-center">
                                    <button type="button" id="<?php echo $data['class_id']; ?>" class="btn btn-outline-danger delete">
                                        <i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                            <?php
                                $a++;
                                }
                            ?>
                            <!-- .................................................. -->
                        </table>
                    </div>
                    <!--  -->
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
