<?php 

class Guru extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') !="login") {
			redirect(base_url("Auth"));
		}
		$this->load->library(array('form_validation','session'));
	
	}
	
	public function index()
	{
		$data['guru'] = $this->M_photo_booth->getdata('tbl_guru');

		$this->load->view('kurikulum/template/header');
		$this->load->view('kurikulum/template/sidebar');
		$this->load->view('guru/v_guru',$data);
		$this->load->view('kurikulum/template/footer');
	}
	public function insert_action()
	{
		$id_guru    	 =  $this->input->post('id_guru');
		$nama_guru	 =  $this->input->post('nama_guru');
		$alamat				 =  $this->input->post('alamat');
		$no_telp			 =  $this->input->post('no_telp');
	
		$data = array(
			'id_guru' 		=> $id_guru,
			'nama_guru'		=> $nama_guru,
			'alamat'				=> $alamat,
			'no_telp'				=> $no_telp,
			
		);

		$save = $this->db->insert('tbl_guru',$data);	
		if ($save) {
			$alert = '<div class="alert alert-success"><strong>Insert Data Complate</strong></div>';
			$this->session->set_flashdata('message',$alert);
		redirect('guru/index');
		

    	}	
		
	}
	public function delete($id)
	{
		$where = array('id_guru' => $id);
		$this->M_photo_booth->deletedata($where,'tbl_guru');
        
		$hapus = $this->M_photo_booth->deletedata($where,'tbl_guru');
			redirect('guru/index');
			  
	}

	public function edit($id)
	{
		$where = array('id_guru' => $id);
		$data['guru'] = $this->M_photo_booth->editdata($where,'tbl_guru')->result();

		$this->load->view('kurikulum/template/header');
		$this->load->view('kurikulum/template/sidebar');
		$this->load->view('guru/edit_guru',$data);
		$this->load->view('kurikulum/template/footer');		
	}
	public function update()
	{
		$id_guru    	=  $this->input->post('id_guru');
		$nama_guru 	=  $this->input->post('nama_guru');
		$alamat				=  $this->input->post('alamat');
		$no_telp			=  $this->input->post('no_telp');
		
		$data = array(
			'nama_guru'		=> $nama_guru,
			'alamat'				=> $alamat,
			'no_telp'				=> $no_telp,
		);
		
		$where = array(
			'id_guru'  => $id_guru
		);
		   $this->M_photo_booth->updatedata('tbl_guru',$data,$where);
		   
		redirect('guru/index');
		}
}
?>	