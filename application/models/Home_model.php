<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    function get_all_aktifitas()
    {
        $this->db->select('user.nama as namauser,aktifitas.aktifitas_id, aktifitas.nama, aktifitas.tanggal_mulai, aktifitas.tanggal_berakhir');
        $this->db->from('aktifitas');
        $this->db->join('user', 'user.user_id = aktifitas.user_id');
        $this->db->limit(1);
        $this->db->order_by('aktifitas.aktifitas_id', 'DESC');
        return $this->db->get()->result_array();
    }
    function get_all_artikel()
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('user', 'user.user_id = artikel.user_id');
        $this->db->limit(4);
        $this->db->order_by('artikel.artikel_id', 'DESC');
        return $this->db->get()->result_array();
    }
    function get_all_masjid()
    {
        $this->db->order_by('masjid_id', 'desc');
        return $this->db->get('masjid')->result_array();
    }
    function get_all_dokumentasi()
    {
        $this->db->select('*');
        $this->db->from('dokumentasi');
        $this->db->join('aktifitas', 'aktifitas.aktifitas_id = dokumentasi.aktifitas_id');
        return $this->db->get()->result_array();
    }
}

/* End of file Home_model.php */
