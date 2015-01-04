<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Imanage
 *
 * @author singha
 */
class IManage {

    public $CI;
    public $title = 'my manage';
    public $data;
    public $classCrud;
    public $primaryID;
    public $column;
    public $tableTheme = array(
        'table_open' => '<table class="table table-condensed table-hover">',
        'heading_row_start' => '<tr class="danger">'
    );
    
    public function __construct() {

        $this->CI = & get_instance();
    }

    public function show($visible = TRUE) {

        if ($visible) {

            echo '  <h2 style="text-align: center;">'.$this->title.'</h2><br>';

            echo '  <button href="'.$this->classCrud.'/add" class="pull btn btn-default" container="#container">';
            echo '      <span class="glyphicon glyphicon-plus-sign"></span> เพิ่ม';
            echo '  </button>';
            echo br(2);
            
            $crud = array(
                '
                    <div class="dropdown">
                        <button class="btn btn-default" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                            <span class="glyphicon glyphicon-cog"></span> จัดการ <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                            <li><a href="',$this->classCrud,'/View/',$this->primaryID,'" data-toggle="modal" data-target=".bs-example-modal-lg"><span class="glyphicon glyphicon-info-sign"></span> ดูรายละเอียด</a></li>
                            <li><a href="',$this->classCrud,'/Edit/',$this->primaryID,'" container="#container"><span class="glyphicon glyphicon-pencil"></span> แก้ไข</a></li>
                            <li><a href="',$this->classCrud,'/Remove/',$this->primaryID,'" container="#container" iremove="ยืนยันการลบ"><span class="glyphicon glyphicon-remove-sign"></span> ลบ</a></li>                    
                        </ul>
                    </div>
                '
            );
            $this->column[''] = $crud;
            $this->CI->htable->set_template($this->tableTheme);
            $this->CI->htable->data = $this->data;
            $this->CI->htable->column = $this->column;
            $this->CI->htable->msNoData = '<h3 style="text-align: center; color: #f00;">ไม่มีข้อมูลที่คุณต้องจัดการ</h3>';
            $this->CI->htable->show();
            
        }
    }

}
