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

    public function status() {

        $num_inserts = $this->db->affected_rows();
        $errNo = $this->db->_error_number();
        $errMess = $this->db->_error_message();
        $message = '<br>';
        $message .= 'affected_rows : ' . $num_inserts . '<br>';
        $message .= 'error number : ' . $errNo . '<br>';
        $message .= 'error message : ' . $errMess . '<br>';
        return $message;
    }
    
    public function select_where_in($province_id_array = array()) {

        if (count($province_id_array) > 0) {

            $this->db->select('*', FALSE);
            $this->db->from('province');
            $this->db->where_in('id', $province_id_array);
            $this->db->group_by('id');
        }else{
            
            $tmp_province = $this->db->get('province')->result();
            $tmp_id = array();
            foreach ($tmp_province as $value) {
                $tmp_id[] = $value->id;
            }

            $this->db->select('*');
            $this->db->from('province');
            $this->db->where_not_in('id', $tmp_id);
        }

        $this->db->order_by('province_name');
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
