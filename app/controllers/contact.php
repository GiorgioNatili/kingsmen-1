<?php
class Contact extends CI_Controller {

	public function index()
	{
		$this->load->view('doctype');
		$this->load->view('contact_script');
		$this->load->view('header');	
		$this->load->view('contact_view');
		$this->load->view('footer');
	}
	function processform()
	{
		$array = array('status'=>'success');	
		
		if($this->input->post('emailaddress') == '')
		{
			$email = $this->input->post('email', TRUE);
			$message = $this->input->post('message', TRUE);
			$name = $this->input->post('name', TRUE);
			$company = $this->input->post('company', TRUE);
			$telephone = $this->input->post('telephone', TRUE);
			$subject=$this->input->post('subject', TRUE);

			// config the email server before loading email lib
			$email_config = Array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => '465',
            'smtp_user' => $this->config->item('email_username'),
            'smtp_pass' => $this->config->item('email_password'),
            'mailtype'  => 'html',
            'starttls'  => true,
            'newline'   => "\r\n"
        	);
			$this->load->library('email', $email_config);
					
			//sending
			$this->email->from($email, $name);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->to('kingsmenvn@gmail.com');
			if(!$this->email->send())
			{
				$array = array('status'=>'error','error'=> 'can not send');	
			}
		}
		echo json_encode($array);
	}
	
}
?>
