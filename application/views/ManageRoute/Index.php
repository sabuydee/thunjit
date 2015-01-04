<?php

$column = array(
    'จุดขึ้นรถ' => 'station_source_name',
    'จุดลงรถ' => 'station_destination_name'
);
$this->imanage->CI;
$this->imanage->title = 'เส้นทางเดินรถ';
$this->imanage->data = $routes->result_array();
$this->imanage->classCrud = 'ManageRoute';
$this->imanage->primaryID = 'route_id';
$this->imanage->column = $column;
$this->imanage->show();
?>
    
