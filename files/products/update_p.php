<?php 
    include('../../Connect.php');

    $product_id=$_POST['product_id'];
    
    $prod_id=$_POST['prod_id'];
    $cate_id=$_POST['cate_id'];
    $class_id=$_POST['class_id'];
    $prod_name=$_POST['prod_name'];
    $qty=$_POST['qty'];
    $bprice=$_POST['bprice'];
    $sprice=$_POST['sprice'];
    $remark=$_POST['remark'];

    $getphoto="../img/";
    $img = $_POST['photo2'];
    $img2 = $_FILES['photo']['name'];

    if($img2 <> ""){
        $file_img = $getphoto . basename($_FILES['photo']['name']);
        $array = pathinfo($file_img,PATHINFO_EXTENSION);
        if(!file_exists($file_img)){
            if(move_uploaded_file($_FILES['photo']['tmp_name'],$file_img)){
               
            }
        }else{
            $new_name = $file_img.time().".".$array;
            if(move_uploaded_file($_FILES['photo']['tmp_name'],$file_img)){
               
            }
        }
    }else{
        $file_img = $img;
    }

    $update = mysqli_query($con,"UPDATE products SET prod_id='$prod_id',cate_id='$cate_id',class_id='$class_id',prod_name='$prod_name',prod_qty='$qty',bprice='$bprice',sprice='$sprice',img='$file_img', p_remark='$remark' where prod_id='$product_id' ");
    if($update){
        echo "<script>
        Swal.fire({
            position: 'top',
            icon: 'success',
            title: 'ການແກ້ໄຂສຳເລັດ',
            showConfirmButton: false,
            timer: 1500
        })
        window.setTimeout(function(){
            location='select_p.php';
        } ,1500);
        </script>";
    }

?> 