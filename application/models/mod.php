<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod extends CI_Model {
	

	public function getTable($key){
		$this->db->where('Jenis_Paket', $key);
		$res = $this->db->get('product');
		return $res;
	}

	public function InsertData($data){
		$this->db->insert('product', $data);
	}

	public function UpdateData($key, $data){
		$this->db->where('Jenis_Paket',$key);
		$this->db->update('product', $data);
		return $res;
	}

	public function DeleteData($key){
		$this->db->where('Jenis_Paket', $key);
		$this->db->delete('product');
	}

	public function get_product($Jenis_Paket){
		return $this->db->where('Jenis_Paket', $Jenis_Paket)->get('product')->row();
	}

	public function is_product_exist($Jenis_Paket){
		return $this->db->where('Jenis_Paket', $Jenis_Paket)->get('product')->num_rows();
	}
}
