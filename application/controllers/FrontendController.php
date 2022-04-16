<?php

defined('BASEPATH') or exit('No direct script access allowed');

class FrontendController extends CI_Controller
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

    public function index()
    {
        $data['title'] = "Home";
        $data['products'] = $this->CommonModel->get_product(null, null, null, null, 'brandName', 'ASC');
        $data['mainContent'] = $this->load->view('frontend/index.php', $data, true);
        $this->load->view('frontend_master_templete', $data);
    }

    public function about()
    {
        $data['title'] = "About";
        $data['mainContent'] = $this->load->view('frontend/about.php', $data, true);
        $this->load->view('frontend_master_templete', $data);
    }


    public function contact()
    {
        $data['title'] = "Contact";
        $data['mainContent'] = $this->load->view('frontend/contact.php', $data, true);
        $this->load->view('frontend_master_templete', $data);
    }

    public function faq()
    {
        $data['title'] = "Frequently Asked Questions";
        $data['mainContent'] = $this->load->view('frontend/faq.php', $data, true);
        $this->load->view('frontend_master_templete', $data);
    }

    public function confirmation()
    {
        $data['booking_email'] = $booking_email = $this->session->flashdata('booking_email');

        if (!empty($booking_email)) {
            $data['title'] = "Confirmation";
            $transection_id = $this->session->flashdata('transection_id');
            $data['transection'] = $transection = $this->CommonModel->get_single_data_by_single_column('nso_transection', 'transection_id', $transection_id);
            $data['property'] = $property = $this->CommonModel->get_single_data_by_single_column('nso_pages', 'page_id', $transection->property_id);
            $data['mainContent'] = $this->load->view('frontend/confirmation.php', $data, true);
            $this->load->view('frontend_master_templete', $data);
        } else {
            redirect(base_url('error'));
        }
    }

    public function emailconfirmation()
    {
        $data['title'] = "Confirmation";
        $data['mainContent'] = $this->load->view('frontend/confirmation_email.php', $data, true);
        $this->load->view('frontend_master_templete', $data);
    }


    public function error()
    {
        $data['title'] = "Error";
        $data['mainContent'] = $this->load->view('frontend/error.php', $data, true);
        $this->load->view('frontend_master_templete', $data);
    }



    public function contactmail()
    {
        if (isPostBack()) {
            $this->db->trans_start();
            $postBackData['type'] = $this->input->post('form_type');
            $postBackData['name'] = $this->input->post('form_name');
            $postBackData['phone'] = $this->input->post('form_phone');
            $postBackData['email'] = $this->input->post('form_email');
            $postBackData['subject'] = $this->input->post('form_subject');
            $postBackData['message'] = $this->input->post('form_message');

            $this->CommonModel->insert_data('nso_inbox', $postBackData);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                redirect(base_url('error'));
            } else {
                $this->db->trans_commit();
                $this->session->set_flashdata('confirm_type', 1);
                redirect(base_url('emailconfirmation'));
            }
        }
    }
}
