<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comments_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	//Menampilkan semua komentar
	public function getComments()
	{
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->join('users', 'users.ID = comments.ID_user');
		$this->db->join('posts', 'posts.ID = comments.ID_post');
		$this->db->order_by('date', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}
	//mendapatkan id posting
	public function getIdPost($postname)
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('post_name', $postname);
		$query = $this->db->get();
		

		return $query->result();
	}
	//Menampilkan semua komentar berdasarkan posting
	public function getCommentsOnPost($postname)
	{
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('post_name', $postname);
		//$this->db->join('users', 'users.ID = comments.ID_user');
		//$this->db->join('posts', 'posts.ID = comments.ID_post');
		//$this->db->join('posts', 'posts.post_name = comments.post_name');
		$this->db->order_by('date', 'ASC');
		$query = $this->db->get();

		return $query->result();
	}
	//Menampilkan satu komentar
	public function getComment($id)
	{
		$this->db->select('*');
		$this->db->from('comments');
		$this->db->where('comments.ID', $id);
		$this->db->join('users', 'users.ID = comments.ID_user');
		$this->db->join('posts', 'posts.ID = comments.ID_post');
		$query = $this->db->get();

		return $query->result();
	}
	
}
