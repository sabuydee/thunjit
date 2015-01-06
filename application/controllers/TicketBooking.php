<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/TicketBooking.php */

class TicketBooking extends CI_Controller {

    public function index() {

        $this->load->view('TicketBooking/Index');
    }
    
    public function province_source() {
        
        $this->hoption->data = $this->service->get_all_province_source();
        $this->hoption->index = 'id';
        $this->hoption->title = 'province_name';
        echo $this->hoption->get();
    }
    
    public function station_source($pv_s) {
        
        echo $pv_s;
    }
}