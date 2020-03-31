<?php
 
class Dokumentasi extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dokumentasi_model');
        check_not_login();
        check_admin();
    } 

    /*
     * Listing of dokumentasi
     */
    function index()
    {
        $data['dokumentasi'] = $this->Dokumentasi_model->get_all_dokumentasi();
        
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/dokumentasi/index', $data);
        $this->load->view('template_admin/footer');
    }

    /*
     * Adding a new dokumentasi
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('aktifitas_id','Aktifitas Id','required');
		
		if($this->form_validation->run())     
        {   
            $masjid_id = 1;
            $gambar = $_FILES['gambar']['name'];
            if($gambar=''){}else{
                $config ['upload_path'] = './assets/upload/dokumentasi';
                $config ['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('gambar')){
                    echo "Gambar Gagal Di-Upload";
                }else{
                    $gambar = $this->upload->data('file_name');
                }
            }

            $params = array(
                'masjid_id' => $masjid_id,
				'aktifitas_id' => $this->input->post('aktifitas_id'),
				'content_images' => $gambar
            );
            
            $dokumentasi_id = $this->Dokumentasi_model->add_dokumentasi($params);
            redirect('admin/dokumentasi/index');
        }
        else
        {
			$this->load->model('Aktifitas_model');
			$data['all_aktifitas'] = $this->Aktifitas_model->get_all_aktifitas();
            
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/dokumentasi/add', $data);
            $this->load->view('template_admin/footer');
        }
    }  

    /*
     * Editing a dokumentasi
     */
    function edit($dokumentasi_id)
    {   
        // check if the dokumentasi exists before trying to edit it
        $data['dokumentasi'] = $this->Dokumentasi_model->get_dokumentasi($dokumentasi_id);
        
        if(isset($data['dokumentasi']['dokumentasi_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('aktifitas_id','Aktifitas Id','required');
			$this->form_validation->set_rules('content_images','Content Images','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'aktifitas_id' => $this->input->post('aktifitas_id'),
					'content_images' => $this->input->post('content_images'),
                );

                $this->Dokumentasi_model->update_dokumentasi($dokumentasi_id,$params);            
                redirect('admin/dokumentasi/index');
            }
            else
            {
				$this->load->model('Aktifitas_model');
				$data['all_aktifitas'] = $this->Aktifitas_model->get_all_aktifitas();

                $this->load->view('template_admin/header');
                $this->load->view('template_admin/sidebar');
                $this->load->view('admin/dokumentasi/edit', $data);
                $this->load->view('template_admin/footer');
            }
        }
        else
            show_error('The dokumentasi you are trying to edit does not exist.');
    } 

    /*
     * Deleting dokumentasi
     */
    function remove($dokumentasi_id)
    {
        $dokumentasi = $this->Dokumentasi_model->get_dokumentasi($dokumentasi_id);

        // check if the dokumentasi exists before trying to delete it
        if(isset($dokumentasi['dokumentasi_id']))
        {
            $this->Dokumentasi_model->delete_dokumentasi($dokumentasi_id);
            redirect('admin/dokumentasi/index');
        }
        else
            show_error('The dokumentasi you are trying to delete does not exist.');
    }
    
}