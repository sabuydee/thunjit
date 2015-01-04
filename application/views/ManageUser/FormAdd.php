<form container="#container" action="ManageUser/add">
    <h3 style="text-align: center;">เพิ่มผู้ใช้</h3><br>
    
    <table class="table borderless" style="float: right;">
        <tr>
            <th></th>
            <th></th>
            <th>ใส่ค่า</th>
        </tr>
        <tr>
            <td></td>
            <td><label>username</label></td>
            <td><input type="text" name="username" value="<?= $user['username'] ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><label>password</label></td>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <td></td>
            <td><label>ชื่อ</label></td>
            <td><input type="text" name="firstname" value="<?= $user['firstname'] ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><label>นามสกุล</label></td>
            <td><input type="text" name="lastname" value="<?= $user['lastname'] ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><label>เพศ</label></td>
            <td>
                <?php
                $this->hselect->tableData = $gender->result_array();
                $this->hselect->fieldKey = 'id';
                $this->hselect->fieldValue = 'gender_name';
                $this->hselect->keySelect = $user['gender_id'];
                $this->hselect->attr = 'name="gender_id"';
                $this->hselect->show();
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><label>กลุ่มผู้ใช้</label></td>
            <td>
                <?php
                $this->hselect->tableData = $userGroup->result_array();
                $this->hselect->fieldKey = 'id';
                $this->hselect->fieldValue = 'user_group_name_th';
                $this->hselect->keySelect = $user['user_group_id'];
                $this->hselect->attr = 'name="user_group_id"';
                $this->hselect->show();
                ?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><label>email</label></td>
            <td><input type="text" name="email" value="<?= $user['email'] ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td><label>โทรศัทพ์</label></td>
            <td><input type="text" name="tel" value="<?= $user['tel'] ?>"></td>
        </tr>
    </table>


    <div class="modal-footer">
        <p style="color: #f00;"><?=$message?></p>
        <a href="ManageUser/index" container="#container" class="btn btn-default">กลับ</a>
        <button type="submit" class="btn btn-primary">บันทึก</button>
    </div>

</form>