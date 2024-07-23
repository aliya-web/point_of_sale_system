<?php
include("../../Connect.php");
    $prod_id = $_POST['prod_id'];
    $sql = mysqli_query($con,"SELECT sprice FROM products WHERE prod_id='$prod_id' ");
    $s_sprice = mysqli_fetch_array($sql);
    if($s_sprice){
        echo $s_sprice[0];
    }else{
        echo "ບໍ່ມີສິນຄ້າ";
    }
?>