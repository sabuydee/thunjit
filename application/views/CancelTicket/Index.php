<h4 class="modal-title">ยกเลิกตั๋ว</h4><hr>
<form id="form_cancel_ticket" action="CancelTicket/by_booking_id" class="form-inline" style="text-align: center;">

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-barcode"> หรัสจองตั๋ว</span></span>
            <input type="text" id="booking_id" name="booking_id" class="form-control" aria-describedby="basic-addon1">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">ตกลง</button>
    <br><br>
</form>

<script>
    $(function() {
        
        $("#form_cancel_ticket").submit(function(){
            
            var booking_id = $("#form_cancel_ticket #booking_id").val();
            
            if(booking_id == ""){
                
                alert("กรุณาใส่รหัสจองตั๋วที่คุณต้องการยกเลิกครับ");
                return false;
            }
            
            $.get($(this).attr("action") + "/" + booking_id, function(res){
                
                result = JSON.parse(res);
                if(!result.status == "succeed"){
                    alert("ไม่สามารถยกเลิกได้ กรุณาลองอีกครั้ง");
                }else{
                    alert("ทำการยกเลิกเรียบร้อยแล้วครับ");
                    $("#my_modal").modal("hide");
                }
            });
            return false;
        });
    });
</script>