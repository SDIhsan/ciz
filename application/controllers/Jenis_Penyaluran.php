<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_Penyaluran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->library('form_validation');
		$this->load->model('User_model', 'amod');

	}
	public function index()
	{
		$data['title'] = 'Jenis Penyaluran';
		// $data['alat'] = $this->amod->get('tb_alat');
		// $data['jenis'] = $this->amod->get('tb_jenis');
        $this->template->load('templates/template','jenis-penyaluran',$data);
	}

	// Function Jenis
	public function _jenis_validation()
	{
		$this->form_validation->set_rules('nama', 'Nama Jenis', 'required|trim');
        $this->form_validation->set_rules('alat', 'Alat Pembayaran', 'required');
        // $this->form_validation->set_rules('kuantitas', 'Kuantitas', 'required');
	}

	public function add_jenis()
	{
		$this->_jenis_validation();

		if ($this->form_validation->run() === true) {
			$input = $this->input->post();
			$data = [
				'j_nama' => $input['nama'],
				'j_alat' => $input['alat'],
				'j_kuantitas' => $input['kuantitas']
			];
			$insert = $this->amod->insert('tb_jenis', $data);

			if ($insert) {
				set_message('Data berhasil disimpan!!!');
			} else {
				set_message('Gagal menyimpan data!!!', false);
			}
		}
		redirect('atur');
	}

	public function edit_jenis($getId)
    {
        $id = encode_php_tags($getId);
        $this->_jenis_validation();

        if ($this->form_validation->run() === true) {
            $input = $this->input->post();
			$data = [
				'j_nama' => $input['nama'],
				'j_alat' => $input['alat'],
				'j_kuantitas' => $input['kuantitas']
			];
            $update = $this->amod->update('tb_jenis', 'j_id', $id, $data);

            if ($update) {
                set_message('Data berhasil disimpan!!!');
            } else {
                set_message('Gagal menyimpan data!!!', false);
            }
			redirect('atur');
        }
    }

    public function delete_jenis($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->amod->delete('tb_jenis', 'j_id', $id)) {
            set_message('Data berhasil dihapus.');
        } else {
            set_message('Data gagal dihapus.', false);
        }
        redirect('atur');
    }
}
