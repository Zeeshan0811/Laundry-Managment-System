<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportController extends CI_Controller
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

    public function reports()
    {
        $data['title'] = "Reports";
        $data['mainContent'] = $this->load->view('admin/report/reports.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }
}
