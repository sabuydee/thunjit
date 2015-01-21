<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/Report.php */

class Report extends CI_Controller {

    public function day() {
        
        $this->load->view('Report/Day');
    }

}
