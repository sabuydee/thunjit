<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author singha
 */
class ModelVans extends CI_Model {

    public function select_where($vans_id) {

        $this->db->select('*', FALSE);
        $this->db->from('vans');
        $this->db->where('id', $vans_id);
        $this->db->order_by('vans_code');
        return $this->db->get();
    }
    
    public function __construct() {

        parent::__construct();
    }
}
