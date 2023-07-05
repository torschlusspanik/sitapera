<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        is_user();
        $this->load->helper('rupiah');
        $this->load->helper('tglindo');
        $this->load->model('user_model', 'user');
        $this->load->helper(array('url', 'download'));
    }

    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Beranda';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $user_id = $this->session->userdata('id_user');
            $data['dokumen_saya'] = $this->user->getDokumen($user_id);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/dist/img/profile';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dist/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $id_user = $this->input->post('id_user');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $hp = $this->input->post('hp');
            $tanggal_lahir_lgn = $this->input->post('tanggal_lahir_lgn');
            $jk_lgn = $this->input->post('jk_lgn');
            $this->db->set('nama', $nama);
            $this->db->set('email', $email);
            $this->db->set('tanggal_lahir_lgn', $tanggal_lahir_lgn);
            $this->db->set('jk_lgn', $jk_lgn);
            $this->db->set('hp', $hp);
            $this->db->where('id_user', $id_user);
            $this->db->update('user_login');
            $this->session->set_flashdata('message', 'Update data');
            redirect('user/index');
        }
    }

    public function ubah_password()
    {
        $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirm Password Baru', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Beranda';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $user_id = $this->session->userdata('id_user');
            $data['dokumen_saya'] = $this->user->getDokumen($user_id);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if ($current_password == $new_password) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama</div>');
                redirect('user/index');
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('username', $this->session->userdata('username'));
                $this->db->update('user_login');
                $this->session->set_flashdata('message', 'Ubah password');
                redirect('user/index');
            }
        }
    }

    public function dokumen()
    {
        $this->form_validation->set_rules('tgl_dokumen', 'Tanggal Dokumen', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Daftar Pending Dokumen ';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_dokumen'] = $this->db->get_where('dokumen', ['status_dokumen' => 1])->result_array();
            $user_id = $this->session->userdata('id_user');
            $data['dokumen_saya'] = $this->user->getDokumen($user_id);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/dokumen/dokumen', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/files/';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']      = 2024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('ktp');
            $ktp = $this->upload->data('file_name');
            $this->upload->do_upload('kk');
            $kk = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran');
            $lampiran = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran2');
            $lampiran2 = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran3');
            $lampiran3 = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran4');
            $lampiran4 = $this->upload->data('file_name');

            $data = array(
                'sess_id' => $this->session->userdata('id_user'),
                'no_dokumen' => $this->input->post('no_dokumen', true),
                'tgl_dokumen' => $this->input->post('tgl_dokumen', true),
                'dokumen_id' => $this->input->post('dokumen_id', true),
                'pembuat' => $this->input->post('pembuat', true),
                'keterangan' => $this->input->post('keterangan', true),
                'nik' => $this->input->post('nik', true),
                'ktp' => $ktp,
                'kk' => $kk,
                'lampiran' => $lampiran,
                'lampiran2' => $lampiran2,
                'lampiran3' => $lampiran3,
                'lampiran4' => $lampiran4,
                'status_db_dokumen' => 1
            );
            $this->db->insert('db_dokumen', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('user/dokumen/dokumen');
        }
    }

        public function dokumen_selesai()
    {
        $this->form_validation->set_rules('tgl_dokumen', 'Tanggal Dokumen', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Daftar Dokumen Selesai ';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_dokumen'] = $this->db->get_where('dokumen', ['status_dokumen' => 1])->result_array();
            $user_id = $this->session->userdata('id_user');
            $data['dokumen_saya'] = $this->user->getDokumen($user_id);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/dokumen/dokumen_selesai', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/files/';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']      = 2024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('ktp');
            $ktp = $this->upload->data('file_name');
            $this->upload->do_upload('kk');
            $kk = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran');
            $lampiran = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran2');
            $lampiran2 = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran3');
            $lampiran3 = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran4');
            $lampiran4 = $this->upload->data('file_name');

            $data = array(
                'sess_id' => $this->session->userdata('id_user'),
                'no_dokumen' => $this->input->post('no_dokumen', true),
                'tgl_dokumen' => $this->input->post('tgl_dokumen', true),
                'dokumen_id' => $this->input->post('dokumen_id', true),
                'pembuat' => $this->input->post('pembuat', true),
                'keterangan' => $this->input->post('keterangan', true),
                'nik' => $this->input->post('nik', true),
                'ktp' => $ktp,
                'kk' => $kk,
                'lampiran' => $lampiran,
                'lampiran2' => $lampiran2,
                'lampiran3' => $lampiran3,
                'lampiran4' => $lampiran4,
                'status_db_dokumen' => 1
            );
            $this->db->insert('db_dokumen', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('user/dokumen');
        }
    }
    public function dokumen_gagal()
    {
        $this->form_validation->set_rules('tgl_dokumen', 'Tanggal Dokumen', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Daftar Dokumen Gagal ';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_dokumen'] = $this->db->get_where('dokumen', ['status_dokumen' => 1])->result_array();
            $user_id = $this->session->userdata('id_user');
            $data['dokumen_saya'] = $this->user->getDokumen($user_id);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/dokumen/dokumen_gagal', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/files/';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']      = 2024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('ktp');
            $ktp = $this->upload->data('file_name');
            $this->upload->do_upload('kk');
            $kk = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran');
            $lampiran = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran2');
            $lampiran2 = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran3');
            $lampiran3 = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran4');
            $lampiran4 = $this->upload->data('file_name');

            $data = array(
                'sess_id' => $this->session->userdata('id_user'),
                'no_dokumen' => $this->input->post('no_dokumen', true),
                'tgl_dokumen' => $this->input->post('tgl_dokumen', true),
                'dokumen_id' => $this->input->post('dokumen_id', true),
                'pembuat' => $this->input->post('pembuat', true),
                'keterangan' => $this->input->post('keterangan', true),
                'nik' => $this->input->post('nik', true),
                'ktp' => $ktp,
                'kk' => $kk,
                'lampiran' => $lampiran,
                'lampiran2' => $lampiran2,
                'lampiran3' => $lampiran3,
                'lampiran4' => $lampiran4,
                'status_db_dokumen' => 1
            );
            $this->db->insert('db_dokumen', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('user/dokumen');
        }
    }

    public function sktm()
    {
        $this->form_validation->set_rules('tgl_dokumen', 'Tanggal Dokumen', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pengajuan Surat Keterangan Tidak Mampu';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['doc'] = $this->db->get_where('dokumen', ['id_dokumen' => 11])->result_array();
            $user_id = $this->session->userdata('id_user');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/data/sktm', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/files/';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']      = 2024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('ktp');
            $ktp = $this->upload->data('file_name');
            $this->upload->do_upload('kk');
            $kk = $this->upload->data('file_name');
            $this->upload->do_upload('pengantar');
            $pengantar = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran2');
            $lampiran2 = $this->upload->data('file_name');

            $data = array(
                'sess_id' => $this->session->userdata('id_user'),
                'no_dokumen' => $this->input->post('no_dokumen', true),
                'tgl_dokumen' => date('Y/m/d'),
                'dokumen_id' => $this->input->post('dokumen_id', true),
                'pembuat' => $this->input->post('pembuat', true),
                'jk' => $this->input->post('jk', true),
                'tmp_lhr' => $this->input->post('tmp_lhr', true),
                'ayah' => $this->input->post('ayah', true),
                'alamat_pembuat' => $this->input->post('alamat_pembuat', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'keterangan' => $this->input->post('keterangan', true),
                'nik' => $this->input->post('nik', true),
                'no_hp' => $this->input->post('no_hp', true),
                'ktp' => $ktp,
                'kk' => $kk,
                'pengantar' => $pengantar,
                'lampiran2' => $lampiran2,
                'status_db_dokumen' => 1
            );
            $this->db->insert('db_dokumen', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('user/sktm');
        }
    }

    public function skusaha()
    {
        $this->form_validation->set_rules('tgl_dokumen', 'Tanggal Dokumen', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pengajuan Surat Keterangan Usaha';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['doc'] = $this->db->get_where('dokumen', ['id_dokumen' => 9])->result_array();
            $user_id = $this->session->userdata('id_user');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/data/skusaha', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/files/';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']      = 2024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('ktp');
            $ktp = $this->upload->data('file_name');
            $this->upload->do_upload('pengantar');
            $pengantar = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran2');
            $lampiran2 = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran3');
            $lampiran3 = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran4');
            $lampiran4 = $this->upload->data('file_name');

            $data = array(
                'sess_id' => $this->session->userdata('id_user'),
                'no_dokumen' => $this->input->post('no_dokumen', true),
                'tgl_dokumen' => date('Y/m/d'),
                'dokumen_id' => $this->input->post('dokumen_id', true),
                'pembuat' => $this->input->post('pembuat', true),
                'nama_usaha' => $this->input->post('nama_usaha', true),
                'alamat_usaha' => $this->input->post('alamat_usaha', true),
                'alamat_pembuat' => $this->input->post('alamat_pembuat', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'tmp_lhr' => $this->input->post('tmp_lhr', true),
                'jk' => $this->input->post('jk', true),
                'keterangan' => $this->input->post('keterangan', true),
                'nik' => $this->input->post('nik', true),
                'no_hp' => $this->input->post('no_hp', true),
                'ktp' => $ktp,
                'pengantar' => $pengantar,
                'lampiran2' => $lampiran2,
                'lampiran3' => $lampiran3,
                'lampiran4' => $lampiran4,
                'status_db_dokumen' => 1
            );
            $this->db->insert('db_dokumen', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('user/skusaha');
        }
    }
    public function dtu()
    {
        $this->form_validation->set_rules('tgl_dokumen', 'Tanggal Dokumen', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pengajuan Surat Domisili Tempat Usaha';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['doc'] = $this->db->get_where('dokumen', ['id_dokumen' => 15])->result_array();
            $user_id = $this->session->userdata('id_user');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/data/dtu', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/files/';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']      = 2024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('ktp');
            $ktp = $this->upload->data('file_name');
            $this->upload->do_upload('kk');
            $kk = $this->upload->data('file_name');
            $this->upload->do_upload('pengantar');
            $pengantar = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran2');
            $lampiran2 = $this->upload->data('file_name');

            $data = array(
                'sess_id' => $this->session->userdata('id_user'),
                'no_dokumen' => $this->input->post('no_dokumen', true),
                'tgl_dokumen' => date('Y/m/d'),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'no_hp'=> $this->input->post('no_hp', true),
                'nik'=> $this->input->post('nik', true),
                'dokumen_id' => $this->input->post('dokumen_id', true),
                'pembuat' => $this->input->post('pembuat', true),
                'keterangan' => $this->input->post('keterangan', true),
                'alamat_pembuat' => $this->input->post('alamat_pembuat', true),
                'nama_usaha' => $this->input->post('nama_usaha', true),
                'alamat_usaha' => $this->input->post('alamat_usaha', true),
                'ktp' => $ktp,
                'kk' => $kk,
                'pengantar' => $pengantar,
                'lampiran2' => $lampiran2,
                'status_db_dokumen' => 1
            );
            $this->db->insert('db_dokumen', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('user/dtu');
        }
    }

    public function skck()
    {
        $this->form_validation->set_rules('tgl_dokumen', 'Tanggal Dokumen', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pengajuan Surat Keterangan Catatan Kepolisian';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['doc'] = $this->db->get_where('dokumen', ['id_dokumen' => 10])->result_array();
            $user_id = $this->session->userdata('id_user');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/data/skck', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/files/';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']      = 2024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('ktp');
            $ktp = $this->upload->data('file_name');
            $this->upload->do_upload('pengantar');
            $pengantar = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran2');
            $lampiran2 = $this->upload->data('file_name');

            $data = array(
                'sess_id' => $this->session->userdata('id_user'),
                'no_dokumen' => $this->input->post('no_dokumen', true),
                'tgl_dokumen' => date('Y/m/d'),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'no_hp'=> $this->input->post('no_hp', true),
                'jk'=> $this->input->post('jk', true),
                'nik'=> $this->input->post('nik', true),
                'dokumen_id' => $this->input->post('dokumen_id', true),
                'pembuat' => $this->input->post('pembuat', true),
                'keterangan' => $this->input->post('keterangan', true),
                'alamat_pembuat' => $this->input->post('alamat_pembuat', true),
                'tmp_lhr' => $this->input->post('tmp_lhr', true),
                'ktp' => $ktp,
                'pengantar' => $pengantar,
                'lampiran2' => $lampiran2,
                'status_db_dokumen' => 1
            );
            $this->db->insert('db_dokumen', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('user/skck');
        }
    }

    public function pindah()
    {
        $this->form_validation->set_rules('tgl_dokumen', 'Tanggal Dokumen', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pengajuan Surat Kepindahan Penduduk';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['doc'] = $this->db->get_where('dokumen', ['id_dokumen' => 12])->result_array();
            $user_id = $this->session->userdata('id_user');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/data/pindah', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/files/';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']      = 2024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('ktp');
            $ktp = $this->upload->data('file_name');
            $this->upload->do_upload('kk');
            $kk = $this->upload->data('file_name');
            $this->upload->do_upload('pengantar');
            $pengantar = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran2');
            $lampiran2 = $this->upload->data('file_name');

            $data = array(
                'sess_id' => $this->session->userdata('id_user'),
                'no_dokumen' => $this->input->post('no_dokumen', true),
                'tgl_dokumen' => date('Y/m/d'),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'no_hp'=> $this->input->post('no_hp', true),
                'jk'=> $this->input->post('jk', true),
                'nik'=> $this->input->post('nik', true),
                'dokumen_id' => $this->input->post('dokumen_id', true),
                'pembuat' => $this->input->post('pembuat', true),
                'keterangan' => $this->input->post('keterangan', true),
                'alamat_pembuat' => $this->input->post('alamat_pembuat', true),
                'alamat_tujuan' => $this->input->post('alamat_tujuan', true),
                'tmp_lhr' => $this->input->post('tmp_lhr', true),
                'ktp' => $ktp,
                'kk' => $kk,
                'pengantar' => $pengantar,
                'lampiran2' => $lampiran2,
                'status_db_dokumen' => 1
            );
            $this->db->insert('db_dokumen', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('user/pindah');
        }
    }

    public function kelahiran()
    {
        $this->form_validation->set_rules('tgl_dokumen', 'Tanggal Dokumen', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pengajuan Surat Kelahiran';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['doc'] = $this->db->get_where('dokumen', ['id_dokumen' => 8])->result_array();
            $user_id = $this->session->userdata('id_user');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/data/kelahiran', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/files/';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']      = 2024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('ktp');
            $ktp = $this->upload->data('file_name');
            $this->upload->do_upload('kk');
            $kk = $this->upload->data('file_name');
            $this->upload->do_upload('pengantar');
            $pengantar = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran2');
            $lampiran2 = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran3');
            $lampiran3 = $this->upload->data('file_name');

            $data = array(
                'sess_id' => $this->session->userdata('id_user'),
                'no_dokumen' => $this->input->post('no_dokumen', true),
                'tgl_dokumen' => date('Y/m/d'),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'ayah'=> $this->input->post('ayah', true),
                'anakke'=> $this->input->post('anakke', true),
                'jk'=> $this->input->post('jk', true),
                'ibu'=> $this->input->post('ibu', true),
                'agama'=> $this->input->post('agama', true),
                'dokumen_id' => $this->input->post('dokumen_id', true),
                'pembuat' => $this->input->post('pembuat', true),
                'keterangan' => $this->input->post('keterangan', true),
                'tmp_lhr' => $this->input->post('tmp_lhr', true),
                'ktp' => $ktp,
                'kk' => $kk,
                'pengantar' => $pengantar,
                'lampiran2' => $lampiran2,
                'lampiran3' => $lampiran3,
                'status_db_dokumen' => 1
            );
            $this->db->insert('db_dokumen', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('user/kelahiran');
        }
    }

    public function kematian()
    {
        $this->form_validation->set_rules('tgl_dokumen', 'Tanggal Dokumen', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pengajuan Surat Kelahiran';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['doc'] = $this->db->get_where('dokumen', ['id_dokumen' => 13])->result_array();
            $user_id = $this->session->userdata('id_user');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/data/kematian', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/files/';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']      = 2024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('ktp');
            $ktp = $this->upload->data('file_name');
            $this->upload->do_upload('kk');
            $kk = $this->upload->data('file_name');
            $this->upload->do_upload('pengantar');
            $pengantar = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran2');
            $lampiran2 = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran3');
            $lampiran3 = $this->upload->data('file_name');

            $data = array(
                'sess_id' => $this->session->userdata('id_user'),
                'no_dokumen' => $this->input->post('no_dokumen', true),
                'tgl_dokumen' => date('Y/m/d'),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'jk'=> $this->input->post('jk', true),
                'nik'=> $this->input->post('nik', true),
                'alamat_pembuat'=> $this->input->post('alamat_pembuat', true),
                'nama_pelapor'=> $this->input->post('nama_pelapor', true),
                'hub'=> $this->input->post('hub', true),
                'tgl_mgl'=> $this->input->post('tgl_mgl', true),
                'nik_pelapor'=> $this->input->post('nik_pelapor', true),
                'dokumen_id' => $this->input->post('dokumen_id', true),
                'pembuat' => $this->input->post('pembuat', true),
                'keterangan' => $this->input->post('keterangan', true),
                'tmp_lhr' => $this->input->post('tmp_lhr', true),
                'ktp' => $ktp,
                'kk' => $kk,
                'pengantar' => $pengantar,
                'lampiran2' => $lampiran2,
                'lampiran3' => $lampiran3,
                'status_db_dokumen' => 1
            );
            $this->db->insert('db_dokumen', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('user/kematian');
        }
    }

    public function du()
    {
        $this->form_validation->set_rules('tgl_dokumen', 'Tanggal Dokumen', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pengajuan Surat Domisili umum';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['doc'] = $this->db->get_where('dokumen', ['id_dokumen' => 14])->result_array();
            $user_id = $this->session->userdata('id_user');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/data/du', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/files/';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']      = 2024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('ktp');
            $ktp = $this->upload->data('file_name');
            $this->upload->do_upload('kk');
            $kk = $this->upload->data('file_name');
            $this->upload->do_upload('pengantar');
            $pengantar = $this->upload->data('file_name');

            $data = array(
                'sess_id' => $this->session->userdata('id_user'),
                'no_dokumen' => $this->input->post('no_dokumen', true),
                'tgl_dokumen' => date('Y/m/d'),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'jk'=> $this->input->post('jk', true),
                'agama'=> $this->input->post('agama', true),
                'dokumen_id' => $this->input->post('dokumen_id', true),
                'pembuat' => $this->input->post('pembuat', true),
                'alamat_pembuat' => $this->input->post('alamat_pembuat', true),
                'nik' => $this->input->post('nik', true),
                'keterangan' => $this->input->post('keterangan', true),
                'tmp_lhr' => $this->input->post('tmp_lhr', true),
                'no_hp' => $this->input->post('no_hp', true),
                'ktp' => $ktp,
                'kk' => $kk,
                'pengantar' => $pengantar,
                'status_db_dokumen' => 1
            );
            $this->db->insert('db_dokumen', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('user/du');
        }
    }

    public function kendaraan()
    {
        $this->form_validation->set_rules('tgl_dokumen', 'Tanggal Dokumen', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pengajuan Surat Kepemilikan Kendaraan';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['doc'] = $this->db->get_where('dokumen', ['id_dokumen' => 16])->result_array();
            $user_id = $this->session->userdata('id_user');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/data/kendaraan', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/files/';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']      = 2024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('ktp');
            $ktp = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran2');
            $lampiran2 = $this->upload->data('file_name');
            $this->upload->do_upload('pengantar');
            $pengantar = $this->upload->data('file_name');

            $data = array(
                'sess_id' => $this->session->userdata('id_user'),
                'no_dokumen' => $this->input->post('no_dokumen', true),
                'tgl_dokumen' => date('Y/m/d'),
                'dokumen_id' => $this->input->post('dokumen_id', true),
                'pembuat' => $this->input->post('pembuat', true),
                'jns' => $this->input->post('jns', true),
                'wrn' => $this->input->post('wrn', true),
                'no_bpkb' => $this->input->post('no_bpkb', true),
                'no_rgk' => $this->input->post('no_rgk', true),
                'no_msn' => $this->input->post('no_msn', true),
                'atn' => $this->input->post('atn', true),
                'alamat_pembuat' => $this->input->post('alamat_pembuat', true),
                'nik' => $this->input->post('nik', true),
                'no_polisi' => $this->input->post('no_polisi', true),
                'tahun' => $this->input->post('tahun', true),
                'keterangan' => $this->input->post('keterangan', true),
                'no_hp' => $this->input->post('no_hp', true),
                'ktp' => $ktp,
                'lampiran2' => $lampiran2,
                'pengantar' => $pengantar,
                'status_db_dokumen' => 1
            );
            $this->db->insert('db_dokumen', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('user/kendaraan');
        }
    }
    public function tanah()
    {
        $this->form_validation->set_rules('tgl_dokumen', 'Tanggal Dokumen', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Pengajuan Surat Kepemilikan Tanah';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['doc'] = $this->db->get_where('dokumen', ['id_dokumen' => 17])->result_array();
            $user_id = $this->session->userdata('id_user');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/data/tanah', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/files/';
            $config['allowed_types'] = 'jpeg|jpg|png|pdf';
            $config['max_size']      = 2024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('ktp');
            $ktp = $this->upload->data('file_name');
            $this->upload->do_upload('lampiran2');
            $lampiran2 = $this->upload->data('file_name');
            $this->upload->do_upload('pengantar');
            $pengantar = $this->upload->data('file_name');

            $data = array(
                'sess_id' => $this->session->userdata('id_user'),
                'no_dokumen' => $this->input->post('no_dokumen', true),
                'tgl_dokumen' => date('Y/m/d'),
                'dokumen_id' => $this->input->post('dokumen_id', true),
                'pembuat' => $this->input->post('pembuat', true),
                'jns' => $this->input->post('jns', true),
                'wrn' => $this->input->post('wrn', true),
                'no_bpkb' => $this->input->post('no_bpkb', true),
                'no_rgk' => $this->input->post('no_rgk', true),
                'no_msn' => $this->input->post('no_msn', true),
                'atn' => $this->input->post('atn', true),
                'nik' => $this->input->post('nik', true),
                'no_polisi' => $this->input->post('no_polisi', true),
                'tahun' => $this->input->post('tahun', true),
                'keterangan' => $this->input->post('keterangan', true),
                'no_hp' => $this->input->post('no_hp', true),
                'ktp' => $ktp,
                'lampiran2' => $lampiran2,
                'pengantar' => $pengantar,
                'status_db_dokumen' => 1
            );
            $this->db->insert('db_dokumen', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('user/tanah');
        }
    }

    public function del_dokumen($id_db_dokumen)
    {
        $_id = $this->db->get_where('db_dokumen', ['id_db_dokumen' => $id_db_dokumen])->row();
        $query = $this->db->delete('db_dokumen', ['id_db_dokumen' => $id_db_dokumen]);
        if ($query) {
            unlink("./assets/files/" . $_id->ktp);
            unlink("./assets/files/" . $_id->kk);
            unlink("./assets/files/" . $_id->lampiran);
            unlink("./assets/files/" . $_id->lampiran2);
            unlink("./assets/files/" . $_id->lampiran3);
            unlink("./assets/files/" . $_id->lampiran4);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('user/dokumen');
    }
    public function detail_permintaan($id_db_permintaan)
    {
        $data['title'] = 'Detail Pengajuan permintaan';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['detail'] = $this->user->getInfoPermintaan($id_db_permintaan);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detail_permintaan', $data);
        $this->load->view('templates/footer');
    }

    public function unduh_dokumen($id_tb_dokumen)
    {
        $data['dokumen'] = $this->db->get_where('upload_dokumen', ['db_dokumen_id' => $id_tb_dokumen])->row_array();
        force_download('./assets/files/' . $data['dokumen']['file_dokumen'], NULL);
    }
    public function permintaan()
    {
        $this->form_validation->set_rules('tgl_permintaan', 'Tanggal Permintaan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Permintaan perbaikan';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['unit'] = $this->db->get_where('unit_kerja', ['status_unit' => 1])->result_array();
            $data['kategori'] = $this->db->get_where('kategori', ['id_kategori'])->result_array();
            $data['sub_kategori'] = $this->db->get_where('sub_kategori', ['id_sub_kategori'])->result_array();
            $user_id = $this->session->userdata('id_user');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/data/permintaan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'sess_id' => $this->session->userdata('id_user'),
                'tgl_permintaan' => date('Y/m/d'),
                'jam_permintaan' => date('h:i:s'),
                'unit_kerja_id' => $this->input->post('unit_kerja_id', true),
                'kategori_id' => $this->input->post('kategori_id', true),
                'sub_kategori_id' => $this->input->post('sub_kategori_id', true),
                'urgas' => $this->input->post('urgas', true),
                'status_db_permintaan' => 1
            );
            $this->db->insert('db_permintaan', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('user/permintaan');
        }
    }
    public function permintaan_terkirim()
    {
        $this->form_validation->set_rules('tgl_permintaan', 'Tanggal Permintaan', 'required|trim');

            $data['title'] = 'Daftar Pending Permintaan ';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_kategori'] = $this->db->get_where('kategori', ['id_kategori'])->result_array();
            $user_id = $this->session->userdata('id_user');
            $data['permintaan_saya'] = $this->user->getPermintaan($user_id);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/permintaan/permintaan_terkirim', $data);
            $this->load->view('templates/footer');
        }
        
    public function permintaan_selesai()
    {
        $this->form_validation->set_rules('tgl_permintaan', 'Tanggal Permintaan', 'required|trim');

       
            $data['title'] = 'Daftar Pending Permintaan ';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_kategori'] = $this->db->get_where('kategori', ['id_kategori'])->result_array();
            $user_id = $this->session->userdata('id_user');
            $data['permintaan_saya'] = $this->user->getPermintaan($user_id);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_user', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/permintaan/permintaan_selesai', $data);
            $this->load->view('templates/footer');
        
    }
}