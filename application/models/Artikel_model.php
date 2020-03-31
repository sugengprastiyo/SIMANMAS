<?php
 
class Artikel_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get artikel by artikel_id
     */
    function get_artikel($artikel_id)
    {
        return $this->db->get_where('artikel',array('artikel_id'=>$artikel_id))->row_array();
    }
        
    /*
     * Get all artikel
     */
    function get_all_artikel()
    {
        $this->db->select('*');
        $this->db->from('artikel');
        $this->db->join('user', 'user.user_id = artikel.user_id');
        return $this->db->get()->result_array();
    }
        
    /*
     * function to add new artikel
     */
    function add_artikel($params)
    {
        $this->db->insert('artikel',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update artikel
     */
    function update_artikel($artikel_id,$params)
    {
        $this->db->where('artikel_id',$artikel_id);
        return $this->db->update('artikel',$params);
    }
    
    /*
     * function to delete artikel
     */
    function delete_artikel($artikel_id)
    {
        return $this->db->delete('artikel',array('artikel_id'=>$artikel_id));
    }
}