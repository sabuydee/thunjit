<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/* Location: ./application/controllers/Ticket.php */

class Ticket extends CI_Controller {

    public function booking() {

        $data['seat'] = ($this->input->post('seat') != '') ? explode(',', $this->input->post('seat')) : NULL;
        $data['passenger'] = $this->input->post('passenger');
        $data['gander'] = $this->input->post('gander');
        $data['tel'] = $this->input->post('tel');
        $data['details'] = $this->input->post('details');

        $error = 0;
        $messages = array();
        if (count($data['seat']) < 1) {
            $error++;
            $messages[] = 'กรุณาเลือกที่นั่งอย่างน้อย 1 ที่นั้ง';
        }
        if ($data['passenger'] == '') {
            $error++;
            $messages[] = 'กรุณาใส่ชื่อผู้โดยสาร';
        }
        if ($data['tel'] == '') {
            $error++;
            $messages[] = 'กรุณาใส่หมายเลขโทรศัพท์';
        }

        if ($error > 0) {

            $data['title'] = 'แจ้งเตือน';
            $data['image'] = 'assets/images/Exclamation_mark2.jpg';
            $data['message'] = implode('<br>', $messages);
            $message = $this->load->view('System/message', $data, TRUE);
            echo '<script>alert_modal_sm(\'' . $message . '\');</script>';
        } else {

            $travel = $this->session->userdata('travel');
            if ($travel) {

                foreach ($data['seat'] as $seat) {

                    $this->ModelTicket->insert(array(
                        'travel_id' => $travel['id'],
                        'ticket_status_id' => 2,
                        'ticket_create_date' => $this->service->stamp_to_date(),
                        'ticket_seat' => $seat,
                        'ticket_card_id' => NULL,
                        'ticket_price' => $travel['id'],
                        'travel_id' => $travel['id'],
                        'travel_id' => $travel['id'],
                        'travel_id' => $travel['id'],
                        'travel_id' => $travel['id'],
                        'travel_id' => $travel['id'],
                    ));
                }
            } else {
                
            }
        }
    }

    public function form_select_seat() {

        $car_type = $this->input->post('car_type');
        $date = $this->input->post('date');
        $date = date_parse($date);
        $time = $this->input->post('time');
        $date_time = $date['year'] . '-' . $date['month'] . '-' . $date['day'] . ' ' . $time;
        $station_source_id = $this->input->post('station_source_id');
        $station_destination_id = $this->input->post('station_destination_id');

        $error = 0;
        $messages = array();
        if ($this->common->sec_to(time(), strtotime($date_time))->hour < 1) {
            $error++;
            $messages[] = 'วันที่หรือเวลาที่คุณเลือก งดการให้บริการแล้ว';
        }
        if (!$station_source_id) {
            $error++;
            $messages[] = 'กรุณาเลือกต้นทาง';
        }
        if (!$station_destination_id) {
            $error++;
            $messages[] = 'กรุณาเลือกปลายทาง';
        }

        if ($error > 0) {

            $data['title'] = 'การแจ้งเตือน';
            $data['message'] = implode('<br>', $messages);
            $data['image'] = 'assets/images/Exclamation_mark2.jpg';
            $this->load->view('System/message', $data);
            return;
        }

        $travels = $this->ModelTravel->select_where($date_time, $station_source_id, $station_destination_id);
        if ($travels->num_rows() < 1) {

            $this->session->unset_userdata('travel');
            $data['set_seat'] = '{' . $this->service->get_seat() . '}';
            $this->load->view('Ticket/form_select_seat', $data);
        } else {

            $this->session->set_userdata('travel', $travels->row_array());
            $data['travel'] = $this->session->userdata('travel');
            $data['set_seat'] = '{' . $this->service->get_seat($travels->row()->id) . '}';
            $this->load->view('Ticket/form_select_seat', $data);
        }
    }

    public function get_station_source($province_id) {

        echo $this->service->get_table_station_source_for_select($province_id);
    }

    public function get_station_destination($province_id) {

        echo $this->service->get_table_station_destination_for_select($province_id);
    }

    public function form_select_station_source() {

        $data['province_option_tag'] = $this->service->get_option_tag_province_source_has_route();
        $this->load->view('Ticket/form_select_station_source', $data);
    }

    public function form_select_station_destination() {

        $data['province_option_tag'] = $this->service->get_option_tag_province_destination_has_route();
        $this->load->view('Ticket/form_select_station_destination', $data);
    }

    public function index() {

        $data['date'] = date('d-m-Y');
        $data['time'] = $this->service->get_option_tag_time();
        $data['station_source_name'] = '<span style="color: #f00;">ยังไม่เลือก</span>';
        $data['station_destination_name'] = '<span style="color: #f00;">ยังไม่เลือก</span>';
        $data['station_source_id'] = NULL;
        $data['station_destination_id'] = NULL;

        $this->hoption->data = $this->ModelCarType->select()->result_array();
        $this->hoption->index = 'id';
        $this->hoption->title = 'car_type_name';
        $this->hoption->selected = '1';
        $data['car_type'] = $this->hoption->get();

        $this->load->view('Ticket/Index', $data);
    }

}
