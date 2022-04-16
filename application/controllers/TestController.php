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
    }
}
