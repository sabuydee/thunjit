<form container="#container" action="ManageRoute/edit/<?=$route_id?>">
    
    <h3 style="text-align: center;">แก้ไขเส้นทางเดินรถ</h3><br>

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
                <select name="province_source_id" id="province_source_id">
                    <?php
                    $this->hoption->data = $provinces->result_array();
                    $this->hoption->index = 'id';
                    $this->hoption->title = 'province_name';
                    $this->hoption->selected = $station['province_source_id'];
                    $this->hoption->show();
                    ?>
                </select>
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
                <select name="province_destination_id" id="province_destination_id">
                    <?php
                    $this->hoption->data = $provinces->result_array();
                    $this->hoption->index = 'id';
                    $this->hoption->title = 'province_name';
                    $this->hoption->selected = $station['province_destination_id'];
                    $this->hoption->show();
                    ?>
                </select>
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
                <td><input type="text" name="car[<?= $value['id'] ?>]" value="<?=$value['price']?>"> บาท/ที่นั่ง</td>
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
    
    <?=$option['script']?>
        
    $(function() {

        getProvinceSouce($("#province_source_id").val(), selected_station_source_id);
        getProvinceDestination($("#province_destination_id").val(), selected_station_destination_id);

        $("#province_source_id").change(function(){
            
            getProvinceSouce($(this).val(), selected_station_source_id);
        });

        $("#province_destination_id").change(function() {

            getProvinceDestination($(this).val(), selected_station_destination_id);
        });
    });

    function getProvinceSouce(provinceID, selected){

        var data = {province_id: provinceID, selected:selected};
        getViewParam("ManageRoute/get_tag_option_station_by_provice", "#station_source_id", data);
    }
    
    function getProvinceDestination(provinceID, selected){
        
        var data = {province_id: provinceID, selected:selected};
        getViewParam("ManageRoute/get_tag_option_station_by_provice", "#station_destination_id", data);
    }

</script>