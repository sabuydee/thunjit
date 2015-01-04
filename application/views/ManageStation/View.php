<div class="modal-content" style="text-align: center; padding: 10px;">
    <?php $station = $stations->row_array(); ?>
        <h3 style="text-align: center;">รายละเอียดท่ารถ และจุดจอดรถ</h3>
        <img src="assets/images/station1.jpg" width="400px" alt=""/>

        <table class="table borderless">
            <tr>
                <td style="text-align: right;"><label>ท่ารถ</label></td>
                <td style="text-align: left;"><?= $station['station_name']; ?></td>
            </tr>
            <tr>
                <td style="text-align: right;"><label>จังหวัด</label></td>
                <td style="text-align: left;"><?= $station['province_name']; ?></td>
            </tr>
            <tr>
                <td style="text-align: right;"><label>รายละเอียด</label></td>
                <td style="text-align: left;"><?= $station['station_details']; ?></td>
            </tr>
        </table>


        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        </div>
</div>