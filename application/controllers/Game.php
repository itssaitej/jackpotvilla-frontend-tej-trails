<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Game extends CI_Controller
{
	public function casino()
	{
		$headers = array(
	        "Cache-Control: no-cache",
	        "Content-Type: application/json"
	    );

	    $url = API_URL . '/game/casino';
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;
	    $all_games = curl_get($curl_data);
	    $all_games = json_decode($all_games, true);
		//$providers = $all_games['providers'];
		$all_games = $all_games['data'];
		/*echo '<pre>';
		print_r($providers);
		exit;*/
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

		$data['pageTitle'] = "JackpotVilla Casino Game Page";
		$data['all_games'] = $all_games;
		$data['current_page'] = 'game-casino';

		$this->load->view('common/header', $data);
		if(CURRENT_ENV == 'live')
		{
			$this->load->view('game/casino_live');
		}
		else
		{
			$this->load->view('game/casino');
		}
		$this->load->view('common/footer');
	}

	public function roulette()
	{
		$headers = array(
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

		$final_list = [];
		foreach($all_games as $index => $game)
		{
			if($game['type'] == 'Roulette')
			{
				$final_list[] = $game;
			}
		}

		$data['pageTitle'] = "JackpotVilla Roulette Game Page";
		$data['all_games'] = $final_list;
		$data['current_page'] = 'game-roulette';

		$this->load->view('common/header', $data);
		$this->load->view('game/lobby');
		$this->load->view('common/footer');
	}

	public function slot()
	{
		$headers = array(
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

		$final_list = [];
		foreach($all_games as $index => $game)
		{
			if($game['type'] == 'Slot')
			{
				$final_list[] = $game;
			}
		}

		$data['pageTitle'] = "JackpotVilla Slot Game Page";
		$data['all_games'] = $final_list;
		$data['current_page'] = 'game-slot';

		$this->load->view('common/header', $data);
		$this->load->view('game/lobby');
		$this->load->view('common/footer');
	}

	public function bingo()
	{
		$headers = array(
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

		$final_list = [];
		foreach($all_games as $index => $game)
		{
			if($game['type'] == 'Bingo')
			{
				$final_list[] = $game;
			}
		}

		$data['pageTitle'] = "JackpotVilla Bingo Game Page";
		$data['all_games'] = $final_list;
		$data['current_page'] = 'game-bingo';

		$this->load->view('common/header', $data);
		$this->load->view('game/lobby');
		$this->load->view('common/footer');
	}

	public function table()
	{
		$headers = array(
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

		$final_list = [];
		foreach($all_games as $index => $game)
		{
			if($game['type'] == 'Table')
			{
				$final_list[] = $game;
			}
		}

		$data['pageTitle'] = "JackpotVilla Table Game Page";
		$data['all_games'] = $final_list;
		$data['current_page'] = 'game-table';

		$this->load->view('common/header', $data);
		$this->load->view('game/lobby');
		$this->load->view('common/footer');
	}

	function live()
	{
		$headers = array(
	        "Cache-Control: no-cache",
	        "Content-Type: application/json"
	    );

	    $url = API_URL . '/game/live';
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;
	    $response = curl_get($curl_data);
	    $response = json_decode($response, true);
		$all_games = $response['data'];
		foreach($all_games as $index => $game)
		{
			$game['url'] = str_replace('<TOKEN>', $this->session->userdata('token'), $game['url']);
			$game['url'] = str_replace('<LANG>', 'en', $game['url']);
			$game['url'] = str_replace('<EXTERNAL_ID>', $game['reference_code'], $game['url']);
			if(!$game['logo'])
			{
				$game['logo'] = API_URL . '/assets/images/casino_games/lucky_streak/lucky_streak_2.jpg';
			}
			$all_games[$index] = $game;
		}

		$data['pageTitle'] = "JackpotVilla Live Game Page";
		$data['current_page'] = 'game-live';
		$data['all_games'] = $all_games;
		$data['black_numbers'] = array(2,4,6,8,10,11,13,15,17,20,22,24,26,28,29,31,33,35);
		$data['red_numbers'] = array(1,3,5,7,9,12,14,16,18,19,21,23,25,27,30,32,34,36);

		if($this->input->get('ajax'))
		{
			echo json_encode($data);
		}
		else
		{
			$data['current_page'] = 'game-live';
			$this->load->view('common/header', $data);
			$this->load->view('game/live');
			$this->load->view('common/footer');
		}
	}

	function mobile()
	{
		$data['src'] = $_GET['src'];
		$data['src'] .= "&mobile=1";
		$data['pageTitle'] = "JackpotVilla Live Game Page";
		$this->load->view('game/mobile', $data);
	}

	function casino_mobile()
	{
		$headers = array(
	        "Cache-Control: no-cache",
	        "Content-Type: application/json"
	    );

	    $url = API_URL . '/game/mobile';
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;

		$all_games = '';
		if(!$this->session->userdata('token'))
		{
			$file_path = APPPATH . '../uploads/mobile_games.json';
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
		$providers = $all_games['providers'];
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

		$final_list['Featured'] = isset($all_games['Yggdrasil']) ? $all_games['Yggdrasil'] : [];
		$final_list['New Games'] = isset($all_games['Netent']) ? $all_games['Netent'] : [];

		$url = API_URL . '/game/live';
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;

		$response = '';

		if(!$this->session->userdata('token'))
		{
			$file_path = APPPATH . '../uploads/mobile_live_games.json';
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

		$final_list = array_merge($final_list, $all_games);

		$data['black_numbers'] = array(2,4,6,8,10,11,13,15,17,20,22,24,26,28,29,31,33,35);
		$data['red_numbers'] = array(1,3,5,7,9,12,14,16,18,19,21,23,25,27,30,32,34,36);
		$data['providers'] = $providers;
		$data['all_games'] = $final_list;

		echo json_encode($data);
	}

    function search($search_string)
	{
		$type = $this->input->get('t') ? $this->input->get('t') : 'featured';

		$headers = array(
	        "Cache-Control: no-cache",
	        "Content-Type: application/json"
	    );

	    $url = API_URL . '/game/casino?type=' . $type;
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;
	    $all_games = curl_get($curl_data);
	    $all_games = json_decode($all_games, true);
		$all_games = $all_games['data'];
		$sorted_games = [];
		$similarities = [];

		foreach($all_games as $key => $games)
		{
			foreach($games as $index => $game)
			{
				$game['url'] = str_replace('<TOKEN>', $this->session->userdata('token'), $game['url']);
				$game['url'] = str_replace('<LANG>', 'en', $game['url']);
				$game['url'] = str_replace('<EXTERNAL_ID>', $game['reference_code'], $game['url']);
				$all_games[$key][$index] = $game;

				$str_pos = strpos($game['name'], $search_string);
				if($str_pos === FALSE)
				{
					similar_text($game['name'], $search_string, $similarity);
					$similarity = (int)$similarity;
				}
				else
				{
					$similarity = 100;
				}
				$similarities[$game['id']] = $similarity;
			}
		}

		uasort($similarities, function($a, $b) {
			if ($a == $b) {
        		return 0;
    		}
    		return ($a > $b) ? -1 : 1;
		});

		foreach($similarities as $game_id => $similarity_index)
		{
			foreach($all_games as $key => $games)
			{
				foreach($games as $index => $game)
				{
					if($game_id == $game['id'])
					{
						$sorted_games[] = $game;
					}
				}
			}
		}

		echo json_encode($sorted_games);
	}

    function search_mobile($tab, $search_string)
	{
		$headers = array(
	        "Cache-Control: no-cache",
	        "Content-Type: application/json"
	    );

	    $url = API_URL . '/game/mobile';
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;
	    $all_games = curl_get($curl_data);
	    $all_games = json_decode($all_games, true);
		$providers = $all_games['providers'];
		$all_games = $all_games['data'];

		switch($tab)
		{
			case 'diceandreel':
				$check_key = 'DiceandReel';
				break;
			case 'netent':
				$check_key = 'Netent';
				break;
			case 'tomhorn':
				$check_key = 'TomHorn';
				break;
			case 'pragmatic':
				$check_key = 'PragmaticPlay';
				break;
			case 'justplay':
				$check_key = 'Justplay';
				break;
			case 'hacksaw':
				$check_key = 'Hacksaw';
				break;
			case 'bgaming':
				$check_key = 'BGaming';
				break;
			case 'aristocrat':
				$check_key = 'Aristocrat';
				break;
			case 'amatic':
				$check_key = 'Amatic';
				break;
			case 'egt':
				$check_key = 'EGT';
				break;
			case 'fugaso':
				$check_key = 'Fugaso';
				break;
			case 'playtech':
				$check_key = 'Playtech';
				break;
			case 'novomatic':
				$check_key = 'Novomatic';
				break;
			case 'yggdrasil':
				$check_key = 'Yggdrasil';
				break;
			case 'vivo':
				$check_key = 'Vivo-Betsoft';
				break;
			case 'spinomenal':
				$check_key = 'Spinomenal';
				break;
			case 'merkurgame':
				$check_key = 'Merkur';
				break;
			case 'belatra':
				$check_key = 'Belatra';
				break;
			case 'allgames':
				$check_key = 'All Games';
				break;
			case 'videoslots':
				$check_key = 'Video Slots';
				break;
			case 'tablegames':
				$check_key = 'Table Games';
				break;
			case 'featured':
				$check_key = 'Yggdrasil';
				break;
			case 'newgames':
				$check_key = 'Netent';
				break;
		}

		$sorted_games = [];
		$similarities = [];

		foreach($all_games as $key => $games)
		{
			foreach($games as $index => $game)
			{
				$game['url'] = str_replace('<TOKEN>', $this->session->userdata('token'), $game['url']);
				$game['url'] = str_replace('<LANG>', 'en', $game['url']);
				$game['url'] = str_replace('<EXTERNAL_ID>', $game['reference_code'], $game['url']);
				$all_games[$key][$index] = $game;

				if($key == $check_key)
				{
					$str_pos = strpos($game['name'], $search_string);
					if($str_pos === FALSE)
					{
						similar_text($game['name'], $search_string, $similarity);
						$similarity = (int)$similarity;
					}
					else
					{
						$similarity = 100;
					}
					$similarities[$game['id']] = $similarity;
				}
			}
		}

		uasort($similarities, function($a, $b) {
			if ($a == $b) {
        		return 0;
    		}
    		return ($a > $b) ? -1 : 1;
		});

		foreach($similarities as $game_id => $similarity_index)
		{
			foreach($all_games as $key => $games)
			{
				if($key == $check_key)
				{
					foreach($games as $index => $game)
					{
						if($game_id == $game['id'])
						{
							$sorted_games[] = $game;
						}
					}
				}
			}
		}

		echo json_encode($sorted_games);
	}
}
