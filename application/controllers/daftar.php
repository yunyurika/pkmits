<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Mymodel');
		$this->load->view('header');
	}

	public function index()
	{
		$data['mahasiswa'] = $this->Mymodel->all();
		$data['user'] = $this->Mymodel->all1();
		$this->load->view('list', $data);
	}

}