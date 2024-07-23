<!DOCTYPE html>
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
    <!-- ...................................................... -->

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
    <?php
        include("../../Connect.php");
        $id=$_GET['class_id'];
        $select=mysqli_query($con,"SELECT *FROM class as a,users as b,products as c where a.user_id=b.user_id and a.class_id=c.class_id 
        and a.class_id='$id' ");
    ?>
    <!-- ........................ -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="tag-header"><!-- sticky-sm-top -->
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-8">
                                <h2 class="mt-3 text-center title"><b>ລາຍງານໂຊນສິນຄ້າ</b></h2>
                                <hr style="height:2px;border-width:0;color:red;background-color:red">
                            </div>
                        </div>
                    </div>
                    <div class="tag-body mt-3">
                        <table class="table table-hover table-bordered">
                            <tr class="text-center">
                                <th class="bg-primary text-white">ລຳດັບ</th>
                                <th class="bg-primary text-white">ໂຊນສິນຄ້າ</th>
                                <th class="bg-primary text-white">ຂໍ້ມູນສິນຄ້າ</th>
                                <th class="bg-primary text-white">ໝາຍເຫດ</th>
                                <th class="bg-primary text-white">ຜູ້ບັນທືກຂໍ້ມູນ</th>
                            </tr>
                            <!-- ............................................ -->
                            <?php
                                $a=1;
                                while($data = mysqli_fetch_array($select)){
                            ?>
                            <tr class="">
                                <td><?php echo $a?></td>
                                <td><?php echo $data['class_name'] ?></td>
                                <td><?php echo $data['prod_name'] ?></td>
                                <td><?php echo $data['remark'] ?></td>

                                <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                
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



</html>
