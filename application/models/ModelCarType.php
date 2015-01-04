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
class ModelCarType extends CI_Model {
    
    public function select() {

        $this->db->order_by('id');
        return $this->db->get('car_type');
    }
    
    public function __construct() {

        parent::__construct();
    }

    public function getAll() {

        $this->db->order_by('id');
        return $this->db->get('car_type');
    }

    public function getNotInRoute($routeID = FALSE) {

        $this->db->where('route_has_car_type.route_id', $routeID);
        $carTypeID = FALSE;        
        foreach ($this->db->get('route_has_car_type')->result_array() as $value) {
            
            $carTypeID[] = $value['car_type_id'];
        }
        
        $this->db->where_not_in('car_type.id', $carTypeID);
        $this->db->order_by('id');
        return $this->db->get('car_type');
    }

}
