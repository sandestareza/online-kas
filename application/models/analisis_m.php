<?php 

class Analisis_m extends CI_Model
{
	public function tampil_data()
	{
		$this->db->where('tb_kas.id_user',$this->session->userdata('id_user'));
		return $this->db->get('tb_kas');
	}

	public function dashboard()
	{
		$this->db->select('tb_kas.*, tb_user.*');
		$this->db->from('tb_user');
		$this->db->join('tb_kas','tb_kas.id_user=tb_user.id_user');
		$this->db->select_sum('debit','debit');
		$this->db->select_sum('kredit','kredit');
		$this->db->group_by('tb_kas.id_user');
		$this->db->order_by('nama','ASC');
		$query = $this->db->get();
		return $query;
	}

	public function total_kas()
	{
		$user= $this->session->userdata('id_user');
		$sql = $this->db->query("SELECT (SELECT SUM(debit) FROM tb_kas WHERE id_user=$user)-(SELECT SUM(kredit) FROM tb_kas WHERE id_user=$user) as total ");
		if($sql->num_rows()>0){
			return $sql->row()->total;
		} else{
			return 0;
		}
	}

	public function donat_kas()
	{
		$user= $this->session->userdata('id_user');
		$sql= "SELECT SUM(debit) as total FROM tb_kas WHERE id_user = $user UNION SELECT SUM(kredit)FROM tb_kas WHERE id_user = $user";
		$query=$this->db->query($sql)->result();
		return $query;
	}

	public function bar_kas1()
	{
		$this->db->select('MONTHNAME(tanggal) as bulan');
		$this->db->select_sum('debit','debit');
		$this->db->from('tb_kas');
		$this->db->where('tb_kas.id_user',$this->session->userdata('id_user'));
		$this->db->group_by('bulan');
		$this->db->order_by('id_kas','ASC');
		$query=$this->db->get()->result();
		return $query;
	}

	public function bar_kas2()
	{
		$this->db->select('MONTHNAME(tanggal) as bulan');
		$this->db->select_sum('kredit','kredit');
		$this->db->from('tb_kas');
		$this->db->where('tb_kas.id_user',$this->session->userdata('id_user'));
		$this->db->group_by('bulan');
		$this->db->order_by('id_kas','ASC');
		$query=$this->db->get()->result();
		return $query;
	}

	public function delete_all()
	{
		$this->db->where('tb_kas.id_user',$this->session->userdata('id_user'));
		$this->db->empty_table('tb_kas');
	}
}