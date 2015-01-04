<?php
$this->fm->title = 'จัดการท่ารถ และจุดจอดรถ';
$this->fm->tableData = $stations->result_array();
$this->fm->tableHead = array(
    'ท่ารถ' => 'station_name',
    'จังหวัด' => 'province_name',
    'รายละเอียด' => 'station_details'
);
$this->fm->primary = 'station_id';
$this->fm->addLink = 'ManageStation/add';
$this->fm->addAttr .= 'container="#container"';
$this->fm->editLink = 'ManageStation/edit';
$this->fm->editAttr .= 'container="#container"';
$this->fm->removeLink = 'ManageStation/remove';
$this->fm->removeAttr .= 'container="#container"';
$this->fm->viewLink = 'ManageStation/view';
$this->fm->viewAttr .= 'container="#container"';
$this->fm->show();

echo br(2);
?>