<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProductController extends CI_Controller
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
    }


    public function products()
    {
        $data['title'] = "Product List";
        $data['products'] = $this->CommonModel->get_product(null, null, null, null, 'createdAt', 'DESC');
        // dumpVar($data);
        $data['mainContent'] = $this->load->view('admin/product/list.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function product_add()
    {
        $productOrgId = $this->db->count_all_results('nso_product') + 1;
        $productId = rand(10, 99) . str_pad($productOrgId, 5, "0", STR_PAD_LEFT);

        if (isPostBack()) {
            $postBackData['date'] = date("Y-m-d");;
            $postBackData['productId'] = $productId;
            // $postBackData['pro_type'] = $this->input->post('pro_type');
            $postBackData['pro_category'] = $this->input->post('pro_category');
            $postBackData['formulationId'] = $this->input->post('formulationId');
            $postBackData['brandName'] = $brandName = $this->input->post('brandName');
            $postBackData['pro_genericId'] = $this->input->post('pro_genericId');
            $postBackData['pro_company'] = $this->input->post('pro_company');
            $postBackData['pro_weight'] = $this->input->post('pro_weight');

            $postBackData['salesPrice'] = $this->input->post('salesPrice');
            $postBackData['discount'] = $this->input->post('discount') ?: 0;
            $postBackData['cardPrice'] = $this->input->post('cardPrice') ?: $this->input->post('salesPrice');

            $postBackData['pro_information'] = $this->input->post('pro_information');
            $postBackData['meta_description'] = $this->input->post('meta_description');
            $postBackData['meta_keywords'] = $this->input->post('meta_keywords');
            $postBackData['image'] = json_encode($this->input->post('pro_images'));
            $postBackData['visiblity'] = 1;
            $postBackData['availability'] = 1;
            $postBackData['uri'] = uri_generator('nso_product', 'pro_id', 'uri', $brandName);

            $this->CommonModel->insert_data('nso_product', $postBackData);
            message("Item has added successfully!!");
            redirect(base_url('admin/product_add'));
        }

        $data['title'] = "Add Product";
        $data['productId'] = $productId;
        $data['types'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 25, 'title', 'ASC');
        $data['categories'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 24, 'title', 'ASC');
        $data['formulations'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 1, 'title', 'ASC');
        $data['generics'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 8, 'title', 'ASC');
        $data['manufacturers'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 15, 'title', 'ASC');
        $data['importers'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 16, 'title', 'ASC');
        $data['mainContent'] = $this->load->view('admin/product/add.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function product_edit($pro_id)
    {
        if (isPostBack()) {
            // $postBackData['pro_type'] = $this->input->post('pro_type');
            $postBackData['pro_category'] = $this->input->post('pro_category');
            $postBackData['formulationId'] = $this->input->post('formulationId');
            $postBackData['brandName'] = $brandName = $this->input->post('brandName');
            $postBackData['pro_genericId'] = $this->input->post('pro_genericId');
            $postBackData['pro_company'] = $this->input->post('pro_company');
            $postBackData['pro_weight'] = $this->input->post('pro_weight');
            $postBackData['salesPrice'] = $this->input->post('salesPrice');
            $postBackData['discount'] = $this->input->post('discount') ?: 0;
            $postBackData['cardPrice'] = $this->input->post('cardPrice') ?: $this->input->post('salesPrice');
            $postBackData['pro_information'] = $this->input->post('pro_information');
            $postBackData['meta_description'] = $this->input->post('meta_description');
            $postBackData['meta_keywords'] = $this->input->post('meta_keywords');

            $this->CommonModel->update_data('nso_product', $postBackData, 'pro_id', $pro_id);
            message("Item has updated successfully!!");
            redirect(base_url('admin/product_edit/' . $pro_id));
        }
        $data['title'] = "Edit Product";
        $data['types'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 25, 'title', 'ASC');
        $data['categories'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 24, 'title', 'ASC');
        $data['formulations'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 1, 'title', 'ASC');
        $data['generics'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 8, 'title', 'ASC');
        $data['manufacturers'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 15, 'title', 'ASC');
        $data['importers'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 16, 'title', 'ASC');

        $data['product'] = $this->CommonModel->get_single_data_by_single_column('nso_product', 'pro_id', $pro_id);
        $data['images'] = $this->CommonModel->get_data_list_by_single_column('nso_images', 'reference_id', $pro_id);
        $data['mainContent'] = $this->load->view('admin/product/edit.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }


    public function featured()
    {
        $data['title'] = "Featured Product";
        $data['products'] = $this->CommonModel->get_data_list('nso_product', 'createdAt', 'DESC');
        $data['mainContent'] = $this->load->view('admin/featured/list.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }
}
