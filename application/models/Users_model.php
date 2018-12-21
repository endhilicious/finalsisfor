<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function getAllUsers(){
			$query = $this->db->get('final');
			return $query->result(); 
		}

		public function insertuser($finals){
			return $this->db->insert('final', $finals);
		}

		public function getUser($id){
			$query = $this->db->get_where('final',array('id'=>$id));
			return $query->row_array();
		}

		public function updateuser($finals, $id){
			$this->db->where('final.id', $id);
			return $this->db->update('final', $finals);
		}

		public function deleteuser($id){
			$this->db->where('final.id', $id);
			return $this->db->delete('final');
		}

	}
?>