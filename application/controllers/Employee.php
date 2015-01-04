<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/Employee.php */

class Employee extends CI_Controller {

    public function index() {

        $this->load->view('Employee/Index');
    }

    public function Navigate() {

        $this->load->view('Employee/Navigate');
    }

    public function About() {

        $this->load->view('Employee/About');
    }

    public function Welcome() {

        $this->load->view('Employee/Welcome');
    }
}
