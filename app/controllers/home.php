<?php
class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('doctype');
		$this->load->view('home_script');
		$this->load->view('header');	
		$this->load->view('home');
		$this->load->view('footer');	
	}
}
?>