<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function cek($tabel,$where)
	{
		return $this->db->get_where($tabel,$where);
	}

	public function daftar($tabel,$data)
	{
		$this->db->insert($tabel, $data);
	}

	public function gambar($tabel,$data,$where)
	{
		$this->db->update($tabel, $data, $where);
	}

	public function tampil_antrian($jenis)
	{
		$this->db->where('id_jenis',$jenis);
		return $this->db->get('antrian');
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */