<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {
	public $menu;
	function __construct() {
		parent::__construct();
		$this->load->model('login_model'); // Berfungsi untuk memanggil Login_model
		$this->menu=array();
	}

	// Berfungsi untuk menampilkan halaman login
	function index() { 
		if($this->login_model->username()){
			redirect('board');
		} 
		else {
			$data=array(
					'title'=>'Administrator',
					'isi' =>'admin/login_view',
					'pesan' =>'',
					'menu' =>$this->menu,
					);
			$this->load->view('page/head',$data);
			$this->load->view('page/header');
			$this->load->view('contents/admin/form_login_admin');
			$this->load->view('page/footer');
		}
	
	
	}

	// Berfungsi untuk melakukan validasi login
	function validasi() { 
		$data=array(
			'username'=> $this->security->xss_clean($this->input->post('username')),
			'password'=> $this->security->xss_clean($this->input->post('password'))
			);

		// Berfungsi untuk memanggil fungsi ambil_data pada class login_model
		if($this->login_model->ambil_data($data)) { 

			// Berfungsi untuk menyimpan user data
			$sesi=$this->session->set_userdata($data);
			// Jika data yang dimasukkan valid maka akan redirect ke halaman Dashboard
			redirect('dashboard');
		}else{ // Jika data yang diinput tidak valid maka akan dialihkan ke view login gagal
			redirect('pagenotfound');
		}
		}

	// Berfungsi untuk menghapus session atau logout
	function logout() {
		if($this->login_model->username()){
			$this->session->sess_destroy();
		}
		redirect('login');
	}	
}