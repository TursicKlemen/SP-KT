<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model
{
     public function __construct()
     {
          // Call the Model constructor
          parent::__construct();
     }

     public function loginUser(){
          $username = $this->input->post('upime');
          $password = $this->input->post('geslo');

          $salt     = $this->config->item('db_salt');
          $password = hash('sha256', $password . $salt);


          
          $where = array(
                         'username' => $username, 
                         'password' => $password,
                         'active'   => "1"
                    );
          $this->db->where($where);
          $result = $this->db->get('todo_users');   

          $row = $result->row();

          $l = $this->config->item('logged_var');

          if($result->num_rows() === 1){
               
               $sessionData = array(
                         'username'   => $row->username,
                         'id' => $row->id,
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