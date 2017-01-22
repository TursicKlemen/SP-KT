<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Odjava extends CI_Controller {
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
    }
	
	public function index()
	{				
		$l = $this->config->item('logged_var');
		$this->session->unset_userdata($l);
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('lang');
		$this->session->unset_userdata('rights');
		redirect('');	
	}
	
}
