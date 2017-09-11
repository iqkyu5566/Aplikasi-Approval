<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBMaker extends CI_Model {

	function HitungRealisasi($akun, $perusahaan)
	{
		$query = "SELECT id, akun, perusahaan, status, SUM(nominal) AS total FROM anggaran WHERE akun = $akun AND perusahaan = $perusahaan AND status = 'approved'";
		return $this->db->query($query);	
	}

	function HitungRka($akun, $perusahaan)
	{
		$query = "SELECT akun.*, rka.* FROM akun, rka WHERE rka.akun = $akun AND rka.perusahaan = $perusahaan";
		return $this->db->query($query);
	}

	function FetchAkun($perusahaan)
	{
		$this->db->where('perusahaan', $perusahaan);
		return $this->db->get('akun');
	}

	function Insert($object)
	{
		return $this->db->insert('anggaran', $object);
	}
	

}

/* End of file DBMaker.php */
/* Location: ./application/models/DBMaker.php */ ?>