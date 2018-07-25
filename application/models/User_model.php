<?php
class User_model extends CI_Model {

  public function __construct()
  {
    parent::__construct();
  }

  public function upload(){
    $config['upload_path'] = './assets/picture/';
    $config['allowed_types'] = 'jpg|png';
    $config['max_size'] = '2048';
    $config['remove_space'] = TRUE;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('input_gambar')) {
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }
    else
    {
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }

   public function register()
   {
        $this->load->model('blog_rentcar');

	       $enc_password = md5($this->input->post('password'));
          $foto = "IMG_".time();
          $config['upload_path'] = './assets/picture';
          $config['allowed_types'] = 'jpg|jpeg|png';
          $config['max_size']      = '1024';
          $config['file_name'] = $foto;

          $this->load->library('upload', $config);
          $image_data = $this->upload->data();

          if (! $this->upload->do_upload('input_gambar')){
          echo $this->upload->display_errors();
         }else{

              $image_data = $this->upload->data();
              $data['nama']     = $this->input->post("nama");
              $data['gender']    = $this->input->post("gender");
              $data['kodepos']       = $this->input->post("kodepos");
              $data['email']  = $this->input->post("email");
              $data['no_telp']  = $this->input->post("no_telp");
              $data['username']  = $this->input->post("username");
              $data['password']      = $enc_password;
              $data['level_id']      = $this->input->post("membership");
              $data['img']      = $image_data['file_name'];
              $this->blog_rentcar->tambah('users',$data);

        }
       // // Array data user
       // $data = array(
       // 	   'user_id' => '',
       //     'nama' => $this->input->post('nama'),
       //     'gender' => $this->input->post('gender'),
       //     'kodepos' => $this->input->post('kodepos'),
       //     'email' => $this->input->post('email'),
       //     'no_telp' => $this->input->post('no_telp'),
       //     'username' => $this->input->post('username'),
       //     'password' => $enc_password,
       //     'register_date' => date('Y-m-d'),
       //     'level_id' => $this->input->post('membership'),
       //     'img' => $upload['file']['file_name']
       // );
       // // Insert users
       // $this->db->insert('users', $data);
   }
   // Proses login user
   public function login($username, $password)
   {
       // Validasi
       // $this->db->where('username', $username);
       // $this->db->where('password', $password);

       // $result = $this->db->get('users');

       // if($result->num_rows() == 1)
       // {
       //     return $result->row(0)->user_id;
       // } 
       // else 
       // {
       //     return false;
       // }
    $data = array(
        'username' => $username,
        'password' => $password
      );
    
    $this->db->where($data);
    return $this->db->get('users');
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