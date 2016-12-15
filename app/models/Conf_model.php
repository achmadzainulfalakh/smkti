<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conf_model extends CI_Model{
	function __construct(){
		parent::__construct();
		//$this->load->database(); 
	}

	
	public function myUpdateConsite($wherename,$value)
	{
		$this->db->set('value', $value);
		$this->db->where('name', $wherename);
		$this->db->update('consite');
	}
	function getConf($name='',$value=''){		
		$this->db->select('value');
		$this->db->from('consite');
		$this->db->where($name,$value);
		$query=$this->db->get();
		foreach($query->result() as $value){ 
		return $value->value;
		}
	}

}