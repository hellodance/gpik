<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class about_us extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->layout->set_layout('layout/layout_inner');
	} 

	public function index(){
		$data = array();
		$data['title'] = 'About us';
		$this->layout->view('front/about_us',$data);
	}
}
