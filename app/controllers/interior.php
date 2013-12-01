<?php
class Interior extends CI_Controller {

	public function index()
	{
		$type = $this->uri->segment(1);
		$data['query'] = $this->db->query("SELECT * FROM project WHERE type = '{$type}'");

		$this->load->view('doctype');
		$this->load->view('service_script');
		$this->load->view('header');	
		$this->load->view('interior_view',$data);
		$this->load->view('footer');
	}
	function item()
	{
		$id = $this->uri->segment(3);		
		$data['query'] = $this->db->query("SELECT a.*, b.* FROM project a 
											LEFT JOIN project_photo b
											ON b.project_id = a.id
											WHERE a.id = '{$id}'");
	}
}
?>
