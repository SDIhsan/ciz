<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warga extends CI_Controller {

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
		$data['title'] = 'Warga';
		$data['warga'] = $this->amod->get('tb_warga');
        $this->template->load('templates/template','warga/index',$data);
	}

	private function _validation()
	{
		$this->form_validation->set_rules('nama','Nama warga','required');
		$this->form_validation->set_rules('jumlah','Jumlah Anggota Keluarga','required');
		$this->form_validation->set_rules('rt','RT','required');
		$this->form_validation->set_rules('status-warga','Status Warga','required');
	}

	public function add()
	{
		$this->_validation();
		if ($this->form_validation->run() === true) {
			
            $input = $this->input->post();
			$waktu = date('Y-m-d H:i:s');
			$data = [
				'w_nama' => $input['nama'],
				'w_anggota_keluarga' => $input['jumlah'],
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
                set_message('Gagal menyimpan data!!!', false);
                redirect('warga/add');
            }
        } else {
			$data['title'] = 'Warga';
			$this->template->load('templates/template','warga/add',$data);
		}
	}

	public function edit($getId)
    {
		$id = encode_php_tags($getId);
        $this->_validation();
		
        if ($this->form_validation->run() === true) {
			
            $input = $this->input->post();
			$waktu = date('Y-m-d H:i:s');
			$data = [
				'w_nama' => $input['nama'],
				'w_anggota_keluarga' => $input['jumlah'],
				'w_rt' => $input['rt'],
				'w_status_warga' => $input['status-warga'],
				'w_updated_at' => $waktu
			];
            $update = $this->amod->update('tb_warga', 'w_id', $id, $data);

            if ($update) {
                set_message('Data berhasil disimpan!!!');
                redirect('warga');
            } else {
                set_message('Gagal menyimpan data!!!', false);
                redirect('warga/edit/' . $id);
            }
        } else {
			$data['title'] = 'Warga';
            $data['warga'] = $this->amod->get('tb_warga',null,['w_id' => $id]);

			$this->template->load('templates/template','warga/edit',$data);
		}
    }

	public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->amod->delete('tb_warga', 'w_id', $id)) {
            set_message('Data berhasil dihapus!!!');
        } else {
            set_message('Data gagal dihapus!!!', false);
        }
        redirect('warga');
    }

	public function get_warga($getId)
    {
        $id = rawurldecode(encode_php_tags($getId));
        $query = $this->amod->cekwarga($id);
        output_json($query);
    }
}
