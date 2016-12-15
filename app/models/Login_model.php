<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	function __construct(){
		parent::__construct();
		
		$this->load->database(); // Berfungsi untuk memanggil database
	}

	// Berfungsi untuk mengambil data pada tabel user yang ada di database kita
	function ambil_data($data){		
		$user = $this->db->get_where('users',$data);
		if ($user->num_rows() == 0) {
			return FALSE;
		} else {
			return $user->result();
		}		
	}
	  /* fungsi restrict halaman */
	function users_id()
	{
	return $this->session->userdata('users_id');
	}

	function username()
	{
	return $this->session->userdata('username');
	}

	function password()
	{
	return $this->session->userdata('password');
	}
	/* end fungsi restrict */
}