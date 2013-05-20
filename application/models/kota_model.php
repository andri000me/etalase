<?php
	class kota_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
	
		public function get_kota_where_prov($id_prov){
			$query = $this->db->get_where('kota', array('id_provinsi'=>$id_prov));

			return $query->result();
		}

	}
?>
