<?php
include("../../Connect.php");
    $prod_id = $_POST['prod_id'];
    $sql = mysqli_query($con,"SELECT prod_name FROM products WHERE prod_id='$prod_id' ");
    $s_name = mysqli_fetch_array($sql);
    if($s_name){
        echo $s_name[0];
    }else{
        echo "ບໍ່ມີສິນຄ້າ";
    }
?>