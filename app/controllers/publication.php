<?php
class Publication extends CI_Controller {

	public function index()
	{
		$this->load->view('doctype');
		$this->load->view('publication_script');
		$this->load->view('header');	
		$this->load->view('publication');
		$this->load->view('footer');	
	}
}
?>
