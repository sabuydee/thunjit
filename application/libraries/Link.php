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
class Link {

    public $title;
    public $attr;
    public $image = 'glyphicon glyphicon-star';

    public function show($visible = TRUE) {

        if ($visible) {
            
            echo '
                <a '.$this->attr.'>
                    <span class="' . $this->image . '"></span> 
                        ' . $this->title . '
                </a>
            ';
            echo nbs(1);
        }
    }

}
