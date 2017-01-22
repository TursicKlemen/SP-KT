<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model
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

}?>