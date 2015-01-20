<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/BookingResult.php */

class BookingResult extends CI_Controller {
    
    public function get_booking($booking_id) {
        
        $bookings = $this->ModelBookingHasTicket->select_where_booking_id($booking_id);
        echo json_encode($bookings->result_array());
    }

    public function index($booking_id) {

        $output['booking_id'] = $booking_id;
        $this->load->view('BookingResult/Index', $output);
    }
}
