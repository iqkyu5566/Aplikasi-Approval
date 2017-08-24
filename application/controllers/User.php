<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array(
            'form',
            'url'
        ));
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            if ($this->session->userdata('type'))
            {
                if ($this->session->userdata('type') == "checker")
                {
                    redirect('checker/index/thisday/', 'refresh');
                }
                elseif ($this->session->userdata('type') == "maker")
                {
                    redirect('maker', 'refresh');
                }
                elseif ($this->session->userdata('type') == "approval")
                {
                    redirect('approval/index/thisday/', 'refresh');
                }
            }
            else
            {
                $this->template->load('template/default', 'user/login');
            }
        }
        else
        {
            $this->proseslogin();
        }
    }
    
    public function proseslogin()
    {
        $this->load->model('DBUser');
        
        $info = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );
        
        if ($this->DBUser->Login($info)->row())
        {
            $user           = $this->DBUser->Login($info)->row();
            $namaperusahaan = $this->DBUser->Perusahaan($user->perusahaan)->row();
            $userinfo       = array(
                'id' => $user->id,
                'nama' => $user->nama,
                'email' => $user->email,
                'namaperusahaan' => $namaperusahaan->nama,
                'perusahaan' => $user->perusahaan,
                'type' => $user->type,
                
                // perusahaan
                'namaperusahaan' => $namaperusahaan->nama,
                'logoperusahaan' => $namaperusahaan->logo
            );
            $this->session->set_userdata($userinfo);
            if ($userinfo['type'] == "checker")
            {
                redirect('checker/index/thisday/', 'refresh');
            }
            elseif ($userinfo['type'] == "maker")
            {
                redirect('maker', 'refresh');
            }
            elseif ($userinfo['type'] == "approval")
            {
                redirect('approval/index/thisday/', 'refresh');
            }
            
        }
        else
        {
            $this->session->set_flashdata('FailLogin', 'Username / Password Salah');
            redirect('user/index', 'refresh');
        }
        
        
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('user', 'refresh');
    }
    
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
?>