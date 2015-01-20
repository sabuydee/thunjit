<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/TicketBooking.php */

class TicketBooking extends CI_Controller {

    public function get_date($station_source_id, $station_destination_id) {
        
        echo json_encode($this->service->get_date($station_source_id, $station_destination_id)->result_array());
    }
       
    public function get_station_destination($station_source_id, $province_destination_id) {
        
        echo json_encode($this->service->get_station_destination($station_source_id, $province_destination_id)->result_array());
    }
    
    public function get_station_source($province_source_id, $province_destination_id) {
        
        echo json_encode($this->service->get_station_source($province_source_id, $province_destination_id)->result_array());
    } 
    
    public function get_province_destination($province_source_id) {
        
        echo json_encode($this->service->get_province_destination($province_source_id)->result_array());
    }
    
    public function get_province_source() {
        
        echo json_encode($this->service->get_province_source()->result_array());
    }
    
    public function index() {
        
        $this->load->view('TicketBooking/Index');
    }
}