<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model','model');
	}

	public function index()
	{
		$this->load->view('login_view');
	}

	public function cek()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username
		);
		
		$this->model->cek('user',$where);
		$data = $this->model->cek('user',$where);

		if ($data->num_rows() > 0) {
			foreach ($data->result_array() as $key) {
				if (password_verify($password,$key['password'])) {
					$session = $key;
					$this->session->set_userdata($session);

					if ($key['level']=='1') {
						redirect(base_url('admin'));
					}

					else {
						redirect(base_url('user'));
					}
				} else {
					$this->session->set_flashdata('pesan', 'Password salah.');
					redirect(base_url(''));
				}
			}
		} else {
			$this->session->set_flashdata('pesan', 'Username tidak ditemukan.');
			redirect(base_url(''));
		}
	}

	public function daftar()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');

		$where = array(
			'username' => $username
		);

		$cek = $this->model->cek('user',$where)->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('pesan', 'Username sudah digunakan.');
			redirect(base_url(''));
		} else {
			$data = array(
				'username' => $username,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'level' => $level
			);
			$this->model->daftar('user',$data);

			$config['upload_path'] = './gambar/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '9999999';
			$config['max_width']  = '9999999';
			$config['max_height']  = '9999999';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				$this->session->set_flashdata('pesan', 'sukses');
				redirect(base_url(''));
			}
			else{
				$gambar = array(
					'gambar' => $this->upload->data('file_name')
				);

				$this->model->gambar('user',$gambar,array('username' => $username));
				$this->session->set_flashdata('pesan', 'sukses');
				redirect(base_url(''));
			}
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(''));
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */