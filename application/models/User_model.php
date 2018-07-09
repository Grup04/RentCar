<?php
class User_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

   public function register()
   {
	   $enc_password = md5($this->input->post('password'));

       // Array data user
       $data = array(
       	   'user_id' => '',
           'nama' => $this->input->post('nama'),
           'gender' => $this->input->post('gender'),
           'kodepos' => $this->input->post('kodepos'),
           'email' => $this->input->post('email'),
           'no_telp' => $this->input->post('no_telp'),
           'username' => $this->input->post('username'),
           'password' => $enc_password,
           'register_date' => date('Y-m-d'),
           'level_id' => $this->input->post('membership')
       );
       // Insert users
       $this->db->insert('users', $data);
   }
   // Proses login user
   public function login($username, $password)
   {
       // Validasi
       $this->db->where('username', $username);
       $this->db->where('password', $password);

       $result = $this->db->get('users');

       if($result->num_rows() == 1)
       {
           return $result->row(0)->user_id;
       } 
       else 
       {
           return false;
       }
   }

    public function insert_user_level($id_user)
    {
      $data = array(
        'id_user' => $id_user,
        'id_level' => 2
      );
      $this->db->insert('user_level', $data);
    }

    public function get_user($id)
    {
      $this->db->select('level_id');
      $this->db->from('users');
      $this->db->where('user_id', $id);
      return $this->db->get()->result();
    }
}