<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_control extends CI_Controller {

	
public function __construct() {
            parent::__construct();
            $this->load->model('mymodel');
            
            //if($this->session->userdata('status') != "login"){
			//redirect(base_url('index.php/home'));
        //}
}
	public function index() {

		$this->load->view('sign_admin');

	}

	public function home_admin() {
		$this->load->view('header');
		$this->load->view('home');
	}

	public function login_admin() {
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$isLogin = $this->mymodel->login_admin($email,$password);

		if($isLogin == true) {
			$data_session =   array('email' => $email,
									'status' => "login",
									 );
			$this->session->set_userdata($data_session);
			redirect(base_url('index.php/page'));
		} else {
			$this->session->set_flashdata('error', 'password/email yang anda masukkan salah');
			redirect();
		}

		

	}
}
?>
