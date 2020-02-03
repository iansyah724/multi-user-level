<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function grafik()
	{
		return $this->db->query("
			SELECT 
				COUNT(id) as jml,
				level
			FROM 
				user
			GROUP BY 
				level
			");
	}

	public function tampil()
	{
		return $this->db->query("
			SELECT * FROM user LIMIT 0,5
			");
	}

	public function tampil_sub()
	{
		return $this->db->query("
			SELECT * FROM sub_user LIMIT 0,5			
			");;
	}
	public function total_sub()
	{
		return $this->db->get('sub_user');
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */