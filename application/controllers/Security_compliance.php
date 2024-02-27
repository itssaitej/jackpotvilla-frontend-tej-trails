<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security_compliance extends CI_Controller
{
	public function index()
	{
        $data['pageTitle'] = "JackpotVilla Security & Compliance";
        $data['page_active'] = "security_compliance";
		$data['current_page'] = 'security-index';
        $this->load->view('common/header', $data);
		$this->load->view('security_compliance');
		$this->load->view('common/footer');
	}
}
