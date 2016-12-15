<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
		

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('ID', $_SESSION['ID']);
		$query = $this->db->get();
		if ($query->result()){
		foreach ($query->result() as $value){
		$this->u=$value->username;
		$this->p=$value->password;
		$this->e=$value->email;
		}
		} else {
		header("Location:".base_url()."index.php/exp/index/logout");
		}
	}
	//halaman exp atau admin
	public function index()
	{
		
		if($_POST){
			if ($_POST['act']=='addUser') {
		 	//insert user
			$this->db->set('username', htmlspecialchars($_POST['username']));
			$this->db->set('password', base64_encode(htmlspecialchars($_POST['password'])));
			$this->db->set('level', htmlspecialchars($_POST['level']));
			$this->db->set('email', htmlspecialchars($_POST['email']));
			$this->db->insert('users');
		 	} 
		 	if ($_POST['act']=='editUser') {
		 	//update user
			$data = array(
			'username' => htmlspecialchars($_POST['username']),
			'password'  => base64_encode(htmlspecialchars($_POST['password'])),
			'level'  => htmlspecialchars($_POST['level']),
			'email'  => htmlspecialchars($_POST['email']),
			);
			$this->db->where('ID', $_POST['id']);
			$this->db->update('users', $data);
		 	} 
		 	if ($_POST['act']=='deleteUser') {
			 	//hapus user
				if ($_SESSION['ID']== $_POST['id']){
				
				} else {
				$this->db->where('ID', $_POST['id']);
				$this->db->delete('users');
			}
		 	} 
		} 
		
		$data=array(
		'username'=>$this->u,
		//'password'=>'ququm',
		'title'=>'Users',
		'formtitle'=>'Table Users',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		'usersdata' => $this->Users_model->getAll(),
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/tableusers');
		$this->load->view('backendcontents/footer');
	}
	
	public function edit()
	{
		if (empty($_POST['act'])) {
			$this->index();
		} else {
		$data=array(
		'username'=>$this->u,
		'title'=>'Edit User',
		'formtitle'=>'Edit User',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		'menu' => $this->Users_model->getUser($_POST['act']),
		'act'=>$_POST['act'],
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/formUser');
		$this->load->view('backendcontents/footer');
		}
	}
	public function add()
	{
		
		
		
		$data=array(
		'username'=>$this->u,
		'password'=>'ququm',
		'title'=>'Add User',
		'formtitle'=>'Add user',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		'act'=>'addUser',
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/formuser');
		$this->load->view('backendcontents/footer');
	}

}
