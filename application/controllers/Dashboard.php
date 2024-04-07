<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('User_model','amod');
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
        $data['title'] = 'Dashboard';
		$data['keluarga'] = $this->amod->count('tb_warga');
		// $this->db->distinct('t_warga');
		// $data['berzakat'] = $this->amod->count('tb_tunai');
		$data['berzakat'] = $this->amod->countDistinct('tb_tunai','t_warga');
		$this->db->where('t_jenis = 1');
		$data['fitrahuang'] = $this->amod->sum('tb_tunai','t_total');
		$this->db->where('t_jenis = 2');
		$data['fitrahberas'] = $this->amod->sum('tb_tunai','t_total');
		$this->db->where('t_jenis = 3');
		$data['maaluang'] = $this->amod->sum('tb_tunai','t_total');
		// $this->db->where('t_jenis = 3');
		// $data['maal'] = $this->amod->sum('tb_tunai','t_total');
		$data['infaq'] = $this->amod->sum('tb_infaq','i_nominal');
		$this->db->group_by('t_warga');
		$data['tanggungan'] = $this->amod->sum('tb_tunai','t_total');
		// $this->db->where('w_status = Mustahik');
		$data['mustahik'] = $this->amod->countField('tb_warga','w_nama',['w_status_warga' => 'Mustahik']);
		// chart
		$data['sumberzakat'] = $this->amod->sumBerzakat();

		$rt = ['01','02','03','04','05','06'];
		$data['progresszf'] = [];
		$data['zfutotal'] = [];
		$data['mzrt'] = [];
        foreach ($rt as $i) {
			$data['progresszf'][] = $this->amod->progressZF($i);
			$data['kzrt'][] = $this->amod->keluargaZRT($i);
			$data['mzrt'][] = $this->amod->muzakkiZRT($i);
			// $this->db->where([
			// 	't_jenis' => 1,
			// 	't_rt' => $i
			// ]);
			$data['zfuterkumpul'][] = $this->amod->zfuTerkumpul($i);
			$data['zfbterkumpul'][] = $this->amod->zfbTerkumpul($i);
		}
		$data['zfum'] = $this->amod->getFieldWhere1('tb_jenis','j_kuantitas',['j_id' => 1]);
		$data['zfbm'] = $this->amod->getFieldWhere1('tb_jenis','j_kuantitas',['j_id' => 2]);
		$data['mzrt01'] = $this->amod->muzakkiZRT('01');
		$data['mzrt02'] = $this->amod->muzakkiZRT('02');
		$data['mzrt03'] = $this->amod->muzakkiZRT('03');
		$data['mzrt04'] = $this->amod->muzakkiZRT('04');
		$data['mzrt05'] = $this->amod->muzakkiZRT('05');
		$data['mzrt06'] = $this->amod->muzakkiZRT('06');
		$data['rt01'] = $this->amod->countField('tb_warga', 'w_nama', ['w_rt' => '01']); 
		$data['rt02'] = $this->amod->countField('tb_warga', 'w_nama', ['w_rt' => '02']); 
		$data['rt03'] = $this->amod->countField('tb_warga', 'w_nama', ['w_rt' => '03']); 
		$data['rt04'] = $this->amod->countField('tb_warga', 'w_nama', ['w_rt' => '04']); 
		$data['rt05'] = $this->amod->countField('tb_warga', 'w_nama', ['w_rt' => '05']); 
		$data['rt06'] = $this->amod->countField('tb_warga', 'w_nama', ['w_rt' => '06']); 
		// $data['progresszf'] = $this->amod->progressZF();
		$data['czfu'] = $this->amod->getFieldWhere('tb_tunai','t_waktu as x, t_total as y', ['t_jenis' => 1]);
		$data['czfb'] = $this->amod->getFieldWhere('tb_tunai','t_waktu as x, t_total as y', ['t_jenis' => 2]);
		$data['czmu'] = $this->amod->getFieldWhere('tb_tunai','t_waktu as x, t_total as y', ['t_jenis' => 3]);
        $this->template->load('templates/template','dashboard',$data);
	}
}
