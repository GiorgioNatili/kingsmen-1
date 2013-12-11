<?php
class News_update extends CI_Controller {

	public function index()
	{

		$data['page'] = 'NEWS UPDATES';
		
		$data['query'] = $this->db->query("SELECT a.*, b.thumb FROM news a 
											LEFT JOIN news_photo b 
											ON b.news_id = a.id");

		$this->load->view('doctype');
		$this->load->view('news_update_script');
		$this->load->view('header');
		$this->load->view('news_update_view',$data);
		$this->load->view('footer');
	}
	function id()
	{
		$id = $this->input->post('id');

		$data['query'] = $this->db->query("SELECT a.*, b.* FROM news a 
											LEFT JOIN news_photo b 
											ON b.news_id = a.id");

		$this->load->view('doctype');
        $this->load->view('news_update_script');
        $this->load->view('header');        
        $this->load->view('news_update_id_view',$data);
        $this->load->view('footer');    
	}
}
?>
