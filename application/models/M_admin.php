<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class M_admin extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_user($username)
	{
		return $this->db
						->where('username', $username)
						->get('users')
						->row();
	}

	public function get_all_customers()
	{
		return $this->db->get('customers')->result();
	}

	public function get_customer_by_id($id)
	{
		return $this->db
						->where('id', $id)
						->get('customers')
						->row();
	}

	public function insert_customer($data)
	{
		return $this->db
						->insert('customers', $data);
	}

	public function update_customer($data, $id)
	{
		return $this->db
						->where('id', $id)
						->update('customers', $data);
	}

	public function delete_customer($id)
	{
		return $this->db
						->where('id', $id)
						->delete('customers');
	}
}