<?php
class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}

	function index(){
		$this->load->view('v_login');
	}

	function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

					$cek_user=$this->login_model->auth_user($username,$password);
					if($cek_user->num_rows() > 0){
							$data=$cek_user->row_array();
        			$this->session->set_userdata('masuk',TRUE);
							$this->session->set_userdata('akses','3');
							$this->session->set_userdata('ses_id',$data['username']);
							$this->session->set_userdata('ses_nama',$data['name']);
							redirect('dashboard');
					}else{  
							$url=base_url();
							echo $this->session->set_flashdata('msg','Username Atau Password Salah');
							redirect($url);
					}
        
    }

    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }

    /*function changePassword($username){
        $data = array(
            'password' => md5($this->input->post('password'))
        );
        $this->login_model->changePassword($username,$data);
    }*/
}

