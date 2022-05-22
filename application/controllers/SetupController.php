<?php

defined('BASEPATH') or exit('No direct script access allowed');

class SetupController extends CI_Controller
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

    // Call Back function from insertProduct 
    function set_upload_options($dir)
    {
        // upload an image options
        $config = array();
        $config['upload_path'] = $dir; //give the path to upload the image in folder
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE; // for encrypting the name
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '*';
        $config['overwrite'] = FALSE;
        return $config;
    }

    public function registereduser()
    {
        $data['title'] = "User List";
        $data['users'] = $this->CommonModel->get_data_list('nso_forms', 'createdAt', 'DESC');
        $data['mainContent'] = $this->load->view('admin/setup/user_list.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }





    public function products()
    {
        $data['title'] = 'Products';
        $data['products'] = $this->CommonModel->get_data_list('nso_frames', 'frame_id', 'ASC');
        $data['mainContent'] = $this->load->view('admin/product/list.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function transections()
    {
        $data['title'] = 'Payment';
        $data['generals'] = $this->CommonModel->get_data_list('nso_payment', 'createdAt', 'DESC');
        $data['mainContent'] = $this->load->view('admin/transection/list.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function transection($transection_id)
    {
        $data['title'] = 'Transection';
        $data['general'] = $this->CommonModel->get_single_data_by_single_column('nso_generals', 'generalId', $transection_id);
        $data['ledger'] = $this->CommonModel->get_data_list_by_single_column('nso_generalledger', 'generalsId', $transection_id);
        $data['mainContent'] = $this->load->view('admin/transection/view.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function inbox()
    {
        $data['title'] = 'Inbox';
        $data['messages'] = $this->CommonModel->get_data_list('nso_inbox', 'created_at', 'DESC');
        $data['mainContent'] = $this->load->view('admin/message_list.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function change_password()
    {
        if (isPostBack()) {
            $userId = $this->session->userdata('userId');
            $user = $this->CommonModel->get_single_data_by_single_column('nso_user', 'userId', $userId);

            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');
            $repeat_password = $this->input->post('repeat_password');

            if ($new_password != $repeat_password) {
                exception('New Password and Repeat Password are not matching');
                redirect('setting/password');
            }

            if (md5($old_password) != $user->password) {
                exception('Current Password is not matched');
                redirect('setting/password');
            }

            $postBackData['password'] = md5($new_password);
            $this->CommonModel->update_data('nso_user', $postBackData, 'userId', $userId);

            message("Password has updated successfully!!");
            redirect(base_url('setting/password'));
        }
        $data['title'] = 'Password';
        $data['mainContent'] = $this->load->view('admin/setup/change_password.php', $data, true);
        $this->load->view(templete_type($this->session->userdata('type')), $data);
    }



    public function setting_user()
    {
        if (isPostBack()) {
            $this->db->trans_start();
            $postBackData['firstName'] = $this->input->post('firstName');
            $postBackData['lastName'] = $this->input->post('lastName');
            $postBackData['phone'] = $this->input->post('phone');
            $postBackData['email'] = $this->input->post('email');
            $postBackData['address'] = $this->input->post('address');
            $postBackData['address_line_2'] = $this->input->post('address_line_2');
            $postBackData['city'] = $this->input->post('city');
            $postBackData['state'] = $this->input->post('state');
            $postBackData['country'] = $this->input->post('country');
            $postBackData['zip'] = $this->input->post('zip');
            $postBackData['updatedBy'] = $this->session->userdata('userId');

            $this->CommonModel->update_data('nso_user', $postBackData, 'userId', $this->session->userdata('userId'));
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                exception("An unexpected error has occurred. Your try again later!!");
            } else {
                $this->db->trans_commit();
                message(" Item has updated successfully!!");
            }
            redirect(base_url('setting/user'));
        }
        $data['title'] = 'My Profile';
        $data['user'] = $this->CommonModel->get_single_data_by_single_column('nso_user', 'userId', $this->session->userdata('userId'));
        $data['mainContent'] = $this->load->view('admin/setup/setting_user.php', $data, true);
        $this->load->view(templete_type($this->session->userdata('type')), $data);
    }

    public function setting_vendor()
    {
        if (isPostBack()) {
            $postBackData['trading_name'] = $this->input->post('trading_name');
            $postBackData['legal_name'] = $this->input->post('legal_name');
            $postBackData['abn'] = $this->input->post('abn');
            $postBackData['gl_code'] = $this->input->post('gl_code');
            $postBackData['business_phone'] = $this->input->post('business_phone');
            $postBackData['business_email'] = $this->input->post('business_email');
            $postBackData['billing_add_line_1'] = $this->input->post('billing_add_line_1');
            $postBackData['billing_add_line_2'] = $this->input->post('billing_add_line_2');
            $postBackData['billing_suburb'] = $this->input->post('billing_suburb');
            $postBackData['billing_state'] = $this->input->post('billing_state');
            $postBackData['billing_country'] = $this->input->post('billing_country');
            $postBackData['billing_postcode'] = $this->input->post('billing_postcode');


            $postBackData['updated_by'] = $this->session->userdata('userId');

            $this->CommonModel->update_data('nso_vendors', $postBackData, 'vendor_id', $this->session->userdata('vendor_id'));
            message(" Item has updated successfully!!");
            redirect(base_url('setting/vendor'));
        }
        $data['title'] = 'Vendor Setting';
        $data['vendor'] = $this->CommonModel->get_single_data_by_single_column('nso_vendors', 'vendor_id', $this->session->userdata('vendor_id'));
        $data['mainContent'] = $this->load->view('admin/setup/setting_vendor.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function setting_company()
    {
        if (isPostBack()) {
            $this->db->trans_start();
            $postBackData['company_name'] = $this->input->post('company_name');
            $postBackData['slogan'] = $this->input->post('slogan');
            $postBackData['phone'] = $this->input->post('phone');
            $postBackData['email'] = $this->input->post('email');
            $postBackData['website'] = $this->input->post('website');
            $postBackData['address'] = $this->input->post('address');
            $postBackData['facebook'] = $this->input->post('facebook');
            $postBackData['twitter'] = $this->input->post('twitter');
            $postBackData['instagram'] = $this->input->post('instagram');
            $postBackData['linkedin'] = $this->input->post('linkedin');
            $postBackData['pinterest'] = $this->input->post('pinterest');

            $this->CommonModel->update_data('nso_sysconfig', $postBackData, 'id', 1);
            $this->db->trans_complete();

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                exception("An unexpected error has occurred. Your try again later!!");
            } else {
                $this->db->trans_commit();
                message(" Item has updated successfully!!");
                redirect(base_url('setting/company'));
            }
        }
        $data['title'] = 'Company Setting';
        $data['sysConf'] = $this->CommonModel->get_single_data_by_single_column('nso_sysconfig', 'id', 1);
        $data['mainContent'] = $this->load->view('admin/setup/setting_company.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }



    public function user_access()
    {
        $data['title'] = "User Access";
        $data['mainContent'] = $this->load->view('admin/setup/setting_user_access.php', $data, true);
        $this->load->view('admin_master_templete', $data);
    }

    public function get_user_access_list()
    {
        if (isPostBack()) {
            $user_access_list = $this->CommonModel->get_user_vendor_list($this->session->userdata('vendor_id'));
            echo json_encode($user_access_list);
        }
    }

    public function add_user_access()
    {
        if (isPostBack()) {
            $postBackData['status'] = $vendor_access['status'] = 1;
            $postBackData['type'] = $vendor_access['access_type'] = $this->input->post('type');

            $postBackData['firstName'] = $this->input->post('firstName');
            $postBackData['lastName'] = $this->input->post('lastName');
            $postBackData['email'] = $postBackData['username'] =  $this->input->post('email');
            $postBackData['phone'] = $this->input->post('phone');
            $postBackData['created_by'] = $this->session->userdata('userId');
            $postBackData['updatedBy'] = $this->session->userdata('userId');
            $postBackData['rawPass'] = $rawPass = rand(100000, 999999);
            $postBackData['password'] = md5($rawPass);

            $vendor_access['user_id'] = $this->CommonModel->insert_data('nso_user', $postBackData);
            $vendor_access['vendor_id'] =  $this->session->userdata('vendor_id');

            echo $this->CommonModel->insert_data('nso_user_vendor_access', $vendor_access);
        }
    }

    public function update_user_access()
    {
        if (isPostBack()) {
            // dumpVar($_POST);
            $user_id = $this->input->post('user_id');
            $postBackData['firstName'] = $this->input->post('firstName');
            $postBackData['lastName'] = $this->input->post('lastName');
            $postBackData['email'] = $postBackData['username'] =  $this->input->post('email');
            $postBackData['phone'] = $this->input->post('phone');
            $postBackData['updatedBy'] = $this->session->userdata('userId');

            echo $this->CommonModel->update_data('nso_user', $postBackData, 'userId', $user_id);
        }
    }

    public function delete_row($type, $id)
    {
        $this->db->trans_start();
        $deleted_data['type'] = $type;
        $deleted_data['deleted_id'] = $id;

        switch ($type) {
            case 'reg_user':
                $deleted_data['from_table'] = 'nso_forms';
                $deleted_Value = $this->CommonModel->get_single_data_by_single_column('nso_forms', 'form_id', $id);
                $check_exist_group_creator = $this->CommonModel->get_single_data_by_single_column('nso_group', 'formId', $id);
                $check_exist_group_partner = $this->CommonModel->get_single_data_by_single_column('nso_group', 'partner_id', $id);

                if (empty($check_exist_group_creator) && empty($check_exist_group_partner)) {
                    $this->CommonModel->delete_data('nso_forms', 'form_id', $id);
                    $message = "User deleted successfully !!";
                } else {
                    $exception = "The user is already in a group. Can't be deleted";
                }
                $redirect = 'admin/registereduser';
                break;
            case 'asset':
                $deleted_data['from_table'] = 'nso_allsetup';
                $deleted_Value = $this->CommonModel->get_single_data_by_single_column('nso_allsetup', 'unitId', $id);

                $this->CommonModel->delete_data('nso_allsetup', 'unitId', $id);
                $message = "Asset deleted successfully !!";
                $redirect = 'admin/assets';
                break;
            case 'image':
                $deleted_data['from_table'] = 'nso_images';
                $deleted_Value = $this->CommonModel->get_single_data_by_single_column('nso_images', 'image_id', $id);

                $this->CommonModel->delete_data('nso_images', 'image_id', $id);
                $message = "Image deleted successfully !!";
                $redirect = 'admin';
                break;
            case 'product':
                $deleted_data['from_table'] = 'nso_product';
                $deleted_Value = $this->CommonModel->get_single_data_by_single_column('nso_product', 'pro_id', $id);

                $this->CommonModel->delete_data('nso_product', 'pro_id', $id);
                $message = "Product deleted successfully !!";
                $redirect = 'admin/products';
                break;
            case 'customer':
                $deleted_data['from_table'] = 'nso_user';
                $deleted_Value = $this->CommonModel->get_single_data_by_single_column('nso_user', 'userId', $id);

                $this->CommonModel->delete_data('nso_user', 'userId', $id);
                $message = "Customer has deleted successfully !!";
                $redirect = 'customers';
                break;
            default:
                $deleted_Value = 'NULL';
                $exception = "Your request has invalid! Please try again";
                $redirect = 'admin';
        }

        $deleted_data['value1'] =  json_encode($deleted_Value);
        $deleted_data['deleted_by'] = $this->session->userdata('userId');
        $this->CommonModel->insert_data('nso_deleted_data', $deleted_data);
        $this->db->trans_complete();


        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            exception("An unexpected error has occurred. This action cannot be completed.!!");
        } else {
            $this->db->trans_commit();
            if (!empty($message)) {
                message($message);
            } else {
                exception($exception);
            }

            redirect(base_url($redirect));
        }
    }
}
