<?php
	class kategori_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
	
		public function get_all_kategori(){
			$query = $this->db->get('kategori');
			return $query->result();
		}

		public function get_kategori_by_id($id){
			$query = $this->db->get_where('kategori', array('id_kategori'=>$id));

			return $query->row();
		}

	}