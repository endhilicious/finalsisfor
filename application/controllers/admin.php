<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Model');
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
		$data['database'] = $this->Model->get_all_data();
		$this->load->view('admin/company', $data);
	}
	
	public function companyTambah(){
		$this->Model->tambah_company();
		$this->load->view('admin/companyForm', $data);	
	}

	public function hapusdata($id)
	{
		$this->Model->hapus_company($id);
		$this->session->set_flashdata('hapus_sukses','Data company berhasil di hapus');
		$this->load->view('admin/companyForm', $data);
	}

	public function formedit($id)
	{
		$data['db'] = $this->Model->edit_company($id);
		$this->load->view('admin/companyForm', $data);

	}

	public function updatemobil($id)
	{
		$this->Model->update_company();
		$this->session->set_flashdata('update_sukses', 'Data company berhasil diperbaharui');
		
	}
	public function library() {
		$this->load->view('admin/library');
	}
	public function libraryTambah(){
		$this->load->view('admin/libraryForm');	
	}
	public function product() {
		$this->load->view('admin/product');
	}
	public function productTambah(){
		$this->load->view('admin/productForm');	
	}
	public function post(){
		$this->load->view('admin/posts');	
	}
}
