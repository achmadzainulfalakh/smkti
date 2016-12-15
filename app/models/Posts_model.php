<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	//Menampilkan semua post berdasarkan alfabet
	public function getPosts()
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('post_type', 'post');
		$query = $this->db->get();

		return $query->result();
	}
	//Menampilkan satu post
	public function getPost($postname)
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('post_name', $postname);
		$this->db->where('post_type', 'post');
		$query = $this->db->get();

		return $query->result();
	}
	//Menampilkan halaman
	public function getPage($post_name)
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('post_name', $post_name);
		$this->db->where('post_type', 'page');
		$query = $this->db->get();

		return $query->result();
	}
	
}
