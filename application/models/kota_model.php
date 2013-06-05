<?php
	class kota_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
	
		public function get_kota_where_prov($id_prov){
			$query = $this->db->get_where('kota', array('id_provinsi'=>$id_prov));

			return $query->result();
		}

		public function get_kota_by_id($id_kota){
			$query = $this->db->get_where('kota', array('id_kota'=>$id_kota));
			return $query->row();
		}

		public function get_kota_by_id_provinsi($id_provinsi){
			$query = $this->db->get_where('kota', array('id_provinsi'=>$id_provinsi));
			return $query->result();
		}

	}