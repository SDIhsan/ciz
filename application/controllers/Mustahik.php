<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mustahik extends CI_Controller {

	public function index()
	{
		$data['title'] = 'Mustahik';
        $this->template->load('templates/template','mustahik',$data);
	}
}
