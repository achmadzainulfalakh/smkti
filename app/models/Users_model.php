<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{
	function __construct(){
		parent::__construct();
		//$this->load->database(); 
	}

	
	function getAll(){		
		$query=$this->db->query('select * from users');
		$rows=$query->num_rows();
		if($rows>0){
		return $query->result();
		} else {
		return 0;
		}
	}
	function getUser($idusr=''){		
		$query=$this->db->query("select * from users where ID='".$idusr."'");
		$rows=$query->num_rows();
		if($rows>0){
		return $query->result();
		} else {
		return 0;
		}
	}
	function usernameExists($username){		
		$query=$this->db->query("select * from users where username='".$username."'");
		$rows=$query->num_rows();
		if($rows>0){
		return true ; //saaat data ditemukan
		} else {
		return false ; //saaat data tidak ditemukan
		}
	}
	function passwordExists($password){		
		$query=$this->db->query("select * from users where password='".$password."'");
		$rows=$query->num_rows();
		if($rows>0){
		return true ; //saaat data ditemukan
		} else {
		return false ; //saaat data tidak ditemukan
		}
	}

}