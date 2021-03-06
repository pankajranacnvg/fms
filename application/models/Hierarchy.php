<?php

class Hierarchy extends CI_Model {

    private $table_name = "hierarchy";

    public function __construct() {
        parent::__construct();
    }

    public function add($data) {
        return $this->db->insert($this->table_name, $data);
    }

    /* show inserted datas */

    public function get($hierarchy_id = null) {
        //SELECT * FROM $this->table_name;
        $this->db->select("c.id, c.lable, c.parent_id, c.description, c.head_name, c.head_designation, c.head_email, c.head_contact, c.office_address, c.bank_name, c.bank_branch, c.account_number, c.ifsc_code, p.lable as parent_lable");
        $this->db->from($this->table_name . " c");
        $where = array('c.isactive' => 'yes');

        $this->db->join($this->table_name . " p", "p.id = c.parent_id");

        if ($hierarchy_id !== null) {
            $where = array('c.isactive' => 'yes', 'c.id' => $hierarchy_id);
        }
        //print_r($where);
        //die;
        $this->db->where($where);
        $this->db->order_by('c.id', 'ASC');
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
        return $query->result_array();
    }

    public function get_tree($hierarchy_id = null) {
        //SELECT * FROM $this->table_name;
        $this->db->select("c.id, c.lable, c.parent_id, c.description");
        $this->db->from($this->table_name . " c");
        $where = array('c.isactive' => 'yes');

        if ($hierarchy_id !== null) {
            $where = array('c.isactive' => 'yes', 'c.id' => $hierarchy_id);
        }
        //print_r($where);
        //die;
        $this->db->where($where);
        $this->db->order_by('c.id', 'ASC');
        $query = $this->db->get();
        //echo $this->db->last_query(); die;
        return $query->result_array();
    }

    public function getHierarchy($projectid) {
        $query = "SELECT
            root.id AS root_id,
            down1.id as lable_1_id,
            down2.id as lable_2_id,
            down3.id as lable_3_id,
            down4.id as lable_4_id,
            down5.id as lable_5_id,
            root.lable AS root_name,
            down1.lable AS lable_1,
            down2.lable AS lable_2,
            down3.lable AS lable_3,
            down4.lable AS lable_4,
            down5.lable AS lable_5,
            t2.Label_Fund_Allotted
        FROM
            $this->table_name root
            LEFT JOIN $this->table_name down1 ON down1.parent_id = root.id
            LEFT JOIN $this->table_name down2 ON down2.parent_id = down1.id
            LEFT JOIN $this->table_name down3 ON down3.parent_id = down2.id
            LEFT JOIN $this->table_name down4 ON down4.parent_id = down3.id
            LEFT JOIN $this->table_name down5 ON down5.parent_id = down4.id
            INNER JOIN(SELECT hierarchy_id, SUM(amount) AS Label_Fund_Allotted FROM fund where project_id='".$projectid."' GROUP BY hierarchy_id) t2 ON down2.id = t2.hierarchy_id
        WHERE
            ISNULL(root.parent_id)";
           

        $result = $this->db->query($query);
        //echo $this->db->last_query(); die;
        return $result->result_array();
    }

    public function parent_child() {
        $query = "SELECT SUPERVISOR.lable AS SuperVisor, GROUP_CONCAT(SUPERVISEE.lable ORDER BY SUPERVISEE.lable SEPARATOR '</li><li>') AS SuperVisee, COUNT(*) FROM hierarchy AS SUPERVISOR INNER JOIN hierarchy SUPERVISEE ON SUPERVISOR.id = SUPERVISEE.parent_id GROUP BY SuperVisor";
        $result = $this->db->query($query);
        return $result->result_array();
    }

    /* regular join to get detail */

    public function regularJoin() {
        $this->db->select("p.lable as parentName, c.lable as childName, p.id as parentId, c.id as childId");
        $this->db->from("$this->table_name p");
        $this->db->join("$this->table_name c", "c.parent_id = p.id");
        $this->db->order_by("parentId");
        $q = $this->db->get();
        return $q->result_array();
    }

    public function addDetails($data_detail, $hirearchy_id) {
        //print_r($data_detail); die;
        $this->db->where('id', $hirearchy_id);
        $this->db->update($this->table_name, $data_detail);
    }

    public function addLoginDetails($data) {
        if ($this->ifLoginExist($data['hierarchy_id'])) {
            $this->db->where('hierarchy_id', $hirearchy_id);
            $this->db->update('login_user', $data);
        } else {
            $this->db->insert('login_user', $data);
        }
    }

    public function ifLoginExist($hirearchy_id) {
        $this->db->select('count(*) as num');
        $this->db->from('login_user');
        $this->db->where(array('hierarchy_id' => $hirearchy_id));

        $result = $this->db->get();
        $data = $result->row_array();
        if ($data['num'] > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
