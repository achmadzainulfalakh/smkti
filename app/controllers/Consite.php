<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consite extends CI_Controller {

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
			if ($_POST['act']=='updateConsite') {
		 	//update consite
			$this->Conf_model->myUpdateConsite('author',htmlspecialchars($_POST['author']));
			$this->Conf_model->myUpdateConsite('linkauthor',htmlspecialchars($_POST['linkauthor']));
			$this->Conf_model->myUpdateConsite('linkfb',htmlspecialchars($_POST['linkfb']));
			$this->Conf_model->myUpdateConsite('linktwitter',htmlspecialchars($_POST['linktwitter']));
			$this->Conf_model->myUpdateConsite('linkyoutube',htmlspecialchars($_POST['linkyoutube']));
			$this->Conf_model->myUpdateConsite('hp',htmlspecialchars($_POST['hp']));
			$this->Conf_model->myUpdateConsite('telp',htmlspecialchars($_POST['telp']));
			$this->Conf_model->myUpdateConsite('email',htmlspecialchars($_POST['email']));
			$this->Conf_model->myUpdateConsite('street',htmlspecialchars($_POST['street']));
			$this->Conf_model->myUpdateConsite('copyrightfooter',htmlspecialchars($_POST['copyrightfooter']));
			$this->Conf_model->myUpdateConsite('sitename',htmlspecialchars($_POST['sitename']));
			$this->Conf_model->myUpdateConsite('selogan',htmlspecialchars($_POST['selogan']));
		 	} 
 
		}
	


		$data=array(
		'username'=>$this->u,
		'title'=>'Config Site',
		'description'=>'ini adalah halaman konfigurasi situs',
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		'consite' => $this->db->get('consite'),
		'act'=>'config',
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/formConfigSite');
		$this->load->view('backendcontents/footer');
	}
	public function myUpdateConsite($wherename,$value)
	{
		$this->db->set('value', $value);
		$this->db->where('name', $wherename);
		$this->db->update('consite');
	}


}
