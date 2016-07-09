<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact_us extends CI_Controller {
 
	public function __construct() {
		parent::__construct();
		$this->layout->set_layout('layout/layout_inner');
		$this->load->library('email');
		$this->load->model('email_model');
	} 

	public function index(){
		$data = array();
		$data['title'] = 'Contact us';
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'required|trim|xss_clean');
		$this->form_validation->set_rules('message', 'Message', 'required|trim|xss_clean');
		$this->form_validation->set_rules('captcha', 'Captcha', 'required|trim|xss_clean');
		
		if ($this->form_validation->run() === FALSE){
			$this->layout->view('front/contact_us',$data);
		}else{
			
			$CONTENT=$this->input->post('message');
			/*Load template*/
			$master   = $this->email_model->load_template(1);
			$template = $this->email_model->load_template(3);
			$template2 = str_replace('[CONTENT]',$CONTENT,$template->template);

			
			$message = str_replace('[MAIN_CONTENT]',$template2,$master->template);
			/*mail send */
			$this->email->to('admin@gympik.com');
			$this->email->from($this->input->post('email'));
			$this->email->subject($template->subject);
			$this->email->message($message);
			$this->email->send();		
			redirect('contact_us');
		}
	}
}
