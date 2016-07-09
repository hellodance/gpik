<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class career extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->layout->set_layout('layout/layout_inner');
		$this->load->library('email');
		$this->load->model('email_model');
	} 

	public function index(){
		$data = array();
		$data['title'] = 'Career';
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('captcha', 'Captcha', 'required|trim|xss_clean');
		
		if ($this->form_validation->run() === FALSE){
			$this->layout->view('front/career',$data);
		}else{
			
			if($this->input->post('captcha') != '12'){
				$this->session->set_flashdata("error", "Invalid capcha inserted" );
				redirect('career');	
			}else{	
				
				$this->load->library('upload');
			
				$config['upload_path'] = './resume/';
				$config['allowed_types'] = 'docx|doc|pdf';     
	
				$this->upload->initialize($config);
				
				if ($this->upload->do_upload('resume')){
					$img = $this->upload->data();
					$file_name = base_url().'resume/'.$img['file_name'];
				}else{
					$file_name = '';
				}
				
				/*Load template*/
				$this->email->clear();
				$CONTENT=$this->input->post('name');
				
				$master   = $this->email_model->load_template(1);
				$template = $this->email_model->load_template(4);
				$template2 = str_replace('[NAME]',$CONTENT,$template->template);
				
				$message = str_replace('[MAIN_CONTENT]',$template2,$master->template);
				/*mail send */
				$TO_ADMIN = $this->commonmodel->load_setting('career_email');
				$this->email->to($TO_ADMIN);
				$this->email->from('admin@gymik.com');
				$this->email->subject($template->subject);
				$this->email->message($message);
			    $this->email->attach($file_name);
		 		$this->email->send();
				$this->session->set_flashdata("success", "Your Resume has been successfully send." );		
				redirect('career');
			}
		}
	}
}
