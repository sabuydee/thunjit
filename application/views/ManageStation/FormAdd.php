<form container="#container" action="ManageStation/add">
    <h3 style="text-align: center;">เพิ่มท่ารถ</h3><br>
    
    <table class="table borderless" style="float: right;">
        <tr>
            <th></th>
            <th></th>
            <th>ใส่ค่า</th>
        </tr>
        <tr>
            <td></td>
            <td><label>จังหวัด</label></td>
            <td>
                <?php
                $this->hselect->tableData = $province->result_array();
                $this->hselect->fieldKey = 'id';
                $this->hselect->fieldValue = 'province_name';
                $this->hselect->keySelect = $station['province_id'];
                $this->hselect->attr = 'name="province_id"';
                $this->hselect->show();
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><label>ท่ารถ</label></td>
            <td><input type="text" name="station_name" value="<?= $station['station_name'] ?>"></td>
        </tr>
        
        <tr>
            <td></td>
            <td><label>รายละเอียด</label></td>
            <td><input type="text" name="station_details" value="<?= $station['station_details'] ?>"></td>
        </tr>
    </table>


    <div class="modal-footer">
        <p style="color: #f00;"><?=$message?></p>
        <a href="ManageStation/index" container="#container" class="btn btn-default">กลับ</a>
        <button type="submit" class="btn btn-primary">บันทึก</button>
    </div>

</form>