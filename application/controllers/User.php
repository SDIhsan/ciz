<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
		$data['title'] = 'User';
		$data['users'] = $this->amod->get('tb_user');
        $this->template->load('templates/template','user',$data);
	}

	private function _validation()
	{
		$this->form_validation->set_rules('nama','Nama User','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('pass','Password','required');
		$this->form_validation->set_rules('level','Level','required');
	}

	public function add()
	{
		$this->_validation();
		if ($this->form_validation->run() === true) {
            $input = $this->input->post();

			if ($input['level'] == 'admin') {
				$akses = '01,02,03,04,05,06';
			}else {
				$akses = '';
			}
			$right = $akses;

			$waktu = date('Y-m-d H:i:s');
			$data = [
				'u_name' => $input['nama'],
				'u_uname' => $input['username'],
				'u_pass' => $input['pass'],
				'u_level' => $input['level'],
				'u_access' => $right,
				'u_created_at' => $waktu,
				'u_updated_at' => $waktu
			];
            $insert = $this->amod->insert('tb_user', $data);

            if ($insert) {
                set_message('Data berhasil disimpan!!!');
            } else {
				set_message('Gagal menyimpan data!!!', false);
            }
			redirect('user');
        }
	}

	public function setAccess($getId)
	{
		$id = encode_php_tags($getId);
		$input = $this->input->post();
		$check = $input['akses'];
		$ha = '';
		foreach ($check as $c) {
			$ha .= $c.",";
		}
		$data = [
			'u_access' => $ha
		];
		$update = $this->amod->update('tb_user', 'u_id', $id, $data);
		
		if ($update) {
			set_message('Data berhasil disimpan!!!');
		} else {
			set_message('Gagal menyimpan data!!!', false);
		}
		redirect('user');
	}

	private function _profile_validation()
	{
		$this->form_validation->set_rules('nama','Nama User','required');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('level','Level','required');
	}

	public function editProfile($getId)
	{
		$id = encode_php_tags($getId);
		$this->_profile_validation();
		if ($this->form_validation->run() === true) {
			$input = $this->input->post();
			$waktu = date('Y-m-d H:i:s');
			$data = [
				'u_name' => $input['nama'],
				'u_uname' => $input['username'],
				'u_level' => $input['level'],
				'u_updated_at' => $waktu
			];
			$update = $this->amod->update('tb_user', 'u_id', $id, $data);
			
			if ($update) {
				set_message('Data berhasil disimpan!!!');
			} else {
				set_message('Gagal menyimpan data!!!', false);
			}
			redirect('user');
		}
	}

	public function activate($getId)
	{
		$id = encode_php_tags($getId);
		// $this->_profile_validation();
		// if ($this->form_validation->run() == true) {
			// $input = $this->input->post();
			$waktu = date('Y-m-d H:i:s');
			$data = [
				'u_updated_at' => $waktu,
				'u_activated_at' => $waktu,
				'u_status' => 'active'
			];
			$update = $this->amod->update('tb_user', 'u_id', $id, $data);
			
			if ($update) {
				set_message('Berhasil mengaktifkan user!!!');
			} else {
				set_message('Gagal mengaktifkan user!!!', false);
			}
			redirect('user');
		// }
	}

	public function deactivate($getId)
	{
		$id = encode_php_tags($getId);
		// $this->_profile_validation();
		// if ($this->form_validation->run() == true) {
			// $input = $this->input->post();
			$waktu = date('Y-m-d H:i:s');
			$data = [
				'u_updated_at' => $waktu,
				'u_activated_at' => $waktu,
				'u_status' => 'non'
			];
			$update = $this->amod->update('tb_user', 'u_id', $id, $data);
			
			if ($update) {
				set_message('Berhasil menonaktifkan user!!!');
			} else {
				set_message('Gagal menonaktifkan user!!!', false);
			}
			redirect('user');
		// }
	}

	public function newpass($getId)
	{
		$this->form_validation->set_rules('newpass','New Password','required');
		$id = encode_php_tags($getId);
		if ($this->form_validation->run() === true) {
			$input = $this->input->post();
			$waktu = date('Y-m-d H:i:s');
			$data = [
				'u_pass' => password_hash($input['newpass'], PASSWORD_DEFAULT),
				'u_updated_at' => $waktu
			];
			$update = $this->amod->update('tb_user', 'u_id', $id, $data);
			
			if ($update) {
				set_message('Password berhasil diperbaharui!!!');
			} else {
				set_message('Password gagal diperbaharui!!!', false);
			}
			redirect('user');
		}
	}

	public function delete($getId)
    {
        $id = encode_php_tags($getId);
        if ($this->amod->delete('tb_user', 'u_id', $id)) {
            set_message('Data berhasil dihapus!!!');
        } else {
            set_message('Data gagal dihapus!!!', false);
        }
        redirect('user');
    }
}
