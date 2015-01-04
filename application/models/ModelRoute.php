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
class ModelRoute extends CI_Model {

    public function __construct() {

        parent::__construct();
    }
    
    public function select_station_destination() {

        $this->db->select('*', FALSE);        
        $this->db->from('route');
        $this->db->group_by('station_destination');
        
        return $this->db->get();
    }
    
    public function select_station_source() {

        $this->db->select('*', FALSE);        
        $this->db->from('route');
        $this->db->group_by('station_source');
        
        return $this->db->get();
    }
    
    public function select() {

        $this->db->select('
            *,
            route.id AS route_id, 
            
            tbl_station_source.province_id AS province_source_id,
            tbl_station_destination.province_id AS province_destination_id, 
            
            tbl_province_source.province_name AS province_source_name,
            tbl_province_destination.province_name AS province_destination_name,
            
            tbl_station_source.station_name AS station_source_name,
            tbl_station_destination.station_name AS station_destination_name
            ', FALSE);        
        $this->db->from('route');
        $this->db->join('station AS tbl_station_source', 'route.station_source = tbl_station_source.id', 'left');
        $this->db->join('station AS tbl_station_destination', 'route.station_destination = tbl_station_destination.id', 'left');
        $this->db->join('province AS tbl_province_source', 'tbl_province_source.id = tbl_station_source.province_id', 'left');
        $this->db->join('province AS tbl_province_destination', 'tbl_province_destination.id = tbl_station_destination.province_id', 'left');
        $this->db->order_by('tbl_province_source.province_name');
        
        return $this->db->get();        
    }
    
    public function getAll() {

        $this->db->select('
            *,
            route.id AS route_id, 
            CONCAT(tbl_province_source.province_name, " - ", tbl_station_source.station_name) AS station_source_name,
            CONCAT(tbl_province_destination.province_name, " - ", tbl_station_destination.station_name) AS station_destination_name,
            tbl_station_source.province_id AS province_source_id,
            tbl_station_destination.province_id AS province_destination_id
            ', FALSE);        
        $this->db->from('route');
        $this->db->join('station AS tbl_station_source', 'route.station_source = tbl_station_source.id', 'left');
        $this->db->join('station AS tbl_station_destination', 'route.station_destination = tbl_station_destination.id', 'left');
        $this->db->join('province AS tbl_province_source', 'tbl_province_source.id = tbl_station_source.province_id', 'left');
        $this->db->join('province AS tbl_province_destination', 'tbl_province_destination.id = tbl_station_destination.province_id', 'left');
//        $this->db->join('route_has_car_type', 'route.id = route_has_car_type.route_id', 'left');
//        $this->db->join('car_type', 'route_has_car_type.car_type_id = car_type.id', 'left');
        $this->db->order_by('tbl_province_source.province_name');
        
//        $sub = $this->subquery->start_subquery('select');
//        $sub->select('car_type_id')->from('route_has_car_type');
//        $sub->where('route.id', 'route_has_car_type.route_id');
//        $this->subquery->end_subquery('car_type_id','ไม่มีค่า');
        
        return $this->db->get();        
    }

    public function get($id) {
        
        $this->db->select('
            *,
            route.id AS route_id, 
            CONCAT(tbl_province_source.province_name, " - ", tbl_station_source.station_name) AS station_source_name,
            CONCAT(tbl_province_destination.province_name, " - ", tbl_station_destination.station_name) AS station_destination_name,
            tbl_station_source.province_id AS province_source_id,
            tbl_station_destination.province_id AS province_destination_id
            ', FALSE);        
        $this->db->from('route');
        $this->db->join('station AS tbl_station_source', 'route.station_source = tbl_station_source.id', 'left');
        $this->db->join('station AS tbl_station_destination', 'route.station_destination = tbl_station_destination.id', 'left');
        $this->db->join('province AS tbl_province_source', 'tbl_province_source.id = tbl_station_source.province_id', 'left');
        $this->db->join('province AS tbl_province_destination', 'tbl_province_destination.id = tbl_station_destination.province_id', 'left');
        $this->db->where('route.id', $id);

        return $this->db->get();
    }

    public function insert($data) {

        if ($this->db->insert('route', $data)) {

            return TRUE;
        }
        return FALSE;
    }

    public function update($id, $data) {

        if ($this->db->update('route', $data, array('id' => $id))) {

            return TRUE;
        }
        return FALSE;
    }

    public function delete($id) {

        if ($this->db->delete('route', array('id' => $id))) {

            return TRUE;
        }
        return FALSE;
    }
    
    public function getByProvice($id) {
        
        $this->db->select('*,route.id AS route_id');
        $this->db->from('route');
        $this->db->where('route.station_source', $id);
        
        return $this->db->get();
    }

}
