<?php 

class User_m extends CI_Model
{
	public function tampil_data()
	{
		return $this->db->get('tb_user');
	}

	public function tambah_data($data)
	{
		$this->db->insert('tb_user',$data);
	}

	public function update_data($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_data($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('tb_user');
	}

	public function tot_data()
	{
		$this->db->where('tb_user.role_id=2');
		$this->db->where('tb_user.blokir=1');
		$query = $this->db->get('tb_user');
		if($query->num_rows()>0){
			return $query->num_rows();
		} else {
			return 0;
		}
	}
}