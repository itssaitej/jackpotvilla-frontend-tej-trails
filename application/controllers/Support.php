<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Support extends CI_Controller
{
	public function index()
	{
		$this->form_validation->set_rules("alias", "Alias", "required", array(
            'required' => 'Alias cannot be empty'
        ));

        $this->form_validation->set_rules("email", "Email", "required|valid_email", array(
            'required' => 'Email cannot be empty'
        ));

		if($this->input->post())
		{
			if ($this->form_validation->run() == FALSE)
	        {
	            $single_line_message = "";

	            if (form_error("alias")) {
	                $single_line_message = form_error("alias");
	            }
	            if (form_error("email") && $single_line_message == "") {
	                $single_line_message = form_error("email");
	            }

				$data['pageTitle'] = "JackpotVilla Support Page";
		        $data['page_active'] = "support";
	            $data['form_values'] = $this->input->post();
	            $data['error_message'] = $single_line_message;
				$data['current_page'] = 'support-index';
	    		$this->load->view('common/header', $data);
	            $this->load->view('support');
	            $this->load->view('common/footer');
	        }
			else
			{
				$headers = array(
	                "Cache-Control: no-cache",
	                "Content-Type: application/json"
	            );

	            $url = API_URL . '/support';
	            $curl_data['url']       = $url;
	            $curl_data['headers']   = $headers;
	            $curl_data['post_data'] = $this->input->post();
				$curl_data['post_data']['ip_address'] = get_ip_address();
				$curl_data['post_data'] = json_encode($curl_data['post_data']);
	            $response = curl_post($curl_data);
	            $response = json_decode($response, true);

				$data['pageTitle'] = "JackpotVilla Support Page";
		        $data['page_active'] = "support";
				$data['message'] = "Thank you for writing us. Will get back to you soon.";
				$data['current_page'] = 'support-index';
		        $this->load->view('common/header', $data);
				$this->load->view('support');
				$this->load->view('common/footer');
			}
		}
		else
		{
			$data['pageTitle'] = "JackpotVilla Support Page";
			$data['page_active'] = "support";
			$data['current_page'] = 'support-index';
			$this->load->view('common/header', $data);
			$this->load->view('support');
			$this->load->view('common/footer');
		}
	}
}
