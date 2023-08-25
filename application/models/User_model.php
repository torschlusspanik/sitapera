<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_model
{
    public function getDokumen($user_id)
    {
        $query = "SELECT *
                  FROM db_dokumen JOIN dokumen
                  ON db_dokumen.dokumen_id = dokumen.id_dokumen
                  WHERE db_dokumen.sess_id = '$user_id'
                  ";
        return $this->db->query($query)->result_array();
    }
    public function getPermintaan($user_id)
    {
        $query = "SELECT *
                  FROM db_permintaan JOIN kategori
                  ON db_permintaan.kategori_id = kategori.id_kategori
                  JOIN sub_kategori
                  ON db_permintaan.sub_kategori_id = sub_kategori.id_sub_kategori
                  LEFT JOIN petugas
                  ON db_permintaan.petugas_id = petugas.id_petugas
                  WHERE db_permintaan.sess_id = '$user_id'
                  ORDER BY id_db_permintaan DESC
                  ";
        return $this->db->query($query)->result_array();
    }
    public function getUnit($user_id)
    {
        $query = "SELECT *
                  FROM db_permintaan JOIN unit_kerja
                  ON db_permintaan.unit_id = unit_kerja.id_unit
                  WHERE db_permintaan.sess_id = '$user_id'
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
                  LEFT JOIN sub_kategori
                  ON sub_kategori.id_sub_kategori = db_permintaan.sub_kategori_id
                  WHERE db_permintaan.id_db_permintaan = $id_db_permintaan
                  ";
        return $this->db->query($query)->row_array();
    }
}
