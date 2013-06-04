<?php
	class sub_kategori_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
	

		public function get_subkategori_by_kategori($id_kategori){
			$query = $this->db->get_where('sub_kategori', array('id_kategori'=>$id_kategori));
			return $query->result();
		}

	}