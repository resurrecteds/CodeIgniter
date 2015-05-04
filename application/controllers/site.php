<?php
	class Site extends CI_Controller {
		function index() {
			$this->load->model('data_model');
			$data['rows'] = $this->data_model->getAll();
			$this->load->view('home', $data);
			
		}
		
		// video 1 moethod
		function index_ex1() {
			echo 'Hello jenya';
			$this->load->model('SiteModel');
			$data['records'] = $this->SiteModel->getAll();
			$this->load->view("home", $data);
		}
	}
?>
