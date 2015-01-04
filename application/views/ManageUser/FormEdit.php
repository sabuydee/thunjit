<form container="#container" action="ManageUser/edit/<?=$user->row()->user_id?>">
    <h3 style="text-align: center;">แก้ไขข้อมูลผู้ใช้</h3><br>
    
    <table class="table borderless">
        <tr>
            <th></th>
            <th>ค่าปัจจุบัน</th>
            <th>ใส่ค่าใหม่</th>
        </tr>
        <tr>
            <td><label>username</label></td>
            <td><?= $user->row()->username ?></td>
            <td><input type="text" name="username" value="<?= $user->row()->username ?>"></td>
        </tr>
        <tr>
            <td><label>password</label></td>
            <td style="color: #f00;">ไม่เปิดเผย</td>
            <td>
                <input type="password" name="password">
                <input type="checkbox" name="changePassword">
                เปลี่ยนรหัสผ่าน
            </td>
        </tr>
        <tr>
            <td><label>ชื่อ</label></td>
            <td><?= $user->row()->firstname ?></td>
            <td><input type="text" name="firstname" value="<?= $user->row()->firstname ?>"></td>
        </tr>
        <tr>
            <td><label>นามสกุล</label></td>
            <td><?= $user->row()->lastname ?></td>
            <td><input type="text" name="lastname" value="<?= $user->row()->lastname ?>"></td>
        </tr>
        <tr>
            <td><label>เพศ</label></td>
            <td><?= $user->row()->gender_name ?></td>
            <td>
                <?php
                $this->hselect->tableData = $gender->result_array();
                $this->hselect->fieldKey = 'id';
                $this->hselect->fieldValue = 'gender_name';
                $this->hselect->keySelect = $user->row()->gender_id;
                $this->hselect->attr = 'name="gender_id"';
                $this->hselect->show();
                ?>
            </td>
        </tr>
        <tr>
            <td><label>กลุ่มผู้ใช้</label></td>
            <td><?= $user->row()->user_group_name_th ?></td>
            <td>
                <?php
                $this->hselect->tableData = $userGroup->result_array();
                $this->hselect->fieldKey = 'id';
                $this->hselect->fieldValue = 'user_group_name_th';
                $this->hselect->keySelect = $user->row()->user_group_id;
                $this->hselect->attr = 'name="user_group_id"';
                $this->hselect->show();
                ?>
            </td>
        </tr>
        <tr>
            <td><label>email</label></td>
            <td><?= $user->row()->email ?></td>
            <td><input type="text" name="email" value="<?= $user->row()->email ?>"></td>
        </tr>
        <tr>
            <td><label>โทรศัทพ์</label></td>
            <td><?= $user->row()->tel ?></td>
            <td><input type="text" name="tel" value="<?= $user->row()->tel ?>"></td>
        </tr>
    </table>


    <div class="modal-footer">
        <p style="color: #f00;"><?=$message?></p>
        <a href="ManageUser/index" container="#container" class="btn btn-default">กลับ</a>
        <button type="submit" class="btn btn-primary">บันทึก</button>
    </div>

</form>