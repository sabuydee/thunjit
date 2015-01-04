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
class ModelRouteHasCarType extends CI_Model {

    public function __construct() {

        parent::__construct();
    }
    
    public function status() {
       
        $num_inserts = $this->db->affected_rows();
        $errNo   = $this->db->_error_number();
        $errMess = $this->db->_error_message();
        $message = '<br>';
        $message .= 'affected_rows : '.$num_inserts.'<br>';
        $message .= 'error number : '.$errNo.'<br>';
        $message .= 'error message : '.$errMess.'<br>';
        return $message;
    }
    
    public function get($id) {
        
        $this->db->select('*');        
        $this->db->from('route_has_car_type');
        $this->db->join('car_type', 'route_has_car_type.car_type_id = car_type.id', 'left');
        $this->db->where('route_has_car_type.route_id', $id);
        $this->db->order_by('route_has_car_type.car_type_id');

        return $this->db->get();
    }
    
    public function insert($data) {

        if ($this->db->insert('route_has_car_type', $data)) {

            return TRUE;
        }
        return FALSE;
    }
    
    public function update($route_id, $car_type_id, $data) {

        $this->db->where(array(
            'route_id' => $route_id,
            'car_type_id' => $car_type_id
        ));
        
        if ($this->db->update('route_has_car_type', $data)) {
            
            return TRUE;
        }
        return FALSE;
    }
    
    public function delete($route_id) {

        if ($this->db->delete('route_has_car_type', array('route_id' => $route_id))) {

            return TRUE;
        }
        return FALSE;
    }

}
