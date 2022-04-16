<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AssetController extends CI_Controller
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


    public function assets()
    {
        $data['title'] = "Asset List";
        $data['assets'] = $this->CommonModel->get_data_list('nso_allsetup', 'created_at', 'DESC');
        $data['mainContent'] = $this->load->view('admin/asset/asset_list.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function asset_add()
    {
        if (isPostBack()) {
            $postBackData['type'] = $this->input->post('type');
            $postBackData['title'] = $title =  $this->input->post('title');
            $postBackData['uri'] = uri_generator('nso_allsetup', 'unitId', 'uri', $title);

            $this->CommonModel->insert_data('nso_allsetup', $postBackData);
            message("Item has added successfully!!");
            redirect(base_url('admin/asset_add'));
        }
        $data['title'] = "Asset - Add";
        $data['categories'] = $this->CommonModel->get_data_list('nso_cateogory', 'cat_title', 'ASC');
        $data['mainContent'] = $this->load->view('admin/asset/asset_add.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function asset_edit($unitId)
    {
        if (isPostBack()) {
            $postBackData['type'] = $this->input->post('type');
            $postBackData['title'] = $this->input->post('title');

            $this->CommonModel->update_data('nso_allsetup', $postBackData, 'unitId', $unitId);
            message("Item has updated successfully!!");
            redirect(base_url('admin/asset_edit/' . $unitId));
        }
        $data['title'] = "Asset - Edit";
        $data['categories'] = $this->CommonModel->get_data_list('nso_cateogory', 'cat_title', 'ASC');
        $data['asset'] = $this->CommonModel->get_single_data_by_single_column('nso_allsetup', 'unitId', $unitId);
        $data['mainContent'] = $this->load->view('admin/asset/asset_edit.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }
}
