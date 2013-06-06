<?php
class User_model extends CI_Model{
 
    function simpan_user(){
        $simpan_data=array(
            'nama_lengkap'  => $this->input->post('nama_lengkap'),
            'username'      => $this->input->post('username'),
            'password'      => md5($this->input->post('password')),
            'email'         => $this->input->post('email'),
       );
        $simpan = $this->db->insert('user', $simpan_data);
        return $simpan;
    }
	
	//cek username dan password untuk login
	function cek_username_password($username, $password){
		$this->db->where('username', $this->input->post('username'));
            $this->db->where('password', md5($this->input->post('password')));
            $query = $this->db->get('user');
 
            if($query->num_rows == 1)
            {
                return TRUE;
            }
	}

	function get_id_by_username($username){
		$query = $this->db->get_where('user', array('username' => $username));
		if($query->num_rows()== 1){
			$result = $query->row();

			return $result->id_user;
		}else{
			return null;
		}
	}
	
	//////=====================================////////////////////
	function get_user_all()
    {
        $query=$this->db->query("SELECT * FROM user ORDER BY id_user DESC");
        return $query->result();
    }
	
	function edit_user($username)
    {
        $q="SELECT * FROM  user WHERE username='$username'";
        $query=$this->db->query($q);
        return $query->row();
    }

    function simpan_edit_user($id_user, $nama_lengkap, $username, $password, $email, $alamat)
    {
        $data = array(
            'id_user'        => $id_user,
            'nama_lengkap'   => $nama_lengkap,
            'username'       => $username,
            'password'       => $password,
            'email'          => $email,     
            'alamat'         => $alamat
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);    
    }
	
	
	
	
	
	
	
	//////=====================================////////////////////
	
	
	
	
	//insert user
	function insert_user(){
		$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'bio' => $this->input->post('bio'),
				'photo' => $this->input->post('photo'),
				);
		$this->db->insert('user',$data);
	}
	
	//update user
	function select_user($username){
		$query = $this->db->get_where('user', array('username' => $username));
		return $query->row();
	}

	
	// function simpan_update_user($username, $data){
		// $this->db->where('username', $username);
	// }
	function is_user_exist($username){
		$this->db->select('id_user, username');
		$query = $this->db->get_where('user', array('username' => $username));
		$hasil = $query->num_rows();

		if ($hasil > 0) {
			return true;
		}else{
			return false;
		}
	}

	function select_user_by_id($id_user){
		//$this->db->select('id_user, username, bio, photo');
		$query = $this->db->get_where('user', array('id_user' => $id_user));
		return $query->row();
	}


	//update user
	function simpan_update_user($id_user, $data){
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $data);
	}
	
	//ganti password
	function ganti_password($username, $password){
		$this->db->where('username', $username);
		$this->db->update('user', array('password'=>$password));
	}
	
	//update
	function update_profil($username, $nama_lengkap, $alamat, $fb, $yahoo, $twitter, $bio, $tlp, $pin_bb){
		$this->db->where('username', $username);
		$this->db->update('user', array('username'=>$username,
										'nama_lengkap'=>$nama_lengkap,
										'alamat'=>$alamat,
										'fb'=>$fb,
										'yahoo'=>$yahoo,
										'twitter'=>$twitter,
										'bio'=>$bio,
										'tlp'=>$tlp,
										'pin_bb'=>$pin_bb));
	}

	function update_profil_by_id_user($id_user, $array){
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $array);
	}
	
	
}
