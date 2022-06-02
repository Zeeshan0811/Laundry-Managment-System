<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AdminController extends CI_Controller
{
    static $helper   = array('user_helper');
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model', 'CommonModel');
        $this->load->helper(self::$helper);
        $this->system_config = $this->CommonModel->get_single_data_by_single_column('nso_sysconfig', 'id', 1);
    }

    public function login()
    {
        $data['title'] = "Login";
        $this->load->view('admin/login.php', $data);
    }

    public function index()
    {
        if ($this->session->userdata('userId') != null || $this->session->userdata('userId') > 0) {
            $data['title'] = "Admin Panel";
            $data['mainContent'] = $this->load->view('admin/index.php', $data, true);
            $this->load->view(templete_type($this->session->userdata('type')), $data);
        } else {
            redirect(base_url('login'));
        }
    }

    // Login Check Admin
    public function checkLogin_admin()
    {
        if (isPostBack()) {
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));

            $userInfo = $this->CommonModel->get_single_data_by_many_columns('nso_user', $data);

            // dumpVar($userInfo->type);

            if (!empty($userInfo)) {
                $this->session->set_userdata('userId', $userInfo->userId);
                $this->session->set_userdata('type', $userInfo->type);
                $this->session->set_userdata('username', $userInfo->username);
                $this->session->set_userdata('email', $userInfo->email);
                $this->session->set_userdata('loginTime', time());

                if ($userInfo->type < 4) {
                    $user_vendor_access = $this->CommonModel->table_info('nso_user_vendor_access', 'customer_id', $userInfo->userId);
                    $this->session->set_userdata('access_id', $user_vendor_access->nso_access_id);
                    $this->session->set_userdata('access_type', $user_vendor_access->access_type);
                    $this->session->set_userdata('vendor_id', $user_vendor_access->vendor_id);
                    $this->session->set_userdata('customer_id', $user_vendor_access->customer_id);
                    $this->session->set_userdata('company_id', $user_vendor_access->company_id);
                    redirect(base_url('cp/dashboard'));
                } else if ($userInfo->type > 3 && $userInfo->type < 8) {
                    $user_vendor_access = $this->CommonModel->table_info('nso_user_vendor_access', 'user_id', $userInfo->userId);
                    $this->session->set_userdata('access_id', $user_vendor_access->nso_access_id);
                    $this->session->set_userdata('vendor_id', $user_vendor_access->vendor_id);
                    $this->session->set_userdata('access_type', $user_vendor_access->access_type);
                    redirect(base_url('admin'));
                } else if ($userInfo->type >= 8) {
                    redirect(base_url('ma/dashboard'));
                } else {
                    echo "Something went wrong! Please try again...";
                }
            } else {
                $this->session->set_flashdata('login_msg', 'Wrong Email OR Password!');
                redirect(base_url('login'));
            }
        } else {
            redirect(base_url('login'));
        }
    }


    public function forget_password()
    {
        if (isPostBack()) {
            $email = $this->input->post('email');

            $check_existance = $this->CommonModel->table_info('nso_user', 'email', $email);

            if (!empty($check_existance)) {
                $new_password = time();
                $postBackData['password'] = md5($new_password);
                $postBackData['rawPass'] = $new_password;

                $this->CommonModel->update_data('nso_user', $postBackData, 'userId', $check_existance->userId);

                $content['Subject'] = $check_existance->firstName . ", Requested for a new password";
                $email_msg = "Dear " . $check_existance->firstName . ",<br><br>";
                $email_msg .= "We've set a new password. Your credentials to login.<br>";
                $email_msg .= "URL: " . base_url('login') . "<br>";
                $email_msg .= "Email: " . $check_existance->email . "<br>";
                $email_msg .= "Password: " . $new_password . "<br><br>";
                $email_msg .= "Any issues, please contact with support.<br><br>";
                $email_msg .= "Thank You";

                $content['message'] = $email_msg;
                sendEmail($email, $content);

                $this->session->set_flashdata('success_msg', 'New password has sent to your email. Please check');
            } else {
                $this->session->set_flashdata('login_msg', 'Email is not found! Please try again...');
            }
            redirect(base_url('forget-password'));
        }
        $data['title'] = "Forget Password";
        $this->load->view('admin/forget_password.php', $data);
    }


    public function logout_admin()
    {
        session_destroy();
        redirect(base_url('admin'));
    }
}
