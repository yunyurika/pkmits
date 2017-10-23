 <?php

 class Controller extends CI_Controller {
	
    public function __construct() {
            parent::__construct();
            $this->load->model('mymodel');
             $this->load->library('session');

  	// 		if ($this->session->userdata('status') != null || $this->session->userdata('status') != ""){
				
			// } else {
			// 	 redirect('page');
			// }      
    }



    public function add_register() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nim', 'NIM', 'required|is_unique[user.NIM]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() != false){
                    
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
	
		} else {
			//$this->session->set_flashdata('error', 'Isi kembali dengan benar form ini!');
			$this->load->view('register');	
	
		}
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
			redirect(base_url().'index.php/page/list');
			
		} else  {
			$this->session->set_flashdata('error', 'password/username yang anda masukkan salah');
			redirect();}}

		// var_dump($isMahasiswa);


	public function logout() {
		$data_session = array('username', 'status');
		$this->session->set_userdata("");
		$this->session->unset_userdata($data_session);
		$this->session->sess_destroy();

		redirect(base_url());}

	public function update_anggota() {
			 if($this->session->userdata('status') != "login" || $this->session->userdata('status') == "" || $this->session->userdata('status') == null ) {redirect(base_url());
		 	}

			$data = array(
    					  'JudulPKM' => $this->input->post('judul'),
    					  'NamaKetua' => $this->input->post('ketua'),	
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
			redirect(base_url().'index.php/page/home');}

	/*public function update_pkm() {

		$this->load->library('upload');
		$this->load->helper('form');

		$is_submit= $this->input->post('is_submit');

		if (isset($is_submit) && $is_submit ==1) {
			$fileUpload = array();
			$isUpload = FALSE;

			$config = array(
					  'upload_path' => './uploads/',
					  'allowed_types' => 'docx|doc',
					  'max_size' => 2000
					  );

			$this->upload->initialize($config);
			if($this->upload->do_upload('file')) {
				$fileUpload = $this->upload->data();
				$isUpload = TRUE;
			}

			if($isUpload) {
				$data = array(
						'JudulPKM' => $this->input->post('judul'),
						'FilePKM' => $this->fileUpload['file_name']
						);

				$where = array('NIM' => $this->session->userdata('username'));

				echo print_r($data);

				echo print_r($where	);
				//$this->mymodel->update_data($where, $data,'user');

				//redirect(base_url());
			}

		}

	} */
}

?>
