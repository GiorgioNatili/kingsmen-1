<?php
class Admin_project extends CI_Controller {

	function index()
	{
		$this->load->view('admin/admin_doctype');
		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_project_view');
		$this->load->view('admin/admin_footer');
	}

	function processform()
	{

		$input = array('name'=> $this->input->post('name'));
		$this->db->insert('project', $input);
		
		if(mysql_insert_id() > 0)
		{
			// get the last insert id for photo upload to coordiate
			$insert_id = mysql_insert_id();
			$cookie = array(
                   'name'   => 'projectid',
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
	function uploadx() {

		$this->load->library('image');
		// the path on server to save uploaded image to
		$path =	FCPATH.'photo/pro/';

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
		$small = $name.'d3.'.$type;

		if(!file_put_contents($path.$name, $file)){
			$array = array('status'=>'can not upload '.$name.' to server');
		}

		//resize, scale or crop
		$this->image->scale_to_bigger(220,146, $path, $name, $medium);
		$this->image->scale_to_bigger(90,60, $path, $name, $small);

		// save the name and id of the project to project photo table
		$input =  array(	'full' => $name, 
							'medium'=>$medium,
							'small' =>$small,
							'project_id'=> get_cookie('projectid')// this cookie is set during process form
						);
		
		$this->db->insert('project_photo', $input);
		if($this->db->affected_rows()>0){
			$array = array( 'status'	=> 'success',
							'name'		=> $name,
							'medium'	=> $medium,
							'small'		=> $small,
							'image_id'	=> $this->db->insert_id());
		}
		
		echo json_encode($array);
	}

}
