<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MasterAdminController extends CI_Controller
{
    static $helper   = array('user_helper');
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model', 'CommonModel');
        $this->load->helper(self::$helper);
        if ($this->session->userdata('userId') == null || $this->session->userdata('type') < 8) {
            redirect(base_url('access-restriction'));
        }
        $this->system_config = $this->CommonModel->get_single_data_by_single_column('nso_sysconfig', 'id', 1);
    }

    public function dashboard()
    {
        $data['title'] = "Dashboard";
        $data['mainContent'] = $this->load->view('master/pages/dashboard.php', $data, true);
        $this->load->view('master_admin_templete', $data);
    }

    public function vendors()
    {
        $data['title'] = "Vendor List";
        $data['vendors'] = $this->CommonModel->get_data_list_by_single_column('nso_vendors', 'created_by',  $this->session->userdata('userId'), 'trading_name', 'ASC');
        // dumpVar($data);
        $data['mainContent'] = $this->load->view('master/vendor/vendor_list.php', $data, true);
        $this->load->view('master_admin_templete', $data);
    }



    public function vendor_add()
    {
        if (isPostBack()) {
            $this->db->trans_start();
            // User
            $postBackData['type'] = $vendorData['type'] =  $accessData['access_type'] =  4;
            $postBackData['firstName'] = $firstName = $this->input->post('firstName');
            $postBackData['lastName'] = $this->input->post('lastName');
            $postBackData['email'] =  $postBackData['username'] = $email = $this->input->post('email');
            $postBackData['phone'] =  $this->input->post('phone');
            $postBackData['rawPass'] = $rawPass = rand(100000, 999999);
            $postBackData['password'] = md5($rawPass);

            $postBackData['updatedAt'] = $vendorData['updated_at'] =  date("Y-m-d H:i:s");
            $postBackData['updatedBy'] = $vendorData['updated_by'] =  $vendorData['created_by'] = $this->session->userdata('userId');

            $usreId = $accessData['user_id'] = $this->CommonModel->insert_data('nso_user', $postBackData);

            // Vendor Details
            $vendorData['trading_name'] = $this->input->post('trading_name');
            $vendorData['legal_name'] = $this->input->post('legal_name');
            $vendorData['abn'] = $this->input->post('abn');
            $vendorData['business_email'] = $this->input->post('business_email');
            $vendorData['business_phone'] = $this->input->post('business_phone');
            $vendorData['vendor_status'] = 1;

            $vendorId = $accessData['vendor_id'] =  $this->CommonModel->insert_data('nso_vendors', $vendorData);
            $accessData['status'] = 1;
            
            $content['Subject'] = $firstName .", You're invited to join Smart Laundry";
            $email_msg = "Dear ". $firstName .",<br><br>";
            $email_msg .= "You are invited to join Smart Laundry. Your credentials to login.<br>";
            $email_msg .= "URL: ". base_url('login') ."<br>";
            $email_msg .= "Email: ". $email ."<br>";
            $email_msg .= "Password: ". $rawPass ."<br><br>";
            $email_msg .= "Any issues, please contact with support.<br><br>";
            $email_msg .= "Thank You";
            
            $content['message'] = $email_msg;
            sendEmail($email, $content);


            $this->CommonModel->insert_data('nso_user_vendor_access', $accessData);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                exception("An unexpected error has occurred. This action cannot be completed.!!");
            } else {
                $this->db->trans_commit();
                message('Invitation has sent successfully!...');
            }

            redirect(base_url('ma/vendors'));
        }
        $data['title'] = "Add New Customer";
        $data['mainContent'] = $this->load->view('master/vendor/vendor_add.php', $data, true);
        $this->load->view('master_admin_templete', $data);
    }





    public function setting_company()
    {
        if (isPostBack()) {
            $this->db->trans_start();
            $postBackData['company_name'] = $this->input->post('company_name');
            $postBackData['slogan'] = $this->input->post('slogan');
            $postBackData['phone'] = $this->input->post('phone');
            $postBackData['email'] = $this->input->post('email');
            $postBackData['website'] = $this->input->post('website');
            $postBackData['address'] = $this->input->post('address');
            $postBackData['facebook'] = $this->input->post('facebook');
            $postBackData['twitter'] = $this->input->post('twitter');
            $postBackData['instagram'] = $this->input->post('instagram');
            $postBackData['linkedin'] = $this->input->post('linkedin');
            $postBackData['pinterest'] = $this->input->post('pinterest');

            $this->CommonModel->update_data('nso_sysconfig', $postBackData, 'id', 1);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                exception("An unexpected error has occurred. Your try again later!!");
            } else {
                $this->db->trans_commit();
                message(" Item has updated successfully!!");
                redirect(base_url('ma/setting/company'));
            }
        }
        $data['title'] = 'Company Setting';
        $data['sysConf'] = $this->CommonModel->get_single_data_by_single_column('nso_sysconfig', 'id', 1);
        $data['mainContent'] = $this->load->view('master/setup/setting_company.php', $data, true);
        $this->load->view('master_admin_templete', $data);
    }
    
    
    public function setting_images(){
        $data['title'] = 'Image Settings';
        // $data['sysConf'] = $this->CommonModel->get_single_data_by_single_column('nso_sysconfig', 'id', 1);
        $data['mainContent'] = $this->load->view('master/setup/setting_images.php', $data, true);
        $this->load->view('master_admin_templete', $data);
    }
}
