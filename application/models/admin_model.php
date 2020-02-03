<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function tampil($tabel,$where)
	{
		return $this->db->get_where($tabel,$where);
	}

	public function tambah($tabel,$data)
	{
		$this->db->insert($tabel, $data);
	}

	public function edit($tabel,$data,$where)
	{
		$this->db->update($tabel, $data, $where);
	}

	public function hapus($tabel,$where)
	{
		$this->db->delete($tabel, $where);
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */