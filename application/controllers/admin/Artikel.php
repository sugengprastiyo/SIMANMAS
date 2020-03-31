<?php
 
class Artikel extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Artikel_model');
        check_not_login();
        check_admin();
    } 

    /*
     * Listing of artikel
     */
    function index()
    {
        $data['artikel'] = $this->Artikel_model->get_all_artikel();
        
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/artikel/index', $data);
        $this->load->view('template_admin/footer');
    }

    /*
     * Adding a new artikel
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('content','Content','required');
		
		if($this->form_validation->run())     
        {   
            $masjid_id = 1;
            $thumbnail = $_FILES['thumbnail']['name'];
            if($thumbnail=''){}else{
                $config ['upload_path'] = './assets/upload/thumbnail';
                $config ['allowed_types'] = 'jpg|jpeg|png';

                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('thumbnail')){
                    echo "Thumbnail Gagal Di-Upload";
                }else{
                    $thumbnail = $this->upload->data('file_name');
                }
            }

            $params = array(
                'user_id' => $this->fungsi->user_login()['user_id'],
                'masjid_id' => $masjid_id,
                'title' => $this->input->post('title'),
                'thumbnail' => $thumbnail,
                'content' => $this->input->post('content')
            );
            
            $artikel_id = $this->Artikel_model->add_artikel($params);
            redirect('admin/artikel/index');
        }
        else
        {            
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/artikel/add');
            $this->load->view('template_admin/footer');
        }
    }  

    /*
     * Editing a artikel
     */
    function edit($artikel_id)
    {   
        // check if the artikel exists before trying to edit it
        $data['artikel'] = $this->Artikel_model->get_artikel($artikel_id);
        
        if(isset($data['artikel']['artikel_id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('content','Content','required');
		
			if($this->form_validation->run())     
            {   
                $thumbnail = $_FILES['thumbnail']['name'];
                if($thumbnail){
                    $config ['upload_path'] = './assets/upload/thumbnail';
                    $config ['allowed_types'] = 'jpg|jpeg|png';

                    $this->load->library('upload', $config);
                    
                    if($this->upload->do_upload('thumbnail')){
                        $thumbnail=$this->upload->data('file_name');
                        $this->db->set('thumbnail', $thumbnail);
                    }else{
                        echo $this->upload->display_errors();
                    }
                }
                $params = array(
					'title' => $this->input->post('title'),
					'content' => $this->input->post('content'),
                );

                $this->Artikel_model->update_artikel($artikel_id,$params);            
                redirect('admin/artikel/index');
            }
            else
            {
                $this->load->view('template_admin/header');
                $this->load->view('template_admin/sidebar');
                $this->load->view('admin/artikel/edit', $data);
                $this->load->view('template_admin/footer');
            }
        }
        else
            show_error('The artikel you are trying to edit does not exist.');
    } 

    /*
     * Deleting artikel
     */
    function remove($artikel_id)
    {
        $artikel = $this->Artikel_model->get_artikel($artikel_id);

        // check if the artikel exists before trying to delete it
        if(isset($artikel['artikel_id']))
        {
            $this->Artikel_model->delete_artikel($artikel_id);
            redirect('admin/artikel/index');
        }
        else
            show_error('The artikel you are trying to delete does not exist.');
    }

    public function upload_gambar(){        
        $config ['upload_path'] = './assets/upload';
        $config ['allowed_types'] = 'jpg|jpeg|png';
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('upload')){
            echo json_encode(array('error' => $this->upload->display_errors()));
        }else{
            $function_number = $_GET['CKEditorFuncNum'];
            $file_name = $this->upload->data();
            $url = base_url('assets/upload/') . $file_name['file_name'];
            $message = '';
            // echo json_encode(array('file_name' => $upload_gambar['file_name']));
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
        }
        
    }
    
}