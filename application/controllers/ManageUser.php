<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/ManageUser.php */

class ManageUser extends CI_Controller {

    public function index() {

        $data['users'] = $this->ModelUser->getAll();
        $this->load->view('ManageUser/Index', $data);
    }

    public function view($id) {

        $data['user'] = $this->ModelUser->getUser($id);
        $data['userGroup'] = $this->ModelUserGroup->getAll();
        $data['gender'] = $this->ModelGender->getAll();
        $data['message'] = '';

        $this->load->view('ManageUser/View', $data);
    }

    public function add() {

        if (empty($_POST)) {

            $user['username'] = NULL;
            $user['firstname'] = NULL;
            $user['lastname'] = NULL;
            $user['gender_id'] = NULL;
            $user['user_group_id'] = NULL;
            $user['email'] = NULL;
            $user['tel'] = NULL;

            $data['user'] = $user;
            $data['userGroup'] = $this->ModelUserGroup->getAll();
            $data['gender'] = $this->ModelGender->getAll();
            $data['message'] = NULL;

            $this->load->view('ManageUser/FormAdd', $data);
        } else {

            $user['username'] = $this->input->post('username');
            $user['password'] = md5(base64_encode(md5($this->input->post('password'))));
            $user['firstname'] = $this->input->post('firstname');
            $user['lastname'] = $this->input->post('lastname');
            $user['gender_id'] = $this->input->post('gender_id');
            $user['user_group_id'] = $this->input->post('user_group_id');
            $user['email'] = $this->input->post('email');
            $user['tel'] = $this->input->post('tel');
            $user['active'] = TRUE;
            $user['create_date'] = date('Y-m-d H:i:s');

            if (!$this->ModelUser->insert($user)) {

                $data['user'] = $user;
                $data['userGroup'] = $this->ModelUserGroup->getAll();
                $data['gender'] = $this->ModelGender->getAll();
                $data['message'] = 'ไม่สามารบันทึกได้ กรุณาตรวจสอบข้อมูล';

                $this->load->view('ManageUser/FormAdd', $data);
            } else {

                echo '<script>alert("บันทึกเรียบร้อยแล้ว");</script>';
                $this->index();
            }
        }
    }

    public function edit($id) {

        if (empty($_POST)) {

            $data['user'] = $this->ModelUser->getUser($id);
            $data['userGroup'] = $this->ModelUserGroup->getAll();
            $data['gender'] = $this->ModelGender->getAll();
            $data['message'] = '';

            $this->load->view('ManageUser/FormEdit', $data);
        } else {

            if (!empty($_POST['changePassword'])) {

                $user['password'] = md5(base64_encode(md5($this->input->post('password'))));
            }
            $user['username'] = $this->input->post('username');
            $user['firstname'] = $this->input->post('firstname');
            $user['lastname'] = $this->input->post('lastname');
            $user['gender_id'] = $this->input->post('gender_id');
            $user['user_group_id'] = $this->input->post('user_group_id');
            $user['email'] = $this->input->post('email');
            $user['tel'] = $this->input->post('tel');

            if (!$this->ModelUser->update($id, $user)) {

                $user['id'] = $id;

                $data['user'] = $user;
                $data['userGroup'] = $this->ModelUserGroup->getAll();
                $data['gender'] = $this->ModelGender->getAll();
                $data['message'] = 'ไม่สามารแก้ไขได้ กรุณาตรวจสอบข้อมูล';

                $this->load->view('ManageUser/FormEdit', $data);
            } else {

                echo '<script>alert("บันทึกเรียบร้อยแล้ว");</script>';
                $this->index();
            }
        }
    }

    public function remove($id) {

        if (!$this->ModelUser->delete($id)) {
            
            echo '<script>alert("ไม่สามารถลบได้ กรุณาลองอีกครั้ง");</script>';
            $this->index();
        } else {

            $this->index();
        }
    }

}
