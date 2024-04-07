<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muzakki extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->library('form_validation');
		$this->load->model('User_model','amod');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['title'] = 'Muzakki';
		$data['muzakki'] = $this->amod->get('tb_warga',[],['w_status_warga' => 'Muzakki']);
        $this->template->load('templates/template','muzakki',$data);
	}

	private function _validation()
	{
		$this->form_validation->set_rules('status','Status Warga','required');
	}

	public function edit($getId)
	{
		$id = encode_php_tags($getId);
		$this->_validation();
		if ($this->form_validation->run() == true) {
            $input = $this->input->post();
			$waktu = date('Y-m-d H:i:s');
			$data = [
				'w_status_warga' => $input['status'],
				'w_updated_at' => $waktu
			];
            $update = $this->amod->update('tb_warga', 'w_id', $id, $data);

            if ($update) {
                set_message('Data berhasil disimpan!!!');
            } else {
				set_message('Gagal menyimpan data!!!', false);
            }
			redirect('muzakki');
        }
	}
}
