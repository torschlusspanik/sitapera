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
    public function getUnit($user_id)
    {
        $query = "SELECT *
                  FROM db_permintaan JOIN unit_kerja
                  ON db_permintaan.unit_id = unit_kerja.id_unit
                  WHERE db_permintaan.sess_id = '$user_id'
                  ";
        return $this->db->query($query)->result_array();
    }
    public function getInfoDokumen($id_db_dokumen)
    {
        $query = "SELECT *
                  FROM db_dokumen
                  LEFT JOIN dokumen
                  ON dokumen.id_dokumen = db_dokumen.dokumen_id
                  WHERE db_dokumen.id_db_dokumen = $id_db_dokumen
                  ";
        return $this->db->query($query)->row_array();
    }
}
