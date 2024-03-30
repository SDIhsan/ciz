<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muzakki extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Muzakki';
        $this->template->load('templates/template','muzakki',$data);
	}
}
