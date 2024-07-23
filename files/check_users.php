<?php
    session_start();//ປະກາດໃຊ້ session
    include("../Connect.php");
    $user = $_POST['user_name'];
    $pass = $_POST['password'];

    $select=mysqli_query($con,"SELECT user_id,status,fname,lname FROM users 
    WHERE user_name='$user' and password=md5('$pass')");

    $check=mysqli_num_rows($select);

    if($check <> 0){
        $rows=mysqli_fetch_array($select);

        if($rows['status']=="ຜູ້ບໍລິຫານ"){
            // ຖາ້ຫາກສະຖານະຂອງຜູ້ລ້ອກອິນ ແມ່ນຜູ້ບໍລິຫານ
            $_SESSION['user_id']=$rows['user_id'];
            // ວາງຕົວປ່ຽນ user_id ເກັບເອົາລະຫັດຜູ້ນຳໃຊ້
            $_SESSION['fname']=$rows['fname'];
            // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
            $_SESSION['lname']=$rows['lname'];
            // ວາງຕົວປ່ຽນ lname ເກັບເອົານາມສະກຸນ
            $_SESSION['checked']=1;
            // ວາງຕົວປ່ຽນ check ເກັບກຳເອົາເລກ 1 ເພື່ອໃຊ້ໃນການຢືນຢັນ

            echo"
                <script> Swal.fire({
                    position: 'center',
                    icon:'success',
                    title:'ເຂົ້າສູ້ລະບົບສຳເລັດ',
                    showConfirmButton: false,
                    timer:1500
                })
                window.setTimeout(function(){
                    location='files/menu_admin.php';
                },1500);
            </script>";
        }
        elseif($rows['status']=="ຜູ້ນຳໃໍຊ້"){
            // ຖາ້ຫາກສະຖານະຂອງຜູ້ລ້ອກອິນ ແມ່ນຜູ້ນຳໃໍຊ້
            $_SESSION['user_id']=$rows['user_id'];
            // ວາງຕົວປ່ຽນ user_id ເກັບເອົາລະຫັດຜູ້ນຳໃຊ້
            $_SESSION['fname']=$rows['fname'];
            // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
            $_SESSION['lname']=$rows['lname'];
            // ວາງຕົວປ່ຽນ lname ເກັບເອົານາມສະກຸນ
            $_SESSION['checked']=1;
            // ວາງຕົວປ່ຽນ check ເກັບກຳເອົາເລກ 1 ເພື່ອໃຊ້ໃນການຢືນຢັນ

            echo"
                <script> Swal.fire({
                    position: 'center',
                    icon:'success',
                    title:'ເຂົ້າສູ້ລະບົບສຳເລັດ',
                    showConfirmButton: false,
                    timer:1500
                })
                window.setTimeout(function(){
                    location='files/menu_user.php';
                },1500);
            </script>";
        }
        elseif($rows['status']=="ພະນັກງານຂາຍ"){
            // ຖາ້ຫາກສະຖານະຂອງຜູ້ລ້ອກອິນ ແມ່ນຜູ້ນຳໃໍຊ້
            $_SESSION['user_id']=$rows['user_id'];
            // ວາງຕົວປ່ຽນ user_id ເກັບເອົາລະຫັດຜູ້ນຳໃຊ້
            $_SESSION['fname']=$rows['fname'];
            // ວາງຕົວປ່ຽນ fname ເກັບເອົາຊື່
            $_SESSION['lname']=$rows['lname'];
            // ວາງຕົວປ່ຽນ lname ເກັບເອົານາມສະກຸນ
            $_SESSION['checked']=1;
            // ວາງຕົວປ່ຽນ check ເກັບກຳເອົາເລກ 1 ເພື່ອໃຊ້ໃນການຢືນຢັນ

            echo"
                <script> Swal.fire({
                    position: 'center',
                    icon:'success',
                    title:'ເຂົ້າສູ້ລະບົບສຳເລັດ',
                    showConfirmButton: false,
                    timer:1500
                })
                window.setTimeout(function(){
                    location='files/menu_seller.php';
                },1500);
            </script>";
        }

    }else{
        echo"
            <script> Swal.fire({
                position: 'center',
                icon:'error',
                title:'ຊື່ຜູ້ໃຊ້ ຫຼື ລະຫັດບໍ່ຖຶກຕ້ອງ',
                showConfirmButton: false,
                timer:2000
            })
        </script>";
    }
?>