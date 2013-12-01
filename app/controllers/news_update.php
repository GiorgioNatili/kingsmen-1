<?php
class News_update extends CI_Controller {

	public function index()
	{
		$this->load->view('doctype');
		$this->load->view('news_update_script');
		$this->load->view('header');
		$this->load->view('news_update');
		$this->load->view('footer');
	}
}
?>
