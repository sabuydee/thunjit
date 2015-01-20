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
class ModelUserGroup extends CI_Model {
    
    public function select_where_user_group_name($user_group_name) {
        
        $this->db->where('user_group_name', $user_group_name);
        return $this->db->get('user_group');
    }

    public function __construct() {

        parent::__construct();
    }
}
