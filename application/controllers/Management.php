<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/Management.php */

class Management extends CI_Controller {

    public function index() {

        $this->load->view('Management/Index');
    }
}
