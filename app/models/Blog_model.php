<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

	public $username;
	public $password;
	
	public function __construct()
	{
		parent::__construct();
	}
	//mengambil semua data
	public function getUser($data=false)
	{
		if ($data===false){
		$query=$this->db->get('users');
		return $query-result_array();
		}
		$query=$this->db->get_where('users', array('username'=>$data));
		return $query->row_array();
	}
	
}
