<?php

class Auth extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
					
	}

	public function index()
	{
		//jika memang sudah login
		if ($this->login_model->is_logged_in())
		{
			//jika sudah login bukan admin
			if ($this->login_model->role()!= "1"){
			redirect('page/beranda');
		} else {
			
			redirect('page/admin/dashboard');
		}
		} else {
		$this->load->view('login');
		}
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required', 
			array(
				'required' => 'Email harus diisi!'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required',
			array(
				'required' => 'Password harus diisi!'
			));

		if($this->form_validation->run() == false)
		{
			$this->load->view('login');
		} else 
			{
				$email	= $this->input->post('email');
				$password	= $this->input->post('password');

				$user = $this->db->get_where('tb_user', array('email'=>$email))->row_array();

				 //jika user ada
				 if($user){
				 	//jika user aktif
				 	if ($user['blokir']==1){
				 		//cek password
				 		if(password_verify($password, $user['password'])){
				 			$data=array(
				 			'id_user' 	=>$user['id_user'],
				 			'email' 	=>$user['email'],
				 			'role_id'	=>$user['role_id']
				 			);
					 		$this->session->set_userdata($data);
					 		if($user['role_id']==1){
					 			redirect('page/admin/dashboard');
					 		}else{
					 			redirect('page/beranda');
					 		}
				 		}else{
				 			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" id_role="alert">
							Maaf Password anda salah!</div>');
							redirect('auth');
				 		}
				 	}else{
				 	  	$this->session->set_flashdata('pesan', '<div class="alert alert-danger" id_role="alert">
						Maaf Email belum aktif</div>');
						redirect('auth');
				 	}
				 	
				 }else{
					 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger" id_role="alert">
						Maaf Email belum terdaftar! Silahkan buat akun terlebih dahulu</div>');
						redirect('auth');
				 }
					
			} 
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function proses_register()
	{
		$this->_rules();

		if($this->form_validation->run() == False)
		{
			$this->register();
		} else{

			$email= $this->input->post('email',true);
			$data = array(
			
			'nama'			=> htmlspecialchars($this->input->post('nama',true)),
			'email'			=> htmlspecialchars($email),
			'password'		=> password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
			'perusahaan'	=> $this->input->post('perusahaan'),
			'wa'			=> $this->input->post('wa'),
			'foto'			=> 'user.png',
			'role_id'		=> 2,
			'blokir'		=> 0,
			'date_created'	=> time()

			);

			//isi token
			$token = base64_encode(random_bytes(32));

			$user_token = array(

				'email' => $email,
				'token' => $token,
				'date_created' => time()
			);



			$this->db->insert('tb_user',$data);
			$this->db->insert('tb_token',$user_token);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" id_role="alert">
					Silahkan cek email anda utuk memverifikasi akun</div>');
			redirect('auth');
		}
	}

	private function _sendEmail($token, $type)
	{
		$config = array(
			'protocol'  =>'smtp',
			'smtp_host' =>'ssl://smtp.gmail.com',
			'smtp_user' =>'timbko.developer@gmail.com',
			'smtp_pass' =>'admin12345',
			'smtp_port' => 465,
			'mailtype'  =>'html',
			'charset'   =>'utf-8',
			'wordwrap'  => TRUE
		);
		//konfigurasi
		$this->load->library('email',$config);
		$this->email->set_newline("\r\n");

		$this->email->from('timbko.developer@gmail.com','timbko.developer@gmail.comr');
		$this->email->to($this->input->post('email'));

		if($type == 'verify'){
			$this->email->subject('Verifikasi Akun');
			$this->email->message('Klik link untuk memverifikasi akun anda :
				<a href="'.base_url().'auth/verify?email='.$this->input->post('email').
				'&token='.urldecode($token). '">Aktifkan</a>');			
		}

		if ($this->email->send()){
			return true;
		}else{
			echo $this->email->print_debugger();
			die();
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('tb_user', 
			array(
				'email'=>$email
			))->row_array();

		if($user){
			$user_token = $this->db->get_where('tb_token', 
			array(
				'token'=>$token
			))->row_array();
			if($user_token){
				if(time()-$user_token['date_created']<(60*60*24)){
					$this->db->set('blokir',1);
					$this->db->where('email',$email);
					$this->db->update('tb_user');

					$this->db->delete('tb_token',['email'=>$email]);

					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" id_role="alert">
					Aktivasi berhasil! Silahkan login</div>');
					redirect('auth');
				}else{
					$this->db->delete('tb_user',['email'=>$email]);
					$this->db->delete('tb_token',['email'=>$email]);

					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" id_role="alert">
					Aktifasi gagal! Token kadaluarsa</div>');
					redirect('auth');
				}
			} else{
			 $this->session->set_flashdata('pesan', '<div class="alert alert-danger" id_role="alert">
					Aktifasi gagal! Token salah</div>');
			redirect('auth');
			}
		} else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" id_role="alert">
					Aktifasi gagal! Email salah</div>');
			redirect('auth');
		}

	}

	function _rules()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required', 
			array(
				'required' => 'Nama anda harus diisi!'
			));
		$this->form_validation->set_rules('perusahaan', 'Perusahaan', 'trim|required', 
			array(
				'required' => 'Perusahaan/Organisasi anda harus diisi!'
			));
		$this->form_validation->set_rules('wa', 'Wa', 'trim|required', 
			array(
				'required' => 'No.Hp/Wa anda harus diisi!'
			));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', 
			array(
				'required' 		=> 'Email anda harus diisi!',
				'valid_email' 	=> 'Penulisan email harus sesuai dengan format email!'
			));
		$this->form_validation->set_rules('password1', 'Password1', 'trim|required|min_length[4]|matches[password2]', 
			array(
				'required' => 'Password anda harus diisi!',
				'min_length' => 'Password anda terlalu pendek!',
				'matches' => 'Password anda tidak sama!'
			));
		$this->form_validation->set_rules('password2', 'Password2', 'trim|required|matches[password1]', 
			array(
				'required' => 'Password anda harus diisi!',
				'matches' => 'Password anda tidak sama!'
			));
	}
}