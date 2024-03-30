<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Distribusi';
        $this->template->load('templates/template','distribusi',$data);
	}
}
