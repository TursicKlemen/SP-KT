<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registracija extends CI_Controller {
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
		$this->load->model('register_model');
		
    }
	
	public function index()
	{
		

		$this->form_validation->set_rules('ime', 'Uporabniško ime', 'required');
		$this->form_validation->set_rules('priimek', 'Priimek', 'required');		
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('geslo', 'Geslo', 'required');
		$this->form_validation->set_rules('geslo2', 'Potrditev gesla', 'required');		
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view("registracija", array("errors" => validation_errors()));

		}
		else
		{
			//vpis v db
			//var_dump($this->input->post());
			$salt     = $this->config->item('db_salt');
			$password = hash('sha256', $this->input->post("geslo") . $salt);
			
			$dataToSave["username"] = $this->input->post("email");
			$dataToSave["password"] = $password;
			$dataToSave["ime"] = $this->input->post("ime");
			$dataToSave["priimek"] = $this->input->post("priimek");
			$dataToSave["email"] = $this->input->post("email");			
			
			
			//$result = $this->register_model->regUser($dataToSave, "todo_users");
			$result = $this->register_model->form_insert($dataToSave, "todo_users");
			
			if($result > 0){
				//pass and username are correct
				$this->session->set_flashdata("error" , "Registracija uspela!");
				redirect('registracija');
			}else{
				//reload page - username and password are incorrect				
				$this->session->set_flashdata("error" , "Napaka pri vpisu!");
				redirect('registracija');
			}
		}
	}
	
	
}
