<?php
	class provinsi_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}


		//mendapatkan semua nama provinsi
		//yang didapatkan berupa objek
		public function get_all_provinsi(){
			$query = $this->db->get('provinsi');
			return $query->result();
		}
	
	}