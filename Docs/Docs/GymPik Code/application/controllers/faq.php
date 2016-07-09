<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class faq extends CI_Controller {
 
	public function __construct() {
		parent::__construct();
		$this->layout->set_layout('layout/layout_inner');
		$this->load->model("Faq_model");
	} 

	public function index(){
		$data = array();
		$data['title'] = 'Frequently asked questions';
		$data['lists'] = $this->Faq_model->list_active_faqs();
		$this->layout->view('front/faq',$data);
	}
}
