<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_us extends CI_Controller
{
	public function index()
	{
        $data['pageTitle'] = "JackpotVilla About Us";
        $data['page_active'] = "about_us";
		$data['current_page'] = 'about-index';
        $this->load->view('common/header', $data);
		$this->load->view('about_us');
		$this->load->view('common/footer');
	}
}
