<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responsible_gaming extends CI_Controller
{
	public function index()
	{
        $data['pageTitle'] = "JackpotVilla Responsible Gaming";
        $data['page_active'] = "responsible_gaming";
		$data['current_page'] = 'responsible-index';
        $this->load->view('common/header', $data);
		$this->load->view('responsible_gaming');
		$this->load->view('common/footer');
	}
}
