<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	function index()
	{
		$player_detail = $this->player_detail;
		$data['pageTitle'] = "JackpotVilla User Profile Page";
		$data['player_detail'] = $player_detail;
		$data['transactions'] = [];
		$data['deposits'] = [];

		$headers = array(
			"Cache-Control: no-cache",
			"Content-Type: application/json",
			"token: $this->token"
		);

		/*$url = API_URL . '/transaction?page=1&limit=50';
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;
	    $transactions = curl_get($curl_data);
	    $transactions = json_decode($transactions, true);
		if($transactions && $transactions['success'])
		{
			$data['transactions'] = $transactions['data']['all_transactions'];
		}*/

		$url = API_URL . '/transaction/deposit';
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;
	    $deposits = curl_get($curl_data);
	    $deposits = json_decode($deposits, true);
		if($deposits && $deposits['success'])
		{
			$data['deposits'] = $deposits['data'];
		}

		$url = API_URL . '/withdraw';
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;
	    $withdraws = curl_get($curl_data);
	    $withdraws = json_decode($withdraws, true);
		if($withdraws && $withdraws['success'])
		{
			$data['withdraws'] = $withdraws['data'];
		}

		$data['current_page'] = 'player-index';
		$this->load->view('common/header', $data);
		$this->load->view('player/index');
		$this->load->view('common/footer');
	}

	function profile()
	{
		$player_detail = $this->player_detail;

		$signup_bonus_fields = array('firstname', 'lastname', 'gender', 'date_of_birth', 'city', 'address_line_1', 'state');
		$data['signup_bonus'] = false;
		$data['message'] = '';
		$data['current_page'] = 'player-profile';
		$data['fire_trigger'] = false;
		foreach($signup_bonus_fields as $field)
		{
			if(!$player_detail[$field])
			{
				if($this->input->get('r'))
				{
					// With Signup Bonus
					//$message = "Congratulation! You have registered successfully. Please complete your profile and upon verification of your email, your free 5 Sign up bonus will be credited to your account.";

					// Without Signup Bonus
					$message = "Congratulation! You have registered successfully. Please complete your profile and verify your email.";
					$data['fire_trigger'] = true;
					$data['stored_vars'] = $player_detail['affiliate_variables'] ? json_decode($player_detail['affiliate_variables'], true) : '';
				}
				else
				{
					if($player_detail['email_verified'])
					{
						//$message = "Please complete your profile, your free 5 Sign up bonus will be credited to your account.";
						$message = "Please complete your profile.";
					}
					else
					{
						//$message = "Please complete your profile and upon verification of your email, your free 5 Sign up bonus will be credited to your account.";
						$message = "Please complete your profile and verify your email.";
					}
				}
				$data['message'] = $message;
				$data['signup_bonus'] = true;
				break;
			}
		}
		if(!$data['signup_bonus'] && !$player_detail['email_verified'])
		{
			// With Signup Bonus
			//$data['message'] = "We notice that your email verification is pending. Please verify your email and your free 5 sign up bonus will be credited to your account.";

			// Without Signup Bonus
			$data['message'] = "We notice that your email verification is pending. Please verify your email.";
			$data['signup_bonus'] = true;
		}
		$data['pageTitle'] = "JackpotVilla Player Profile Page";
		$data['player_detail'] = $player_detail;
		$data['current_page'] = 'player-profile';
		$this->load->view('common/header', $data);
		$this->load->view('player/update', $data);
		$this->load->view('common/footer');
	}

	function update()
	{
		$this->form_validation->set_rules("firstname", "Firstname", "required", array(
            'required' => 'Firstname cannot be empty'
        ));

        $this->form_validation->set_rules("lastname", "Lastname", "required", array(
            'required' => 'Lastname cannot be empty'
        ));

        $this->form_validation->set_rules("gender", "Gender", "required", array(
            'required' => 'Please choose your gender'
        ));

        $this->form_validation->set_rules("date_of_birth", "Date of Birth", "required|callback_date_of_birth_check", array(
            'required' => 'Date of Birth cannot be empty'
        ));

        $this->form_validation->set_rules("address_line_1", "Address", "required", array(
            'required' => 'Please enter your address'
        ));

		$this->form_validation->set_rules("state", "State", "required", array(
            'required' => 'Please enter your state'
        ));

        $this->form_validation->set_rules("pin_code", "Pin code", "required", array(
            'required' => 'Pin code cann\'t be empty'
        ));

        $this->form_validation->set_rules("city", "City", "required", array(
            'required' => 'Please enter your city name'
        ));

        if ($this->form_validation->run() == FALSE)
		{
			$single_line_message = "";

            if (form_error("firstname")) {
                $single_line_message = form_error("firstname");
            }
            if (form_error("lastname") && $single_line_message == "") {
                $single_line_message = form_error("lastname");
            }
			if (form_error("gender") && $single_line_message == "") {
                $single_line_message = form_error("gender");
            }
			if (form_error("date_of_birth") && $single_line_message == "") {
                $single_line_message = form_error("date_of_birth");
            }
			if (form_error("address_line_1") && $single_line_message == "") {
                $single_line_message = form_error("address_line_1");
            }
			if (form_error("state") && $single_line_message == "") {
                $single_line_message = form_error("state");
            }
			if (form_error("pin_code") && $single_line_message == "") {
                $single_line_message = form_error("pin_code");
            }
			if (form_error("city") && $single_line_message == "") {
                $single_line_message = form_error("city");
            }

			$data['pageTitle'] = "JackpotVilla Player Profile Page";
            $data['player_detail'] = $this->input->post();
			$data['player_detail']['country_id'] = $this->player_detail['country_id'];
            $data['error_message'] = $single_line_message;
			$data['signup_bonus'] = false;
			$data['message'] = '';

			$signup_bonus_fields = array('firstname', 'lastname', 'gender', 'date_of_birth', 'city', 'address_line_1', 'state');
			$player_detail = $this->player_detail;

			foreach($signup_bonus_fields as $field)
			{
				if(!$player_detail[$field])
				{
					if($player_detail['email_verified'])
					{
						// With Signup Bonus
						//$message = "Please complete your profile, your free 5 Sign up bonus will be credited to your account.";

						// Without Signup Bonus
						$message = "Please complete your profile.";
					}
					else
					{
						//$message = "Please complete your profile and upon verification of your email, your free 5 Sign up bonus will be credited to your account.";

						$message = "Please complete your profile and verify your email.";
					}
					$data['message'] = $message;
					$data['signup_bonus'] = true;
					break;
				}
			}
			if(!$data['signup_bonus'] && !$player_detail['email_verified'])
			{
				// With Signup Bonus
				//$data['message'] = "We notice that your email verification is pending. Please verify your email and your free 5 sign up bonus will be credited to your account.";

				// Without Signup Bonus
				$data['message'] = "We notice that your email verification is pending. Please verify your email.";
				$data['signup_bonus'] = true;
			}

			$data['current_page'] = 'player-update';
    		$this->load->view('common/header', $data);
            $this->load->view('/player/update');
            $this->load->view('common/footer');
        }
		else
		{
			$headers = array(
		        "Cache-Control: no-cache",
		        "Content-Type: application/json",
				"token: $this->token"
		    );

		    $url = API_URL . '/player';
		    $curl_data['url']       = $url;
		    $curl_data['headers']   = $headers;
			$curl_data['put_data'] = json_encode($this->input->post());
		    $player_detail = curl_put($curl_data);
			$player_detail = json_decode($player_detail, true);
		    if($player_detail && $player_detail['success'])
			{
				$player_detail = $player_detail['data'];
				$player_name = trim($player_detail['full_name']) ? $player_detail['full_name'] : $player_detail['username'];
				$this->session->set_userdata("player_name", $player_name);
		        $this->session->set_userdata("currency", $player_detail['currency']);
		        $this->session->set_userdata("balance", $player_detail['balance']);
		        $this->session->set_userdata("deposit", $player_detail['deposit']);
		        $this->session->set_userdata("withdraw_onhold", $player_detail['withdraw_onhold']);
				$this->session->set_userdata("bonus", $player_detail['bonus']);
				$data['alert_message'] = 'Profile Updated Successfully!';
				$data['pageTitle'] = "JackpotVilla Player Profile Page";
				if(!$player_detail['email_verified'])
				{
					// With Signup Bonus
					//$data['message'] = "You are just one step behind to get signup bonus. We notice that your email verification is pending. Please verify your email and your free 5 sign up bonus will be credited to your account.";

					// Without Signup Bonus
					$data['message'] = "We notice that your email verification is pending. Please verify your email.";
					$data['current_page'] = 'player-update';

					$this->load->view('common/header', $data);
		            $this->load->view('/player/bonus_message');
		            $this->load->view('common/footer');
				}
				else
				{
					$data['message'] = "Profile has been updated successfully.";
					$data['current_page'] = 'player-update';
					$this->load->view('common/header', $data);
		            $this->load->view('/player/bonus_message');
		            $this->load->view('common/footer');
				}
				//echo '<script type="text/javascript">alert("Profile has been updated successfully"); window.location.href="/";</script>';
			}
			else
			{
				$data['pageTitle'] = "JackpotVilla Player Profile Page";
	            $data['player_detail'] = $this->player_detail;
				$data['signup_bonus'] = false;

				$data['message'] = $player_detail['message'];
				$data['current_page'] = 'player-update';
				$this->load->view('common/header', $data);
	            $this->load->view('/player/update');
	            $this->load->view('common/footer');
			}
		}
	}

	function get_balance()
	{
		$player_detail = $this->player_detail;
		$arr['balance'] = $player_detail['currency'] . ' ' . $player_detail['balance'];
		/*$arr['deposit'] = $player_detail['currency'] . ' ' . $player_detail['deposit'];
		$arr['bonus'] = $player_detail['currency'] . ' ' . $player_detail['bonus'];
		$arr['withdraw_onhold'] = $player_detail['currency'] . ' ' . $player_detail['withdraw_onhold'];*/
		echo json_encode($arr);
	}

	function date_of_birth_check($date_of_birth)
    {
		if($date_of_birth == '0000-00-00')
		{
			$this->form_validation->set_message('date_of_birth_check', 'DOB Is Invalid');
            return false;
		}
        $date_of_birth = strtotime($date_of_birth);
		if(!$date_of_birth)
		{
			$this->form_validation->set_message('date_of_birth_check', 'DOB Is Invalid');
            return false;
		}
        $restriction_years = 18;
        //The age to be over, over +18
        $min = strtotime("+$restriction_years years", $date_of_birth);
        if (time() < $min)
        {
            $this->form_validation->set_message('date_of_birth_check', 'You are Not eligible. Should be atleast 18 years old');
            return false;
        }
        else
        {
            return true;
        }
	}

	function change_password()
	{
		$this->form_validation->set_rules("password", "Password", "required|callback_check_password", array(
            'required' => 'Password cannot be empty'
        ));
        $this->form_validation->set_rules("new_password", "New Password", "required", array(
            'required' => 'New password cannot be empty'
        ));
        $this->form_validation->set_rules("confirm_password", "Confirm Password", "required|callback_check_confirm_password", array(
            'required' => 'Confirm password cannot be empty'
        ));

		if($this->input->post())
		{
	        if ($this->form_validation->run() == FALSE)
	        {
	            $single_line_message = "";

	            if (form_error("password")) {
	                $single_line_message = form_error("password");
	            }
	            if (form_error("new_password") && $single_line_message == "") {
	                $single_line_message = form_error("new_password");
	            }
	            if (form_error("confirm_password") && $single_line_message == "") {
	                $single_line_message = form_error("confirm_password");
	            }

	            $data['error_message'] = $single_line_message;
	        }
			else
			{
				$headers = array(
			        "Cache-Control: no-cache",
			        "Content-Type: application/json",
					"token: $this->token"
			    );

			    $url = API_URL . '/player/password';
			    $curl_data['url']       = $url;
			    $curl_data['headers']   = $headers;
				$curl_data['put_data'] = json_encode($this->input->post());
			    $player_detail = curl_put($curl_data);
				$player_detail = json_decode($player_detail, true);
			    if($player_detail && $player_detail['success'])
				{
					echo '<script type="text/javascript">alert("Password has been changed successfully. Login to continue."); window.location.href="/auth/logout";</script>';
				}
				else
				{
					$data['error_message'] = $player_detail['message'];
				}
			}
		}

		$data['pageTitle'] = "JackpotVilla Player Change Password Page";
		$data['current_page'] = 'player-change-password';
		$this->load->view('common/header', $data);
		$this->load->view('/player/change_password');
		$this->load->view('common/footer');
	}

	function transactions()
	{
		$headers = array(
			"Cache-Control: no-cache",
			"Content-Type: application/json",
			"token: $this->token"
		);

		$page = $this->input->post('page');
		$limit = $this->input->post('limit');
		$page = ($page / $limit) + 1;

		$url = API_URL . '/transaction?page=' . $page . '&limit=' . $limit;
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;
	    $transactions = curl_get($curl_data);
	    $transactions = json_decode($transactions, true);
		$final_result = [];
		$total_records = 0;
		$records_filtered = 0;
		if($transactions && $transactions['success'])
		{
			$all_transactions = $transactions['data']['all_transactions'];
			$records_filtered = $total_records = $transactions['data']['total_records'];
			foreach($all_transactions as $transaction)
			{
				$table_record['ref_id'] = $transaction['ref_id'];
				$table_record['type'] = $transaction['type'];
				$table_record['amount'] = $transaction['amount'];
				$table_record['closing_balance'] = $transaction['closing_balance'];
				$table_record['created_at'] = $transaction['created_at'];
				$final_result[] = $table_record;
			}
		}

		$response = [
			'data' => $final_result,
			'total_records' => $total_records,
			'records_filtered' => $records_filtered
		];
		echo json_encode($response);
	}

	function hit_game()
	{
		$headers = array(
			"Cache-Control: no-cache",
			"Content-Type: application/json",
			"token: $this->token"
		);

		$post_data = array(
			'game_reference' => 'ac',
			'type' => $type,
			'gateway' => $gateway,
			'callback' => base_url() . '/deposit/crypto'
		);

		$url = API_URL . '/transaction';
		$curl_data['url']       = $url;
		$curl_data['headers']   = $headers;
		$curl_data['post_data'] = json_encode($post_data);
		$transaction_detail = curl_post($curl_data);
	}

	function check_confirm_password($confirm_password)
	{
		$new_password = $this->input->post('new_password');
		if($new_password != $confirm_password)
		{
			$this->form_validation->set_message('check_confirm_password', 'New password and confirm password must match');
            return false;
		}
		return true;
	}

	function check_password($password)
	{
		$old_password = $this->player_detail['password'];
		$salt = $this->player_detail['salt'];
		$password = md5($password . $salt);
		if($old_password != $password)
		{
			$this->form_validation->set_message('check_password', 'Please enter correct current password.');
            return false;
		}
		return true;
	}
}
