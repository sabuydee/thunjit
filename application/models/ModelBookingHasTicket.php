<?php
class ModelBookingHasTicket extends CI_Model {

    public function select_where_booking_id($booking_id) {
        
        $this->db->where('booking_id', $booking_id);
        return $this->select();
    }
    
    public function select() {

        $this->db->from('booking_has_ticket');
        $this->db->join('booking', 'booking_has_ticket.booking_id = booking.id', 'left');
        $this->db->join('user', 'booking.user_id = user.id', 'left');
        $this->db->join('province', 'user.province_id = province.id', 'left');
        $this->db->join('gender', 'user.gender_id = gender.id', 'left');
        $this->db->join('user_group', 'user.user_group_id = user_group.id', 'left');
        
        $this->db->join('ticket', 'booking_has_ticket.ticket_id = ticket.id', 'left');
        $this->db->join('ticket_status', 'ticket.ticket_status_id = ticket_status.id', 'left');
        return $this->db->get();
    }
    
    public function __construct() {

        parent::__construct();
    }
}
