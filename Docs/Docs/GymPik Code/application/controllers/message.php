<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class message extends CI_Controller {
	 
	public function __construct() {
		parent::__construct();
		$this->layout->set_layout('layout/layout_inner');
	} 

	public function index(){
		$data = array();
		$data['title'] = 'Message';
		
		$data['message_type'] = $_SESSION['type'];
		$data['message'] = $_SESSION['message'];
		
		unset($_SESSION['message']);
		unset($_SESSION['message_type']);
		$this->layout->view('front/message',$data);
	}
}
