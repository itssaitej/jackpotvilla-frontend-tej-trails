<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Withdraw extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

    function index()
    {
        /*$this->form_validation->set_rules("type", "Withdraw Type", "required", array(
            'required' => 'Withdraw type cannot be empty'
        ));
        $this->form_validation->set_rules("account_number", "Account Number", "required|numeric", array(
            'required' => 'Account number cannot be empty'
        ));
        $this->form_validation->set_rules("confirm_account_number", "Re-Enter Account Number", "required|numeric|callback_check_account_number", array(
            'required' => 'Re-Enter account number cannot be empty'
        ));
        $this->form_validation->set_rules("account_holder", "Account Holder", "required", array(
            'required' => 'Account holder cannot be empty'
        ));
		$this->form_validation->set_rules("bank_name", "Bank Name", "required", array(
            'required' => 'Bank name cannot be empty'
        ));
        $this->form_validation->set_rules("ifsc_code", "IFSC Code", "required", array(
            'required' => 'IFSC code cannot be empty'
        ));*/
		$data = $this->input->post();

		$this->form_validation->set_rules("amount", "Amount", "required|numeric|callback_check_amount", array(
            'required' => 'Amount cannot be empty'
        ));
        if ($this->form_validation->run() == FALSE)
        {
            $single_line_message = "";

            if (form_error("amount"))
			{
                $single_line_message = form_error("amount");
            }
            /*if (form_error("account_number") && $single_line_message == "") {
                $single_line_message = form_error("account_number");
            }
            if (form_error("confirm_account_number") && $single_line_message == "") {
                $single_line_message = form_error("confirm_account_number");
            }
            if (form_error("account_holder") && $single_line_message == "") {
                $single_line_message = form_error("account_holder");
            }
			if (form_error("bank_name") && $single_line_message == "") {
                $single_line_message = form_error("bank_name");
            }
            if (form_error("ifsc_code") && $single_line_message == "") {
                $single_line_message = form_error("ifsc_code");
            }
            if (form_error("amount") && $single_line_message == "") {
                $single_line_message = form_error("amount");
            }*/

			$data['pageTitle'] = "JackpotVilla Withdraw Page";
            $data['error_message'] = $single_line_message;
			$data['current_page'] = 'withdraw-index';

			$this->load->view('common/header', $data);
			$this->load->view('withdraw/main_form', $data);
			$this->load->view('common/footer');
        }
		else
		{
			$url = API_URL . '/withdraw';

			$post_data = $this->input->post();

			$headers = array(
				"Cache-Control: no-cache",
				"Content-Type: application/json",
				"token: $this->token"
			);

			$curl_data['url']       = $url;
			$curl_data['headers']   = $headers;
			$curl_data['post_data'] = json_encode($post_data);

			$response = curl_post($curl_data);
			if($response)
			{
				$response = json_decode($response, true);
				if($response['success'])
				{
					$this->session->set_userdata("balance", $response['balance']);
					$this->session->set_userdata("deposit", $response['deposit']);
					$this->session->set_userdata("withdraw_onhold", $response['withdraw_onhold']);
					$this->session->set_userdata("bonus", $response['bonus']);
					$data['pageTitle'] = "JackpotVilla Withdraw Page";
					$data['current_page'] = 'withdraw-index';
					$this->load->view('common/header', $data);
					$this->load->view('withdraw/success', $data);
					$this->load->view('common/footer');
				}
				else
				{
					$data['pageTitle'] = "JackpotVilla Withdraw Page";
					$data['error_message'] = $response['message'];
					$data['current_page'] = 'withdraw-index';
					$this->load->view('common/header', $data);
					$this->load->view('withdraw/main_form', $data);
					$this->load->view('common/footer');
				}
			}
			else
			{
				$data['pageTitle'] = "JackpotVilla Withdraw Page";
				$data['error_message'] = "Some server issue. Please contact to our customer support.";
				$data['current_page'] = 'withdraw-index';
				$this->load->view('common/header', $data);
				$this->load->view('withdraw/main_form', $data);
				$this->load->view('common/footer');
			}
		}
    }

	function cancel()
	{
		$withdraw_id = $this->input->get('ref_id');
		if(!$withdraw_id)
		{
			$arr['balance'] = $this->player_detail['balance'];
			echo json_encode($arr);
			exit;
		}

		$url = API_URL . '/withdraw/cancel';

		$post_data = [
			"withdraw_id" => $withdraw_id
		];

		$headers = array(
			"Cache-Control: no-cache",
			"Content-Type: application/json",
			"token: $this->token"
		);

		$curl_data['url']       = $url;
		$curl_data['headers']   = $headers;
		$curl_data['post_data'] = json_encode($post_data);

		$response = curl_post($curl_data);
		echo $response;
	}

    function check_account_number($confirm_account_number)
    {
        $account_number = $this->input->post('account_number');
        if($account_number != $confirm_account_number)
        {
            $this->form_validation->set_message('check_account_number', 'Account number does not match');
            return false;
        }
        return true;
    }

    function check_amount($amount)
    {
		$player_details = $this->player_detail;
		$cash_balance = $player_details['cash_balance'];
        $remaining_bonus = $player_details['bonus'];
        $bonus_given = $player_details['last_bonus'];
        $win_bonus = $player_details['win_bonus'];
        $withdraw_limit = $cash_balance + $win_bonus + $remaining_bonus - $bonus_given;

        if($amount < 50)
        {
            $this->form_validation->set_message('check_amount', 'Minimum withdraw is 50');
            return false;
        }
        if($amount > $withdraw_limit)
        {
            $this->form_validation->set_message('check_amount', 'You do not have sufficient balance to withdraw');
            return false;
        }
        return true;
    }
}
