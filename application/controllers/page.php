<?php 

class Page extends CI_Controller {
	
public function __construct() {
            parent::__construct();
<<<<<<< HEAD
            $this->load->model('mymodel');
            

}
=======
            $this->load->model('Mymodel');
             $this->load->library('session');
   //          if($this->session->userdata('status') != "login"){
			// redirect(base_url('index.php/page/home'));
        //}
			}

>>>>>>> 391a7d36471770d611df5f2ce5582b26cc29223b

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
		 $username = $this->session->userdata('username');
		 $dataNama = $this->Mymodel->getData($username);
		$this->load->view('header');
		$this->load->view('home', array('data' => $dataNama));
			
	}

	public function list(){
		if($this->session->userdata('status') != "login" || $this->session->userdata('status') == "" || $this->session->userdata('status') == null ) {
		 	redirect(base_url());
		}
		$this->load->view('header');
		$data['user'] = $this->Mymodel->all();
		$this->load->view('list', $data);
	}





	public function list(){
		if($this->session->userdata('status') != "login" || $this->session->userdata('status') == "" || $this->session->userdata('status') == null ) {
		 	redirect(base_url());
		}
		$this->load->view('header');
		$data['user'] = $this->Mymodel->all();
		$this->load->view('list', $data);
	}

	

}

?>