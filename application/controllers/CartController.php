<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CartController extends CI_Controller
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

    public function cart()
    {
        $data['title'] = "View Cart";
        $data['cart_list'] = $this->cart->contents();
        // $data['assets'] = $this->CommonModel->get_data_list('nso_allsetup', 'created_at', 'DESC');
        $data['mainContent'] = $this->load->view('frontend/cart/view_cart.php', $data, true);
        $this->load->view('frontend_master_templete', $data);
    }

    public function add_to_cart()
    {
        if (isPostBack()) {
            // dumpVar($_POST);
            $pro_id = $this->input->post('pro_id');
            $pro_qty = $this->input->post('pro_qty');

            if ($pro_qty > 0) {
                $product = $this->CommonModel->get_product($pro_id);

                $data = array(
                    'id'      => $product->pro_id,
                    'qty'     => $pro_qty,
                    'price'   => $product->cardPrice * $pro_qty,
                    'name'    => $product->productTitle,
                    'options' => array(
                        'salesPrice' => $product->salesPrice,
                        'discount' => $product->discount,
                        'cardPrice' => $product->cardPrice
                    )
                );

                $cart_inserted = $this->cart->insert($data);

                $response['status_code'] = 1;
                $response['status'] = 'success';
                $response['message'] = 'Added To Cart';
                $response['row_id'] = $cart_inserted;
            } else {
                $response['status_code'] = 0;
                $response['status'] = 'error';
                $response['message'] = 'Something went wrong...';
            }

            echo json_encode($response);
            // echo json_encode($this->cart->contents());
        }
    }

    public function update_cart()
    {
        $data = array(
            'rowid'  => 'b99ccdf16028f015540f341130b6d8ec',
            'qty'    => 1,
            'price'  => 49.95,
            'coupon' => NULL
        );

        $this->cart->update($data);
    }

    public function viewCartProductCount()
    {
        echo $cartCount = count($this->cart->contents());
    }
}
