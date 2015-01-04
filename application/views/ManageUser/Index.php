<div style="text-align: center;">
    <img src="assets/images/user2.png" alt=""/>
</div>
<?php
$this->fm->title = 'จัดการผู้ใช้งานระบบ';
$this->fm->tableData = $users->result_array();
$this->fm->tableHead = array(
    'username' => 'username',
    'ชื่อ' => 'firstname',
    'นามสกุล' => 'lastname',    
    'กลุ่ม' => 'user_group_name_th'
);
$this->fm->primary = 'user_id';
$this->fm->addLink = 'ManageUser/add';
$this->fm->addAttr .= 'container="#container"';
$this->fm->editLink = 'ManageUser/edit';
$this->fm->editAttr .= 'container="#container"';
$this->fm->removeLink = 'ManageUser/remove';
$this->fm->removeAttr .= 'container="#container"';
$this->fm->viewLink = 'ManageUser/view';
$this->fm->viewAttr .= 'container="#container"';
$this->fm->show();

echo br(2);
?>

<hr>