<?php
class Admin_news extends CI_Controller {

	function index()
	{
		$this->load->view('admin/admin_doctype');
		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_news_view');
		$this->load->view('admin/admin_footer');
	}
	function processform()
	{

		$input = array('title'=> $this->input->post('news_title'),
						'detail' => $this->input->post('news_detail'));
		$this->db->insert('news', $input);
		
		if(mysql_insert_id() > 0)
		{
			$insert_id = mysql_insert_id();
			$cookie = array(
                   'name'   => 'news_id',
                   'value'  => $insert_id,
                   'expire' => '86500',
                   'domain' => '',
                   'path'   => '/',
				   'prefix' => '',
				);
			set_cookie($cookie);
			$array=array('insert'=>'success');
		}

		echo json_encode($array);


	}
	function upload() {

		$this->load->library('image');
		// the path on server to save uploaded image to
		$path =	FCPATH.'photo/news/';

		// get the original name, size and type
		$name = str_replace(' ','_',$_SERVER['HTTP_X_FILE_NAME']); // myphoto.jpg // replace white space with "_"
		$name = preg_replace('/\.[^.]*$/', '', $name); // remove extension from file name 
		$size = $_SERVER['HTTP_X_FILE_SIZE'];
		$type = strtolower(substr(strrchr($_SERVER['HTTP_X_FILE_NAME'], '.'), 1));
		
		// get the binary data
		$file = file_get_contents("php://input");

		// prepare new name for upload image
		$rand = trim(mt_rand(100,999)).trim(microtime());
		$full =  $rand.'_full.'.$type;
		$thumb =  $rand.'_thumb.'.$type;

		file_put_contents($path.$full, $file);
			

		//resize, scale or crop
		$this->image->scale_to_bigger(700,300, $path, $full, $full);
		$this->image->scale_to_bigger(330,185, $path, $full, $thumb);

		// save the name and id of the news to news photo table
		$input =  array(	'full' => $full, 
							'thumb'=>$thumb,
							'news_id'=> get_cookie('news_id')// this cookie is set during process form
						);
		
		$this->db->insert('news_photo', $input);
		if($this->db->affected_rows()>0){
			$array = array( 'status'	=> 'success',
							'name'		=> $full,
							'thumb'	=> $thumb,
							'image_id'	=> $this->db->insert_id());
		}
		
		echo json_encode($array);
	}
	function lists()
	{
		$data['query'] = $this->db->query("SELECT a.*, b.thumb FROM news a LEFT JOIN news_photo b ON a.id = b.news_id ");
		
		$this->load->view('admin/admin_doctype');
		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_news_list_view',$data);
		$this->load->view('admin/admin_footer');

	}

	function del()
	{
			$id = $this->input->post('id');
			$path= FCPATH.'photo/news/';
			// get the image and thumb for deleting
			$query = $this->db->query("SELECT * FROM news_photo WHERE id = {$id}");
			foreach ($query->result() as $row)
			{
				// clear the image folder
				unlink($path.$row->full);
				unlink($path.$row->thumb);
			}
			// clear database
			$this->db->delete('news_photo', array('id' => $id)); 
			$this->db->delete('news', array('id' => $id)); 
	}

}
?>