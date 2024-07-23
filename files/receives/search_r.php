<?php
include("../../Connect.php");
    $date1=$_POST['date1'];
    $date2=$_POST['date2'];
    // $search=mysqli_query($con,"SELECT * FROM products AS a, receives AS b WHERE a.prod_id=b.prod_id
    // and b.r_date between '$date1' and '$date2' "); 
    $search=mysqli_query($con,"SELECT * FROM products AS a, receives AS b, users as c WHERE a.prod_id=b.prod_id and b.user_id=c.user_id
    and b.r_date between '$date1' and '$date2' "); 
    $sum=mysqli_query($con,"SELECT sum(r_amount) FROM receives WHERE r_date between '$date1' and '$date2'");
    $all_amount=mysqli_fetch_array($sum);
?>
<!-- ................... -->
<p>
    ລາຍງານຂໍ້ມູນລະຫວ່າງ ວັນທີ່ <?php echo $date1." ຫາ ວັນທີ່ ".$date2; ?><br>
    ເງິນລວມທັງໝົດ: <button class="btn-info"><?php echo number_format($all_amount[0])."ກີບ";?></button>
</p>

<table class="table table-hover table-bordered">
    <tr class="text-center text-white">
        <th class="bg-primary">ລຳດັບ</th>
        <th class="bg-primary">ລະຫັດສິນຄ້າ</th>
        <th width="8%" class="bg-primary text-white">ຮູບສິນຄ້າ</th>
        <th class="bg-primary">ຊື່ສິນຄ້າ</th>
        <th class="bg-primary">ຈຳນວນ</th>
        <th class="bg-primary">ລາຄາຊື້</th>
        <th class="bg-primary">ເງິນລວມ</th>
        <th class="bg-primary">ວັນທີ່ ແລະ ເວລາ</th>
        <th class="bg-primary">ຊື່ຜູ້ນຳເຂົ້າ</th>
        <th class="bg-primary">ໝາຍເຫດ</th>
    </tr>
        <?php
            $r_num=1;
            while($show=mysqli_fetch_array($search)){
        ?>
    <tr class="">
        <td><?php echo $r_num; ?></td>
        <td><?php echo $show['prod_id']; ?></td>
        <td class="text-center"><img src="../image/<?php echo $show['img'] ?>" alt="" class="w-75 h-75"></td>
        <td><?php echo $show['prod_name']; ?></td>
        <td><?php echo $show['r_qty']; ?></td>
        <td><?php echo $show['bprice']; ?></td>
        <td><?php echo $show['r_amount']; ?></td>
        <td class="text-center"><?php echo $show['r_date']." | ".$show['r_time']; ?></td>
        <td><?php echo $show['fname']."<br>".$show['lname']; ?></td>
        <td><?php echo $show['r_remark']; ?></td>
    </tr>
        <?php
            $r_num++; 
            }
        ?>

</table>


