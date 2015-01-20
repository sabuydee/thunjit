<?php
class ModelRoute extends CI_Model {
    
    public function select() {
        
//        $this->db->select('
//            route.id AS route_id,
//            route.active AS route_active,
//            route.route_distance AS route_route_distance,
//            route.route_map AS route_route_map,
//            route.route_details AS route_route_details,
//            route.station_source AS route_station_source,
//            route.station_destination AS route_station_destination,
//            
//            st_sour.id AS station_source_id,
//            st_sour.active AS station_source_active,
//            st_sour.station_name AS station_source_station_name,
//            st_sour.station_details AS station_source_station_details,
//            st_sour.station_img AS station_source_station_img,
//            st_sour.province_id AS station_source_province_id,
//            
//            st_dest.id AS station_destination_id,
//            st_dest.active AS station_destination_active,
//            st_dest.station_name AS station_destination_station_name,
//            st_dest.station_details AS station_destination_station_details,
//            st_dest.station_img AS station_destination_station_img,
//            st_dest.province_id AS station_destination_province_id,
//            
//            pr_sour.id AS province_source_id,
//            pr_sour.province_code AS province_source_province_code,
//            pr_sour.province_name AS province_source_province_name,
//            pr_sour.province_name_en AS province_source_province_name_en,
//            pr_sour.province_geo_id AS province_source_province_geo_id,
//            
//            pr_dest.id AS province_destination_id,
//            pr_dest.province_code AS province_destination_province_code,
//            pr_dest.province_name AS province_destination_province_name,
//            pr_dest.province_name_en AS province_destination_province_name_en,
//            pr_dest.province_geo_id AS province_destination_province_geo_id,
//        ', FALSE);
        $this->db->from('route');
        $this->db->join('station AS st_sour', 'route.station_source = st_sour.id', 'left');
        $this->db->join('station AS st_dest', 'route.station_destination = st_dest.id', 'left');
        $this->db->join('province AS pr_sour', 'st_sour.province_id = pr_sour.id', 'left');
        $this->db->join('province AS pr_dest', 'st_dest.province_id = pr_dest.id', 'left');
        
        return $this->db->get();
    }

    public function __construct() {

        parent::__construct();
    }
}
