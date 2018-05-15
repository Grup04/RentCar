<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->model('blog_rentcar');
		$data['tampil'] = $this->blog_rentcar->tampil_driver();
		$data['tampil_mobil'] = $this->blog_rentcar->tampil_car();

		$this->load->view('index',$data);

		$data['blog_rentcar'] = 'blog_rentcar'; 
		
		// Dapatkan data dari model Blog dengan pagination
		// Jumlah artikel per halaman
		$limit_per_page = 6;

		// URI segment untuk mendeteksi "halaman ke berapa" dari URL
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;

		// Dapatkan jumlah data 
		$total_records = $this->blog_rentcar->get_total();
		
		if ($total_records > 0) {
			// Dapatkan data pada halaman yg dituju
			$data["all_artikel"] = $this->blog_rentcar->get_all_artikel($limit_per_page, $start_index);
			
			// Konfigurasi pagination
			$config['base_url'] = base_url() . 'blog/index';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;
			
			$this->pagination->initialize($config);

			// Buat link pagination
			$data["links"] = $this->pagination->create_links();
		}
	}

	public function tambah_order_user()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->load->model('blog_rentcar');
		$data = array();

		$this->form_validation->set_rules('input_username', 'Username', 'required|is_unique[login.username]',
		array(
				'required' 		=> 'Harap " %s " di isi agar bisa di simpan',
				'is_unique' 	=> 'Judul ' .$this->input->post('input_username'). ' sudah ada!'
			));
		// $this->form_validation->set_rules('input_password', 'Password', 'required');
		$this->form_validation->set_rules('input_jenis_mobil', 'Jenis Mobil', 'required');
		// $this->form_validation->set_rules('input_no_telp', 'Contact', 'required|numeric|min_length[12]',
		// 	array(
		// 		'required' 		=> 'Isi %s, tidak boleh kosong',
		// 		'min_length' 	=> 'angka %s belum mencapai limit',
		// 	));
		$this->form_validation->set_rules('input_merk', 'Merk', 'required');
		$this->form_validation->set_rules('input_day', 'Day', 'required');
		$this->form_validation->set_rules('input_price', 'Price', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			if ($this->input->post('simpan'))
			{
				$this->blog_rentcar->insert_order_user();
				redirect('Home');
			}
		}
		else
		{
			$this->load->view('index', $data);
		}
	}
	

	public function home_login() //LOGIN USER
	{
		$this->load->view('home_login2');
	}

}