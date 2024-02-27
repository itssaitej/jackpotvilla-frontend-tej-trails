<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		/*$headers = array(
	        "Cache-Control: no-cache",
	        "Content-Type: application/json"
	    );

	    $url = API_URL . '/game/all';
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;
	    $all_games = curl_get($curl_data);
	    $all_games = json_decode($all_games, true);
		$all_games = $all_games['data'];
		foreach($all_games as $index => $game)
		{
			$game['url'] = str_replace('<TOKEN>', $this->session->userdata('token'), $game['url']);
			$game['url'] = str_replace('<LANG>', 'en', $game['url']);
			$game['url'] = str_replace('<EXTERNAL_ID>', $game['reference_code'], $game['url']);
			$all_games[$index] = $game;
		}

		$data['pageTitle'] = "JackpotVilla Home Page";
		$data['all_games'] = $all_games;
		$this->load->view('common/header', $data);
		$this->load->view('index');
		$this->load->view('common/footer');*/

        $ipaddress = get_ip_address();
		//$ipaddress = '31.15.32.0';
		$ip_detail = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ipaddress), true);
        //print_r($ip_detail);
        //exit;
		$currency_symbol = $ip_detail && isset($ip_detail['geoplugin_currencySymbol']) ? $ip_detail['geoplugin_currencySymbol'] : '£';
		$geo_location = $ip_detail && isset($ip_detail['geoplugin_countryCode']) ? $ip_detail['geoplugin_countryCode'] : 'UK';
		switch($geo_location)
		{
			case 'FR':
				$language = 'French_FR';
				break;
			case 'IT':
				$language = 'Italian_IT';
				break;
			case 'DE':
				$language = 'German_DE';
				break;
			case 'SE':
				$language = 'Swedish_SW';
				break;
			default:
				$language = 'English_EN';
				break;
		}
		$current_language = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'English_EN';
		if(!isset($_COOKIE['lang']) && $language != 'English_EN')
		{
			$lang_cookie= array(
				'name'	=> 'lang',
				'value'	=> $language,
				'expire' => 30*24*60*60*1000
			);
			$this->input->set_cookie($lang_cookie);

			$current_url = current_url();
			$params = $_SERVER['QUERY_STRING'];
			$full_url = $currentURL . '?' . $params;

			redirect($full_url);
		}

		switch($current_language)
		{
			case 'French_FR':
				$currency_symbol = '€';
				break;
			case 'Italian_IT':
				$currency_symbol = '€';
				break;
			case 'German_DE':
				$currency_symbol = '€';
				break;
			case 'Swedish_SW':
				$currency_symbol = 'kr';
				break;
			default:
				$currency_symbol = '€';
				break;
		}

		$type = $this->input->get('t') ? $this->input->get('t') : 'featured';
		$data['current_tab'] = 'pills-' . $type;

		$headers = array(
	        "Cache-Control: no-cache",
	        "Content-Type: application/json"
	    );

	    $url = API_URL . '/game/casino?type=' . $type;
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;
		$all_games = '';

		if(!$this->session->userdata('token'))
		{
			$file_path = APPPATH . '../uploads/' . $type . '_games.json';
			if(!file_exists($file_path))
			{
				$all_games = curl_get($curl_data);
				$fh = fopen($file_path, 'w');
				fwrite($fh, $all_games);
				fclose($fh);
			}
			else
			{
				$fh = fopen($file_path, 'r');
				$all_games = fgets($fh);
			}
		}

		if(!$all_games)
		{
			$all_games = curl_get($curl_data);
		}

	    $all_games = json_decode($all_games, true);
		$all_games = $all_games['data'];
		foreach($all_games as $key => $games)
		{
			foreach($games as $index => $game)
			{
				$game['url'] = str_replace('<TOKEN>', $this->session->userdata('token'), $game['url']);
				$game['url'] = str_replace('<LANG>', 'en', $game['url']);
				$game['url'] = str_replace('<EXTERNAL_ID>', $game['reference_code'], $game['url']);
				$all_games[$key][$index] = $game;
			}
		}

		$url = API_URL . '/game/live';
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;
		$response = '';

		if(!$this->session->userdata('token'))
		{
			$file_path = APPPATH . '../uploads/live_games.json';
			if(!file_exists($file_path))
			{
				$response = curl_get($curl_data);
				$fh = fopen($file_path, 'w');
				fwrite($fh, $response);
				fclose($fh);
			}
			else
			{
				$fh = fopen($file_path, 'r');
				$response = fgets($fh);
			}
		}

		if(!$response)
		{
			$response = curl_get($curl_data);
		}
		
	    $response = json_decode($response, true);
		$all_games['Live Games'] = $response['data'];
		foreach($all_games['Live Games'] as $index => $game)
		{
			$game['url'] = str_replace('<TOKEN>', $this->session->userdata('token'), $game['url']);
			$game['url'] = str_replace('<LANG>', 'en', $game['url']);
			$game['url'] = str_replace('<EXTERNAL_ID>', $game['reference_code'], $game['url']);
			if(!$game['logo'])
			{
				$game['logo'] = API_URL . '/assets/images/casino_games/lucky_streak/lucky_streak_2.jpg';
			}
			$all_games['Live Games'][$index] = $game;
		}

		$data['black_numbers'] = array(2,4,6,8,10,11,13,15,17,20,22,24,26,28,29,31,33,35);
		$data['red_numbers'] = array(1,3,5,7,9,12,14,16,18,19,21,23,25,27,30,32,34,36);

		$data['pageTitle'] = "JackpotVilla Home Page";
		$data['all_games'] = $all_games;
		$data['current_page'] = 'welcome-index';
        $data['currency_symbol'] = $currency_symbol;

		$this->load->view('common/header', $data);
		if(CURRENT_ENV == 'live')
		{
			$this->load->view('game/casino');
		}
		else
		{
			$this->load->view('game/casino');
		}
		$this->load->view('common/footer');
	}
}
