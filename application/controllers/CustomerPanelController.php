<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CustomerPanelController extends CI_Controller
{
    static $helper   = array('user_helper');
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model', 'CommonModel');
        $this->load->helper(self::$helper);
        if ($this->session->userdata('userId') == null || $this->session->userdata('type') > 3) {
            redirect(base_url('access-restriction'));
        }
        $this->system_config = $this->CommonModel->get_single_data_by_single_column('nso_sysconfig', 'id', 1);
    }


    public function dashboard()
    {
        $data['title'] = "Dashboard";
        $data['mainContent'] = $this->load->view('customer/pages/dashboard.php', $data, true);
        $this->load->view('customer_panel_templete', $data);
    }


    public function setting_company()
    {
        if (isPostBack()) {
            $postBackData['trading_name'] = $this->input->post('trading_name');
            $postBackData['legal_name'] = $this->input->post('legal_name');
            $postBackData['abn'] = $this->input->post('abn');
            $postBackData['gl_code'] = $this->input->post('gl_code');
            $postBackData['business_phone'] = $this->input->post('business_phone');
            $postBackData['business_email'] = $this->input->post('business_email');
            $postBackData['billing_add_line_1'] = $this->input->post('billing_add_line_1');
            $postBackData['billing_add_line_2'] = $this->input->post('billing_add_line_2');
            $postBackData['billing_suburb'] = $this->input->post('billing_suburb');
            $postBackData['billing_state'] = $this->input->post('billing_state');
            $postBackData['billing_country'] = $this->input->post('billing_country');
            $postBackData['billing_postcode'] = $this->input->post('billing_postcode');


            $postBackData['updated_by'] = $this->session->userdata('userId');

            $this->CommonModel->update_data('nso_vendors', $postBackData, 'vendor_id', $this->session->userdata('company_id'));
            message(" Item has updated successfully!!");
            redirect(base_url('setting/vendor'));
        }
        $data['title'] = 'Comapny Setting';
        $data['vendor'] = $this->CommonModel->get_single_data_by_single_column('nso_vendors', 'vendor_id', $this->session->userdata('company_id'));
        $data['mainContent'] = $this->load->view('customer/setup/setting_vendor.php', $data, true);
        $this->load->view('customer_panel_templete', $data);
    }
}
