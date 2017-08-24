<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBUser extends CI_Model {

	function login($info) {
		$email 		= $info['email'];
		$password 	= $info['password'];
		$query = "SELECT * FROM user WHERE email = '$email' AND PASSWORD = PASSWORD('$password') LIMIT 1";
		return $this->db->query($query);
	}	

	function Perusahaan($id)
	{
		$this->db->where('id', $id);
		return	$this->db->get('perusahaan');
	}

}

/* End of file DBUser.php */
/* Location: ./application/models/DBUser.php */ ?>