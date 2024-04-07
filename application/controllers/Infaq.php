<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Infaq extends CI_Controller {

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
		$data['title'] = 'Infaq';
		$data['warga'] = $this->amod->get('tb_warga');
		$data['infaq'] = $this->amod->get('tb_infaq');
        $this->template->load('templates/template','infaq',$data);
	}

	private function _validation()
	{
		$this->form_validation->set_rules('nama','Nama Keluarga','required');
		$this->form_validation->set_rules('nominal','Nominal','required');
	}

	public function add()
	{
		$this->_validation();
		if ($this->form_validation->run() == true) {
            $input = $this->input->post();
			$waktu = date('Y-m-d H:i:s');
			$data = [
				'i_waktu' => $waktu,
				'i_warga' => $input['nama'],
				'i_nominal' => $input['nominal'],
				'i_updated_at' => $waktu
			];
            $insert = $this->amod->insert('tb_infaq', $data);

            if ($insert) {
                set_message('Data berhasil disimpan!!!');
            } else {
				set_message('Gagal menyimpan data!!!', false);
            }
			redirect('infaq');
        }
	}

	public function edit($getId)
	{
		$id = encode_php_tags($getId);
		$this->_validation();
		if ($this->form_validation->run() == true) {
            $input = $this->input->post();
			$waktu = date('Y-m-d H:i:s');
			$data = [
				'i_warga' => $input['nama'],
				'i_nominal' => $input['nominal'],
				'i_updated_at' => $waktu
			];
            $insert = $this->amod->update('tb_infaq', 'i_id', $id, $data);

            if ($insert) {
                set_message('Data berhasil disimpan!!!');
            } else {
				set_message('Gagal menyimpan data!!!', false);
            }
			redirect('infaq');
        }
	}

	public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->amod->delete('tb_infaq', 'i_id', $id)) {
            set_message('Data berhasil dihapus!!!');
        } else {
            set_message('Data gagal dihapus!!!', false);
        }
        redirect('infaq');
    }
}
