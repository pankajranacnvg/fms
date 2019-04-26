<?php

class Bank extends CI_Model {

    private $table_name = "bank_account";

    public function __construct() {
        parent::__construct();
    }

    public function add($data) {
        return $this->db->insert($this->table_name, $data);
    }
    
    public function update($data, $id) {
        $this->db->where('id', $id);
        return $this->db->update($this->table_name, $data);
    }
    
    public function getbank($id = '') {
        $this->db->select("*");
        $this->db->from($this->table_name);
        if ($id != '') {
            $this->db->where(array('id' => $id));
        }

        $this->db->order_by('create_on', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

}
