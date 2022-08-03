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
        $data['order_types'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 2, 'order_by', 'ASC');
        $data['delivery_types'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 1, 'order_by', 'ASC');


        if ($this->session->userdata('type') > 1  && $this->session->userdata('type') < 4) {
            $data['customers'] =  $this->CommonModel->get_customer_list_by_vendor(null,  $this->session->userdata('vendor_id'), null, $this->session->userdata('company_id'));
        } else if ($this->session->userdata('type') < 8) {
            $data['customers'] = $this->CommonModel->get_customer_list_by_vendor(null, $this->session->userdata('vendor_id'));
        } else {
            $data['customers'] = null;
        }

        $data['products'] = $this->CommonModel->get_data_list_by_single_column('nso_master_stock', 'vendor_id', $this->session->userdata('vendor_id'), 'product_name', 'ASC');
        $data['mainContent'] = $this->load->view('admin/action/order.php', $data, true);
        $this->load->view(templete_type($this->session->userdata('type')), $data);
    }

    public function order_submit()
    {
        if (isPostBack()) {
            $item = json_decode($this->input->post('item'));
            $generalsData['transectionId'] = $transectionId = time();
            $generalsData['order_type'] = $item->order_type;
            $generalsData['date'] = date('Y-m-d');
            $generalsData['userId'] = $this->session->userdata('userId');
            $generalsData['vendor_id'] = $vendor_id = $this->session->userdata('vendor_id');
            $generalsData['customer'] = $item->customer;
            $generalsData['delivery_type'] =  $item->delivery_type;
            $generalsData['delivery_date'] = $item->delivery_date;
            $generalsData['pickup_date'] = $item->pickup_date;
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
                if ($total_piece[$i] > 0) {
                    $product_info = $this->CommonModel->get_single_data_by_many_columns('nso_master_stock', array('master_stock_id' => $productId, 'vendor_id' => $vendor_id));

                    $ledger_item['generalsId'] = $generalId;
                    $ledger_item['transectionId'] = $transectionId;
                    $ledger_item['productId'] =  $productId;
                    $ledger_item['unit_price'] = $unit_price = $product_info->rental_price;
                    $ledger_item['quantity'] = $quantity = $total_piece[$i];
                    $ledger_item['rental_type'] = $product_info->rental_type;
                    $ledger_item['total'] = $unit_price *  $quantity;

                    $ledger[] = $ledger_item;
                }
                $i++;
            }

            // dumpVar($ledger);

            $this->CommonModel->insert_batch('nso_generalledger', $ledger);
            echo  $generalId;
        }
    }

    public function order_edit($transectionId)
    {
        $data['title'] = "Modify Order";
        $data['order'] = $this->CommonModel->get_single_data_by_single_column('nso_generals', 'transectionId', $transectionId);
        $data['order_types'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 2, 'order_by', 'ASC');
        $data['delivery_types'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 1, 'order_by', 'ASC');
        $data['products'] = $this->CommonModel->get_data_list_by_single_column('nso_master_stock', 'vendor_id', $this->session->userdata('vendor_id'), 'product_name', 'ASC');
        $data['mainContent'] = $this->load->view('admin/action/order_edit.php', $data, true);
        $this->load->view(templete_type($this->session->userdata('type')), $data);
    }

    public function order_modify($transectionId)
    {
        if (isPostBack()) {
            $this->db->trans_start();
            $item = json_decode($this->input->post('item'));
            $transectionId = $item->transectionId;
            $vendor_id = $this->session->userdata('vendor_id');
            $generalsData['order_type'] = $item->order_type;
            $generalsData['delivery_type'] =  $item->delivery_type;
            $generalsData['delivery_date'] = $item->delivery_date;
            $generalsData['pickup_date'] = $item->pickup_date;

            $generalId = $this->CommonModel->update_data('nso_generals', $generalsData, 'transectionId', $transectionId);

            $product_list = $item->product_list;
            $total_piece = $item->total_piece;

            $deleted_Value =  $this->CommonModel->get_data_list_by_single_column('nso_generalledger', 'transectionId', $transectionId);
            $this->CommonModel->delete_data('nso_generalledger', 'transectionId', $transectionId);
            $deleted_data['type'] = 'ledgers_update';
            $deleted_data['from_table'] = 'nso_generalledger';
            $deleted_data['value1'] =  json_encode($deleted_Value);
            $deleted_data['deleted_by'] = $this->session->userdata('userId');
            $this->CommonModel->insert_data('nso_deleted_data', $deleted_data);


            $i = 0;
            foreach ($product_list as $productId) {
                if ($total_piece[$i] > 0) {
                    $product_info = $this->CommonModel->get_single_data_by_many_columns('nso_master_stock', array('master_stock_id' => $productId, 'vendor_id' => $vendor_id));

                    $ledger_item['generalsId'] = $generalId;
                    $ledger_item['transectionId'] = $transectionId;
                    $ledger_item['productId'] =  $productId;
                    $ledger_item['unit_price'] = $unit_price = $product_info->rental_price;
                    $ledger_item['quantity'] = $quantity = $total_piece[$i];
                    $ledger_item['rental_type'] = $product_info->rental_type;
                    $ledger_item['total'] = $unit_price *  $quantity;

                    $ledger[] = $ledger_item;
                }
                $i++;
            }
            $this->CommonModel->insert_batch('nso_generalledger', $ledger);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                exception("An unexpected error has occurred. This action cannot be completed.!!");
            } else {
                $this->db->trans_commit();
                echo  $generalId;
            }
        }
    }



    public function orders()
    {
        $data['title'] = "Orders";
        $data['order_types'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 2, 'order_by', 'ASC');
        // $data['customers'] = $this->CommonModel->get_customer_list_by_vendor($this->session->userdata('userId'), $this->session->userdata('vendor_id'));
        // $data['customers'] =  $this->CommonModel->get_customer_list_by_vendor(null,  $this->session->userdata('vendor_id'),  $this->session->userdata('userId'));
        if ($this->session->userdata('type') > 1  && $this->session->userdata('type') < 4) {
            $data['customers'] =  $this->CommonModel->get_customer_list_by_vendor(null,  $this->session->userdata('vendor_id'), null, $this->session->userdata('company_id'));
        } else if ($this->session->userdata('type') < 8) {
            $data['customers'] = $this->CommonModel->get_customer_list_by_vendor(null, $this->session->userdata('vendor_id'));
        } else {
            $data['customers'] = null;
        }
        $data['mainContent'] = $this->load->view('admin/action/orders.php', $data, true);
        $this->load->view(templete_type($this->session->userdata('type')), $data);
    }

    public function fetch_orders()
    {
        if (isPostBack()) {
            $item = json_decode($this->input->post('item'));

            if ($this->session->userdata('access_type') > 4) {
                $customer =  ($item->customer == 0) ? null : $item->customer;
            } else {
                $customer =  $this->session->userdata('company_id');
            }


            $order_type =  $item->order_type;
            $transectionId =  $item->transectionId;
            $purchase_order_number =  $item->purchase_order_number;
            $order_status =  ($item->order_status == 0) ? null : $item->order_status;
            $vendor_id =  $this->session->userdata('vendor_id');

            $orders = $this->CommonModel->get_order_list_by_company_id($order_type, $order_status, $vendor_id, $customer,  $transectionId, $purchase_order_number);

            echo json_encode($orders);
        }
    }

    public function fetch_single_order($transectionId)
    {
        $ledgers = $this->CommonModel->get_data_list_by_single_column('nso_generalledger', 'transectionId', $transectionId);
        echo json_encode($ledgers);
    }

    public function change_order_status()
    {
        if (isPostBack()) {
            $postBackData['order_status'] = $this->input->post('order_new_status');
            $orders = $this->input->post('orders');
            foreach ($orders as $order_id) {
                $this->CommonModel->update_data('nso_generals', $postBackData, 'generalId', $order_id);
            }
            echo 1;
        } else {
            echo 0;
        }
    }

    public function invoice_email($transectionId)
    {
        $invoice = $this->CommonModel->get_single_invoice_detail($transectionId);
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
}
