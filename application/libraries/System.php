<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of System
 *
 * @author singha
 */
class System {

    public function to_date($date) {
        
        return $this->array_to_obj(date_parse($date));
    }

    public function array_to_obj($param) {

        return json_decode(json_encode($param), FALSE);
    }
}
