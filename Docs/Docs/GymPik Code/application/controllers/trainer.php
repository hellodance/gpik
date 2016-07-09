<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class trainer extends CI_Controller {
	 
	public function __construct() {
		parent::__construct();
		$this->site_santry->allow(array("index","register","find","profile"));
		$this->load->library('encrypt');
		$this->load->library('email');
		$this->load->model('email_model');
		$this->layout->set_layout('layout/layout_inner');
	} 

	public function index(){
		$data = array();
		$data['title'] = 'Trainers';
		$this->layout->view('front/trainer',$data);
	}
	
	/*
	 * for trainer type user registration
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
			$this->layout->view('front/trainer_register',$data);
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
					'role'=>'2',
					'speciality'=>$this->input->post('speciality'),
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
	 *User Dashboard
	 */
	public function dashboard(){
		$data = array();
		$data['title'] = 'Fitness DashBoard';
		$this->layout->set_layout('layout/layout_inner');
		$this->layout->view('front/trainer_dashboard',$data);
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
		$this->form_validation->set_rules('speciality', 'speciality', 'required|trim|xss_clean');
		$this->form_validation->set_rules('desc', 'About me', 'required|trim|xss_clean');
		$this->form_validation->set_rules('consult', 'Constancy distance', 'required|trim|xss_clean');
		$this->form_validation->set_rules('exper', 'Experience', 'required|trim|xss_clean');
		$this->form_validation->set_rules('cert', 'Certification', 'required|trim|xss_clean');
		$this->form_validation->set_rules('fb_link', 'facebook link', 'required|trim|xss_clean');

		
		if ($this->form_validation->run() === FALSE){
			$data = array();
			$data['title'] = 'Incomplete Profile';
			$this->layout->set_layout('layout/layout_blank');
			$this->layout->view('front/trainer_incomplete_profile',$data);
		}else{
			$this->load->library('upload');
			
			$config['upload_path'] = './profile_pic/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';     

            $this->upload->initialize($config);
			
			if ($this->upload->do_upload('img')){
				$img = $this->upload->data();
				$file_name = $img['file_name'];
			}else{
				$file_name = '';
			}
			
			
			$data = array(
					'description' => $this->input->post('desc'),
					'address' => $this->input->post('add'),
					'pincode' => $this->input->post('pincode'),
					'speciality2' =>$this->input->post('speciality'),
					'profile_pic' =>$file_name,
					'f2f_distance' => $this->input->post('consult'),
					'experience' =>$this->input->post('exper'),
					'certification'=>$this->input->post('cert'),
					'fb_link'=>$this->input->post('fb_link'),
					'group_activity'=>$this->input->post('group') == 1 ? '1' : '0',
					'profile'=>'1'
					);
			$this->User_model->update_user($data,$this->site_santry->get_auth_data()->id);
			redirect("/trainer/dashboard");
		}
	} 
	
	
	/*
	 *Find trainer 
	 */
	
	public function find(){
		$data = array();
		$data['title'] = 'Find your trainer';
		
		if(count($_GET) == 0){
			$this->layout->set_layout('layout/layout_blank');
			$this->layout->view('front/find_trainer',$data);
		}else{
			$this->load->model('User_model');
			
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			
			$stringArr = explode('&per_page',$_SERVER['QUERY_STRING']);
			$qString = $stringArr[0];
			$config["base_url"] = base_url() . "trainer/find?".$qString;
			$config["total_rows"] = count($this->User_model->find_trainer('','','all'));
			$config["per_page"] = 20;
			$config["uri_segment"] = 3;
			$config["page_query_string"] = TRUE;
			
			$this->pagination->initialize($config);
			
			
			$listing = $this->User_model->find_trainer($config["per_page"], $page,'');
			//echo '<pre>'; print_r($listing);die();
			$data['title'] = 'Trainer listing';
			$data['listing'] 	= $listing ;
			$data['old_post'] 	= $_GET; 
			$data['paging'] = $this->pagination->create_links();
			$this->layout->set_layout('layout/layout_inner');
			$this->layout->view('front/trainer_listing',$data);
		}
	} 
	
	function profile($id = null){
		
		$this->load->model('User_model');
		
		$data['memberData'] = $this->User_model->get_user_by_id((int) $id);
		$data['title'] = 'Trainer Profile';
		
		$data['suggestion'] = $this->User_model->trainer_suggestion($data['memberData']->speciality);
		$this->layout->set_layout('layout/layout_inner');
		$this->layout->view('front/trainer_profile',$data);
	}
}
