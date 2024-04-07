<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi extends CI_Controller {

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
		$data['title'] = 'Distribusi';
		$data['mustahik'] = $this->amod->get('tb_warga',[],['w_status_warga' => 'Mustahik']);
		$data['distribusi'] = $this->amod->get('tb_distribusi');
        $this->template->load('templates/template','distribusi/index',$data);
	}

	private function _validation()
	{
		$this->form_validation->set_rules('nama','Nama Mustahik','required');
		$this->form_validation->set_rules('jenisalur','Jenis Penyaluran','required');
		$this->form_validation->set_rules('jenis','Jenis Yg Didistribusikan','required');
		$this->form_validation->set_rules('nominal','Nominal','required');
	}

	public function add()
	{
		$this->_validation();
		if ($this->form_validation->run() == true) {
            $input = $this->input->post();
			$did = 'MD-' .  date('ymdHis');
			$data = [
				'd_id' => $did,
				'd_atas_nama' => $input['nama'],
				'd_rt' => $input['rt'],
				'd_jenis_penyaluran' => $input['jenisalur'],
				'd_zakat_infak' => $input['jenis'],
				'd_nominal' => $input['nominal'],
				'd_keterangan' => $input['keterangan']
			];
            $insert = $this->amod->insert('tb_distribusi', $data);

            if ($insert) {
                set_message('Data berhasil disimpan!!!');
            } else {
				set_message('Gagal menyimpan data!!!', false);
            }
			redirect('distribusi');
        } else {
			$data['title'] = 'Distribusi - Tambah Pendistribusian';
			$data['mustahik'] = $this->amod->get('tb_warga',[],['w_status_warga' => 'Mustahik']);
			$data['jenisPenyaluran'] = $this->amod->get('tb_jenis_penyaluran');
			$this->db->join('tb_alat', 'j_alat = a_id');	
			$data['jenis'] = $this->amod->get('tb_jenis');
			$this->template->load('templates/template','distribusi/add',$data);
		}

	}
	
	public function getZFU()
	{
		$query = $this->amod->sumWhere('tb_tunai','t_total',['t_jenis' => 1]);
		output_json($query);
	}

	public function getZFB()
	{
		$query = $this->amod->sumWhere('tb_tunai','t_total',['t_jenis' => 2]);
		output_json($query);
	}

	public function getZMU()
	{
		$query = $this->amod->sumWhere('tb_tunai','t_total',['t_jenis' => 3]);
		output_json($query);
	}

	public function getI()
	{
		$query = $this->amod->sum('tb_infaq','i_nominal');
		output_json($query);
	}

	private function _edit_validation()
	{
		$this->form_validation->set_rules('nama','Nama Keluarga','required');
		$this->form_validation->set_rules('hak','Jumlah Hak','required');
		$this->form_validation->set_rules('satuan','Satuan','required');
		$this->form_validation->set_rules('terdistribusi','Jumlah yg Terdistribusi','required');
		$this->form_validation->set_rules('keterangan','Keterangan','required');
	}

	public function unverified($getId)
	{
		$id = encode_php_tags($getId);
			$data = [
				'd_waktu_terdistribusi' => null
			];
            $update = $this->amod->update('tb_distribusi', 'd_id', $id, $data);

            if ($update) {
                set_message('Data berhasil disimpan!!!');
            } else {
				set_message('Gagal menyimpan data!!!', false);
            }
			redirect('distribusi');
	}

	public function verified($getId)
	{
		$id = encode_php_tags($getId);
		$waktu = date('Y-m-d H:i:s');
		$data = [
			'd_waktu_terdistribusi' => $waktu
		];
		$update = $this->amod->update('tb_distribusi', 'd_id', $id, $data);

		if ($update) {
			set_message('Data berhasil diverifikasi!!!');
		} else {
			set_message('Gagal memverifikasi data!!!', false);
		}
		redirect('distribusi');
	}

	public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->amod->delete('tb_distribusi', 'd_id', $id)) {
            set_message('Data berhasil dihapus!!!');
        } else {
            set_message('Data gagal dihapus!!!', false);
        }
        redirect('distribusi');
    }
}
