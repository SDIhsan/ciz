<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->library('form_validation');
		$this->load->model('User_model', 'amod');

	}

    public function index()
	{
		$data['title'] = 'Cetak';
        $data['warga'] = $this->amod->getFieldD('tb_tunai','t_warga');
        $this->template->load('templates/template','cetak',$data);
	}

    public function printPDF()
    {
        $mpdf = new \Mpdf\Mpdf();
        $data = $this->load->view('hasilPrint',[],true);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    public function hasilPrint()
	{
		$data['title'] = 'Cetak';
        $data['warga'] = $this->amod->getFieldD('tb_tunai','t_warga');
        $this->load->view('hasilprint',$data);
	}

}