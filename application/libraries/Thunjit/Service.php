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
    
    public function seat_booking($travel_id, $seat_booking, $card_id, $tel, $passsenger, $gender_id) {
        
        $this->CI->db->trans_begin();
        
        $users = $this->CI->ModelUser->select_where_user_card_id($card_id);
        if($users->num_rows() <= 0){            
            $this->CI->db->insert('user', array(
                'user_group_id' => $this->CI->ModelUserGroup->select_where_user_group_name("Customer")->row()->id,
                'gender_id' => $gender_id,
                'province_id' => 1,
                'user_active' => TRUE,
                'user_username' => $card_id,
                'user_password' => $card_id,    
                'user_card_id' => $card_id,
                'user_nickname' => $passsenger,
                'user_tel' => $tel
            ));
            $process['user_id'] = $this->CI->db->insert_id();
        }else{            
            $process['user_id'] = $users->row()->user_id;
        }
        
        $this->CI->db->insert('booking', array(
            'user_id' => $process['user_id']
        ));
        $process['booking_id'] = $this->CI->db->insert_id();
        
        $process['seat_booking'] = explode(",", $seat_booking);
        foreach ($process['seat_booking'] as  $value) {
            
            $this->CI->db->insert('ticket', array(
                'travel_id' => $travel_id,
                'ticket_status_id' => $this->CI->ModelTicketStatus->select_where_ticket_status_value(TICKET_BOOKING)->row()->id,
                'ticket_seat' => $value,
                'ticket_price' => $this->CI->ModelTravel->select_where_id($travel_id)->row()->price,
                'gender_id' => $gender_id
            ));
            $process['ticket_id'] = $this->CI->db->insert_id();
            
            $this->CI->db->insert('booking_has_ticket', array(
                'booking_id' => $process['booking_id'],
                'ticket_id' => $process['ticket_id']
            ));
        }

        
        if ($this->CI->db->trans_status() === FALSE) {
            
            $this->CI->db->trans_rollback();
            return FALSE;
        } else {
            
            $this->CI->db->trans_commit();
            return $process['booking_id'];
        }
    }    
    
    public function is_free_seat($travel_id) {
        
        $tickets = $this->CI->ModelTicket->select_where_travel_id($travel_id);
        $booking = 0;
        foreach ($tickets->result() as $row) {
            
            if($row->ticket_status_value == TICKET_BOOKING || $row->ticket_status_value == TICKET_SUCCEED){
                $booking++;
            }
        }
        $travels = $this->CI->ModelTravel->select_where_id($travel_id);
        
        if($booking < $travels->row()->car_type_seat_amount){
            
            return TRUE;
        }
        return FALSE;
    }
    
    public function get_date($station_source_id, $station_destination_id) {
        
        return $this->CI->ModelTravel->select_travel_define_start_date($station_source_id, $station_destination_id, TRUE);
    }
    
    public function get_station_destination($station_source_id, $province_destination_id) {

        return $this->CI->ModelTravel->select_station_where_station_source_id_and_province_destination_id($station_source_id, $province_destination_id);
    }
    
    public function get_station_source($province_source_id, $province_destination_id) {
     
        return $this->CI->ModelTravel->select_station_where_province_source_id_and_province_destination_id($province_source_id, $province_destination_id);
    }
    
    public function get_province_destination($province_source) {
        
        return $this->CI->ModelTravel->select_province_destination_where_province_sourc($province_source);
    }
    
    public function get_province_source() {
        
        return $this->CI->ModelTravel->select_all_province_source();
    }
  
    
    
    
    
    
    public function check_date_time($stamp) {
        
        if($this->date_details($stamp- time())->hour < TIME_ALLOW_BOOKING){
            
            return FALSE;
        }
        return TRUE;
    }
    
    public function date_details($second) {

//        $result['minute'] = round($second / 60);
//        $result['hour'] = round($second / 3600);
//        $result['day'] = round($second / 86400);
//        $result['week'] = round($second / 604800);
//        $result['month'] = round($second / 2419200);
//        $result['year'] = round($second / 29030400);
        $result['second'] = ($second);
        $result['minute'] = ($second / 60);
        $result['hour'] = ($second / 3600);
        $result['day'] = ($second / 86400);
        $result['week'] = ($second / 604800);
        $result['month'] = ($second / 2419200);
        $result['year'] = ($second / 29030400);
        return $this->array_to_obj($result);
    }
    
    public function array_to_obj($param) {

        return json_decode(json_encode($param), FALSE);
    }
    
    public function get_column($table, $column) {
        
        $tmp_array = array();
        foreach ($table->result_array() as $value) {

            $tmp_array[] = $value[$column];
        }
        return $tmp_array;
    }
    
    public function show_array($array){
        
        echo '<pre>';
        print_r($array);
        echo '</pre>';
        
    }

    public function __construct() {

        $this->CI = & get_instance();
    }

}
