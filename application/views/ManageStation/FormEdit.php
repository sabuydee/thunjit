<?php $station = $stations->row_array(); ?>

<form container="#container" action="ManageStation/edit/<?= $station['station_id'] ?>">
    <h3 style="text-align: center;">แก้ไขข้อมูลท่ารถ และจุดจอดรถ</h3><br>
    
    <table class="table borderless">
        <tr>
            <th></th>
            <th>ค่าปัจจุบัน</th>
            <th>ใส่ค่าใหม่</th>
        </tr>
        
        <tr>
            <td><label>จังหวัด</label></td>
            <td><?= $station['province_name'] ?></td>
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
            <td><label>ท่ารถ</label></td>
            <td><?= $station['station_name'] ?></td>
            <td><input type="text" name="station_name" value="<?= $station['station_name'] ?>"></td>
        </tr>
        <tr>
            <td><label>รายละเอียด</label></td>
            <td><?= $station['station_details'] ?></td>
            <td><input type="text" name="station_details" value="<?= $station['station_details'] ?>"></td>
        </tr>
    </table>


    <div class="modal-footer">
        <p style="color: #f00;"><?=$message?></p>
        <a href="ManageStation/index" container="#container" class="btn btn-default">กลับ</a>
        <button type="submit" class="btn btn-primary">บันทึก</button>
    </div>

</form>