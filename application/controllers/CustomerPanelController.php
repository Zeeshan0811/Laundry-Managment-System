<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CustomerPanelController extends CI_Controller
{
    static $helper   = array('user_helper');
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model', 'CommonModel');
        $this->load->helper(self::$helper);
        if ($this->session->userdata('userId') == null || $this->session->userdata('type') > 3) {
            redirect(base_url('access-restriction'));
        }
        $this->system_config = $this->CommonModel->get_single_data_by_single_column('nso_sysconfig', 'id', 1);
    }


    public function dashboard()
    {
        $data['title'] = "Dashboard";
        $data['mainContent'] = $this->load->view('customer/pages/dashboard.php', $data, true);
        $this->load->view('customer_panel_templete', $data);
    }

    public function orders()
    {
        $data['title'] = "Orders";
        $data['order_types'] = $this->CommonModel->get_data_list_by_single_column('nso_allsetup', 'type', 2, 'order_by', 'ASC');
        // dumpVar($this->session->userdata('company_id'));
        // $data['customers'] = $this->CommonModel->get_customer_list_by_vendor(null, $this->session->userdata('vendor_id'),  $this->session->userdata('company_id'));
        $data['customers'] = $this->CommonModel->get_customer_list_by_vendor(null,  $this->session->userdata('vendor_id'),  $this->session->userdata('userId'));
        // dumpVar($data);
        $data['mainContent'] = $this->load->view('admin/action/orders.php', $data, true);
        $this->load->view('customer_panel_templete', $data);
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
                redirect(base_url('cp/setting/user'));
            }
        }
        $data['title'] = 'My Profile';
        $data['user'] = $this->CommonModel->get_single_data_by_single_column('nso_user', 'userId', $this->session->userdata('userId'));
        $data['mainContent'] = $this->load->view('customer/setup/setting_user.php', $data, true);
        $this->load->view('customer_panel_templete', $data);
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
                redirect(base_url('cp/setting/password'));
            }

            if (md5($old_password) != $user->password) {
                exception('Current Password is not matched');
                redirect('setting/password');
                redirect(base_url('cp/setting/password'));
            }

            $postBackData['password'] = md5($new_password);
            $this->CommonModel->update_data('nso_user', $postBackData, 'userId', $userId);

            message("Password has updated successfully!!");
            redirect(base_url('cp/setting/password'));
        }
        $data['title'] = 'Password';
        $data['mainContent'] = $this->load->view('customer/setup/change_password.php', $data, true);
        $this->load->view('customer_panel_templete', $data);
    }

    public function setting_company()
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

            $this->CommonModel->update_data('nso_vendors', $postBackData, 'vendor_id', $this->session->userdata('company_id'));
            message(" Item has updated successfully!!");
            redirect(base_url('setting/vendor'));
        }
        $data['title'] = 'Comapny Setting';
        $data['vendor'] = $this->CommonModel->get_single_data_by_single_column('nso_vendors', 'vendor_id', $this->session->userdata('company_id'));
        $data['mainContent'] = $this->load->view('customer/setup/setting_vendor.php', $data, true);
        $this->load->view('customer_panel_templete', $data);
    }
}
