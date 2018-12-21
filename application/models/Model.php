<?php
class Model extends CI_Model {

    public function __construct()
	{
		$this->load->database();
    }
    
    public function get_all_data()
	{
		$query = $this->db->get('database');
		return $query->result();
    }

    public function tambah_company()
	{
		$data = [
					'id' => $this->input->post('id'),
					'nama' => $this->input->post('nama'),
					'notelp' => $this->input->post('notelp'),
					'alamat' => $this->input->post('alamat'),
					'email' => $this->input->post('email'),
				];

		$this->db->insert('company', $data);
    }
    
    public function edit_company($id)
	{
		$query = $this->db->get_where('company', ['id' => $id]);
		return $query->row();
    }
    
    public function update_company()
	{
		$kondisi = ['id' => $this->input->post('id')];
		
		$data = [
					'nama' => $this->input->post('jenis'),
					'notelp' => $this->input->post('tahun'),
					'email' => $this->input->post('harga'),
					'alamat' => $this->input->post('nopol'),
				];

		$this->db->update('company', $data, $kondisi);
    }
    
    public function hapus_company($id)
	{
		$this->db->delete('company', ['id' => $id]);
	}
    
}


?>