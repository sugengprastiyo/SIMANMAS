<?php
 
class Masjid_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get masjid by masjid_id
     */
    function get_masjid($masjid_id)
    {
        return $this->db->get_where('masjid',array('masjid_id'=>$masjid_id))->row_array();
    }
        
    /*
     * Get all masjid
     */
    function get_all_masjid()
    {
        $this->db->order_by('masjid_id', 'desc');
        return $this->db->get('masjid')->result_array();
    }
        
    /*
     * function to add new masjid
     */
    function add_masjid($params)
    {
        $this->db->insert('masjid',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update masjid
     */
    function update_masjid($masjid_id,$params)
    {
        $this->db->where('masjid_id',$masjid_id);
        return $this->db->update('masjid',$params);
    }
    
    /*
     * function to delete masjid
     */
    function delete_masjid($masjid_id)
    {
        return $this->db->delete('masjid',array('masjid_id'=>$masjid_id));
    }
}