<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
                
        $this->load->library('form_validation');
        $this->load->model('user_model');
    }

// Register user
    public function register()
    {
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->model('user_model');
        $data = array();

        $data['page_title'] = 'Pendaftaran User';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|numeric|min_length[12]',
            array(
                'required'      => 'Isi %s, tidak boleh kosong',
                'min_length'    => 'angka %s belum mencapai limit',
            ));
        $this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE)
		{
            $this->load->view('template/header_login');
            $this->load->view('register', $data);
        } 
        else 
        {
            if ($this->input->post('daftar'))
            {
                $this->user_model->register();
                $this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.');
            }
                redirect('home');
        }
    }

    // Log in user
    public function login()
    {
        $data['page_title'] = 'Log In';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() === FALSE)
        {
            $this->load->view('login', $data);
        } 
        else 
        {
		$this->load->library('session');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $login = $this->user_model->login($username,$password);

        if ($login->num_rows() == 1) {
            foreach ($login->result() as $sess) {
                $sess_data['logged_in4'] = 'LogIn';
                $sess_data['user_id'] = $sess->user_id;
                $sess_data['username'] = $sess->username;
                $sess_data['nama'] = $sess->nama;
                $sess_data['img'] = $sess->img;
                $sess_data['level_id'] = $sess->level_id;
            }
            $this->session->set_userdata('logged_in4',$sess_data);
            if($sess_data['level_id'] == 3){
                        redirect('home_3','refresh');
                    }
                    if($sess_data['level_id'] == 2){
                        redirect('home_2','refresh');
                    }
                    if($sess_data['level_id'] == 1){
                        redirect('admin','refresh');
                    }
        }
        else{
            $this->form_validation->set_message("Login Gagal Username dan Password tidak valid");
            redirect(site_url('user/login'),'refresh');
        }
    }
	}
// Log user out
    public function logout()
    {
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');

        // Set message
        $this->session->set_flashdata('user_loggedout', 'Youre Logout, Thank You! :) ');
        redirect('home');
    }
}