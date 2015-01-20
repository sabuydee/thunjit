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

    public function select_car_type_where_route_id($route_id) {

        $this->db->select('
            car_type.id AS id,
            concat(car_type.car_type_name, " - ",price, " บาท") AS car_type_name
        ', FALSE);
        $this->db->where('route_has_car_type.route_id', $route_id);
        return $this->select();
    }

    public function select() {

        $this->db->from('route_has_car_type');
        $this->db->join('route', 'route_has_car_type.route_id = route.id', 'left');
        $this->db->join('car_type', 'route_has_car_type.car_type_id = car_type.id', 'left');
        return $this->db->get();
    }

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

    public function __construct() {

        parent::__construct();
    }

}
