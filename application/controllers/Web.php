<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('tglindo');
        $this->load->model('Web_model', 'web');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/index');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->db->get_where('user_login', ['username' => $username])->row_array();
            if ($user) {
                if ($user['is_active'] == 1) {
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'id_user' => $user['id_user'],
                            'username' => $user['username'],
                            'nama' => $user['nama'],
                            'level' => $user['level']
                        ];
                        $this->session->set_userdata($data);
                        if ($user['level'] == 'Admin') {
                            redirect('admin');
                        } else {
                            redirect('user');
                        }
                    } else {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password salah</div>');
                        redirect('auth/index');
                    }
                } else {
                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">User Tidak aktif</div>');
                    redirect('auth/index');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Username dan Password tidak sama</div>');
                redirect('auth/index');
            }
        }
    }

    public function input_pesan()
    {
        $data = [
            'tgl_pesan' => date('Y/m/d'),
            'nama_pesan' => $this->input->post('nama_pesan', true),
            'email_pesan' => $this->input->post('email_pesan', true),
            'subyek_pesan' => $this->input->post('subyek_pesan', true),
            'pesan' => $this->input->post('pesan', true)
        ];
        $this->db->insert('tb_pesan', $data);
        $this->session->set_flashdata('message', 'Kirim Pesan');
        redirect('web/index');
    }
}
