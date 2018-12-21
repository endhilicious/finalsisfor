<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_customer');
        $this->load->helper('url');
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
        $data['customer'] = $this->m_customer->tampil_data()->result();
        $this->load->view('admin/customer', $data);
	}

	// ADD
	public function customerTambah(){
		$this->load->view('admin/customerForm');	
	}

    function add_customer()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $instagram = $this->input->post('instagram');
        $born_date = $this->input->post('born_date');
        $job = $this->input->post('job');
        $university = $this->input->post('university');

        $data = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'instagram' => $instagram,
            'born_date' => $born_date,
            'job' => $job,
            'university' => $university
        );
        $this->m_customer ->input_customer($data, 'customer');
        redirect('admin/customer');
    }
    // END OF ADD

    // DELETE
    function hapus($id)
    {
        $where = array('id' => $id);
        $this->m_customer->hapus_data($where, 'customer');
        redirect('admin/customer');
    }
    // END OF DELETE

    // UPDATE
    function edit($id)
    {
        $where = array('id' => $id);
        $data['customer'] = $this->m_customer->edit_data($where, 'customer')->result();
        $this->load->view('admin/customerEditForm', $data);
    }

    function update($id) {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $instagram = $this->input->post('instagram');
        $born_date = $this->input->post('born_date');
        $job = $this->input->post('job');
        $university = $this->input->post('university');

        $data = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'instagram' => $instagram,
            'born_date' => $born_date,
            'job' => $job,
            'university' => $university
        );

        $where = array(
            'id' => $id
        );

        $this->m_customer->update_data($where, $data, 'customer');
        redirect('admin/customer');
    }
    // END OF UPDATE

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
