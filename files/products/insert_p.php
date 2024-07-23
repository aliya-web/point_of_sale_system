<?php
    session_start();
    include("../../Connect.php");


    $check=getimagesize($_FILES['photo']['tmp_name']);
    if($check){
        $prod_id=$_POST['prod_id'];
        $cate_id=$_POST['cate_id'];
        $class_id=$_POST['class_id'];
        $prod_name=$_POST['prod_name'];
        $qty=$_POST['qty'];
        $bprice=$_POST['bprice'];
        $sprice=$_POST['sprice'];
        $remark=$_POST['remark'];

        $user_id=$_SESSION['user_id'];

        $getphoto="../img/";
        $file_img = $getphoto . basename($_FILES['photo']['name']);//ຮັບຄ່າຮູບ
        $array = pathinfo($file_img,PATHINFO_EXTENSION);
        $select = mysqli_query($con,"SELECT * FROM products where prod_id='$prod_id' ");
        $check_prod = mysqli_num_rows($select);
        if($check_prod <> 0){
            echo "<script>
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: 'ຊື່ນີ້ມີແລ້ວ...',
                showConfirmButton: false,
                timer: 1500
            })
            window.setTimeout(function(){
                location.reload();
            } ,1500);
            </script>";
        }else{
            if(!file_exists($file_img)){
                if(move_uploaded_file($_FILES['photo']['tmp_name'],$file_img)){
                    $insert=mysqli_query($con,"INSERT INTO products set prod_id='$prod_id',cate_id='$cate_id',class_id='$class_id',prod_name='$prod_name',prod_qty='$qty',bprice='$bprice',sprice='$sprice',img='$file_img',p_remark='$remark',user_id='$user_id' ");
                    if($insert){
                        echo "<script>
                            Swal.fire({
                                position: 'top',
                                icon: 'success',
                                title: 'ການບັນທືກສຳເລັດ',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            window.setTimeout(function(){
                                location.reload();
                            } ,1500);
                            </script>";
                        }
                }
            }else{
                $new_name = $file_img.time().".".$array;
                if(move_uploaded_file($_FILES['photo']['tmp_name'],$file_img)){
                    $insert=mysqli_query($con,"INSERT INTO products set prod_id='$prod_id',cate_id='$cate_id',class_id='$class_id',prod_name='$prod_name',prod_qty='$qty',bprice='$bprice',sprice='$sprice',img='$file_img',p_remark='$remark',user_id='$user_id' ");
                    if($insert){
                        echo "<script>
                        Swal.fire({
                            position: 'top',
                            icon: 'success',
                            title: 'ການບັນທືກສຳເລັດ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        window.setTimeout(function(){
                            location.reload();
                        } ,1500);
                        </script>";
                    }
                }
            }
        }
    }


?>