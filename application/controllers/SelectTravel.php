<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/SelectTravel.php */

class SelectTravel extends CI_Controller {

    public function is_free_seat($travel_id) {
        
        echo json_encode($this->service->is_free_seat($travel_id));
    }

    public function get_travel($source_id, $destination_id, $date) {

        $travels = $this->ModelTravel->select_where_sour_dest_date($source_id, $destination_id, $date, TRUE);
        echo json_encode($travels->result_array());
    }

    public function get_station($station_id) {

        $station = $this->ModelStation->select_where_id($station_id);
        echo json_encode($station->row_array());
    }

    public function index($source_id, $destination_id, $date) {

        $data['station_source_id'] = $source_id;
        $data['station_destination_id'] = $destination_id;
        $data['date'] = $date;
        $this->load->view('SelectTravel/Index', $data);
    }

}
