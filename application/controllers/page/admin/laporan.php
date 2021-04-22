<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 
{
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
		$dari= $this->input->post('dari');
		$sampai= $this->input->post('sampai');
		$this->_rules();
		if($this->form_validation->run() == FALSE){
			$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();

			$data['judul']='Laporan Buku Kas';
			$this->load->view('temp_page/header', $data);
			$this->load->view('page/admin/sidebar_admin',$data);
			$this->load->view('page/admin/laporan',$data);
			$this->load->view('temp_page/footer');
		}else {
			$data['kas']= $this->db->query(
				"SELECT * 
				 FROM tb_kas 
				 WHERE date(tanggal) >= '$dari' AND date(tanggal) <= '$sampai'
				 ORDER BY tanggal ASC"
			)->result_array();

			$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();
			$data['judul']='Laporan Buku Kas';
			$this->load->view('temp_page/header', $data);
			$this->load->view('page/admin/sidebar_admin',$data);
			$this->load->view('page/admin/tamp_laporan',$data);
			$this->load->view('temp_page/footer');
		}
	}

	public function cetak()
	{
		$dari= $this->input->get('dari');
		$sampai= $this->input->get('sampai');

			$data['judul']='Laporan Buku Kas';
			$data['kas']= $this->db->query(
				"SELECT * 
				 FROM tb_kas 
				 WHERE tanggal BETWEEN '$dari' AND '$sampai'
				 ORDER BY tanggal ASC"
			)->result_array();

		$data['user'] = $this->db->get_where('tb_user', array('username' => $this->session->userdata('username')))->row_array();
		$this->load->view('page/print', $data);
	}

	public function _rules()
	{
		$this->form_validation->set_rules('dari', 'Dari Tanggal', 'trim|required', 
			array(
				'required' => 'Darii tanggal harus diisi!'
			));
		$this->form_validation->set_rules('sampai', 'Sampai Tanggal', 'trim|required', 
			array(
				'required' => 'Sampai tanggal harus diisi!'));
	}
			
}