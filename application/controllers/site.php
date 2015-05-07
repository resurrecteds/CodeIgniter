<?php
	class Site extends CI_Controller {
		function index() {
			$t = new testExtension2();
			
//			Implement getVars in every method of each class to get all the vars
			var_dump($t->getVars());
			
//			only implement getPublicAndProtectedVars in the bottom of the inheritance tree to get the class'
//			visible vars
			var_dump($t->getPublicAndProtectedVars());
			
//			call get_class_vars on the class of the object to get only the public vars 
			var_dump(get_class_vars(get_class($t)));
			
			// not working exactly - removes the private of the bottom class
			var_dump($t->getPrivateVars());
			
			$reflect = new ReflectionClass($t);
			$props = $reflect->getProperties(ReflectionProperty::IS_PRIVATE | ReflectionProperty::IS_PROTECTED 
		| ReflectionProperty::IS_PUBLIC);
			var_dump($props);
			foreach ($props as $prop) {
    			print $prop->getName() . "\n";
			}
		}
		
		function index1() {
			$this->load->model('data_model');
			$data['rows'] = $this->data_model->getAll();
			$this->load->view('home', $data);
		}
		
		// video 1 method
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
			return array_merge($superVars, $visibleVars);
		}
		
//		public function getPublicAndProtectedVars() {
//			return get_class_vars(__CLASS__);
//		}
	}
	
	class testExtension2 extends testExtension1 {
		public $tt1 = 44;
		protected $tt2 = 55;
		private $tt3 = 66;
		
//		@Override
		public function getVars() {
			return array_merge(parent::getVars(), get_class_vars(__CLASS__));
		}
		
		
		public function getPublicAndProtectedVars() {
			return get_class_vars(__CLASS__);
		}
		
		public function getPrivateVars() {
			var_dump($this->getVars());
			var_dump($this->getPublicAndProtectedVars());
			return array_diff($this->getVars(), $this->getPublicAndProtectedVars());
		}
	}
?>
