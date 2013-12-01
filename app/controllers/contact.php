<?php
class Contact extends CI_Controller {

	public function index()
	{
		$this->load->view('doctype');
		$this->load->view('contact_script');
		$this->load->view('header');	
		$this->load->view('contact');
		$this->load->view('footer');	
	}
}
?>
