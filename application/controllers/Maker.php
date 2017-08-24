<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maker extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('type') !== 'maker' || empty($this->session->userdata('type')))
        {
            $this->session->set_flashdata('warn', 'Anda tidak Mempunyai Akses Maker!');
            redirect($_SERVER['HTTP_REFERER']);
            die();
        }
        $this->perusahaan = $this->session->userdata('perusahaan');
    }
    
    public function index()
    {
        $this->load->model('DBMaker');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('akun', 'Nama Penerima', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
            $dataselect = $this->DBMaker->FetchAkun();
            // menampilkan di select
            $data       = array(
                'select' => $dataselect
            );
            $now        = new \DateTime('now');
            $this->template->load('template/default', 'maker/form', $data);
        }
        else
        {
            // status
            $status    = $this->DBMaker->HitungRealisasi($this->input->post('akun'), $this->perusahaan)->row();
            $rka       = $this->DBMaker->HitungRka($this->input->post('akun'), $this->perusahaan)->row();
            $thismonth = date('F');
            
            // jika lebih dari realisasi maka declined
            if ($this->input->post('nominal') + $status->total > $rka->$thismonth)
            {
                $statusinfo = "declined";
            }
            else
            {
                $statusinfo = "pending";
            }
            
            // query insert
            $object = array(
                'akun' => $this->input->post('akun'),
                'tanggal' => date("Y/m/d"),
                'nominal' => $this->input->post('nominal'),
                'mekanisme_pembayaran' => $this->input->post('mekanisme_pembayaran'),
                'keterangan' => $this->input->post('keterangan'),
                'penerima_nama' => $this->input->post('penerima_nama'),
                'penerima_rekening' => $this->input->post('penerima_rekening'),
                'penerima_namabank' => $this->input->post('penerima_namabank'),
                'penerima_atasnamabank' => $this->input->post('penerima_atasnamabank'),
                'status' => $statusinfo,
                'perusahaan' => $this->perusahaan
            );
            $this->DBMaker->Insert($object);
            $this->session->set_flashdata('success', 'Data berhasil di input');
            redirect('maker', 'refresh');
        }
        
    }
    
}

/* End of file Maker.php */
/* Location: ./application/controllers/Maker.php */
?>