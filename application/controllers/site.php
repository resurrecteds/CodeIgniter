<?php
	class Site extends CI_Controller {
		function index() {
			$t = new test();
			$t->getVars(); 
			var_dump (get_class_vars('test'));
		}
		
		function index1() {
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
	
	class test{
		public $a = 1;
		protected $b = 2;
		private $c = 33;
		
		public function getVars(){
			var_dump(get_class_vars(__CLASS__));	
		} 
	}
?>
