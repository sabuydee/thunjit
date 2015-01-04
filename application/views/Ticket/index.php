<style type="text/css">  
    /* Overide css code กำหนดความกว้างของปฏิทินและอื่นๆ */  
    .ui-datepicker{  
        width:300px;
    }  
</style>
<form id="my_form" container="#my_modal" method="post" action="Ticket/form_select_seat"  style=" text-align: center;">

    <h2>จองตั๋วรถ</h2><br>



    <div class="well" style="width: 300px; display: inline-block; margin-right: 30px;">

        <p id="station_source_name" style="font-size: 20px;"><?= $station_source_name ?></p>
        <input type="hidden" name="station_source_id" value="<?= $station_source_id ?>" id="station_source_id">
        <a href="Ticket/form_select_station_source" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
            <span class="glyphicon glyphicon-search"></span> ต้นทาง
        </a>
    </div>

    <div class="well" style="width: 300px; display: inline-block; margin-left: 30px;">


        <p id="station_destination_name" style="font-size: 20px;"><?= $station_destination_name ?></p>
        <input type="hidden" name="station_destination_id" value="<?= $station_destination_id ?>" id="station_destination_id">
        <a href="Ticket/form_select_station_destination" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
            <span class="glyphicon glyphicon-search"></span> ปลายทาง
        </a>
    </div>

    <?= br() ?>

    <p>
    <div id="datepicker" style="display: inline-block;"></div>
    <input type="hidden" name="date" id="date" value="<?= $date ?>">
    </p>

    <?= br() ?>
    <p>
        <label>เวลาเดินทาง</label>
        <select name="time"><?= $time ?></select>
    </p>

    <?= br() ?>

    <p>
        <label>ประเภทรถ</label>
        <select name="car_type"><?= $car_type ?></select>
    </p>

    <?= br() ?>

    <button type="submit" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-th"></span> เลือกที่นั่ง
    </button>

</form>


<script>
    $(function() {

        $("#my_form").submit(function() {

            $("#date").val($("#datepicker").datepicker("getDate"));
        });

        $("#datepicker").datepicker({
            dateFormat: 'dd-mm-yy',
            buttonImageOnly: false,
            changeMonth: true,
            changeYear: true
        });

        $("#datepicker").datepicker("setDate", "<?= $date ?>");
    });

    function set_station_source(station_source_id, station_source_name) {

        $("#station_source_id").val(station_source_id);
        $("#station_source_name").text(station_source_name);
        return false;
    }

    function set_station_destination(station_destination_id, station_destination_name) {

        $("#station_destination_id").val(station_destination_id);
        $("#station_destination_name").text(station_destination_name);
        return false;
    }
</script>
