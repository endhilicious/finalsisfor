<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
		$this->load->library('session');
	}


	public function index() {

		if(!($this->session->userdata('status') == 'logged_in')){
			redirect('index.php/admin/login');
		}

		$this->load->view('admin/index');
	}


	public function login() {
		if($this->session->userdata('status') == 'logged_in'){
			redirect('admin/index');
		}
		$this->load->view('login');
	}

	/**
	* Fungsi untuk memproses aksi login
	* @access public
	* @return void
	*/
	public function loginAction() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if (!empty($username) && !empty($password)) {
			$user = $this->m_admin->get_user($username);
			if ($username == $user->username && password_verify($password, $user->password)) {
				$session_data = [];
				$session_data['status'] = 'logged_in';
				$session_data['user'] = $user->username;
				$this->session->set_userdata($session_data);
			}
		}
		redirect(base_url("index.php/admin/index"));
	}

	public function customer() {
		$data['query'] = $this->m_admin->get_all_customers();
		$this->load->view('admin/customer', $data);
	}

	public function customerTambah(){
		$id = (int) $this->input->post('id');
		$data = [];
		$data['customer'] = false;
		$data['action_button'] = 'Create';

		if ($id && $id > 0) {
			$data['customer'] = $this->m_admin->get_customer_by_id($id);
			$data['action_button'] = 'Update';
		}

		$this->load->view('admin/customerForm', $data);	
	}

	public function customerSimpan()
	{
		$data_customer['full_name'] = $this->input->post('full_name');
		$data_customer['email_address'] = $this->input->post('email_address');
		$data_customer['phone'] = $this->input->post('phone');
		$data_customer['instagram_account'] = $this->input->post('instagram_account');
		$data_customer['birth_date'] = $this->input->post('birth_date');
		$data_customer['university'] = $this->input->post('university');
		$id = (int) $this->input->post('id');

		if ($id && $id > 0) {
			$this->m_admin->update_customer($data_customer, $id);
		}
		else {
			$this->m_admin->insert_customer($data_customer);
		}

		redirect(base_url('index.php/admin/customer'));
	}

	public function customerHapus()
	{
		 $id = (int) $this->input->post('id');
		 if ($id && $id > 0) {
		 	$this->m_admin->delete_customer($id);
		 }
		 redirect(base_url('index.php/admin/customer'));
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
		$this->load->view('admin/product');
	}
	public function productTambah(){
		$this->load->view('admin/productForm');	
	}
	public function post(){
		$this->load->view('admin/posts');	
	}
}
