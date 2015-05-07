<?php
	class Site extends CI_Controller {
		function index() {
			$t = new testExtension2();
			$t->getVars(); 
//			var_dump(get_class_vars('test'));
			$t->getVisibleVars();
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
		
		public function getVars() {
//			var_dump(get_class_vars(__CLASS__));
			return get_class_vars(__CLASS__);	
		} 
	}
	
	class testExtension1 extends test {
		public $t1 = 7;
		protected $t2 = 8;
		private $t3 = 9;
		
		public function getVars() {
			$superVars = parent::getVars();
			$visibleVars = get_class_vars(__CLASS__);
//			var_dump(array_merge($superVars, $visibleVars));
			return array_merge($superVars, $visibleVars);
		}
	}
	class testExtension2 extends testExtension1 {
		public $tt1 = 44;
		protected $tt2 = 55;
		private $tt3 = 66;
		
//		@Override
		public function getVars() {
			var_dump(array_merge(parent::getVars(), get_class_vars(__CLASS__)));
		}
		
		public function getVisibleVars() {
			var_dump(get_class_vars(__CLASS__));
		}
	}
?>
