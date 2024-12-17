<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_data extends CI_Model
{

    public function training()
    {
        return $this->db->get('data_training')->result_array();
    }

    public function validasi()
    {
        return $this->db->get('data_validasi')->result_array();
    }

    public function testing()
    {
        return $this->db->get('data_testing')->result_array();
    }
    
    public function history()
    {
        return $this->db->get('data_history')->result_array();
    }
    public function jenis()
    {
        return $this->db->get('data_jenis')->result_array();
    }
    public function prediksi()
    {
        $this->db->order_by('id_history', 'DESC');  
        $this->db->limit(1);  // Ambil hanya satu baris data paling baru
        return $this->db->get('data_history')->result_array(); // Gunakan row_array untuk mengambil satu baris
    }

}