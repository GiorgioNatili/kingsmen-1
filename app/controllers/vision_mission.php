<?php
class Vision_mission extends CI_Controller {

	public function index()
	{
		$this->load->view('doctype');
		$this->load->view('vision_mission_script');
		$this->load->view('header');	
		$this->load->view('vision_mission_view');
		$this->load->view('footer');	
	}
}
?>
