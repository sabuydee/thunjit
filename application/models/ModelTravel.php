<?php
class ModelTravel extends CI_Model {
    
    public function select_where_id($travel_id, $active = TRUE) {

        $this->full_select();
        $this->db->where('travel.travel_active', $active);
        $this->db->where('travel.id', $travel_id);
        return $this->select();
    }
    
    public function select_where_sour_dest_date($station_source_id, $station_destination_id, $date, $active = TRUE) {

        $this->full_select();
        $this->db->where('travel.travel_active', $active);
        $this->db->where('route.station_source', $station_source_id);
        $this->db->where('route.station_destination', $station_destination_id);
        $this->db->where('DATE(travel.travel_define_start)', $date);
        $this->db->order_by('DATE(travel.travel_define_start)', 'asc');
        return $this->select();
    }
    
    public function select_travel_define_start_date($station_source_id, $station_destination_id, $active = TRUE) {
        
        $this->db->select('
            DATE(travel.travel_define_start) AS travel_define_start_date,
            DATE_FORMAT(travel.travel_define_start, "%d / %m / %Y") AS travel_define_start_date_title
        ', FALSE);
        $this->db->where('travel.travel_active', $active);
        $this->db->where('route.station_source', $station_source_id);
        $this->db->where('route.station_destination', $station_destination_id);
        $this->db->group_by('DATE(travel.travel_define_start)');
        $this->db->order_by('DATE(travel.travel_define_start)', 'asc');
        return $this->select();
    }
    
    public function select_station_where_station_source_id_and_province_destination_id($station_source_id, $province_destination_id, $active = TRUE) {
        
        $this->db->select('
            station_destination.id AS id,
            station_destination.station_name AS station_name,
        ', FALSE);
        $this->db->where('travel_active', $active);
        $this->db->where('route.station_source', $station_source_id);
        $this->db->where('province_destination.id', $province_destination_id);
        $this->db->group_by('station_destination.id');
        return $this->select();
    }
    
    public function select_station_where_province_source_id_and_province_destination_id($province_source_id, $province_destination_id, $active = TRUE) {
        
        $this->db->select('
            station_source.id AS id,
            station_source.station_name AS station_name,
        ', FALSE);
        $this->db->where('travel_active', $active);
        $this->db->where('province_source.id', $province_source_id);
        $this->db->where('province_destination.id', $province_destination_id);
        $this->db->group_by('station_source.id');
        return $this->select();
    }
    
    public function select_province_destination_where_province_sourc($province_source_id, $active = TRUE) {
        
        $this->db->select('
            province_destination.id AS id,
            province_destination.province_name AS province_name,
        ', FALSE);
        $this->db->where('travel_active', $active);
        $this->db->where('province_source.id', $province_source_id);
        $this->db->group_by('province_destination.province_name');
        return $this->select();
    }
    
    public function select_all_province_source($active = TRUE) {
        
        $this->db->select('
            province_source.id AS id,
            province_source.province_name AS province_name,
        ', FALSE);
        $this->db->where('travel_active', $active);
        $this->db->group_by('province_source.id');
        return $this->select();
    }
    
    public function full_select() {
        
        return $this->db->select('*, travel.id AS travel_id,
            station_source.station_name AS station_source_name,
            station_destination.station_name AS station_destination_name,
            province_source.province_name AS province_source_name,            
            province_destination.province_name AS province_destination_name
        ', FALSE);
    }
    
    public function select() {

        $this->db->from('travel');
        $this->db->join('route', 'travel.route_id = route.id', 'left');
        $this->db->join('vans', 'travel.vans_id = vans.id', 'left');
        $this->db->join('car_type', 'vans.car_type_id = car_type.id', 'left');
        $this->db->join('route_has_car_type', 'route_has_car_type.route_id = route.id AND route_has_car_type.car_type_id = car_type.id', 'left');
        $this->db->join('station AS station_source', 'route.station_source = station_source.id', 'left');
        $this->db->join('station AS station_destination', 'route.station_destination = station_destination.id', 'left');
        $this->db->join('province AS province_source', 'station_source.province_id = province_source.id', 'left');
        $this->db->join('province AS province_destination', 'station_destination.province_id = province_destination.id', 'left');
        return $this->db->get();
    }
    
    public function __construct() {

        parent::__construct();
    }
}
