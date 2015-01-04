<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/ManageRoute.php */

class ManageRoute extends CI_Controller {

    public function index() {

        $data['routes'] = $this->ModelRoute->getAll();
        $this->load->view('ManageRoute/Index', $data);
    }

    public function view($id) {

        $data['routes'] = $this->ModelRoute->get($id);
        $data['price'] = $this->ModelRouteHasCarType->get($id);
        $this->load->view('ManageRoute/FormView', $data);
    }

    public function add() {

        if (empty($_POST)) {

            $station['station_source_id'] = NULL;
            $station['station_destination_id'] = NULL;
            $station['province_source_id'] = NULL;
            $station['province_destination_id'] = NULL;
            $cars = array();
            foreach ($this->ModelCarType->getAll()->result() as $value) {

                $car['id'] = $value->id;
                $car['name'] = $value->car_type_name;
                $car['price'] = '0';
                array_push($cars, $car);
            }
            $data['provinces'] = $this->ModelProvince->getAll();
            $data['cars'] = $cars;
            $data['station'] = $station;
            $data['option'] = NULL;

            $this->load->view('ManageRoute/FormAdd', $data);
        } else {

            $station['station_source_id'] = $this->input->post('station_source_id');
            $station['station_destination_id'] = $this->input->post('station_destination_id');
            $station['province_source_id'] = $this->input->post('province_source_id');
            $station['province_destination_id'] = $this->input->post('province_destination_id');
            $route['station_source'] = $station['station_source_id'];
            $route['station_destination'] = $station['station_destination_id'];
            $inputCars = $this->input->post('car');
            $cars = array();
            foreach ($this->ModelCarType->getAll()->result() as $value) {

                $car['id'] = $value->id;
                $car['name'] = $value->car_type_name;
                $car['price'] = $inputCars[$value->id];
                array_push($cars, $car);
                $this->form_validation->set_rules('car[' . $value->id . ']', FALSE, 'numeric');
            }


            $error = 0;
            $messges = array();
            if ($this->db->get_where('route', $route)->num_rows() > 0) {

                $error++;
                array_push($messges, 'เส้นทางนี้มีอยู่แล้วในระบบแล้ว');
            }
            if ($this->form_validation->run() == FALSE) {

                $error++;
                array_push($messges, 'ต้องระบุราคาตั๋วเป็นจำนวนเงินเท่านั้น');
            }

            $this->db->trans_begin();

            $this->ModelRoute->insert($route);
            $route_id = $this->db->insert_id();

            foreach ($this->ModelCarType->getAll()->result() as $value) {

                $this->ModelRouteHasCarType->insert(array(
                    'route_id' => $route_id,
                    'car_type_id' => $value->id,
                    'price' => $inputCars[$value->id]
                ));
            }

            if ($this->db->trans_status() === FALSE) {

                $error++;
                $this->db->trans_rollback();
                array_push($messges, 'ไม่สามารบันทึกได้ กรุณาตรวจสอบข้อมูลของคุณ');
            }

            if ($error > 0) {

                $messge = implode('<br>', $messges);
                $data['provinces'] = $this->ModelProvince->getAll();
                $data['cars'] = $cars;
                $data['station'] = $station;
                $data['option'] = array(
                    'message' => $messge,
                    'script' => 'selected_station_source_id = ' . $station['station_source_id'] . ';selected_station_destination_id = ' . $station['station_destination_id'] . ';'
                );
                exit($this->load->view('ManageRoute/FormAdd', $data, TRUE));
            } else {

                $this->db->trans_commit();
                echo '<script>alert("บันทึกเรียบร้อยแล้ว");</script>';
                $this->index();
            }
        }
    }

    public function edit($id) {

        $data['route_id'] = $id;
        if (empty($_POST)) {

            $data['provinces'] = $this->ModelProvince->getAll();

            $route = $this->ModelRoute->get($id)->row();
            $station['province_source_id'] = $route->province_source_id;
            $station['province_destination_id'] = $route->province_destination_id;
            $data['station'] = $station;
            
            $cars = array();
            foreach ($this->ModelRouteHasCarType->get($id)->result() as $value) {

                $car['id'] = $value->car_type_id;
                $car['name'] = $value->car_type_name;
                $car['price'] = $value->price;
                array_push($cars, $car);
            }
            foreach ($this->ModelCarType->getNotInRoute($id)->result() as $value) {
                
                $car['id'] = $value->id;
                $car['name'] = $value->car_type_name;
                $car['price'] = 0;
                array_push($cars, $car);
            }
            $data['cars'] = $cars;
            $data['option'] = array(
                'message' => NULL,
                'script' => 'selected_station_source_id = ' . $route->station_source . ';selected_station_destination_id = ' . $route->station_destination . ';'
            );

            $this->load->view('ManageRoute/FormEdit', $data);
        } else {

            $station['station_source_id'] = $this->input->post('station_source_id');
            $station['station_destination_id'] = $this->input->post('station_destination_id');
            $station['province_source_id'] = $this->input->post('province_source_id');
            $station['province_destination_id'] = $this->input->post('province_destination_id');
            $route['station_source'] = $station['station_source_id'];
            $route['station_destination'] = $station['station_destination_id'];
            $route['active'] = TRUE;
            $inputCars = $this->input->post('car');
            $cars = array();
            $route_has_car_types = array();
            
            foreach ($this->ModelCarType->getAll()->result() as $value) {

                $car['id'] = $value->id;
                $car['name'] = $value->car_type_name;
                $car['price'] = $inputCars[$value->id];
                array_push($cars, $car);
                $this->form_validation->set_rules('car[' . $value->id . ']', FALSE, 'numeric');
            
                array_push($route_has_car_types, array(
                    'route_id' => $data['route_id'],
                    'car_type_id' => $value->id,
                    'price' => $inputCars[$value->id]
                ));
            }
            
            
            $error = 0;
            $messges = array();
            
            if ($this->form_validation->run() == FALSE) {

                $error++;
                array_push($messges, 'ต้องระบุราคาตั๋วเป็นจำนวนเงินเท่านั้น');
            }
            if ( !$this->service->editRoute($data['route_id'], $route, $route_has_car_types) ) {

                $error++;
                array_push($messges, 'ไม่สามารถแก้ไข้ได้ กรุณาตรวจสอบข้อมูลของคุณ');
            }

            if ($error > 0) {

                $messge = implode('<br>', $messges);
                $data['provinces'] = $this->ModelProvince->getAll();
                $data['cars'] = $cars;
                $data['station'] = $station;
                $data['option'] = array(
                    'message' => $messge,
                    'script' => 'selected_station_source_id = ' . $station['station_source_id'] . ';selected_station_destination_id = ' . $station['station_destination_id'] . ';'
                );
                
                exit($this->load->view('ManageRoute/FormEdit', $data, TRUE));
            } else {

                echo '<script>alert("บันทึกเรียบร้อยแล้ว");</script>';
                $this->index();
            }
        }
    }

    public function remove($id) {

        if (!$this->service->removeRoute($id)) {

            echo '<script>alert("ไม่สามารถลบได้ กรุณาลองอีกครั้ง");</script>';
            $this->index();
        } else {

            $this->index();
        }
    }

    public function get_tag_option_station_by_provice() {

        $province_id = $this->input->post('province_id');
        $this->hoption->data = $this->ModelStation->getByProvice($province_id)->result_array();
        $this->hoption->index = 'station_id';
        $this->hoption->title = 'station_name';
        $this->hoption->selected = $this->input->post('selected');
        $this->hoption->message_no_data = '--- ไม่มีท่ารถในจังหวัดนี้ ---';

        echo $this->hoption->get();
    }

}
