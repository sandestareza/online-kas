<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kaskeluar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "2"){
			redirect("auth/");
		}
		$this->load->model('kredit_m');
	}
	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();

		$data['no']=$this->kredit_m->no_kas();
		$data['kaskeluar']=$this->kredit_m->tampil_data()->result();
		$data['judul']='Kas Keluar';
		$this->load->view('temp_page/header', $data);
		$this->load->view('temp_page/sidebar',$data);
		$this->load->view('page/kaskeluar', $data);
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

				'id_user'	 => $this->session->userdata('id_user'),
				'no'	 => $this->input->post('no'),
				'tanggal'	 => $this->input->post('tanggal'),
				'kredit'	=> preg_replace("/[^0-9]/", "", $this->input->post('kredit')),/*ini adalah mengubah string ke integer*/
				'ket'	 	=> $this->input->post('ket')

			);
				
			$this->kredit_m->tambah_data($data);
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('page/kaskeluar');
		}
	}

	public function edit_aksi($id_kas)
	{

			$id_kas   = $this->input->post('id_kas');
			$no   = $this->input->post('no');
			$tanggal   = $this->input->post('tanggal');
			$kredit   = $this->input->post('kredit');
			$ket = $this->input->post('ket');
		
			$data 	=	array(

				'id_kas'		=> $id_kas,
				'no'		=> $no,
				'tanggal'		=> $tanggal,
				'kredit'   	=> $kredit,
				'ket'   	    => $ket
			);
			$where	=	array('id_kas' => $id_kas);

		$this->kredit_m->update_data($where,$data, 'tb_kas');
		$this->session->set_flashdata('pesan', 'diedit!');
		redirect('page/kaskeluar');
	}

	public function hapus($id_kas)
	{
		$this->kredit_m->hapus_data($id_kas);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('page/kaskeluar');
	}	

	function _rules()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required', 
			array(
				'required' => 'Tanggal anda harus diisi!'
			));
		$this->form_validation->set_rules('kredit', 'Kredit', 'trim|required', 
			array(
				'required' => 'Kredit anda harus diisi!'
			));
		$this->form_validation->set_rules('ket', 'Ket', 'trim|required', 
			array(
				'required' => 'Keterangan anda harus diisi!'
			));
	}
}
