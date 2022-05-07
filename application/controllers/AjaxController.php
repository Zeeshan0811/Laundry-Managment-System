<?php

defined('BASEPATH') or exit('No direct script access allowed');

class AjaxController extends CI_Controller
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

    public function order_submit()
    {
        if (isPostBack()) {
            $item = json_decode($this->input->post('item'));
            $postBackData['customer'] = $this->input->post('customer');
            $postBackData['delivery'] = $this->input->post('delivery');
            $postBackData['purchase_order_number'] = $this->input->post('purchase_order_number');

            $this->CommonModel->insert_data('nso_order', $postBackData);
        }
    }


    //Add Image
    public function file_upload()
    {
        if (isPostBack()) {
            $postBackData['image_type'] =  $this->input->post('image_type');
            $postBackData['path'] = $path = $image['path'] =  $this->input->post('path');
            $postBackData['reference_id'] =  $this->input->post('reference_id');
            $postBackData['image_order'] = 0;
            $postBackData['visible'] = 1;

            $result = image_upload('file', $path);
            if (empty($result['error'])) {
                $postBackData['image'] =  $image['image'] =  $result['upload_data']['file_name'];
                $image['image_id'] = $this->CommonModel->insert_data('nso_images', $postBackData);

                echo json_encode($image);
            }
        }
    }

    // Update Image
    public function file_update()
    {
        if (isPostback()) {
            $image_id = $this->input->post('image_id');
            $postBackData['title'] =  $this->input->post('image_title');
            $postBackData['image_order'] =  $this->input->post('image_order');

            echo $this->CommonModel->update_data('nso_images', $postBackData, 'image_id', $image_id);
        }
    }
}
