<?php
include("../../Connect.php");
    $search_pro=$_POST['search'];
    $search=mysqli_query($con,"SELECT * FROM categories as a, products as b, class as c,users as d where b.cate_id=a.cate_id and b.class_id=c.class_id and b.user_id=d.user_id
    and (prod_id like'%$search_pro%' or prod_name like'%$search_pro%' or a.cate_name like'%$search_pro%')");
?>
<style>
    table{
    background-color: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(5px);
    color: white;
    }
</style>
<table class="table table-hover table-bordered">
    <tr class="text-center text-white bg-primary">
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
        <td class="text-center"><img src="../img/<?php echo $data['img'] ?>" alt="" width="80px" height="80px"></td>
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