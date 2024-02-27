<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function option()
	{
		$data['pageTitle'] = "JackpotVilla Deposit Option Page";
		$data['current_page'] = 'deposit-option';
		$data["unique_id"] = md5(uniqid(mt_rand(), true));
		$data['current_currency'] = $this->player_detail['currency'];
		$data['currency_symbol'] = $this->player_detail['currency_symbol'];
		$data['country_id'] = $this->player_detail['country_id'];
		$data['noof_deposits'] = $this->player_detail['noof_deposits'];
		//$data['noof_deposits'] = 0;
		$this->load->view('common/header', $data);
		$this->load->view('deposit/main_form');
		$this->load->view('common/footer');
	}

	function success()
	{
		$get_param_w = $this->input->get('w');
		log_message("debug", "Deposit Success");
		if($get_param_w == 'p')
		{
			$data['message'] = "Your transaction is pending for bank confirmation. Once your bank confirms, the amount will be credited to your account.";
		}
		else
		{
			$data['message'] = "Amount has been deposited to your Jackpot Villa account";
		}
		$data['pageTitle'] = "JackpotVilla Deposit Success Page";
		$data['message'] = "Amount has been deposited to your Jackpot Villa account";
		$data['current_page'] = 'deposit-success';
		$this->load->view('common/header', $data);
		$this->load->view('deposit/success', $data);
		$this->load->view('common/footer');
	}

	function pending()
	{
		$data['pageTitle'] = "JackpotVilla Deposit Pending Page";
		$data['message'] = "Your transaction is pending from the bank. We will notify you once its completed.";
		$data['current_page'] = 'deposit-pending';
		$this->load->view('common/header', $data);
		$this->load->view('deposit/pending', $data);
		$this->load->view('common/footer');
	}

	function fail()
	{
		$data['pageTitle'] = "JackpotVilla Deposit Fail Page";
		$data['message'] = "Some server issue. If amount has been deducted, please contact to our customer support.";
		$data['current_page'] = 'deposit-fail';
		$this->load->view('common/header', $data);
		$this->load->view('deposit/error', $data);
		$this->load->view('common/footer');
	}

	function crypto()
	{
		redirect('/');
	}

	function w88_response()
	{
		$get_params = $this->input->get();
		log_message("debug", "Deposit:: W88 Response");
		log_message("debug", json_encode($get_params));

		if($get_params['tx_action'] == 'PREAUTH')
		{
			redirect('/deposit/success?w=p');
		}
		else if($get_params['tx_action'] == 'SETTLEMENT' && $get_params['status'] == 'OK')
		{
			redirect('/deposit/success');
		}
		else
		{
			redirect('/deposit/w88_fail');
		}
	}

	function w88_fail()
	{
		$remaining_processors = $this->_check_remaining_processors();

		// Old code starts here, remove after testing
		/*
		$remaining_processors = [];
		$original_data = $this->session->userdata('original_data');
		if($original_data)
		{
			$remaining_processors = $original_data['remaining_processors'];
		}*/
		// Old code ends here, remove after testing

		if($this->input->post())
		{
			$this->_handle_failed_response('WALLET88', 'deposit-w88-fail');
			// Old code starts here, remove after testing
			/*
			if($original_data)
			{
				$payment_type = $original_data['payment_type'];
				$card_type = strtolower($original_data['card_type']);
				$amount = $original_data['amount'];

				$headers = array(
					"Cache-Control: no-cache",
					"Content-Type: application/json",
					"token: $this->token"
				);

				$post_data = array(
					'amount' => $amount,
					'payment_type' => $payment_type,
					'card_type' => $card_type
				);

				$url = API_URL . '/transaction';
				$curl_data['url']       = $url;
				$curl_data['headers']   = $headers;
				$curl_data['post_data'] = json_encode($post_data);
				$transaction_detail = curl_post($curl_data);

				log_message("debug", "Deposit:: W88 Fail Transaction Initiation Response");
				log_message("debug", json_encode($transaction_detail));

				$transaction_detail = json_decode($transaction_detail, true);
				if($transaction_detail)
				{
					if($transaction_detail['success'])
					{
						$original_data['transaction_id'] = $transaction_detail['transaction_id'];
						$original_data['current_gateway'] = "PAYOFIX";
						$original_data['gateway_response'] = [];

						$this->session->unset_userdata('original_data');

						$headers = array(
							"Cache-Control: no-cache",
							"Content-Type: application/json",
							"token: $this->token"
						);

						$url = API_URL . '/transaction/callback';
						$curl_data['url']       = $url;
						$curl_data['headers']   = $headers;
						$curl_data['post_data'] = json_encode($original_data);
						$transaction_detail = curl_post($curl_data);
						if($transaction_detail)
						{
							$transaction_detail = json_decode($transaction_detail, true);
							$this->_handle_response($transaction_detail);
						}
						else
						{
							$data['pageTitle'] = "JackpotVilla Deposit Submit Page";
							$data['message'] = "Some server issue. If amount is deducted, please contact to our customer support.";
							$data['current_page'] = 'deposit-w88-fail';
							$this->load->view('common/header', $data);
							$this->load->view('deposit/error', $data);
							$this->load->view('common/footer');
						}
					}
				}
			}
			*/
			// Old code ends here, remove after testing
		}
		else
		{
			$data['pageTitle'] = "JackpotVilla Deposit Pof Fail Page";
			if(count($remaining_processors))
			{
				$data['message'] = 'Some issue. Would you like to try again?';
				$data['options_left'] = 1;
				$data['action'] = '/deposit/w88_fail';
			}
			else
			{
				$data['message'] = 'Some issue. If the amount has been deducted from your bank. Please contact to our support.';
			}
			$data['current_page'] = 'deposit-w88-fail';
			$this->load->view('common/header', $data);
			$this->load->view('deposit/error', $data);
			$this->load->view('common/footer');
		}
	}

	function pof_fail()
	{
		log_message("debug", "Payofix Failed");

		$remaining_processors = $this->_check_remaining_processors();
		// Old code starts here, remove after testing
		/*
		$remaining_processors = [];
		$original_data = $this->session->userdata('original_data');
		if($original_data)
		{
			$remaining_processors = $original_data['remaining_processors'];
		}
		*/
		// Old code ends here, remove after testing

		if($this->input->post())
		{
			$this->_handle_failed_response('PAYOFIX', 'deposit-pof-fail');
			// Old code starts here, remove after testing
			/*
			if($original_data)
			{
				$payment_type = $original_data['payment_type'];
				$card_type = strtolower($original_data['card_type']);
				$amount = $original_data['amount'];

				$headers = array(
					"Cache-Control: no-cache",
					"Content-Type: application/json",
					"token: $this->token"
				);

				$post_data = array(
					'amount' => $amount,
					'payment_type' => $payment_type,
					'card_type' => $card_type
				);

				$url = API_URL . '/transaction';
				$curl_data['url']       = $url;
				$curl_data['headers']   = $headers;
				$curl_data['post_data'] = json_encode($post_data);
				$transaction_detail = curl_post($curl_data);

				log_message("debug", "Deposit:: POF Fail Transaction Initiation Response");
				log_message("debug", json_encode($transaction_detail));

				$transaction_detail = json_decode($transaction_detail, true);
				if($transaction_detail)
				{
					if($transaction_detail['success'])
					{
						$original_data['transaction_id'] = $transaction_detail['transaction_id'];
						$original_data['current_gateway'] = "PAYOFIX";
						$original_data['gateway_response'] = [];

						$this->session->unset_userdata('original_data');

						$headers = array(
							"Cache-Control: no-cache",
							"Content-Type: application/json",
							"token: $this->token"
						);

						$url = API_URL . '/transaction/callback';
						$curl_data['url']       = $url;
						$curl_data['headers']   = $headers;
						$curl_data['post_data'] = json_encode($original_data);
						$transaction_detail = curl_post($curl_data);
						if($transaction_detail)
						{
							$transaction_detail = json_decode($transaction_detail, true);
							$this->_handle_response($transaction_detail);
						}
						else
						{
							$data['pageTitle'] = "JackpotVilla Deposit Submit Page";
							$data['message'] = "Some server issue. If amount is deducted, please contact to our customer support.";
							$data['current_page'] = 'deposit-pof-fail';
							$this->load->view('common/header', $data);
							$this->load->view('deposit/error', $data);
							$this->load->view('common/footer');
						}
					}
				}
			}
			*/
			// Old code ends here, remove after testing
		}
		else
		{
			$data['pageTitle'] = "JackpotVilla Deposit Pof Fail Page";
			if(count($remaining_processors))
			{
				$data['message'] = 'Some issue. Would you like to try again?';
				$data['options_left'] = 1;
				$data['action'] = '/deposit/pof_fail';
			}
			else
			{
				$data['message'] = 'Some issue. If the amount has been deducted from your bank. Please contact to our support.';
			}
			$data['current_page'] = 'deposit-pof-fail';
			$this->load->view('common/header', $data);
			$this->load->view('deposit/error', $data);
			$this->load->view('common/footer');
		}
	}

	function gumballpay_response()
	{
		$params = $this->input->post();
		$headers = array(
			"Cache-Control: no-cache",
			"Content-Type: application/json",
			"token: $this->token"
		);

		$url = API_URL . '/transaction/gumballpay';
		$curl_data['url']       = $url;
		$curl_data['headers']   = $headers;
		$curl_data['post_data'] = json_encode($params);
		$response = curl_post($curl_data);

		$status = $params['status'];
		switch($status)
		{
			case 'declined':
			case 'error':
			case 'filtered':
				$remaining_processors = [];
				$original_data = $this->session->userdata('original_data');
				if($original_data)
				{
					$remaining_processors = $original_data['remaining_processors'];
				}

				$data['pageTitle'] = "JackpotVilla Deposit Gumballpay Response Page";
				if(count($remaining_processors))
				{
					$data['message'] = 'Some issue. Would you like to try again?';
					$data['options_left'] = 1;
					$data['action'] = '/deposit/gumballpay-fail';
				}
				else
				{
					$data['message'] = 'Some issue. If the amount has been deducted from your bank. Please contact to our support.';
				}
				$data['current_page'] = 'deposit-gumballpay-response';
				$this->load->view('common/header', $data);
				$this->load->view('deposit/error', $data);
				$this->load->view('common/footer');
				break;
			case 'approved':
				redirect('/deposit/success');
				break;
			default:
				$data['pageTitle'] = "JackpotVilla Deposit Submit Page";
				$data['message'] = "Your transaction is pending for bank confirmation. Once your bank confirms, the amount will be credited to your account.";
				$data['current_page'] = 'deposit-gumballpay-pending';
				$this->load->view('common/header', $data);
				$this->load->view('deposit/success', $data);
				$this->load->view('common/footer');
				break;
		}
	}

	function gumballpay_fail()
	{
		log_message("debug", "Gumballpay Failed");

		if($this->input->post())
		{
			$this->_handle_failed_response('GUMBALLPAY', 'deposit-gumballpay-fail');
		}
	}

	function paytechno()
	{
		// Old code starts here, remove after testing
		//$original_data = $this->session->userdata('original_data');
		if($this->input->post())
		{
			$this->_handle_failed_response('PAYTECHNO', 'deposit-paytechno-fail');
			/*
			if($original_data)
			{
				$payment_type = $original_data['payment_type'];
				$card_type = strtolower($original_data['card_type']);
				$amount = $original_data['amount'];

				$headers = array(
					"Cache-Control: no-cache",
					"Content-Type: application/json",
					"token: $this->token"
				);

				$post_data = array(
					'amount' => $amount,
					'payment_type' => $payment_type,
					'card_type' => $card_type
				);

				$url = API_URL . '/transaction';
				$curl_data['url']       = $url;
				$curl_data['headers']   = $headers;
				$curl_data['post_data'] = json_encode($post_data);
				$transaction_detail = curl_post($curl_data);

				log_message("debug", "Deposit:: Paytechno Fail Transaction Initiation Response");
				log_message("debug", json_encode($transaction_detail));

				$transaction_detail = json_decode($transaction_detail, true);
				if($transaction_detail)
				{
					if($transaction_detail['success'])
					{
						$original_data['transaction_id'] = $transaction_detail['transaction_id'];
						$original_data['current_gateway'] = "PAYTECHNO";
						$original_data['gateway_response'] = [];

						$this->session->unset_userdata('original_data');

						$headers = array(
							"Cache-Control: no-cache",
							"Content-Type: application/json",
							"token: $this->token"
						);

						$url = API_URL . '/transaction/callback';
						$curl_data['url']       = $url;
						$curl_data['headers']   = $headers;
						$curl_data['post_data'] = json_encode($original_data);
						$transaction_detail = curl_post($curl_data);
						if($transaction_detail)
						{
							$transaction_detail = json_decode($transaction_detail, true);
							$this->_handle_response($transaction_detail);
						}
						else
						{
							$data['pageTitle'] = "JackpotVilla Deposit Submit Page";
							$data['message'] = "Some server issue. If amount is deducted, please contact to our customer support.";
							$data['current_page'] = 'deposit-paytechno-fail';
							$this->load->view('common/header', $data);
							$this->load->view('deposit/error', $data);
							$this->load->view('common/footer');
						}
					}
				}
			}
			*/
			// Old code ends here, remove after testing
		}
		else
		{
			$get_params = $this->input->get();
			$transaction_status = (int)$get_params['StatusCode'];

			$headers = array(
				"Cache-Control: no-cache",
				"Content-Type: application/json",
				"token: $this->token"
			);

			$post_data = $get_params;

			$url = API_URL . '/transaction/paytechno';
			$curl_data['url']       = $url;
			$curl_data['headers']   = $headers;
			$curl_data['post_data'] = json_encode($post_data);
			$transaction_detail = curl_post($curl_data);

			if($transaction_status == 1)
			{
				redirect('/deposit/success');
			}
			else
			{
				// Old code starts here, remove after testing
				/*
				$remaining_processors = [];
				if($original_data)
				{
					$remaining_processors = $original_data['remaining_processors'];
				}
				*/
				// Old code ends here, remove after testing

				$remaining_processors = $this->_check_remaining_processors();

				$data['pageTitle'] = "JackpotVilla Deposit Paytechno Fail Page";
				if(count($remaining_processors))
				{
					$data['message'] = 'Some issue. Would you like to try again?';
					$data['options_left'] = 1;
					$data['action'] = '/deposit/paytechno';
				}
				else
				{
					$data['message'] = 'Some issue. If the amount has been deducted from your bank. Please contact to our support.';
				}
				$data['current_page'] = 'deposit-paytechno-fail';
				$this->load->view('common/header', $data);
				$this->load->view('deposit/error', $data);
				$this->load->view('common/footer');
			}
		}
	}

	function payclub()
	{
		log_message("debug", "Deposit:: Payclub Response");
		log_message("debug", json_encode($this->input->post()));
		log_message("debug", json_encode($this->input->get()));

		redirect('/deposit/success');
	}

	function trustly()
	{
		log_message("debug", "Deposit:: Trustly Response");
		log_message("debug", json_encode($this->input->get()));

		$get_params = $this->input->get();
		$result = $get_params['status'];

		if($result == 1)
		{
			redirect('/deposit/success');
		}
		else
		{
			$original_data = $this->session->userdata('original_data');
			$remaining_processors = [];
			if($original_data)
			{
				$remaining_processors = $original_data['remaining_processors'];
			}

			$data['pageTitle'] = "JackpotVilla Deposit Trustly Fail Page";
			if(count($remaining_processors))
			{
				$data['message'] = 'Some issue. Would you like to try again?';
				$data['options_left'] = 1;
				$data['action'] = '/deposit/trustly-fail';
			}
			else
			{
				$data['message'] = 'Some issue. If the amount has been deducted from your bank. Please contact to our support.';
			}
			$data['current_page'] = 'deposit-trustly';
			$this->load->view('common/header', $data);
			$this->load->view('deposit/error', $data);
			$this->load->view('common/footer');
		}
	}

	function greatpay()
	{
		log_message("debug", "Deposit:: Greatpay Response");
		log_message("debug", json_encode($this->input->get()));

		// Old code starts here, remove after testing
		//$original_data = $this->session->userdata('original_data');
		if($this->input->post())
		{
			$this->_handle_failed_response('GREATPAY', 'deposit-greatpay-fail');
			/*
			if($original_data)
			{
				$payment_type = $original_data['payment_type'];
				$card_type = strtolower($original_data['card_type']);
				$amount = $original_data['amount'];

				$headers = array(
					"Cache-Control: no-cache",
					"Content-Type: application/json",
					"token: $this->token"
				);

				$post_data = array(
					'amount' => $amount,
					'payment_type' => $payment_type,
					'card_type' => $card_type
				);

				$url = API_URL . '/transaction';
				$curl_data['url']       = $url;
				$curl_data['headers']   = $headers;
				$curl_data['post_data'] = json_encode($post_data);
				$transaction_detail = curl_post($curl_data);

				log_message("debug", "Deposit:: Greatpay Fail Transaction Initiation Response");
				log_message("debug", json_encode($transaction_detail));

				$transaction_detail = json_decode($transaction_detail, true);
				if($transaction_detail)
				{
					if($transaction_detail['success'])
					{
						$original_data['transaction_id'] = $transaction_detail['transaction_id'];
						$original_data['current_gateway'] = "GREATPAY";
						$original_data['gateway_response'] = [];

						$this->session->unset_userdata('original_data');

						$headers = array(
							"Cache-Control: no-cache",
							"Content-Type: application/json",
							"token: $this->token"
						);

						$url = API_URL . '/transaction/callback';
						$curl_data['url']       = $url;
						$curl_data['headers']   = $headers;
						$curl_data['post_data'] = json_encode($original_data);
						$transaction_detail = curl_post($curl_data);
						if($transaction_detail)
						{
							$transaction_detail = json_decode($transaction_detail, true);
							$this->_handle_response($transaction_detail);
						}
						else
						{
							$data['pageTitle'] = "JackpotVilla Deposit Submit Page";
							$data['message'] = "Some server issue. If amount is deducted, please contact to our customer support.";
							$data['current_page'] = 'deposit-paytechno-fail';
							$this->load->view('common/header', $data);
							$this->load->view('deposit/error', $data);
							$this->load->view('common/footer');
						}
					}
				}
			}*/
			// Old code ends here, remove after testing
		}
		else
		{
			$get_params = $this->input->get();
			$result = (int)$get_params['Reply'];

			$headers = array(
				"Cache-Control: no-cache",
				"Content-Type: application/json",
				"token: $this->token"
			);

			$post_data = $get_params;

			$url = API_URL . '/transaction/greatpay';
			$curl_data['url']       = $url;
			$curl_data['headers']   = $headers;
			$curl_data['post_data'] = json_encode($post_data);
			curl_post($curl_data);

			if($result == 0)
			{
				redirect('/deposit/success');
			}
			else
			{
				$remaining_processors = $this->_check_remaining_processors();
				// Old code starts here, remove after testing
				/*
				$original_data = $this->session->userdata('original_data');
				$remaining_processors = [];
				if($original_data)
				{
					$remaining_processors = $original_data['remaining_processors'];
				}
				*/
				// Old code ends here, remove after testing

				$data['pageTitle'] = "JackpotVilla Deposit Greatpay Fail Page";
				if(count($remaining_processors))
				{
					$data['message'] = 'Some issue. Would you like to try again?';
					$data['options_left'] = 1;
					$data['action'] = '/deposit/greatpay';
				}
				else
				{
					$data['message'] = 'Some issue. If the amount has been deducted from your bank. Please contact to our support.';
				}
				$data['current_page'] = 'deposit-greatpay';
				$this->load->view('common/header', $data);
				$this->load->view('deposit/error', $data);
				$this->load->view('common/footer');
			}
		}
	}

	function epiqcash()
	{
		log_message("debug", "Deposit:: Epiqcash Response");
		log_message("debug", json_encode($this->input->get()));

		// Old code starts here, remove after testing
		//$original_data = $this->session->userdata('original_data');
		if($this->input->post())
		{
			/*
			if($original_data)
			{
				$payment_type = $original_data['payment_type'];
				$card_type = strtolower($original_data['card_type']);
				$amount = $original_data['amount'];

				$headers = array(
					"Cache-Control: no-cache",
					"Content-Type: application/json",
					"token: $this->token"
				);

				$post_data = array(
					'amount' => $amount,
					'payment_type' => $payment_type,
					'card_type' => $card_type
				);

				$url = API_URL . '/transaction';
				$curl_data['url']       = $url;
				$curl_data['headers']   = $headers;
				$curl_data['post_data'] = json_encode($post_data);
				$transaction_detail = curl_post($curl_data);

				log_message("debug", "Deposit:: Epiqcash Fail Transaction Initiation Response");
				log_message("debug", json_encode($transaction_detail));

				$transaction_detail = json_decode($transaction_detail, true);
				if($transaction_detail)
				{
					if($transaction_detail['success'])
					{
						$original_data['transaction_id'] = $transaction_detail['transaction_id'];
						$original_data['current_gateway'] = "EPIQCASH";
						$original_data['gateway_response'] = [];

						$this->session->unset_userdata('original_data');

						$headers = array(
							"Cache-Control: no-cache",
							"Content-Type: application/json",
							"token: $this->token"
						);

						$url = API_URL . '/transaction/callback';
						$curl_data['url']       = $url;
						$curl_data['headers']   = $headers;
						$curl_data['post_data'] = json_encode($original_data);
						$transaction_detail = curl_post($curl_data);
						if($transaction_detail)
						{
							$transaction_detail = json_decode($transaction_detail, true);
							$this->_handle_response($transaction_detail);
						}
						else
						{
							$data['pageTitle'] = "JackpotVilla Deposit Submit Page";
							$data['message'] = "Some server issue. If amount is deducted, please contact to our customer support.";
							$data['current_page'] = 'deposit-epiqcash-fail';
							$this->load->view('common/header', $data);
							$this->load->view('deposit/error', $data);
							$this->load->view('common/footer');
						}
					}
				}
			}
			*/
			// Old code ends here, remove after testing
		}
		else
		{
			$get_params = $this->input->get();

			$headers = array(
				"Cache-Control: no-cache",
				"Content-Type: application/json",
				"token: $this->token"
			);

			$post_data = $get_params;
			$post_data['check_status'] = 1;

			$url = API_URL . '/transaction/epiqcash';
			$curl_data['url']       = $url;
			$curl_data['headers']   = $headers;
			$curl_data['post_data'] = json_encode($post_data);
			$payment_status = curl_post($curl_data);
			$payment_status = json_decode($payment_status, true);

			if(isset($get_params['cs']) && $get_params['cs'])
			{
				if($payment_status['success'])
				{
					if($payment_status['status'] == 'Success')
					{
						echo "SUCCESS";
					}
					else
					{
						echo "FAIL";
					}
				}
				else
				{
					echo "NO_STATUS";
				}
				exit;
			}
			if($payment_status['success'])
			{
				if($payment_status['status'] == 'Success')
				{
					redirect('/deposit/success');
				}
			}
			$data['pageTitle'] = "JackpotVilla Deposit Epiqcash Fail Page";
			$data['current_page'] = 'deposit-epiqcash';
			$data['tid'] = $get_params['transactionId'];
			$this->load->view('common/header', $data);
			$this->load->view('deposit/epiqcash', $data);
			$this->load->view('common/footer');
		}
	}

	function epiqcash_fail()
	{
		// Old code ends here, remove after testing
		/*
		$original_data = $this->session->userdata('original_data');
		$remaining_processors = [];
		if($original_data)
		{
			$remaining_processors = $original_data['remaining_processors'];
		}
		*/
		// Old code ends here, remove after testing

		$remaining_processors = $this->_check_remaining_processors();

		$data['pageTitle'] = "JackpotVilla Deposit Epiqcash Fail Page";
		if(count($remaining_processors))
		{
			$data['message'] = 'Some issue. Would you like to try again?';
			$data['options_left'] = 1;
			$data['action'] = '/deposit/epiqcash';
		}
		else
		{
			$data['message'] = 'Some issue. If the amount has been deducted from your bank. Please contact to our support.';
		}
		$data['current_page'] = 'deposit-epiqcash';
		$this->load->view('common/header', $data);
		$this->load->view('deposit/error', $data);
		$this->load->view('common/footer');
	}

	function cm_fail()
	{
		if($this->input->post())
		{
			$this->_handle_failed_response('CAPITAL_MANAGEMENT', 'deposit-cm-fail');
		}
		else
		{
			$remaining_processors = $this->_check_remaining_processors();

			$data['pageTitle'] = "JackpotVilla Deposit Capital Management Fail Page";
			if(count($remaining_processors))
			{
				$data['message'] = 'Some issue. Would you like to try again?';
				$data['options_left'] = 1;
				$data['action'] = '/deposit/cm-fail';
			}
			else
			{
				$data['message'] = 'Some issue. If the amount has been deducted from your bank. Please contact to our support.';
			}
			$data['current_page'] = 'deposit-cm-fail';
			$this->load->view('common/header', $data);
			$this->load->view('deposit/error', $data);
			$this->load->view('common/footer');
		}
	}

	function cm_pending()
	{
		$get_params = $this->input->get();

		$headers = array(
			"Cache-Control: no-cache",
			"Content-Type: application/json",
			"token: $this->token"
		);

		$post_data = $get_params;
		$post_data['check_status'] = 1;

		$url = API_URL . '/transaction/cm';
		$curl_data['url']       = $url;
		$curl_data['headers']   = $headers;
		$curl_data['post_data'] = json_encode($post_data);
		$payment_status = curl_post($curl_data);
		$payment_status = json_decode($payment_status, true);

		if(isset($get_params['cs']) && $get_params['cs'])
		{
			if($payment_status['success'])
			{
				if($payment_status['status'] == 'Success')
				{
					echo "SUCCESS";
				}
				else
				{
					echo "FAIL";
				}
			}
			else
			{
				echo "NO_STATUS";
			}
			exit;
		}
		if($payment_status['success'])
		{
			if($payment_status['status'] == 'Success')
			{
				redirect('/deposit/success');
			}
		}
		$data['pageTitle'] = "JackpotVilla Deposit CM Pending Page";
		$data['current_page'] = 'deposit-epiqcash';
		$data['tid'] = $get_params['order_id'];
		$this->load->view('common/header', $data);
		$this->load->view('deposit/epiqcash', $data);
		$this->load->view('common/footer');
	}

	function neonpay()
	{
		$order_id = $_COOKIE['neonpay_id'];

		$headers = array(
			"Cache-Control: no-cache",
			"Content-Type: application/json",
			"token: $this->token"
		);

	    $url = API_URL . '/transaction/neonpay?order_id=' . $order_id;
	    $curl_data['url']       = $url;
	    $curl_data['headers']   = $headers;
	    $response = curl_get($curl_data);

		log_message("debug", json_encode($curl_data));
		log_message("debug", $response);

	    $response = json_decode($response, true);

		if($response['success'])
		{
			switch($response['message'])
			{
				case 'Success':
					redirect('/deposit/success');
					break;
				case 'Failed':
					redirect('/deposit/fail');
					break;
				default:
					redirect('/deposit/pending');
					break;
			}
		}
		else
		{
			redirect('/deposit/fail');
		}
	}

    // Old Method
    /*
    function paympire()
	{
        if(!empty($_GET['acs']))
        {
            $headers = array(
				"Cache-Control: no-cache",
				"Content-Type: application/json",
				"token: $this->token"
			);

			$post_data = array(
				'threeDSRef' => $this->session->userdata('threeDSRef'),
				'threeDSResponse' => $_POST
			);

			$url = API_URL . '/transaction/paympire';
			$curl_data['url']       = $url;
			$curl_data['headers']   = $headers;
			$curl_data['put_data'] = json_encode($post_data);
			$transaction_detail = curl_put($curl_data);

            $transaction_detail = json_decode($transaction_detail, true);
            $result = $transaction_detail['result'];
            switch($result)
            {
                case 'SUCCESS':
                    redirect('/deposit/success');
                    break;
                case 'PENDING':
                    $data['res'] = $transaction_detail['data']['form'];

                    $this->session->set_userdata("threeDSRef", $data['res']['threeDSRef']);
                    $this->session->set_userdata("threeDSRequest", $data['res']['threeDSRequest']);
                    $this->session->set_userdata("threeDSURL", $data['res']['threeDSURL']);
                    $this->session->set_userdata("target", $data['res']['target']);
                    $this->load->view('deposit/paympire_iframe', $data);
                    break;
                default:
                    redirect('/deposit/fail');
                    break;
            }
        }
        else
        {
            redirect('/deposit/fail');
        }
	}
    */

    function paympire()
	{
        $data = $this->input->get();
        if($data['status'] == 'success')
        {
            redirect('/deposit/success');
        }
        else
        {
            $remaining_processors = $this->_check_remaining_processors();

            $data['pageTitle'] = "JackpotVilla Deposit Paympire Fail Page";
			if(count($remaining_processors))
			{
				$data['message'] = 'Some issue. Would you like to try again?';
				$data['options_left'] = 1;
				$data['action'] = '/deposit/paympire_fail';
			}
			else
			{
				$data['message'] = 'Some issue. If the amount has been deducted from your bank. Please contact to our support.';
			}
			$data['current_page'] = 'deposit-paympire-fail';
			$this->load->view('common/header', $data);
			$this->load->view('deposit/error', $data);
			$this->load->view('common/footer');
        }
	}

    function paympire_fail()
	{
        if($this->input->post())
		{
            $this->_handle_failed_response('PAYMPIRE', 'deposit-paympire-fail');
        }
	}

    function paypound()
	{
        $data = $this->input->get();
        if($data['status'] == 'success')
        {
            redirect('/deposit/success');
        }
        else
        {
            $remaining_processors = $this->_check_remaining_processors();

            $data['pageTitle'] = "JackpotVilla Deposit Paypound Fail Page";
			if(count($remaining_processors))
			{
				$data['message'] = 'Some issue. Would you like to try again?';
				$data['options_left'] = 1;
				$data['action'] = '/deposit/paypound_fail';
			}
			else
			{
				$data['message'] = 'Some issue. If the amount has been deducted from your bank. Please contact to our support.';
			}
			$data['current_page'] = 'deposit-paypound-fail';
			$this->load->view('common/header', $data);
			$this->load->view('deposit/error', $data);
			$this->load->view('common/footer');
        }
	}

    function paydot()
	{
        if(!empty($_GET['acs']))
        {
            $headers = array(
				"Cache-Control: no-cache",
				"Content-Type: application/json",
				"token: $this->token"
			);

			$post_data = array(
				'threeDSRef' => $this->session->userdata('threeDSRef'),
				'threeDSResponse' => $_POST
			);

			$url = API_URL . '/transaction/paydot';
			$curl_data['url']       = $url;
			$curl_data['headers']   = $headers;
			$curl_data['put_data'] = json_encode($post_data);
			$transaction_detail = curl_put($curl_data);

            $transaction_detail = json_decode($transaction_detail, true);
            $result = $transaction_detail['result'];
            switch($result)
            {
                case 'SUCCESS':
                    redirect('/deposit/success');
                    break;
                case 'PENDING':
                    $data['res'] = $transaction_detail['data']['form'];

                    $this->session->set_userdata("threeDSRef", $data['res']['threeDSRef']);
                    $this->session->set_userdata("threeDSRequest", $data['res']['threeDSRequest']);
                    $this->session->set_userdata("threeDSURL", $data['res']['threeDSURL']);
                    $this->session->set_userdata("target", $data['res']['target']);
                    $this->load->view('deposit/paympire_iframe', $data);
                    break;
                default:
                    redirect('/deposit/fail');
                    break;
            }
        }
        else
        {
            redirect('/deposit/fail');
        }
	}

    function paydot_fail()
	{
        if($this->input->post())
		{
            $this->_handle_failed_response('PAYDOT', 'deposit-paydot-fail');
        }
	}

    function paypound_fail()
	{
        if($this->input->post())
		{
            $this->_handle_failed_response('PAYPOUND', 'deposit-paypound-fail');
        }
	}

	function card_process()
	{
		$redirect_card_types = array('btc', 'eth', 'satx', 'grt', 'neosurf', 'emt', 'nexxa', 'sofort', 'trustly', 'poly', 'direct_banking', 'phoenix', 'bnp_pay_by_bank', 'kevin');
		if(!$this->input->post('payment_type') || !$this->input->post('card_type'))
		{
			echo '<script type="text/javascript">window.alert("Payment mode can not be empty"); window.location.href="/deposit/option"</script>';
			exit;
		}

		if(!in_array($this->input->post('card_type'), $redirect_card_types))
		{
			$this->form_validation->set_rules("amount", "Amount", "numeric|required|greater_than[19]", array(
				'required' => 'Amount can not be empty',
				'greater_than' => 'Minimum deposit is 20'
			));

			if($this->input->post('card_type') == 'eft')
			{
				$this->form_validation->set_rules("institution_number", "Institution Number", "required", array(
		            'required' => 'Institution number cannot be empty'
		        ));
		        $this->form_validation->set_rules("routing_no", "Routing Number", "required", array(
		            'required' => 'Routing number cannot be empty'
		        ));
		        $this->form_validation->set_rules("account_no", "Account Number", "required", array(
		            'required' => 'Account number cannot be empty'
		        ));
			}
			else if($this->input->post('card_type') == 'flexepin')
			{
				$this->form_validation->set_rules("voucher_number", "Voucher Number", "required", array(
		            'required' => 'Voucher number cannot be empty'
		        ));
			}
			else
			{
				$this->form_validation->set_rules("card_number", "Card Number", "required|callback_check_card_number", array(
		            'required' => 'Card number cannot be empty'
		        ));
		        $this->form_validation->set_rules("card_expiry_year", "Card Expiry Year", "required", array(
		            'required' => 'Card expiry year cannot be empty'
		        ));
		        $this->form_validation->set_rules("card_expiry_month", "Card Expiry Month", "required", array(
		            'required' => 'Card expiry month cannot be empty'
		        ));
		        $this->form_validation->set_rules("card_cvv", "Card CVV", "required|min_length[3]|max_length[3]", array(
		            'required' => 'Card CVV cannot be empty'
		        ));
			}

			if ($this->form_validation->run() == FALSE)
	        {
	            $single_line_message = "";

	            if (form_error("card_number") && $single_line_message == "") {
	                $single_line_message = form_error("card_number");
	            }
	            if (form_error("card_expiry_year") && $single_line_message == "") {
	                $single_line_message = form_error("card_expiry_year");
	            }
	            if (form_error("card_expiry_month") && $single_line_message == "") {
	                $single_line_message = form_error("card_expiry_month");
	            }
	            if (form_error("card_cvv") && $single_line_message == "") {
	                $single_line_message = form_error("card_cvv");
	            }
				if (form_error("amount") && $single_line_message == "") {
	                $single_line_message = form_error("amount");
	            }
				if (form_error("institution_number") && $single_line_message == "") {
	                $single_line_message = form_error("institution_number");
	            }
	            if (form_error("routing_no") && $single_line_message == "") {
	                $single_line_message = form_error("routing_no");
	            }
				if (form_error("account_no") && $single_line_message == "") {
	                $single_line_message = form_error("account_no");
	            }
				if (form_error("voucher_number") && $single_line_message == "") {
	                $single_line_message = form_error("voucher_number");
	            }

				echo '<script type="text/javascript">window.alert("' . $single_line_message . '"); window.location.href="/deposit/option"</script>';
				exit;
	        }
		}
		else
		{
			if($this->input->post('payment_type') != 'crypto')
			{
				$this->form_validation->set_rules("amount", "Amount", "numeric|required|greater_than[19]", array(
					'required' => 'Amount can not be empty',
					'greater_than' => 'Minimum deposit is 20'
				));

				if ($this->form_validation->run() == FALSE)
		        {
		            $single_line_message = "";

					if (form_error("amount") && $single_line_message == "") {
		                $single_line_message = form_error("amount");
		            }

					echo '<script type="text/javascript">window.alert("' . $single_line_message . '"); window.location.href="/deposit/option"</script>';
					exit;
		        }
			}
		}

		/*if($this->input->post('card_type') == 'neosurf')
        {
            echo '<script type="text/javascript">window.alert("This method is temporarily blocked. Please try another method."); window.location.href="/deposit/option"</script>';
            exit;
        }*/

		$payment_type = $this->input->post('payment_type');
		$card_type = $this->input->post('card_type');
		$amount = $this->input->post('amount');
		$unique_id = $this->input->post('unique_id');
		$card_number = $this->input->post('card_number') ? str_replace('-', '', $this->input->post('card_number')) : '';
		if($this->input->post('card_type') == 'flexepin')
		{
			$card_number = str_replace('-', '', $this->input->post('voucher_number'));
		}
		$card_expiry_year = $this->input->post('card_expiry_year');
		$card_expiry_month = $this->input->post('card_expiry_month');
		$card_cvv = $this->input->post('card_cvv');
		$card_holder_name = $this->input->post('card_holder_name');
		$institution_number = $this->input->post('institution_number');
		$routing_no = $this->input->post('routing_no');
		$account_no = $this->input->post('account_no');
		$coupon_code = $this->input->post('coupon_code');

		$headers = array(
			"Cache-Control: no-cache",
			"Content-Type: application/json",
			"token: $this->token"
		);

		$post_data = array(
			'amount' => $amount ? $amount : 0,
			'payment_type' => $payment_type,
			'card_type' => $card_type,
			'callback' => base_url() . '/deposit/crypto'
		);

		//$post_data = $this->input->post();

		$url = API_URL . '/transaction';
		$curl_data['url']       = $url;
		$curl_data['headers']   = $headers;
		$curl_data['post_data'] = json_encode($post_data);
		$transaction_detail = curl_post($curl_data);

		log_message("debug", "Deposit:: Card Process Transaction Initiation Response");
		log_message("debug", json_encode($transaction_detail));

		$transaction_detail = json_decode($transaction_detail, true);
		if($transaction_detail)
		{
			if($transaction_detail['success'])
			{
				if($transaction_detail['redirect_url'])
				{
					redirect($transaction_detail['redirect_url']);
				}
				else
				{
					$ipaddress = get_ip_address();
					$website = SERVER_URL;

					$post_data['transaction_id'] = $transaction_detail['transaction_id'];
	                $post_data['unique_id'] = $unique_id;
					$post_data['card_holder_name'] = $card_holder_name;
					$post_data['card_number'] = $card_number;
					$post_data['card_expiry_year'] = $card_expiry_year;
					$post_data['card_expiry_month'] = $card_expiry_month;
					$post_data['card_cvv'] = $card_cvv;
					$post_data['coupon_code'] = $coupon_code;
					$post_data['ipaddress'] = $ipaddress;
					$post_data['website'] = $website;
					$post_data['amount'] = $amount;
					$post_data['institution_number'] = $institution_number;
					$post_data['routing_no'] = $routing_no;
					$post_data['account_no'] = $account_no;

                    $device_data = array(
                        'deviceChannel' => 'browser',
                        'deviceIdentity' => (isset($_SERVER['HTTP_USER_AGENT']) ? htmlentities($_SERVER['HTTP_USER_AGENT']) : null),
                        'deviceTimeZone' => '0',
                        'deviceCapabilities' => '',
                        'deviceScreenResolution' => '1x1x1',
                        'deviceAcceptContent' => (isset($_SERVER['HTTP_ACCEPT']) ? htmlentities($_SERVER['HTTP_ACCEPT']) : null),
                        'deviceAcceptEncoding' => (isset($_SERVER['HTTP_ACCEPT_ENCODING']) ? htmlentities($_SERVER['HTTP_ACCEPT_ENCODING']) : null),
                        'deviceAcceptLanguage' => (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? htmlentities($_SERVER['HTTP_ACCEPT_LANGUAGE']) : null),
                        'deviceAcceptCharset' => (isset($_SERVER['HTTP_ACCEPT_CHARSET']) ? htmlentities($_SERVER['HTTP_ACCEPT_CHARSET']) : null),
                    );

                    $post_data['browser_info'] = $device_data;

					$headers = array(
						"Cache-Control: no-cache",
						"Content-Type: application/json",
						"token: $this->token"
					);

					$curl_data['headers']   = $headers;
					$curl_data['post_data'] = json_encode($post_data);
					$url = API_URL . 'transaction/complete';
					$curl_data['url']       = $url;

					$transaction_detail = curl_post($curl_data);
					log_message("debug", "Transaction Completed");
					log_message("debug", $transaction_detail);
					if($transaction_detail)
					{
						$transaction_detail = json_decode($transaction_detail, true);
						$this->_handle_response($transaction_detail);
					}
					else
					{
						$data['pageTitle'] = "JackpotVilla Deposit Submit Page";
						$data['message'] = "Some server issue. If amount is deducted, please contact to our customer support.";
						$data['current_page'] = 'deposit-card-process';
						$this->load->view('common/header', $data);
						$this->load->view('deposit/error', $data);
						$this->load->view('common/footer');
					}
				}
			}
			else
			{
				echo '<script type="text/javascript">window.alert("' . $transaction_detail['message'] . '"); window.location.href="/deposit/option"</script>';
				exit;
			}
		}
	}

	function apply_coupon()
	{
		$coupon_code = $this->input->get('cc');
		$depositing_amount = $this->input->get('da');
		if(!$coupon_code)
		{
			$response = [
				"error" => 1,
				"message" => "Coupon code can not be empty"
			];
			echo json_encode($response);
			exit;
		}
		if(!$depositing_amount)
		{
			$response = [
				"error" => 1,
				"message" => "Deposit amount can not be empty"
			];
			echo json_encode($response);
			exit;
		}
		$post_data['coupon_code'] = $coupon_code;
		$post_data['depositing_amount'] = $depositing_amount;

		$headers = array(
			"Cache-Control: no-cache",
			"Content-Type: application/json",
			"token: $this->token"
		);

		$curl_data['headers']   = $headers;
		$curl_data['post_data'] = json_encode($post_data);
		$url = API_URL . 'coupon/check';
		$curl_data['url']       = $url;

		$coupon_detail = curl_post($curl_data);
		if(!$coupon_detail)
		{
			$response = [
				"error" => 1,
				"message" => "Some issue occured while applying coupon code. Please contact to our support"
			];
			echo json_encode($response);
			exit;
		}
		$coupon_detail = json_decode($coupon_detail, true);
		if(!$coupon_detail['success'])
		{
			$response = [
				"error" => 1,
				"message" => $coupon_detail['message']
			];
			echo json_encode($response);
			exit;
		}
		$response = [
			"error" => 0,
			"amount" => $coupon_detail['amount'],
			"r_type" => $coupon_detail['reward_type']
		];
		echo json_encode($response);
	}

	private function _handle_response($transaction_detail)
	{
		if($transaction_detail['success'])
		{
			$transaction_result = $transaction_detail['result'];
			switch($transaction_result)
			{
				case 'SUCCESS':
					$this->session->set_userdata("balance", $transaction_detail['balance']);
					$this->session->set_userdata("deposit", $transaction_detail['deposit']);
					$this->session->set_userdata("withdraw_onhold", $transaction_detail['withdraw_onhold']);
					$this->session->set_userdata("bonus", $transaction_detail['bonus']);
					$data['current_page'] = 'deposit-success';
					if($transaction_detail['noof_deposits'] == 1)
					{
						$data['current_page'] = 'deposit-first-success';
					}
					$data['pageTitle'] = "JackpotVilla Deposit Submit Page";
					$data['message'] = "Amount has been deposited to your Jackpot Villa account";
					$data['transaction_id'] = $transaction_detail['transaction_id'];
					$data['amount'] = $transaction_detail['amount'];
					$data['currency'] = $this->session->userdata('currency');
					$data['player_id'] = $this->player_detail['id'];
					$data['stored_vars'] = $this->player_detail['affiliate_variables'] ? json_decode($this->player_detail['affiliate_variables'], true) : '';
					$data['coupon_message'] = $transaction_detail['coupon_message'];
					$data['transaction_details'] = $transaction_detail;
					$data['response'] = $transaction_detail['gateway_response'];
					$this->load->view('common/header', $data);
					$this->load->view('deposit/success', $data);
					$this->load->view('common/footer');
					break;
				case 'PENDING':
					$data['pageTitle'] = "JackpotVilla Deposit Submit Page";
					$data['message'] = $transaction_detail['message'] ? $transaction_detail['message'] : "Your transaction is pending for bank confirmation. Once your bank confirms, the amount will be credited to your account.";
					$data['transaction_details'] = $transaction_detail;
					$data['response'] = $transaction_detail['gateway_response'];
					$data['current_page'] = 'deposit-pending';
					$this->session->set_userdata("original_data", $transaction_detail['original_data']);
					log_message("debug", json_encode($transaction_detail));
					if(isset($transaction_detail['gateway_response']) && $transaction_detail['gateway_response'] &&  isset($transaction_detail['gateway_response']['redirect_method']) && $transaction_detail['gateway_response']['redirect_method'])
					{
						set_cookie('neonpay_id', $transaction_detail['gateway_response']['order_id'],'3600');
						log_message("debug", "Redirected Neonpay Pending");
						$this->load->view('common/header', $data);
						$this->load->view('deposit/neonpay', $data);
						$this->load->view('common/footer');
					}
					else if(isset($transaction_detail['redirect_url']) && $transaction_detail['redirect_url'])
					{
						log_message("debug", "Redirected Pending");
						redirect($transaction_detail['redirect_url']);
					}
					if(isset($transaction_detail['gateway_response']['data']) && $transaction_detail['gateway_response']['data'] &&  isset($transaction_detail['gateway_response']['data']['content_type']) && $transaction_detail['gateway_response']['data']['content_type'] != 'url')
					{
						$data['html_content'] = $transaction_detail['gateway_response']['data']['content'];
						$this->load->view('deposit/w88_iframe', $data);
					}
                    else if(isset($transaction_detail['gateway_response']['form']) && $transaction_detail['gateway_response']['form'])
					{
						$data['res'] = $transaction_detail['gateway_response']['form'];

                        $this->session->set_userdata("threeDSRef", $data['res']['threeDSRef']);
                        $this->session->set_userdata("threeDSRequest", $data['res']['threeDSRequest']);
                        $this->session->set_userdata("threeDSURL", $data['res']['threeDSURL']);
                        $this->session->set_userdata("target", $data['res']['target']);
						$this->load->view('deposit/paympire_iframe', $data);
                        //redirect($data['res']['redirectUrl']);
					}
					else
					{
						$this->load->view('common/header', $data);
						$this->load->view('deposit/success', $data);
						$this->load->view('common/footer');
					}
					break;
				case 'INITIATED':
					$data['pageTitle'] = "JackpotVilla Deposit Submit Page";
					$data['message'] = $transaction_detail['message'];
					$data['transaction_details'] = $transaction_detail;
					$data['response'] = $transaction_detail['gateway_response'];
					$data['current_page'] = 'deposit-initiated';
					$this->session->set_userdata("original_data", $transaction_detail['original_data']);
					$this->load->view('common/header', $data);
					$this->load->view('deposit/success', $data);
					$this->load->view('common/footer');
					log_message("debug", json_encode($transaction_detail));
					if(isset($transaction_detail['redirect_url']) && $transaction_detail['redirect_url'])
					{
						log_message("debug", "Redirected Initiated");
						redirect($transaction_detail['redirect_url']);
					}
					break;
			}
		}
		else
		{
			$data['pageTitle'] = "JackpotVilla Deposit Submit Page";
			$data['message'] = $transaction_detail['message'];
			$data['card_type'] = $transaction_detail['card_type'];
			$data['amount'] = $transaction_detail['amount'];
			if($transaction_detail['card_type'] == 'VISA' || $transaction_detail['card_type'] == 'MASTER')
			{
				//$data['message'] = $data['message'] . '. Please try our new, secure Visa or Mastercard via BTC deposit option';
			}
			$data['current_page'] = 'deposit-fail';
			$this->load->view('common/header', $data);
			$this->load->view('deposit/error', $data);
			$this->load->view('common/footer');
		}
	}

	private function _handle_failed_response($current_gateway, $current_page)
	{
		$original_data = $this->session->userdata('original_data');
		if($original_data)
		{
			$payment_type = $original_data['payment_type'];
			$card_type = strtolower($original_data['card_type']);
			$amount = $original_data['amount'];

			$headers = array(
				"Cache-Control: no-cache",
				"Content-Type: application/json",
				"token: $this->token"
			);

			$post_data = array(
				'amount' => $amount,
				'payment_type' => $payment_type,
				'card_type' => $card_type
			);

			$url = API_URL . '/transaction';
			$curl_data['url']       = $url;
			$curl_data['headers']   = $headers;
			$curl_data['post_data'] = json_encode($post_data);
			$transaction_detail = curl_post($curl_data);

			log_message("debug", "Deposit:: Handle Failed Response Transaction Initiate Response");
			log_message("debug", json_encode($transaction_detail));

			$transaction_detail = json_decode($transaction_detail, true);
			if($transaction_detail)
			{
				if($transaction_detail['success'])
				{
					$original_data['transaction_id'] = $transaction_detail['transaction_id'];
					$original_data['current_gateway'] = $current_gateway;
					$original_data['gateway_response'] = [];

					$this->session->unset_userdata('original_data');

					$headers = array(
						"Cache-Control: no-cache",
						"Content-Type: application/json",
						"token: $this->token"
					);

					$url = API_URL . '/transaction/callback';
					$curl_data['url']       = $url;
					$curl_data['headers']   = $headers;
					$curl_data['post_data'] = json_encode($original_data);
					$transaction_detail = curl_post($curl_data);
					if($transaction_detail)
					{
						$transaction_detail = json_decode($transaction_detail, true);
						$this->_handle_response($transaction_detail);
					}
					else
					{
						$data['pageTitle'] = "JackpotVilla Deposit Submit Page";
						$data['message'] = "Some server issue. If amount is deducted, please contact to our customer support.";
						$data['current_page'] = $current_page;
						$this->load->view('common/header', $data);
						$this->load->view('deposit/error', $data);
						$this->load->view('common/footer');
					}
				}
			}
		}
	}

	private function _check_remaining_processors()
	{
		$remaining_processors = [];
		$original_data = $this->session->userdata('original_data');
		if($original_data)
		{
			$remaining_processors = $original_data['remaining_processors'];
		}

		return $remaining_processors;
	}

	function check_card_number($card_number)
	{
		$card_number = str_replace('-', '', $card_number);
		if(!is_numeric($card_number))
		{
			$this->form_validation->set_message('check_card_number', 'Card number must be numeric');
            return false;
		}
		if(strlen($card_number) > 16)
		{
			$this->form_validation->set_message('check_card_number', 'Card number should not be greater than 16 digits');
            return false;
		}
		if(strlen($card_number) < 13)
		{
			$this->form_validation->set_message('check_card_number', 'Card number should not be less than 13 digits');
            return false;
		}
		return true;
	}
}
