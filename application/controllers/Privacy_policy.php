<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_policy extends CI_Controller
{
	public function index()
	{
        $data['pageTitle'] = "JackpotVilla Privacy Policy";
        $data['page_active'] = "privacy_policy";
		$data['current_page'] = 'privacy-index';
        $this->load->view('common/header', $data);
		$this->load->view('privacy_policy');
		$this->load->view('common/footer');
	}
}
