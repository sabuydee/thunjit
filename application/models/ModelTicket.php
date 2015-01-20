<?php
class ModelTicket extends CI_Model {

    public function select_where_travel_id($travel_id) {
        
        $this->db->where('ticket.travel_id', $travel_id);
        return $this->select();
    }
    
    public function select() {
        
        $this->db->select('*, ticket.id AS ticket_id', FALSE);
        $this->db->from('ticket');
        $this->db->join('ticket_status', 'ticket.ticket_status_id = ticket_status.id', 'left');
        return $this->db->get();
    }
    
    public function __construct() {

        parent::__construct();
    }
}
