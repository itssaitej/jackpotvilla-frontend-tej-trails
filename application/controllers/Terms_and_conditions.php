<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms_and_conditions extends CI_Controller
{
	public function index()
	{
        $data['pageTitle'] = "JackpotVilla Terms & Conditions";
        $data['page_active'] = "terms_and_conditions";
		$data['current_page'] = 'tnc-index';
        $this->load->view('common/header', $data);
		$this->load->view('terms_and_conditions');
		$this->load->view('common/footer');
	}
}
