<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zakat extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Zakat';
        $this->template->load('templates/template','zakat/index',$data);
	}

    public function add()
    {
        $data['title'] = 'Zakat/Add';
        $this->template->load('templates/template','zakat/add',$data);
    }
}
