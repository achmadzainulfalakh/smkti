<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Board extends CI_Controller {

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
	public $menu;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->library('pagination');
		$this->load->helper('download');
		$this->load->dbutil();
		
		if(!$this->login_model->username()){
			redirect('login');
		}

		$this->menu=array(
			
			'<li><a id="resetBtn" class="pull-left" href="#">Reset Pendaftar</a></li>',
			  '<li><a class="pull-left" href="login/logout">Logout</a></li>',
		);
		
	}
	public function index()
	{
	
		redirect('dashboard');	
	}
	public function dashboard()
	{
		if($_POST){
			if($this->input->post('reset')){
				$this->pendaftar->reset_pendaftar();
			}
		}
		if($this->login_model->username()){
			$data = array(
					'title'   => 'Daftar Pendaftar',
					'menu' => $this->menu,
			);
			$this->load->view('page/head', $data);
			$this->load->view('page/header');
			$this->load->view('contents/iframetable');
			$this->load->view('contents/modal_reset');
			$this->load->view('page/footer');		
		}else{
			redirect('login');
		}

	}
	//halaman table
	public function listpendaftar()
	{
		
		$config['base_url'] = base_url().'listpendaftar.html';
		$config['total_rows'] = $this->pendaftar->getCount();
		$config['per_page'] = 1;

		$this->pagination->initialize($config);
		
		$data = array(
				'title'   => 'Daftar Pendaftar',
				'menu' => '<li><a class="pull-left" href="login/logout">Logout</a></li>',
		);
		$datatable = array(
				'table_title'   => 'Daftar Pendaftar',
				'table_heading' => 'Seluruh pendaftar siswa baru smkti annajiyah',
				'table_entries' => $this->pendaftar->getALL(),
				'pagination' => $this->pagination->create_links(),
		);



		$this->load->view('page/head', $data);
	//	$this->load->view('page/header');
		$this->parser->parse('contents/tableBT_template', $datatable);
	//	$this->load->view('page/footer');	
	}
	public function exportcsv()
	{
		$this->pendaftar->exportcsv();
	}
	
	
	public function edit($idusr='')
	{
		
		
		
		$data=array(
		'username'=>$this->u,
		'password'=>'ququm',
		'title'=>'Edit User',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
		'frontmenu'=>array(
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
		),
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		'usersdata' => $this->Users_model->getUser($idusr),
		'act'=>'edit',
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/formuser',$data);
		$this->load->view('backendcontents/footer',$data);
	}
	public function add()
	{
		
		
		
		$data=array(
		'username'=>$this->u,
		'password'=>'ququm',
		'title'=>'Add User',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
		'frontmenu'=>array(
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
		),
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		/*'usersdata' => array(	'username'=>'',
								'password'=>'',
								'level'=>'',
								'email'=>'',),*/
		'act'=>'add',
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/formuser');
		$this->load->view('backendcontents/footer');
	}
	public function posts()
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
	public function conSite()
	{
		$data=array(
		'username'=>$this->u,
		'title'=>'Config Site',
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
		'consite' => $this->db->get('consite'),
		'act'=>'config',
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/formConfigSite');
		$this->load->view('backendcontents/footer');
	}
	//menu
		public function menus()
	{
		switch ($this->uri->segment(3)) {
		  case 'deleteMenu':
			foreach($this->Menus_model->getMenus() as $value){
                                            if($this->uri->segment(4) == md5($value->ID)){
                                                $id=$value->ID;
                                            }
                                        }
			//hapus user
			//$id=str_replace(' ','+',$this->uri->segment(4));
			//$id=base64_decode($id);
			$this->db->where('ID', $id);
			$this->db->delete('menus');
			break;
		  case 'edit':
			//update menu
			$data = array(
			'text'  => htmlspecialchars($_POST['text']),
			'link'  => htmlspecialchars($_POST['link']),
			);

			$this->db->where('ID', $_POST['ID']);
			$this->db->update('menus', $data);
			header("Location:".base_url()."index.php/board/menus");
			break;
		  case 'new':
			//insert menu
			$this->db->set('text', htmlspecialchars($_POST['text']));
			$this->db->set('link', $_POST['link']);
			$this->db->insert('menus');
			break;
		  default:
			
		} 
		
		$data=array(
		'username'=>$this->u,
		'title'=>'Menus',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
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
	public function editMenu($id)
	{
		$data=array(
		'username'=>$this->u,
		'title'=>'Menu',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		'menu' => $this->Menus_model->getMenu($this->uri->segment(3)),
		'act'=>'edit',
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/formMenu');
		$this->load->view('backendcontents/footer');
	}
	public function newMenu()
	{
		$data=array(
		'username'=>$this->u,
		'title'=>'Menu',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
		'backmenu'=>$this->Menus_model->getDasMenu(),
		'topbackmenu'=>array(	array(
								'Name'=>'Log out',
								'Link'=>base_url().'index.php/exp/index/logout',
								),
		),
		'act'=>'new',
		);
		$this->load->view('backendcontents/header',$data);
		$this->load->view('backendcontents/sidebar');
		$this->load->view('backendcontents/nav');
		$this->load->view('backendcontents/bcontents/formMenu');
		$this->load->view('backendcontents/footer');
	}
	//gallery
		public function gallery()
	{
		switch ($this->uri->segment(3)) {
		  case 'deleteimg':
			foreach($this->Menus_model->getMenus() as $value){
                                            if($this->uri->segment(4) == md5($value->ID)){
                                                $id=$value->ID;
                                            }
                                        }
			//hapus user
			//$id=str_replace(' ','+',$this->uri->segment(4));
			//$id=base64_decode($id);
			$this->db->where('ID', $id);
			$this->db->delete('menus');
			break;
		  case 'editimg':
			//update menu
			$data = array(
			'text'  => htmlspecialchars($_POST['text']),
			'link'  => htmlspecialchars($_POST['link']),
			);

			$this->db->where('ID', $_POST['ID']);
			$this->db->update('menus', $data);
			header("Location:".base_url()."index.php/board/menus");
			break;
		  case 'newimg':
			//insert menu
			$this->db->set('text', htmlspecialchars($_POST['text']));
			$this->db->set('link', $_POST['link']);
			$this->db->insert('menus');
			break;
		  default:
			
		} 
		
		$data=array(
		'username'=>$this->u,
		'title'=>'Gallery',
		'tahuncopy'=>date("Y"),
		'author'=>'Achmad Zainul Falakh, S.Kom',
		'linkauthor'=>'https://www.facebook.com/kesatria.pertama',
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
		public function blogger()
	{
		$data = array(
				'title'   => 'Daftar Pendaftar',
				'menu' => '<li><a class="pull-left" href="login/logout">Logout</a></li>',
		);
		$this->load->view('page/head', $data);
		$this->load->view('page/header');
		$this->load->view('contents/blogger');
		$this->load->view('page/footer');
	}
	
}
