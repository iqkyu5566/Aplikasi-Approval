<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('type') !== 'approval' || empty($this->session->userdata('type')))
        {
            $this->session->set_flashdata('warn', 'Anda tidak Mempunyai Akses Aproval!');
            redirect($_SERVER['HTTP_REFERER']);
            die('Anda Bukan Checker');
        }
        $this->perusahaan = $this->session->userdata('perusahaan');
        $this->load->model('DBApproval');
    }
    
    public function index()
    {
        // filter hari bulan tanggal
        
        if ($this->uri->segment(3) == "thisday")
        {
            $data = array(
                'alldata' => $this->DBApproval->TabelHariIni($this->perusahaan)
            );
        }
        elseif ($this->uri->segment(3) == "thismonth")
        {
            $data = array(
                'alldata' => $this->DBApproval->TabelBulanIni($this->perusahaan)
            );
        }
        elseif ($this->uri->segment(3) == "thisyear")
        {
            $data = array(
                'alldata' => $this->DBApproval->TabelTahunIni($this->perusahaan)
            );
        }
        elseif (empty($this->uri->segment(3)))
        {
            redirect('approval/index/thisday', 'refresh');
        }
        
        $this->template->load('template/default', 'approval/Table', $data);
    }
    
    public function detail()
    {
        // jika nomor akun dan id tidak ada diisi
        if (empty($this->uri->segment(3)))
        {
            redirect('checker', 'refresh');
            die();
        }
        
        $dat1 = array(
            'id' => $this->uri->segment(3),
            'database' => $this->DBApproval->Detail($this->perusahaan, $this->uri->segment(3))->row()
        );
        $dat2 = array(
            'realisasi_bulan' => $this->DBApproval->HitungRealisasi($this->perusahaan, $dat1['database']->akun, 'bulan')->row(),
            'realisasi_tahun' => $this->DBApproval->HitungRealisasi($this->perusahaan, $dat1['database']->akun, 'tahun')->row(),
            'rka' => $this->DBApproval->TabelRka($this->perusahaan, $dat1['database']->akun)->row(),
            'rka_total' => $this->DBApproval->HitungTotalRka($this->perusahaan, $dat1['database']->akun)->row()
        );
        $data = $dat1 + $dat2;
        
        // jika data tidak ditemukan
        if (empty($data['database']))
        {
            redirect('checker', 'refresh');
            die();
        }
        else
        {
            $this->template->load('template/default', 'approval/detail', $data);
        }
    }
    
    public function DeclineAnggaran()
    {
        // jika nomor akun dan id tidak ada diisi
        if (empty($this->uri->segment(3)))
        {
            redirect('checker', 'refresh');
            die();
        }
        
        $object = array(
            'status' => 'declined',
            'alasan' => $this->input->post('alasan')
        );
        if ($this->DBApproval->DeclineFromChecker($this->uri->segment(3), $object))
        {
            $this->session->set_flashdata('success', 'Declined');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
    }
    
    public function ApproveAnggaran()
    {
        // jika nomor akun dan id tidak ada diisi
        if (empty($this->uri->segment(3)))
        {
            redirect('checker', 'refresh');
            die();
        }
        
        $object = array(
            'status' => 'approve',
            'alasan' => $this->input->post('alasan')
        );
        if ($this->DBApproval->ApproveAnggaran($this->uri->segment(3), $object))
        {
            $this->session->set_flashdata('success', 'Approved');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    
}

/* End of file Approval.php */
/* Location: ./application/controllers/Approval.php */
?>