<?php

class Privilege extends CI_Model{
    
    private $table_name = 'privilege';
    public function __construct() {
        parent::__construct();
    }
    
    public function get_privilege($username){
        $this->db->select('module');
        $this->db->from($this->table_name);
        $query = $this->db->get();
        return $query->result_array();
    }
}
