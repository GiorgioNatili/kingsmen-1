<?php
class Exhibition extends CI_Controller {

	public function index()
	{

		$data['query'] = $this->db->query("SELECT * FROM project");

		$this->load->view('doctype');
		$this->load->view('service_script');
		$this->load->view('header');	
		$this->load->view('exhibition_view');
		$this->load->view('footer');
	}
}
?>
