<?php
include("../../Connect.php");
    $prod_id = $_POST['prod_id'];
    $sql = mysqli_query($con,"SELECT img FROM products WHERE prod_id='$prod_id' ");
    $s_img = mysqli_fetch_array($sql);
    if($s_img){
?>
    <div class="choose_img text-center mt-2">
        <img src="../img/<?php echo $s_img['img'] ?>" id="showimage" width="90%" height="90%" class="mt-2">
    </div>
    
<?php
    }
?>