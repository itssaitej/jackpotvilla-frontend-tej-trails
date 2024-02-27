<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cookies_policy extends CI_Controller
{
	public function index()
	{
        $data['pageTitle'] = "JackpotVilla Cookies Policy";
        $data['page_active'] = "cookies_policy";
		$data['current_page'] = 'cookie-index';
        $this->load->view('common/header', $data);
		$this->load->view('cookies_policy');
		$this->load->view('common/footer');
	}
}
