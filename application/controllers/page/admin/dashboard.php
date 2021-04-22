<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "1"){
			redirect("auth/");
		}
		$this->load->model('user_m');
		$this->load->model('analisis_m');
	}

	public function index()
	{	
		
		$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();

		$data['member']= $this->user_m->tot_data();
		$data['kas']= $this->analisis_m->dashboard()->result();
		
		$this->load->view('temp_page/header');
		$this->load->view('page/admin/sidebar_admin',$data);
		$this->load->view('page/admin/dashboard',$data);
		$this->load->view('temp_page/footer');
	}
}
