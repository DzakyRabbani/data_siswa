<div class="main-content">
      <section class="section">
          <div class="section-header">
            <h1>Data Siswa</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a ><?php echo date("D, d M Y "); ?></a></div>
            </div>
          </div>
      </section>
 	<div class="section-body">
 	<?= $this->session->flashdata('message'); ?>
      <div style="margin-top: 50px; ">
      	<button  class="btn btn-info" data-toggle="modal" data-target="#insert"><i class="fas fa-plus fa-sm"></i> Add Data</button>
      </div>
  	    <div class="card mt-2">
                <div class="card-header" style="background:#0CB5D3;">
                <h4 style="color: white;">Table Kurikulum</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">

				<table class="table table-striped table-md" id = "tbl_kurikulum">
                        <thead>
						<tr>
		                    	<th>No</th>
		                        <th>Nama Kurikulum</th>
		                        <th>Id Siswa</th>
		                        <th>Id Guru</th>
		                        <th>Tanggal Masuk</th>
		                        <th>Harga kurikulum</th>
								<th>Stok kurikulum</th>
								<th>Keterangan</th>
								<th>Action</th>
		                    </tr>
                          </thead>
                          <tbody>
						  <?php 
                       		$no = 1;
                       		foreach ($kurikulum as $row): ?>
	                        <tr>
	                            <td><?= $no++; ?></td>
								<td><?= $row->nama_kurikulum; ?></td>
								<td><?= $row->id_siswa; ?></td>
								<td><?= $row->id_guru; ?></td>
								<td><?= $row->tgl_masuk; ?></td>
	                            <td><?= $row->harga_kurikulum; ?></td>
	                            <td><?= $row->stok_kurikulum; ?></td>
								<td><?= $row->keterangan; ?></td>
	                            <td><?= anchor('kurikulum/edit/' .$row->id_kurikulum , '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')  ?>
								<a onclick="javascript: return confirm('Anda Yakin Mau Menghapus')" href="<?= site_url('kurikulum/delete/').$row->id_kurikulum  ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>  
								</td>
	                        </tr>
                        	<?php endforeach ?>
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
  </div>	
</div>
<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="<?= base_url(). 'kurikulum/insert_action'; ?>" method="post" enctype="multipart/form-data">
       		
	   		<div class="form-group">
       			<label>Id_kurikulum</label>
       			<input type="text" name="id_kurikulum" class="form-control" required="true">
			</div>
       		<div class="form-group">
       			<label>Nama_kurikulum</label>
       			<input type="text" name="nama_kurikulum" class="form-control" required="true">
			</div>
			<div class="form-group">
       			<label>Id_siswa</label>
			 <select class="form-control" name="id_siswa">
            	<?php foreach ($siswa as $row): ?>
             	 <option value="<?= $row->id_siswa ?>" ><?= $row->id_siswa ?></option>
            	<?php endforeach ?>
            </select>  	
	    	</div>
       		<div class="form-group">
       			<label>Id_guru</label>
			<select class="form-control" name="id_guru">
            	<?php foreach ($guru as $row): ?>
             	 <option value="<?= $row->id_guru ?>" ><?= $row->id_guru ?></option>
            	<?php endforeach ?>
            </select>  			
				</div>
			 <div class="form-group">
       			<label>Tanggal_Masuk</label>
       			<input type="date" name="tgl_masuk" class="form-control" required="true">
			</div>
			<div class="form-group">
       			<label>Harga_kurikulum</label>
       			<input type="text" name="harga_kurikulum" class="form-control" required="true">
			   </div>
			<div class="form-group">
       			<label>Stok_kurikulum</label>
       			<input type="number" name="stok_kurikulum" class="form-control" required="true">
			</div>
			<div class="form-group">
       			<label>Keterangan</label>
       			<input type="text" name="keterangan" class="form-control" required="true">
			   </div>
	       <div class="modal-footer">
		        <button type="submit" class="btn btn-danger">Save</button>
		      </div>
		</form>
    </div>
  </div>
</div> 

<?php $this->load->view("asesoris/footer.php") ?>