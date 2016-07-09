<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class faqs extends CI_Controller {

	var $viewData = array();

	public function __construct() {
		parent::__construct();
		$this->site_santry->redirect = "/admin/admins/login";
		$this->site_santry->allow(array("login"));
		$this->layout->set_layout("layout/layout_admin");
		$this->load->model("Faq_model");
		$this->load->helper('ckeditor');
	}
	public function delete($id){
    	$this->commonmodel->_delete("faq", array('id'=>$id));
		$this->session->set_flashdata("success", "FAQ has been deleted successfully" );
		redirect("/admin/faqs/manage");
	}
	
	public function index() {
		$this->manage();
	}

	public function manage() {
		$this->viewData['title'] = " Manage faq";
		$this->viewData['lists'] = $this->Faq_model->list_faqs();
		$this->layout->view("admin/manage_faq", $this->viewData);
	}
	
	public function status($id,$status){
		
		$newStatus = $status == '1' ? '0' : '1';
		$this->commonmodel->_update("faq",array('status'=>$newStatus) ,array('id'=>$id));
		$this->session->set_flashdata("success", "FAQ has been successfully updated" );
		redirect("/admin/faqs/manage");
		
	}
	
	public function add(){
			$validation = array(
				array(
                'field' => 'faq',
                'label' => 'FAQ',
                'rules' => "trim|required"
				),
				array(
                'field' => 'faq_ans',
                'label' => 'Ans',
                'rules' => "trim|required"
				),
				
            );
			$this->load->library(array('encrypt','form_validation'));
			$this->form_validation->set_rules($validation);
			$this->form_validation->set_error_delimiters('<span class="input-notification error png_bg">', '</span>');
			if ($this->form_validation->run() === TRUE) {
				$data = _xss_clean(
							array("faq" => _input_post("faq"),
									"faq_ans" => _input_post("faq_ans")
							)
						);
						
				$data['create_date'] = date('Y-m-d',time());
			    $data['modify_date'] = date('Y-m-d',time());	 	
				if ($this->commonmodel->_insert("faq", $data) == true) {
					$this->session->set_flashdata("success", "User has been added successfully");
					redirect("/admin/faqs/manage");
				}
				
			}
			$this->viewData['title'] = "Add FAQ";
			$this->layout->view("admin/add_faq", $this->viewData);
	}
	
	public function edit($id = null){
			$validation = array(
				array(
                'field' => 'faq',
                'label' => 'faq',
                'rules' => "trim|required"
				),
				array(
                'field' => 'faq_ans',
                'label' => 'ans',
                'rules' => 'trim|required'
                )
				
		
            );
			$this->load->library(array('encrypt','form_validation'));
			$this->form_validation->set_rules($validation);
			$this->form_validation->set_error_delimiters('<span class="input-notification error png_bg">', '</span>');
			if ($this->form_validation->run() === TRUE) {
				$data = _xss_clean(
						array("faq" => _input_post("faq"),
						"faq_ans" => _input_post("faq_ans")
						)
						
						);
                 $data['modify_date'] = date('Y-m-d',time());	 	
				if ($this->commonmodel->_update("faq", $data,array('id'=>_input_post("id"))) == true) {
					$this->session->set_flashdata("success", "FAQ has been updated successfully updated");
					redirect("/admin/faqs/manage");
				}
				
			}
			$this->viewData['data'] = $this->Faq_model->load_faq((int)$id);
			$this->viewData['title'] = "Edit FAQ";
			$this->layout->view("admin/edit_faq", $this->viewData);
	}
}

?>
