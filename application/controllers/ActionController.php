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

    public function order_submit()
    {
        if (isPostBack()) {
            $item = json_decode($this->input->post('item'));
            $generalsData['transectionId'] = $transectionId = time();
            $generalsData['formId'] = 2;
            $generalsData['date'] = date('Y-m-d');
            $generalsData['userId'] = $this->session->userdata('userId');
            $generalsData['customer'] = $item->customer;
            $generalsData['delivery_type'] =  $item->delivery_type;
            $generalsData['delivery_date'] = $item->delivery_date;
            $generalsData['purchase_order_number'] = $item->purchase_order_number;
            $generalsData['payment_type'] = 4;
            $generalsData['payment_status'] = 1;
            $generalsData['order_status'] = 1;
            $generalsData['invoice_status'] = 1;

            $generalId = $this->CommonModel->insert_data('nso_generals', $generalsData);

            $product_list = $item->product_list;
            $total_piece = $item->total_piece;


            $i = 0;
            foreach ($product_list as $productId) {
                $product_info = $this->CommonModel->get_single_data_by_many_columns('nso_master_stock', array('master_stock_id' => $productId, 'user_id' => $this->session->userdata('userId')));

                $ledger_item['generalsId'] = $generalId;
                $ledger_item['transectionId'] = $transectionId;
                $ledger_item['productId'] =  $productId;
                $ledger_item['unit_price'] = $unit_price = $product_info->rental_price;
                $ledger_item['quantity'] = $quantity = $total_piece[$i];
                $ledger_item['rental_type'] = $product_info->rental_type;
                $ledger_item['total'] = $unit_price *  $quantity;

                $ledger[] = $ledger_item;
                $i++;
            }

            // dumpVar($ledger);

            $this->CommonModel->insert_batch('nso_generalledger', $ledger);
            echo  $generalId;
        }
    }

    public function fetch_orders()
    {
        if (isPostBack()) {
            $item = json_decode($this->input->post('item'));
            $where['userId'] =  $this->session->userdata('userId');
            $where['customer'] =  $item->customer;
            $where['order_status'] =  $item->order_status;

            if (!empty($item->order_id)) {
                $where['transectionId'] =  $item->order_id;
            }
            $orders = $this->CommonModel->get_data_list_by_multiple_columns('nso_generals', '*', $where, 'created_at', 'DESC');

            echo json_encode($orders);
        }
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
        $data['customers'] = $this->CommonModel->get_data_list_by_many_columns('nso_user', array('type' => 1, 'updatedBy' => $this->session->userdata('userId')), 'firstName', 'ASC');
        $data['mainContent'] = $this->load->view('admin/action/orders.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }
}
