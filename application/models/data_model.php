<?php
class Data_model extends CI_Model {
	
	function getAll() {
		$this->db->select('title, contents');
		$this->db->from('data');
		$this->db->where('id', 2);
		
		$quary = $this->db->get();
		if ($quary->num_rows() > 0) {
			echo "number of rows = " . $quary->num_rows();
			foreach ($quary->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	
	function getAll4() {
		$sql = "SELECT title, author, contents FROM data WHERE id = ? AND author = ?";
		
		$quary = $this->db->query($sql, array(1, 'George R. R. Martin'));
//		$quary = $this->db->get('data');
		if ($quary->num_rows() > 0) {
			echo "number of rows = " . $quary->num_rows();
			foreach ($quary->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return null;
	}
	
	function getAll3() {
		$this->db->select('title, contents');
		$quary = $this->db->get('data');
		if ($quary->num_rows() > 0) {
			foreach ($quary->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	function getAll2() {
		$quary = $this->db->get('data');
		if ($quary->num_rows() > 0) {
			foreach ($quary->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
	
	
	function getAll_old() {
		$quary = $this->db->query("SELECT * FROM data");
		if ($quary->num_rows() > 0) {
			foreach ($quary->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
	}
}
?>
	
	