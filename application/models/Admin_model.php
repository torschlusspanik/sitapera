<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_model
{

    public function get_data($table)
    {
        return $this->db->get($table);
    }
    public function countJmlPermintaan()
    {

        $query = $this->db->query(
            "SELECT COUNT(id_db_permintaan) as jml_permintaan
                               FROM db_permintaan"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_permintaan;
        } else {
            return 0;
        }
    }

    public function countPermintaanProses()
    {

        $query = $this->db->query(
            "SELECT COUNT(id_db_permintaan) as jml_proses
                               FROM db_permintaan
                               WHERE status_db_permintaan = 2"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_proses;
        } else {
            return 0;
        }
    }
    public function countPermintaanSelesai()
    {

        $query = $this->db->query(
            "SELECT COUNT(id_db_permintaan) as jml_selesai
                               FROM db_permintaan
                               WHERE status_db_permintaan = 5"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_selesai;
        } else {
            return 0;
        }
    }

    public function countUserTakAktif()
    {

        $query = $this->db->query(
            "SELECT COUNT(id_user) as user_tak_aktif
                               FROM user_login
                               WHERE is_active = 0"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->user_tak_aktif;
        } else {
            return 0;
        }
    }

    public function countUserPerbulan()
    {
        $query = $this->db->query(
            "SELECT CONCAT(YEAR(date_created),'/',MONTH(date_created)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan
                FROM user_login
                WHERE CONCAT(YEAR(date_created),'/',MONTH(date_created))=CONCAT(YEAR(NOW()),'/',MONTH(NOW()))
                GROUP BY YEAR(date_created),MONTH(date_created);"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jumlah_bulanan;
        } else {
            return 0;
        }
    }

    public function notifPermintaan()
    {
        $query = $this->db->query(
            "SELECT COUNT(id_db_permintaan) as jml_notif
                               FROM db_permintaan
                               WHERE status_db_permintaan = 1"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_notif;
        } else {
            return 0;
        }
    }
    public function getUserEdit($id_user)
    {
        $query = $this->db->get_where('user_login', ['id_user' => $id_user])->row_array();
        return $query;
    }
       
    public function getPermintaanMasukReport()
    {
        $query = "SELECT *
                  FROM db_permintaan
                  LEFT JOIN kategori
                  ON kategori.id_kategori = db_permintaan.kategori_id
                  LEFT JOIN unit_kerja
                  ON unit_kerja.id_unit = db_permintaan.unit_kerja_id
                  LEFT JOIN sub_kategori
                  ON sub_kategori.id_sub_kategori = db_permintaan.sub_kategori_id
                  ORDER BY tgl_permintaan DESC
                  "
                  ;
        return $this->db->query($query)->result_array();
    }

    public function countJmlPermintaan1($tgl_awal, $tgl_akhir)
    {

        $query = $this->db->query(
            "SELECT COUNT(id_db_permintaan) as jml_permintaan
                               FROM db_permintaan
                               WHERE tgl_permintaan between '$tgl_awal' and '$tgl_akhir'"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_permintaan;
        } else {
            return 0;
        }
    }
    
    public function getPermintaan()
    {
        $query = "SELECT *
                  FROM db_permintaan
                  LEFT JOIN kategori
                  ON kategori.id_kategori = db_permintaan.kategori_id
                  LEFT JOIN unit_kerja
                  ON unit_kerja.id_unit = db_permintaan.unit_kerja_id
                  ORDER BY tgl_permintaan DESC
                  "
                  ;
        return $this->db->query($query)->result_array();
    }
    
    public function getInfoPermintaan($id_db_permintaan)
    {
        $query = "SELECT *
                  FROM db_permintaan
                  LEFT JOIN kategori
                  ON kategori.id_kategori = db_permintaan.kategori_id
                  LEFT JOIN unit_kerja
                  ON unit_kerja.id_unit = db_permintaan.unit_kerja_id
                  LEFT JOIN petugas
                  ON petugas.id_petugas = db_permintaan.petugas_id
                  WHERE db_permintaan.id_db_permintaan = $id_db_permintaan
                  ";
        return $this->db->query($query)->row_array();
    }
    
    public function getPetugas($id_db_permintaan)
    {
            $query ="SELECT *
                     FROM db_permintaan
                     LEFT JOIN petugas
                     ON petugas.id_petugas = db_permintaan.petugas_id
                     WHERE db_permintaan.id_db_permintaan = $id_db_permintaan
                     ";
    }
    public function getFilterPermintaan($tgl_awal, $tgl_akhir,$kategori)
    {
        $query = "SELECT *
                  FROM db_permintaan
                  LEFT JOIN kategori
                  ON kategori.id_kategori = db_permintaan.kategori_id
                  LEFT JOIN unit_kerja
                  ON unit_kerja.id_unit = db_permintaan.unit_kerja_id
                  LEFT JOIN petugas
                  ON petugas.id_petugas = db_permintaan.petugas_id
                  LEFT JOIN sub_kategori
                  ON sub_kategori.id_sub_kategori = db_permintaan.sub_kategori_id
				  WHERE tgl_permintaan between '$tgl_awal' and '$tgl_akhir'  AND kategori_id = '$kategori' OR tgl_permintaan between '$tgl_awal' and '$tgl_akhir' and'$kategori' = 0
			      ";
        return $this->db->query($query)->result_array();
    }
    public function getFilterPermintaan2($tgl_awal, $tgl_akhir)
    {
        $query = "SELECT *
                  FROM db_permintaan
                  LEFT JOIN kategori
                  ON kategori.id_kategori = db_permintaan.kategori_id
                  LEFT JOIN unit_kerja
                  ON unit_kerja.id_unit = db_permintaan.unit_kerja_id
                  LEFT JOIN petugas
                  ON petugas.id_petugas = db_permintaan.petugas_id
                  LEFT JOIN sub_kategori
                  ON sub_kategori.id_sub_kategori = db_permintaan.sub_kategori_id
				  WHERE tgl_permintaan between '$tgl_awal' and '$tgl_akhir'
			      ";
        return $this->db->query($query)->result_array();
    }

}
