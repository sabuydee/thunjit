<div class="modal-content" style="text-align: center; padding: 10px;">
    
    <?php $route = $routes->row_array(); ?>
    
        <h3 style="text-align: center;">รายละเอียดเส้นทางเดินรถ</h3>

        <table class="table borderless">
            <tr>
                <td style="text-align: right;"><label>จุดขึ้นรถ</label></td>
                <td style="text-align: left;"><?= $route['station_source_name']; ?></td>
            </tr>
            <tr>
                <td style="text-align: right;"><label>จุดลงรถ</label></td>
                <td style="text-align: left;"><?= $route['station_destination_name']; ?></td>
            </tr>
            
            <?php foreach ($price->result_array() as $value) {?>
            
                <tr>
                    <td style="text-align: right;"><label>ราคาตั๋วรถ <?=$value['car_type_name']?></label></td>
                    <td style="text-align: left;"><label style="color: #f00;"><?= $value['price']; ?></label> บาท/ที่นั่ง</td>
                </tr>
                
            <?php } ?>
        </table>


        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        </div>
</div>