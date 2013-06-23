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


		function get_iklan_by_category($id_category){
			$query = $this->db->get_where('iklan', array('id_kategori'=>$id_category));

			return $query->result();
		}

		function get_iklan_by_id_iklan($id_iklan){
			$query = $this->db->get_where('iklan', array('id_iklan'=>$id_iklan));
			return $query->row();
		}

		function get_iklan_by_id_user($id_user){
			$query = $this->db->get_where('iklan', array('id_user'=>$id_user));
			return $query->result();
		}

		function set_iklan_by_id_iklan($id_iklan, $array){
			$this->db->where("id_iklan", $id_iklan);
			$this->db->update('iklan', $array);
		}

		function iklan_like($nama, $id_kategori, $id_provinsi){
			$query = $this->db->query("SELECT * FROM iklan WHERE judul like '%$nama%' AND id_kategori = '$id_kategori' AND id_provinsi = '$id_provinsi' ");
			return $query->result();
		}

	}