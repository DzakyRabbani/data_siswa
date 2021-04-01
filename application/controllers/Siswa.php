<?php 

class Siswa extends CI_Controller
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
		$data['siswa'] = $this->M_photo_booth->getdata('tbl_siswa');

		$this->load->view('kurikulum/template/header');
		$this->load->view('kurikulum/template/sidebar');
        $this->load->view('siswa/v_siswa',$data);
		$this->load->view('kurikulum/template/footer');
	}

	public function insert_action()
	{
		$id_siswa	 	 =	 $this->input->post('id_siswa');
		$siswa			 =	 $this->input->post('siswa');
		$rombel			 =	 $this->input->post('rombel');
		$rayon		 	 =	 $this->input->post('rayon');
		$jk		 		 =	 $this->input->post('jk');
		$keterangan		 =	 $this->input->post('keterangan');
		$alasan			 =	 $this->input->post('alasan');

		$data = array(
			'id_siswa' 		    => $id_siswa,
			'siswa'				=> $siswa,
			'rombel'			=> $rombel,
			'rayon'				=> $rayon,
			'jk'				=> $jk,
			'keterangan'		=> $keterangan,
			'alasan'			=> $alasan,
			);

		$save = $this->db->insert('tbl_siswa',$data);
		if ($save) {
			$alert = '<div class="alert alert-success"><strong>Insert Data Complate</strong></div>';
			$this->session->set_flashdata('message',$alert);
		redirect('siswa/index');
		}
	}

	public function delete($id)
	{
		$where = array('id_siswa' => $id);
		$data   = $this->db->get_where('tbl_siswa',$where)->row_array(); 
		
		$hapus = $this->M_photo_booth->deletedata($where,'tbl_siswa');
		redirect('siswa/index');
	}

	public function edit($id)
	{
		$where = array('id_siswa' => $id);
		$data['siswa'] = $this->M_photo_booth->editdata($where,'tbl_siswa')->result();

		$this->load->view('kurikulum/template/header');
		$this->load->view('kurikulum/template/sidebar');
		$this->load->view('siswa/edit_siswa',$data);
		$this->load->view('kurikulum/template/footer');		
	}

	public function update()
	{
		$id_siswa			=  $this->input->post('id_siswa');
		$siswa  	  	=  $this->input->post('siswa');
		
		$data = array(
				'id_siswa'		=> $id_siswa,			
				'siswa' 		=> $siswa,
			
			);
		
		$where = array(
			'id_siswa' => $id_siswa 
			);
		$this->M_photo_booth->updatedata('tbl_siswa',$data,$where);



		redirect('siswa/index');
	}

}
 ?>