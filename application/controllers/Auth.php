<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
        check_already_login();
		$data['app_name'] = "SIMANMAS";
		$this->load->view('template/header', $data);
		$this->load->view('general/login');
		$this->load->view('template/footer');
    }
    
    public function process(){
        $post = $this->input->post(null, TRUE);
        if(isset($post['login'])){
            $this->load->model('user_model');
            $query = $this->user_model->login($post);
            if($query->num_rows() > 0){
                $row = $query->row();
                $params = array(
                    'userid' => $row->user_id,
                    'type' => $row->type 
                );
                if(($row->type == "admin") || ($row->type == "keuangan")){
                    echo "<script>
                    alert('Selamat, Anda Berhasil Login');
                    window.location='".site_url('admin/dashboard')."';
                    </script>";
                    $this->session->set_userdata($params);
                }elseif($row->type == "user"){
                    echo "<script>
                    alert('Selamat, Login Berhasil');
                    window.location='".site_url('home')."';
                    </script>";
                    $this->session->set_userdata($params);
                }
            }else{
                echo "<script>
                    alert('Login Gagal, username/password salah');
                    window.location='".site_url('auth/login')."';
                </script>";
            }
        }
    }

    public function logout(){
        $params = array('userid','type');
        $this->session->unset_userdata($params);
        redirect('home');
    }

	
}
