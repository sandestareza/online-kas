<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasmasuk extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "2"){
			redirect("auth/");
		}
		$this->load->model('debit_m');
	}
	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();

		$data['no']=$this->debit_m->no_kas();
		$data['kasmasuk']=$this->debit_m->tampil_data()->result();
		$data['judul']='Kas Masuk';
		$this->load->view('temp_page/header', $data);
		$this->load->view('temp_page/sidebar',$data);
		$this->load->view('page/kasmasuk',$data);
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

				'id_user'	=> $this->session->userdata('id_user'),
				'no'		=> $this->input->post('no'),
				'tanggal'	=> $this->input->post('tanggal'),
				/*ini adalah mengubah string ke integer*/
				'debit'		=> preg_replace("/[^0-9]/", "", $this->input->post('debit')),
				'ket'	 	=> $this->input->post('ket')

			);
				
			$this->debit_m->tambah_data($data);
			$this->session->set_flashdata('pesan', 'ditambahkan!');
			redirect('page/kasmasuk');
		}
	}

	public function edit_aksi($id_kas)
	{

			$id_kas   = $this->input->post('id_kas');
			$no   = $this->input->post('no');
			$tanggal   = $this->input->post('tanggal');
			$debit   = $this->input->post('debit');
			$ket = $this->input->post('ket');
		
			$data 	=	array(

				'id_kas'		=> $id_kas,
				'no'			=> $no,
				'tanggal'		=> $tanggal,
				'debit'   		=> $debit,
				'ket'   	    => $ket
			);
			$where	=	array('id_kas' => $id_kas);

		$this->debit_m->update_data($where,$data, 'tb_kas');
		$this->session->set_flashdata('pesan', 'diedit!');
		redirect('page/kasmasuk');
	}

	public function hapus($id_kas)
	{
		$this->debit_m->hapus_data($id_kas);
		$this->session->set_flashdata('pesan', 'dihapus!');
		redirect('page/kasmasuk');
	}	

	function _rules()
	{
		$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required', 
			array(
				'required' => 'Tanggal anda harus diisi!'
			));
		$this->form_validation->set_rules('debit', 'Debit', 'trim|required', 
			array(
				'required' => 'Debit anda harus diisi!'
			));
		$this->form_validation->set_rules('ket', 'Ket', 'trim|required', 
			array(
				'required' => 'Keterangan anda harus diisi!'
			));
	}
}