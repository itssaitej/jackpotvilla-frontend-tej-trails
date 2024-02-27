<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_password extends CI_Controller
{
	public function index()
	{
		$data['pageTitle'] = "JackpotVilla Forgot Password";
        $data['page_active'] = "forgot_password";
		$data['current_page'] = 'forgot-index';
        $this->load->view('common/header', $data);
		$this->load->view('forgot_password');
		$this->load->view('common/footer');
	}
}
