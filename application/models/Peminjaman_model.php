<?php
 
class Peminjaman_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get peminjaman by peminjaman_id
     */
    function get_peminjaman($peminjaman_id)
    {
        return $this->db->get_where('peminjaman',array('peminjaman_id'=>$peminjaman_id))->row_array();
    }
        
    /*
     * Get all peminjaman
     */
    function get_all_peminjaman()
    {
        $this->db->select('*');
        $this->db->from('peminjaman');
        $this->db->join('user', 'user.user_id = peminjaman.user_id');
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new peminjaman
     */
    function add_peminjaman($params)
    {
        $this->db->insert('peminjaman',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update peminjaman
     */
    function update_peminjaman($peminjaman_id,$params)
    {
        $this->db->where('peminjaman_id',$peminjaman_id);
        return $this->db->update('peminjaman',$params);
    }
    
    /*
     * function to delete peminjaman
     */
    function delete_peminjaman($peminjaman_id)
    {
        return $this->db->delete('peminjaman',array('peminjaman_id'=>$peminjaman_id));
    }
}