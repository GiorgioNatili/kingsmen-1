<?php
class Admin_home extends CI_Controller {

	function index()
	{
		$this->load->view('admin/admin_doctype');
		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_home_view');
		$this->load->view('admin/admin_footer');
		
	}
}
?>