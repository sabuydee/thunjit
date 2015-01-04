<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Hoption
 *
 * @author singha
 */
class Hoption {
    
    public $data;
    public $index;
    public $title;
    public $selected;
    public $message_no_data = '*** ไม่มีข้อมูล ***';

    public function show($visible = TRUE) {

        if ($visible) {

            echo $this->get();
        }
    }
    
    public function get() {
        
        $html = NULL;
        if (!$this->data) {

            $html .= '<option value="false">'.$this->message_no_data.'</option>';
        } else {
            
            foreach ($this->data as $value) {
                
                if($this->selected == $value[$this->index]){
                    
                    $html .= '<option selected value="'.$value[$this->index].'">'.$value[$this->title].'</option>';
                }else{
                    
                    $html .= '<option value="'.$value[$this->index].'">'.$value[$this->title].'</option>';
                }
            }
        }
        return $html;
    }
}
