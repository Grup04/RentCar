<?php
class Blog_rentcar extends CI_Model {

	public function get_all_artikel( $limit = FALSE, $offset = FALSE ) 
	{
        // Jika variable $limit ada pada parameter maka kita limit query-nya
		if ( $limit ) {
			$this->db->limit($limit, $offset);
		}

		$this->db->order_by('categories.date_created', 'DESC');

        // Inner Join dengan table Categories
		$this->db->join('categories', 'categories.id_cat = car.id_cat');

		$query = $this->db->get('car');

    	// Return dalam bentuk object
		return $query->result();
	}
	public function tampil_id($id,$tabel,$primary_key){
		$this->db->where($primary_key, $id);
		return $this->db->get($tabel)->result();
	}
	public function tampilan($tabel,$primary_key){
		$this->db->from($tabel);
		$this->db->order_by($primary_key, 'DESC');
		$query = $this->db->get(); 
		return $query->result();
	}	
	public function tambah($tabel,$data){
		$this->db->insert($tabel,$data);
	}
	public function edit($id,$tabel,$data,$primary_key){
		$this->db->where($primary_key,$id);
		$this->db->update($tabel,$data);
	
	}
	public function tampil_order_bayar($id){
		$query = $this->db->query("	SELECT *, `driver`.username as u FROM `order`,`users`,`car`,`driver`
									WHERE `order`.id_mobil = `car`.id_mobil
									AND `order`.user_id = `users`.user_id
									AND `order`.id_driver = `driver`.id_driver
									AND `order`.user_id = '$id'
									order BY `order`.id_order DESC ");
		return $query->result();
	}
	public function get_total() 
	{
        // Dapatkan jumlah total artikel
		return $this->db->count_all("car");
	}

	public function tampil()
	{
		$this->db->select('*');
		$this->db->where('level_id', 1);
		$query = $this->db->get('users');
		return $query->result();
	}
	public function tampil_user()
	{
		$this->db->select('*');
		$this->db->where('level_id !=', 1);
		$query = $this->db->get('users');
		return $query->result();
	}
	public function tampil_car()
	{
		$this->db->select('*');
		$this->db->from('car');
		$this->db->join('categories', 'car.id_cat = categories.id_cat');
		return $this->db->get()->result();
	}
	public function tampil_driver()
	{
		$this->db->select('*');
		$query = $this->db->get('driver');
		return $query->result();
	}
	public function tampil_order()
	{
		$query = $this->db->query("	SELECT *, `driver`.username as u FROM `order`,`users`,`car`,`driver`
									WHERE `order`.id_mobil = `car`.id_mobil
									AND `order`.user_id = `users`.user_id
									AND `order`.id_driver = `driver`.id_driver
									order BY `order`.id_order DESC ");
		return $query->result();
	}
	public function tampil_kategori()
	{
		$this->db->select('*');
		$query = $this->db->get('categories');
		return $query->result();
	}

// CREATE
	public function upload()
	{
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

	public function insert($upload) //ADMIN
	{
		$data = array(
			'user_id' => '',
			'nama' => $this->input->post('nama'),
			'gender' => $this->input->post('gender'),
			'kodepos' => $this->input->post('kodepos'),
			'email' => $this->input->post('email'),
			'no_telp' => $this->input->post('no_telp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'register_date' => date('Y-m-d'),
			'level_id' => $this->input->post('level_id'),
			'img' => $upload['file']['file_name']
		);

		$this->db->insert('users', $data);
	}

	public function insert_user($upload) //USER
	{
		$data = array(
			'user_id' => '',
			'nama' => $this->input->post('nama'),
			'gender' => $this->input->post('gender'),
			'kodepos' => $this->input->post('kodepos'),
			'email' => $this->input->post('email'),
			'no_telp' => $this->input->post('no_telp'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'register_date' => date('Y-m-d'),
			'level_id' => $this->input->post('level_id'),
			'img' => $upload['file']['file_name']
		);

		$this->db->insert('users', $data);
	}

	public function insert_car($upload) //CAR
	{
		$data = array(
			'id_mobil' => '',
			'no_polisi' => $this->input->post('input_no_polisi'),
			'merk' => $this->input->post('input_merk'),
			'id_cat' => $this->input->post('id_cat'),
			// 'jenis_mobil' => $this->input->post('input_jenis_mobil'),
			'warna_mobil' => $this->input->post('input_warna_mobil'),
			'tahun_mobil' => $this->input->post('input_tahun_mobil'),
			'bahan_bakar' => $this->input->post('input_bahan_bakar'),
			'price' => $this->input->post('input_price'),
			'img' => $upload['file']['file_name']
		);

		$this->db->insert('car', $data);
	}

	public function insert_driver($upload) //DRIVER
	{
		$data = array(
			'id_driver' => '',
			'username' => $this->input->post('input_username'),
			'alamat' => $this->input->post('input_alamat'),
			'no_telp' => $this->input->post('input_no_telp'),
			'email' => $this->input->post('input_email'),
			'umur' => $this->input->post('input_umur'),
			'gender' => $this->input->post('input_gender'),
			'price' => $this->input->post('input_price'),
			'foto' => $upload['file']['file_name']
		);

		$this->db->insert('driver', $data);
	}

	public function insert_order()
	{
		$data = array(
			'id_order' => '',
			'id_user' => $this->input->post('id_user'),
			'cat_mobil' => $this->input->post('input_password'),
			'merk' => $this->input->post('input_email'),
			'day' => $this->input->post('input_no_telp'),
			'price' => $this->input->post('input_alamat'),
			'date_order' => date('Y-m-d')
		);

		$this->db->insert('order', $data);
	}

	public function insert_order_user()
	{
		$data = array(
			'id_order' => '',
			'username' => $this->input->post('input_username'),
			'jenis_mobil' => $this->input->post('input_jenis_mobil'),
			'merk' => $this->input->post('input_merk'),
			'day' => $this->input->post('input_day'),
			'price' => $this->input->post('input_price'),
			'date_order' => date('Y-m-d')
		);

		$this->db->insert('order', $data);
	}

	public function insert_kategori() //ADMIN
	{
		$data = array (
			'id_cat' => '',
			'cat_mobil' => $this->input->post('cat_mobil'),
			'description' => $this->input->post('description'),
			'date_created' => date('Y-m-d')
		);

		$this->db->insert('categories', $data); 
	}

	public function get_all_categories()
	{
		$this->db->order_by('cat_mobil');
		$query = $this->db->get('categories');
		return $query->result();
	}

	public function get_category_by_id($id)
	{
		$query = $this->db->get_where('categories', array('id_cat' => $id));
		return $query->row();
	}

//UPDATE
	public function update($upload, $id)
	{
		if ($upload['result'] == 'success')
		{
			$data = array(
				'nama' => $this->input->post('nama'),
				'gender' => $this->input->post('gender'),
				'kodepos' => $this->input->post('kodepos'),
				'email' => $this->input->post('email'),
				'no_telp' => $this->input->post('no_telp'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'img' => $upload['file']['file_name']
			);
		}
		else
		{
			$data = array(
				'nama' => $this->input->post('nama'),
				'gender' => $this->input->post('gender'),
				'kodepos' => $this->input->post('kodepos'),
				'email' => $this->input->post('email'),
				'no_telp' => $this->input->post('no_telp'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);	
		}

		$this->db->where('user_id', $id);
		$this->db->update('users', $data);
	}

	public function view_by($id)
	{
		$this->db->where('user_id', $id);
		return $this->db->get('users')->row();
	}

	public function update_user($upload, $id)
	{
		if ($upload['result'] == 'success') 
		{
			$data = array(
				'nama' => $this->input->post('nama'),
				'gender' => $this->input->post('gender'),
				'kodepos' => $this->input->post('kodepos'),
				'email' => $this->input->post('email'),
				'no_telp' => $this->input->post('no_telp'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'img' => $upload['file']['file_name']
			);
		}
		else{
			$data = array(
				'nama' => $this->input->post('nama'),
				'gender' => $this->input->post('gender'),
				'kodepos' => $this->input->post('kodepos'),
				'email' => $this->input->post('email'),
				'no_telp' => $this->input->post('no_telp'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
		}

		$this->db->where('user_id', $id);
		$this->db->update('users', $data);
	}

	public function view_by_user($id)
	{
		$this->db->where('id_user', $id);
		return $this->db->get('user')->row();
	}

	public function update_car($upload, $id)
	{
		if ($upload['result'] == 'success') 
		{
			$data = array(
				'no_polisi' => $this->input->post('input_no_polisi'),
				'merk' => $this->input->post('input_merk'),
				'jenis_mobil' => $this->input->post('input_jenis_mobil'),
				'warna_mobil' => $this->input->post('input_warna_mobil'),
				'tahun_mobil' => $this->input->post('input_tahun_mobil'),
				'bahan_bakar' => $this->input->post('input_bahan_bakar'),
				'price' => $this->input->post('input_price'),
				'img' => $upload['file']['file_name']
			);
		}
		else
		{
			$data = array(
				'no_polisi' => $this->input->post('input_no_polisi'),
				'merk' => $this->input->post('input_merk'),
				'jenis_mobil' => $this->input->post('input_jenis_mobil'),
				'warna_mobil' => $this->input->post('input_warna_mobil'),
				'tahun_mobil' => $this->input->post('input_tahun_mobil'),
				'bahan_bakar' => $this->input->post('input_bahan_bakar'),
				'price' => $this->input->post('input_price')
			);
		}	    

		$this->db->where('id_mobil', $id);
		$this->db->update('car', $data);
	}

	public function view_by_car($id)
	{
		$this->db->where('id_mobil', $id);
		return $this->db->get('car')->row();
	}

	public function update_driver($upload, $id)
	{
		if ($upload['result'] == 'success') 
		{
			$data = array(
				'username' => $this->input->post('input_username'),
				'alamat' => $this->input->post('input_alamat'),
				'no_telp' => $this->input->post('input_no_telp'),
				'email' => $this->input->post('input_email'),
				'umur' => $this->input->post('input_umur'),
				'gender' => $this->input->post('input_gender'),
				'price' => $this->input->post('input_price'),
				'foto' => $upload['file']['file_name']
			);
		}
		else
		{
			$data = array(
				'username' => $this->input->post('input_username'),
				'alamat' => $this->input->post('input_alamat'),
				'no_telp' => $this->input->post('input_no_telp'),
				'email' => $this->input->post('input_email'),
				'umur' => $this->input->post('input_umur'),
				'gender' => $this->input->post('input_gender'),
				'price' => $this->input->post('input_price'),
			);
		}	    

		$this->db->where('id_driver', $id);
		$this->db->update('driver', $data);
	}

	public function view_by_driver($id)
	{
		$this->db->where('id_driver', $id);
		return $this->db->get('driver')->row();
	}

	public function update_order($id)
	{
		$data = array(
			'merk' => $this->input->post('input_merk'),
			'day' => $this->input->post('input_day'),
			'price' => $this->input->post('input_price')
		);

		$this->db->where('id_order', $id);
		$this->db->update('order', $data);
	}

	public function view_by_order($id)
	{
		$this->db->where('id_order', $id);
		return $this->db->get('order')->row();
	}

	public function update_kategori($id)
	{
		$data = array(
			'cat_mobil' => $this->input->post('cat_mobil'),
			'description' => $this->input->post('description')
		);

		$this->db->where('id_cat', $id);
		$this->db->update('categories', $data);
	}

	public function view_by_kategori($id)
	{
		$this->db->where('id_cat', $id);
		return $this->db->get('categories')->row();
	}

//DELETE

	public function delete($id) //ADMIN
	{
		$this->db->where('id', $id);
		$this->db->delete('login');
	}
	public function delete_user($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}
	public function delete_car($id)
	{
		$this->db->where('id_mobil', $id);
		$this->db->delete('car');
	}
	public function delete_driver($id)
	{
		$this->db->where('id_driver', $id);
		$this->db->delete('driver');
	}
	public function delete_order($id)
	{
		$this->db->where('id_order', $id);
		$this->db->delete('order');
	}
	public function delete_kategori($id)
	{
		$this->db->where('id_cat', $id);
		$this->db->delete('categories');
	}

	//LOGIN
	public function login($username, $password)
	{
		$data = array(
			'username' => $username,
			'password' => $password
		);

		$this->db->where($data);
		return $this->db->get('login');
	}
	public function login_user($username, $password)
	{
		$data = array(
			'username' => $username,
			'password' => $password
		);

		$this->db->where($data);
		return $this->db->get('user');
	}
}
?>