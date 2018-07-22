<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_2 extends CI_Controller {

	var $data;
	function __construct() {
		 parent::__construct();
		 $this->load->library('session');
 		// $this->load->model('m_global');
		if($this->session->userdata('logged_in4')){
			$sess_data = $this->session->userdata('logged_in4');
			$this->data = array(
				'user_id' => $sess_data['user_id'],
				'username' => $sess_data['username'],
				'nama' => $sess_data['nama']

			);
			// $this->$data['nama'] = $sess_data['nama'];
			// $this->$data['id'] = $sess_data['id_user'];
		}else{
			redirect('home','refresh');
		}
	}
	public function index()
	{
		$data = $this->data;
		$id = $data['user_id'];
		$this->load->model('blog_rentcar');
		$data['nama'] = $this->blog_rentcar->tampil_id($id,'users','user_id');
		$data['mobil'] = $this->blog_rentcar->tampilan('car','id_mobil');
		$data['driver'] = $this->blog_rentcar->tampilan('driver','id_driver');
		$data['tampil'] = $this->blog_rentcar->tampil_driver();
		$data['tampil_mobil'] = $this->blog_rentcar->tampil_car();

		$this->load->view('home_2',$data);

		$data['blog_rentcar'] = 'blog_rentcar'; 
		
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

	public function pemesanan()
	{
		$data = $this->data;
		$id = $data['user_id'];
		$this->load->model('blog_rentcar');
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
	public function pembayaran()
	{
		$data = $this->data;
		$id = $data['user_id'];
		$this->load->model('blog_rentcar');
		$data['nama'] = $this->blog_rentcar->tampil_id($id,'users','user_id');
		$data['tampil'] = $this->blog_rentcar->tampil_order_bayar($id);
		$this->load->view('notif',$data);
	}
	public function pembayaran_detail($id_order)
	{
		$data = $this->data;
		$id = $data['user_id'];
		$this->load->model('blog_rentcar');
		$data['nama'] = $this->blog_rentcar->tampil_id($id,'users','user_id');
		$data['order'] = $this->blog_rentcar->tampil_id($id_order,'order','id_order');
		$this->load->view('notif_bayar',$data);

	}
	public function pembayaran_doadd()
	{

		$this->load->model('blog_rentcar');
			$foto = "IMG_".time();
			$config['upload_path'] = './upload/kwitansi';
	        $config['allowed_types'] = 'jpg|jpeg|png';
	        $config['max_size']      = '1024';
	        $config['file_name'] = $foto;

	        $this->load->library('upload', $config);
	        $image_data = $this->upload->data();

	        if (! $this->upload->do_upload('foto_bukti')){ // name="upload"
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

	            // kemudian panggil fungsi initialize() sebelum fungsi resize()
	            // kalau tidak, hanya akan menghasilkan 1 file saja
	            $this->image_lib->initialize($config);
	            $this->image_lib->resize();

	            redirect('home_2/pembayaran','refresh');
	        }
	}

	public function tambah_car()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

		$this->load->model('category_model');
		$this->load->model('blog_rentcar');
		
		$data = array();
		$data['categories'] = $this->category_model->get_all_categories();

		$this->form_validation->set_rules('input_no_polisi', 'No polisi', 'required');
		$this->form_validation->set_rules('input_merk', 'Merk', 'required');
		$this->form_validation->set_rules('input_warna_mobil', 'Warna Mobil', 'required');
		$this->form_validation->set_rules('input_tahun_mobil', 'Tahun Mobil', 'required|numeric|min_length[4]',
			array(
				'differs' 		=> 'Isi %s, tidak boleh kosong',
				'required' 		=> 'Isi %s, tidak boleh kosong',
				'min_length' 	=> 'angka %s belum mencapai limit',
			));
		$this->form_validation->set_rules('input_bahan_bakar', 'Bahan Bakar', 'required');

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
			$this->load->view('tambah_car', $data);
		}	
	}
}
?>