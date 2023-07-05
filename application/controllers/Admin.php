<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

    public function del_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user_login');
        $this->session->set_flashdata('message', 'Hapus user');
        redirect('admin/man_user');
    }

    public function data_warga()
    {
        $this->form_validation->set_rules('no_nik', 'No NIK', 'required|trim|is_unique[data_warga.no_nik]', array(
            'is_unique' => 'No NIK Sudah Ada'
        ));
        $this->form_validation->set_rules('no_kk', 'No Kartu Keluarga', 'required|trim|is_unique[data_warga.no_kk]', array(
            'is_unique' => 'No Kartu Keluarga Sudah Ada'
        ));

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Data Warga';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['list_warga'] = $this->db->get('data_warga')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data/data_warga', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'tgl_register' => date('Y/m/d'),
                'nama_warga' => $this->input->post('nama_warga', true),
                'tempat_lahir' => $this->input->post('tempat_lahir', true),
                'tgl_lahir' => $this->input->post('tgl_lahir', true),
                'alamat_sekarang' => $this->input->post('alamat_sekarang', true),
                'jml_keluarga' => $this->input->post('jml_keluarga', true),
                'no_nik' => $this->input->post('no_nik', true),
                'no_kk' => $this->input->post('no_kk', true),
                'alamat_asal' => $this->input->post('alamat_asal', true),
                'no_telp' => $this->input->post('no_telp', true),
                'status_nikah' => $this->input->post('status_nikah', true)
            );
            $this->db->insert('data_warga', $data);
            $this->session->set_flashdata('message', 'Tambah warga');
            redirect('admin/data_warga');
        }
    }

    public function get_warga()
    {
        $id_warga = $this->input->post('id_warga');
        echo json_encode($this->db->get_where('data_warga', ['id_warga' => $id_warga])->row_array());
    }

    public function edit_warga()
    {
        $id_warga = $this->input->post('id_warga');
        $nama_warga = $this->input->post('nama_warga');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat_sekarang = $this->input->post('alamat_sekarang');
        $jml_keluarga = $this->input->post('jml_keluarga');
        $no_nik = $this->input->post('no_nik');
        $no_kk = $this->input->post('no_kk');
        $alamat_asal = $this->input->post('alamat_asal');
        $no_telp = $this->input->post('no_telp');
        $status_nikah = $this->input->post('status_nikah');

        $this->db->set('nama_warga', $nama_warga);
        $this->db->set('tempat_lahir', $tempat_lahir);
        $this->db->set('tgl_lahir', $tgl_lahir);
        $this->db->set('alamat_sekarang', $alamat_sekarang);
        $this->db->set('jml_keluarga', $jml_keluarga);
        $this->db->set('no_nik', $no_nik);
        $this->db->set('no_kk', $no_kk);
        $this->db->set('alamat_asal', $alamat_asal);
        $this->db->set('no_telp', $no_telp);
        $this->db->set('status_nikah', $status_nikah);

        $this->db->where('id_warga', $id_warga);
        $this->db->update('data_warga');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/data_warga');
    }

    public function del_warga($id_warga)
    {
        $this->db->where('id_warga', $id_warga);
        $this->db->delete('user_login');
        $this->db->where('kk_id', $id_warga);
        $this->db->delete('data_keluarga');
        $this->session->set_flashdata('message', 'Hapus Data');
        redirect('admin/data_warga');
    }

    public function add_keluarga()
    {
        $data = array(
            'kk_id' => $this->input->post('id_warga', true),
            'nama_keluarga' => $this->input->post('nama_keluarga', true),
            'tmpt_lahir' => $this->input->post('tmpt_lahir', true),
            'tgl_lahir_keluarga' => $this->input->post('tgl_lahir_keluarga', true),
            'alamat' => $this->input->post('alamat', true),
            'telp' => $this->input->post('telp', true),
            'status_hubungan' => $this->input->post('status_hubungan', true)
        );
        $this->db->insert('data_keluarga', $data);
        $this->session->set_flashdata('message', 'Tambah Data');
        redirect('admin/data_warga');
    }

    public function data_keluarga($id_warga)
    {
        $data['title'] = 'Data Keluarga';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['keluarga'] = $this->db->get_where('data_keluarga', ['kk_id' => $id_warga])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/data_keluarga', $data);
        $this->load->view('templates/footer');
    }

    public function get_keluarga()
    {
        $id_keluarga = $this->input->post('id_keluarga');
        echo json_encode($this->db->get_where('data_keluarga', ['id_keluarga' => $id_keluarga])->row_array());
    }

    public function edit_keluarga()
    {
        $id_keluarga = $this->input->post('id_keluarga');
        $nama_keluarga = $this->input->post('nama_keluarga');
        $tmpt_lahir = $this->input->post('tmpt_lahir');
        $tgl_lahir_keluarga = $this->input->post('tgl_lahir_keluarga');
        $alamat = $this->input->post('alamat');
        $telp = $this->input->post('telp');
        $status_hubungan = $this->input->post('status_hubungan');

        $this->db->set('nama_keluarga', $nama_keluarga);
        $this->db->set('tmpt_lahir', $tmpt_lahir);
        $this->db->set('tgl_lahir_keluarga', $tgl_lahir_keluarga);
        $this->db->set('alamat', $alamat);
        $this->db->set('telp', $telp);
        $this->db->set('status_hubungan', $status_hubungan);

        $this->db->where('id_keluarga', $id_keluarga);
        $this->db->update('data_keluarga');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/data_keluarga/' . $id_keluarga);
    }

    public function mst_dokumen()
    {
        $this->form_validation->set_rules('nama_dokumen', 'Nama Dokumen', 'required|trim|is_unique[dokumen.nama_dokumen]', array(
            'is_unique' => 'Nama Dokumen'
        ));
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Manage Dokumen';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['dokumen'] = $this->db->get('dokumen')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/data/mst_dokumen', $data);
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'nama_dokumen' => $this->input->post('nama_dokumen', true),
                'persyaratan' => $this->input->post('persyaratan', true),
                'status_dokumen' => 1
            );
            $this->db->insert('dokumen', $data);
            $this->session->set_flashdata('message', 'Tambah data');
            redirect('admin/mst_dokumen');
        }
    }

    public function get_dokumen()
    {
        $id_dokumen = $this->input->post('id_dokumen');
        echo json_encode($this->db->get_where('dokumen', ['id_dokumen' => $id_dokumen])->row_array());
    }

    public function edit_dokumen()
    {
        $id_dokumen = $this->input->post('id_dokumen');
        $nama_dokumen = $this->input->post('nama_dokumen');
        $status_dokumen = $this->input->post('status_dokumen');

        $this->db->set('nama_dokumen', $nama_dokumen);
        $this->db->set('status_dokumen', $status_dokumen);

        $this->db->where('id_dokumen', $id_dokumen);
        $this->db->update('dokumen');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/mst_dokumen');
    }


    public function dokumen_masuk()
    {
        $data['title'] = 'Dokumen Masuk';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['dokumen'] = $this->admin->getDokumenMasuk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/dokumen_masuk', $data);
        $this->load->view('templates/footer');
    }



    public function info_history($id_db_dokumen)
    {
        $data['title'] = 'Detail Dokumen Selesai';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['detail'] = $this->admin->getInfoDokumen($id_db_dokumen);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/info_history', $data);
        $this->load->view('templates/footer');
    }

    

    public function unduh_ktp($id_db_dokumen)
    {
        $data['dokumen'] = $this->db->get_where('db_dokumen', ['id_db_dokumen' => $id_db_dokumen])->row_array();
        force_download('./assets/files/' . $data['dokumen']['ktp'], NULL);
    }

    public function unduh_pengantar($id_db_dokumen)
    {
        $data['dokumen'] = $this->db->get_where('db_dokumen', ['id_db_dokumen' => $id_db_dokumen])->row_array();
        force_download('./assets/files/' . $data['dokumen']['pengantar'], NULL);
    }

    public function unduh_kk($id_db_dokumen)
    {
        $data['dokumen'] = $this->db->get_where('db_dokumen', ['id_db_dokumen' => $id_db_dokumen])->row_array();
        force_download('./assets/files/' . $data['dokumen']['kk'], NULL);
        
    }
    public function unduh_lampiran2($id_db_dokumen)
    {
        $data['dokumen'] = $this->db->get_where('db_dokumen', ['id_db_dokumen' => $id_db_dokumen])->row_array();
        force_download('./assets/files/' . $data['dokumen']['lampiran2'], NULL);
    }
    public function unduh_lampiran3($id_db_dokumen)
    {
        $data['dokumen'] = $this->db->get_where('db_dokumen', ['id_db_dokumen' => $id_db_dokumen])->row_array();
        force_download('./assets/files/' . $data['dokumen']['lampiran3'], NULL);
    }
    public function unduh_lampiran4($id_db_dokumen)
    {
        $data['dokumen'] = $this->db->get_where('db_dokumen', ['id_db_dokumen' => $id_db_dokumen])->row_array();
        force_download('./assets/files/' . $data['dokumen']['lampiran4'], NULL);
    }

   

    public function upload_dokumen($id_db_dokumen)
    {

        $this->form_validation->set_rules('db_dokumen_id', 'ID Dokumen', 'required|trim|is_unique[upload_dokumen.db_dokumen_id]', array(
            'is_unique' => 'File Sudah Diunggah'
        ));
        if ($this->form_validation->run() == FALSE) {

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

    public function history_dokumen()
    {
        $data['title'] = 'History Permintaan';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['history'] = $this->admin->getPermintaanMasukReport();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/history_permintaan', $data);
        $this->load->view('templates/footer');
    }
    public function history_permintaan()
    {
        $data['title'] = 'History Permintaan';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['history'] = $this->admin->getPermintaanMasukReport();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/history_permintaan', $data);
        $this->load->view('templates/footer');
    }

    public function filter_dokumen()
    {
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $data['dokumen'] = $this->admin->getFilterDokumen($tgl_awal, $tgl_akhir);
        $data['jml_dokumen'] = $this->admin->countJmlDokumen($tgl_awal, $tgl_akhir);
        $data['jml_dtu'] = $this->admin->countDtu($tgl_awal, $tgl_akhir);
        $data['jml_sk'] = $this->admin->countSK($tgl_awal, $tgl_akhir);
        $data['jml_sku'] = $this->admin->countSku($tgl_awal, $tgl_akhir);
        $data['jml_skck'] = $this->admin->countSkck($tgl_awal, $tgl_akhir);
        $data['jml_sktm'] = $this->admin->countSktm($tgl_awal, $tgl_akhir);
        $data['jml_pp'] = $this->admin->countPp($tgl_awal, $tgl_akhir);
        $data['jml_kmt'] = $this->admin->countKmt($tgl_awal, $tgl_akhir);
        $data['jml_du'] = $this->admin->countDu($tgl_awal, $tgl_akhir);
        $data['jml_kpk'] = $this->admin->countKpk($tgl_awal, $tgl_akhir);
        $data['title'] = 'Periode Laporan ' . format_indo($tgl_awal) . ' - ' . format_indo($tgl_akhir);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/filter_dokumen', $data);
        $this->load->view('templates/footer');
    }
    public function profile_desa()
    {
        $this->form_validation->set_rules('id_profile', 'ID Profile', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Profile Desa';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['profile'] = $this->db->get('profile_desa')->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/website/profile_desa', $data);
            $this->load->view('templates/footer');
        } else {
            $id_profile = $this->input->post('id_profile');
            $nama_website = $this->input->post('nama_website');
            $nama_desa = $this->input->post('nama_desa');
            $alamat_desa = $this->input->post('alamat_desa');
            $email_desa = $this->input->post('email_desa');
            $penanggung_jawab = $this->input->post('penanggung_jawab');
            $telp_desa = $this->input->post('telp_desa');
            $map_desa = $this->input->post('map_desa');


            $this->db->set('nama_website', $nama_website);
            $this->db->set('nama_desa', $nama_desa);
            $this->db->set('alamat_desa', $alamat_desa);
            $this->db->set('email_desa', $email_desa);
            $this->db->set('penanggung_jawab', $penanggung_jawab);
            $this->db->set('telp_desa', $telp_desa);
            $this->db->set('map_desa', $map_desa);
            $this->db->where('id_profile', $id_profile);
            $this->db->update('profile_desa');

            $this->session->set_flashdata('message', 'Simpan Perubahan');
            redirect('admin/profile_desa');
        }
    }

    public function perangkat_desa()
    {
        $this->form_validation->set_rules('nama_perangkat', 'Nama Perangkat', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Perangkat Desa';
            $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
            $data['perangkat_desa'] = $this->db->get('perangkat_desa')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/website/perangkat_desa', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']   = './assets/foto/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']      = 2048;
            $this->load->library('upload', $config);
            $this->upload->do_upload('foto');
            $file = $this->upload->data('file_name');
            $data = [
                'nama_perangkat' => $this->input->post('nama_perangkat', true),
                'struktural' => $this->input->post('struktural', true),
                'twitter' => $this->input->post('twitter', true),
                'facebook' => $this->input->post('facebook', true),
                'instagram' => $this->input->post('instagram', true),
                'linkedin' => $this->input->post('linkedin', true),
                'foto' => $file
            ];
            $this->db->insert('perangkat_desa', $data);
            $this->session->set_flashdata('message', 'Tambah Data');
            redirect('admin/perangkat_desa');
        }
    }

    public function del_perangkat($id_perangkat)
    {

        $_id = $this->db->get_where('perangkat_desa', ['id_perangkat' => $id_perangkat])->row();
        $query = $this->db->delete('perangkat_desa', ['id_perangkat' => $id_perangkat]);
        if ($query) {
            unlink("./assets/foto/" . $_id->foto);
        }
        $this->session->set_flashdata('message', 'Hapus data');
        redirect('admin/perangkat_desa');
    }

    public function pesan()
    {
        $data['title'] = 'Pesan Masuk';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['pesan'] = $this->db->get('db_pesan')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/website/pesan', $data);
        $this->load->view('templates/footer');
    }

    public function del_pesan($id_pesan)
    {
        $this->db->where('id_pesan', $id_pesan);
        $this->db->delete('db_pesan');
        $this->session->set_flashdata('message', 'Hapus Data');
        redirect('admin/pesan');
    }
    
    public function print($id_db_dokumen)
    {
        $this->load->library('dompdf_gen');

        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['detail'] = $this->admin->getInfoDokumen($id_db_dokumen);
        $data['kepdes'] = $this->db->get_where('profile_desa', ['penanggung_jawab'])->row_array();
        $tgl_respon = date('Y/m/d');
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
    public function mst_sub_kategori()
    {
        $this->form_validation->set_rules('nama_sub_kategori', 'Nama Sub kategori', 'required|trim|is_unique[sub_kategori.nama_sub_kategori]', array(
            'is_unique' => 'Nama Sub kategori'
        ));
        if ($this->form_validation->run() == FALSE) {
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

        $this->db->set('nama_kategori', $nama_kategori);

        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori');
        $this->session->set_flashdata('message', 'Update data');
        redirect('admin/mst_kategori');
    }
    public function del_sub_kategori($id_sub_kategori)
    {
        $this->db->where('id_sub_kategori', $id_sub_kategori);
        $this->db->delete('sub_kategori');
        $this->session->set_flashdata('message', 'Hapus user');
        redirect('admin/mst_sub_kategori');
    }
    public function penanganan()
    {
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
    public function info_dokumen($id_db_dokumen)
    {
        $data['title'] = 'Detail Pengajuan Dokumen';
        $data['user'] = $this->db->get_where('user_login', ['username' => $this->session->userdata('username')])->row_array();
        $data['detail'] = $this->admin->getInfoDokumen($id_db_dokumen);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/data/info_dokumen', $data);
        $this->load->view('templates/footer');
    }
    public function ubah_status_dokumen()
    {
        $id_db_dokumen = $this->input->post('id_db_dokumen');
        $status_db_dokumen = '2';

        $this->db->set('status_db_dokumen', $status_db_dokumen);

        $this->db->where('id_db_dokumen', $id_db_dokumen);
        $this->db->update('db_dokumen');
        $this->session->set_flashdata('message', 'Simpan Perubahan');
        redirect('admin/info_dokumen/' . $id_db_dokumen);
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
    public function ubah_proses()
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
    public function ubah_selesai()
    {
        $id_db_permintaan = $this->input->post('id_db_permintaan');
        $tgl_selesai = date('Y/m/d');
        $jam_selesai = date('H:i:s');
        $status_db_permintaan = '5';

        $this->db->set('tgl_selesai', $tgl_selesai);
        $this->db->set('jam_selesai', $jam_selesai);
        $this->db->set('status_db_permintaan', $status_db_permintaan);

        $this->db->where('id_db_permintaan', $id_db_permintaan);
        $this->db->update('db_permintaan');
        $this->session->set_flashdata('message', 'Simpan Perubahan');
        redirect('admin/info_permintaan/' . $id_db_permintaan);
    }
    public function upload_dokumen1($id_db_dokumen)
    {

        $this->form_validation->set_rules('db_dokumen_id', 'ID Dokumen', 'required|trim|is_unique[upload_dokumen.db_dokumen_id]', array(
            'is_unique' => 'File Sudah Diunggah'
        ));
        if ($this->form_validation->run() == FALSE) {

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

}
