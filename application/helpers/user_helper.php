<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('userLogin')) 
{
	function userLogin()
	{
		$_CI = &get_instance();
		//$_CI->load->library(array('cart'));
		
		$email			= $_CI->input->post('login_email');
		$password		= $_CI->input->post('login_password');
		$pass_md5		= md5($password);
		
		// Registration from direct login
		if(empty($email))
		{
			$email		 	 = $_CI->session->userdata('login_email');
			$pass_md5		 = $_CI->session->userdata('login_password');
		}
		
		$UserDetails	= $_CI->CommonModel->finById('baseit_user_patient', array('email' => $email));
	
		if( !empty($UserDetails) && $UserDetails->password == $pass_md5){
			
			$regid = $UserDetails->patientId; 
			$email = $UserDetails->email;
			setUserData($regid, $email);
			
			redirect('dashboard');
			
		} else {
			$_CI->session->set_userdata(array('invalidUser' => 'Your email or password is wrong!'));
			redirect('register');
		}		
	}
}


// TO SET DATA IN Useremail SESSION FIELD

if ( ! function_exists('setUserData'))
{
	function setUserData($regid, $email)
	{
		$_CI = &get_instance();
		$userData	= array(
			'patientId' => $regid, 'email' => $email
		);
		$_CI->session->set_userdata($userData);
	}
}


if ( ! function_exists('getUseremail'))
{
	function getUseremail()
	{
		$_CI = &get_instance();
		return $_CI->session->userdata('email');
	}
}

if ( ! function_exists('invalidUserData'))
{
	function invalidUserData()
	{
		setUserData(NULL,NULL);
	}
}

if ( ! function_exists('isActiveUser'))
{
	function isActiveUser()
	{
		return getUseremail() != NULL;
	}
}

if ( ! function_exists('isAuthenticate'))
{
	function isAuthenticate()
	{
		if(!isActiveUser()) {
			redirect('register');	
		} else {
			return true;	
		}
	}
}

if ( ! function_exists('userLogout'))
{
	function userLogout()
	{
		$_CI = &get_instance();
		invalidUserData();
		if(!isActiveUser()){
			redirect('/');
		}
	}
}

// ------------------------------------------------------------------------
/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */