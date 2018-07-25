<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_2 extends CI_Controller {

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
				'nama' => $sess_data['nama']
			);
		}else{
			redirect('home','refresh');
		}
	}
	public function index()
	{		
		$data = $this->data;
		$id = $data['user_id'];
		// ini untuk hak akses
		$level = $data['level_id'];
		if ($level == 3) {
			redirect('user/login');
		}else{
			// batas hak akses
		$this->load->model('blog_rentcar');
		$data['nama'] = $this->blog_rentcar->tampil_id($id,'users','user_id');
		$data['mobil'] = $this->blog_rentcar->tampilan('car','id_mobil');
		$data['driver'] = $this->blog_rentcar->tampilan('driver','id_driver');
		$data['tampil'] = $this->blog_rentcar->tampil_driver();
		$data['categories'] = $this->blog_rentcar->get_all_categories();
		$data['tampil_mobil'] = $this->blog_rentcar->tampil_car();

		$this->load->view('home_2',$data);

		$data['blog_rentcar'] = 'blog_rentcar'; 
		
		$limit_per_page = 6;
		$start_index = ( $this->uri->segment(3) ) ? $this->uri->segment(3) : 0;
		$total_records = $this->blog_rentcar->get_total();
		
		if ($total_records > 0) {
			$data["all_artikel"] = $this->blog_rentcar->get_all_artikel($limit_per_page, $start_index);
			$config['base_url'] = base_url() . 'blog/index';
			$config['total_rows'] = $total_records;
			$config['per_page'] = $limit_per_page;
			$config["uri_segment"] = 3;
			
			$this->pagination->initialize($config);
			$data["links"] = $this->pagination->create_links();
		}
	}
	}

	public function pemesanan(){
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 3) {
			redirect('user/login');
		}else{
		
		// 
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$data = array();
		$this->form_validation->set_rules('day', 'Day', 'required|numeric[2]');
		//
		
		$this->load->model('blog_rentcar');
		// batas validasi
		$data = array(
					'user_id' => $id,	
					'id_mobil' => $this->input->post('id_mobil'),	
					'id_driver' => $this->input->post('id_driver'),	
					'day' => $this->input->post('day'),	
					'status' => "Memesan",	
					'date_order' => date('Y-m-d'),	
					);
		$this->blog_rentcar->tambah('order',$data);
		redirect('home_2/pembayaran','refresh');
	}
		
	}
	
	public function pembayaran(){
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 3) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
		$data['nama'] = $this->blog_rentcar->tampil_id($id,'users','user_id');
		$data['tampil'] = $this->blog_rentcar->tampil_order_bayar($id);
		$this->load->view('notif',$data);
	}
	}
	public function pembayaran_detail($id_order){
		
		$data = $this->data;
		$id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 3) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
		$data['nama'] = $this->blog_rentcar->tampil_id($id,'users','user_id');
		$data['order'] = $this->blog_rentcar->tampil_id($id_order,'order','id_order');
		$this->load->view('notif_bayar',$data);
		}
	}
	public function pembayaran_doadd(){
		$level = $data['level_id'];
		if ($level == 3) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
			$foto = "IMG_".time();
			$config['upload_path'] = './upload/kwitansi';
	        $config['allowed_types'] = 'jpg|jpeg|png';
	        $config['max_size']      = '1024';
	        $config['file_name'] = $foto;

	        $this->load->library('upload', $config);
	        $image_data = $this->upload->data();

	        if (! $this->upload->do_upload('foto_bukti')){
				echo $this->upload->display_errors();
		 	}else{

	            $image_data = $this->upload->data();
	            $data['id_order'] 		= $this->input->post("id_order");
		 		$data['foto_bukti'] 		= $image_data['file_name'];
	            $data['tanggal_pembayaran'] 	= date('Y-m-d');

	            $this->blog_rentcar->tambah('pembayaran',$data);
	            $id_order 				= $this->input->post("id_order");
	            $data2['status'] 			= "Terbayar";

            	$this->blog_rentcar->edit($id_order,'order',$data2,'id_order');


	            $config['source_image'] 	= $image_data['full_path'];
	            $config['new_image']      	= './upload/sedang';
	            $config['maintain_ratio'] 	= true;
	            $config['width']          	= 100;
	            $config['height']         	= 180;
	            $this->image_lib->initialize($config);
	            $this->image_lib->resize();

	            redirect('home_2/pembayaran','refresh');
	        }}
	}

	public function penyewaan()
	{
		// $data = $this->data;
		// $id = $data['user_id'];
		$level = $data['level_id'];
		if ($level == 3) {
			redirect('user/login');
		}else{
		$this->load->model('blog_rentcar');
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
	            $data['id_cat'] 		= $this->input->post("id_cat");
	            $data['no_polisi'] 		= $this->input->post("no_polisi");
	            $data['merk'] 			= $this->input->post("merk");
	            $data['warna_mobil'] 	= $this->input->post("warna_mobil");
	            $data['tahun_mobil'] 	= $this->input->post("tahun_mobil");
	            $data['bahan_bakar'] 	= $this->input->post("bahan_bakar");
	            $data['price'] 			= $this->input->post("price");;
		 		$data['img'] 			= $image_data['file_name'];
	            $this->blog_rentcar->tambah('car',$data);

	            $config['source_image'] 	= $image_data['full_path'];
	            $config['new_image']      	= './assets/picture';
	            $config['maintain_ratio'] 	= true;
	            $config['width']          	= 100;
	            $config['height']         	= 180;
	            $this->image_lib->initialize($config);
	            $this->image_lib->resize();

	            redirect('home_2','refresh');
	        }
	    }
	}

}
?>