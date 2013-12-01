<?php
class Global_presence extends CI_Controller {

	public function index()
	{
		$this->load->view('doctype');
		$this->load->view('header');
		$this->load->view('global_presence');
		$this->load->view('footer');
	}
}
?>
