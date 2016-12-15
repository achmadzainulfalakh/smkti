<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exp extends CI_Controller {

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
	//halaman home atau halaman depan
	
	public function __construct()
	{
		parent::__construct();
	}
	public function index($act='',$idusr='',$u='',$p='')
	{
	$pesan="";	
		switch ($act) {
		  case 'login':
			if($_POST){
			$u=htmlspecialchars($_POST['username']);
			$p=htmlspecialchars($_POST['password']);
			$p=base64_encode($p);
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('username', $u);
			$this->db->where('password', $p);
			$rows = $this->db->get();
			if ($rows->result()){
			foreach ($rows->result() as $value){
			$_SESSION['ID']=$value->ID;
			header('Location:'.base_url().'index.php/board');
			//$a=base64_encode($value->password);
			//echo $a."<br/>";
			//$a = str_replace(' ','+',$a);
			//echo base64_decode($a);
			}
			} else {
			$pesan="username atau password anda tidak ditemukan.";
			}
			}
			break;
		  case 'logout':
			$_SESSION['ID']='';
			break;
		  case 'register':
			if($_POST){
			$u=htmlspecialchars($_POST['username']);
			$p=htmlspecialchars($_POST['password']);
			$e=htmlspecialchars($_POST['email']);
			$p=base64_encode($p);
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('username', $u);
			$this->db->or_where('email', $e);
			$rows = $this->db->get();
			if (!$rows->result()){
			//foreach ($rows->result() as $value){
			//$_SESSION['ID']=$value->ID;
			//header('Location:'.base_url().'index.php/exp/dashboard');
			//}
			$data = array(
					'username' => $u,
					'password' => $p,
					'email' => $e,
					'level' => 'user',
			);

			$this->db->insert('users', $data);
			$pesan="Berhasil mendaftar.";
			} else{
			$pesan="Usename atau email telah digunakan.";
			}
			}
			break;
		  default:
			
		}
	$data=array(
		'pesan'=>$pesan,
		'title'=>'Login',
		'tahuncopy'=>'2016',
		'author'=>'Achmad Zainul Falakh, S.Kom',
		);	
	$this->load->view('backendcontents/vlogin',$data);	
	}

}
