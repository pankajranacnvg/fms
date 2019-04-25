<?php

class BankGuarantee extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (empty($this->session->userdata('login_detail'))) {
            redirect(base_url());
        }

        $this->username = $this->session->userdata('username');
    }

    public function index() {
        $main_menu['active'] = 'BankGuarantee';
        $data['active'] = 'BankGuarantee';
        $this->session->set_userdata($main_menu);

        $data['controller'] = $this;
        $login_info = $this->customlib->userdetail();

        $data['login_info'] = $login_info;
        $data['topbar'] = "Bank Guarantee";
        
        $allbg = $this->Bg->get_bg();
        $data['allbg'] = $allbg;
        
        $amount_arr = array_column($allbg, 'amount');
        $data['total_bg'] = array_sum($amount_arr);
        
        $data['total_num_bg'] = count($allbg);
        
//        echo "<pre>";
//        print_r(count($allbg));
//        echo "</pre>";
//        die;
        
        $this->load->view('layout/Admin/header', $data);
        $this->load->view('layout/Admin/sidebar', $data);
        $this->load->view('Admin/bg_index', $data);
        $this->load->view('layout/Admin/footer', $data);
    }
    
    public function add() {
        
        if ($this->form_validation->run('bankGuarantee') == TRUE) {
            $data_add['clientname'] = $this->input->post('clientname');
            $data_add['projectname'] = $this->input->post('projectname');
            $data_add['amount'] = $this->input->post('amount');
            $data_add['bankname'] = $this->input->post('bankname');
            $data_add['branch'] = $this->input->post('branch');
            $data_add['accountnumber'] = $this->input->post('accountnumber');
            $data_add['ifsc_code'] = $this->input->post('ifsc_code');
            $data_add['time_period'] = $this->input->post('time_period');
            $data_add['create_on'] = $this->input->post('create_on');
            
            $this->Bg->add($data_add);
            $this->session->set_flashdata('msg', "Bank Guarantee Added Successfully");
            redirect(base_url('Admin/BankGuarantee/add'));
        }
        
        $main_menu['active'] = 'BankGuarantee';
        $data['active'] = 'BankGuarantee_add';
        $this->session->set_userdata($main_menu);

        $data['controller'] = $this;
        $login_info = $this->customlib->userdetail();
        
        $data['project_list'] = $this->Project->get_project();
        
        $data['login_info'] = $login_info;
        $data['topbar'] = "Add Bank Guarantee";

        $this->load->view('layout/Admin/header', $data);
        $this->load->view('layout/Admin/sidebar', $data);
        $this->load->view('Admin/bg_add', $data);
        $this->load->view('layout/Admin/footer', $data);
    }

}
