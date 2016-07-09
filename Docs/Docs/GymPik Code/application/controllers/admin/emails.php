<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class emails extends CI_Controller {

	var $viewData = array();

	public function __construct() {
		parent::__construct();
		$this->site_santry->redirect = "/admin/admins/login";
		$this->site_santry->allow(array("login"));
		$this->layout->set_layout("layout/layout_admin");
		$this->load->model("email_model");
		$this->load->helper('ckeditor');
		
/*		$this->ckConfig= array(
				//ID of the textarea that will be replaced
				'id' 	=> 	'template',
				'path'	=>	'js/ckeditor',
				//Optionnal values
				'config' => array(
					'toolbar' 	=> 	"standard", 	//Using the Full toolbar
					'width' 	=> 	"100%",	//Setting a custom width
					'height' 	=> 	'100px',	//Setting a custom height
	 
				),
				//Replacing styles from the "Styles tool"
				'styles' => array(
					//Creating a new style named "style 1"
					'style 1' => array (
						'name' 		=> 	'Blue Title',
						'element' 	=> 	'h2',
						'styles' => array(
							'color' 	=> 	'Blue',
							'font-weight' 	=> 	'bold'
						)
					),
	 
					//Creating a new style named "style 2"
					'style 2' => array (
						'name' 	=> 	'Red Title',
						'element' 	=> 	'h2',
						'styles' => array(
							'color' 		=> 	'Red',
							'font-weight' 		=> 	'bold',
							'text-decoration'	=> 	'underline'
						)
					)				
				)
			);*/
	}

	public function index() {
		$this->manage();
	}

	public function manage() {
		$this->viewData['title'] = " Manage Templates";
		$this->viewData['lists'] = $this->email_model->list_emails();
		$this->layout->view("admin/manage_emails", $this->viewData);
	}
	
	public function add(){
			$validation = array(
				array(
                'field' => 'fname',
                'label' => 'First name',
                'rules' => "trim|required"
				),
				array(
                'field' => 'lname',
                'label' => 'Last name',
                'rules' => "trim|required"
				),
				array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => "trim|required|valid_email|is_unique[gympik_member.email]"
				),
				array(
                'field' => 'mob_no',
                'label' => 'Mobile no',
                'rules' => 'trim|required|min_length[5]|max_length[15]'
                ),
                array(
                'field' => 'pass',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[5]|max_length[15]'
                ),
                array(
                'field' => 'pass2',
                'label' => 'Confirm password',
                'rules' => 'trim|required|min_length[5]|max_length[15]|matches[pass]'
                )
            );
			$this->load->library(array('encrypt','form_validation'));
			$this->form_validation->set_rules($validation);
			$this->form_validation->set_error_delimiters('<span class="input-notification error png_bg">', '</span>');
			if ($this->form_validation->run() === TRUE) {
				$data = _xss_clean(
						array("first_name" => _input_post("fname"),
						"email" => _input_post("email"),
						"last_name" => _input_post("lname"),
						"mob_no"=>_input_post("mob_no"),
						"join_date" => date('Y-m-d',time()),
						"role"=>_input_post('type')
						)
						);
				if($this->input->post("pass")){
					$data['password'] = $this->encrypt->encode(_input_post('pass'));
				}
				if ($this->commonmodel->_insert("gympik_member", $data) == true) {
					$this->session->set_flashdata("success", "User has been added successfully");
					redirect("/admin/users/manage");
				}
				
			}
			$this->viewData['title'] = "Add User";
			$this->layout->view("admin/add_member", $this->viewData);
	}
	
	public function edit($id = null){
			$validation = array(
				array(
                'field' => 'subject',
                'label' => 'Subject',
                'rules' => "trim|required"
				),
				array(
                'field' => 'template',
                'label' => 'template',
                'rules' => 'trim|required'
                )
            );
			$this->load->library(array('encrypt','form_validation'));
			$this->form_validation->set_rules($validation);
			$this->form_validation->set_error_delimiters('<span class="input-notification error png_bg">', '</span>');
			if ($this->form_validation->run() === TRUE) {
				$data = _xss_clean(
						array("subject" => _input_post("subject"),
						"template" => _input_post("template")
						)
						);

				if ($this->commonmodel->_update("email_templates", $data,array('id'=>_input_post("id"))) == true) {
					$this->session->set_flashdata("success", "Email has been updated successfully updated");
					redirect("/admin/emails/manage");
				}
				
			}
			$this->viewData['data'] = $this->email_model->load_template((int)$id);
			$this->viewData['title'] = "Edit Templates";
			$this->viewData['ckconfig'] = $this->ckConfig;
			$this->layout->view("admin/edit_emails", $this->viewData);
	}
}

?>
