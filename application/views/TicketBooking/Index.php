<form id="form_ticket_booking" action="SelectTravel/index" class="well form-horizontal">

    <h4 style=" text-align: center;">จองตั๋วรถตู้</h4><hr>

    <div class="form-group">
        <label class="col-sm-3 control-label">จาก</label>
        <div class="col-sm-8 input-group input-group-sm">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-flag"></span> จังหวัด
            </span>
            <select class="form-control" id="province_source" name="province_source"></select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">ไป</label>
        <div class="col-sm-8 input-group input-group-sm">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-flag"></span> จังหวัด
            </span>
            <select class="form-control" id="province_destination" name="province_destination"></select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">ขึ้นรถที่</label>
        <div class="col-sm-8 input-group input-group-sm">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-map-marker"></span> ท่ารถ
            </span>
            <select class="form-control" id="station_source" name="station_source"></select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">ลงรถที่</label>
        <div class="col-sm-8 input-group input-group-sm">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-map-marker"></span> ท่ารถ
            </span>
            <select class="form-control" id="station_destination" name="station_destination"></select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">วันที่</label>
        <div class="col-sm-8 input-group input-group-sm">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span> วัน/เดือน/ปี
            </span>
            <select class="form-control" id="date" name="date"></select>
        </div>
    </div>

    <br>
    <p style=" text-align: center;">
        <button type="submit" class="btn btn-danger btn-lg">
            <span class="glyphicon glyphicon-ok"></span> เลือกเที่ยวรถ
        </button>
    </p>
</form>

<script>

    $(function() {

        $("#form_ticket_booking").submit(function() {

            if (!$("#date").val()) {
                alert("กรุณาเลือกข้อมูลการเดินทางด้วยครับ");
                return false;
            }

            $("#my_modal_content").html(get_loader());
            $("#my_modal").modal("show");
            $.post($(this).attr("action") + "/" + $("#station_source").val() + "/" + $("#station_destination").val() + "/" + $("#date").val(), $(this).serialize(), function(data) {

                $("#my_modal_content").html(data);
            });
            return false;
        });

        update_province_source();
        $("#province_source").change(function() {
            update_province_destination();
        });
        $("#province_destination").change(function() {
            update_station_source();
        });
        $("#station_source").change(function() {
            update_station_destination();
        });
        $("#station_destination").change(function() {
            update_date();
        });
    });

    function update_province_source() {

        $.getJSON("TicketBooking/get_province_source", function(data) {
            $("#province_source").html(option_tag(data, "id", "province_name"));
            update_province_destination();
        });
    }
    function update_province_destination() {

        $.getJSON("TicketBooking/get_province_destination/" + $("#province_source").val(), function(data) {
            $("#province_destination").html(option_tag(data, "id", "province_name"));
            update_station_source();
        });
    }
    function update_station_source() {

        $.getJSON("TicketBooking/get_station_source/" + $("#province_source").val() + "/" + $("#province_destination").val(), function(data) {
            $("#station_source").html(option_tag(data, "id", "station_name"));
            update_station_destination();
        });
    }
    function update_station_destination() {

        $.getJSON("TicketBooking/get_station_destination/" + $("#station_source").val() + "/" + $("#province_destination").val(), function(data) {
            $("#station_destination").html(option_tag(data, "id", "station_name"));
            update_date();
        });
    }
    function update_date() {

        $.getJSON("TicketBooking/get_date/" + $("#station_source").val() + "/" + $("#station_destination").val(), function(data) {
            $("#date").html(option_tag_thai_date(data, "travel_define_start_date", "travel_define_start_date"));
        });
    }

</script>