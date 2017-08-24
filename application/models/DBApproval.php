<?php defined('BASEPATH') OR exit('No direct script access allowed');

class DBApproval extends CI_Model {

	function TabelHariIni($perusahaan)
	{
		$now = date("Y-m-d");
		$query 		= "SELECT anggaran.*, akun.*, anggaran.id AS idanggaran FROM anggaran, akun WHERE anggaran.akun = akun.id AND anggaran.perusahaan = $perusahaan AND anggaran.tanggal = '$now' AND anggaran.status NOT IN ('pending') ORDER BY anggaran.id DESC";
		return $this->db->query($query);
	}

	function TabelBulanIni($perusahaan)
	{
		$now = date("Y-m");
		$start = $now . "-00";
		$end = $now . "-31";
		$query 		= "SELECT anggaran.*, akun.*, anggaran.id AS idanggaran FROM anggaran, akun WHERE anggaran.akun = akun.id AND anggaran.perusahaan = $perusahaan AND anggaran.tanggal > '$start' AND anggaran.tanggal < '$end' AND anggaran.status NOT IN ('pending') ORDER BY anggaran.id DESC";
		return $this->db->query($query);
	}

	function TabelTahunIni($perusahaan)
	{
		$now = date("Y");
		$start = $now . "-01-01";
		$end = $now . "-12-31";
		$query 		= "SELECT anggaran.*, akun.*, anggaran.id AS idanggaran FROM anggaran, akun WHERE anggaran.akun = akun.id AND anggaran.perusahaan = $perusahaan AND anggaran.tanggal > '$start' AND anggaran.tanggal < '$end' AND anggaran.status NOT IN ('pending') ORDER BY anggaran.id DESC";
		return $this->db->query($query);
	}
	
	function Detail($perusahaan, $id)
	{
		$query 		= "SELECT anggaran.*, akun.*, anggaran.id AS idanggaran FROM anggaran, akun WHERE anggaran.akun = akun.id AND anggaran.id = $id AND anggaran.perusahaan = $perusahaan LIMIT 1";
		return $this->db->query($query);		
	}

	function HitungRealisasi($perusahaan, $akun, $tipe) {
		if ($tipe == "bulan") {
			$now = date("Y-m");
			$start = $now . "-00";
			$end = $now . "-31";
		$query = "SELECT akun, perusahaan, tanggal, status, SUM(nominal) AS total FROM anggaran WHERE perusahaan = $perusahaan AND akun = $akun AND tanggal > '$start' AND tanggal < '$end' AND status = 'approved'";
		}
		elseif ($tipe == "tahun") {
			$now = date("Y");
			$start = $now . "-01-01";
			$end = $now . "-12-31";		
		$query = "SELECT akun, perusahaan, tanggal, status, SUM(nominal) AS total FROM anggaran WHERE perusahaan = $perusahaan AND akun = $akun AND tanggal > '$start' AND tanggal < '$end' AND status = 'approved'";
		}
		return $this->db->query($query);	
	}

	function TabelRka($perusahaan, $akun)
	{
		$this->db->where('akun', $akun);
		$this->db->where('perusahaan', $perusahaan);
		return $this->db->get('rka');
	}

	function HitungTotalRka($perusahaan, $akun)
	{
		return $this->db->query("SELECT id, akun, perusahaan, january + february + march + april + may + june + july + august + september + october + november + december AS total FROM rka WHERE akun = '$akun' AND perusahaan = '$perusahaan'");
	}

	function DeclineFromChecker($id, $object)
	{
		$this->db->where('id', $id);
		$this->db->where('status', 'pending');
		return $this->db->update('anggaran', $object);
	}

	function ApproveAnggaran($id, $object)
	{
		$this->db->where('id', $id);
		$this->db->where('status', 'checked');
		return $this->db->update('anggaran', $object);
	}

}

/* End of file DBChecker.php */
/* Location: ./application/models/DBChecker.php */ ?>	