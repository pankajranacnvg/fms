<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (empty($this->session->userdata('login_detail'))) {
            redirect(base_url());
        }
    }

    public function index() {
        $main_menu['active'] = 'Dashboard';
        $this->session->set_userdata($main_menu);

        $login_info = $this->customlib->userdetail();
        //print_r($login_info); die;
        $data['login_info'] = $login_info;
        $data['topbar'] = "Dashboard";

        $this->load->view('layout/Child/header', $data);
        $this->load->view('layout/Child/sidebar', $data);
        $this->load->view('Child/dashboard_index', $data);
        $this->load->view('layout/Child/footer', $data);
    }

}
