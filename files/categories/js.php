
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
                var cate_name = $("#cate_name").val();
                var remark = $("#remark").val();
                if(cate_name==""){
                    Swal.fire({
                            position: 'top',
                            icon: 'warning',
                            title: 'ກາລຸນາປ້ອນປະເພດສິນຄ້າກ່ອນ',
                            showConfirmButton: false,
                            timer: 1500
                        })
                }else{
                    $.post("insert.php",{
                        cate_name : cate_name,
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
                $('#cate_id1').val(data.cate_id);
                $('#cate_name1').val(data.cate_name);
                $('#remark1').val(data.remark);
                $('#modal_edit').modal('show');
            }
        });
    });
});

$(document).ready(function() {
            $("#submit1").click(function() {
                let cate_id1 = $("#cate_id1").val();
                let name1 = $("#cate_name1").val();
                let remark1 = $("#remark1").val();
                if (name1 == "") {
                    Swal.fire({
                        title: 'ກະລູນາປ້ອນຊື່ສິນຄ້າ',
                        text: 'ກົດຕົກລົງເພື່ອປ້ອນຄືນ',
                        icon: 'warning'
                    })
                } else {
                    $.post("update.php", {
                        cate_id1: cate_id1,
                        cate_name1: name1,
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