<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model','model');
		
		// if (empty($this->session->('username'))) {
		// 	redirect(base_url('login'));
		// }
	}

	public function index()
	{
		$data['output'] = $this->model->grafik();
		$data['user'] = $this->model->tampil();
		$data['sub_user'] = $this->model->tampil_sub();
		$data['total_sub'] = $this->model->total_sub();
		$this->load->view('tampilan_user',$data);
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */