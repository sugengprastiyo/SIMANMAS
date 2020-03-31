<?php
 
class User extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        check_not_login();
        check_admin();
    } 

    /*
     * Listing of user
     */
    function index()
    {
        $data['user'] = $this->User_model->get_all_user();

        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/user/index', $data);
        $this->load->view('template_admin/footer');
    }

    /*
     * Adding a new user
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('username','Username','is_unique[user.username]|required|min_length[4]');
		$this->form_validation->set_rules('nama','Nama','required');
        $this->form_validation->set_rules('password','Password','required|alpha_numeric');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
		$this->form_validation->set_rules('alamat','Alamat','required');
		$this->form_validation->set_rules('type','Type','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'password' => sha1($this->input->post('password')),
				'username' => $this->input->post('username'),
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'type' => $this->input->post('type'),
            );
            
            $user_id = $this->User_model->add_user($params);
            redirect('admin/user/index');
        }
        else
        {            
            $this->load->view('template_admin/header');
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/user/add');
            $this->load->view('template_admin/footer');
        }
    }  

    /*
     * Editing a user
     */
    function edit($user_id)
    {   
        $this->load->library('form_validation');
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($user_id);
        
        if(isset($data['user']['user_id']))
        {
            // $this->load->library('form_validation');

			$this->form_validation->set_rules('username','Username','required|min_length[4]|callback_username_check');
			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
            $this->form_validation->set_rules('type','Type','required');
            
            if($this->input->post('password')){
                $this->form_validation->set_rules('password', 'Password', 'alpha_numeric');
                $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'matches[password]');
            }
    
            if($this->input->post('confirm_password')){
                $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'matches[password]');
            }

            
			if($this->form_validation->run())     
            {   
                $params=[];
                if(!empty($this->input->post('password'))){
                    $params['password'] = sha1($this->input->post('password'));
                }
                $params += array(
					'username' => $this->input->post('username'),
					'nama' => $this->input->post('nama'),
					'alamat' => $this->input->post('alamat'),
					'type' => $this->input->post('type'),
                );

                $this->User_model->update_user($user_id,$params);            
                redirect('admin/user/index');
            }            
            else
            {
                $this->load->view('template_admin/header');
                $this->load->view('template_admin/sidebar');
                $this->load->view('admin/user/edit', $data);
                $this->load->view('template_admin/footer');
            }
        }
        else
            show_error('The user you are trying to edit does not exist.');
    } 

    /*
     * Deleting user
     */
    function remove($user_id)
    {
        $user = $this->User_model->get_user($user_id);

        if(isset($user['user_id']))
        {
            $this->User_model->delete_user($user_id);
            redirect('admin/user/index');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }

    function username_check(){
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
        if($query->num_rows() > 0){
            $this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silahkan ganti');
            return FALSE;
        }else{
            return TRUE;
        }
    }
    
}