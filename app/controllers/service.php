<?php
class Service extends CI_Controller {

	public function index()
	{

	}
	function interior()
	{
		$data['page'] = 'INTERIOR';
		$type = $this->uri->segment(2);
		$data['query'] = $this->db->query("SELECT a.*, b.medium FROM project a 
											LEFT JOIN project_photo b 
											ON b.project_id = a.id 
											AND b.main = 1
											WHERE a.type = '{$type}'");

		$this->load->view('doctype');
		$this->load->view('service_script');
		$this->load->view('header');	
		$this->load->view('service_type_view',$data);
		$this->load->view('footer');
	}
	function exhibition()
	{
		$data['page'] = 'EXHBITIION';
		$type = $this->uri->segment(2);
		$data['query'] = $this->db->query("SELECT a.*, b.medium FROM project a 
											LEFT JOIN project_photo b 
											ON b.project_id = a.id 
											AND b.main = 1
											WHERE a.type = '{$type}'");

		$this->load->view('doctype');
		$this->load->view('service_script');
		$this->load->view('header');	
		$this->load->view('service_type_view',$data);
		$this->load->view('footer');
	}
	function event()
	{
		$data['page'] = 'EVENT';
		$type = $this->uri->segment(2);
		$data['query'] = $this->db->query("SELECT a.*, b.medium FROM project a 
											LEFT JOIN project_photo b 
											ON b.project_id = a.id 
											AND b.main = 1
											WHERE a.type = '{$type}'");

		$this->load->view('doctype');
		$this->load->view('service_script');
		$this->load->view('header');	
		$this->load->view('service_type_view',$data);
		$this->load->view('footer');
	}
	function id()
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
