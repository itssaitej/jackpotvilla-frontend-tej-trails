<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	function register()
	{
        $ipaddress = get_ip_address();
        $ip_detail = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ipaddress), true);
        $geo_location = $ip_detail && isset($ip_detail['geoplugin_countryCode']) ? $ip_detail['geoplugin_countryCode'] : 'UK';

        $this->form_validation->set_rules("username", "Username", "required|min_length[5]|max_length[45]", array(
            'required' => 'Username cannot be empty'
        ));
        $this->form_validation->set_rules("password", "Password", "required", array(
            'required' => 'Password cannot be empty'
        ));
        $this->form_validation->set_rules("email", "Email", "required|valid_email", array(
            'required' => 'Email Id cannot be empty'
        ));

        $this->form_validation->set_rules("mobile", "Mobile", "required|is_natural", array(
            'required' => 'Mobile number cannot be empty',
            "is_natural" => "Please enter valid mobile number"
        ));

        $this->form_validation->set_rules("country_id", "Country", "required", array(
            'required' => 'Country cannot be empty'
        ));

        $this->form_validation->set_rules("tnc", "Terms & Conditions", "required|callback_tnc_check", array(
            'required' => 'Terms & Conditions check is Required'
        ));

        if ($this->form_validation->run() == FALSE)
        {
            $single_line_message = "";

            if (form_error("username")) {
                $single_line_message = form_error("username");
            }
            if (form_error("password") && $single_line_message == "") {
                $single_line_message = form_error("password");
            }
            if (form_error("email") && $single_line_message == "") {
                $single_line_message = form_error("email");
            }
            if (form_error("mobile") && $single_line_message == "") {
                $single_line_message = form_error("mobile");
            }
            if (form_error("country_id") && $single_line_message == "") {
                $single_line_message = form_error("country_id");
            }
            if (form_error("tnc") && $single_line_message == "") {
                $single_line_message = form_error("tnc");
            }

            $data['pageTitle'] = "JackpotVilla Registration Page";
            $data['form_values'] = $this->input->post();
            $data['error_message'] = $single_line_message;
			$data['current_page'] = 'auth-register';
    		$this->load->view('common/header', $data);
            $this->load->view('/auth/register');
            $this->load->view('common/footer');
        }
        else if($geo_location == 'US' || $this->input->post('country_id') == '231'){
            $data['pageTitle'] = "JackpotVilla Registration Page";
            $data['form_values'] = $this->input->post();
            $data['error_message'] = "Sorry! We do not operate in your country.";
			$data['current_page'] = 'auth-register';
    		$this->load->view('common/header', $data);
            $this->load->view('/auth/register');
            $this->load->view('common/footer');
        }
        else
        {
            $headers = array(
                "Cache-Control: no-cache",
                "Content-Type: application/json"
            );

			//$affiliate_id = $_COOKIE['aff'];
			//$tracker_id = $_COOKIE['tid'];

			//$campaign_id = isset($_COOKIE['cid']) && $_COOKIE['cid'] ? $_COOKIE['cid'] : NULL;
			$stored_vars = [];
			$all_cookies = $this->input->cookie();
			if($all_cookies)
			{
				foreach($all_cookies as $key => $value)
				{
					if(strpos($key, 'jv') !== FALSE)
			        {
						$stored_vars[$key] = $value;
			        }
				}
			}

            $url = API_URL . '/auth/register';
            $curl_data['url']       = $url;
            $curl_data['headers']   = $headers;
            $curl_data['post_data'] = $this->input->post();
			$curl_data['post_data']['ip_address'] = get_ip_address();
			//$curl_data['post_data']['affiliate_id'] = $affiliate_id;
			//$curl_data['post_data']['tracker_id'] = $tracker_id;
			$curl_data['post_data']['affiliate_variables'] = $stored_vars;
            $curl_data['post_data']['speak_language'] = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'English_EN';
			$curl_data['post_data'] = json_encode($curl_data['post_data']);
            $response = curl_post($curl_data);
            $response = json_decode($response, true);
            if($response && $response['success'])
            {
                $player_language = $response['data']['speak_language'];
				$lang_cookie= array(
					'name'	=> 'lang',
	           		'value'	=> $player_language,
	           		'expire' => 30*24*60*60*1000
	       		);
				$this->input->set_cookie($lang_cookie);

				$player_name = trim($response['data']['full_name']) ? $response['data']['full_name'] : $response['data']['username'];
				$this->session->set_userdata("token", $response['data']['play_token']);
				$this->session->set_userdata("player_name", $player_name);
				$this->session->set_userdata("currency", $response['data']['currency']);
				$this->session->set_userdata("balance", $response['data']['balance']);
				$this->session->set_userdata("deposit", $response['data']['deposit']);
				$this->session->set_userdata("withdraw_onhold", $response['data']['withdraw_onhold']);
				$this->session->set_userdata("bonus", $response['data']['bonus']);
                redirect('/player/profile?r=1');

				/*$data['pageTitle'] = "JackpotVilla Login Page";
				$data['message'] = "Thank you! You will receive an email to verify your account. Please check your email and verify your account to continue.";
				$this->load->view('common/header', $data);
				$this->load->view('auth/login', $data);
				$this->load->view('common/footer');*/
            }
			else
			{
				$data['pageTitle'] = "JackpotVilla Registration Page";
	            $data['form_values'] = $this->input->post();
	            $data['error_message'] = $response['message'];
				$data['current_page'] = 'auth-register';
	    		$this->load->view('common/header', $data);
	            $this->load->view('/auth/register');
	            $this->load->view('common/footer');
			}
        }
	}

	function login()
	{
		$this->form_validation->set_rules("username", "Username", "required|min_length[5]|max_length[45]", array(
            'required' => 'Username cannot be empty'
        ));
        $this->form_validation->set_rules("password", "Password", "required", array(
            'required' => 'Password cannot be empty'
        ));

        if ($this->form_validation->run() == FALSE)
        {
            $single_line_message = "";

            if (form_error("username")) {
                $single_line_message = form_error("username");
            }
            if (form_error("password") && $single_line_message == "") {
                $single_line_message = form_error("password");
            }

            $data['pageTitle'] = "JackpotVilla Login Page";
            $data['form_values'] = $this->input->post();
            $data['error_message'] = $single_line_message;
			$data['current_page'] = 'auth-login';

    		$this->load->view('common/header', $data);
            $this->load->view('/auth/login');
            $this->load->view('common/footer');
        }
        else
        {
            $headers = array(
                "Cache-Control: no-cache",
                "Content-Type: application/json"
            );

            $url = API_URL . '/auth/login';
            $curl_data['url']       = $url;
            $curl_data['headers']   = $headers;
			$curl_data['post_data'] = $this->input->post();
			$curl_data['post_data']['ip_address'] = get_ip_address();
			$curl_data['post_data'] = json_encode($curl_data['post_data']);
            $response = curl_post($curl_data);
            $response = json_decode($response, true);
            if($response && $response['success'])
            {
                $player_language = $response['data']['speak_language'];
				$lang_cookie= array(
					'name'	=> 'lang',
	           		'value'	=> $player_language,
	           		'expire' => 30*24*60*60*1000
	       		);
				$this->input->set_cookie($lang_cookie);
                
				$player_name = trim($response['data']['full_name']) ? $response['data']['full_name'] : $response['data']['username'];
				$this->session->set_userdata("token", $response['data']['play_token']);
				$this->session->set_userdata("player_name", $player_name);
				$this->session->set_userdata("currency", $response['data']['currency']);
				$this->session->set_userdata("balance", $response['data']['balance']);
				$this->session->set_userdata("deposit", $response['data']['deposit']);
				$this->session->set_userdata("withdraw_onhold", $response['data']['withdraw_onhold']);
				$this->session->set_userdata("bonus", $response['data']['bonus']);
				$signup_bonus_fields = array('firstname', 'lastname', 'gender', 'date_of_birth', 'city', 'address_line_1', 'state');
				$player_detail = $response['data'];
				foreach($signup_bonus_fields as $field)
				{
					if(!$player_detail[$field])
					{
						redirect('/player/profile');
					}
				}
				redirect('/');
            }
			else
			{
				$data['pageTitle'] = "JackpotVilla Login Page";
	            $data['form_values'] = $this->input->post();
	            $data['error_message'] = $response['message'];
				$data['status'] = $response['status'];
				$data['current_page'] = 'auth-login';

	    		$this->load->view('common/header', $data);
	            $this->load->view('/auth/login');
	            $this->load->view('common/footer');
			}
        }
	}

	function logout()
	{
        foreach ($this->session->all_userdata() as $key => $item)
		{
            $this->session->unset_userdata($key);
        }
        redirect("/");
    }

	function confirm($email_verification_code = NULL)
	{
		if(!$email_verification_code)
		{
			$data['pageTitle'] = "JackpotVilla Email Verification Page";
			$data['heading'] = "Email Verification Failed";
			$data['message'] = "The email verification code can not be empty. Please check again.";
			$data['current_page'] = 'auth-confirm';
			$this->load->view('common/header', $data);
			$this->load->view('auth/error', $data);
			$this->load->view('common/footer');
		}

		$headers = array(
			"Cache-Control: no-cache",
			"Content-Type: application/json"
		);

		$url = API_URL . '/auth/email-verify';
		$curl_data['url']       = $url;
		$curl_data['headers']   = $headers;
		$curl_data['post_data'] = ['verification_code' => $email_verification_code];
		$curl_data['post_data'] = json_encode($curl_data['post_data']);
		$response = curl_post($curl_data);
		$response = json_decode($response, true);

		if(!$response['success'])
		{
			$data['pageTitle'] = "JackpotVilla Email Verification Page";
			$data['heading'] = "Email Verification Failed";
			$data['message'] = $response['message'];
			$data['current_page'] = 'auth-confirm';
			$this->load->view('common/header', $data);
			$this->load->view('auth/error', $data);
			$this->load->view('common/footer');
		}
		else
		{
			$token = $this->session->userdata('token');
			if(!$token)
			{
				$data['pageTitle'] = "JackpotVilla Email Verification Page";
				$data['message'] = "Congrats!! Your email is verfied. Please login to continue.";
				$data['current_page'] = 'auth-confirm';
				$this->load->view('common/header', $data);
				$this->load->view('auth/login', $data);
				$this->load->view('common/footer');
			}
			else
			{
				$headers = array(
			        "Cache-Control: no-cache",
			        "Content-Type: application/json",
					"token: $token"
			    );

			    $url = API_URL . '/player';
			    $curl_data['url']       = $url;
			    $curl_data['headers']   = $headers;
			    $player_detail = curl_get($curl_data);
			    $player_detail = json_decode($player_detail, true);
		        if(!$player_detail['success'])
		        {
					$data['pageTitle'] = "JackpotVilla Email Verification Page";
					$data['message'] = "Congrats!! Your email is verfied. Please login to continue.";
					$data['current_page'] = 'auth-confirm';
					$this->load->view('common/header', $data);
					$this->load->view('auth/login', $data);
					$this->load->view('common/footer');
		        }
				else
				{
					$player_detail = $player_detail['data'];

					$signup_bonus_fields = array('firstname', 'lastname', 'gender', 'date_of_birth', 'city', 'address_line_1', 'state');
					$data['signup_bonus'] = false;
					$data['message'] = '';
					foreach($signup_bonus_fields as $field)
					{
						if(!$player_detail[$field])
						{
							// With Signup Bonus
							//$message = "Congrats!! Your email is verfied. You are just one step behind to get the signup bonus. Please update your profile and your free 5 Sign up bonus will be credited to your account.";

							// Without Signup Bonus
							$message = "Congrats!! Your email is verfied. Please update your profile.";
							$data['message'] = $message;
							$data['signup_bonus'] = true;

							$data['pageTitle'] = "JackpotVilla Email Verification Page";
							$data['player_detail'] = $player_detail;
							$data['current_page'] = 'auth-confirm';
							$this->load->view('common/header', $data);
							$this->load->view('player/update', $data);
							$this->load->view('common/footer');
						}
					}
					if(!$data['signup_bonus'])
					{
						$data['pageTitle'] = "JackpotVilla Email Verification Page";
						$data['alert_message'] = 'Profile Updated Successfully!';
						//$data['message'] = "Congrats!! Your email is verfied and signup bonus is credited to your account.";
						$data['message'] = "Congrats!! Your email is verfied.";
						$data['current_page'] = 'auth-confirm';
				        $this->session->set_userdata("balance", $player_detail['balance']);
						$this->session->set_userdata("bonus", $player_detail['bonus']);
						$this->load->view('common/header', $data);
						$this->load->view('player/bonus_message', $data);
						$this->load->view('common/footer');
					}
				}
			}
		}
	}

	function resend()
	{
		$this->form_validation->set_rules("username", "Username", "required|min_length[5]|max_length[45]", array(
            'required' => 'Username cannot be empty'
        ));

        if ($this->form_validation->run() == FALSE)
        {
            $single_line_message = "";

            if (form_error("username")) {
                $single_line_message = form_error("username");
            }

            $data['pageTitle'] = "JackpotVilla Login Page";
            $data['form_values'] = $this->input->post();
            $data['error_message'] = $single_line_message;
			$data['status'] = $this->input->post('status');
			$data['current_page'] = 'auth-resend';

    		$this->load->view('common/header', $data);
            $this->load->view('/auth/login');
            $this->load->view('common/footer');
        }
        else
        {
            $headers = array(
                "Cache-Control: no-cache",
                "Content-Type: application/json"
            );

            $url = API_URL . '/auth/resend-verification-mail';
            $curl_data['url']       = $url;
            $curl_data['headers']   = $headers;
			$curl_data['post_data'] = $this->input->post();
			$curl_data['post_data'] = json_encode($curl_data['post_data']);
            $response = curl_post($curl_data);
            $response = json_decode($response, true);
            if($response && $response['success'])
            {
				$data['pageTitle'] = "JackpotVilla Login Page";
	            $data['form_values'] = $this->input->post();
	            $data['message'] = "The verification mail has been sent successfully. Please check your mail and verify your account";
				$data['status'] = $this->input->post('status');
				$data['current_page'] = 'auth-resend';

	    		$this->load->view('common/header', $data);
	            $this->load->view('/auth/login');
	            $this->load->view('common/footer');
            }
			else
			{
				$data['pageTitle'] = "JackpotVilla Login Page";
	            $data['form_values'] = $this->input->post();
	            $data['error_message'] = $response['message'];
				$data['status'] = $this->input->post('status');
				$data['current_page'] = 'auth-resend';

	    		$this->load->view('common/header', $data);
	            $this->load->view('/auth/login');
	            $this->load->view('common/footer');
			}
        }
	}

    function tnc_check($tnc)
    {
        if (!$tnc)
        {
            $this->form_validation->set_message('tnc_check', 'Please accept terms and conditions first');
            return false;
        }
        else
        {
            return true;
        }
    }
}
