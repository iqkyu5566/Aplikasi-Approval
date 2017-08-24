<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checker extends CI_Controller
{

function __construct()
{
    parent::__construct();
    if ($this->session->userdata('type') !== 'checker' || empty($this->session->userdata('type'))) {
        $this->session->set_flashdata('warn', 'Anda tidak Mempunyai Akses Checker!');
        redirect($_SERVER['HTTP_REFERER']);
        die('Anda Bukan Checker');
    }
    $this->perusahaan = $this->session->userdata('perusahaan');
    $this->load->model('DBChecker');
}

public function index()
{
    // filter hari bulan tanggal
    
    if ($this->uri->segment(3) == "thisday") {
        $data = array(
            'alldata' => $this->DBChecker->TabelHariIni($this->perusahaan)
        );
    } 
    elseif ($this->uri->segment(3) == "thismonth") {
        $data = array(
            'alldata' => $this->DBChecker->TabelBulanIni($this->perusahaan)
        );
    } 
    elseif ($this->uri->segment(3) == "thisyear") {
        $data = array(
            'alldata' => $this->DBChecker->TabelTahunIni($this->perusahaan)
        );
    } 
    elseif (empty($this->uri->segment(3))) {
        redirect('checker/index/thisday', 'refresh');
    }
    
    $this->template->load('template/default', 'checker/Table', $data);
}

public function detail()
{
    // jika nomor akun dan id tidak ada diisi
    if (empty($this->uri->segment(3))) {
        redirect('checker', 'refresh');
        die();
    }
    
    $dat1 = array(
        'id' => $this->uri->segment(3),
        'database' => $this->DBChecker->Detail($this->perusahaan, $this->uri->segment(3))->row()
    );
    $dat2 = array(
        'realisasi_bulan' => $this->DBChecker->HitungRealisasi($this->perusahaan, $dat1['database']->akun, 'bulan')->row(),
        'realisasi_tahun' => $this->DBChecker->HitungRealisasi($this->perusahaan, $dat1['database']->akun, 'tahun')->row(),
        'rka' => $this->DBChecker->TabelRka($this->perusahaan, $dat1['database']->akun)->row(),
        'rka_total' => $this->DBChecker->HitungTotalRka($this->perusahaan, $dat1['database']->akun)->row()
    );
    $data = $dat1 + $dat2;
    
    // jika data tidak ditemukan
    if (empty($data['database'])) {
        redirect('checker', 'refresh');
        die();
    } 
    else {
        $this->template->load('template/default', 'checker/detail', $data);
    }
}

public function ApproveAnggaran()
{
    // jika nomor akun dan id tidak ada diisi
    if (empty($this->uri->segment(3))) {
        redirect('checker', 'refresh');
        die();
    }
    
    $object = array(
        'status' => 'checked',
        'alasan' => $this->input->post('alasan')
    );
    if ($this->DBChecker->ApproveAnggaran($this->uri->segment(3), $object)) {
        $this->session->set_flashdata('success', 'Approved');
        redirect($_SERVER['HTTP_REFERER']);
    }
}

public function DeclineAnggaran()
{
    // jika nomor akun dan id tidak ada diisi
    if (empty($this->uri->segment(3))) {
        redirect('checker', 'refresh');
        die();
    }
    
    $object = array(
        'status' => 'declined',
        'alasan' => $this->input->post('alasan')
    );
    if ($this->DBChecker->DeclineFromChecker($this->uri->segment(3), $object)) {
        $this->session->set_flashdata('success', 'Declined');
        redirect($_SERVER['HTTP_REFERER']);
    }
    
}

}

/* End of file Checker.php */
/* Location: ./application/controllers/Checker.php */
?>