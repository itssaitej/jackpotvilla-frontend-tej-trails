<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
	public function index()
	{
        $data['pageTitle'] = "JackpotVilla Casino Games";
        $data['page_active'] = "register";
		$data['current_page'] = 'register-index';
        $this->load->view('common/header', $data);
		$this->load->view('register');
		$this->load->view('common/footer');
	}
}
