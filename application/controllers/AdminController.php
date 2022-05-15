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
            $this->load->view('admin_master_templete', $data);
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

            if (!empty($userInfo)) {
                $this->session->set_userdata('userId', $userInfo->userId);
                $this->session->set_userdata('type', $userInfo->type);
                $this->session->set_userdata('username', $userInfo->username);
                $this->session->set_userdata('email', $userInfo->email);
                $this->session->set_userdata('loginTime', time());

                if ($userInfo->type > 1 && $userInfo->type < 8) {
                    $user_vendor_access = $this->CommonModel->table_info('nso_user_vendor_access', 'user_id', $userInfo->userId);
                    $this->session->set_userdata('vendor_id', $user_vendor_access->vendor_id);
                    $this->session->set_userdata('access_id', $user_vendor_access->nso_access_id);
                    $this->session->set_userdata('access_type', $user_vendor_access->access_type);
                }

                if ($userInfo->type >= 8) {
                    redirect(base_url('ma/dashboard'));
                } else {
                    redirect(base_url('admin'));
                }
            } else {
                $this->session->set_flashdata('login_msg', 'Wrong Email OR Password!');
                redirect(base_url('admin'));
            }
        } else {
            redirect(base_url('admin'));
        }
    }


    public function logout_admin()
    {
        session_destroy();
        redirect(base_url('admin'));
    }
}
