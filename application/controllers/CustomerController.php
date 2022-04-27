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
        $data['customers'] = $this->CommonModel->get_data_list_by_single_column('nso_user', 'updatedBy', $this->session->userdata('userId'), 'firstName', 'ASC');
        $data['mainContent'] = $this->load->view('admin/customer/customer_list.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function customer_add()
    {
        if (isPostBack()) {
            $custom_details['trading_name'] = $postBackData['firstName'] = $this->input->post('trading_name');
            $custom_details['legal_name'] = $this->input->post('legal_name');
            $custom_details['abn'] = $this->input->post('abn');
            $custom_details['customer_code'] = $this->input->post('customer_code');
            $custom_details['gl_code'] = $this->input->post('gl_code');
            $custom_details['business_email'] = $postBackData['email'] =  $this->input->post('business_email');
            $custom_details['business_phone'] = $postBackData['phone'] =  $this->input->post('business_phone');
            $custom_details['cusotmer_status'] = $this->input->post('cusotmer_status');
            $custom_details['customer_group'] = $this->input->post('customer_group');
            $custom_details['delivery_add_line_1'] = $this->input->post('delivery_add_line_1');
            $custom_details['delivery_add_line_2'] = $this->input->post('delivery_add_line_2');
            $custom_details['delivery_suburb'] = $this->input->post('delivery_suburb');
            $custom_details['delivery_state'] = $this->input->post('delivery_state');
            $custom_details['delivery_postcode'] = $this->input->post('delivery_postcode');
            $custom_details['billing_add_line_1'] = $this->input->post('billing_add_line_1');
            $custom_details['billing_add_line_2'] = $this->input->post('billing_add_line_2');
            $custom_details['billing_suburb'] = $this->input->post('billing_suburb');
            $custom_details['billing_state'] = $this->input->post('billing_state');
            $custom_details['billing_postcode'] = $this->input->post('billing_postcode');

            $postBackData['type'] = 1;
            $postBackData['rawPass'] = $rawPass = rand(100000, 999999);
            $postBackData['password'] = md5($rawPass);
            $postBackData['custom_details'] = json_encode($custom_details);
            $postBackData['updatedBy'] = $this->session->userdata('userId');

            $this->CommonModel->insert_data('nso_user', $postBackData);
            message('Your request has added successfully!...');
            redirect(base_url('customers'));
        }
        $data['title'] = "Add New Customer";
        $data['mainContent'] = $this->load->view('admin/customer/customer_add.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function customer_edit($customer_id)
    {
        if (isPostBack()) {
            $custom_details['trading_name'] = $postBackData['firstName'] = $this->input->post('trading_name');
            $custom_details['legal_name'] = $this->input->post('legal_name');
            $custom_details['abn'] = $this->input->post('abn');
            $custom_details['customer_code'] = $this->input->post('customer_code');
            $custom_details['gl_code'] = $this->input->post('gl_code');
            $custom_details['business_email'] = $postBackData['phone'] =  $this->input->post('business_email');
            $custom_details['business_phone'] = $postBackData['email'] =  $this->input->post('business_phone');
            $custom_details['customer_status'] = $postBackData['status'] = $this->input->post('customer_status');
            $custom_details['customer_group'] = $this->input->post('customer_group');
            $custom_details['delivery_add_line_1'] = $this->input->post('delivery_add_line_1');
            $custom_details['delivery_add_line_2'] = $this->input->post('delivery_add_line_2');
            $custom_details['delivery_suburb'] = $this->input->post('delivery_suburb');
            $custom_details['delivery_state'] = $this->input->post('delivery_state');
            $custom_details['delivery_postcode'] = $this->input->post('delivery_postcode');
            $custom_details['billing_add_line_1'] = $this->input->post('billing_add_line_1');
            $custom_details['billing_add_line_2'] = $this->input->post('billing_add_line_2');
            $custom_details['billing_suburb'] = $this->input->post('billing_suburb');
            $custom_details['billing_state'] = $this->input->post('billing_state');
            $custom_details['billing_postcode'] = $this->input->post('billing_postcode');

            $postBackData['custom_details'] = json_encode($custom_details);
            $postBackData['updatedBy'] = $this->session->userdata('userId');

            $this->CommonModel->update_data('nso_user', $postBackData, 'userId', $customer_id);
            message('Your request has updated successfully!...');
            redirect(base_url('customer_edit/' . $customer_id));
        }
        $data['title'] = "Edit Customer";
        $data['customer'] = $customer = $this->CommonModel->get_single_data_by_single_column('nso_user', 'userId', $customer_id);
        $data['custom_details'] = json_decode($customer->custom_details);
        $data['mainContent'] = $this->load->view('admin/customer/customer_edit.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }
}
