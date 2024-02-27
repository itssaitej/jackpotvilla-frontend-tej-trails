<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public $token;

    public $player_detail;

	function __construct()
	{
		parent::__construct();
		$this->token = $this->session->userdata('token');
		if(!$this->token)
		{
			echo '<script type="text/javascript">alert("Session Expired!"); window.location.href="/auth/logout";</script>';
            exit;
		}

        $headers = array(
	        "Cache-Control: no-cache",
	        "Content-Type: application/json",
			"token: $this->token"
	    );

	    $url = API_URL . '/player';
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;
	    $this->player_detail = curl_get($curl_data);
	    $this->player_detail = json_decode($this->player_detail, true);
        if(!$this->player_detail['success'])
        {
            echo '<script type="text/javascript">alert("Session Expired!"); window.location.href="/auth/logout";</script>';
            exit;
        }

        $this->player_detail = $this->player_detail['data'];
        $player_name = trim($this->player_detail['full_name']) ? $this->player_detail['full_name'] : $this->player_detail['username'];

        $this->session->set_userdata("player_name", $player_name);
        $this->session->set_userdata("currency", $this->player_detail['currency']);
        $this->session->set_userdata("balance", $this->player_detail['balance']);
        $this->session->set_userdata("deposit", $this->player_detail['deposit']);
        $this->session->set_userdata("withdraw_onhold", $this->player_detail['withdraw_onhold']);
		$this->session->set_userdata("bonus", $this->player_detail['bonus']);
	}
}
