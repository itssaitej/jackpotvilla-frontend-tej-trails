<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promotions extends CI_Controller
{
	public function index()
	{
        $data['pageTitle'] = "JackpotVilla Casino Games";
        $data['page_active'] = "promotions";
		$data['current_page'] = 'promotions-index';
        $this->load->view('common/header', $data);
		$this->load->view('promotions');
		$this->load->view('common/footer');
	}
}
