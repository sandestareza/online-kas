<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisis extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "2"){
			redirect("auth/");
		}
		$this->load->model('debit_m');
		$this->load->model('kredit_m');
		$this->load->model('analisis_m');
	}

	public function index()
	{
		$data['tot_kasm']=$this->debit_m->tot_kasm();
		$data['tot_kask']=$this->kredit_m->tot_kask();
		$data['tot_kas']=$this->analisis_m->total_kas();
		/*$data['line1']=$this->analisis_m->line_kasm()->result();
		$data['line2']=$this->analisis_m->line_kask()->result();*/
		$data['donat']=$this->analisis_m->donat_kas();
		$data['bar1']=$this->analisis_m->bar_kas1();
		$data['bar2']=$this->analisis_m->bar_kas2();

		$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();

		$this->load->view('temp_page/header');
		$this->load->view('temp_page/sidebar',$data);
		$this->load->view('page/analisis',$data);
		$this->load->view('temp_page/footer');
		$this->load->view('temp_page/chart');
	}
}
