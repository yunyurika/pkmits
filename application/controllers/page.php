<?php 

class Page extends CI_Controller {
	
public function __construct() {
            parent::__construct();
            $this->load->model('mymodel');
             $this->load->library('session');
            //if($this->session->userdata('status') != "login"){
			//redirect(base_url('index.php/home'));
        //}
}

	public function index() {
		$this->load->view('sign');

	}

	public function register() {
		$this->load->view('register');
	}

	public function form() {

		$this->load->view('header');
		$this->load->view('form');		
	}

	public function home() {
		$this->load->view('header');
		$this->load->view('home');
			
	}

	public function form_nilai() {
		$this->load->view('header');
		$this->load->view('form_nilai');
	}

	public function upload() {
		$this->load->view('header');
		$this->load->view('form'); 
	}

	public function add_register() {
		$this->load->helper('form');

		$nama = $this->input->post('nama');
		$nim  = $this->input->post('nim');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
	


		$data = array('NIM' => $nim ,
					  'Nama' => $nama,
					  'Email' => $email,
					  'Password' => md5($password) );

		$sukses = $this->mymodel->register($data);

		$data_session = array('username' => $username,
							  'status' => 'login',
							  'role' => 'mahasiswa');
		$this->session->set_userdata($data_session);


		redirect(base_url().'index.php/page/home');
	}



	public function login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$isDosen = $this->mymodel->login_dosen($username,md5($password));
		$datamahasiswa = $this->mymodel->login_user($username, md5($password));

		// print_r(md5($password));
		// echo "<br>";
		// print_r($datamahasiswa);

		if($datamahasiswa != null){
			$data_session = array('username' => $username,
								  'status' => 'login',
								  'role' => 'mahasiswa');
			$this->session->set_userdata($data_session);
			redirect(base_url().'index.php/page/home');
			

		}else if($isDosen != null){
			$data_session = array('username' => $username,
								  'status' => 'login',
								  'role' => 'dosen',
								  );
			$this->session->set_userdata($data_session);
			redirect(base_url().'index.php/page/home_dosen');
			
		} else  {
			$this->session->set_flashdata('error', 'password/username yang anda masukkan salah');
			redirect();

		}

		// print_r($datamahasiswa);
	}

		// var_dump($isMahasiswa);


	public function logout() {
		$data_session = array('username', 'status');
		$this->session->set_userdata("");
		$this->session->unset_userdata($data_session);
		$this->session->sess_destroy();

		redirect(base_url());
	}

	public function update_anggota() {


			$data = array('NamaKetua' => $this->input->post('ketua'),
						  'Anggota1' => $this->input->post('anggota1'),
						  'Anggota2' => $this->input->post('anggota3'),
						  'Anggota3' => $this->input->post('anggota3'),
						  'Anggota4' => $this->input->post('anggota4'),
						);
			$where = array('NIM' => $this->session->userdata('username'));

			
			//echo "<br>";
			//print_r($data);
			//var_dump($NIM);
			$this->mymodel->update_data($where, $data, 'user');

			$this->session->set_flashdata('success', 'berhasil mengupdate');
			redirect(base_url().'index.php/page/home');
			
	}

	public function update_pkm() {

		$this->load->library('upload');
		$this->load->helper('form');

		$is_submit= $this->input->post('is_submit');

		if (isset($is_submit) && $is_submit ==1) {
			# code...
		}

	}

}

?>