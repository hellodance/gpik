<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Admins extends CI_Controller {

	//put your code here
	var $viewData = array();

	public function __construct() {
		parent::__construct();
		$this->site_santry->redirect = "/admin/admins/login";
		$this->site_santry->allow(array("login"));
		$this->layout->set_layout("layout/layout_admin");
		$this->load->model("basic_model");
	}

	public function index() {
		$this->dashboard();
	}

	public function dashboard() {
		$this->viewData['title'] = "Dashboard";
		$this->layout->view("admin/admins_dashbard", $this->viewData);
	}

	public function login() {

		$valudation = array(
		array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
                ),
                array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|callback__validate_user'
                ),
                array(
                'field' => 'request',
                'label' => 'Request',
                'rules' => 'trim'
                )
                );
                $this->load->library('form_validation');
                $this->form_validation->set_rules($valudation);
                if ($this->form_validation->run() === TRUE) {
                	if ($this->commonmodel->_update("admins", array("last_login" => date('Y-m-d H:i:s')), array("id" => $this->site_santry->get_auth_data()->id))) {
                		redirect($this->input->post('request') ? $this->input->post('request') : "/admin/admins/dashboard/?auth=verify&ullu=OK");
                	}
                }
                $this->viewData['request'] = $this->input->get("request") ? base64_decode(_input_get('request')) : "";
                $this->viewData['title'] = "Admin Login";
                $this->layout->set_layout("layout/layout_login");
                $this->layout->view("admin/admins_login", $this->viewData);
	}

	public function _validate_user() {
		$this->load->library('encrypt');
		
		$password = _input_post('password');
		$username = _input_post('username');
		$result = $this->db->select("admins.*")
		->where("username = '" . addslashes($username) . "' AND (role = 2 OR role = 3)")
		->get("admins");
		if ($result->num_rows() > 0) {
			if ($this->encrypt->decode($result->row()->password) == $password) {
				$this->site_santry->do_login($result->row());
				return TRUE;
			}
		}
		$this->form_validation->set_message('_validate_user', 'Invalid Username / %s');
		return FALSE;
	}

	public function logout() {
		if ($this->site_santry->is_admin_login()) {
			$this->site_santry->do_log_out();
			redirect("/admin/admins/login");
		}
	}

	/**
	 *
	 * @param type $id
	 */
	public function edit($id = null) { 
		$validation = array(
				array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => "trim|required|min_length[5]|max_length[15]|alpha_numeric|is_unique[admins.username.id.{$this->site_santry->get_auth_data()->id}]"
				),
				array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => "trim|required|valid_email|is_unique[admins.email.id.{$this->site_santry->get_auth_data()->id}]"
				),
				array(
                'field' => 'npassword',
                'label' => 'New password',
                'rules' => 'trim|min_length[5]|max_length[15]'
                ),
                array(
                'field' => 'cpassword',
                'label' => 'Conifrm password',
                'rules' => 'trim|min_length[5]|max_length[15]|matches[npassword]'
                ),
                array(
                'field' => 'opassword',
                'label' => 'old password',
                'rules' => 'trim|required|callback__check_old_password'
                )
            );
			$this->load->library(array('encrypt','form_validation'));
			$this->form_validation->set_rules($validation);
			$this->form_validation->set_error_delimiters('<span class="input-notification error png_bg">', '</span>');
			if ($this->form_validation->run() === TRUE) {
				$data = _xss_clean(
				array(
					"username" => _input_post("username"),
					"email" => _input_post("email")
				)
				);
				if($this->input->post("npassword")){
					$data['password'] = $this->encrypt->encode(_input_post('npassword'));
				}
				if ($this->commonmodel->_update("admins", $data, array("id" => $this->site_santry->get_auth_data()->id)) == true) {
					/*Update Auth data*/
					$auth_data = $this->site_santry->get_auth_data();
					$auth_data->username = $data['username'];
					$auth_data->email = $data['email'];
					$auth_data->password = isset ($data['password']) ? $data['password'] : $auth_data->password;
					$this->site_santry->do_login($auth_data);
					$this->session->set_flashdata("success", "Admin information updated successfully");
					redirect("/admin/admins/edit");
				}
			}
			$this->viewData['user_data'] = $this->basic_model->get_user_by_id((int) $this->site_santry->get_auth_data()->id);
			$this->viewData['title'] = "Update Admin User";
			$this->layout->view("admin/admins_edit", $this->viewData);
	}
	
	/*
	 * Return type boolean true false;
	 */
	public function _check_old_password($opassword) {
		$user_data = $this->basic_model->get_user_by_id((int) $this->site_santry->get_auth_data()->id);
		if ($this->encrypt->decode($user_data->password) == $opassword) {
			return true;
		}
		$this->form_validation->set_message('_check_old_password', '%s didn\'t match');
		return FALSE;
	}
	
	/*
	 * Function for site setting updation
	 */
	
	public function site_setting(){
		
		$data = $this->input->post("setting");
		
		if($data != '' && is_array($data)){
			foreach($data as $id => $set){
				$this->basic_model->setting_updater($set,$id);
			}
			$this->session->set_flashdata("success", "Site Setting updated successfully");
			redirect("/admin/admins/site_setting");
		}else{	
			$this->viewData['settings'] = $this->basic_model->get_site_setting();
			$this->viewData['title'] = "Site setting";
			$this->layout->view("admin/site_setting", $this->viewData);
		}	
	}

}

?>
