<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('User_model','amod');
	}
	public function index()
	{
		$data['title'] = 'Warga';
		$data['warga'] = $this->amod->get('tb_warga');
        $this->template->load('templates/template','warga/index',$data);
	}

	private function _validation()
	{
		$this->form_validation->set_rules('nama','Nama warga','required');
		$this->form_validation->set_rules('jenis-kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('status-keluarga','Status Keluarga','required');
		$this->form_validation->set_rules('jumlah','Jumlah Keluarga','required');
		$this->form_validation->set_rules('rt','RT','required');
		$this->form_validation->set_rules('status-warga','Status Warga','required');
	}

	public function add()
	{
		$this->_validation();
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Warga';
			$this->template->load('templates/template','warga/add',$data);
        } else {
            $input = $this->input->post();
			$waktu = date('Y-m-d H:m:s');
			$data = [
				'w_nama' => $input['nama'],
				'w_jenis_kelamin' => $input['jenis-kelamin'],
				'w_status_keluarga' => $input['status-keluarga'],
				'w_jumlah_keluarga' => $input['jumlah'],
				'w_rt' => $input['rt'],
				'w_status_warga' => $input['status-warga'],
				'w_created_at' => $waktu,
				'w_updated_at' => $waktu
			];
            $insert = $this->amod->insert('tb_warga', $data);

            if ($insert) {
                set_message('Data berhasil disimpan!!!');
                redirect('warga');
            } else {
                set_message('Gagal menyimpan data!!!');
                redirect('warga/add');
            }
        }
	}

	public function edit($getId)
    {
		$id = encode_php_tags($getId);
        $this->_validation();
		
        if ($this->form_validation->run() == false) {
			$data['title'] = 'Warga';
            $data['warga'] = $this->amod->get('tb_warga',null,['w_id' => $id]);

			$this->template->load('templates/template','warga/edit',$data);
        } else {
            $input = $this->input->post();
			$waktu = date('Y-m-d H:m:s');
			$data = [
				'w_nama' => $input['nama'],
				'w_jenis_kelamin' => $input['jenis-kelamin'],
				'w_status_keluarga' => $input['status-keluarga'],
				'w_jumlah_keluarga' => $input['jumlah'],
				'w_rt' => $input['rt'],
				'w_status_warga' => $input['status-warga'],
				'w_updated_at' => $waktu
			];
            $update = $this->amod->update('tb_warga', 'w_id', $id, $data);

            if ($update) {
                set_message('Data berhasil disimpan!!!');
                redirect('warga');
            } else {
                set_message('Gagal menyimpan data!!!');
                redirect('warga/edit/' . $id);
            }
        }
    }
}
