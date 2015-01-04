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
class ModelTravel extends CI_Model {

    public function select_where($travel_define_start,$station_source_id,$station_destination_id) {
        
        $this->db->select('*');
        $this->db->from('travel');
        $this->db->where(array(
            'travel_define_start' => $travel_define_start,
            'station_source_id' => $station_source_id,
            'station_destination_id' => $station_destination_id
        ));
        return $this->db->get();
    }
    
    public function count($travel_define_start,$station_source_id,$station_destination_id) {

        $this->db->select('id');
        $this->db->from('travel');
        $this->db->where(array(
            'travel_define_start' => $travel_define_start,
            'station_source_id' => $station_source_id,
            'station_destination_id' => $station_destination_id
        ));
        return $this->db->get();
    }
    
    public function insert($data) {
        
        if($this->db->insert('travel', $data)){
            
            return $this->db->insert_id();
        }
        return FALSE;
    }
    
    public function __construct() {

        parent::__construct();
    }

    
    

}
