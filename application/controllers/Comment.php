<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/Comment.php */

class Comment extends CI_Controller {

    public function index() {
        
        $this->load->view('Comment/Index');
        
        //echo $this->service->show_array($this->ModelTravel->select()->result_array());
    }
    
    public function dd() {
        
        echo json_encode($this->db->get('user')->result_array());
        
        //echo $this->service->show_array($this->ModelTravel->select()->result_array());
    }

}
