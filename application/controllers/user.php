<?php
class User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
                
        $this->load->library('form_validation');
        //$this->load->helper('MY');
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
        // $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');

		if($this->form_validation->run() === FALSE)
		{
            //$this->load->view('templates/header');
            $this->load->view('register', $data);
        } 
        else 
        {
            if ($this->input->post('daftar'))
            {
                $this->user_model->register();
                $this->session->set_flashdata('user_registered', 'Anda telah teregistrasi.');
                // redirect('home/blog');
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
            // $this->load->view('templates/header');
            $this->load->view('login', $data);
        } 
        else 
        {
        	// Get username
		    $username = $this->input->post('username');
		    // Get & encrypt password
		    $password = md5($this->input->post('password'));
		    // Login user
		    $user_id = $this->user_model->login($username, $password);
			    if($user_id)
			    {
			        // Buat session
                    $level = $this->user_model->get_user($user_id);
			        $user_data = array
			        (
			            'user_id' => $user_id,
			            'username' => $username,
			            'logged_in' => true,
                        'level' => $level[0]->level_id
			        );

			        $this->session->set_userdata($user_data);

			        // Set message
			        $this->session->set_flashdata('user_loggedin', 'You are now logged in');

			        redirect('rentcar/home');
			    } 
			    else 
			    {
			        // Set message
			        $this->session->set_flashdata('login_failed', 'Login is invalid');

			        redirect('login');
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

        // Set message
        $this->session->set_flashdata('user_loggedout', 'Youre Logout, Thank You! :) ');

        redirect('user/login');
    }
}