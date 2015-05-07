<?php

class Email extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'your_email_here@host.com',
			'smtp_pass' => 'your_password_here'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		$this->email->from('your_email_here@host.com', 'Jenya');
		$this->email->to('your_email_here@host.com');
		$this->email->subject('Hello');
		$this->email->message("Hi there, I just sent this email from php :) using CodeIgniter\nHow cool is that?");
		
		if ($this->email->send()) {
			echo 'Success';
		}
		else {
			show_error($this->email->print_debugger());
		}
	}
	
	
}

	
?>