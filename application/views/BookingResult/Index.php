<div id="booking_result">

    <input type="hidden" id="booking_id" name="booking_id" value="<?= $booking_id ?>">

    <div id="box_loading"></div>
    <div id="box_booking_result">
        <div class="alert alert-success" role="alert">
            <h4>ทำรายการสำเร็จ</h4><hr>
            <p>- กรุณาติดต่อขึ้นตั๋วรถก่อนเวลาเดินทาง 30 นาที</p>
            <p>- ให้แจ้งหมายเลขการจองแก่พนักงานที่ให้บริการ และชำระเงิน ณ จุดขึ้นรถ</p>
            <p>- หากต้องการสอบถาม หรือต้องการยกเลิก โทร 081-234-5678</p><hr>
            <p>- หมายเลขการจองของคุณคือ <span class="booking_id" style="color: #f00;">33</span></p>
            <p>- ที่นั่งของคุณคือ <span class="seats" style="color: #f00;">01,05</span> ทั้งหมด <span class="num_seats" style="color: #f00;"></span> ที่นั่ง</p>
            <p>- ค่าบริการ <span class="price_sum" style="color: #f00;"></span> บาท</p>
            <p style="text-align: center;">*** ขอบคุณที่ไว้ใจ และเลือกใช้บริการครับ ***</p>
        </div>
    </div>

    <script>
        $("#booking_result #box_booking_result").hide();
        $("#booking_result #box_loading").html(get_loader());

        var booking_id = $("#booking_result #booking_id").val();

        $("#booking_result #box_booking_result .booking_id").html(parseInt(booking_id).zeroPad(6));

        $.post("BookingResult/get_booking/" + booking_id, function(res) {

            var result = JSON.parse(res);
            var price = 0;
            var seats = [];
            result.forEach(function(row) {

                seats.push(parseInt(row.ticket_seat).zeroPad(2));
                price += parseFloat(row.ticket_price);
            });
            $("#booking_result #box_booking_result .seats").html(seats.join());
            $("#booking_result #box_booking_result .num_seats").html(Object.keys(result).length);
            $("#booking_result #box_booking_result .price_sum").html(price);
        });

        $("#booking_result #box_loading").hide();
        $("#booking_result #box_booking_result").show();
    </script>
</div>