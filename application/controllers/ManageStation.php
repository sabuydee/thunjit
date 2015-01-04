<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/ManageStation.php */

class ManageStation extends CI_Controller {

    public function index() {

        $data['stations'] = $this->ModelStation->getAll();
        $this->load->view('ManageStation/Index', $data);
    }

    public function view($id) {

        $data['stations'] = $this->ModelStation->getStation($id);

        $this->load->view('ManageStation/View', $data);
    }

    public function add() {

        if (empty($_POST)) {

            $station['station_name'] = NULL;
            $station['province_id'] = NULL;
            $station['station_details'] = NULL;

            $data['station'] = $station;
            $data['province'] = $this->ModelProvince->getAll();
            $data['message'] = NULL;

            $this->load->view('ManageStation/FormAdd', $data);
        } else {

            $station['station_name'] = $this->input->post('station_name');
            $station['province_id'] = $this->input->post('province_id');
            $station['station_details'] = $this->input->post('station_details');

            if (!$this->ModelStation->insert($station)) {

                $data['user'] = $station;
                $data['province'] = $this->ModelProvince->getAll();
                $data['message'] = 'ไม่สามารบันทึกได้ กรุณาตรวจสอบข้อมูลของคุณ';

                $this->load->view('ManageStation/FormAdd', $data);
            } else {

                echo '<script>alert("บันทึกเรียบร้อยแล้ว");</script>';
                $this->index();
            }
        }
    }

    public function edit($id) {

        if (empty($_POST)) {

            $data['stations'] = $this->ModelStation->getStation($id);
            $data['province'] = $this->ModelProvince->getAll();
            $data['message'] = NULL;

            $this->load->view('ManageStation/FormEdit', $data);
        } else {

            $station['station_name'] = $this->input->post('station_name');
            $station['province_id'] = $this->input->post('province_id');
            $station['station_details'] = $this->input->post('station_details');

            if (!$this->ModelStation->update($id, $station)) {

                $user['id'] = $id;

                $data['stations'] = $station;
                $data['province'] = $this->ModelProvince->getAll();
                $data['message'] = 'ไม่สามารแก้ไขได้ กรุณาตรวจสอบข้อมูล';

                $this->load->view('ManageStation/FormEdit', $data);
            } else {

                echo '<script>alert("บันทึกเรียบร้อยแล้ว");</script>';
                $this->index();
            }
        }
    }

    public function remove($id) {

        if (!$this->ModelStation->delete($id)) {
            
            echo '<script>alert("ไม่อนุญาติให้ทำการลบ อาจมีเส้นทางเดินรถใช้งานท่ารถนี้อยู่\nให้คุณทำการลบเส้นทางเดินรถนั้นออกก่อน จึงอนุญาติให้ทำการลบท่ารถนี้ได้");</script>';
            $this->index();
        } else {

            $this->index();
        }
    }
}
