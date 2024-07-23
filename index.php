<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AM_SHOP</title>
    <link rel="stylesheet" href="link/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="link/icon/css/all.min.css">
    <script src="link/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="link/jquery.js"></script>
    <script src="link/sweetalert/dist/sweetalert2.all.min.js"></script>
<!-- ............................. -->
<script>
    $(function(){
        $(".login").click(function(){
            var user_name = $('.user_name').val();
            var password = $('.password').val();

            if(user_name==""){
                Swal.fire({
                    position:'center',
                    icon: 'warning',
                    title: 'ການລຸນາປ້ອນຊື່',
                    showConfirmButton: false,
                    timer: 1500
                })
            }else if(password==""){
                Swal.fire({
                    position:'center',
                    icon: 'warning',
                    title: 'ການລຸນາປ້ອນລະຫັດຜ່ານ',
                    showConfirmButton: false,
                    timer: 1500
                })
            }else{
                $.post("files/check_users.php",{
                    user_name : user_name,
                    password : password
                },
                function(output){
                    $(".show").html(output);
                })
            }
        })
    })
</script>
</head>

<style>
    *{
        font-family: phetsarath OT;
    }
    .card{
        /* background-image: url(image/logo5.jpg); */
        background-color: rgba(255, 255, 255, 0.3);
        background-position:center;
        background-size: cover;
        /* background-color: #e3e2; */
        backdrop-filter: blur(5px);
        padding-top: 23%;
        padding-bottom: 23%;
        padding-right: 10%;
        padding-left: 10%;
        border-radius: 15%;
    }
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: url('image/bg1.jpg') no-repeat;
        /* background-image: url(image/bg1.jpg); */
        background-size: cover;
        background-position: center;
        /* background-repeat: repeat; */
    }
    .form-control{
        border: none;
        border-radius: 10px;
        border-bottom: 3px solid #2800ff;
        border-right: 1px solid #2800ff;
        border-left: 4px solid #2800ff;
    }
    .btn{
        background-color: #fff;
        border: none;
        border-radius: 10px;
        border-bottom: 2px solid #18c729;
        border-left: 3px solid #18c729;
    }
    .title{
        color:black;
        text-shadow: 0 0 8px #ffffff, 0 0 8px #41f;
        text-shadow: 2px 2px 4px #ffffff;
    }
    label{
        color:black;
        text-shadow: 0 0 8px #ffffff, 0 0 8px #41f;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="card mt-3 shadow-lg">
                    <!-- <div class="row abc">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <img src="image/login5.png" width="100%" alt="">
                        </div>
                        <div class="col-sm-4"></div>
                    </div> -->
                    <h3 class="title text-center mt-2"><u><b>ຍິນດີຕ້ອນຮັບ</b></u></h3>
                    <div class="card-body mt-2">
                        <form action="">
                            <div class="form-group">
                                <label for="">&emsp;<b><u>ຊື່ຜູ້ໃຊ້</u></b></label>
                                 <input type="text" name="user_name" id="user_name" class="form-control user_name"
                                 placeholder="ປ້ອນຊື່...">
                            </div>
                            <div class="form-group mt-2">
                                <label for="" class="">&emsp;<b><u>ລະຫັດຜ່ານ</u></b></label>
                                    <input type="password" name="password" id="password" class="password form-control" placeholder="ລະຫັດຜ່ານ...">
                            </div>
                            <div class="form-group text-center mt-3">
                                <button type="button" class="btn text-success login">
                                <i class="fas fa-sign-in-alt"></i> ເຂົ້າສູ່ລະບົບ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
            <div class="show" id="show"></div>
        </div>
    </div>
</body>


</html>
