<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	//Menampilkan semua menu berdasarkan alfabet
	public function getMenus()
	{
		$this->db->select('*');
		$this->db->from('menus');
		$this->db->order_by('order', 'ASC');
		//$this->db->where('post_type', 'menu');
		$query = $this->db->get();

		return $query->result();
	}
	//Menampilkan satu menu
	public function getMenu($id)
	{
		//$id=str_replace(' ','+',$id);
		//$id=base64_decode($id);
		$this->db->select('*');
		$this->db->from('menus');
		$this->db->where('ID', $id);
		$query = $this->db->get();

		return $query->result();
	}
	//Menampilkan menu dashboard
	public function getDasMenu()
	{
		$menu=array(	
							array(
								'idMenu'=>'board',
								'Name'=>'DASHBOARD',
								'Link'=>base_url().'index.php/board',
								'Classicon'=>"class='pe-7s-monitor'",
								'ClassActivemenu'=> ''),
							array(
								'idMenu'=>'posts',
								'Name'=>'POSTS',
								'Link'=>base_url().'index.php/posts',
								'Classicon'=>"class='pe-7s-news-paper'",
								'ClassActivemenu'=> ''),
							array(
								'idMenu'=>'pages',
								'Name'=>'PAGES',
								'Link'=>base_url().'index.php/pages',
								'Classicon'=>"class='pe-7s-photo-gallery'",
								'ClassActivemenu'=> ''),
							array(
								'idMenu'=>'comments',
								'Name'=>'COMMENTS',
								'Link'=>base_url().'index.php/comments',
								'Classicon'=>"class='pe-7s-comment'",
								'ClassActivemenu'=> ''),
							array(
								'idMenu'=>'users',
								'Name'=>'USERS',
								'Link'=>base_url().'index.php/users',
								'Classicon'=>"class='pe-7s-users'",
								'ClassActivemenu'=> ''),
							array(
								'idMenu'=>'menus',
								'Name'=>'MENUS',
								'Link'=>base_url().'index.php/menus',
								'Classicon'=>"class='pe-7s-browser'",
								'ClassActivemenu'=> ''),
							array(
								'idMenu'=>'gallery',
								'Name'=>'UPLOAD',
								'Link'=>base_url().'index.php/gallery',
								'Classicon'=>"class='pe-7s-photo'",
								'ClassActivemenu'=> ''),
							array(
								'idMenu'=>'consite',
								'Name'=>'CONFIG SITE',
								'Link'=>base_url().'index.php/consite',
								'Classicon'=>"class='pe-7s-tools'",
								'ClassActivemenu'=> ''),
		);

		return $menu;
	}
	//Menampilkan halaman
	/*public function getPage($post_name)
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('post_name', $post_name);
		$this->db->where('post_type', 'page');
		$query = $this->db->get();

		return $query->result();
	}*/
	
}
