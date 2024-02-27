<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends MY_Controller
{
	public function redeem()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules("coupon_code", "Coupon Code", "required", array(
	            'required' => 'Coupon Code cannot be empty'
	        ));

	        if ($this->form_validation->run() == FALSE)
	        {
	            $single_line_message = "";

	            if (form_error("coupon_code"))
				{
	                $single_line_message = form_error("coupon_code");
	            }

				$data['pageTitle'] = "JackpotVilla Casino Games | Redeem Coupon";
	            $data['error_message'] = $single_line_message;
				$data['current_page'] = 'coupon-redeem';
		        $this->load->view('common/header', $data);
				$this->load->view('coupon/redeem');
				$this->load->view('common/footer');
	        }
			else
			{
				$url = API_URL . '/coupon/redeem';

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
						$response_data = $response['data'];
						$this->session->set_userdata("balance", $response_data['balance']);
						$data['pageTitle'] = "JackpotVilla Casino Games | Redeem Coupon Success";
						$data['current_page'] = 'coupon-redeem';
						$this->load->view('common/header', $data);
						$this->load->view('coupon/success', $data);
						$this->load->view('common/footer');
					}
					else
					{
						$data['pageTitle'] = "JackpotVilla Casino Games | Redeem Coupon";
						$data['error_message'] = $response['message'];
						$data['current_page'] = 'coupon-redeem';

				        $this->load->view('common/header', $data);
						$this->load->view('coupon/redeem');
						$this->load->view('common/footer');
					}
				}
				else
				{
					$data['pageTitle'] = "JackpotVilla Casino Games | Redeem Coupon";
					$data['error_message'] = "Some server issue. Please contact to our customer support.";
					$data['current_page'] = 'coupon-redeem';
					$this->load->view('common/header', $data);
					$this->load->view('coupon/redeem');
					$this->load->view('common/footer');
				}
			}
		}
		else
		{
			$data['pageTitle'] = "JackpotVilla Casino Games | Redeem Coupon";
			$data['current_page'] = 'coupon-redeem';
	        $this->load->view('common/header', $data);
			$this->load->view('coupon/redeem');
			$this->load->view('common/footer');
		}
	}
}
