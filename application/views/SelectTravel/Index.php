<form id="form_select_travel">

    <input type="hidden" id="station_source_id"         name="station_source_id"        value="<?= $station_source_id ?>">
    <input type="hidden" id="station_destination_id"    name="station_destination_id"   value="<?= $station_destination_id ?>">
    <input type="hidden" id="date"                      name="date"                     value="<?= $date ?>">

    <h4 style="text-align: center;">เลือกเที่ยวรถ</h4>

    <div class="alert alert-danger" role="alert">
        <p style="text-align: center;">รายละเอียดการเดินทาง</p>
        <p><span class="glyphicon glyphicon-map-marker"></span> จุดขึ้นรถ <span id="box_from"></span></p>
        <p><span class="glyphicon glyphicon-map-marker"></span> ไป <span id="box_to"></span></p>
        <p><span class="glyphicon glyphicon-calendar"></span> วันที่ <span id="box_date"></span></p>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-hover">
                <tr class="danger">
                    <th>ประเภทรถ</th>
                    <th>เวลารถออก</th>
                    <th>ราคา</th>
                    <th></th>
                </tr>
                <tbody id="box_travels"></tbody>
            </table>
        </div>
    </div>
</form>

<script>




    var station_source_id = $("#form_select_travel #station_source_id").val();
    var station_destination_id = $("#form_select_travel #station_destination_id").val();
    var date = $("#form_select_travel #date").val();

    $.getJSON("SelectTravel/get_station/" + station_source_id, function(res) {
        $("#form_select_travel #box_from").html(res.province_name + " - " + res.station_name);
    });
    $.getJSON("SelectTravel/get_station/" + station_destination_id, function(res) {
        $("#form_select_travel #box_to").html(res.province_name + " - " + res.station_name);
    });
    $("#form_select_travel #box_date").html(date.toDate().getDateTh());

    $.getJSON("SelectTravel/get_travel/" + station_source_id + "/" + station_destination_id + "/" + date, function(res) {
        res.forEach(function(row) {
            $("#box_travels").html($("#box_travels").html() + '<tr><td id="car_type' + row.travel_id + '"></td><td id="time' + row.travel_id + '"><td id="price' + row.travel_id + '"></td><td id="control' + row.travel_id + '" style=" text-align: right;"></td></tr>');
            $("#box_travels #car_type" + row.travel_id).html(row.car_type_name);
            $("#box_travels #time" + row.travel_id).html(row.travel_define_start.toDate().getTime() + " น.");
            $("#box_travels #price" + row.travel_id).html(row.price + " บาท / ที่นั่ง");
            $.get("SelectTravel/is_free_seat/" + row.travel_id, function(res) {
                
                if (JSON.parse(res)) {
                    $("#box_travels #control" + row.travel_id).html('<button type="button" class="btn btn-danger" onClick="return select_seat(' + row.travel_id + ');"><span class="glyphicon glyphicon-ok"></span> เลือกที่นั่ง</button>');
                } else {
                    $("#box_travels #control" + row.travel_id).html('<span class="label label-warning">ที่นั่งเต็ม</span>');
                }
            });
        });
    });

    function select_seat(travel_id) {

        $("#my_modal_content").html(get_loader());
        $("#my_modal_content").load("Booking/index/" + travel_id);
        return false;
    }
</script>