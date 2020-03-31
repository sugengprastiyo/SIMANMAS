<?php
 
class Aktifitas extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Aktifitas_model');
        check_not_login();
        check_admin();
    } 

    /*
     * Listing of aktifitas
     */
    function index()
    {
        $data['aktifitas'] = $this->Aktifitas_model->get_all_aktifitas();
        
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/aktifitas/index', $data);
        $this->load->view('template_admin/footer');
    }

    /*
     * Adding a new aktifitas
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('tanggal_mulai','Tanggal Mulai','required');
		$this->form_validation->set_rules('tanggal_berakhir','Tanggal Berakhir','required');
		
		if($this->form_validation->run())     
        {   
            $masjid_id = 1;
            $params = array(
                'user_id' => $this->fungsi->user_login()['user_id'],
                'masjid_id' => $masjid_id,
				'nama' => $this->input->post('nama'),
				'tanggal_mulai' => $this->input->post('tanggal_mulai'),
				'tanggal_berakhir' => $this->input->post('tanggal_berakhir'),
            );
            
            $aktifitas_id = $this->Aktifitas_model->add_aktifitas($params);
            redirect('admin/aktifitas/index');
        }
        else
        {            
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/aktifitas/add');
            $this->load->view('template_admin/footer');
        }
    }  

    /*
     * Editing a aktifitas
     */
    function edit($aktifitas_id)
    {   
        // check if the aktifitas exists before trying to edit it
        $data['aktifitas'] = $this->Aktifitas_model->get_aktifitas($aktifitas_id);
        
        if(isset($data['aktifitas']['aktifitas_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('tanggal_mulai','Tanggal Mulai','required');
			$this->form_validation->set_rules('tanggal_berakhir','Tanggal Berakhir','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nama' => $this->input->post('nama'),
					'tanggal_mulai' => $this->input->post('tanggal_mulai'),
					'tanggal_berakhir' => $this->input->post('tanggal_berakhir'),
                );

                $this->Aktifitas_model->update_aktifitas($aktifitas_id,$params);            
                redirect('admin/aktifitas/index');
            }
            else
            {
                $this->load->view('template_admin/header');
                $this->load->view('template_admin/sidebar');
                $this->load->view('admin/aktifitas/edit', $data);
                $this->load->view('template_admin/footer');
            }
        }
        else
            show_error('The aktifitas you are trying to edit does not exist.');
    } 

    /*
     * Deleting aktifitas
     */
    function remove($aktifitas_id)
    {
        $aktifitas = $this->Aktifitas_model->get_aktifitas($aktifitas_id);

        // check if the aktifitas exists before trying to delete it
        if(isset($aktifitas['aktifitas_id']))
        {
            $this->Aktifitas_model->delete_aktifitas($aktifitas_id);
            redirect('admin/aktifitas/index');
        }
        else
            show_error('The aktifitas you are trying to delete does not exist.');
    }
    
}