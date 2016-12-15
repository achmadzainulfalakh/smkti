<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagenotfound extends CI_Controller {

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
	
	public function __construct()
	{
		parent::__construct();
		//$this->load->model('usersmodel');
		//$this->load->helper('url_helper');		
	}
	//halaman home
	public function index()
	{
			$data=array(
			'imgheader'=>base_url().'assets/upload/home-bg.jpg',
			'title'=>'HOME',
			'subtitle'=>'',
			'menu'=>array(
				array(
					'activemenu'=>'active',
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
					'text'=>'posts',
					'link'=>base_url().'index.php/site/posts',
				),
				array(
					'activemenu'=>'',
					'text'=>'Contact',
					'link'=>base_url().'index.php/site/contact',
				),
			),

			'copyr'=>'Copyright &copy; Your Website 2016',
		);
		$this->load->view('page/head',$data);
		//$this->load->view('page/header');
		$this->load->view('contents/pagenotfound');
		$this->load->view('page/footer');
	}

}
