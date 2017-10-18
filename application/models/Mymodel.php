<?php 

class Mymodel extends CI_Model {
	
	public function getData($email) {
		$query =  $this->db->get_where('admin', array('email' => $email));
		return $query->result_array();
	}

	public function login_admin($email, $password) {
		$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->from('admin');

		$query = $this->db->get();
    	if($query->num_rows() == 1){
    		return true;
    	} else return false;		
	}

	public function login_user($username, $password) {
		$this->db->select('*');
		$this->db->where('NIM', $username);
		$this->db->where('Password', $password);
		// $this->db->where('Nama', 'yun');
		// $this->db->from('user');

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

	
}


?>