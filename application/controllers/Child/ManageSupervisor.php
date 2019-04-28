<?php

class ManageSupervisor extends CI_Controller {
    
    private $login_Detail;
    
    public function __construct() {
        parent::__construct();
        
        $this->login_Detail = $this->session->userdata('login_detail');
        $this->username = $this->session->userdata('username');
    }

    public function index() {
        /* Common Code for all controller */
        $main_menu['active'] = 'ManageSupervisor';
        $this->session->set_userdata($main_menu);

        $data['controller'] = $this;
        $login_info = $this->customlib->userdetail();

        $data['login_info'] = $login_info;
        $data['topbar'] = "Manage Supervisor";
        /* Common Code for all controller */

        if ($this->form_validation->run('add_supervisor') == TRUE) {
            $insData['name'] = $this->input->post('name');
            $insData['designation'] = $this->input->post('designation');
            $insData['email'] = $this->input->post('email');
            $insData['mobile'] = $this->input->post('mobile');
            $insData['age'] = $this->input->post('age');
            $insData['gender'] = $this->input->post('gender');
            $insData['create_on'] = date('Y-m-d H:i:s');

            $this->Supervisor->add($insData);
            $password = strtolower(random_string('alpha', '6'));
            
            $login_user['organisation_name'] = $this->login_Detail['organisation_name'];
            $login_user['head_name'] = $insData['name'];
            $login_user['head_email'] = $insData['email'];
            $login_user['head_mobile'] = $insData['mobile'];
            $login_user['username'] = $insData['email'];
            $login_user['password'] = $password;
            $login_user['login_type'] = "SUPERVISOR";
            $login_user['email_verify'] = 1;
            
            $this->Login_user->add($login_user);
            
            redirect(base_url('Child/ManageSupervisor'));
        }
        
        $data['supervisor_list'] = $this->Supervisor->get();
        
        $this->load->view('layout/Child/header', $data);
        $this->load->view('layout/Child/sidebar', $data);
        $this->load->view('Child/supervisor_index', $data);
        $this->load->view('layout/Child/footer', $data);
    }

}
