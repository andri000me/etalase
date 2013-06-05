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
		
		public function get_provinsi_by_id($id_provinsi){
			$query = $this->db->get_where('provinsi', array("id_provinsi"=>$id_provinsi));
			return $query->row();
		}

	}