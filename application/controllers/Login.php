<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Auth_model', 'auth');
		$this->load->model('User_model', 'amod');
	}

	private function _has_login()
    {
        if ($this->session->has_userdata('login_session')) {
            redirect('dashboard');
        }
    }

    public function index()
    {
        $this->_has_login();

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('login', $data);
        } else {
            $input = $this->input->post();

            $cek_username = $this->auth->cek_username($input['username']);
            if ($cek_username > 0) {
                $password = $this->auth->get_password($input['username']);
				// $passin = password_hash($input['password'], PASSWORD_BCRYPT);
                if (password_verify($input['password'], $password)) {
                    $user_db = $this->auth->userdata($input['username']);
                    if ($user_db['u_status'] === 'non') {
                        set_message('Akun anda belum aktif/dinonaktifkan. Silahkan hubungi admin! Terimakasih', false);
                        redirect('login');
                    } else {
                        $userdata = [
                            'user'  => $user_db['id_user'],
                            'role'  => $user_db['role'],
                            'timestamp' => time()
                        ];
                        $this->session->set_userdata('login_session', $userdata);
                        redirect('dashboard');
                    }
                } else {
                    set_message('Password salah', false);
                    redirect('login');
                }
            } else {
                set_message('Username belum terdaftar', false);
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('login_session');

        set_message('Anda telah berhasil logout');
        redirect('login');
    }
}
