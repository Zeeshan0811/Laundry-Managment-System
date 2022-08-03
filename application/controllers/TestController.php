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
        $content['Subject'] = "You're invited to join Smart Laundry -54 ". time();
        $content['message'] = "Helllo Guys, <br> This is test email from server<br>";
        $content['message'] .= "sdfsdsdf<br>";
        $content['message'] .= "aassssaaasdfsd<br>";
        sendEmail("Zeeshan0811@gmail.com", $content);
    }
}
