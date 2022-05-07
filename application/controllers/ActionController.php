<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ActionController extends CI_Controller
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

    public function order()
    {
        $data['title'] = "Create New Order";
        $data['delivery_types'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 1, 'order_by', 'ASC');
        $data['customers'] = $this->CommonModel->get_data_list_by_multiple_columns('nso_user', '*', array('type' => 1, 'updatedBy' => $this->session->userdata('userId')), 'firstName', 'ASC');
        $data['products'] = $this->CommonModel->get_data_list_by_single_column('nso_master_stock', 'user_id', $this->session->userdata('userId'), 'product_name', 'ASC');
        $data['mainContent'] = $this->load->view('admin/action/order.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function rental()
    {
        $data['title'] = "Create New Rental Charge";
        $data['mainContent'] = $this->load->view('admin/action/rental.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function pickup()
    {
        $data['title'] = "Create New Order";
        $data['mainContent'] = $this->load->view('admin/action/pickup.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }


    public function orders()
    {
        $data['title'] = "Orders";
        $data['mainContent'] = $this->load->view('admin/action/orders.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }
}
