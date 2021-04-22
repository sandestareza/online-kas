<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "2"){
			redirect("auth/");
		}
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();

		$this->load->view('temp_page/header');
		$this->load->view('temp_page/sidebar',$data);
		$this->load->view('page/profile',$data);
		$this->load->view('temp_page/footer');
	}

	public function edit()
	{
		$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();

		$this->load->view('temp_page/header');
		$this->load->view('temp_page/sidebar',$data);
		$this->load->view('page/editprofil',$data);
		$this->load->view('temp_page/footer');
	}

	public function edit_aksi()
	{
			$id   = $this->input->post('id_user');
			$nama   = $this->input->post('nama');
			$perusahaan = $this->input->post('perusahaan');
			$email = $this->input->post('email');
			$wa = $this->input->post('wa');

			// cek gambar
			$foto = $_FILES['foto']['name'];

			if($foto) {
				$config['upload_path'] = './assets/img';
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = 2048;

				$this->load->library('upload', $config);

				if($this->upload->do_upload('foto')) {
					$old_foto = $data['user']['foto'];
					if($old_foto != 'user.png') {
						unlink(FCPATH . 'assets/img/' . $old_foto);
					}
					$foto_baru = $this->upload->data('file_name');
					$this->db->set('foto', $foto_baru);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama', $nama);
			$this->db->set('perusahaan', $perusahaan);
			$this->db->set('email', $email);
			$this->db->set('email', $email);
			$this->db->set('wa', $wa);
			$this->db->where('id_user', $id);
			$this->db->update('tb_user');

			$this->session->set_flashdata('pesan', 'diedit!');
			redirect('page/profile');
	}

	public function gantipassword()
	{
		$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();
	
		$this->form_validation->set_rules('old', 'Old','required|trim',
			array(
				'required' => 'Password Lama harus diisi!'));

		$this->form_validation->set_rules('new', 'New','required|trim|min_length[3]|matches[pass]',
				array(
				'required' => 'Password Baru harus diisi!',
				'min_length' => 'Maaf Password terlalu pendek! MIN 3',
				'matches'	=> 'Maaf Password anda tidak sama, Ulangi lagi!'
			));

		$this->form_validation->set_rules('pass', 'Pass','required|trim|min_length[3]|matches[new]',
			array(
				'required' => 'Ulangi Password!',
				'min_length' => 'Maaf Password terlalu pendek! MIN 3',
				'matches'	=> 'Maaf Password anda tidak sama, Ulangi lagi!'
			));

		if ($this->form_validation->run() == false){
			$this->load->view('temp_page/header');
			$this->load->view('temp_page/sidebar',$data);
			$this->load->view('page/gantipassword',$data);
			$this->load->view('temp_page/footer');
		} else{
			$old_pass = $this->input->post('old');
			$new_pass = $this->input->post('new');

			if(!password_verify($old_pass, $data['user']['password'])) {
				$this->session->set_flashdata('pesan', 'Lama salah!');
				redirect('page/profile/gantipassword');
			} else{
				if($old_pass==$new_pass){
					$this->session->set_flashdata('pesan', 'Tidak boleh sama dengan yang lama!');
					redirect('page/profile/gantipassword');
				} else{
					//password ok
					$password_hash = password_hash($new_pass, PASSWORD_DEFAULT);

					$this->db->set('password',$password_hash);
					$this->db->where('username',$this->session->userdata('username'));
					$this->db->update('tb_user');

					$this->session->set_flashdata('pesan', 'diubah!');
					redirect('page/profile');
				}
			}
		}
	}
}
