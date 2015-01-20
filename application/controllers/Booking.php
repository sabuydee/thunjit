<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/Booking.php */

class Booking extends CI_Controller {

    public function seat_booking() {

        $input['travel_id'] = $this->input->post('travel_id');
        $input['seat_booking'] = $this->input->post('seat_booking');
        $input['card_id'] = $this->input->post('card_id');
        $input['tel'] = $this->input->post('tel');
        $input['passsenger'] = $this->input->post('passsenger');
        $input['gender'] = $this->input->post('gender');      
        
        $booking_id = $this->service->seat_booking($input['travel_id'], $input['seat_booking'], $input['card_id'], $input['tel'], $input['passsenger'], $input['gender']);
        if($booking_id == FALSE){
            
            $output['status'] = 'fail';
            $output['input'] = $input;
            echo json_encode($output);
        }else{
            
            $process['booking_id'] = $booking_id;
            $output['status'] = "succeed";
            $output['input'] = $input;
            $output['data'] = $process;
            echo json_encode($output);
        }
    }

    public function get_ticket($travel_id) {

        $tickets = $this->ModelTicket->select_where_travel_id($travel_id);
        echo json_encode($tickets->result_array());
    }

    public function get_travel($travel_id) {

        $travels = $this->ModelTravel->select_where_id($travel_id);
        echo json_encode($travels->row_array());
    }

    public function index($travel_id) {

        $data['travel_id'] = $travel_id;
        $this->load->view('Booking/Index', $data);
    }

}
