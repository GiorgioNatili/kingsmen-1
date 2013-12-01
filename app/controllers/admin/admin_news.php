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

			$array=array('insert'=>'success');
		}

		echo json_encode($array);
	}
	function uploadx() {
		$this->load->library('image');
		// the path on server to save uploaded image to
		$path =	FCPATH.'photo/post/';

		// get the original name, size and type
		$name = $_SERVER['HTTP_X_FILE_NAME']; // myphoto.jpg
		$name = preg_replace('/\.[^.]*$/', '', $name); // remove extension from file name 
		$size = $_SERVER['HTTP_X_FILE_SIZE'];
		$type = strtolower(substr(strrchr($_SERVER['HTTP_X_FILE_NAME'], '.'), 1));
		
		// get the binary data
		$file = file_get_contents("php://input");

		// prepare new name for upload image
		$name =  $name.'d1.'.$type;
		$medium = $name.'d2.'.$type;


		if(!file_put_contents($path.$name, $file)){
			$array = array('status'=>'can not upload '.$name.' to server');
		}

		//resize, scale or crop
		$this->image->scale_to_smaller(150,120, $path, $name, $medium);


		// save the name and id of the project to project photo table
		$input =  array(	'full' => $name, 
							'medium'=>$medium,
						);
		
		$this->db->insert('news_photo', $input);
		if($this->db->affected_rows()>0){
			$array = array( 'status'	=> 'success',
							'name'		=> $name,
							'medium'	=> $medium,
							'image_id'	=> $this->db->insert_id());
		}
		
		echo json_encode($array);
	}

}
?>