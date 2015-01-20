<form id="form_booking" action="Booking/seat_booking">
    
    <div id="box_form_booking_load"></div>
    <div id="box_form_booking_result"></div>
    
    <div id="box_form_booking">
        <input type="hidden" id="travel_id" name="travel_id" value="<?= $travel_id ?>">

        <div class="row">
            <div class=" col-sm-6" style="text-align: center;">

                <h4 style="text-align: center;">เลือกที่นั่ง</h4><hr>

                <div class="row">
                    <div id="van" style="display: inline-block;"></div>
                    <input type="hidden" id="seat_booking" name="seat_booking">
                </div>

                <!--            <div class="row well">
                                <div style="display: inline-block;">
                                    <img src="assets/images/van/seat1.png" alt=""/>
                                    <p>ที่นั่งยังว่างอยู่</p>
                                </div>
                                <div style="display: inline-block; margin-left: 20px; margin-right: 20px;">
                                    <img src="assets/images/van/seat5.png" alt=""/>
                                    <p>ที่นั่งที่คุณเลือก</p>
                                </div>
                                <div style="display: inline-block;">
                                    <img src="assets/images/van/seat2.png" alt=""/>
                                    <p>ที่นั่งไม่ว่าง</p>
                                </div>
                            </div>-->

            </div>

            <div class=" col-sm-6">

                <h4 style="text-align: center;">ข้อมูลผู้จองตั๋ว / ผู้โดยสาร</h4><hr>

                <div class="form-group">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-user"></span> เลขบัตรประชาชน
                        </span>
                        <input type="text" id="card_id" name="card_id" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-phone"></span> เบอร์โทรศัทพ์ (มือถือ)
                        </span>
                        <input type="text" id="tel" name="tel" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-text-height"></span> ชื่อ - นามสกุล
                        </span>
                        <input type="text" id="passenger" name="passsenger" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group input-group-sm">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-screenshot"></span> เพศ
                        </span>
                        <select id="gender" name="gender" class="form-control">
                            <option value="1">ชาย</option>
                            <option value="2">หญิง</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="alert alert-warning" role="alert">
                        <p style="text-align: center;"><span class="glyphicon glyphicon-warning-sign"></span> เงื่อนไขการใช้บริการ</p>
                        <p>- กรณีที่ต้องการยกเลิกการจอง หรือมีปัญหาอื่น ๆ ที่นั่งต้องโทรแจ้งที่หมายเลข 081-234-5678</p>
                        <p>- ผู้โดยสารต้องติดต่อขึ้นตั๋วอย่างน้อย 30 นาทีก่อนกำหนดการเดินทาง</p>
                        <p>- กำหนดการต่างๆ ขึ้นกับบริษัทที่ให้บริการ ซึ่งอาจมีการเปลี่ยนแปลงภายหลัง ตามความเหมาะสม</p>
                    </div>
                </div>

                <div class="form-group">
                    <div id="travel_details" class="alert alert-danger" style="text-align: left;">
                        <p style="text-align: center;">รายละเอียดการเดินทาง</p>
                        <p><span class="glyphicon glyphicon-map-marker"></span> จุดขึ้นรถ <span id="box_from"></span></p>
                        <p><span class="glyphicon glyphicon-map-marker"></span> ไป <span id="box_to"></span></p>
                        <p><span class="glyphicon glyphicon-calendar"></span> วันที่ <span id="box_date"></span></p>
                        <p><span class="glyphicon glyphicon-time"></span> เวลา <span id="box_time"></span> น.</p>
                        <p><span class="glyphicon glyphicon-th"></span> ประเภทรถ <span id="box_car_type"></span></p>
                        <p><span class="glyphicon glyphicon-tag"></span>  ราคา <span id="box_price"></span> บาท / ที่นั่ง</p>
                    </div>
                </div>

                <div class="form-group">
                    <div class="checkbox" style="text-align: right;">
                        <label>
                            <input type="checkbox" id="agree" name="agree" value="true"> ยอมรับเงื่อนไข
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-danger pull-right">
                        <span class="glyphicon glyphicon-ok"></span> ยืนยันการจอง
                    </button>
                </div>

            </div>
        </div>
    </div>
</form>

<script>

    $("#form_booking #box_form_booking_succeed").hide();

    var travel_id = $("#form_booking #travel_id").val();


    $.getJSON("Booking/get_travel/" + travel_id, function(res) {

        $("#form_booking #box_from").html(res.province_source_name + " - " + res.station_source_name);
        $("#form_booking #box_to").html(res.province_destination_name + " - " + res.station_destination_name);
        $("#form_booking #box_date").html(res.travel_define_start.toDate().getDateTh());
        $("#form_booking #box_time").html(res.travel_define_start.toDate().getTime());
        $("#form_booking #box_car_type").html(res.car_type_name);
        $("#form_booking #box_price").html(res.price);

        if (parseInt(res.car_type_id) == 1) {
            $.fn.van.type = "van14";
        } else if (parseInt(res.car_type_id) == 2) {
            $.fn.van.type = "van9";
        }

        $.getJSON("Booking/get_ticket/" + travel_id, function(res) {

            var booking = [];
            res.forEach(function(row) {

                booking.push(parseInt(row.ticket_seat));
            });
            $("#form_booking #van").van({fix: booking});
        });
    });

    $(function() {

        $("#form_booking").submit(function() {

            $("#form_booking #seat_booking").val($("#form_booking #van").van("get"));

            var error = 0;
            var messages = new Array();

            if ($("#form_booking #van").van("get").length < 1) {
                messages[error] = "เลือกที่นั่งอย่างน้อย 1 ที่นั่ง";
                error++;
            }
            if ($("#form_booking #card_id").val() == "") {
                messages[error] = "เลขบัตรประชาชน";
                error++;
            } else if (!$("#form_booking #card_id").val().checkCardID()) {
                messages[error] = "หมายเลขบัตรประชาชนไม่ถูกต้อง";
                error++;
            }
            if (!$("#form_booking #tel").val().isTel()) {
                messages[error] = "เบอร์โทรศัพท์ (มือถือ)";
                error++;
            }
            if ($("#form_booking #passenger").val() == "") {
                messages[error] = "ชื่อ - นามสกุล";
                error++;
            }
            if (!$("#form_booking #agree").prop("checked")) {
                messages[error] = "ยอมรับเงื่อนไขการใช้บริการ";
                error++;
            }

            if (error > 0) {

                var message = "กรุณาใส่ / ตรวจสอบข้อมูลต่อไปนี้ด้วยครับ";
                messages.forEach(function(value) {
                    message += "\n - " + value;
                });
                alert(message);
                return false;
            }
            
            var num_seat = $("#form_booking #seat_booking").val().split(",");
            if(!confirm("คุณได้เลือกที่นั่งทั่งหมด " + num_seat.length + " ที่นั่ง")){
                return false;
            }
            
            $.post($(this).attr("action"), $(this).serialize(), function(res, status) {

                $("#form_booking #box_form_booking").hide();
                $("#form_booking #box_form_booking_load").html(get_loader());
                
                result = JSON.parse(res);
                if (result.status != "succeed") {
                    
                    alert("ไม่สามารถทำการจองตั๋วได้ในขณะนี้ กรุณาปิดแล้วเรียกหน้านี้ใหม่อีกครั้งขอบคุณครับ");
                    $("#form_booking #box_form_booking").show();
                    $("#form_booking #box_form_booking_load").html("");
                } else {
                    
                    $("#form_booking #box_form_booking_load").html("");
                    $("#form_booking #box_form_booking_result").load("BookingResult/index/" + result.data.booking_id, function(){
                        $("#form_booking #box_form_booking_result").prepend($("#form_booking #travel_details").clone());
                        alert("*** ทำรายการสำเร็จ *** \nกรุณากดตกลง และปฏิบัติตามรายละเอียดที่ประกฏหน้าจอของคุณครับ");
                    });
                }
            });
            return false;
        });
    });

</script>