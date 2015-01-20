<?php

class ModelStation extends CI_Model {

    public function select_where_id($station_id) {

        $this->db->select('
            *,
            station.id AS station_id,
            province.id AS province_id,
        ');
        $this->db->from('station');
        $this->db->join('province', 'station.province_id = province.id', 'left');
        $this->db->where('station.id', $station_id);
        $this->db->order_by('province.province_name');
        return $this->db->get();
    }

    public function select_where_in($id_station_source = array()) {

        if (count($id_station_source) > 0) {

            $this->db->select('*');
            $this->db->from('station');
            $this->db->where_in('id', $id_station_source);
            $this->db->group_by('id');
        } else {

            $tmp_tbl = $this->db->get('station')->result();
            $tmp_id = array();
            foreach ($tmp_tbl as $value) {
                $tmp_id[] = $value->id;
            }

            $this->db->select('*');
            $this->db->from('station');
            $this->db->where_not_in('id', $tmp_id);
        }

        $this->db->order_by('station_name');
        return $this->db->get();
    }

    public function __construct() {

        parent::__construct();
    }

}