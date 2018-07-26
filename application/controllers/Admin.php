<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	var $data;
	function __construct() {
		 parent::__construct();
		 $this->load->library('session');
		if($this->session->userdata('logged_in4')){
			$sess_data = $this->session->userdata('logged_in4');
			$this->data = array(
				'user_id' => $sess_data['user_id'],
				'username' => $sess_data['username'],
				'level_id' => $sess_data['level_id'],
				'img' => $sess_data['img'],
				'nama' => $sess_data['nama']
			);
		}else{
			redirect('home','refresh');
		}
	}

// READ
	public function index(){
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
		$data['categories'] = $this->blog_rentcar->get_all_categories();
		$data['member'] = $this->blog_rentcar->hitMember();
		$data['mobil'] = $this->blog_rentcar->hitMobil();
		$data['order'] = $this->blog_rentcar->hitOrder();
		$this->load->view('dashboard', $data);
	}
	}
	public function antar($id_order){
		$this->load->model('blog_rentcar');
		$data = array(
						'status' => "Antar"
					);
		$this->blog_rentcar->edit($id_order,'order',$data,'id_order');
		redirect('admin/tampil_order','refresh');
	}
	public function selesai($id_order){
		$this->load->model('blog_rentcar');
		$data = array(
						'status' => "Selesai"
					);
		$this->blog_rentcar->edit($id_order,'order',$data,'id_order');
		redirect('admin/tampil_order','refresh');
	}
	public function artikel($id){
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
		$data['page_title'] = $this->blog_model->get_category_by_id($id)->cat_mobil;
		$data['all_artikel'] = $this->blog_model->get_artikel_by_category($id);
	}

	public function tampil_admin(){
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
		$data['tampil'] = $this->blog_rentcar->tampil();
		$this->load->view('admin', $data);
	}
	}
	public function tampil_user(){
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 3) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
		$data['tampil_user'] = $this->blog_rentcar->tampil_user();
		$this->load->view('user', $data);
	}
	}
	public function tampil_user2(){
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 2) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
		$data['tampil_user'] = $this->blog_rentcar->tampil_user();
		$this->load->view('user2', $data);
	}
	}
	public function tampil_user1(){
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 3) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
		$data['tampil_user'] = $this->blog_rentcar->tampil_user();
		$this->load->view('user1', $data);
	}
	}
	public function tampil_car(){
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
		$data['tampil_car'] = $this->blog_rentcar->tampil_car();
		$this->load->view('car', $data);
	}
	}
	public function tampil_driver(){
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
		$data['tampil_driver'] = $this->blog_rentcar->tampil_driver();
		$this->load->view('driver', $data);
	}
	}
	public function tampil_order(){
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
		$data['tampil_order'] = $this->blog_rentcar->tampil_order();
		$this->load->view('order', $data);
	}
	}
	public function tampil_kategori(){
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
		$data['tampil_kategori'] = $this->blog_rentcar->tampil_kategori();
		$this->load->view('tampil_kategori', $data);
	}
	}

	// CREAT
	public function tambah_admin(){
		$data = $this->data;
		$id = $data['user_id'];

		$level = $data['level_id'];
		$this->load->model('blog_rentcar');

		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$data = array();
		$this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]|min_length[5]',
		array(
				'required' 		=> 'Harap " %s " di isi agar bisa di simpan',
				'is_unique' 	=> 'Judul ' .$this->input->post('username'). ' sudah ada!'
			));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('no_telp', 'Contact', 'required|numeric|min_length[12]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'angka %s belum mencapai limit',
			));

		if ($this->form_validation->run() == TRUE)
		{
			$enc_password = md5($this->input->post('password'));
			$upload=$this->blog_rentcar->upload();
			if ($this->input->post('simpan'))
			{
				$this->blog_rentcar->insert($upload);
				redirect('admin/tampil_admin');
			}
		}
		else
		{
			$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
			$this->load->view('tambah_admin', $data);
		}
	}
	}

	public function tambah_user()
	{

		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->load->model('blog_rentcar');
		$data = array();

		$this->form_validation->set_rules('input_username', 'Username', 'required|is_unique[login.username]',
		array(
				'required' 		=> 'Harap " %s " di isi agar bisa di simpan',
				'is_unique' 	=> 'Judul ' .$this->input->post('input_username'). ' sudah ada!'
			));
		$this->form_validation->set_rules('input_alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('input_no_telp', 'Contact', 'required|numeric|min_length[12]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'angka %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_email', 'Email', 'required|valid_email');
		
		$this->form_validation->set_rules('input_password', 'Password', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			$upload=$this->blog_rentcar->upload();
			if ($this->input->post('simpan'))
			{
				$this->blog_rentcar->insert_user($upload);
				redirect('admin/tampil_user');
			}
		}
		else
		{
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil

			$this->load->view('tambah_user', $data);
		}
	}
	}

	public function tambah_car(){
		$data = $this->data;
		$id = $data['user_id'];

		$level = $data['level_id'];
		$this->load->model('category_model');
		$this->load->model('blog_rentcar');

		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$data = array();
		$data['categories'] = $this->category_model->get_all_categories();

		$this->form_validation->set_rules('input_no_polisi', 'No polisi', 'required|is_unique[car.no_polisi]|min_length[5]');
		$this->form_validation->set_rules('input_merk', 'Merk', 'required|min_length[5]');
		$this->form_validation->set_rules('input_warna_mobil', 'Warna Mobil', 'required|min_length[3]');
		$this->form_validation->set_rules('input_tahun_mobil', 'Tahun Mobil', 'required|numeric|min_length[4]',
			array(
				'differs' 		=> 'Isi %s, tidak boleh kosong',
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'angka %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_bahan_bakar', 'Bahan Bakar', 'required|min_length[5]');

		if ($this->form_validation->run() == TRUE)
		{
			$upload=$this->blog_rentcar->upload();
			if ($this->input->post('simpan'))
			{
				$this->blog_rentcar->insert_car($upload);
				redirect('admin/tampil_car');
			}
		}
		else
		{
			$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
			$this->load->view('tambah_car', $data);
		}	
	}
	}

	public function tambah_driver(){
		$data = $this->data;
		$id = $data['user_id'];

		$level = $data['level_id'];
		$this->load->model('blog_rentcar');

		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$data = array();

		$this->form_validation->set_rules('input_username', 'Nama', 'required|is_unique[driver.username]|min_length[5]');
		$this->form_validation->set_rules('input_alamat', 'Alamat', 'required|min_length[5]');
		$this->form_validation->set_rules('input_no_telp', 'Contact', 'required|numeric|min_length[12]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'angka %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('input_umur', 'umur', 'required|numeric|min_length[2]',
			array(
				
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'angka %s belum mencapai limit',
			));		
		$this->form_validation->set_rules('input_price', 'Price', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$upload=$this->blog_rentcar->upload();
			if ($this->input->post('simpan'))
			{
				$this->blog_rentcar->insert_driver($upload);
				redirect('admin/tampil_driver');
			}
		}
		else
		{
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil

			$this->load->view('tambah_driver', $data);
		}	
		}	
	}

	// public function tambah_order()
	// {
	// 	$data = $this->data;
	// 	$id = $data['user_id'];
	// 	$level = $data['level_id'];
	// 	if ($level == 2 || $level == 3) {
	// 		redirect('user/login');
	// 	}else{
	// 	$this->load->helper(array('form', 'url'));
	// 	$this->load->library('form_validation');

	// 	$this->load->model('blog_rentcar');
	// 	$data = array();

	// 	if ($this->form_validation->run() == TRUE)
	// 	{
	// 		if ($this->input->post('simpan'))
	// 		{
	// 			$this->blog_rentcar->insert_order();
	// 			redirect('admin/tampil_order');
	// 		}
	// 	}
	// 	else
	// 	{
	// 	$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil

	// 		$this->load->view('tambah_order', $data);
	// 	}
	// }
	// }

	public function tambah_kategori()
	{
		$data = $this->data;
		$id = $data['user_id'];

		$level = $data['level_id'];
		$this->load->model('blog_rentcar');

		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$data = array();

		$this->form_validation->set_rules('cat_mobil', 'Cat', 'required|is_unique[categories.cat_mobil]|min_length[5]',
		array(
				'required' 		=> 'Harap " %s " di isi agar bisa di simpan',
				'is_unique' 	=> 'Judul ' .$this->input->post('cat_mobil'). ' sudah ada!'
			));
		$this->form_validation->set_rules('description', 'Desc', 'required|min_length[5]');

		if ($this->form_validation->run() == TRUE)
		{
			if ($this->input->post('simpan'))
			{
				$this->blog_rentcar->insert_kategori();
				redirect('admin/tampil_kategori');
			}
		}
		else
		{
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil

			$this->load->view('cat_create', $data);
		}
	}
	}

//UPDATE
	public function ubah($id){
		$data = $this->data;
		$id = $data['user_id'];

		$level = $data['level_id'];
		$this->load->model('blog_rentcar');

		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

	    if($this->input->post('simpan'))
		    {
		    	$upload=$this->blog_rentcar->upload();
		    	$this->blog_rentcar->update($upload, $id);
		        redirect('admin/tampil_admin');
		    } 
		    $data['tampil'] = $this->blog_rentcar->view_by($id);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

		$this->form_validation->set_rules('input_username', 'Username', 'required|is_unique[users.username]|min_length[5]',
		array(
				'required' 		=> 'Harap " %s " di isi agar bisa di simpan',
				'is_unique' 	=> 'Username ' .$this->input->post('input_judul'). ' sudah ada!'
			));
		$this->form_validation->set_rules('input_password', 'Password', 'required|min_length[8]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'text %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('input_no_telp', 'No HP', 'required|numeric|min_length[12]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'angka %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_alamat', 'Alamat', 'required|min_length[5]');

		if ($this->form_validation->run() == TRUE)
		{
			if ($this->input->post('simpan'))
			{
				$this->blog_rentcar->update();
				redirect('admin/tampil_admin');
			}
		}
		else
		{
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil

			$this->load->view('ubah_admin', $data);
		}
	}
	}

	public function ubah_user($id)
	{
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 3) {
			redirect('user/login');
		}else{

		$this->load->model('blog_rentcar');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

	    if($this->input->post('simpan'))
		    {
		    	$upload=$this->blog_rentcar->upload();
		    	$this->blog_rentcar->update($upload, $id);
		        redirect('admin/tampil_user');
		    } 
		    $data['tampil'] = $this->blog_rentcar->view_by($id);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

		$this->form_validation->set_rules('input_username', 'Username', 'required|is_unique[login.username]',
		array(
				'required' 		=> 'Harap " %s " di isi agar bisa di simpan',
				'is_unique' 	=> 'Username ' .$this->input->post('input_judul'). ' sudah ada!'
			));
		$this->form_validation->set_rules('input_password', 'Password', 'required|max_length[50]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'text %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('input_no_telp', 'No HP', 'required|numeric|min_length[12]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'angka %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			if ($this->input->post('simpan'))
			{
				$this->blog_rentcar->update();
				redirect('admin/tampil_user');
			}
		}
		else
		{
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil

			$this->load->view('ubah_user', $data);
		}
	}
	 }

	public function ubah_user1($id)
	{
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 3) {
			redirect('user/login');
		}else{

		$this->load->model('blog_rentcar');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

	    if($this->input->post('simpan'))
		    {
		    	$upload=$this->blog_rentcar->upload();
		    	$this->blog_rentcar->update($upload, $id);
		        redirect('admin/tampil_user1');
		    } 
		    $data['tampil'] = $this->blog_rentcar->view_by($id);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

		$this->form_validation->set_rules('input_username', 'Username', 'required|is_unique[login.username]',
		array(
				'required' 		=> 'Harap " %s " di isi agar bisa di simpan',
				'is_unique' 	=> 'Username ' .$this->input->post('input_judul'). ' sudah ada!'
			));
		$this->form_validation->set_rules('input_password', 'Password', 'required|max_length[50]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'text %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('input_no_telp', 'No HP', 'required|numeric|min_length[12]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'angka %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			if ($this->input->post('simpan'))
			{
				$this->blog_rentcar->update();
				redirect('admin/tampil_user1');
			}
		}
		else
		{
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil

			$this->load->view('ubah_user1', $data);
		}
	}
	 }

	 public function ubah_user2($id)
	{
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 2) {
			redirect('user/login');
		}else{

		$this->load->model('blog_rentcar');

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

	    if($this->input->post('simpan'))
		    {
		    	$upload=$this->blog_rentcar->upload();
		    	$this->blog_rentcar->update($upload, $id);
		        redirect('admin/tampil_user2');
		    } 
		    $data['tampil'] = $this->blog_rentcar->view_by($id);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

		$this->form_validation->set_rules('input_username', 'Username', 'required|is_unique[login.username]',
		array(
				'required' 		=> 'Harap " %s " di isi agar bisa di simpan',
				'is_unique' 	=> 'Username ' .$this->input->post('input_judul'). ' sudah ada!'
			));
		$this->form_validation->set_rules('input_password', 'Password', 'required|max_length[50]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'text %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('input_no_telp', 'No HP', 'required|numeric|min_length[12]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'angka %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			if ($this->input->post('simpan'))
			{
				$this->blog_rentcar->update();
				redirect('admin/tampil_user2');
			}
		}
		else
		{
		$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil

			$this->load->view('ubah_user2', $data);
		}
	}
	 }

	public function ubah_car($id)
	{
		$data = $this->data;
		$level = $data['level_id'];

		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{

		$this->load->model('blog_rentcar');
		$this->load->model('category_model');
		$data['categories'] = $this->category_model->get_all_categories();


		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');


	    if($this->input->post('simpan'))
		    {
		    	$upload=$this->blog_rentcar->upload();
		    	$this->blog_rentcar->update_car($upload, $id);
		        redirect('admin/tampil_car');
		    } 
		    $data['tampil'] = $this->blog_rentcar->view_by_car($id);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

		$this->form_validation->set_rules('input_no_polisi', 'No Polisi', 'required|is_unique[car.no_polisi]|min_length[3]',
		array(
				'required' 		=> 'Harap " %s " di isi agar bisa di simpan',
				'is_unique' 	=> 'Username ' .$this->input->post('input_no_polisi'). ' sudah ada!'
			));
		$this->form_validation->set_rules('input_merk', 'Merk', 'required|max_length[50]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'text %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_warna_mobil', 'Warna Mobil', 'required|min_length[3]');
		$this->form_validation->set_rules('input_tahun_mobil', 'Tahun Mobil', 'required|numeric|min_length[4]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'angka %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_bahan_bakar', 'Bahan Bakar', 'required|min_length[5]');
		$this->form_validation->set_rules('input_price', 'Price', 'required|numeric|min_length[6]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'angka %s belum mencapai limit',
			));

		if ($this->form_validation->run() == TRUE)
		{
			echo "SUKSES";
		}
		else
		{
			$id = $data['user_id'];
			$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
			$this->load->view('ubah_car', $data);
		}
	}
	 }

	 public function ubah_driver($id){
	 	$data = $this->data;
		$level = $data['level_id'];

		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

	    if($this->input->post('simpan'))
		    {
		    	$upload=$this->blog_rentcar->upload();
		    	$this->blog_rentcar->update_driver($upload, $id);
		        redirect('admin/tampil_driver');
		    } 
		    $data['tampil'] = $this->blog_rentcar->view_by_driver($id);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

		$this->form_validation->set_rules('input_username', 'Username', 'required|is_unique[driver.username]|min_length[5]',
		array(
				'required' 		=> 'Harap " %s " di isi agar bisa di simpan',
				'is_unique' 	=> 'Username ' .$this->input->post('input_username'). ' sudah ada!'
			));
		$this->form_validation->set_rules('input_alamat', 'Alamat', 'required|min_length[5]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'text %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_no_telp', 'No HP', 'required|numeric|min_length[12]',
			array(
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'angka %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('input_umur', 'Umur', 'required|max_length[2]');
		$this->form_validation->set_rules('input_price', 'Price', 'required|min_length[6]');

		if ($this->form_validation->run() == TRUE)
		{
			echo "SUKSES";
		}
		else
		{
			$id = $data['user_id'];
			$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
			$this->load->view('ubah_driver', $data);
		}
	}
	 }

	//  public function ubah_order($id)
	//  {
	//  	$data = $this->data;
	// 	$id = $data['user_id'];
	// 	$level = $data['level_id'];
	//  	if ($level == 2 || $level == 3) {
	// 		redirect('user/login');
	// 	}else{

	// 	$this->load->model('blog_rentcar');

	//     if($this->input->post('simpan'))
	// 	    {
	// 	    	$this->blog_rentcar->update_order($id);
	// 	        redirect('admin/tampil_order');
	// 	    } 
	// 	    $data['tampil'] = $this->blog_rentcar->view_by_order($id);

	//     $this->load->helper('form');
	//     $this->load->library('form_validation');

	// 	$this->form_validation->set_rules('input_merk', 'Merk', 'required');
	// 	$this->form_validation->set_rules('input_day', 'Day', 'required');
	// 	$this->form_validation->set_rules('input_price', 'Price', 'required');


	// 	if ($this->form_validation->run() == TRUE)
	// 	{
	// 		echo "SUKSES";
	// 	}
	// 	else
	// 	{
	// 	$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil

	// 		$this->load->view('ubah_order', $data);
	// 	}
	// }
	//  }

	 public function ubah_kategori($id){
	 	$data = $this->data;
		$level = $data['level_id'];

		if ($level == 2 || $level == 3) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

	    if($this->input->post('simpan'))
		    {
		    	$this->blog_rentcar->update_kategori($id);
		        redirect('admin/tampil_kategori');
		    } 
		    $data['tampil'] = $this->blog_rentcar->view_by_kategori($id);

	    $this->load->helper('form');
	    $this->load->library('form_validation');

		$this->form_validation->set_rules('cat_mobil', 'Cat', 'required|is_unique[categories.cat_mobil]|min_length[5]',
		array(
				'required' 		=> 'Harap " %s " di isi agar bisa di simpan',
				'is_unique' 	=> 'Username ' .$this->input->post('cat_mobil'). ' sudah ada!'
			));
		$this->form_validation->set_rules('description', 'Desc', 'required|min_length[5]');

		if ($this->form_validation->run() == TRUE)
		{
			echo "SUKSES";
		}
		else
		{
			$id = $data['user_id'];
			$data['profil'] = $this->blog_rentcar->tampil_id($id,'users','user_id'); //untuk gambar profil
			
			$this->load->view('ubah_kategori', $data);
		}
	}
	 }

//DELETE
	public function hapus($id) //ADMIN
	{
		$this->load->model('blog_rentcar');

	    $this->blog_rentcar->delete($id);
	    redirect('admin/tampil_admin');
	}
	public function hapus_user($id) //ADMIN
	{
		$this->load->model('blog_rentcar');

	    $this->blog_rentcar->delete_user($id);
	    redirect('admin/tampil_user');
	}
	public function hapus_car($id) //ADMIN
	{
		$this->load->model('blog_rentcar');

	    $this->blog_rentcar->delete_car($id);
	    redirect('admin/tampil_car');
	}
	public function hapus_driver($id) //ADMIN
	{
		$this->load->model('blog_rentcar');

	    $this->blog_rentcar->delete_driver($id);
	    redirect('admin/tampil_driver');
	}
	public function hapus_order($id) //ADMIN
	{
		$this->load->model('blog_rentcar');

	    $this->blog_rentcar->delete_order($id);
	    redirect('admin/tampil_order');
	}
	public function hapus_kategori($id)
	{
		$this->load->model('blog_rentcar');

	    $this->blog_rentcar->delete_kategori($id);
	    redirect('admin/tampil_kategori');
	}
}
?>