<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

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
	
	private $menu;
	public function __construct()
	{
		parent::__construct();
		$this->menu=array(
		'<li><a class="pull-left" href="informasi.html">Informasi</a></li>',
		'<li><a class="pull-left" href="cetak-ulang.html">Cetak Ulang Konfirmasi</a></li>',
		);		
	}
	//halaman home
	public function index()
	{
		//$this->form();
		redirect('pagenotfound');
	}
	//halaman form
	public function form($p='')
	{
		$data=array(
			'salahcaptcha'=>$p,
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
    //validasi form
    public function getvalid()
    {
        $this->form_validation->set_rules('nama', 'Nama Anda', 'required',
                        array('required' => '<div class="alert alert-danger"><strong>Opps!</strong> Silahkan lengkapi data %s.</div>'));
		$this->form_validation->set_rules('tempatlahir', 'Tempat Kelahiran Anda', 'required',
                        array('required' => '<div class="alert alert-danger"><strong>Opps!</strong> Silahkan lengkapi data %s.</div>'));
		$this->form_validation->set_rules('namawali', 'Nama Wali', 'required',
								array('required' => '<div class="alert alert-danger"><strong>Opps!</strong> Silahkan lengkapi data %s.</div>'));
		$this->form_validation->set_rules('nohp', 'Nomor HP anda', 'required',
								array('required' => '<div class="alert alert-danger"><strong>Opps!</strong> Silahkan lengkapi data %s.</div>'));
		$this->form_validation->set_rules('txt_chaptca', 'Apakah anda manusia?', 'required',array('required' => '<div class="alert alert-danger"><strong>Opps!</strong> Silahkan lengkapi isian ini, %s.</div>'));
        
		if ($this->form_validation->run() == FALSE | $this->cek_captcha() == FALSE)
			{
					
					$this->form('<span class="text-danger"> samakan tulisan.</span>');
			}
			else
			{
					$data = array(
					'ID' =>$this->security->sanitize_filename($this->input->post('id')),
					'nama' =>$this->security->sanitize_filename($this->input->post('nama')),
					'tempatlahir' =>$this->security->sanitize_filename($this->input->post('tempatlahir')),
					'nohp' =>$this->security->sanitize_filename($this->input->post('nohp')),
					'namawali' =>$this->security->sanitize_filename($this->input->post('namawali')),
					'tanggallahir' =>$this->security->sanitize_filename($this->input->post('tanggallahir')),
					'jeniskelamin' =>$this->security->sanitize_filename($this->input->post('jeniskelamin')),
					'agama' =>$this->security->sanitize_filename($this->input->post('agama')),
					'asalsekolah' =>$this->security->sanitize_filename($this->input->post('asalsekolah')),
					'alamatlengkap' =>$this->security->sanitize_filename($this->input->post('alamatlengkap')),
					
					);
					// Berfungsi untuk menyimpan user data
					$this->session->set_userdata($data);
					
					//menjalankan model pendaftar dengan metode add peserta
					$this->pendaftar->addPeserta($data);
					$this->success();
			}
			
    }
	//halaman Success
	public function success()
	{
		
		$data=array(
			'imgheader'=>base_url().'assets/upload/home-bg.jpg',
			'title'=>'HOME',
			'subtitle'=>'',
			'menu'=> $this->menu,
			'copyr'=>'Copyright &copy; Your Website 2016',
		);
		$dataform = array(
				'form_entries' => $this->pendaftar->getfromID($this->pendaftar->pendaftar_id()),
				'pendaftar_ID' => $this->pendaftar->pendaftar_id(),
		);
		$this->load->view('page/head',$data);
		$this->load->view('page/header');
		$this->load->view('contents/catatan');
		$this->parser->parse('contents/formsuccessBT_template', $dataform);
		
		$this->load->view('page/footer');
		
	}
	//halaman Success
	public function printbukti()
	{
			$data=array(
			'imgheader'=>base_url().'assets/upload/home-bg.jpg',
			'title'=>'HOME',
			'subtitle'=>'',
			'menu'=>'',

			'copyr'=>'Copyright &copy; Your Website 2016',
		);
		//$dataform = array(
		//		'form_entries' => $this->pendaftar->getfromID($_SESSION['id']),
		//);
		$pdfFilePath = "SMKTI_Pendaftaran_online.pdf";
		//$this->load->view('page/head',$data);	
		//$html=$this->load->view('welcome_message');
		$dataform = array(
				'form_entries' => $this->pendaftar->getfromID($this->pendaftar->pendaftar_id()),
		);		
		$this->load->library('pdf');
		$this->pdf->load_parser('contents/formsuccessBT_template',$dataform);
		$this->pdf->Output();
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
	//halaman pencarian cetak ulang
	public function cetakulang()
	{
		$data=array(
			'chaptca'=> $this->get_chaptca(4).' '.$this->get_chaptca(3).' '.$this->get_chaptca(2),
			'imgheader'=>base_url().'assets/upload/home-bg.jpg',
			'title'=>'HOME',
			'subtitle'=>'',
			'menu'=> $this->menu,
			'copyr'=>'Copyright &copy; Your Website 2016',
			'salahcaptcha'=>'',
			'pendaftar_ID' => $this->pendaftar->pendaftar_id(),
		);
		
		if($_POST && $this->cek_captcha() == TRUE && $this->pendaftar->getfromID($this->security->sanitize_filename($this->input->post('id'))) == true ){
		
		$dataform = array(
				'form_entries' => $this->pendaftar->getfromID($this->pendaftar->pendaftar_id()),
				
		);
		$this->load->view('page/head',$data);
		$this->load->view('page/header');
		$this->load->view('contents/catatan');
		$this->parser->parse('contents/formsuccessBT_template', $dataform);
		$this->load->view('page/footer');

		
		} else {
		
		$this->load->view('page/head',$data);
		$this->load->view('page/header');
		$this->load->view('contents/cetakulang');
		$this->load->view('page/footer');
		
		}
		
	}
	
	//export laporan ke csv
	function query_to_csv( $query, $filename, $attachment = false, $headers = true) {

    if($attachment) {
        // send response headers to the browser
        header( 'Content-Type: text/csv' );
        header( 'Content-Disposition: attachment;filename='.$filename);
        $fp = fopen('php://output', 'w');
    } else {
        $fp = fopen($filename, 'w');
    }

    $result = mysql_query($query);

    if($headers) {
        // output header row (if at least one row exists)
        $row = mysql_fetch_assoc($result);
        if($row) {
            fputcsv($fp, array_keys($row));
            // reset pointer back to beginning
            mysql_data_seek($result, 0);
        }
    }

    while($row = mysql_fetch_assoc($result)) {
        fputcsv($fp, $row);
    }

    fclose($fp);
    exit;
	}
	function ExportCSV()
	{
	        $this->load->dbutil();
	        $this->load->helper('file');
	        $this->load->helper('download');
	        $delimiter = ",";
	        $newline = "\r\n";
	        $filename = "filename_you_wish.csv";
	        $query = "SELECT * FROM table_name WHERE 1";
	        $result = $this->db->query($query);
	        $data = $this->dbutil->csv_from_result($result, $delimiter, $newline);
	        force_download($filename, $data);
	}
	
	//metode mendapatkan PDF
	public function save_download()
	{ 
		$this->load->library('pdf');
		$this->pdf->load_view('welcome_message');
		$this->pdf->Output();			
	}
	//halaman petunjuk penggunaan
	public function penggunaan()
	{
		$data=array(
			'imgheader'=>base_url().'assets/upload/home-bg.jpg',
			'title'=>'HOME',
			'subtitle'=>'',
			'menu'=> $this->menu,
			'copyr'=>'Copyright &copy; Your Website 2016',
		);
		$this->load->view('page/head',$data);
		$this->load->view('page/header');
		$this->load->view('contents/manual');
		$this->load->view('page/footer');
	}
	//halaman informasi
	public function informasi()
	{
		$data=array(
			'imgheader'=>base_url().'assets/upload/home-bg.jpg',
			'title'=>'HOME',
			'subtitle'=>'',
			'menu'=> $this->menu,
			'copyr'=>'Copyright &copy; Your Website 2016',
		);
		$this->load->view('page/head',$data);
		$this->load->view('page/header');
		$this->load->view('contents/informasi');
		$this->load->view('page/footer');
	}


}
