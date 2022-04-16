<?php

//session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR' & quot);
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';

    return $ipaddress;
}

if (!function_exists('notification')) {

    function notification($message) {
        $_SESSION['notification'] = $message;
    }

}
if (!function_exists('isPostBack')) {

    function isPostBack() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

}

if (!function_exists('message')) {

    function message($message) {
        
        ///echo $message;die;
        
        $_SESSION['message'] = $message;
       // echo $_SESSION['message'];die;
    }

}

if (!function_exists('exception')) {

    function exception($message) {
        $_SESSION['exception'] = $message;
    }

}
if (!function_exists('isHTTPS')) {

    function isHTTPS() {
        if (isset($_SERVER['HTTPS'])) {
            return strtolower($_SERVER['HTTPS']) == 'on';
        }
        return false;
    }

}

function insert($table, $data) {
    foreach ($data as $field => $value) {
        $fields[] = '`' . $field . '`';
        $values[] = "'" . mysql_real_escape_string($value) . "'";
    }
    $field_list = join(', ', $fields);
    $value_list = join(', ', $values);
    $query = "INSERT INTO `" . $table . "` (" . $field_list . ") VALUES (" . $value_list . ")";
    mysql_query($query) or die("Error: " . mysql_error());
    return mysql_insert_id();
}

function update($table, $data, $id_field, $id_value) {
    foreach ($data as $field => $value) {
        $fields[] = sprintf("%s = '%s'", $field, mysql_real_escape_string($value));
    }
    $field_list = join(',', $fields);
    $query = sprintf("UPDATE %s SET %s WHERE %s = '%s'", $table, $field_list, $id_field, $id_value);
    mysql_query($query) or die("Error: " . mysql_error());
}

if (!function_exists('result_array')) {

    function result_array($sql) {
        $result = array();
        $query = mysql_query($sql);
        while ($data = mysql_fetch_array($query)) {
            $result[] = $data;
        }
        $rows = count($result);
        if ($rows) {
            $total_global_rows = count($result);
            $total_inner_rows = count($result[0]);
            $count_total_inner_rows = $total_inner_rows / 2;

            for ($i = 0; $i < $total_global_rows; $i++) {
                for ($j = 0; $j < $count_total_inner_rows; $j++) {
                    unset($result[$i][$j]);
                }
            }
        }
        return $result;
    }

}
if (!function_exists('row_array')) {

    function row_array($sql) {
        $result = array();
        $query = mysql_query($sql);
        $data = mysql_fetch_assoc($query);
        return $data;
    }

}
if (!function_exists('dumpVar')) {

    function dumpVar($data) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        exit();
    }

}


if (!function_exists('get_user_id')) {

    function get_user_id() {
        if (isset($_SESSION['session_user_id'])) {
            return $_SESSION['session_user_id'];
        } else {
            return false;
        }
    }

}

function get_user_name($user_id) {
    if ($user_id == 0) {
        return "Admin";
    }
    $sql = "SELECT * FROM wzt_user WHERE user_id = $user_id LIMIT 1";
    $result = row_array($sql);
    return $result['first_name'] . ' ' . $result['last_name'];
}

if (!function_exists('is_admin_loggedin')) {

    function is_admin_loggedin() {
        if (isset($_SESSION['is_admin_loggedin'])) {
            return $_SESSION['is_admin_loggedin'];
        } else {
            return false;
        }
    }

}


if (!function_exists('check_user_login')) {

    function check_user_login() {
        if (isset($_SESSION['user_name']) && $_SESSION['user_loggedin'] > 0) {
            return true;
        } else {
            $_SESSION['session_url'] = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            redirect(base_url() . 'welcome/login');
        }
    }

}

if (!function_exists('check_buyer_login')) {

    function check_buyer_login() {
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 2) {
            return true;
        } else {
            message("You are not authorized to view this page.");
            redirect(base_url());
        }
    }

}
if (!function_exists('is_buyer_login')) {

    function is_buyer_login() {
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 2) {
            return true;
        } else {
            return false;
        }
    }

}

if (!function_exists('check_seller_login')) {

    function check_seller_login() {
        if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 1) {
            return true;
        } else {
            message("You are not authorized to view this page.");
            redirect(base_url());
        }
    }

}

if (!function_exists('is_user_loggedin')) {

    function is_user_loggedin() {
        if (isset($_SESSION['user_id']) && $_SESSION['user_loggedin'] > 0) {
            return true;
        } else {
            return false;
        }
    }

}

if (!function_exists('check_admin_login')) { //checkAdminLogin

    function check_admin_login() {
//dumpVar($_SESSION);
        if (isset($_SESSION['is_admin_loggedin'])) {
            return true;
        } else {

            redirect('admin');
        }
    }

}

if (!function_exists('admin_email')) {

    function admin_username() {
        return $_SESSION['admin_email'];
    }

}

function check_create_access() {
    $user_id = get_user_id();
    $sql = "SELECT user_type FROM wzt_user WHERE user_id = $user_id;";
    $result = row_array($sql);
    if ($result['user_type'] != 1) {
        exception("You are not authorised to add  a deal.");
        redirect(base_url());
    }
}

if (!function_exists('password_encode')) {

    function password_encode($password) {
        return md5($password);
    }

}

if (!function_exists('password_decode')) {

    function password_decode($password) {
        return md5($password);
    }

}


function birthday($birthday) {
    $age = @strtotime($birthday);
    if ($age === false) {
        return false;
    }
    list($y1, $m1, $d1) = explode("-", @date("Y-m-d", $age));
    $now = @strtotime("now");
    list($y2, $m2, $d2) = explode("-", @date("Y-m-d", $now));
    $age = $y2 - $y1;
    if ((int) ($m2 . $d2) < (int) ($m1 . $d1))
        $age -= 1;
    return $age;
}
