<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

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
	
	public $u;
	public $p;
	public $e;
	
	public function __construct()
	{
		parent::__construct();
		//memuat library email
		$this->load->library('email');

	}
		public function index()
	{
		if(isset($_POST['btnSubmit'])) {
			//konfigurasi yang diperlukan
			$config=[
				'protocol' =>'smtp',
				'smtp_host' =>'smtp.mail.yahoo.com',
				'smtp_user' =>'usename@yahoo.com', //username
				'smtp_pass' =>'password', //password
				'smtp_port' =>'465',
				'smtp_crypto' =>'ssl',
				'smtp_timeout' =>'180',
				'mailtype' =>'html',
				'newline' =>"\r\n"
			];
			//inisialisasi
			$this->email->initialize($config);

			//menangkap data yang dikirim melalui form
			$tujuan=$_POST['tujuan'];
			$judul=$_POST['judul'];
			$pesan=$_POST['pesan'];
			
			//mengirim email
			$this->email->from('username@yahoo.com','Nama Anda');
			$this->email->to($tujuan);
			$this->email->subject($judul);
			$this->email->message($pesan);
			$this->email->send();

			//menampilkan respon
			$this->load->view('email_respon_view',['tujuan'=>$tujuan]);
		}	else	{
			//menampilkan form
			$this->load->view('email_form_view');
		}
	}
}
