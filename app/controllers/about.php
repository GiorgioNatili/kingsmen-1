<?php
class About extends CI_Controller {

	public function index()
	{
		$this->load->view('doctype');
		$this->load->view('about_script');
		$this->load->view('header');	
		$this->load->view('about_view');
		$this->load->view('footer');	
	}
}
?>
