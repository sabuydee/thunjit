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

    public function __construct() {

        parent::__construct();
    }
    
    public function getAll() {
        
        return $this->db->get('user_group');
    }
}
