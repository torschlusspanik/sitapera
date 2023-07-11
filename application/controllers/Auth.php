<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

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


    public function blocked()
    {
        $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
        $data['title'] = 'Access Forbidden';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('auth/blocked', $data);
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('message', 'Logout');
        redirect('auth/index');
    }
}
