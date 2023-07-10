<title>Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana</title>

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
            $data['permintaan_saya'] = $this->user->getPermintaan($user_id);

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
            $data['permintaan_saya'] = $this->user->getDokumen($user_id);

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

        public function del_permintaan($id_db_permintaan)
        {
            $_id = $this->db->get_where('db_permintaan', ['id_db_permintaan' => $id_db_permintaan])->row();
            $query = $this->db->delete('db_permintaan', ['id_db_permintaan' => $id_db_permintaan]);
            $this->session->set_flashdata('message', 'Hapus data');
            redirect('user/permintaan_terkirim');
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