<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of IMenu
 *
 * @author singha
 */
class FM{

    public $title = 'my manage';
    
    public $tableData;
    public $primary = 'id';
    public $tableHead;
    public $tableToolWidth = '250px';
    
    public $addTitle = 'เพิ่ม';
    public $addLink = '#';
    public $addAttr = 'class="btn btn-default" ';
    public $addImg = 'glyphicon glyphicon-plus-sign';
    
    public $editTitle = 'แก้ไข';
    public $editLink = '#';
    public $editAttr;
    public $editImg = 'glyphicon glyphicon-pencil';
    
    public $removeTitle = 'ลบ';
    public $removeLink = '#';
    public $removeAttr;
    public $removeImg = 'glyphicon glyphicon-remove-sign';
    
    public $viewTitle = 'ดูรายละเอียด';
    public $viewLink = '#';
    public $viewAttr;
    public $viewImg = 'glyphicon glyphicon-info-sign';





    public function show($visible = TRUE) {
        

        if ($visible) {

            echo '<div>';
            
            echo '  <h2 style="text-align: center;">' . $this->title . '</h2><br>';
            echo '  <a href="'.$this->addLink.'" '.$this->addAttr.'>';
            echo '      <span class="' . $this->addImg . '"></span> '.$this->addTitle;
            echo '  </a>';
            echo br(2);
            
            
            if(!$this->tableData){
                
                echo br(2);
                echo '<h4 style="text-align: center; color: #f00">ไม่มีข้อมูลที่คุณต้องจัดการ.</h4><br>';
                return;
            }
            
            
            
            

            
            
            
            echo '  <table class="table table-condensed table-hover">';
            echo '      <tr class="danger">';
            echo '          <th>ลำดับ</th>';
            
                            if(!$this->tableHead){
                                
                                foreach (array_keys($this->tableData[0]) as $key => $value) {

                                    echo '<th>'.$value.'</th>';
                                }
                            }else{
                                
                                foreach ($this->tableHead as $key => $value) {

                                    echo '<th>'.$key.'</th>';
                                }
                            }
            echo '          <th width="'.$this->tableToolWidth.'"></th>';
            echo '      </tr>';
            

            $i = 1;
            foreach ($this->tableData as $values) {

            echo '<tr>';
            echo    '<td>'.$i++.'</td>';
                    
                    if(!$this->tableHead){
                        
                        foreach ($values as $value) {

                            echo '<td>'.$value.'</td>';
                        }
                    }else{
                        
                        foreach ($this->tableHead as $value1) {
                            
                            foreach ($values as $key2 => $value2) {
                                
                                if($value1 == $key2)
                                echo '<td>'.$value2.'</td>';
                            }
                        }
                        
                    }
                    
            echo    '<td>';
            
            echo '      <a href="'.$this->editLink.'/'.$values[$this->primary].'" '.$this->editAttr.'>';
            echo '          <span class="' . $this->editImg . '"></span> '.$this->editTitle;
            echo '      </a>';
            echo nbs(1);
            echo '      <a href="'.$this->removeLink.'/'.$values[$this->primary].'" '.$this->removeAttr.' iremove="ยืนยันการลบ">';
            echo '          <span class="' . $this->removeImg . '"></span> '.$this->removeTitle;
            echo '      </a>';
            echo nbs(1);            
            echo '      <a href="'.$this->viewLink.'/'.$values[$this->primary].'" data-toggle="modal" data-target=".bs-example-modal-lg">';
            echo '          <span class="' . $this->viewImg . '"></span> '.$this->viewTitle;
            echo '      </a>';

            
            echo '  </td>';
            echo '</tr>';
            
            
            }
                    
            echo '    </table>';
            
            
            echo '</div>';
        }
    }

}
