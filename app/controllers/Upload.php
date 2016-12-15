<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

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
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{

		
		$data=array(
		'username'=>$this->u,
		'title'=>'Upload',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		//'consite' => $this->db->get('consite'),
		//'act'=>'config',
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/formupload', array('error' => ' ' ));
		$this->load->view('backendcontents/footer');
	}
	function do_upload()
	{
		$config['upload_path'] = 'assets/upload' ;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '5000000';
		$config['max_width']  = '2048';
		$config['max_height']  = '2048';
		$config['overwrite']  = TRUE;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
				$data=array(
		'username'=>$this->u,
		'title'=>'Upload',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		//'consite' => $this->db->get('consite'),
		//'act'=>'config',
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/formupload', $error);
		$this->load->view('backendcontents/footer');
		}
		else
		{
				$data=array(
		'username'=>$this->u,
		'title'=>'Upload',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		//'consite' => $this->db->get('consite'),
		//'act'=>'config',
		'upload_data' => $this->upload->data(),
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/successupload');
		$this->load->view('backendcontents/footer');
		}
	}

}