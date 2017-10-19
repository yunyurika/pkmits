<?php 

class Mymodel extends CI_Model {
	
	public function getData($email) {
		$query =  $this->db->get_where('admin', array('email' => $email));
		return $query->result_array();
	}

	public function login_user($username, $password) {
		$this->db->select('*');
		$this->db->where('NIM', $username);
		$this->db->where('Password', $password);

		$query = $this->db->get('user');
    	return $query->row();
	}

	public function login_dosen($username, $password) {
		$this->db->select('*');
		$this->db->where('NIP', $username);
		$this->db->where('Password', $password);
		$this->db->from('dosen');

		$query = $this->db->get();
    	if($query->num_rows() == 1){
    		return true;
    	} else return false;
	}

	public function register($data) {
		$this->db->insert('user', $data);
	}

	public function update_data($where, $data, $table) {
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function all(){
		//query semua record di table products
		$hasil = $this->db->get('mahasiswa');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return array();
		}
	}

	public function all1(){
		//query semua record di table products
		$hasil = $this->db->get('user');
		if($hasil->num_rows() > 0){
			return $hasil->result();} }
//                else {
//			return array();
//		}
//	}
	
}


?>