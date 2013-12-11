<?php
class Latest_project extends CI_Controller {

	public function index()
	{
		
		
		$data['query'] = $this->db->query("SELECT a.*, b.thumb FROM project a 
											LEFT JOIN project_photo b 
											ON b.project_id = a.id 
											AND b.main = 1
											ORDER BY id DESC");

		
		// $this->load->view('service_script');
		// $this->load->view('header');	
		$this->load->view('latest_project_view',$data);
		// $this->load->view('footer');
	}
	function id()
	{

	}
}
?>
