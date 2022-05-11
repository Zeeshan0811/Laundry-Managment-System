<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'FrontendController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Frontend 
$route['login'] = 'AuthController/login';
$route['register'] = 'AuthController/register';
$route['logout'] = 'AuthController/logout';

$route['about'] = 'FrontendController/about';
$route['contact'] = 'FrontendController/contact';
$route['contact_form'] = 'FrontendController/contact';


$route['faq'] = 'FrontendController/faq';

$route['products'] = 'ProductPageController/product_list';
$route['product/(:any)'] = 'ProductPageController/product_single/$1';

$route['category/(:any)'] = 'ProductPageController/product_list';
$route['company/(:any)'] = 'ProductPageController/product_list';
$route['generic/(:any)'] = 'ProductPageController/product_list';


$route['cart'] = 'CartController/cart';


$route['add_to_cart'] = 'CartController/add_to_cart';
$route['update_cart'] = 'CartController/update_cart';

// Dashboard

$route['upload_image'] = 'FrontendController/upload_image';
$route['upload_blob_image'] = 'FrontendController/upload_blob_image';


$route['error'] = 'FrontendController/error';
$route['reserve'] = 'FrontendController/reserve';
$route['confirmation'] = 'FrontendController/confirmation';


$route['contactmail'] = 'FrontendController/contactmail';
$route['emailconfirmation'] = 'FrontendController/emailconfirmation';


// Admin Panel
$route['admin'] = 'AdminController/index';
$route['admin/login'] = 'AdminController/checkLogin_admin';
$route['admin/logout'] = 'AdminController/logout_admin';

$route['admin/assets'] = 'AssetController/assets';
$route['admin/asset_add'] = 'AssetController/asset_add';
$route['admin/asset_edit/(:any)'] = 'AssetController/asset_edit/$1';

$route['admin/products'] = 'ProductController/products';
$route['admin/product_add'] = 'ProductController/product_add';
$route['admin/product_edit/(:any)'] = 'ProductController/product_edit/$1';


$route['admin/featured'] = 'ProductController/featured';

$route['admin/transections'] = 'SetupController/transections';
$route['admin/transection/(:any)'] = 'SetupController/transection/$1';

$route['admin/inbox'] = 'SetupController/inbox';



// Setup Controller

$route['setting/user'] = 'SetupController/setting_user';
$route['setting/company'] = 'SetupController/setting_company';
$route['setting/password'] = 'SetupController/change_password';


$route['customers'] = 'CustomerController/customers';
$route['customer_add'] = 'CustomerController/customer_add';
$route['customer_edit/(:any)'] = 'CustomerController/customer_edit/$1';

$route['master_stock'] = 'ProductController/master_stock';
$route['ajax/master_stock_get'] = 'ProductController/master_stock_get_ajax';
$route['ajax/master_stock_add'] = 'ProductController/master_stock_add_ajax';
$route['ajax/master_stock_update'] = 'ProductController/master_stock_update_ajax';


// Action Controller
$route['order'] = 'ActionController/order';
$route['orders'] = 'ActionController/orders';
$route['rental'] = 'ActionController/rental';
$route['pickup'] = 'ActionController/pickup';

$route['ajax/order_submit'] = 'ActionController/order_submit';
$route['ajax/fetch_orders'] = 'ActionController/fetch_orders';


// Report Controller
$route['reports'] = 'ReportController/reports';

$route['admin/delete/(:any)/(:any)'] = 'SetupController/delete_row/$1/$2';
// Delete variables - neeed to do - delete/asset/id


// Ajax Controller
$route['admin/file_upload'] = 'AjaxController/file_upload';
$route['admin/file_update'] = 'AjaxController/file_update';
