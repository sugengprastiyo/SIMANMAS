<?php
 
class Masjid extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Masjid_model');
        check_not_login();
        check_admin();
    } 

    /*
     * Listing of masjid
     */
    function index()
    {
        $data['masjid'] = $this->Masjid_model->get_all_masjid();
        
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/masjid/index', $data);
        $this->load->view('template_admin/footer');
    }

    /*
     * Adding a new masjid
     */
    function add()
    {   
        $cek = $this->db->query('select*from masjid');
        if($cek->num_rows($cek) == 0){
            $this->load->library('form_validation');

            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('alamat','Alamat','required');
            $this->form_validation->set_rules('ketua','Ketua','required');
            $this->form_validation->set_rules('dibangun','Dibangun','required');
            
            if($this->form_validation->run())     
            {   
                $masjid_id = 1;
                $params = array(
                    'masjid_id' => $masjid_id,
                    'nama' => $this->input->post('nama'),
                    'alamat' => $this->input->post('alamat'),
                    'ketua' => $this->input->post('ketua'),
                    'dibangun' => $this->input->post('dibangun'),
                );
                
                $masjid_id = $this->Masjid_model->add_masjid($params);
                redirect('admin/masjid/index');
            }
            else
            {            
                $this->load->view('template_admin/header');
                $this->load->view('template_admin/sidebar');
                $this->load->view('admin/masjid/add');
                $this->load->view('template_admin/footer');
            }
        }else{
            echo "<script>alert('Data Masjid Sudah Ada')</script>";
            echo "<script>window.location='".base_url('admin/masjid')."';</script>";
        }
        
    }  

    /*
     * Editing a masjid
     */
    function edit($masjid_id)
    {   
        // check if the masjid exists before trying to edit it
        $data['masjid'] = $this->Masjid_model->get_masjid($masjid_id);
        
        if(isset($data['masjid']['masjid_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('ketua','Ketua','required');
			$this->form_validation->set_rules('dibangun','Dibangun','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'ketua' => $this->input->post('ketua'),
					'dibangun' => $this->input->post('dibangun'),
                );

                $this->Masjid_model->update_masjid($masjid_id,$params);            
                echo "<script>alert('Data Masjid Berhasil Diganti')</script>";
                echo "<script>window.location='".base_url('admin/masjid/index')."';</script>";
            }
            else
            {
                $this->load->view('template_admin/header');
                $this->load->view('template_admin/sidebar');
                $this->load->view('admin/masjid/edit', $data);
                $this->load->view('template_admin/footer');
            }
        }
        else
            show_error('The masjid you are trying to edit does not exist.');
    } 

    /*
     * Deleting masjid
     */
    function remove($masjid_id)
    {
        $masjid = $this->Masjid_model->get_masjid($masjid_id);

        // check if the masjid exists before trying to delete it
        if(isset($masjid['masjid_id']))
        {
            $this->Masjid_model->delete_masjid($masjid_id);
            echo "<script>alert('Data Masjid Berhasil Dihapus')</script>";
            echo "<script>window.location='".base_url('admin/masjid/index')."';</script>";
        }
        else
            show_error('The masjid you are trying to delete does not exist.');
    }
    
}