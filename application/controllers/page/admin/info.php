<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "1"){
			redirect("auth/");
		}
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();

		$this->load->view('temp_page/header');
		$this->load->view('page/admin/sidebar_admin',$data);
		$this->load->view('page/admin/info');
		$this->load->view('temp_page/footer');
	}
}
