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
class ModelProvince extends CI_Model {

    public function select_where_in($province_id_array = array()) {
        
        $this->db->select('*', FALSE);        
        $this->db->from('province');
        $this->db->where_in('id', $province_id_array);
        $this->db->group_by('id');

        return $this->db->get();
    }    
    
    public function getAll() {
        
        $this->db->order_by('province.province_name');
        return $this->db->get('province');
    }
    
    public function select() {
        
        $this->db->order_by('province.province_name');
        return $this->db->get('province');
    }
    
    public function __construct() {

        parent::__construct();
    }
}
