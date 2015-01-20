<?php
class ModelTicketStatus extends CI_Model {
    
    public function select_where_ticket_status_value($ticket_status_value) {
        
        $this->db->where('ticket_status_value', $ticket_status_value);
        return $this->db->get('ticket_status');
    }
    
    public function __construct() {

        parent::__construct();
    }
}
