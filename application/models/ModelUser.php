<?php

class ModelUser extends CI_Model {

    public function select_where_user_card_id($user_card_id) {

        $this->db->where('user_card_id', $user_card_id);
        return $this->select();
    }

    public function select() {

        $this->db->select('*, user.id AS user_id', FALSE);
        $this->db->from('user');
        $this->db->join('gender', 'user.gender_id = gender.id', 'left');
        $this->db->join('user_group', 'user.user_group_id = user_group.id', 'left');
        $this->db->join('province', 'user.province_id = province.id', 'left');
        return $this->db->get();
    }

    public function __construct() {

        parent::__construct();
    }

}
