<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class user extends CI_Controller {
	 
	public function __construct() {
		parent::__construct();
		$this->site_santry->allow(array("login",'register','verify','forgot_pass','pass_recover','autologin'));
		$this->load->library('encrypt');
		$this->load->library('email');
		$this->load->model('email_model');
		$this->layout->set_layout('layout/layout_inner');
		
	} 
	
	##-- Index function is for login --##
	public function index(){
			$this->login();
	}
	
	/*
	 *Login to site 
	 */
	public function login(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'required|trim|xss_clean');
		
		if ($this->form_validation->run() === FALSE){
			$data = array();
			$data['title'] = 'Login';
			
			$this->load->helper('cookie');
			
			$data['unam'] = get_cookie('unam');
			$data['pass'] = $this->encrypt->decode(get_cookie('pass'));  
			
			$this->layout->set_layout('layout/layout_blank');
			$this->layout->view('front/login',$data);
		}else{
			$data = array();
			$this->load->model('User_model');
			
			$email 	= $this->input->post('email');
			$pass  	= $this->input->post('pass');
			$row 	= $this->User_model->auth_user($email);
			
			if(is_array($row) && count($row) == 1){
				
				if ($this->encrypt->decode($row->password) == $pass) {
					
					if($this->input->post('rem_me') == 'yes'){
						$this->load->helper('cookie');
						set_cookie('unam',$row->email,time()+60*60*24*30);
						set_cookie('pass',$row->password,time()+60*60*24*30);
						set_cookie('login','yes',time()+60*60*24*30);
						
					}
					
					$data['title'] = 'Message';
					$data['message_type'] = 'Sucess';
					$data['message'] = 'You have sucessfully login';
					
					$this->site_santry->do_login($this->User_model->user_auth_data($row->id));
					
					$info['last_login_ip'] = $_SERVER['REMOTE_ADDR'];
					$info['last_login_date'] = date('Y-m-d',time());
					
					$this->User_model->update_user($info,$row->id);
					if($row->role == 1 ){
						redirect("/user/dashboard");
					}else{
						redirect("/trainer/dashboard");
					}
				}else{
					$data['title'] = 'Message';
					$data['message_type'] = 'Error';
					$data['message'] = 'Email and password are not correct';
			
					$this->layout->set_layout('layout/layout_inner');
					$this->layout->view('front/message',$data);
				}	
			}else if(is_array($row) && count($row) == 2){
				if ($this->encrypt->decode($row[0]->password) == $pass) {
					$flag = true;
				}else if ($this->encrypt->decode($row[1]->password) == $pass) {
					$flag = true;
				}else{
					$flag = false;
				}
				
				if($flag){
					$data['title'] = 'Please choose user type';
					$data['data'] = $row;
					$this->layout->set_layout('layout/layout_inner');
					$this->layout->view('front/profile_selecter',$data);
				}else{
					$data['title'] = 'Message';
					$data['message_type'] = 'Error';
					$data['message'] = 'Email and password are not correct';
			
					$this->layout->set_layout('layout/layout_inner');
					$this->layout->view('front/message',$data);
				}
				
			}else{
				$data['title'] = 'Message';
				$data['message_type'] = 'Error';
				$data['message'] = 'Email and password are not correct';
				$this->layout->set_layout('layout/layout_inner');
				$this->layout->view('front/message',$data);
			}
			
		}
	}
	
	/* 
	 *User registration 
	 */
	public function register(){

		$this->load->helper('form');
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('fname', 'First name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('lname', 'Last name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('mob_no', 'Mobile no', 'required|trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'required|trim|xss_clean');
		$this->form_validation->set_rules('pass2', 'Confirm password', 'required|trim|xss_clean');
	
		if ($this->form_validation->run() === FALSE){
			$data = array();
			$data['title'] = 'Register';
			$this->layout->set_layout('layout/layout_blank');
			$this->layout->view('front/register',$data);
		}else{
			$data = array();
			$this->load->model('User_model');
			$date  = date('Y-m-d',time());
			$encrypt_pass = $this->encrypt->encode(_input_post('pass'));
			
			$birth_date = $this->input->post('yy').'-'.$this->input->post('mm').'-'.$this->input->post('dd');
			$data = array(
					'first_name' => $this->input->post('fname'),
					'last_name' => $this->input->post('lname'),
					'email' => $this->input->post('email'),
					'mob_no' => $this->input->post('mob_no'),
					'gender'=>$this->input->post('gender'),
					'password' => $encrypt_pass,
					'birth_date'=>$birth_date,
					'role'=>'1',
					'join_date' => $date,
					'status' => '1',
					'verified'=>'0',
					'last_login_ip'=> $_SERVER['REMOTE_ADDR'],
					'last_login_date' => $date
					);
			
			$userID = $this->User_model->register($data);	
			$link = base_url().'user/verify/'.urlencode(base64_encode($userID));

			/*Load template*/
			$master   = $this->email_model->load_template(1);
			$template = $this->email_model->load_template(2);
			$template2 = str_replace('[VERIFY_LINK]',$link,$template->template);

			
			$message = str_replace('[MAIN_CONTENT]',$template2,$master->template);
			/*mail send */
			$this->email->to($data['email']);
			$this->email->from('admin@gympik.com');
			$this->email->subject($template->subject);
			$this->email->message($message);
			$this->email->send();
			
			$data['title'] 		  	= 'Message';
			$data['message_type'] 	= 'Sucess';
			$data['message'] 		= 'You have sucessfully register with Gympik. Please check your mail to activate 
									   your account';
			
			$this->layout->view('front/message',$data);
		}
	}
	

	/*
	 *Logut From site 
	 */
	public function logout(){
		$this->site_santry->do_log_out();
		$this->load->helper('cookie');
		delete_cookie('login');
		redirect('home');	
	}
	
	/*
	 *to verify the user 
	 */
	public function verify($encyptID){
		$this->load->model('User_model');
		$id = base64_decode(urldecode($encyptID));
		$userInfo = $this->User_model->get_user_by_id((int) $id);
		if(is_object($userInfo) && count($userInfo) >0){
			$this->commonmodel->_update('gympik_member',array('verified'=>'1'),array('id'=>$id));	
			$data['title'] 		  	= 'Verified';
			$data['message_type'] 	= 'Sucess';
			$data['message'] 		= 'you have sucessfully verified your account.';	
		}else{
			$data['title'] 		  	= 'Un authorised user';
			$data['message_type'] 	= 'error';
			$data['message'] 		= 'You are not a authorised user Please try with valid link';	
		}
		
		$this->layout->view('front/message',$data);
	} 
	 
	/*
	 *User Dashboard
	 */
	public function dashboard(){
			
		$data = array();
		$data['title'] = 'Fitness DashBoard';
		$this->layout->set_layout('layout/layout_inner');
		$this->layout->view('front/dashboard',$data);
	}
	
	
	/*
	 *user incomplete info 
	 */
	public function incomplete_profile(){
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('User_model');
		
		$this->form_validation->set_rules('add', 'Address', 'required|trim|xss_clean');
		$this->form_validation->set_rules('pincode', 'Pincode', 'required|trim|xss_clean');
		$this->form_validation->set_rules('weight', 'Weight', 'required|trim|xss_clean');
		$this->form_validation->set_rules('desc', 'Description', 'required|trim|xss_clean');
		$this->form_validation->set_rules('alle', 'Medical history', 'required|trim|xss_clean');
		if ($this->form_validation->run() === FALSE){
			$data = array();
			$data['title'] = 'Incomplete Profile';
			$this->layout->set_layout('layout/layout_blank');
			$this->layout->view('front/incomplete_profile',$data);
		}else{
			$data = array(
					'description' => $this->input->post('desc'),
					'medical' => $this->input->post('alle'),
					'address' => $this->input->post('add'),
					'pincode' => $this->input->post('pincode'),
					'weight'=>$this->input->post('weight'),
					'height' => $this->input->post('height'),
					'profile'=>'1'
					);
			$this->User_model->update_user($data,$this->site_santry->get_auth_data()->id);
			$info = $this->User_model->get_user_by_id((int) $this->site_santry->get_auth_data()->id );
			$this->site_santry->do_login($info);
			redirect("/user/dashboard");
		}
	} 
	
	/*
	 * Forgot password 
	 */
	public function forgot_pass(){
		$data = array();
		$data['title'] = 'Recover Password';
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email_fp', 'Email', 'required|trim|valid_email');
		if ($this->form_validation->run() === FALSE){
			$this->layout->set_layout('layout/layout_blank');
			$this->layout->view('front/forgot_pass',$data);
		}else{
			$this->load->model('User_model');
			
			$email 	= $this->input->post('email_fp');
			$row 	= $this->User_model->auth_user($email);
			if(is_object($row) && count($row) == 1){
				$userID = $row->id;
				$link = base_url().'user/pass_recover/'.urlencode(base64_encode($userID));
	
				/*Load template*/
				$master   = $this->email_model->load_template(1);
				$template = $this->email_model->load_template(5);
				$template2 = str_replace('[RECOVER_LINK]',$link,$template->template);
	
				
				$message = str_replace('[MAIN_CONTENT]',$template2,$master->template);
				/*mail send */
				$this->email->to($row->email);
				$this->email->from('admin@gympik.com');
				$this->email->subject($template->subject);
				$this->email->message($message);
				$this->email->send();
				
				$data['title'] 		  	= 'Message';
				$data['message_type'] 	= 'Sucess';
				$data['message'] 		= 'An email has been sent you. please check that and follow instruction';
				
				$this->layout->view('front/message',$data);	
			}else{
				$data['title'] 		  	= 'Message';
				$data['message_type'] 	= 'Error';
				$data['message'] 		= 'Email address do not exist';
				
				$this->layout->view('front/message',$data);	
			}
		}	
	}
	
	/*
	 * Change passoword in user forgot 
	 */
	
	public function pass_recover($encyptID){
		
		$this->load->model('User_model');
		
		$id = base64_decode(urldecode($encyptID));
		$userInfo = $this->User_model->get_user_by_id((int) $id);
		if(is_object($userInfo) && count($userInfo) >0){
			
			if(count($_POST) > 0 ){
				$encrypt_pass = $this->encrypt->encode(_input_post('pas'));
				$this->commonmodel->_update('gympik_member',array('password'=>$encrypt_pass),array('id'=>$id));	
				
				$data['title'] 		  	= 'Message';
				$data['message_type'] 	= 'Sucess';
				$data['message'] 		= 'your password has been changed sucessfully';	
				$this->layout->view('front/message',$data);

			}else{
				$data['title'] 		  	= 'Recover password';
				$data['encyp']			= $encyptID;
				$this->layout->view('front/pass_recover',$data);	
			}
		}else{
			$data['title'] 		  	= 'Un authorised Request';
			$data['message_type'] 	= 'error';
			$data['message'] 		= 'You are not a authorised user Please try with valid link';	
			
			$this->layout->view('front/message',$data);
		}
	}
	
	
	/*
	 * function for user who is registered as a user or a trainer  
	 */
	
	public function autologin($encryptID){
		$id = base64_decode($encryptID);
		
		$this->load->model('User_model');
		$userDAta = $this->User_model->user_auth_data($id);
		$this->site_santry->do_login($userDAta);
		if($userDAta->role == 1 ){
			redirect("/user/dashboard");
		}else{
			redirect("/trainer/dashboard");
		}
	}  
	
	
}

	 function profile_selecter(){
		$data = array();
		$data['title'] = 'Recover Password';
		
		$this->load->helper('form');
			if ($this->form_validation->run() === FALSE){
			$this->layout->set_layout('layout/layout_blank');
			$this->layout->view('front/profile_selecter',$data);
	     	}
			else
			{
			$this->load->model('User_model');
	    		/*Load template*/
				$master   = $this->email_model->load_template(1);
				$template = $this->email_model->load_template(5);
				$template2 = str_replace('[RECOVER_LINK]',$link,$template->template);
				
				$message = str_replace('[MAIN_CONTENT]',$template2,$master->template);
				/*mail send */
			}
		}	

