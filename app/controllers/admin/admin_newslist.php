<?php
class Admin_newslist extends CI_Controller {

	function index()
	{
		$data['query'] = $this->db->query("SELECT * FROM news");
		

		$this->load->view('admin/admin_doctype');
		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_newslist_view',$data);
		$this->load->view('admin/admin_footer');
	}
	function del()
	{
			$id = $this->input->post('id');
			$path= FCPATH.'news_img/';
			// get the image and thumb for deleting
			$query = $this->db->query("SELECT * FROM news_image WHERE id = {$id}");
			foreach ($query->result() as $row)
			{
				// clear the image folder
				unlink($path.$row->image_name);
				unlink($path.$row->thumb_name);
			}
			// clear database
			$this->db->delete('news_image', array('id' => $id)); 
			$this->db->delete('news', array('id' => $id)); 
	}
}
?>