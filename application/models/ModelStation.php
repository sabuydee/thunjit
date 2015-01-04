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
class ModelStation extends CI_Model {
    
    public function select_where_province_id_and_where_in($province_id, $station_id_array = array()) {

        $this->db->select('*, id AS station_id', FALSE);        
        $this->db->from('station');
        $this->db->where('province_id', $province_id);
        $this->db->where_in('id', $station_id_array);

        return $this->db->get();
    }
    
    public function select_where_in($station_id_array = array()) {

        $this->db->select('*', FALSE);        
        $this->db->from('station');
        $this->db->where_in('id', $station_id_array);
        $this->db->group_by('id');

        return $this->db->get();
    }

    public function selectByProvice($id) {
        
        $this->db->select('*,station.id AS station_id');
        $this->db->from('station');
        $this->db->join('province', 'station.province_id = province.id', 'left');
        $this->db->order_by('province_name');
        $this->db->where('station.province_id', $id);
        
        return $this->db->get();
    }
    
    public function getByProviceNotInRoute($id, $station_destination_id) {
        
        $this->db->select('*,station.id AS station_id');
        $this->db->from('station');
        $this->db->join('province', 'station.province_id = province.id', 'left');
        $this->db->order_by('province_name');
        $this->db->where('station.province_id', $id);
        
        $route = $this->ModelRoute->getByProvice($station_source_id);
        $stationID = array();
        foreach ($route->result_array() as $value) {
            
            array_push($stationID, $value['station_destination']);
        }
        
        $this->db->where_not_in('station.id', $stationID);
        
        return $this->db->get();
    }
    
    public function getByProvice($id) {
        
        $this->db->select('*,station.id AS station_id');
        $this->db->from('station');
        $this->db->join('province', 'station.province_id = province.id', 'left');
        $this->db->order_by('province_name');
        $this->db->where('station.province_id', $id);
        
        return $this->db->get();
    }
    
    public function getAll() {
        
        $this->db->select('*,station.id AS station_id');
        $this->db->from('station');
        $this->db->join('province', 'station.province_id = province.id', 'left');
        $this->db->order_by('province_name');
        
        return $this->db->get();
    }
    
    public function getStation($id) {
        
        $this->db->select('*,station.id AS station_id');
        $this->db->from('station');
        $this->db->join('province', 'station.province_id = province.id', 'left');
        $this->db->order_by('province_name');
        $this->db->where('station.id', $id);
        
        return $this->db->get();
    }
    
    public function select() {
        
        $this->db->select('*,station.id AS station_id');
        $this->db->from('station');
        $this->db->join('province', 'station.province_id = province.id', 'left');
        $this->db->order_by('province_name');
        
        return $this->db->get();
    }
    
    public function insert($data) {

        if($this->db->insert('station', $data)){
            
            return TRUE;
        }
        return FALSE;
    }
    
    public function multiInsert($data) {

        if($this->db->insert_batch('station', $data)){
            
            return TRUE;
        }
        return FALSE;
    }
    
    public function update($id, $data) {

        if($this->db->update('station', $data, array('id' => $id))){
            
            return TRUE;
        }
        return FALSE;
    }
    
    public function delete($id) {

        if($this->db->delete('station', array('id' => $id))){
            
            return TRUE;
        }
        return FALSE;
    }
    
    public function __construct() {

        parent::__construct();
    }
}