<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	//Pengaturan menu halaman depan
	public function getMenu()
	{
		$menu=array(
				array(
					'activemenu'=>'',
					'text'=>'Home',
					'link'=>base_url().'index.php/site/',
				),
				array(
					'activemenu'=>'',
					'text'=>'About',
					'link'=>base_url().'index.php/site/about',
				),
				array(
					'activemenu'=>'',
					'text'=>'post',
					'link'=>base_url().'index.php/site/post',
				),
				array(
					'activemenu'=>'',
					'text'=>'Contact',
					'link'=>base_url().'index.php/site/contact',
				),
			);
		return $menu;
	}
	//menampilkan konfigurasi situs
	public function getConsite($name)
	{
		$this->db->select('*');
		$this->db->from('consite');
		$this->db->where('name', $name);
		$query = $this->db->get();
		foreach ($query->result() as $value){
		return $value->value;
		} 
	}
	
}
