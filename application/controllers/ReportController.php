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
        $data['order_types'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 2, 'order_by', 'ASC');
        if ($this->session->userdata('type') > 1  && $this->session->userdata('type') < 4) {
            $data['customers'] =  $this->CommonModel->get_customer_list_by_vendor(null,  $this->session->userdata('vendor_id'), null, $this->session->userdata('company_id'));
        } else if ($this->session->userdata('type') < 8) {
            $data['customers'] = $this->CommonModel->get_customer_list_by_vendor(null, $this->session->userdata('vendor_id'));
        } else {
            $data['customers'] = null;
        }
        $data['mainContent'] = $this->load->view('admin/report/reports.php', $data, true);
        $this->load->view(templete_type($this->session->userdata('type')), $data);
    }

    public function view_invoice($transectionId)
    {
        $data['title'] = "Invoice";
        $data['invoice'] = $this->CommonModel->get_single_invoice_detail($transectionId);
        // dumpVar($data);
        $data['mainContent'] = $this->load->view('admin/report/invoice.php', $data, true);
        $this->load->view(templete_type($this->session->userdata('type')), $data);
    }
}
