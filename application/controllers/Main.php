<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/Main.php */

class Main extends CI_Controller {

    public function index() {
        
        $this->load->view('Main/Index');
    }

}
