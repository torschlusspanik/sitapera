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



    public function getDokumenMasuk()
    {
        $query = "SELECT *
                  FROM db_dokumen
                  LEFT JOIN dokumen
                  ON dokumen.id_dokumen = db_dokumen.dokumen_id
                  WHERE db_dokumen.status_db_dokumen = 1
                  ORDER BY id_dokumen DESC
                  ";
        return $this->db->query($query)->result_array();
    }
    
    public function getInfoDokumen($id_db_dokumen)
    {
        $query = "SELECT *
                  FROM db_dokumen
                  LEFT JOIN dokumen
                  ON dokumen.id_dokumen = db_dokumen.dokumen_id
                  LEFT JOIN upload_dokumen
                  ON upload_dokumen.db_dokumen_id = db_dokumen.id_db_dokumen
                  WHERE db_dokumen.id_db_dokumen = $id_db_dokumen
                  ";
        return $this->db->query($query)->row_array();
    }

    public function getDokumenMasukReport()
    {
        $query = "SELECT *
                  FROM db_dokumen
                  LEFT JOIN dokumen
                  ON dokumen.id_dokumen = db_dokumen.dokumen_id
                  LEFT JOIN upload_dokumen
                  ON upload_dokumen.db_dokumen_id = db_dokumen.id_db_dokumen
                  ORDER BY id_dokumen DESC
                  ";
        return $this->db->query($query)->result_array();
    }
    public function getPermintaanMasukReport()
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

    public function getFilterDokumen($tgl_awal, $tgl_akhir)
    {
        $query = "SELECT *
                  FROM db_dokumen
                  LEFT JOIN dokumen
                  ON dokumen.id_dokumen = db_dokumen.dokumen_id
                  LEFT JOIN upload_dokumen
                  ON upload_dokumen.db_dokumen_id = db_dokumen.id_db_dokumen
				  WHERE tgl_dokumen between '$tgl_awal' and '$tgl_akhir'

			      ";
        return $this->db->query($query)->result_array();
    }
    public function countJmlDokumen($tgl_awal, $tgl_akhir)
    {

        $query = $this->db->query(
            "SELECT COUNT(id_db_dokumen) as jml_dokumen
                               FROM db_dokumen
                               WHERE tgl_dokumen between '$tgl_awal' and '$tgl_akhir'"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_dokumen;
        } else {
            return 0;
        }
    }
    public function countDtu($tgl_awal, $tgl_akhir)
    {

        $query = $this->db->query(
            "SELECT COUNT(id_db_dokumen) as jml_dtu
                               FROM db_dokumen
                               WHERE tgl_dokumen between '$tgl_awal' and '$tgl_akhir' and dokumen_id = 15"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_dtu;
        } else {
            return 0;
        }
    }
    public function countSK($tgl_awal, $tgl_akhir)
    {

        $query = $this->db->query(
            "SELECT COUNT(id_db_dokumen) as jml_sk
                               FROM db_dokumen
                               WHERE tgl_dokumen between '$tgl_awal' and '$tgl_akhir' and dokumen_id = 8"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_sk;
        } else {
            return 0;
        }
    }
    public function countSku($tgl_awal, $tgl_akhir)
    {

        $query = $this->db->query(
            "SELECT COUNT(id_db_dokumen) as jml_sku
                               FROM db_dokumen
                               WHERE tgl_dokumen between '$tgl_awal' and '$tgl_akhir' and dokumen_id = 9"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_sku;
        } else {
            return 0;
        }
    }
    public function countSkck($tgl_awal, $tgl_akhir)
    {

        $query = $this->db->query(
            "SELECT COUNT(id_db_dokumen) as jml_skck
                               FROM db_dokumen
                               WHERE tgl_dokumen between '$tgl_awal' and '$tgl_akhir' and dokumen_id = 10"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_skck;
        } else {
            return 0;
        }
    }
    public function countSktm($tgl_awal, $tgl_akhir)
    {

        $query = $this->db->query(
            "SELECT COUNT(id_db_dokumen) as jml_sktm
                               FROM db_dokumen
                               WHERE tgl_dokumen between '$tgl_awal' and '$tgl_akhir' and dokumen_id = 11"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_sktm;
        } else {
            return 0;
        }
    }
    public function countPp($tgl_awal, $tgl_akhir)
    {

        $query = $this->db->query(
            "SELECT COUNT(id_db_dokumen) as jml_pp
                               FROM db_dokumen
                               WHERE tgl_dokumen between '$tgl_awal' and '$tgl_akhir' and dokumen_id = 12"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_pp;
        } else {
            return 0;
        }
    }
    public function countKmt($tgl_awal, $tgl_akhir)
    {

        $query = $this->db->query(
            "SELECT COUNT(id_db_dokumen) as jml_kmt
                               FROM db_dokumen
                               WHERE tgl_dokumen between '$tgl_awal' and '$tgl_akhir' and dokumen_id = 13"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_kmt;
        } else {
            return 0;
        }
    }
    public function countDu($tgl_awal, $tgl_akhir)
    {

        $query = $this->db->query(
            "SELECT COUNT(id_db_dokumen) as jml_du
                               FROM db_dokumen
                               WHERE tgl_dokumen between '$tgl_awal' and '$tgl_akhir' and dokumen_id = 14"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_du;
        } else {
            return 0;
        }
    }
    public function countKpk($tgl_awal, $tgl_akhir)
    {

        $query = $this->db->query(
            "SELECT COUNT(id_db_dokumen) as jml_kpk
                               FROM db_dokumen
                               WHERE dokumen_id = 16"
        );
        if ($query->num_rows() > 0) {
            return $query->row()->jml_kpk;
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
    public function getDokumen()
    {
        $query = "SELECT *
                  FROM db_dokumen
                  LEFT JOIN dokumen
                  ON dokumen.id_dokumen = db_dokumen.dokumen_id
                  ORDER BY id_dokumen DESC
                  ";
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

}
