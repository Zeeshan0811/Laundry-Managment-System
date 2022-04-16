<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CustomerController extends CI_Controller
{
    static $helper   = array('user_helper');
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Common_model', 'CommonModel');
        $this->load->helper(self::$helper);

        if ($this->session->userdata('userId') == null || $this->session->userdata('userId') < 1) {
            redirect(base_url('admin'));
        }
        $this->system_config = $this->CommonModel->get_single_data_by_single_column('nso_sysconfig', 'id', 1);
    }

    public function customers()
    {
        $data['title'] = "Customer List";
        $data['customers'] = $this->CommonModel->get_data_list('nso_customers', 'trading_name', 'ASC');
        $data['mainContent'] = $this->load->view('admin/customer/customer_list.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function customer_add()
    {
        $data['title'] = "Add New Customer";
        $data['mainContent'] = $this->load->view('admin/customer/customer_add.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }
}
