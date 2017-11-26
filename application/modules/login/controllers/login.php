<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	function index()
	{

	    if($this->session->userdata("logged_in")=="")
		{
 			$this->load->view('login/login');
		}
		else
		{
			//$this->session->sess_destroy();
			redirect("dashboard");
		}
		
	}

	function logout()
	{
		if($this->session->userdata("logged_in")!="")
		{
			$this->session->sess_destroy();
			redirect("login");
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}
		
	function act()
	{
		if($this->session->userdata("logged_in")=="")
		{
 			$dt['username'] = $_POST['username'];
 			$dt['password'] = $_POST['password'];
			$this->app_user_login_model->cekUserLogin($dt);
		}
		else
		{
			$this->session->sess_destroy();
			redirect("login");
		}
	}
}
