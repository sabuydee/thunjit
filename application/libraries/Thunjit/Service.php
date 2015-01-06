<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Service
 *
 * @author singha
 */
class Service {

    public $CI;
    
    public function stamp_to_date($stamp = FALSE) {
        
        if($stamp)
            return date('Y-m-d H:i:s', $stamp);
        else
            return date('Y-m-d H:i:s');;
    }

    public function get_option_tag_time() {
        
        $times = array(
            array('val' => '05:00:00', 'title' => '05:00 น'),
            array('val' => '06:00:00', 'title' => '06:00 น'),
            array('val' => '07:30:00', 'title' => '07:30 น'),
            array('val' => '09:00:00', 'title' => '09:00 น'),
            array('val' => '10:30:00', 'title' => '10:30 น'),
            array('val' => '12:00:00', 'title' => '12:00 น'),
            array('val' => '14:00:00', 'title' => '14:00 น'),
            array('val' => '16:00:00', 'title' => '16:00 น'),
            array('val' => '18:00:00', 'title' => '18:00 น'),
            array('val' => '19:00:00', 'title' => '19:00 น')
        );
        $this->CI->hoption->data = $times;
        $this->CI->hoption->index = 'val';
        $this->CI->hoption->title = 'title';
        $this->CI->hoption->selected = '05:00:00';
        return $this->CI->hoption->get();
    }

    public function get_seat($travel_id = FALSE) {
        $booking = NULL;
        $booking = array(
            "seat01" => '{status: "seat-free", change: "allow"}',
            "seat02" => '{status: "seat-free", change: "allow"}',
            "seat03" => '{status: "seat-free", change: "allow"}',
            "seat04" => '{status: "seat-free", change: "allow"}',
            "seat05" => '{status: "seat-free", change: "allow"}',
            "seat06" => '{status: "seat-free", change: "allow"}',
            "seat07" => '{status: "seat-free", change: "allow"}',
            "seat08" => '{status: "seat-free", change: "allow"}',
            "seat09" => '{status: "seat-free", change: "allow"}',
            "seat10" => '{status: "seat-free", change: "allow"}',
            "seat11" => '{status: "seat-free", change: "allow"}',
            "seat12" => '{status: "seat-free", change: "allow"}',
            "seat13" => '{status: "seat-free", change: "allow"}',
            "seat14" => '{status: "seat-free", change: "allow"}',
        );

        foreach ($this->CI->ModelTicket->select_where_travel_id($travel_id)->result() as $value) {

            if ($value->ticket_status_id == 1)
                $booking[$value->ticket_seat] = '{status: "seat-free", change: "allow"}';
            if ($value->ticket_status_id == 2)
                $booking[$value->ticket_seat] = '{status: "seat-active", change: "not-allow"}';
            if ($value->ticket_status_id == 3)
                $booking[$value->ticket_seat] = '{status: "seat-active", change: "not-allow"}';
            if ($value->ticket_status_id == 4)
                $booking[$value->ticket_seat] = '{status: "seat-free", change: "allow"}';
        }
        $x = NULL;
        foreach ($booking as $key => $value) {

            $x .= '"' . $key . '": ' . $value . ',';
        }
        return $x;
    }

    public function get_all_province_source() {
        
        $station_source_id_array = array();
        foreach ($this->CI->ModelRoute->select_station_source()->result() as $value) {

            $station_source_id_array[] = $value->station_source;
        }

        $province_id_array = array();
        foreach ($this->CI->ModelStation->select_where_in($station_source_id_array)->result() as $value) {

            $province_id_array[] = $value->province_id;
        }

        return $this->CI->ModelProvince->select_where_in($province_id_array)->result_array();
    }

    public function get_option_tag_province_destination_has_route($selected = FALSE) {

        $station_destination_id_array = array();
        foreach ($this->CI->ModelRoute->select_station_destination()->result() as $value) {

            $station_destination_id_array[] = $value->station_destination;
        }

        $province_id_array = array();
        foreach ($this->CI->ModelStation->select_where_in($station_destination_id_array)->result() as $value) {

            $province_id_array[] = $value->province_id;
        }

        $this->CI->hoption->data = $this->CI->ModelProvince->select_where_in($province_id_array)->result_array();
        $this->CI->hoption->index = 'id';
        $this->CI->hoption->title = 'province_name';
        $this->CI->hoption->selected = $selected;
        return $this->CI->hoption->get();
    }

    public function get_station_source_by_provice_id($provice_id) {

        
        $station_source_id_array = array();
        foreach ($this->CI->ModelRoute->select_station_source()->result() as $value) {

            $station_source_id_array[] = $value->station_source;
        }

        $this->CI->htable->data = $this->CI->ModelStation->select_where_province_id_and_where_in($provice_id, $station_source_id_array)->result_array();
        $this->CI->htable->column = $column;
        $this->CI->htable->enableIndex = FALSE;
        $this->CI->htable->msNoData = 'ไม่มีข้อมูล';
        return $this->CI->htable->get();
    }

    public function get_table_station_destination_for_select($provice_id = FALSE) {

        $station_destination_id_array = array();
        foreach ($this->CI->ModelRoute->select_station_destination()->result() as $value) {

            $station_destination_id_array[] = $value->station_destination;
        }

        $column = array(
            'เลือกท่ารถ' => array('
                <a onclick="return set_station_destination(\'', 'station_id', '\',\'', 'station_name', '\')" href="', 'Ticket/get_station_souce/station_id', '" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    <span class="glyphicon glyphicon-ok"></span> เลือก
                </a>
                ', nbs(3), 'station_name'),
        );

        $this->CI->htable->data = $this->CI->ModelStation->select_where_province_id_and_where_in($provice_id, $station_destination_id_array)->result_array();
        $this->CI->htable->column = $column;
        $this->CI->htable->enableIndex = FALSE;
        $this->CI->htable->msNoData = 'ไม่มีข้อมูล';
        return $this->CI->htable->get();
    }

    public function get_province_as_option_tag($selected = FALSE) {

        $this->CI->hoption->data = $this->CI->ModelProvince->select()->result_array();
        $this->CI->hoption->index = 'id';
        $this->CI->hoption->title = 'province_name';
        $this->CI->hoption->selected = $selected;
        return $this->CI->hoption->get();
    }

    public function removeRoute($routeID) {

        $this->CI->db->trans_begin();

        $this->CI->ModelRouteHasCarType->delete($routeID);
        $this->CI->ModelRoute->delete($routeID);


        if ($this->CI->db->trans_status() === FALSE) {

            $this->CI->db->trans_rollback();
            return FALSE;
        } else {

            $this->CI->db->trans_commit();
            return TRUE;
        }
    }

    public function editRoute($id, $route, $routeHasCarTypes) {

        $this->CI->db->trans_begin();
        $this->CI->ModelRoute->update($id, $route);

        foreach ($routeHasCarTypes as $value) {

            $tempValue = $value;
            unset($tempValue['price']);
            $row_amout = $this->CI->db->get_where('route_has_car_type', $tempValue)->num_rows();
            if ($row_amout > 0) {

                $tempValue = $value;
                unset($tempValue['route_id']);
                unset($tempValue['car_type_id']);
                $this->CI->ModelRouteHasCarType->update($value['route_id'], $value['car_type_id'], $tempValue);
            } else {

                $this->CI->ModelRouteHasCarType->insert($value);
            }
        }

        if ($this->CI->db->trans_status() === FALSE) {

            $this->CI->db->trans_rollback();
            return FALSE;
        } else {

            $this->CI->db->trans_commit();
            return TRUE;
        }
    }

    public function __construct() {

        $this->CI = & get_instance();
    }

}
