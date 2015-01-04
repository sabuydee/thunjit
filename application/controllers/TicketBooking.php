<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/TicketBooking.php */

class TicketBooking extends CI_Controller {

    public function index() {

        $this->load->view('TicketBooking/Index');
    }
}