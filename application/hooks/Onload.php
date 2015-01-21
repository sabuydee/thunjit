<?php

/**
 * Description of onload
 *
 * @author singha
 */
class Onload extends CI_Controller {

    private $ci;
    private $allowRequest = array(
        'Employee/Index',
        'User/Logout',
        'Main/Index'
    );
    private $allowNotLogin = array(
        'Employee/Index',
        'Employee/About',
        'Employee/Navigate',
        'Employee/Welcome',
        'User/Login',
        'User/Logout',
        'Main/index',
        'TicketBooking/index'
    );

    public function __construct() {

        $this->ci = & get_instance();
    }

    public function checkRequest() {

        $class = $this->ci->router->class;
        $method = $this->ci->router->method;
        $request = strtolower($class . '/' . $method);

//        if (!$this->isAjax($request)) {
//
//            exit('<p>You do not have permission to run.</p>');
//        }
        
//        if ($this->ci->ModelUser->isGuest()) {
//            
//            if(!$this->isAllowRequest($request)){
//
//                exit($this->ci->load->view('System/requrie_login',FALSE,TRUE));
//            }
//        }
        
        
    }

    private function isAjax($request) {

        if (!in_array($request, array_map('strtolower', $this->allowRequest))) {

            if (!$this->check_is_ajax($request)) {

                return FALSE;
            }
        }
        return TRUE;
    }

    private function isAllowRequest($request) {

        if (!in_array($request, array_map('strtolower', $this->allowNotLogin))) {

            return FALSE;
        }
        return TRUE;
    }

    public function check_is_ajax($script) {

        $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
        if (!$isAjax) {

            //trigger_error('Access denied - not an AJAX request...' . ' (' . $script . ')', E_USER_ERROR);
            return false;
        } else {

            return true;
        }
    }

}
