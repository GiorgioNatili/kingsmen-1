<?php
class Post extends CI_Controller {

	public function index()
	{
		$this->load->view('doctype');
		$this->load->view('post_script');
		$this->load->view('header');	
		$this->load->view('post');
		$this->load->view('footer');	
	}
}
?>
