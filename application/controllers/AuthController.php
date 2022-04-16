<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{
    static $helper   = array('user_helper');
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model', 'CommonModel');
        $this->load->library('cart');
        $this->load->helper(self::$helper);
        $this->system_config = $this->CommonModel->get_single_data_by_single_column('nso_sysconfig', 'id', 1);
    }

    public function login()
    {
        if (isPostBack()) {
            $postBackData['form_type'] = 1;
            $postBackData['email'] =  $this->input->post('email');
            $postBackData['password'] = md5($this->input->post('password'));

            $check_exist = $this->CommonModel->existing_check('nso_forms', $postBackData);

            // dumpVar($this->session->set_userdata('userId', $check_exist->form_id));

            if (!empty($check_exist)) {
                $this->session->set_userdata('userId', $check_exist->form_id);
                $this->session->set_userdata('name', $check_exist->firstName . " " . $check_exist->lastName);
                $this->session->set_userdata('email', $check_exist->email);
                $this->session->set_userdata('confEvent', $check_exist->confEvent);
                $this->session->set_userdata('loginTime', time());
                redirect(base_url('dashboard'));
            } else {
                exception("Credential doesn't match. Please try again");
                redirect(base_url('login'));
            }
        }
        $data['title'] = "Login";
        $data['mainContent'] = $this->load->view('frontend/login.php', $data, true);
        $this->load->view('frontend_master_templete', $data);
    }

    public function register()
    {
        if (isPostBack()) {
            $postBackData['type'] = 1;
            $postBackData['firstName'] = $this->input->post('firstname');
            $postBackData['email'] = $email = $this->input->post('email');
            $postBackData['password'] = md5($this->input->post('password'));
            $postBackData['rawPass'] = $this->input->post('password');

            $check_exist = $this->CommonModel->get_single_data_by_single_column('nso_user', 'email', $email);
            if (!empty($check_exist)) {
                exception("Email already exists!!!");
                redirect(base_url('register'));
            } else {
                $this->CommonModel->insert_data('nso_user', $postBackData);
                message("Registered successfully! Please login");
                redirect(base_url('login'));
            }
        }
        $data['title'] = "Register Now";
        $data['mainContent'] = $this->load->view('frontend/register.php', $data, true);
        $this->load->view('frontend_master_templete', $data);
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url('login'));
    }
}
