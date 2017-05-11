<?php if( ! defined('BASEPATH')) exit("No direct script access is Allowed .");
class User_Controller extends CI_Controller
{
	
	public function _construct()
	{parent::_construct();}
	
	public function index()
	{$this->home();}
	
	public function home()
	{
		$this->load->model('user_model'); //loading the model for database handling
		$this->load->helper('array'); // loading the different helper for use in view .
		$this->load->helper('email');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->helper('string');
		
		// Associative Array
		$data['title']="MVC cool title";// accessible as $title in welcome_message.php
		$data['page_header']="intro to MVC design";
		$data['firstnames']=$this->user_model->getFirstNames();
		$data['users']=$this->user_model->getUsers();
		//$this->load->view('welcome_message',$data);  // COMMENT FOR FORM .
		
		
		$this->form_validation->set_rules('email','Email','required|trim| valid_email');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('url','URL','required');
		
		if ($this->form_validation->run() == FALSE)
		{$this->load->view("welcome_message",$data);}
		
		else
		{
		
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');
			$data['url'] = $this->input->post('url');
			$this->load->view("welcome_message",$data);
		}
		
	}
}
