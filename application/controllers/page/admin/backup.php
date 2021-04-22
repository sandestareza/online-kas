<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//cek session yang login
		if ($this->login_model->role()!= "1"){
			redirect("auth/");
		}
		$this->load->model('analisis_m');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();

		$this->load->view('temp_page/header');
		$this->load->view('page/admin/sidebar_admin',$data);
		$this->load->view('page/admin/backup');
		$this->load->view('temp_page/footer');
	}

	public function pdf()
	{
		$data['user'] = $this->db->get_where('tb_user', array('email' => $this->session->userdata('email')))->row_array();
		
        $data['judul']='Backup Data Tahun';
        $data['kas'] = $this->analisis_m->tampil_data()->result_array();

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "backup-data-".date('Y').".pdf";
		$this->pdf->load_view('page/admin/backup_pdf', $data);

    }

    public function format()
    {
    	$this->analisis_m->delete_all();
		$this->session->set_flashdata('pesan', 'diformat!');
		redirect('page/backup');
	}
}
