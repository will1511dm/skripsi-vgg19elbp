<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_dashboard extends CI_Model
{
    public function tambah_data($data, $modul1 = null, $modul2 = null, $modul3 = null, $modul4 = null)
    {
        if (!empty($modul1)) {
            $this->db->insert('tb_modul', $modul1);
        }
        if (!empty($modul2)) {
            $this->db->insert('tb_modul', $modul2);
        }
        if (!empty($modul3)) {
            $this->db->insert('tb_modul', $modul3);
        }
        if (!empty($modul4)) {
            $this->db->insert('tb_modul', $modul4);
        }
        $this->db->insert('tb_company', $data);
        return $this->db->affected_rows();
    }
    public function total_company()
    {
        return $this->db->get('tb_company')->num_rows();
    }
    public function get_all()
    {
        return $this->db->get('tb_pengguna')->result_array();
    }



    public function get_total_all()
    {
        return $this->db->get('tb_pengguna')->num_rows();
    }

    public function get_total_all2($id) {
        $this->db->distinct();
        $this->db->select('nip,nama_pegawai');
        $this->db->from('tb_jawaban');
        $this->db->where(['nm_uji' => $id]);
    
        $query = $this->db->get();
    
        return $query->result_array();
    }
    






    public function get_pengguna10()
    {
        $this->db->order_by('nilai', "desc");
        $this->db->limit(10);
        return $this->db->get('tb_pengguna')->result_array();
    }
    public function get_kabupaten()
    {
        $this->db->group_by('kab');
        return $this->db->get('tb_pengguna')->result_array();
    }

    public function get_kabupaten_id($id)
    {
        return $this->db->get_where('tb_pengguna', ['kab' => $id])->num_rows();
    }
    public function get_bulan($id)
    {
        $this->db->where("DATE_FORMAT(tgl_ujian,'%Y-%m')", $id);
        return $this->db->get('tb_pengguna')->num_rows();
    }
    public function get_modul($kode_cop)
    {
        $this->db->where('cop_kode', $kode_cop);
        $this->db->order_by('nama_modul', "asc");
        return $this->db->get('tb_modul')->result_array();
    }
    public function get_modul_id($kode_cop, $id)
    {
        $this->db->where('nama_modul', $id);
        $this->db->where('cop_kode', $kode_cop);
        $this->db->where('status_modul', 1);
        $this->db->order_by('nama_modul', "asc");
        return $this->db->get('tb_modul')->result_array();
    }
    public function update_status($id, $data)
    {
        $this->db->update('tb_company', ['status_cop' => $data], ['kode_cop' => $id]);

        return $this->db->affected_rows();
    }
    public function total_berita()
    {
        return $this->db->get('tb_berita')->num_rows();
    }
    public function total_projek()
    {
        return $this->db->get('tb_projek')->num_rows();
    }
    public function total_kemitraan()
    {
        return $this->db->get('tb_kemitraan')->num_rows();
    }
    public function total_testimoni()
    {
        return $this->db->get('tb_testimoni')->num_rows();
    }
    public function total_galeri()
    {
        return $this->db->get('tb_galeri')->num_rows();
    }

    public function get_kemitraan()
    {
        return $this->db->get('tb_kemitraan')->result_array();
    }

    public function get_layanan($id)
    {
        $this->db->where('id_layanan', $id);
        $this->db->order_by('id_layanan', 'asc');
        return $this->db->get('tb_layanan')->result_array();
    }
    public function get_produk()
    {
        $this->db->select('foto_produk');
        $this->db->from('tb_produk_foto');
        $this->db->limit(6);
        $this->db->order_by('id_produk_foto', 'desc');
        return $this->db->get()->result_array();
    }
    public function get_layanan_all()
    {
        $this->db->order_by('id_layanan', 'desc');
        return $this->db->get('tb_layanan')->result_array();
    }
    public function get_produk_all()
    {
        $this->db->order_by('id_produk', 'desc');
        return $this->db->get('tb_produk')->result_array();
    }
    public function get_produk_id($id)
    {
        $this->db->where("kategori_id", $id);
        $this->db->order_by('nama_produk', 'desc');
        return $this->db->get('tb_produk')->result_array();
    }
    public function get_testimoni()
    {
        $this->db->limit(6);
        $this->db->order_by('id_testimoni', 'desc');
        return $this->db->get('tb_testimoni')->result_array();
    }
    public function get_testimoni_all()
    {
        $this->db->order_by('id_testimoni', 'desc');
        return $this->db->get('tb_testimoni')->result_array();
    }
    public function get_faq()
    {
        return $this->db->get('tb_faq')->result_array();
    }
    public function get_galeri()
    {
        $this->db->limit(10);
        $this->db->order_by('id_galeri', 'desc');
        return $this->db->get('tb_galeri')->result_array();
    }
    public function get_galeri_all()
    {
        $this->db->order_by('id_galeri', 'desc');
        return $this->db->get('tb_galeri')->result_array();
    }
    public function get_struktur()
    {
        $this->db->order_by('urutan', 'asc');
        return $this->db->get('tb_struktur')->result_array();
    }
    public function get_projek()
    {
        $this->db->order_by('id_projek', 'desc');
        return $this->db->get('tb_projek')->result_array();
    }
    public function get_projek_limit()
    {
        $this->db->limit(3);
        $this->db->order_by('id_projek', 'desc');
        return $this->db->get('tb_projek')->result_array();
    }
    public function get_projek_done($id = null)
    {
        if ($id == "total") {
            $this->db->where('status_projek', 2);
            $this->db->order_by('id_projek', 'desc');
            return $this->db->get('tb_projek')->num_rows();
        } else {
            $this->db->where('status_projek', 2);
            $this->db->order_by('id_projek', 'desc');
            return $this->db->get('tb_projek')->result_array();
        }
    }
    public function get_projek_progress($id = null)
    {
        if ($id == "total") {
            $this->db->where('status_projek', 1);
            $this->db->order_by('id_projek', 'desc');
            return $this->db->get('tb_projek')->num_rows();
        } else {
            $this->db->where('status_projek', 1);
            $this->db->order_by('id_projek', 'desc');
            return $this->db->get('tb_projek')->result_array();
        }
    }
    public function get_berita_kategori($id = null)
    {
        if (!empty($id)) {
            $this->db->where('kategori', $id);
            $this->db->order_by('id_berita', 'desc');
            return $this->db->get('tb_berita')->result_array();
        } else {
            $this->db->order_by('id_berita', 'desc');
            return $this->db->get('tb_berita')->result_array();
        }
    }
    public function get_berita_total($id = null)
    {
        if (!empty($id)) {
            $this->db->where('kategori', $id);
            $this->db->order_by('id_berita', 'desc');
            return $this->db->get('tb_berita')->num_rows();
        } else {
            $this->db->order_by('id_berita', 'desc');
            return $this->db->get('tb_berita')->num_rows();
        }
    }
    public function get_berita($id = null)
    {
        if (!empty($id)) {
            $this->db->where('id_berita', $id);
            $this->db->order_by('id_berita', 'desc');
            return $this->db->get('tb_berita')->result_array();
        } else {
            $this->db->order_by('id_berita', 'desc');
            return $this->db->get('tb_berita')->result_array();
        }
    }
    public function get_berita_limit()
    {
        $this->db->limit(3);
        $this->db->order_by('id_berita', 'desc');
        return $this->db->get('tb_berita')->result_array();
    }
}
