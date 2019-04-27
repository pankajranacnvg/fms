<?php

class Fund extends CI_Model {

    private $table_name = "fund";

    public function __construct() {
        parent::__construct();
    }

    public function add($data) {
        return $this->db->insert($this->table_name, $data);
    }

    public function add_batch($data) {
        return $this->db->insert_batch('fund', $data);
    }

    public function getlastupdatedfund($pro_id){
        $query = $this->db->query("select l.* from fund l inner join ( select hierarchy_id, amount, max(id) as latest from fund where project_id='".$pro_id."' group by hierarchy_id) r on l.id = r.latest and l.hierarchy_id = r.hierarchy_id order by id desc");
        $data = $query->result_array();
        foreach ($data as $value) {
            $hierarchy_id=$value['hierarchy_id'];
            $temp[$hierarchy_id] = $value['amount'];
        }
        return $temp;
    }

    /* show inserted datas */

    public function get($hierarchy_id = null) {
        $this->db->select("fund.*, hierarchy.lable, hierarchy.description, project.project_title, project.project_description, project.project_type");
        $this->db->from($this->table_name);
        $this->db->join('hierarchy', 'hierarchy.id = fund.hierarchy_id');
        $this->db->join('project', 'project.id = fund.project_id');
        if ($hierarchy_id != null) {
            $this->db->where(array('hierarchy.id' => $hierarchy_id));
        }
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

}
