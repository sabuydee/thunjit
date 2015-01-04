<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Common
 *
 * @author singha
 */
class Common {

    public function sec_to($second1, $second2) {

        $second = $second2 - $second1;
        $result['minute'] = round($second / 60);
        $result['hour'] = round($second / 3600);
        $result['day'] = round($second / 86400);
        $result['week'] = round($second / 604800);
        $result['month'] = round($second / 2419200);
        $result['year'] = round($second / 29030400);
        return $this->array_to_obj($result);
    }

    public function array_to_obj($param) {

        return json_decode(json_encode($param), FALSE);
    }
}
