<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model','model');
	}

	public function index()
	{
		$id = $this->session->userdata('id');
		$username = $this->session->userdata('username');
		$password = $this->session->userdata('password');

		if (empty($username) || empty($password)) {
			redirect(base_url(''));
		}

		$where = array(
			'id_user' => $id
		);

		$data['output'] = $this->model->tampil('sub_user',$where)->result_array();
		$nama = $this->session->userdata('nama');
		$this->load->view('tampilan_admin',$data);
	}

	public function tambah()
	{
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$id_user = $this->session->userdata('id');

		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'id_user' => $id_user
		);

		$this->model->tambah('sub_user',$data);
		$this->session->set_flashdata('pesan', 'Berhasil ditambahkan.');
		redirect(base_url('admin'));
	}

	public function edit()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');

		$data = array(
			'nama' => $nama,
			'alamat' => $alamat
		);

		$where = array(
			'id' => $id
		);

		$this->model->edit('sub_user',$data,$where);
		$this->session->set_flashdata('pesan', 'Berhasil diupdate.');
		redirect(base_url('admin'));
	}

	public function hapus()
	{
		$id = $this->input->post('id');

		$where = array(
			'id' => $id
		);

		$this->model->hapus('sub_user',$where);
		$this->session->set_flashdata('pesan', 'Berhasil dihapus.');
		redirect(base_url('admin'));
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */