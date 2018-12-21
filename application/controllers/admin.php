<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mod');
	}

	public function index() {
		$this->load->view('admin/index');
	}
	public function login() {
		$this->load->view('login');
	}
	public function loginAction() {
		redirect(base_url("index.php/admin/index"));
	}
	public function customer() {
		$this->load->view('admin/customer');
	}
	public function customerTambah(){
		$this->load->view('admin/customerForm');	
	}
	public function company() {
		$this->load->view('admin/company');
	}
	public function companyTambah(){
		$this->load->view('admin/companyForm');	
	}
	public function library() {
		$this->load->view('admin/library');
	}
	public function libraryTambah(){
		$this->load->view('admin/libraryForm');	
	}
	public function product() {
		$this->load->model('mod');
		$tampil['content'] = 'admin/product';
		$tampil['judul'] = 'product';
		$tampil['data']= $this->db->get('product')->result();
		$this->load->view('admin/product', $tampil);
	}
	public function productTambah(){
		$data = [];
		$data['product'] = false;
		$data['action_button'] ='Tambah';
		$id = $this->uri->segment(3);
		if ($id){
			$data['product']=$this->mod->get_product($id);
			$data['action_button']= 'Update';
		}
		$this->load->view('admin/productForm', $data);	
	}

	public function productSimpan(){
		$isi['Jenis_Paket']= $this->input->post('Jenis_Paket');
		$isi['Nama_Paket']= $this->input->post('Nama_Paket');
		$isi['Fasilitas']= $this->input->post('Fasilitas');
		$isi['Jenis_Kerjasama']= $this->input->post('Jenis_Kerjasama');
		$isi['Harga_Per_Bulan']= $this->input->post('Harga_Per_Bulan');
		$isi['Harga_Per_Tahun']= $this->input->post('Harga_Per_Tahun');

		$id = $this->mod->is_product_exist($isi['Jenis_Paket']);
		if($id&&$id>0){
			$this->mod->UpdateData($isi['Jenis_Paket'], $isi);
		}else{
			$this->mod->insertData($isi);
		}
		redirect(base_url('index.php/admin/product'));
	}
	public function productHapus(){
		$id = $this->uri->segment(3);
		if($id){
			$this->mod->deleteData($id);
		} 
		redirect(base_url('index.php/admin/product'));
	}

	public function post(){
		$this->load->view('admin/posts');	
	}


}
