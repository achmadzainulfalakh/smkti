<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

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
		switch ($this->uri->segment(3)) {
		  case 'delete':
			//hapus user
			if ($_SESSION['ID']==$this->uri->segment(4)){
			
			} else {
			$this->db->where('ID', $this->uri->segment(4));
			$this->db->delete('users');
			}
			break;
		  case 'edit':
			//update post
			$data = array(
			//'postlink' => htmlspecialchars($_POST['link']),
			'post_status'  => htmlspecialchars($_POST['publish']),
			'post_update'  => date("h:i:s d-m-Y"),
			'post_title' => htmlspecialchars($_POST['title']),
			'post_subtitle'  => htmlspecialchars($_POST['subtitle']),
			'post_content'  => $_POST['ck_editor'],
			'post_author' => $this->u,
			
			);

			$this->db->where('ID', $_POST['ID']);
			$this->db->update('posts', $data);
			header("Location:".base_url()."index.php/board/posts");
			break;
		  case 'newPost':
			//insert post
			$data = array(
			//'postlink' => htmlspecialchars($_POST['link']),
			'post_status'  => htmlspecialchars($_POST['publish']),
			'post_update'  => date("h:i:s d-m-Y"),
			'post_title' => htmlspecialchars($_POST['title']),
			'post_name' => strtolower(str_ireplace(" ","-",htmlspecialchars($_POST['title']))),
			'post_subtitle'  => htmlspecialchars($_POST['subtitle']),
			'post_content'  => $_POST['ck_editor'],
			'post_author' => $this->u,
			
			);
			/*$this->db->set('username', htmlspecialchars($_POST['username']));
			$this->db->set('password', base64_encode(htmlspecialchars($_POST['password'])));
			$this->db->set('level', htmlspecialchars($_POST['level']));
			$this->db->set('email', htmlspecialchars($_POST['email']));*/
			$this->db->insert('posts',$data);
			//$postname=$this->Posts_model->getPost(strtolower(str_ireplace(" ","-",htmlspecialchars($_POST['title']))));
			$this->db->set('post_link', base_url()."index.php/site/post/".strtolower(str_ireplace(" ","-",htmlspecialchars($_POST['title']))));
			$this->db->where('post_name', strtolower(str_ireplace(" ","-",htmlspecialchars($_POST['title']))));
			$this->db->update('posts');
			
			break;
		  default:
			
		} 
		
		$data=array(
		'username'=>$this->u,
		//'password'=>'ququm',
		'title'=>'Users',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
		/*'frontmenu'=>array(
						array(
							'text'=>'Home',
							'link'=>base_url().'index.php/site/',
						),
						array(
							'text'=>'About',
							'link'=>base_url().'index.php/site/about',
						),
						array(
							'text'=>'posts',
							'link'=>base_url().'index.php/site/posts',
						),
						array(
							'text'=>'Contact',
							'link'=>base_url().'index.php/site/contact',
						),
		),*/
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		'posts' => $this->Posts_model->getPosts(),
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/tableposts');
		$this->load->view('backendcontents/footer',$data);
	}
	public function editPost()
	{
		$data=array(
		'username'=>$this->u,
		'title'=>'Post',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
		/*'frontmenu'=>array(
						array(
							'text'=>'Home',
							'link'=>base_url().'index.php/site/',
						),
						array(
							'text'=>'About',
							'link'=>base_url().'index.php/site/about',
						),
						array(
							'text'=>'posts',
							'link'=>base_url().'index.php/site/posts',
						),
						array(
							'text'=>'Contact',
							'link'=>base_url().'index.php/site/contact',
						),
		),*/
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		'post' => $this->Posts_model->getPost($this->uri->segment(3)),
		'act'=>'edit',
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/formPost');
		$this->load->view('backendcontents/footer');
	}
	public function newPost()
	{
		$data=array(
		'username'=>$this->u,
		'title'=>'Post',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
		/*'frontmenu'=>array(
						array(
							'text'=>'Home',
							'link'=>base_url().'index.php/site/',
						),
						array(
							'text'=>'About',
							'link'=>base_url().'index.php/site/about',
						),
						array(
							'text'=>'posts',
							'link'=>base_url().'index.php/site/posts',
						),
						array(
							'text'=>'Contact',
							'link'=>base_url().'index.php/site/contact',
						),
		),*/
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		'post' => $this->Posts_model->getPost($this->uri->segment(3)),
		'act'=>'newPost',
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/formPost');
		$this->load->view('backendcontents/footer');
	}

}
