<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
		function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model');
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
		$data['final'] = $this->users_model->getAllUsers();
		$this->load->view('admin/product', $data);
	}
	public function productTambah(){
		$this->load->view('admin/productForm');	
	}
	
	public function productEdit(){
		$this->load->view('admin/productEdit');	
	}
	
	public function insert(){
		$finals['jenis_paket'] = $this->input->post('jenis_paket');
		$finals['nama_paket'] = $this->input->post('nama_paket');
		$finals['fasilitas'] = $this->input->post('fasilitas');
		$finals['jenis_kerjasama'] = $this->input->post('jenis_kerjasama');
		$finals['hargaperbulan'] = $this->input->post('hargaperbulan');
		$finals['hargapertahun'] = $this->input->post('hargapertahun');
		
		
		$query = $this->users_model->insertuser($finals);

		if($query){
			header('location:product');
		}
		

	}
	
		public function delete($id){
		$query = $this->users_model->deleteuser($id);

		if($query){
			redirect(base_url('index.php/admin/product'));
		}
	}
	
	public function edit($id){
		$data['final'] = $this->users_model->getUser($id);
		$this->load->view('productEdit', $data);
	}

	public function update($id){
		$finals['jenis_paket'] = $this->input->post('jenis_paket');
		$finals['nama_paket'] = $this->input->post('nama_paket');
		$finals['fasilitas'] = $this->input->post('fasilitas');
		$finals['jenis_kerjasama'] = $this->input->post('jenis_kerjasama');
		$finals['hargaperbulan'] = $this->input->post('hargaperbulan');
		$finals['hargapertahun'] = $this->input->post('hargapertahun');
		
		
		$query = $this->users_model->updateuser($finals);

		if($query){
			header('location:product');
		}
	}

	
	public function post(){
		$this->load->view('admin/posts');	
	}
}
