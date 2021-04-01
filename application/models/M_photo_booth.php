<?php 

class M_photo_booth extends CI_Model
{
	public function cek_login($table,$where)
	{
		return $this->db->get_where($table,$where);
	}
	public function getdata($table)
	{
		return $this->db->get($table)->result();
	}
	public function deletedata($where,$table)
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}
	public function editdata($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	public function updatedata($table,$data,$where)
	{
		$this->db->where($where);
		return $this->db->update($table,$data);
	}
	public function join_tables()
	{
		$this->db->select('tbl_kurikulum.*, tbl_siswa.id_siswa as id_siswa, tbl_guru.id_guru as id_guru');
		$this->db->from('tbl_kurikulum');
		$this->db->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_kurikulum.id_siswa');
		$this->db->join('tbl_guru', 'tbl_guru.id_guru = tbl_kurikulum.id_guru');
	
		return $this->db->get()->result();

	}
	public function join_tables2()
	{
		$this->db->select('tbl_kepala_sekolah.*, tbl_kurikulum.id_kurikulum as id_kurikulum');
		$this->db->from('tbl_kepala_sekolah');
		$this->db->join('tbl_kurikulum', 'tbl_kurikulum.id_kurikulum = tbl_kepala_sekolah.id_kurikulum');

		return $this->db->get()->result();
	}
	public function join_tables3()
	{
		$this->db->select('tbl_laporan_kurikulum.*, tbl_kurikulum.id_kurikulum as id_kurikulum');
		$this->db->from('tbl_laporan_kurikulum');
		$this->db->join('tbl_kurikulum', 'tbl_kurikulum.id_kurikulum = tbl_laporan_kurikulum.id_kurikulum');

		return $this->db->get()->result();
	}
	public function join_tables4()
	{
		$this->db->select('tbl_laporan_kepala_sekolah.*, tbl_kepala_sekolah.id_kepala_sekolah as id_kepala_sekolah');
		$this->db->from('tbl_laporan_kepala_sekolah');
		$this->db->join('tbl_kepala_sekolah', 'tbl_kepala_sekolah.id_kepala_sekolah = tbl_laporan_kepala_sekolah.id_kepala_sekolah');

		return $this->db->get()->result();
	}
	public function get_sum()
	{
		$sql = "SELECT sum(total_harga) as total_harga FROM tbl_kepala_sekolah";
		$result = $this->db->query($sql);
		return $result->row()->total_harga;
	}
	
}
 ?>
