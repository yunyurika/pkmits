<?php 

class Page extends CI_Controller {
	
public function __construct() {
            parent::__construct();
            $this->load->model('mymodel');
             $this->load->library('session');
            if($this->session->userdata('status') != "login"){
			redirect(base_url('index.php/page/home'));
        //}
			}
}

	public function index() {
		$this->load->view('sign');

	}

	public function register() {
		$this->load->view('register');
	}

	public function form() {

		 if($this->session->userdata('status') != "login" || $this->session->userdata('status') == "" || $this->session->userdata('status') == null ) {
		 	redirect(base_url());
		 }

		$this->load->view('header');
		$this->load->view('form');		
	}

	public function home() {

		 if($this->session->userdata('status') != "login" || $this->session->userdata('status') == "" || $this->session->userdata('status') == null ) {
		 	redirect(base_url());
		 }
		$this->load->view('header');
		$this->load->view('home');
			
	}

	public function form_nilai() {
		 if($this->session->userdata('status') != "login" || $this->session->userdata('status') == "" || $this->session->userdata('status') == null || $this->session->userdata('role') !== "dosen" ) {
		 	redirect(base_url());
		 }
		$this->load->view('header');
		$this->load->view('form_nilai');
	}

	public function upload() {

		 if($this->session->userdata('status') != "login" || $this->session->userdata('status') == "" || $this->session->userdata('status') == null ) {
		 	redirect(base_url());
		 }
		$this->load->view('header');
		$this->load->view('form'); 
	}

	

}

?>