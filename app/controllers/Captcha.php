<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Captcha extends CI_Controller
{
    function __construct() {
		parent::__construct();
    }
    
    public function index(){
		
		$data=array(
			'chaptca'=> $this->get_chaptca(4).' '.$this->get_chaptca(3).' '.$this->get_chaptca(2),
			'imgheader'=>base_url().'assets/upload/home-bg.jpg',
			'title'=>'HOME',
			'subtitle'=>'',
			'menu'=> $this->menu,
			'copyr'=>'Copyright &copy; Your Website 2016',
		);
		$this->load->view('page/head',$data);
		$this->load->view('page/header');
		$this->load->view('contents/formdaftar');
		$this->load->view('page/footer');
    }
	
	private function get_chaptca($param) // method pembuat chapta
       {
        $alphabet   = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $num        = range(0, 35);
        $result     = '';
         shuffle($num);
         for ($x = 0; $x < $param; $x++)
          {
            $result .= substr($alphabet, $num[$x], 1);
          }
          return $result;
      }
	public function cek_captcha() //method cek captcha
	{
      if (strtolower($this->input->post('txt_chaptca_real')) == strtolower($this->input->post('txt_chaptca')))
        {
            return true;
		}
		else{
			return false;
		}
	}
	
}