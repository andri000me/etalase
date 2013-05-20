<?php
class User_model extends CI_Model{
 
    function simpan_user(){
        $simpan_data=array(
            'nama_lengkap'  => $this->input->post('nama_lengkap'),
            'username'      => $this->input->post('username'),
            'password'      => $this->input->post('password'),
            'email'         => $this->input->post('email'),
       );
        $simpan = $this->db->insert('user', $simpan_data);
        return $simpan;
    }
	
	function cek_username_password($username, $password){
		$query = $this->db->get_where('user', array('username' => $username, 'password' => $password));
		if($query->num_rows()== 1){
			return true;
		}else{
			return false;
		}
	}
	
	
}