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

		// $this->load->view("templates/header");
		// Passing data ke view
		//$this->load->view('blogs/blog_view', $data);
		// $this->load->view("templates/footer");
	}

	// public function index()
	// {
		
	// }
	public function home_login() //LOGIN USER
	{
		$this->load->view('home_login2');
	}

}