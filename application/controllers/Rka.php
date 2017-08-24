<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rka extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('type') !== 'maker')
        {
            $this->session->set_flashdata('warn', 'Anda tidak Mempunyai Akses Maker!');
            redirect($_SERVER['HTTP_REFERER']);
            die('Anda Bukan Approval');
        }
        $this->load->model('DBRka');
    }
    
    public function index()
    {
        $data = array(
            'fetch' => $this->DBRka->Akun($this->session->userdata('perusahaan'))
        );
        $this->template->load('template/default', 'rka/rka', $data);
    }
    
    public function susun()
    {
        $data = array(
            'fetch' => $this->DBRka->FetchAkun()
        );
        $this->template->load('template/default', 'rka/edit_rka', $data);
        if ($this->input->post('nominal'))
        {
            $bulan  = $this->input->post('bulan');
            $object = array(
                'akun' => $this->input->post('akun'),
                $bulan => $this->input->post('nominal'),
                'perusahaan' => $this->session->userdata('perusahaan')
            );
            
            $akuncek = $this->DBRka->CekRka($this->input->post('akun'))->row();
            if ($akuncek)
            {
                if ($akuncek->$bulan !== "0")
                {
                    $this->session->set_flashdata('warn', 'RKA sudah pernah di susun');
                    redirect($_SERVER['HTTP_REFERER']);
                }
                else
                {
                    $this->DBRka->SusunUpdate($object);
                    $this->session->set_flashdata('success', 'Data berhasil diupdate');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
            else
            {
                $this->DBRka->Susun($object);
                $this->session->set_flashdata('success', 'Data berhasil di input');
                redirect($_SERVER['HTTP_REFERER']);
            }
            
        }
    }
    
}

/* End of file Rka.php */
/* Location: ./application/controllers/Rka.php */
