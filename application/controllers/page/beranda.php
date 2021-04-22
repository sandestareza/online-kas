<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "2"){
			redirect("auth/");
		}
		$this->load->model('analisis_m');
	}

	public function index()
	{
		//untuk menampilkan notif pemakaian satu tahun
		$tgl_now=date('d-m-Y');
		$tgl_new="01-01-2020";
		$jangka=strtotime('+365 days', strtotime($tgl_new));
		$tgl_exp=date('d-m-Y',$jangka);
		if ($tgl_now>=$tgl_exp) {
			
			$this->session->set_flashdata('pesan', 'Silahkan untuk mengbackup dan menghapus data! Pergi ke pengaturan pilih tombol backup dan delete data');

			$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();

			$data['tot_kas']=$this->analisis_m->total_kas();
			$this->load->view('temp_page/header');
			$this->load->view('temp_page/sidebar',$data);
			$this->load->view('page/beranda',$data);
			$this->load->view('temp_page/footer');	
		} else {

		$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();

		$data['tot_kas']=$this->analisis_m->total_kas();
		$this->load->view('temp_page/header');
		$this->load->view('temp_page/sidebar',$data);
		$this->load->view('page/beranda',$data);
		$this->load->view('temp_page/footer');
		}
	}
}
