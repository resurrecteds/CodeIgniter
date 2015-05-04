<?php
	class SiteModel extends CI_Model {
		function getAll() {
			echo "hello model";
			$query = $this->db->get('test');
			echo "just for fun";
			// if ($query->num_rows() > 0) {
			// 	foreach ($quary->result() as $row) {
			// 		$data[] = $row;
			// 	}
			// }
			// return $data;
		}
	}
?>