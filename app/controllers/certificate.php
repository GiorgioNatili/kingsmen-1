<?php
class Certificate extends CI_Controller {

	public function index()
	{
		$id = $this->uri->segment(3);		
		$data['query'] = $this->db->query("SELECT a.*, b.* FROM project a 
											LEFT JOIN project_photo b
											ON b.project_id = a.id
											WHERE a.id = '{$id}'");

		

		$this->load->view('service_id_view',$data);

	}
	
}
?>
