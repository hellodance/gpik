<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Users extends CI_Controller {

	var $viewData = array();

	public function __construct() {
		parent::__construct();
		$this->site_santry->redirect = "/admin/admins/login";
		$this->site_santry->allow(array("login"));
		$this->layout->set_layout("layout/layout_admin");
		$this->load->model("user_model");
	}

	public function index() {
		$this->manage();
	}
    public function status($id,$status){
		
		$newStatus = $status == '1' ? '0' : '1';
		$this->commonmodel->_update("gympik_member",array('status'=>$newStatus) ,array('id'=>$id));
		$this->session->set_flashdata("success", "user has been successfully updated" );
		redirect("/admin/users/manage");
		
	}
	public function manage() {
		
		$config["base_url"] = base_url() . "admin/users/manage";
        $config["total_rows"] = $this->user_model->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
		
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		
		$this->viewData['title'] = " Manage Users";
		$this->viewData['lists'] = $this->user_model->list_users($config["per_page"], $page);
		$this->viewData['paging'] = $this->pagination->create_links();
		$this->layout->view("admin/manage_users", $this->viewData);
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
	
	public function delete($id){
    	$this->commonmodel->_delete("gympik_member", array('id'=>$id));
		$this->session->set_flashdata("success", "User has been deleted successfully" );
		redirect("/admin/users/manage");
	}
	
	public function edit($id = null){
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
                'rules' => "trim|required|valid_email"
				),
				array(
                'field' => 'mob_no',
                'label' => 'Mobile no',
                'rules' => 'trim|required|min_length[5]|max_length[15]'
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

				if ($this->commonmodel->_update("gympik_member", $data,array('id'=>_input_post("id"))) == true) {
					$this->session->set_flashdata("success", "User has been updated successfully");
					redirect("/admin/users/manage");
				}
				
			}
			$this->viewData['data'] = $this->user_model->get_user_by_id((int)$id);
			$this->viewData['title'] = "Edit User";
			$this->layout->view("admin/edit_member", $this->viewData);
	}
}

?>
