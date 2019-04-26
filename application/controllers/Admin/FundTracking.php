<?php

class FundTracking extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (empty($this->session->userdata('login_detail'))) {
            redirect(base_url());
        }

        $this->username = $this->session->userdata('username');
    }

    public function index() {
        $main_menu['active'] = 'FundTracking';
        $data['active'] = 'FundTracking';
        $this->session->set_userdata($main_menu);

        $data['controller'] = $this;
        $login_info = $this->customlib->userdetail();

        $data['login_info'] = $login_info;
        $data['topbar'] = "Bank Fund Tracking";

        $data['bank_list'] = $this->Bank->getbank();

        $amount_arr = array_column($data['bank_list'], 'avail_amount');
        $data['total_amount'] = array_sum($amount_arr);

        $this->load->view('layout/Admin/header', $data);
        $this->load->view('layout/Admin/sidebar', $data);
        $this->load->view('Admin/ft_index', $data);
        $this->load->view('layout/Admin/footer', $data);
    }

    public function addbank($id = NULL) {
        $data['id'] = $id;
        if (!is_null($id)) {
            $data['bank_list'] = $this->Bank->getbank($id)[0];
            $valid = 'update_bank';
        } else {
            $valid = 'add_bank';
        }

        if ($this->form_validation->run($valid) == TRUE) {
            if (!is_null($id)) {
                
                $data_ins['bank_name'] = $this->input->post('bank_name');
                $data_ins['branch_address'] = $this->input->post('branch_address');
                $data_ins['account_number'] = $this->input->post('account_number');
                $data_ins['ifsc_account'] = $this->input->post('ifsc_account');
                $data_ins['avail_amount'] = $this->input->post('avail_amount');
                $data_ins['status'] = $this->input->post('status');

                $this->Bank->update($data_ins, $id);
                $this->session->set_flashdata('msg', "Bank Account Update Successfully");
                redirect(base_url('Admin/FundTracking/addbank/'.$id));
            } else {
                
                $data_ins['bank_name'] = $this->input->post('bank_name');
                $data_ins['branch_address'] = $this->input->post('branch_address');
                $data_ins['account_number'] = $this->input->post('account_number');
                $data_ins['ifsc_account'] = $this->input->post('ifsc_account');
                $data_ins['avail_amount'] = $this->input->post('avail_amount');
                $data_ins['status'] = $this->input->post('status');
                $data_ins['create_on'] = $this->input->post('create_on');
                
                $this->Bank->add($data_ins);
                $this->session->set_flashdata('msg', "Bank Account Added Successfully");
                redirect(base_url('Admin/FundTracking/addbank'));
            }
        }

        $main_menu['active'] = 'FundTracking';
        $data['active'] = 'FundTracking';
        $this->session->set_userdata($main_menu);

        $data['controller'] = $this;
        $login_info = $this->customlib->userdetail();

        $data['login_info'] = $login_info;
        $data['topbar'] = "Bank Fund Tracking";

        $this->load->view('layout/Admin/header', $data);
        $this->load->view('layout/Admin/sidebar', $data);
        $this->load->view('Admin/ft_addbank', $data);
        $this->load->view('layout/Admin/footer', $data);
    }

}
