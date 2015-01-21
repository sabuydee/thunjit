<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/CancelTicket.php */

class CancelTicket extends CI_Controller {
    
    public function by_booking_id($booking_id) {

        $input['booking_id'] = $booking_id;
        if(!$this->service->cancel_ticket($input['booking_id'])){
            
            $output['input'] = $input;
            $output['status'] = 'fail';
            echo json_encode($output);
        }else{
            
            $output['input'] = $input;
            $output['status'] = 'succeed';
            echo json_encode($output);
        }
    }

    public function index() {

        $this->load->view('CancelTicket/Index');
    }

}
