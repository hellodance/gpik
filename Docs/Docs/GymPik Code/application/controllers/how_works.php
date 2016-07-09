<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class how_works extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->layout->set_layout('layout/layout_inner');
	} 

	public function index(){
		$data = array();
		$data['title'] = 'How it works';
		$this->layout->view('front/how_it_works',$data);
	}
}
