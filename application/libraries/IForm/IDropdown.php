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
class IDropdown {

    public $title = 'dropdown';
    public $class;
    public $list = array(
        array(
            'title' => 'action',
            'attr' => ''
        )
    );

    public function show($visible = TRUE) {

        if ($visible) {

            $tempLi = null;
            foreach ($this->list as $values) {
                
                $temp['title'] = '';
                $temp['attr'] = '';                
                foreach ($values as $key => $value) {
                    
                    $temp[$key] = $value;
                }
                
                $tempLi .= '<li><a '.$temp['attr'].'>' . $temp['title'] . '</a></li>';
            }

            echo '
            <div class="dropdown" style="display: inline-block;">
                <button class="dropdown-toggle '.$this->class.'" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                    ' . $this->title . '    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">' . $tempLi . '</ul>
            </div>
            ';
            echo nbs(1);
        }
    }

}
