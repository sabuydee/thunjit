<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/User.php */

class User extends CI_Controller {

    public function Login() {

        if (empty($_POST)) {

            $data['username'] = NULL;
            $data['password'] = NULL;
            $data['message'] = NULL;
            $this->load->view('User/Login', $data);
        }else{
            
            
            $data['username'] = $this->input->post('username');
            $data['password'] = $this->input->post('password');
            $data['message'] = NULL;
            if(!$this->ModelUser->authentication($data['username'], $data['password'])){
                
                $data['message'] = "username หรือ password ไม่ถูกต้อง.";
                $this->load->view('User/Login', $data);
            }else{
                
                $this->LoginSucceed();
                echo '<script>getView("Employee/Navigate","#navigate");</script>';
            }
        }
    }
    
    public function LoginSucceed() {
        
        $this->load->view('User/LoginSucceed');
    }

    public function Logout() {

        $this->session->sess_destroy();
        redirect('employee','refresh');
    }

}
