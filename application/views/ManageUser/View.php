<div class="modal-content" style="text-align: center; padding: 10px;">
    <form>

        <h3 style="text-align: center;">รายละเอียดผู้ใช้</h3>
        <!--<img src="assets/images/user1.png" alt=""/>-->
        <img src="assets/images/user4.png" alt=""/><br><br>


        <table class="table borderless">
            <tr>
                <td style="text-align: right;"><label>username</label></td>
                <td style="text-align: left;"><?= $user->row()->username ?></td>
            </tr>
            <tr>
                <td style="text-align: right;"><label>ชื่อ</label></td>
                <td style="text-align: left;"><?= $user->row()->firstname ?></td>
            </tr>
            <tr>
                <td style="text-align: right;"><label>นามสกุล</label></td>
                <td style="text-align: left;"><?= $user->row()->lastname ?></td>
            </tr>
            <tr>
                <td style="text-align: right;"><label>เพศ</label></td>
                <td style="text-align: left;"><?= $user->row()->gender_name ?></td>
            </tr>
            <tr>
                <td style="text-align: right;"><label>กลุ่มผู้ใช้</label></td>
                <td style="text-align: left;"><?= $user->row()->user_group_name_th ?></td>
            </tr>
            <tr>
                <td style="text-align: right;"><label>email</label></td>
                <td style="text-align: left;"><?= $user->row()->email ?></td>
            </tr>
            <tr>
                <td style="text-align: right;"><label>โทรศัทพ์</label></td>
                <td style="text-align: left;"><?= $user->row()->tel ?></td>
            </tr>
        </table>


        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
        </div>

    </form>
</div>