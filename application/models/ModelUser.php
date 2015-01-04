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
class ModelUser extends CI_Model {

    public function __construct() {

        parent::__construct();
    }

    public function getAll() {

        $this->db->select('*,user.id AS user_id');
        $this->db->from('user');
        $this->db->join('gender', 'user.gender_id = gender.id', 'left');
        $this->db->join('user_group', 'user.user_group_id = user_group.id', 'left');
        return $this->db->get();
    }

    public function getUser($id) {

        $this->db->select('*,user.id AS user_id');
        $this->db->from('user');
        $this->db->join('gender', 'user.gender_id = gender.id', 'left');
        $this->db->join('user_group', 'user.user_group_id = user_group.id', 'left');
        $this->db->where('user.id', $id);
        return $this->db->get();
    }

    public function authentication($username, $password) {

        $user = $this->db->get_where(
                'user', array(
            'username' => $username,
            'password' => md5(base64_encode(md5($password))),
            'active' => TRUE
        ));

        if (!$user->row()) {

            return false;
        } else {

            $this->session->set_userdata($user->row());
            return true;
        }
    }

    public function isGuest() {

        if ($this->session->userdata('id')) {

            return FALSE;
        }
        return TRUE;
    }

    public function insert($user) {

        if($this->db->insert('user', $user)){
            
            return TRUE;
        }
        return FALSE;
    }
    
    public function update($id, $user) {

        if($this->db->update('user', $user, array('id' => $id))){
            
            return TRUE;
        }
        return FALSE;
    }
    
    public function delete($id) {

        if($this->db->delete('user', array('id' => $id))){
            
            return TRUE;
        }
        return FALSE;
    }

}
