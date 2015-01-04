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
class Hselect extends ToolHtml {

    public $tableData;
    public $fieldKey;
    public $fieldValue;
    public $keySelect;

    public function get($visible = TRUE) {


        $html = NULL;
        $html .= '<select ' . $this->attr . '>';

        foreach ($this->tableData as $value) {

            $tempSelect = NULL;
            if ($value[$this->fieldKey] == $this->keySelect)
                $tempSelect = 'selected="1"';
            $html .=  '<option value="' . $value[$this->fieldKey] . '" ' . $tempSelect . '>' . $value[$this->fieldValue] . '</option>';
        }
        $html .=  '</select>';
        
        return $html;
    }

    public function show($visible = TRUE) {

        if ($visible) {

            echo $this->get();
        }
    }

}
