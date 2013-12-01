<?php
class Stat extends Controller {
	function Stat()
	{
		parent::Controller();
		check_login();
	}
	function index()
	{
		$query1= $this->db->query("SELECT COUNT(*) / COUNT(DISTINCT DATE(first_visit_time)) AS avgvisits FROM hit_counter");
		$query2 = $this->db->query("SELECT COUNT(*) AS counter FROM hit_counter");
		$query3 = $this->db->query("SELECT first_visit_time FROM hit_counter ORDER BY id ASC LIMIT 1 ");
		$row2 = $query2->row();
		$row3 = $query3->row();
		$row1 = $query1->row();
		$data['average'] = $row1->avgvisits;
		$data['total'] = $row2->counter;
		$data['start_date'] = date('d/m/Y',strtotime($row3->first_visit_time));
		$data['query1'] = $this->db->query("SELECT * FROM hit_counter");
		$this->load->view('admin/stat_view.php', $data);
	}
}
?>