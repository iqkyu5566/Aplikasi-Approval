<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBRka extends CI_Model {

	function Akun($perusahaan)
	{
		$query = "SELECT akun.*, rka.*, akun.id AS akunid FROM akun, rka WHERE rka.akun = akun.id AND rka.perusahaan = $perusahaan";
		return $this->db->query($query);
	}

	function CekRka($akun)
	{
		$this->db->where('akun', $akun);
		return $this->db->get('rka');
	}

	function FetchAkun()
	{
		return $this->db->get('akun');
	}

	function Edit()
	{
		$query = "SELECT akun.*, rka.* FROM akun, rka WHERE rka.akun = akun.id AND rka.perusahaan = $perusahaan AND akun.id";
		return $this->db->query($query);		
	}

	function SusunUpdate($object)
	{
		$this->db->where('akun', $object['akun']);
		return $this->db->update('rka', $object);
	}

	function Susun($object)
	{
		return $this->db->insert('rka', $object);
	}

}

/* End of file DBApproval.php */
/* Location: ./application/models/DBApproval.php */ ?>