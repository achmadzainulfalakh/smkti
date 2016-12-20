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
	function pendaftar_id()
	{
		return $this->session->userdata('ID');
	}
	
	function reset_pendaftar()
	{
		$this->db->query("delete FROM pendaftar");
	}

	function exportcsv()
	{
		$query = $this->db->query("SELECT ID,nama as Nama,tempatlahir as `Tempat Lahir`,tanggallahir as `Tanggal Lahir`,jeniskelamin as `Jenis kelamin`,agama as Agama,asalsekolah as `Asal Sekolah`,alamatlengkap as `Alamat Lengkap`,nohp as `No HP`,namawali as `Nama Wali` FROM pendaftar;");
		$csv=$this->dbutil->csv_from_result($query);
		force_download('pendaftar.csv',$csv);
	}
	
}

/* end of file Pendaftar.php */
/* location : app/models/Pendaftar.php */