<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->layout->set_layout('layout/layout_main');
		
		$this->load->helper('cookie');
		$this->input->cookie('unam','gympik_');
		//echo $this->input->cookie('gympik_unam');die();
		
	} 

	public function index(){
		$data = array();
		$data['title'] = 'Welcome to Gympik';
		
		$this->layout->view('front/home',$data);
	}
}
