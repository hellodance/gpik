<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class find_trainer extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->layout->set_layout('layout/layout_blank');
	} 

	public function index(){
		$data = array();
		$data['title'] = 'Find your trainer';
		$this->layout->view('front/find_trainer',$data);
	}
}
