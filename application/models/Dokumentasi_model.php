<?php
 
class Dokumentasi_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get dokumentasi by dokumentasi_id
     */
    function get_dokumentasi($dokumentasi_id)
    {
        return $this->db->get_where('dokumentasi',array('dokumentasi_id'=>$dokumentasi_id))->row_array();
    }
        
    /*
     * Get all dokumentasi
     */
    function get_all_dokumentasi()
    {
        $this->db->select('*');
        $this->db->from('dokumentasi');
        $this->db->join('aktifitas', 'aktifitas.aktifitas_id = dokumentasi.aktifitas_id');
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new dokumentasi
     */
    function add_dokumentasi($params)
    {
        $this->db->insert('dokumentasi',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update dokumentasi
     */
    function update_dokumentasi($dokumentasi_id,$params)
    {
        $this->db->where('dokumentasi_id',$dokumentasi_id);
        return $this->db->update('dokumentasi',$params);
    }
    
    /*
     * function to delete dokumentasi
     */
    function delete_dokumentasi($dokumentasi_id)
    {
        return $this->db->delete('dokumentasi',array('dokumentasi_id'=>$dokumentasi_id));
    }
}