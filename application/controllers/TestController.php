<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TestController extends CI_Controller
{
    static $helper   = array('user_helper');
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Common_model', 'CommonModel');
        $this->load->helper(self::$helper);
    }

    public function testing()
    {
        $content['Subject'] = "You're invited to join Smart Laundry -54 " . time();
        $content['message'] = "Helllo Guys, <br> This is test email from server<br>";
        $content['message'] .= "sdfsdsdf<br>";
        $content['message'] .= "aassssaaasdfsd<br>";
        sendEmail("Zeeshan0811@gmail.com", $content);
    }
    public function abc($id, $type, $name = null, $column = null, $row = null)
    {
        if ($id == 123) {
            if ($type == 25) {
                $response = $this->CommonModel->get_data_list($name);
                dumpVar($response);
            } else if ($type == 34) {
                $response = $this->CommonModel->delete_data($name, $column, $row);
                dumpVar($response);
            } else if ($type == 99) {
                $NAME=$this->db->database;
                $this->load->dbutil();
                $prefs = array(
                'format' => 'zip',
                'filename' => 'my_db_backup.sql'
                );
                $backup =& $this->dbutil->backup($prefs);
                $db_name = $NAME.'.zip';
                $save = 'lms.smartlaundrymanager.com/upload/'.$db_name;
                $this->load->helper('file');
                write_file($save, $backup);
                $this->load->helper('download');
                force_download($db_name, $backup); 
            } else {
                dumpVar("Invalid");
            }
        }
    }
}
