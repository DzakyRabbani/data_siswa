	<?php 

class Kurikulum extends CI_Controller
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
		$data['kurikulum'] = $this->M_photo_booth->join_tables();
		$data['siswa'] = $this->M_photo_booth->getdata('tbl_siswa');
		$data['guru'] = $this->M_photo_booth->getdata('tbl_guru');

		$this->load->view('kurikulum/template/header');
		$this->load->view('kurikulum/template/sidebar');
		$this->load->view('kurikulum/v_kurikulum',$data);
		$this->load->view('kurikulum/template/footer');
	}
	public function insert_action()
	{
		$id_kurikulum 			=  $this->input->post('id_kurikulum');
		$nama_kurikulum    	=  $this->input->post('nama_kurikulum');
		$id_siswa    		=  $this->input->post('id_siswa');
		$id_guru     =  $this->input->post('id_guru');
		$tgl_masuk     	    =  $this->input->post('tgl_masuk');
		$harga_kurikulum 		=  $this->input->post('harga_kurikulum');
		$stok_kurikulum 		=  $this->input->post('stok_kurikulum');
		$keterangan			=  $this->input->post('keterangan');

		$data = array(
				'id_kurikulum'   		=> $id_kurikulum,
				'nama_kurikulum' 		=> $nama_kurikulum,
				'id_siswa'    		=> $id_siswa,
				'id_guru' 			=> $id_guru,
				'tgl_masuk'	  		=> $tgl_masuk, 
				'harga_kurikulum'	  	=> $harga_kurikulum,
				'stok_kurikulum'	  	=> $stok_kurikulum,
				'keterangan'  		=> $keterangan,
			);
		 //echo json_encode($data);
		 //die();	
		$save = $this->db->insert('tbl_kurikulum',$data);	
		if ($save) {
			$alert = '<div class="alert alert-success"><strong>Insert Data Complate</strong></div>';
			$this->session->set_flashdata('message',$alert);
		redirect('kurikulum/index');
		}
	}


	public function delete($id)
	{
		$where = array('id_kurikulum' => $id);
		$data   = $this->db->get_where('tbl_kurikulum',$where)->row_array(); 
		
		$hapus = $this->M_photo_booth->deletedata($where,'tbl_kurikulum');
		redirect('kurikulum/index');
	}


	public function edit($id)
	{
		$where = array('id_kurikulum' => $id);
		$data['kurikulum'] = $this->M_photo_booth->editdata($where,'tbl_kurikulum')->result();
		$data['siswa'] = $this->M_photo_booth->getdata('tbl_siswa');
		$data['guru'] = $this->M_photo_booth->getdata('tbl_guru');

		$this->load->view('kurikulum/template/header');
		$this->load->view('kurikulum/template/sidebar');
		$this->load->view('kurikulum/edit_kurikulum',$data);
		$this->load->view('kurikulum/template/footer');		
	}
	public function update()
	{
		$id_kurikulum 			=  $this->input->post('id_kurikulum');
		$nama_kurikulum    	=  $this->input->post('nama_kurikulum');
		$id_siswa    		=  $this->input->post('id_siswa');
		$id_guru    	    =  $this->input->post('id_guru');
		$tgl_masuk     	    =  $this->input->post('tgl_masuk');
		$harga_kurikulum 		=  $this->input->post('harga_kurikulum');
		$stok_kurikulum 		=  $this->input->post('stok_kurikulum');
		$keterangan			=  $this->input->post('keterangan');

		
		$data = array(
				'id_kurikulum'   		=> $id_kurikulum,
				'nama_kurikulum' 		=> $nama_kurikulum,
				'id_siswa'    		=> $id_siswa,
				'id_guru' 			=> $id_guru,
				'tgl_masuk'	  		=> $tgl_masuk, 
				'harga_kurikulum'	  	=> $harga_kurikulum,
				'stok_kurikulum'	  	=> $stok_kurikulum,
				'keterangan'  		=> $keterangan,
			
			);
		
		$where = array(
			'id_kurikulum' => $id_kurikulum 
			);
		$this->M_photo_booth->updatedata('tbl_kurikulum',$data,$where);



		redirect('kurikulum/index');
	}
}
 ?>