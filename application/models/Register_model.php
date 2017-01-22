<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model
{
     function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }
     
     function form_insert($data, $table){
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

     function regUser(){
          $username = $this->input->post('email');
          $password = $this->input->post('geslo');
          $ime = $this->input->post('ime');
          $priimek = $this->input->post('priimek');
          $email = $this->input->post('email');

          // $salt     = 'hello_1m_@_SaLT_1298';
          $salt     = $this->config->item('db_salt');
          $password = hash('sha256', $password . $salt);

          // $sql = "SELECT username, password, rights FROM tauria_users WHERE username='{$username}' AND password='{$password}' LIMIT 1";
          // $result = $this->db->query($sql);
          
          $where = array(
                         'username' => $username, 
                         'password' => $password,
                         'ime' => $ime,
                         'priimek' => $priimek,
                         'email' => $email,
                         'active'   => "1"
                    );
          $this->db->where($where);
          $result = $this->db->get('todo_users');   

          $row = $result->row();

          $l = $this->config->item('logged_var');

          if($result->num_rows() === 1){
               
               $sessionData = array(
                         'username'   => $row->username,
                         $l  => 1,
                         'lang'       => 'slo'
                    );
               
               $this->session->set_userdata($sessionData);
               return 'true';

          }else{
               return "false";
          }
     }
}?>