<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BankGuarantee
 *
 * @author mac
 */
class Bg extends CI_Model{
    
    private $table_name = "bank_guarantee";
    
    public function __construct() {
        parent::__construct();
    }
    
    public function add($data) {
        return $this->db->insert($this->table_name, $data);
    }
    
    public function get_bg($id = '') {
        $this->db->select("bank_guarantee.*, project.project_title");
        $this->db->from($this->table_name);
        $this->db->join('project', 'project.id = bank_guarantee.projectname');
        if ($id != '') {
            $this->db->where(array('id' => $id));
        }

        $this->db->order_by('create_on', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }
    
}
