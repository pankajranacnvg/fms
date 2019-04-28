<?php

class ManageProject extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        /*Common Code for all controller starts*/
        $main_menu['active'] = 'ManageProject';
        $this->session->set_userdata($main_menu);

        $data['controller'] = $this;
        $login_info = $this->customlib->userdetail();
        
        //print_r($login_info); die;

        $data['login_info'] = $login_info;
        $data['topbar'] = "Manage Projects";
        /*Common Code for all controller ends*/
        
        $data['project_list'] = $this->Project->get_project();
        
        $this->load->view('layout/Child/header', $data);
        $this->load->view('layout/Child/sidebar', $data);
        $this->load->view('Child/project_index', $data);
        $this->load->view('layout/Child/footer', $data);
    }

}
