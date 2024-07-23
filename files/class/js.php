
 <script>
    $(document).ready(function () {
        $('.btn_modal').click(function () { 
            $('#modal_form').modal('show');
        });
    });
</script> 

<!-- insert_type -->
<script>
        $(function(){
            $("#go").click(function(){
                var class_name = $("#class_name").val();
                var remark = $("#remark").val();
                if(class_name==""){
                    Swal.fire({
                            position: 'top',
                            icon: 'warning',
                            title: 'ກາລຸນາປ້ອນຊົນສິນຄ້າກ່ອນ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                }else{
                    $.post("insert.php",{
                        class_name : class_name,
                        remark : remark
                    },
                    function(output){
                        $("#show").html(output);
                    })
                }
            })
        })
    </script>

<script>
    $(document).ready(function () {
    $('.edit_btn').click(function () { 
        $('#modal_edit').modal('show');
        let eid=$(this).attr('id');
        console.log(eid);
        $.ajax({
            type: "post",
            url: "fetch.php",
            data: {eid:eid},
            dataType: "json",
            success: function (data){
                $('#class_id1').val(data.class_id);
                $('#class_name1').val(data.class_name);
                $('#remark1').val(data.remark);
                $('#modal_edit').modal('show');
            }
        });
    });
});

$(document).ready(function() {
            $("#submit1").click(function() {
                let class_id1 = $("#class_id1").val();
                let class_name1 = $("#class_name1").val();
                let remark1 = $("#remark1").val();
                if (class_name1 == "") {
                    Swal.fire({
                        title: 'ກະລູນາປ້ອນຊົນສິນຄ້າ',
                        text: 'ກົດຕົກລົງເພື່ອປ້ອນຄືນ',
                        icon: 'warning'
                    })
                } else {
                    $.post("update.php", {
                        class_id1: class_id1,
                        class_name1: class_name1,
                        remark1: remark1
                    }, function(output) {
                        $("#show_emodal").html(output);
                    });
                }
            })
        })
</script>

<!-- ................................. -->
<script>
    $(document).ready(function(){
        $(".delete").click(function(){
                var d1=$(this).attr("id");
                Swal.fire({
                 position:'top',
                 title: 'ທ່ານຕ້ອງການລົບຂໍ້ມູນ ຫຼື ບໍ່!!!',
                 text: "ກົດ 'ຕົກລົງ' ເພື່ອຢືນຢັນການລົບຂໍ້ມູນ",
                 icon: 'question',
                 showCancelButton: true,
                 confirmButtonColor: 'blue',
                 cancelButtonColor: 'red',
                 confirmButtonText: 'ຕົກລົງ',
                 cancelButtonText: 'ຍົກເລີກ',
                }).then((result)=>{
                if(result.isConfirmed){
                    Swal.fire({
                        position:'top',
                        title:'ລົບຂໍ້ມູນສຳເລັດ',
                        icon: 'success',
                        // width: '1000',
                        // background:'url(../0_img/ab.jpg)',
                        // padding: '9em',
                        showConfirmButton:false
                    })
                    setTimeout(()=>{
                        $.ajax({
                            url:'delete.php',
                            method:'post',
                            data:{delete_id:d1},
                            success:function(){
                                location.reload();
                            }
                        })
                    },2000);
                }
                });
             })
    })
</script>