
<!DOCTYPE html>
<html lang="en" onclick="window.print()"> 
    

<?php
include("../../Connect.php");
// $s_id= $_POST['print'];

if(!isset($_POST['print'])){
    header('location:menu_sell.php');
}else{
    
    $s_id= implode (", ",$_POST['print']);
    $sql = mysqli_query($con,"SELECT max(bill) from sells");
    $result = mysqli_fetch_array($sql);
     
    if($result[0]==0){
        $a = $result[0]+100000;
        mysqli_query($con,"UPDATE sells set bill='$a' where s_id in($s_id) ");
    }else{
        $b = $result[0]+1;
        mysqli_query($con,"UPDATE sells set bill='$b' where s_id in($s_id) ");
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aliya_bill_out</title>
    <link rel="stylesheet" href="../../link/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../link/icon/css/all.min.css">
    <script src="../../link/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../link/jquery.js"></script>
    <script src="../../link/sweetalert/dist/sweetalert2.all.min.js"></script>

</head>
<style>
    *{font-family: phetsarath ot;}
    span{
        font-size: 28px;
    }
</style>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div class="row mt-3">
                    <div class="col-sm-12 text-center">
                        <img src="../../image/logo5.jpg" class="" alt="" width="8%">
                        <span>ຮ້ານຂາຍເຄື່ອງທຸກຢ່າງ 10.000</span>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-9">
                        <p>ບ້ານ ໂນນສະຫວ່າງ, ເມືອງ ວຽງຄຳ, ແຂວງ ວຽງຈັນ <br>
                        ເບີໂທ: 020 98718098
                        </p>
                    </div>
                    <div class="col-sm-3">
                        <?php
                            date_default_timezone_set("Asia/bangkok");
                            $date = date("d/m/y H:i");
 
                            $select = mysqli_query($con,"SELECT bill from sells where s_id in('$s_id') ");
                            $show=mysqli_fetch_array($select);
                        ?>
                        <p>ເລກທີ່: <?php echo $show['bill'] ?>
                            <br> ວັນທີ ແລະ ເວລາ: <br> <?php echo $date; ?> </p>
                    </div>
                </div>
                <div class="bill mt-2">
                    <h3 class="text-center">ໃບບິນ (invoice)</h3>
                    <table class="table table-hover table-bordered mt-3">
                        <tr class="alert-secondary">
                            <th width="80px">ລ/ດ</th>
                            <th width="500px">ລາຍການ</th>
                            <th width="200px">ຈຳນວນ</th>
                            <th width="300px">ລາຄາ</th>
                            <th width="300px">ລວມເປັນເງີນ</th>
                        </tr>
                        <?php
                            $print=mysqli_query($con,"SELECT * FROM sells as a, products as b WHERE a.prod_id=b.prod_id and s_id in($s_id) ");
                            $num=1;
                            while($data=mysqli_fetch_array($print)){
                        ?>
                        <tr>
                            <td><?php echo $num; ?></td>
                            <td><?php echo $data['prod_name'] ?></td>
                            <td><?php echo $data['s_qty'] ?></td>
                            <td><?php echo number_format($data['sprice']); ?></td>
                            <td><?php echo number_format($data['amount']); ?></td>
                        </tr>
                        <?php 
                            $num++;
                            }

                            $sum = mysqli_query($con,"SELECT sum(amount) from sells where s_id in($s_id)");
                            $sum_price=mysqli_fetch_array($sum);

                            $select_users=mysqli_query($con,"SELECT *FROM users as a, sells as b where a.user_id=b.user_id and s_id in($s_id) ");
                            $users=mysqli_fetch_array($select_users);
                        ?>
                        <tr>
                            <td colspan="4"><b>ລວມເປັນເງີນທັງໝົດ: </b></td>
                            <td><b><?php echo number_format($sum_price[0]).' ກີບ'; ?></b></td>
                        </tr>
                    </table>
                    <div class="row p-3">
                        <div class="col-sm-6">
                            <p>ພະນັກງານຂາຍ: <?php echo $users['fname']." ".$users['lname']; ?></p>
                        </div>
                        <div class="col-sm-6">
                            <p>ເບີໂທ: <?php echo $users['tel'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
        
    </div>

</body>
</html>