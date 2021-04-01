<?php 

class Kepala_sekolah extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') !="login") {
			redirect(base_url("Auth"));
		}
		$this->load->library(array('form_validation','session'));

		$this->load->model('M_versi');
	}
	
	public function index()
	{
		$data['kepala_sekolah'] = $this->M_photo_booth->join_tables2();
		$data['kurikulum'] = $this->M_photo_booth->getdata('tbl_kurikulum');
		$data['user'] = $this->M_photo_booth->getdata('tbl_user');
		$data['sum'] = $this->M_photo_booth->get_sum();

		$this->load->view('kurikulum/template/header');
		$this->load->view('kurikulum/template/sidebar');
		$this->load->view('kepala_sekolah/v_kepala_sekolah',$data);
		$this->load->view('kurikulum/template/footer');
	}
	public function insert_action()
	{
		$id_kepala_sekolah 			=  $this->input->post('id_kepala_sekolah');
		$id_kurikulum    	        =  $this->input->post('id_kurikulum');
		$user_id    	    	=  $this->input->post('user_id');
		$jumlah_beli            =  $this->input->post('jumlah_beli');
		$total_harga     	    =  $this->input->post('total_harga');
		$tgl_beli 		        =  $this->input->post('tgl_beli');

		$data = array(
				'id_kepala_sekolah'   		=> $id_kepala_sekolah,
				'id_kurikulum' 		    => $id_kurikulum,
				'user_id'    		    => $user_id,
				'jumlah_beli'   	    => $jumlah_beli,
				'total_harga'	  	    => $total_harga, 
				'tgl_beli'	        	=> $tgl_beli,
				
			);
		$save = $this->db->insert('tbl_kepala_sekolah',$data);	
		if ($save) {
			$alert = '<div class="alert alert-success"><strong>Insert Data Complate</strong></div>';
			$this->session->set_flashdata('message',$alert);
		redirect('kepala_sekolah/index');
		}
	}


	public function delete($id)
	{
		$where = array('id_kepala_sekolah' => $id);
		$data   = $this->db->get_where('tbl_kepala_sekolah',$where)->row_array(); 
		
		$hapus = $this->M_photo_booth->deletedata($where,'tbl_kepala_sekolah');
		redirect('kepala_sekolah/index');
	}


	public function edit($id)
	{
		$where = array('id_kepala_sekolah' => $id);
		$data['kepala_sekolah'] = $this->M_photo_booth->editdata($where,'tbl_kepala_sekolah')->result();
		$data['kurikulum'] = $this->M_photo_booth->getdata('tbl_kurikulum');
		$data['user'] = $this->M_photo_booth->getdata('tbl_user');

		$this->load->view('kurikulum/template/header');
		$this->load->view('kurikulum/template/sidebar');
		$this->load->view('kepala_sekolah/edit_kepala_sekolah',$data);
		$this->load->view('kurikulum/template/footer');		
	}
	public function update()
	{
		$id_kepala_sekolah 			=  $this->input->post('id_kepala_sekolah');
		$id_kurikulum          	=  $this->input->post('id_kurikulum');
		$user_id    	    	=  $this->input->post('user_id');
		$jumlah_beli            =  $this->input->post('jumlah_beli');
		$total_harga     	    =  $this->input->post('total_harga');
		$tgl_beli 		        =  $this->input->post('tgl_beli');

		
		$data = array(
				'id_kepala_sekolah'   		=> $id_kepala_sekolah,
				'id_kurikulum' 		    => $id_kurikulum,
				'user_id'    	    	=> $user_id,
				'jumlah_beli' 	        => $jumlah_beli,
				'total_harga'	  		=> $total_harga, 
				'tgl_beli'	  	        => $tgl_beli,
			
			);
		
		$where = array(
			'id_kepala_sekolah' => $id_kepala_sekolah 
			);
		$this->M_photo_booth->updatedata('tbl_kepala_sekolah',$data,$where);



		redirect('kepala_sekolah/index');
	}
}
 ?>