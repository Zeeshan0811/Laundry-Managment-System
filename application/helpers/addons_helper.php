<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('image_upload')) {
    function image_upload($filetemp, $path, $filename = null)
    {
        if (!empty($filename)) {
            $config['file_name'] = $filename;
        } else {
            $config['encrypt_name'] = TRUE;
        }
        $config['upload_path'] = realpath(FCPATH . '/' . $path);
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] = FALSE;
        $config['remove_spaces'] = TRUE;
        $_CI = &get_instance();
        $_CI->load->library('upload', $config);

        if (!$_CI->upload->do_upload($filetemp)) {
            return array('error' => $_CI->upload->display_errors());
        } else {
            return array('upload_data' => $_CI->upload->data());
        }
    }
}

if (!function_exists('templete_type')) {
    function templete_type($user_type)
    {
        if ($user_type > 1 && $user_type < 4) {
            $templete = 'customer_panel_templete';
        } else if ($user_type > 3 && $user_type < 8) {
            $templete = 'admin_master_templete';
        } else if ($user_type > 7) {
            $templete = 'master_admin_templete';
        } else {
            $templete = 'none';
        }

        return $templete;
    }
}


if (!function_exists('status_text')) {
    function status_text($type)
    {
        switch ($type) {
            case 1:
                $text = "Active";
                break;
            case 2:
                $text = "On Hold";
                break;
            case 3:
                $text = "Deactived";
                break;
            case 4:
                $text = "Canceled";
                break;
            default:
                $text = "Invalid";
                break;
        }

        return $text;
    }
}

if (!function_exists('order_status')) {
    function order_status($type)
    {
        switch ($type) {
            case 1:
                $text = "Pending";
                break;
            case 2:
                $text = "Packing";
                break;
            case 3:
                $text = "Packed";
                break;
            case 4:
                $text = "Dispatched";
                break;
            case 5:
                $text = "Canceled";
                break;
            default:
                $text = "Invalid";
                break;
        }


        return $text;
    }
}
if (!function_exists('status_color')) {
    function status_color($type)
    {
        switch ($type) {
            case 1:
                $text = "bg-success";
                break;
            case 2:
                $text = "bg-warning";
                break;
            case 3:
                $text = "bg-danger";
                break;
            case 4:
                $text = "bg-danger";
                break;
            default:
                $text = "bg-secondary";
                break;
        }

        return $text;
    }
}



if (!function_exists('night_calculator')) {
    function night_calculator($arrive, $departure)
    {

        // formate "2010-07-06"
        $date1 = new DateTime($arrive);
        $date2 = new DateTime($departure);

        // this calculates the diff between two dates, which is the number of nights
        return $numberOfNights = $date2->diff($date1)->format("%a");
    }
}



// Convert amount to cent
if (!function_exists('to_pennies')) {
    function to_pennies($value)
    {
        return intval(
            strval(floatval(
                preg_replace("/[^0-9.]/", "", $value)
            ) * 100)
        );
    }
}

// Send Email
if (!function_exists('sendEmail')) {
    function sendEmail($email, $content, $attachment = null)
    {
        $senderEmail = 'mail@eastfuelconf.com';
        $replyTo = 'info@eastfuelconf.com';
        $senderName = 'no reply';
        $subject =  $content['Subject'];
        $message = $content['message'];
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'eastfuelconf.com',
            'smtp_port' => 587,
            'smtp_user' => 'mail@eastfuelconf.com',
            'smtp_pass' => '2$O5_lg.12o1',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1',
            'newline' => "\r\n"
        );


        $_CI = &get_instance();
        $_CI->load->library('email');
        $_CI->email->initialize($config);
        $_CI->email->from($senderEmail, $senderName);
        $_CI->email->reply_to($replyTo, $senderName);
        $_CI->email->to($email);
        $_CI->email->bcc(array('Zeeshan0811@gmail.com'));
        $_CI->email->subject($subject);
        $_CI->email->message($message);
        if ($attachment != null) {
            if (is_array($attachment)) {
                foreach ($attachment as $file) {
                    $_CI->email->attach($file);
                }
                // $_CI->email->attach(implode(",", $attachment));
            } else {
                $_CI->email->attach($attachment);
            }
        }
        $_CI->email->set_newline("\r\n");
        // $result =  $_CI->email->send();
        // return $result;
        if (!$_CI->email->send()) {
            echo "email not sent";
            print_r($_CI->email->print_debugger(), true);
        } else {
            echo "email sent";
        }
    }
}

if (!function_exists('uri_generator')) {
    function uri_generator($table, $id_column_name, $uri_column_name, $title)
    {

        $config = array(
            'table' => $table,
            'id' => $id_column_name,
            'field' => $uri_column_name,
            'title' => 'title',
            'replacement' => 'dash' // Either dash or underscore
        );

        $data = array(
            'title' => $title,
        );

        $_CI = &get_instance();
        $_CI->load->library('slug', $config);

        return  $_CI->slug->create_uri($data);
    }
}


if (!function_exists('set_file_upload_option')) {
    function set_file_upload_option($dir, $type, $encrypt = false, $max_size = "*")
    {
        switch ($type) {
            case 'image':
                $allowed_types = 'gif|jpg|png|jpeg';
                break;
            case 'document':
                $allowed_types = 'pdf|csv|xls|zip|rar|gzip|doc|docx|word|7z|7zip';
            case 'image_document':
                $allowed_types = 'gif|jpg|png|jpeg|pdf|csv|xls|zip|rar|gzip|doc|docx|word|7z|7zip';
            default:
                $allowed_types = '*';
                break;
        }

        // upload an image options
        $config = array();
        $config['upload_path'] = $dir; //give the path to upload the image in folder
        $config['remove_spaces'] = true;
        $config['encrypt_name'] = $encrypt; // for encrypting the name
        $config['allowed_types'] = $allowed_types;
        $config['max_size'] = $max_size;
        $config['overwrite'] = false;
        return $config;
    }
}
