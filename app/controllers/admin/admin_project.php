<?php
class Admin_project extends CI_Controller {

	function index()
	{
		$this->load->view('admin/admin_doctype');
		$this->load->view('/service_script');
		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_project_view');
		$this->load->view('admin/admin_footer');
	}

	function processform()
	{

		$input = array('name'=> $this->input->post('name'), 
						'type'=>$this->input->post('type'),
						'location'=>$this->input->post('location'));
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
		$path =	$this->config->item('project_photo_path');

		// get the original name, size and type
		$name = str_replace(' ','_',$_SERVER['HTTP_X_FILE_NAME']); // myphoto.jpg // replace white space with "_"
		$name = preg_replace('/\.[^.]*$/', '', $name); // remove extension from file name 
		$size = $_SERVER['HTTP_X_FILE_SIZE'];
		$type = strtolower(substr(strrchr($_SERVER['HTTP_X_FILE_NAME'], '.'), 1));
		
		// get the binary data
		$file = file_get_contents("php://input");

		// prepare new name for upload image
		$full =  $name.'_full.'.$type;
		$thumb = $name.'_thumb.'.$type;
		$small = $name.'_small.'.$type;

		file_put_contents($path.$full, $file);
			

		//resize, scale or crop
		$this->image->scale_to_bigger(2500,1570, $path, $full, $full);
		$this->image->scale_to_bigger(220,146, $path, $full, $thumb);
		$this->image->scale_to_bigger(90,60, $path, $full, $small);

		// save the name and id of the project to project photo table
		$input =  array(	'full' => $full, 
							'thumb'=>$thumb,
							'small' =>$small,
							'project_id'=> get_cookie('projectid')// this cookie is set during process form
						);
		
		$this->db->insert('project_photo', $input);
		if($this->db->affected_rows()>0){
			$array = array( 'status'	=> 'success',
							'name'		=> $full,
							'thumb'	=> $thumb,
							'small'		=> $small,
							'image_id'	=> $this->db->insert_id());
		}
		
		echo json_encode($array);
	}

	function del_img()
	{
			$this->load->library('image');

			$id = $this->input->post('id');
			$thumb = $this->input->post('thumb');
			$path= $this->config->item('project_photo_path');
			$this->db->delete('project_photo', array('id'=>$id));
			// get the image and thumb for deleting
			// deleting thumb
			$this->image->delete($path.$thumb);
			// deleting the full one
			$this->image->delete(str_replace('_thumb', '_full', $path.$thumb));
			// and small one
			$this->image->delete(str_replace('_thumb', '_small', $path.$thumb));

			if ($this->db->affected_rows()>0) {
			$array = array('status'=>'success');
			}else{
				$array = array('status'=>'error');
			}
			echo json_encode($array);
			
	}
	function set()
	{
		$id = $this->input->post('id');
		// get the project id of this photo id
		$query = $this->db->get_where('project_photo', array('id' => $id), 1, 0);
		$project_id = $query->row()->project_id;

		// set all main to 0
		$this->db->where('project_id', $project_id);
		$this->db->update('project_photo', array('main'=>0));

		// set the selected photo to main = 1
		$this->db->where('id', $id);
		$this->db->update('project_photo', array('main'=>1));

		if ($this->db->affected_rows()>0) {
			$array = array('status'=>'success');
		}else{
			$array = array('status'=>'error');
		}
		echo json_encode($array);

	}
	function lists()
	{
		$data['query'] = $this->db->query("SELECT a.*, b.thumb FROM project a LEFT JOIN project_photo b ON a.id = b.project_id AND b.main = 1 ");
		
		$this->load->view('admin/admin_doctype');
		$this->load->view('/service_script');
		$this->load->view('admin/admin_header');
		$this->load->view('admin/admin_project_list_view',$data);
		$this->load->view('admin/admin_footer');
	}
	function id()
	{
		$id = $this->uri->segment(4);		
		$data['query'] = $this->db->query("SELECT a.*, b.* FROM project a 
											LEFT JOIN project_photo b
											ON b.project_id = a.id
											WHERE a.id = '{$id}'");

		

		$this->load->view('admin/admin_project_id_view',$data);
	}

	function del()
	{	
			$this->load->library('image');

			$id = $this->input->post('id');
			$path= $this->config->item('project_photo_path');
			// get the image and thumb for deleting
			$query = $this->db->query("SELECT * FROM project_photo WHERE project_id = {$id}");
			foreach ($query->result() as $row)
			{
				// clear the image folder
				$this->image->delete($path.$row->full);
				$this->image->delete($path.$row->thumb);
				$this->image->delete($path.$row->small);
			}
			// clear database
			$this->db->delete('project_photo', array('project_id' => $id)); 
			$this->db->delete('project', array('id' => $id)); 

			if ($this->db->affected_rows()>0) {
				$array = array('status'=>'success');
			}else{
				$array = array('status'=>'error');
			}
			echo json_encode($array);
	}


}
