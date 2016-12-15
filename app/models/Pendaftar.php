<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar extends CI_Model {

	public $username;
	public $password;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//mengambil semua data
	public function getAll()
	{
		$query=$this->db->query("SELECT * FROM pendaftar;");
		$this->db->limit(1, 2);
		return $query->result_array();
	}
	//mengambil data peserta dengan id tertentu
	public function getfromID($id)
	{
		$query=$this->db->query("SELECT * FROM pendaftar where ID='$id'");
		return $query->result_array();
	}
	public function getCount()
	{
		return $this->db->count_all('pendaftar');
	}
	//mengambil semua data
	public function addPeserta($data=array())
	{
		$this->db->insert('pendaftar', $data);
		// Produces: INSERT INTO pendaftar (ID,nama,nohp,namawali) VALUES ($_POST['ID'], $_POST['nama'], $_POST['nohp'],$_POST['namawali'])
	}
	
}

/* end of file Pendaftar.php */
/* location : app/models/Pendaftar.php */