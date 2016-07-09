<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class why_gympik extends CI_Controller {
	 
	public function __construct() {
		parent::__construct();
		$this->layout->set_layout('layout/layout_inner');
	} 

	public function index(){
		$data = array();
		$data['title'] = 'Why gympik';
		$this->layout->view('front/why_gympik',$data);
	}
}
