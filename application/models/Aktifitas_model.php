<?php
 
class Aktifitas_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get aktifitas by aktifitas_id
     */
    function get_aktifitas($aktifitas_id)
    {
        return $this->db->get_where('aktifitas',array('aktifitas_id'=>$aktifitas_id))->row_array();
    }
        
    /*
     * Get all aktifitas
     */
    function get_all_aktifitas()
    {
        $this->db->select('user.nama as namauser,aktifitas.aktifitas_id, aktifitas.nama, aktifitas.tanggal_mulai, aktifitas.tanggal_berakhir');
        $this->db->from('aktifitas');
        $this->db->join('user', 'user.user_id = aktifitas.user_id');
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new aktifitas
     */
    function add_aktifitas($params)
    {
        $this->db->insert('aktifitas',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update aktifitas
     */
    function update_aktifitas($aktifitas_id,$params)
    {
        $this->db->where('aktifitas_id',$aktifitas_id);
        return $this->db->update('aktifitas',$params);
    }
    
    /*
     * function to delete aktifitas
     */
    function delete_aktifitas($aktifitas_id)
    {
        return $this->db->delete('aktifitas',array('aktifitas_id'=>$aktifitas_id));
    }
}