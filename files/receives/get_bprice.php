<?php
    include("../../Connect.php");
    $prod_id = $_POST['prod_id'];
    $sql = mysqli_query($con,"SELECT bprice FROM products WHERE prod_id='$prod_id' ");
    $show_bprice = mysqli_fetch_array($sql);
    if($show_bprice){
        echo $show_bprice[0];
    }else{
        echo "ບໍ່ມີສິນຄ້າ";
    }
?>