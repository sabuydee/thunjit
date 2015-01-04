<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Htable
 *
 * @author singha
 */
class Htable extends CI_Table {

    public $data;
    public $column;
    public $enableIndex = TRUE;
    public $msNoData = 'ไม่มีข้อมูล';
    public $tableTheme = array(
        'table_open' => '<table class="table table-condensed table-hover">',
        'heading_row_start' => '<tr class="danger">'
    );

    public function show($visible = TRUE) {

        if ($visible) {


            echo $this->get();
        }
    }

    public function get() {
        
        return $this->generate();
    }
    
    public function generate() {

        parent::set_template($this->tableTheme);
        if (!$this->data) {
            return $this->msNoData;
        }

        if ($this->column) {

            $tempIndex = 0;
            foreach ($this->data as $row) {

                $tempIndex++;
                $cells = NULL;
                $i = 0;
                foreach ($this->column as $arrayOrValue) {

                    $tempString = NULL;
                    if (is_array($arrayOrValue)) {

                        foreach ($arrayOrValue as $fieldOrValue) {

                            $tempString .= $this->getFieldOrValue($row, $fieldOrValue);
                        }
                    } else {

                        $tempString .= $this->getFieldOrValue($row, $arrayOrValue);
                    }

                    $cells[$i] = array(
                        'data' => $tempString,
                            //'class' => 'highlight',
                    );
                    $i++;
                }

                if ($this->enableIndex) {

                    array_unshift($cells, $tempIndex);
                    parent::add_row($cells);
                } else {

                    parent::add_row($cells);
                }
            }

            if ($this->enableIndex) {

                $column = array_keys($this->column);
                array_unshift($column, 'ลำดับ');
                parent::set_heading($column);
            } else {

                parent::set_heading(array_keys($this->column));
            }

            return parent::generate();
        } else {

            return parent::generate($this->data);
        }
    }

    private function getFieldOrValue($row, $fieldOrValue) {

        $tempString = NULL;
        if (array_key_exists($fieldOrValue, $row)) {

            $tempString = $row[$fieldOrValue];
        } else {

            $tempString = $fieldOrValue;
        }

        return $tempString;
    }

}
