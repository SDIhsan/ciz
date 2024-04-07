<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zakat extends CI_Controller {

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
		$data['title'] = 'Zakat';
        $this->db->join('tb_jenis', 't_jenis = j_id');
        $this->db->join('tb_alat', 'j_alat = a_id');
        $this->db->order_by('t_waktu', 'DESC');
        $data['zakat'] = $this->amod->get('tb_tunai');
        $data['warga'] = $this->amod->get('tb_warga');
        $this->db->join('tb_alat', 'j_alat = a_id');
        $data['jenis'] = $this->amod->get('tb_jenis');
        $this->template->load('templates/template','zakat/index',$data);
	}

    private function _validation()
	{
		$this->form_validation->set_rules('nama','Nama Warga','required');
		$this->form_validation->set_rules('rt','RT','required');
		$this->form_validation->set_rules('jenis[]','Jenis Zakat','required');
		$this->form_validation->set_rules('tanggungan[]','Jumlah Tanggungan/Keluarga','required');
		$this->form_validation->set_rules('jumlah[]','Total Zakat','required');
		$this->form_validation->set_rules('infaq','Infaq','required');
	}

    public function add()
    {
        $this->_validation();
		if ($this->form_validation->run() === true) {
            $input = $this->input->post();
            $max = count($input['jenis']);
			$waktu = date('Y-m-d H:i:s');
            for ($i=0; $i < $max; $i++) { 
                $data = [
                    't_waktu' => $waktu,
                    't_warga' => $input['nama'],
                    't_rt' => $input['rt'],
                    't_jenis' => $input['jenis'][$i],
                    't_tanggungan' => $input['tanggungan'][$i],
                    't_total' => $input['jumlah'][$i]
                ];
                $this->amod->insert('tb_tunai', $data);
            }
            $data1 = [
				'i_waktu' => $waktu,
				'i_warga' => $input['nama'],
                'i_rt' => $input['rt'],
				'i_nominal' => $input['infaq'],
				'i_updated_at' => $waktu
			];
            $insert1 = $this->amod->insert('tb_infaq', $data1);

            if ($insert1) {
                set_message('Data berhasil disimpan!!!');
                redirect('zakat');
            } else {
                set_message('Gagal menyimpan data!!!', false);
                redirect('zakat/add');
            }
        } else {
            $data['title'] = 'Zakat/Add';
            $data['warga'] = $this->amod->get('tb_warga');
            $this->db->join('tb_alat', 'j_alat = a_id');
            $data['jenis'] = $this->amod->get('tb_jenis');
            $this->template->load('templates/template','zakat/add',$data);
        }
    }

    private function _edit_validation()
	{
		$this->form_validation->set_rules('nama','Nama Warga','required');
		$this->form_validation->set_rules('rt','RT','required');
		$this->form_validation->set_rules('jenis','Jenis Zakat','required');
		$this->form_validation->set_rules('tanggungan','Jumlah Tanggungan/Keluarga','required');
		$this->form_validation->set_rules('jumlah','Total Zakat','required');
	}

    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_edit_validation();
		if ($this->form_validation->run() === true) {
            $input = $this->input->post();
			$waktu = date('Y-m-d H:i:s');
            $data = [
                't_warga' => $input['nama'],
                't_rt' => $input['rt'],
                't_jenis' => $input['jenis'],
                't_tanggungan' => $input['tanggungan'],
                't_total' => $input['jumlah'],
                't_updated_at' => $waktu
            ];
            $update = $this->amod->update('tb_tunai','t_id', $id, $data);

            if ($update) {
                set_message('Data berhasil disimpan!!!');
                redirect('zakat');
            } else {
                set_message('Gagal menyimpan data!!!', false);
                redirect('zakat/add');
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->amod->delete('tb_tunai', 't_id', $id)) {
            set_message('Data berhasil dihapus!!!');
        } else {
            set_message('Data gagal dihapus!!!', false);
        }
        redirect('zakat');
    }

    public function get_jenis($getId)
    {
        $id = encode_php_tags($getId);
        $query = $this->amod->cekjenis($id);
        output_json($query);
    }
}
