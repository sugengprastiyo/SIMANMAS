<?php
 
class Peminjaman extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        check_not_login();
        check_admin();
    } 

    /*
     * Listing of peminjaman
     */
    function index()
    {
        $data['peminjaman'] = $this->Peminjaman_model->get_all_peminjaman();
        
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/peminjaman/index', $data);
        $this->load->view('template_admin/footer');
    }

    /*
     * Adding a new peminjaman
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('start_date','Start Date','required');
		$this->form_validation->set_rules('end_date','End Date','required');
		$this->form_validation->set_rules('status','Status','required');
		
		if($this->form_validation->run())     
        {   
            $masjid_id = 1;
            $params = array(
                'user_id' => $this->fungsi->user_login()['user_id'],
                'masjid_id' => $masjid_id,
                'start_date' => $this->input->post('start_date'),
                'end_date' => $this->input->post('end_date'),
                'status' => $this->input->post('status'),
            );
            
            $peminjaman_id = $this->Peminjaman_model->add_peminjaman($params);
            redirect('admin/peminjaman/index');
        }
        else
        {            
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/peminjaman/add');
            $this->load->view('template_admin/footer');
        }
    }  

    /*
     * Editing a peminjaman
     */
    function edit($peminjaman_id)
    {   
        // check if the peminjaman exists before trying to edit it
        $data['peminjaman'] = $this->Peminjaman_model->get_peminjaman($peminjaman_id);
        
        if(isset($data['peminjaman']['peminjaman_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('start_date','Start Date','required');
			$this->form_validation->set_rules('end_date','End Date','required');
			$this->form_validation->set_rules('status','Status','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'start_date' => $this->input->post('start_date'),
					'end_date' => $this->input->post('end_date'),
					'status' => $this->input->post('status'),
                );

                $this->Peminjaman_model->update_peminjaman($peminjaman_id,$params);            
                redirect('admin/peminjaman/index');
            }
            else
            {
                $this->load->view('template_admin/header');
                $this->load->view('template_admin/sidebar');
                $this->load->view('admin/peminjaman/edit', $data);
                $this->load->view('template_admin/footer');
            }
        }
        else
            show_error('The peminjaman you are trying to edit does not exist.');
    } 

    /*
     * Deleting peminjaman
     */
    function remove($peminjaman_id)
    {
        $peminjaman = $this->Peminjaman_model->get_peminjaman($peminjaman_id);

        // check if the peminjaman exists before trying to delete it
        if(isset($peminjaman['peminjaman_id']))
        {
            $this->Peminjaman_model->delete_peminjaman($peminjaman_id);
            redirect('admin/peminjaman/index');
        }
        else
            show_error('The peminjaman you are trying to delete does not exist.');
    }
    
}