<?php 

class Kredit_m extends CI_Model
{
	public function no_kas()
	{
		$user= $this->session->userdata('id_user');
		$sql ="SELECT MAX(RIGHT(no,2)) AS no FROM tb_kas WHERE id_user = $user ORDER BY no DESC";
		$query = $this->db->query($sql);

		if($query->num_rows()<>0){
			$data = $query->row();
			$no   = intval($data->no)+1;
		} else {
			$no = 1;
		}
		$tahun=date('Y');
		$batas= str_pad($no, 3,"0", STR_PAD_LEFT);
		$no_kasm ="KK".$tahun.$batas;
		return $no_kasm;
	}

	public function tampil_data()
	{
		$pilih="kredit!=0";
		$this->db->select('*');
		$this->db->from('tb_kas');
		$this->db->where($pilih);
		$this->db->where('tb_kas.id_user',$this->session->userdata('id_user'));
		$query=$this->db->get();
		return $query;
	}

	public function tambah_data($data)
	{ 
		$this->db->insert('tb_kas', $data);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_data($id_kas)
	{

		$this->db->where('id_kas', $id_kas);
		$this->db->delete('tb_kas');
	}

	public function tot_kask()
	{
		$this->db->select_sum('kredit');
		$this->db->where('tb_kas.id_user',$this->session->userdata('id_user'));
		$query = $this->db->get('tb_kas');
		if($query->num_rows()>0){
			return $query->row()->kredit;
		} else{
			return 0;
		}
	}
}