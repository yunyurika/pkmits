<?php 

class Page extends CI_Controller {
	
public function __construct() {
            parent::__construct();
            $this->load->model('mymodel');

   //       if ($this->session->userdata('status') != null || $this->session->userdata('status') != ""){
			// 	redirect('controller');
			// } else {
				 
			// }      
    }
           


	public function index() {
		$this->load->view('sign');

	}

	public function register() {
		$this->load->view('register');
	}
	public function home() {

		 if($this->session->userdata('status') != "login" || $this->session->userdata('status') == "" || $this->session->userdata('status') == null ) {redirect(base_url());
		 }
		 $username = $this->session->userdata('username');
		 $dataNama = $this->Mymodel->getData($username);
		$this->load->view('header');
		$this->load->view('home', array('data' => $dataNama));
			
	}

	public function urutan(){
		if($this->session->userdata('status') != "login" || $this->session->userdata('status') == "" || $this->session->userdata('status') == null ) {redirect(base_url());
		}
		$this->load->view('header');
		$data['user'] = $this->Mymodel->all();
		$this->load->view('list', $data);
	}





	

}

?>