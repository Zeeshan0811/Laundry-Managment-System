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
        // dumpVar($this->session->userdata('vendor_id'));
        $data['title'] = "Customer List";
        $where['type'] = 2;
        $where['created_by'] =  $this->session->userdata('userId');
        $data['companies'] = $this->CommonModel->get_data_list_by_multiple_columns('nso_vendors', '*', $where, 'created_at', 'DESC');
        $data['mainContent'] = $this->load->view('admin/customer/customer_list.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function company_status($vendor_id, $status)
    {
        $vendorData['vendor_status'] = $status;
        $this->CommonModel->update_data('nso_vendors', $vendorData, 'vendor_id', $vendor_id);
        redirect(base_url('customers'));
    }

    public function customer_add()
    {
        if (isPostBack()) {
            $this->db->trans_start();
            $custom_details['type'] = $postBackData['type'] = $user_vendor_access['access_type'] =  2;

            $custom_details['trading_name'] = $this->input->post('trading_name');
            $custom_details['legal_name'] = $this->input->post('legal_name');
            $custom_details['abn'] = $this->input->post('abn');
            $custom_details['customer_code'] = $this->input->post('customer_code');
            $custom_details['gl_code'] = $this->input->post('gl_code');
            $custom_details['business_email'] = $this->input->post('business_email');
            $custom_details['business_phone'] = $this->input->post('business_phone');
            $custom_details['vendor_status'] = $this->input->post('cusotmer_status');
            // $custom_details['customer_group'] = $this->input->post('customer_group');
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


            $postBackData['firstName'] = $firstName = $this->input->post('firstName');
            $postBackData['lastName'] = $lastName = $this->input->post('lastName');
            $postBackData['phone'] = $this->input->post('phone');
            $postBackData['email'] = $email = $this->input->post('email');
            $postBackData['username'] = $this->input->post('email');
            $postBackData['rawPass'] = $rawPass = rand(100000, 999999);
            $postBackData['password'] = md5($rawPass);
            $postBackData['created_by'] = $custom_details['created_by'] = $this->session->userdata('userId');
            $postBackData['updatedBy'] = $custom_details['updated_by'] =  $this->session->userdata('userId');

            $user_vendor_access['status'] = 1;
            $user_vendor_access['user_id'] =   $this->session->userdata('userId');
            $user_vendor_access['vendor_id'] =  $this->session->userdata('vendor_id');
            $user_vendor_access['customer_id'] = $this->CommonModel->insert_data('nso_user', $postBackData);
            $user_vendor_access['company_id'] = $this->CommonModel->insert_data('nso_vendors', $custom_details);
            $this->CommonModel->insert_data('nso_user_vendor_access', $user_vendor_access);


            $content['Subject'] = $firstName . ", You're invited to join Smart Laundry";
            $email_msg = "Dear " . $firstName . ",<br><br>";
            $email_msg .= "You are invited to join Smart Laundry. Your credentials to login.<br>";
            $email_msg .= "URL: " . base_url('login') . "<br>";
            $email_msg .= "Email: " . $email . "<br>";
            $email_msg .= "Password: " . $rawPass . "<br><br>";
            $email_msg .= "Any issues, please contact with support.<br><br>";
            $email_msg .= "Thank You";

            $content['message'] = $email_msg;
            sendEmail($email, $content);


            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                exception("An unexpected error has occurred. This action cannot be completed.!!");
            } else {
                $this->db->trans_commit();
                message('Your request has added successfully!...');
            }
            redirect(base_url('customers'));
        }
        $data['title'] = "Add New Customer";
        $data['mainContent'] = $this->load->view('admin/customer/customer_add.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function customer_edit($company_id)
    {
        if (isPostBack()) {
            $this->db->trans_start();
            $company_data['trading_name'] = $this->input->post('trading_name');
            $company_data['legal_name'] = $this->input->post('legal_name');
            $company_data['abn'] = $this->input->post('abn');
            $company_data['customer_code'] = $this->input->post('customer_code');
            $company_data['gl_code'] = $this->input->post('gl_code');
            $company_data['business_email'] = $this->input->post('business_email');
            $company_data['business_phone'] = $this->input->post('business_phone');
            $company_data['vendor_status'] = $this->input->post('vendor_status');
            $company_data['delivery_add_line_1'] = $this->input->post('delivery_add_line_1');
            $company_data['delivery_add_line_2'] = $this->input->post('delivery_add_line_2');
            $company_data['delivery_suburb'] = $this->input->post('delivery_suburb');
            $company_data['delivery_state'] = $this->input->post('delivery_state');
            $company_data['delivery_postcode'] = $this->input->post('delivery_postcode');
            $company_data['billing_add_line_1'] = $this->input->post('billing_add_line_1');
            $company_data['billing_add_line_2'] = $this->input->post('billing_add_line_2');
            $company_data['billing_suburb'] = $this->input->post('billing_suburb');
            $company_data['billing_state'] = $this->input->post('billing_state');
            $company_data['billing_postcode'] = $this->input->post('billing_postcode');
            $company_data['updated_by'] = $postBackData['updatedBy'] =  $this->session->userdata('userId');

            $postBackData['firstName'] = $this->input->post('firstName');
            $postBackData['lastName'] = $this->input->post('lastName');
            $postBackData['phone'] = $this->input->post('phone');
            $postBackData['email'] = $this->input->post('email');
            $customer_id = $this->input->post('customer_id');

            $this->CommonModel->update_data('nso_vendors', $company_data, 'vendor_id', $company_id);
            $this->CommonModel->update_data('nso_user', $postBackData, 'userId', $customer_id);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                exception("An unexpected error has occurred. This action cannot be completed.!!");
            } else {
                $this->db->trans_commit();
                message('Your request has updated successfully!...');
            }
            redirect(base_url('customer_edit/' . $company_id));
        }
        $data['title'] = "Edit Customer";
        $data['company'] = $this->CommonModel->get_single_data_by_single_column('nso_vendors', 'vendor_id', $company_id);
        $data['customer_company_access'] = $customer_company_access = $this->CommonModel->get_single_data_by_many_columns('nso_user_vendor_access', array('user_id' => $this->session->userdata('userId'), 'company_id' => $company_id, 'vendor_id' => $this->session->userdata('vendor_id')));
        $data['customer'] = $customer = $this->CommonModel->get_single_data_by_single_column('nso_user', 'userId', $customer_company_access->customer_id);
        // dumpVar($data);
        $data['mainContent'] = $this->load->view('admin/customer/customer_edit.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }
}
