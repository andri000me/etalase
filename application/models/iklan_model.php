<?php
	class iklan_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
	
		
		//Buat Pasang Iklan Baru
		function insert_iklan($data){
			$query = $this->db->insert('iklan', $data);
			return $query;
		}
	}
?>