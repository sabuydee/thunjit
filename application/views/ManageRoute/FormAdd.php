<form class="well form-horizontal" container="#container" action="ManageRoute/add">

    <h3 style="text-align: center;">เพิ่มเส้นทางเดินรถ</h3><br>

    <div class="form-group">
        <label class="col-md-2 control-label">ต้นทาง</label>
        <div class="col-md-8 input-group input-group-sm">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-flag"></span> จังหวัด
            </span>
            <select class="form-control" id="pv_s" name="pv_s"></select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-8 input-group input-group-sm">
            <span class="input-group-addon" id="sizing-addon3">
                <span class="glyphicon glyphicon-map-marker"></span>
            </span>
            <input type="text" class="form-control" placeholder="จุดขึ้นรถ">
        </div>
    </div>




    <table class="table borderless" style="float: right;">
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <tr>

            <td></td>
            <td><label>จุดขึ้นรถ</label></td>
            <td>
                <?php
                $this->hselect->attr = 'name="province_source_id" id="province_source_id"';
                $this->hselect->tableData = $provinces->result_array();
                $this->hselect->fieldKey = 'id';
                $this->hselect->fieldValue = 'province_name';
                $this->hselect->keySelect = $station['province_source_id'];
                $this->hselect->show();
                ?>
            </td>

        </tr> 
        <tr>

            <td></td>
            <td></td>
            <td>
                <select name="station_source_id" id="station_source_id"></select>
            </td>

        </tr> 

        <tr>

            <td></td>
            <td><label>จุดลงรถ</label></td>
            <td>
                <?php
                $this->hselect->attr = 'name="province_destination_id" id="province_destination_id"';
                $this->hselect->tableData = $provinces->result_array();
                $this->hselect->fieldKey = 'id';
                $this->hselect->fieldValue = 'province_name';
                $this->hselect->keySelect = $station['province_destination_id'];
                $this->hselect->show();
                ?>
            </td>
        <tr>

            <td></td>
            <td></td>
            <td>
                <select name="station_destination_id" id="station_destination_id"></select>
            </td>

        </tr> 

        <?php foreach ($cars as $value) { ?>

            <tr>
                <td></td>
                <td><label>ราคาตั๋วรถ <?= $value['name'] ?></label></td>
                <td><input type="text" name="car[<?= $value['id'] ?>]" value="<?= $value['price'] ?>"> บาท/ที่นั่ง</td>
            </tr>

        <?php } ?>

        </tr>

    </table>


    <div class="modal-footer">
        <p style="color: #f00;"><?= $option['message'] ?></p>
        <a href="ManageRoute/index" container="#container" class="btn btn-default">กลับ</a>
        <button type="submit" class="btn btn-primary">บันทึก</button>
    </div>
</form>

<script>

    var selected_station_source_id = 0;
    var selected_station_destination_id = 0;

<?= $option['script'] ?>

    $(function() {

        getProvinceSouce($("#province_source_id").val(), selected_station_source_id);
        getProvinceDestination($("#province_destination_id").val(), selected_station_destination_id);

        $("#province_source_id").change(function() {

            getProvinceSouce($(this).val(), selected_station_source_id);
        });

        $("#province_destination_id").change(function() {

            getProvinceDestination($(this).val(), selected_station_destination_id);
        });
    });

    function getProvinceSouce(provinceID, selected) {

        var data = {province_id: provinceID, selected: selected};
        getViewParam("ManageRoute/get_tag_option_station_by_provice", "#station_source_id", data);
    }

    function getProvinceDestination(provinceID, selected) {

        var data = {province_id: provinceID, selected: selected};
        getViewParam("ManageRoute/get_tag_option_station_by_provice", "#station_destination_id", data);
    }

</script>