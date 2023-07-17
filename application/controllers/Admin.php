<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_in();
        is_admin();
        $this->load->helper('rupiah');
        $this->load->helper('tglindo');
        $this->load->helper('tanggal');
        $this->load->helper(array('url', 'download'));
        $this->load->model('Admin_model', 'admin');
    } 
    public function index()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
            $data['title'] = 'Beranda';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['count_diproses'] = $this->admin->countPermintaanProses();
            $data['count_permintaan'] = $this->admin->countJmlPermintaan();
            $data['count_selesai'] = $this->admin->countPermintaanSelesai();
            $data['list_user'] = $this->db->get('user_login')->result_array();
            $data['notif_Permintaan'] = $this->admin->notifPermintaan();
           

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
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
            $this->db->set('nama', $nama);
            $this->db->set('email', $email);
            $this->db->set('hp', $hp);
            $this->db->where('id_user', $id_user);
            $this->db->update('user_login');
            $this->session->set_flashdata('message', 'Update data');
            redirect('admin/index');
        }
    }

    public function ubah_password()
    {
        $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirm Password Baru', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
            $data['title'] = 'Beranda';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['user_perbulan'] = $this->admin->countUserPerbulan();
            $data['count_user'] = $this->admin->countJmlUser();
            $data['user_aktif'] = $this->admin->countUserAktif();
            $data['user_tak_aktif'] = $this->admin->countUserTakAktif();
            $data['list_user'] = $this->db->get('user_login')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if ($current_password == $new_password) {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password lama</div>');
                redirect('admin/index');
            } else {
                $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                $this->db->set('password', $password_hash);
                $this->db->where('username', $this->session->userdata('username'));
                $this->db->update('user_login');
                $this->session->set_flashdata('message', 'Ubah password');
                redirect('admin/index');
            }
        }
    }

    public function man_user()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user_login.username]', array(
            'is_unique' => 'Username sudah ada'
        ));
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', array(
            'matches' => 'Password tidak sama',
            'min_length' => 'password min 3 karakter'
        ));
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
            $data['title'] = 'Administrator';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_user'] = $this->db->get('user_login')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/man_user', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nama' => $this->input->post('nama', true),
                'email' => $this->input->post('email', true),
                'hp' => $this->input->post('hp', true),
                'jk_lgn' => $this->input->post('jk_lgn', true),
                'tanggal_lahir_lgn' => $this->input->post('tanggal_lahir_lgn', true),
                'level' => $this->input->post('level', true),
                'username' => $this->input->post('username', true),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'date_created' => date('Y/m/d'),
                'image' => 'default.jpg',
                'is_active' => 1
            );
            $this->db->insert('user_login', $data);
            $this->session->set_flashdata('message', 'Tambah user');
            redirect('admin/man_user');
        }
    }
    public function edit_user()
    {
        echo json_encode($this->admin->getUserEdit($_POST['id_user']));
    }

    public function proses_edit_user()
    {
        $id_user = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $jk_lgn = $this->input->post('jk_lgn');
        $tanggal_lahir_lgn = $this->input->post('tanggal_lahir_lgn');
        $hp = $this->input->post('hp');
        $level = $this->input->post('level');
        $is_active = $this->input->post('is_active');

        $this->db->set('nama', $nama);
        $this->db->set('email', $email);
        $this->db->set('hp', $hp);
        $this->db->set('jk_lgn', $jk_lgn);
        $this->db->set('tanggal_lahir_lgn', $tanggal_lahir_lgn);
        $this->db->set('level', $level);
        $this->db->set('is_active', $is_active);

        $this->db->where('id_user', $id_user);
        $this->db->update('user_login');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/man_user');
    }
    public function history_permintaan()
    {
        $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
        $data['title'] = 'History Permintaan';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['history'] = $this->admin->getPermintaanMasukReport();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/history_permintaan', $data);
        $this->load->view('templates/footer');
    }
    public function history_permintaan2()
    {
        $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $data['history2'] = $this->admin->getFilterPermintaan2($tgl_awal, $tgl_akhir);
        $data['title'] = 'Periode History ' . format_indo($tgl_awal) . ' - ' . format_indo($tgl_akhir);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/history_permintaan2', $data);
        $this->load->view('templates/footer');
    }

 
    public function print_selesai($id_db_permintaan)
    {
        $this->load->library('Dompdf_gen');

        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['detail'] = $this->admin->getInfoPermintaan($id_db_permintaan);
        $this->load->view('admin/data/print_selesai' , $data);

        $paper_size = 'A4';
        $orientation ='portrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('dokumen1.pdf', array('Attachment' => 0));

    }
    public function print($id_db_permintaan)
    {
        $this->load->library('Dompdf_gen');

        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['detail'] = $this->admin->getInfoPermintaan($id_db_permintaan);
        $this->load->view('admin/data/print' , $data);

        $paper_size = 'A4';
        $orientation ='portrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream('dokumen1.pdf', array('Attachment' => 0));

    }
    
    public function mst_unit()
    {
        $this->form_validation->set_rules('nama_unit', 'Nama unit', 'required|trim|is_unique[unit_kerja.nama_unit]', array(
            'is_unique' => 'Nama unit'
        ));
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
            $data['title'] = 'Manage unit';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['unit_kerja'] = $this->db->get('unit_kerja')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data/mst_unit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nama_unit' => $this->input->post('nama_unit', true),
                'status_unit' => 1
            );
            $this->db->insert('unit_kerja', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('admin/mst_unit');
        }
    }

    public function get_unit()
    {
        $id_unit = $this->input->post('id_unit');
        echo json_encode($this->db->get_where('unit_kerja', ['id_unit' => $id_unit])->row_array());
    }


    public function edit_unit()
    {
        $id_unit = $this->input->post('id_unit');
        $nama_unit = $this->input->post('nama_unit');
        $status_unit = $this->input->post('status_unit');

        $this->db->set('nama_unit', $nama_unit);
        $this->db->set('status_unit', $status_unit);

        $this->db->where('id_unit', $id_unit);
        $this->db->update('unit_kerja');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/mst_unit');
    }
    public function mst_petugas()
    {
        $this->form_validation->set_rules('nama_petugas', 'Nama petugas', 'required|trim|is_unique[petugas.nama_petugas]', array(
            'is_unique' => 'Nama petugas'
        ));
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
            $data['title'] = 'Manage petugas';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['petugas'] = $this->db->get('petugas')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data/mst_petugas', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nama_petugas' => $this->input->post('nama_petugas', true),
                'jk_petugas' => $this->input->post('jk_petugas', true),
                'tgl_lahir_petugas' => $this->input->post('tgl_lahir_petugas', true),
                'status_petugas' => 1
            );
            $this->db->insert('petugas', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('admin/mst_petugas');
        }
    }

    public function get_petugas()
    {
        $id_petugas = $this->input->post('id_petugas');
        echo json_encode($this->db->get_where('petugas', ['id_petugas' => $id_petugas])->row_array());
    }

    public function edit_petugas()
    {
        $id_petugas = $this->input->post('id_petugas');
        $nama_petugas = $this->input->post('nama_petugas');
        $jk_petugas = $this->input->post('jk_petugas');
        $tgl_lahir_petugas = $this->input->post('tgl_lahir_petugas');
        $status_petugas = $this->input->post('status_petugas');

        $this->db->set('nama_petugas', $nama_petugas);
        $this->db->set('jk_petugas', $jk_petugas);
        $this->db->set('tgl_lahir_petugas', $tgl_lahir_petugas);
        $this->db->set('status_petugas', $status_petugas);

        $this->db->where('id_petugas', $id_petugas);
        $this->db->update('petugas');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/mst_petugas');
    }
    public function mst_kategori()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama kategori', 'required|trim|is_unique[kategori.nama_kategori]', array(
            'is_unique' => 'Nama kategori'
        ));
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
            $data['title'] = 'Manage kategori';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['kategori'] = $this->db->get('kategori')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data/mst_kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori', true),
            );
            $this->db->insert('kategori', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('admin/mst_kategori');
        }
    }

    public function get_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        echo json_encode($this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array());
    }

    public function edit_kategori()
    {
        
        $id_kategori = $this->input->post('id_kategori');
        $nama_kategori = $this->input->post('nama_kategori');
        $status_kategori = $this->input->post('status_kategori');

        $this->db->set('nama_kategori', $nama_kategori);

        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/mst_kategori');
    }
    public function del_kategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
        $this->session->set_flashdata('message', 'Hapus user');
        redirect('admin/mst_kategori');
    }
    public function del_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user_login');
        $this->session->set_flashdata('message', 'Hapus user');
        redirect('admin/man_user');
    }
    public function mst_sub_kategori()
    {
        $this->form_validation->set_rules('nama_sub_kategori', 'Nama Sub kategori', 'required|trim|is_unique[sub_kategori.nama_sub_kategori]', array(
            'is_unique' => 'Nama Sub kategori'
        ));
        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
            $data['title'] = 'Manage Sub kategori';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['sub_kategori'] = $this->db->get('sub_kategori')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data/mst_sub_kategori', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nama_sub_kategori' => $this->input->post('nama_sub_kategori', true),
            );
            $this->db->insert('sub_kategori', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('admin/mst_sub_kategori');
        }
    }

    public function get_sub_kategori()
    {
        $id_sub_kategori = $this->input->post('id_sub_kategori');
        echo json_encode($this->db->get_where('sub_kategori', ['id_sub_kategori' => $id_sub_kategori])->row_array());
    }

    public function edit_sub_kategori()
    {
        $id_sub_kategori = $this->input->post('id_sub_kategori');
        $nama_sub_kategori = $this->input->post('nama_sub_kategori');

        $this->db->set('nama_sub_kategori', $nama_sub_kategori);

        $this->db->where('id_sub_kategori', $id_sub_kategori);
        $this->db->update('sub_kategori');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/mst_sub_kategori');
    }
    public function del_sub_kategori($id_sub_kategori)
    {
        $this->db->where('id_sub_kategori', $id_sub_kategori);
        $this->db->delete('sub_kategori');
        $this->session->set_flashdata('message', 'Hapus Sub Kategori');
        redirect('admin/mst_sub_kategori');
    }
    public function del_unit($id_unit)
    {
        $this->db->where('id_unit', $id_unit);
        $this->db->delete('unit_kerja');
        $this->session->set_flashdata('message', 'Hapus Unit');
        redirect('admin/mst_unit');
    }
    public function del_petugas($id_petugas)
    {
        $this->db->where('id_petugas', $id_petugas);
        $this->db->delete('petugas');
        $this->session->set_flashdata('message', 'Hapus petugas');
        redirect('admin/mst_petugas');
    }
    public function penanganan()
    {
        $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
        $data['title'] = 'Penanganan Permintaan';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['penanganan'] = $this->admin->getPermintaan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/penanganan', $data);
        $this->load->view('templates/footer');
    }
    public function dokumen()
    {
        $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
        $data['title'] = 'Proses Dokumen';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['dokumen'] = $this->admin->getDokumen();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/dokumen', $data);
        $this->load->view('templates/footer');
    }
    public function info_permintaan($id_db_permintaan)
    {
        $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
        $data['title'] = 'Detail Penanganan Permintaan';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['detail'] = $this->admin->getInfoPermintaan($id_db_permintaan);
        $data['petugas'] = $this->db->get_where('petugas', ['status_petugas' => 1])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/info_permintaan', $data);
        $this->load->view('templates/footer');
    }
    public function info_history($id_db_permintaan)
    {
        $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
        $data['title'] = 'Detail Penanganan Permintaan';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['detail'] = $this->admin->getInfoPermintaan($id_db_permintaan);
        $data['petugas'] = $this->db->get_where('petugas', ['status_petugas' => 1])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/info_history', $data);
        $this->load->view('templates/footer');
    }
    public function ubah_status_permintaan()
    {
        $id_db_permintaan = $this->input->post('id_db_permintaan');
        $status_db_permintaan = '2';
        $petugas = $this->input->post('petugas_id');

        $this->db->set('petugas_id', $petugas);
        $this->db->set('status_db_permintaan', $status_db_permintaan);

        $this->db->where('id_db_permintaan', $id_db_permintaan);
        $this->db->update('db_permintaan');
        $this->session->set_flashdata('message', 'Simpan Perubahan');
        redirect('admin/info_permintaan/' . $id_db_permintaan);
    }
    
    public function ubah_proses($id_db_permintaan)
    {

        $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required|trim');
        if ($this->form_validation->run() == FALSE) {

            $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
            $data['title'] = 'Proses Permintaan';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['detail'] = $this->admin->getInfoPermintaan($id_db_permintaan);
            
            
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data/info_permintaan', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/signature_iprs/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']      = 2024;
            $this->load->library('upload', $config);
            $this->upload->do_upload('signature_iprs');
            $signature_iprs = $this->upload->data('file_name');

            $data = [
                'tgl_mulai' => $this->input->post('tgl_mulai', true),
                'jam_mulai' => $this->input->post('jam_mulai', true),
                'signature_iprs' => $signature_iprs,
                'petugas_id' => $this->input->post('petugas_id', true),
                'status_db_permintaan' => 2
            ];

            $this->db->where('id_db_permintaan', $id_db_permintaan);
            $this->db->update('db_permintaan', $data);


            $this->session->set_flashdata('message', 'Simpan Perubahan');
            redirect('admin/info_permintaan/' . $id_db_permintaan);
        }
    }
    public function ubah_selesai($id_db_permintaan)
    {
        {

            $this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'required|trim');
            if ($this->form_validation->run() == FALSE) {
    
                $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
                $data['title'] = 'Selesaikan Permintaan';
                $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
                $data['detail'] = $this->admin->getInfoPermintaan($id_db_permintaan);
                
                
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar_admin', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('admin/data/info_permintaan', $data);
                $this->load->view('templates/footer');
            } else {
                $config['upload_path']   = './assets/signature_mengetahui/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = 2024;
                $this->load->library('upload', $config , 'upload_mengetahui');
                $this->upload_mengetahui->do_upload('signature_mengetahui');
                $signature_mengetahui = $this->upload_mengetahui->data('file_name');

                $config['upload_path']   = './assets/signature_iprs/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']      = 2024;
                $this->load->library('upload', $config);
                $this->upload->do_upload('signature_iprs');
                $signature_iprs = $this->upload->data('file_name');

    
                $data = [
                    'tgl_selesai' => $this->input->post('tgl_selesai', true),
                    'jam_selesai' => $this->input->post('jam_selesai', true),
                    'signature_mengetahui' => $signature_mengetahui,
                    'signature_iprs' => $signature_iprs,
                    'petugas_id' => $this->input->post('petugas_id', true),
                    'hasil_kgt' => $this->input->post('hasil_kgt', true),
                    'bhn_hasil' => $this->input->post('bhn_hasil', true),
                    'status_db_permintaan' => 7
                ];
    
                $this->db->where('id_db_permintaan', $id_db_permintaan);
                $this->db->update('db_permintaan', $data);
    
    
                $this->session->set_flashdata('message', 'Simpan Perubahan');
                redirect('admin/info_permintaan/' . $id_db_permintaan);
            }
        }
    }
    public function upload_dokumen1($id_db_dokumen)
    {

        $this->form_validation->set_rules('db_dokumen_id', 'ID Dokumen', 'required|trim|is_unique[upload_dokumen.db_dokumen_id]', array(
            'is_unique' => 'File Sudah Diunggah'
        ));
        if ($this->form_validation->run() == FALSE) {

            $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
            $data['title'] = 'Detail Pengajuan Dokumen';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['detail'] = $this->admin->getInfoDokumen($id_db_dokumen);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data/info_dokumen', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/files/';
            $config['allowed_types'] = 'pdf';
            $config['max_size']      = 2048;
            $this->load->library('upload', $config);
            $this->upload->do_upload('file_dokumen');
            $file = $this->upload->data('file_name');

            $id_db_dokumen = $this->input->post('db_dokumen_id');
            $data = [
                'db_dokumen_id' => $this->input->post('db_dokumen_id', true),
                'tgl_upload' => date('Y/m/d'),
                'no_dokumen_upload' => $this->input->post('no_dokumen_upload', true),
                'file_dokumen' => $file
            ];
            $this->db->insert('upload_dokumen', $data);

            $id_db_dokumen = $this->input->post('db_dokumen_id');
            $status_db_dokumen = 0;

            $this->db->set('status_db_dokumen', $status_db_dokumen);
            $this->db->where('id_db_dokumen', $id_db_dokumen);
            $this->db->update('db_dokumen');

            $this->session->set_flashdata('message', 'Upload File');
            redirect('admin/info_dokumen/' . $id_db_dokumen);
        }
    }
    public function filter_permintaan()
    {
        $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $data['filter'] = $this->admin->getFilterPermintaan($tgl_awal, $tgl_akhir);
        $data['title'] = 'Periode Laporan ' . format_indo($tgl_awal) . ' - ' . format_indo($tgl_akhir);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/filter_permintaan', $data);
        $this->load->view('templates/footer');
    }
    public function filter_utilitas()
    {
        $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $kategori = $this->input->post('kategori_id');
        $data['kategori'] = $this->db->get_where('kategori', ['id_kategori'])->result_array();
        $data['filter'] = $this->admin->getFilterPermintaan($tgl_awal, $tgl_akhir, $kategori);
        $data['title'] = 'Laporan Utilitas Periode ' . format_indo($tgl_awal) . ' - ' . format_indo($tgl_akhir);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/filter_utilitas', $data);
        $this->load->view('templates/footer');
    }
    public function filter_alkes()
    {
        $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $kategori = $this->input->post('kategori_id');
        $data['kategori'] = $this->db->get_where('kategori', ['id_kategori'])->result_array();
        $data['filter'] = $this->admin->getFilterPermintaan($tgl_awal, $tgl_akhir, $kategori);
        $data['title'] = 'Laporan Alat Kesehatan Periode ' . format_indo($tgl_awal) . ' - ' . format_indo($tgl_akhir);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/filter_alkes', $data);
        $this->load->view('templates/footer');
    }
    public function laporan_alkes()
    {
        $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $data['kategori'] = $this->db->get_where('kategori', ['id_kategori'])->result_array();
        $kategori = $this->input->post('kategori_id');
        $data['filter'] = $this->admin->getFilterPermintaan($tgl_awal, $tgl_akhir,$kategori);
        $data['history'] = $this->admin->getPermintaanMasukReport();
        $data['title'] = 'Laporan Alat Kesehatan ' . date('d - M - Y') . '';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/laporan_alkes', $data);
        $this->load->view('templates/footer');
    }
    public function laporan_utilitas()
    {
        $data['judul'] = 'Si TAPERA | Sistem Informasi Permintaan Perbaikan Alat dan Sarana Prasarana';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $data['kategori'] = $this->db->get_where('kategori', ['id_kategori'])->result_array();
        $kategori = $this->input->post('kategori_id');
        $data['history'] = $this->admin->getPermintaanMasukReport();
        $data['filter'] = $this->admin->getFilterPermintaan($tgl_awal, $tgl_akhir, $kategori);
        $data['title'] = 'Laporan Utilitas ' . date('d - M - Y') . '';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/laporan_utilitas', $data);
        $this->load->view('templates/footer');
    }
}
