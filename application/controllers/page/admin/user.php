<?php

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "1"){
			redirect("auth/");
		}
		$this->load->model('user_m');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();

		$data['pengguna']	= $this->user_m->tampil_data()->result();
		$data['judul'] = 'Data user';
		$this->load->view('temp_page/header');
		$this->load->view('page/admin/sidebar_admin',$data);
		$this->load->view('page/admin/user',$data);
		$this->load->view('temp_page/footer');
	}

	public function tambah_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == False)
		{
			$this->index();
		} else 
		
		{
			$data = array(
			
			'nama'			=> $this->input->post('nama'),
			'email'			=> $this->input->post('email'),
			'password'		=> password_hash($this->input->post('password'),PASSWORD_DEFAULT),
			'perusahaan'	=> $this->input->post('perusahaan'),
			'wa'			=> $this->input->post('wa'),
			'role_id'		=> $this->input->post('role_id'),
			'blokir'		=> $this->input->post('blokir'),
			'foto'			=> 'user.png',
			'date_created'	=> time()

			);

			$this->user_m->tambah_data($data,'tb_user');
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('page/admin/user');
		}
	}

	public function edit_aksi($id_user)
	{

			$id_user   = $this->input->post('id_user');
			$nama   = $this->input->post('nama');
			$perusahaan   = $this->input->post('perusahaan');
			$wa   = $this->input->post('wa');
			$email   = $this->input->post('email');
			$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
			$role_id = $this->input->post('role_id');
			$blokir = $this->input->post('blokir');
		
			$data 	=	array(

				'id_user'		=> $id_user,
				'nama'			=> $nama,
				'perusahaan'	=> $perusahaan,
				'wa'			=> $wa,
				'email'   		=> $email,
				'password'   	=> $password,
				'role_id'   	=> $role_id,
				'blokir'   	    => $blokir,
				'foto'  		=> 'user.png',
				'date_created'  => time()
			);
			$where	=	array('id_user' => $id_user);

		$this->user_m->update_data($where,$data, 'tb_user');
		$this->session->set_flashdata('pesan', 'diedit!');
		redirect('page/admin/user');
	}

	public function hapus($id_user)
	{
		$this->user_m->hapus_data($id_user);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('page/admin/user');
	}

	function _rules()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required', 
			array(
				'required' => 'Nama anda harus diisi!'
			));
		$this->form_validation->set_rules('email', 'Email', 'trim|required', 
			array(
				'required' => 'Email anda harus diisi!'
			));
		$this->form_validation->set_rules('perusahaan', 'Perusahaan', 'trim|required', 
			array(
				'required' => 'Perusahaan/Organisasi anda harus diisi!'
			));
		$this->form_validation->set_rules('wa', 'Wa', 'trim|required', 
			array(
				'required' => 'No.Hp/Wa anda harus diisi!'
			));
		$this->form_validation->set_rules('password', 'Password', 'trim|required', 
			array(
				'required' => 'Password anda harus diisi!'
			));
	}
}