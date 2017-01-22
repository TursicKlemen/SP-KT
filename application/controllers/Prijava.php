<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prijava extends CI_Controller {
	private $l;
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct(){
		parent::__construct();

		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('html');
		$this->load->database();
		
		$this->load->library('table');
		$this->load->model('login_model');

		//if user is already loged in, redirect him to home page of admin
  		$uri = explode( "/",uri_String() ) ;
  		$currentpage = $uri[sizeof($uri)-1];

  		$this->l = $this->config->item('logged_var');

		if( !($this->session->userdata($this->l)) && $currentpage != "prijava"){
			redirect('prijava');
		}
		
    }
	
	public function index()
	{
		if($this->session->userdata($this->l) == 1){
			redirect('plosca/seznam');
		}

		$this->form_validation->set_rules('upime', 'Uporabniško ime', 'required');
		$this->form_validation->set_rules('geslo', 'Geslo', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("prijava", array("errors" => validation_errors()));

		}
		else
		{
			$result = $this->login_model->loginUser();
			
			if($result == "true"){
				//pass and username are correct
				redirect('plosca/seznam');
			}else{
				//reload page - username and password are incorrect				
				$this->session->set_flashdata("error" , "Napačno uporabniško ime ali geslo!");
				redirect('prijava');
			}
		}
	}
	
	
}
