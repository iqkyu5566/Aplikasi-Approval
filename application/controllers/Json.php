<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Ozdemir\Datatables\Datatables;
use Ozdemir\Datatables\DB\CodeigniterAdapter;

class Json extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if (!$this->input->is_ajax_request()) {
		// 	exit('No direct script access allowed');
		// 	die();
		// }	
		$this->load->library('Datatables');
	}

	// public function datauser()
	// {			
	// 	$datatables = new Datatables(new CodeigniterAdapter);
	// 	$datatables->query('SELECT user.ID AS IDUser, user.Nama, user.Email, infouser.Customer, infouser.Alamat, infouser.NomorHp FROM user, infouser WHERE infouser.Customer = user.ID');
	//     $datatables->edit('IDUser', function($data){
	// 		return "<b>" . $data['IDUser'] . "</b>";
	//     });
	//     $datatables->edit('Button', function($data){
	// 		return '
	// 				<!-- Single button -->
	// 				<div class="btn-group" style="float: right">
	// 				  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	// 				    Action <span class="caret"></span>
	// 				  </button>
	// 				  <ul class="dropdown-menu">
	// 				    <li><a href="#">View Detail</a></li>
	// 				    <li><a href="#">Delete</a></li>
	// 				  </ul>
	// 				</div>
	// 	';
	//     });
	// 	echo $datatables->generate();
	// }

	public function TabelTahunIni()
	{
		$now = date("Y");
		$start = $now . "-01-01";
		$end = $now . "-12-31";
		$datatables = new Datatables(new CodeigniterAdapter);
		$datatables->query('SELECT anggaran.*, akun.*, anggaran.id AS idanggaran FROM anggaran, akun WHERE anggaran.akun = akun.id AND anggaran.perusahaan = 1 AND anggaran.tanggal > $start AND anggaran.tanggal < $end ORDER BY anggaran.id DESC');
		echo $datatables->generate();
	}

}

/* End of file PushJson.php */
/* Location: ./application/controllers/PushJson.php */ ?>