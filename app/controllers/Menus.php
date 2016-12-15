<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus extends CI_Controller {

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
		public function index()
	{

		if($_POST){
			if ($_POST['act']=='addMenu') {
		 	//insert menu
			$this->db->set('text', htmlspecialchars($_POST['text']));
			$this->db->set('link', $_POST['link']);
			$this->db->set('order', htmlspecialchars($_POST['order']));
			$this->db->insert('menus');
		 	} 
		 	if ($_POST['act']=='editMenu') {
		 	//update menu
			$data = array(
			'text'  => htmlspecialchars($_POST['text']),
			'link'  => htmlspecialchars($_POST['link']),
			'order' => htmlspecialchars($_POST['order'])
			);
			$this->db->where('ID', $_POST['id']);
			$this->db->update('menus', $data);
		 	} 
		 	if ($_POST['act']=='deleteMenu') {
		 	//insert menu
			$this->db->where('ID', $_POST['id']);
			$this->db->delete('menus');
		 	} 
		}
		
		$data=array(
		'username'=>$this->u,
		'title'=>'Menus',
		'formtitle'=>'Table Menus',
		'description'=>'ini adalah halaman menu',
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		'menus' => $this->Menus_model->getMenus(),
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/tablemenus');
		$this->load->view('backendcontents/footer',$data);
	}
	public function edit()
	{
		if (empty($_POST['act'])) {
			$this->index();
		} else {
		$data=array(
		'username'=>$this->u,
		'title'=>'Menu',
		'formtitle'=>'Edit Menu',
		'description'=>'ini adalah halaman menu',
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		'menu' => $this->Menus_model->getMenu($_POST['act']),
		'act'=>$_POST['act'],
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/formMenu');
		$this->load->view('backendcontents/footer');
	}
	}
	public function add()
	{
		$data=array(
		'username'=>$this->u,
		'title'=>'Menu',
		'formtitle'=>'New Menu',
		'description'=>'ini adalah halaman menu',
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
						),
		'act'=>'addMenu',
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/formMenu');
		$this->load->view('backendcontents/footer');
	}

}
