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
      	<button class="btn btn-info" data-toggle="modal" data-target="#insert"><i class="fas fa-plus fa-sm"></i> Add Data</button>
      </div>
  	    <div class="card mt-2">
                <div class="card-header" style="background:#0CB5D3;">
                <h4 style="color: white;">Table Kepala sekolah</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">

				<table class="table table-striped table-md" id = "tbl_kepala_sekolah">
                        <thead>
						<tr>
		                    	<th>No</th>
		                        <th>Id Kepala Sekolah</th>
		                        <th>Id Kurikulum</th>
                                <th>Id User</th>
                                <th>Jumlah Beli</th>
                                <th>Total Harga</th>
                                <th>Tgl Beli</th>
								<th>Action</th>
		                    </tr>
                          </thead>
                          <tbody>
						  <?php 
                       		$no = 1;
                       		foreach ($kepala_sekolah as $row): ?>
	                        <tr>
	                            <td><?= $no++; ?></td>
								<td><?= $row->id_kepala_sekolah; ?></td>
								<td><?= $row->id_kurikulum; ?></td>
								<td><?= $row->user_id; ?></td>
								<td><?= $row->jumlah_beli; ?></td>
	                            <td><?= $row->total_harga; ?></td>
	                            <td><?= $row->tgl_beli; ?></td>
	                            <td><?= anchor('kepala_sekolah/edit/' .$row->id_kepala_sekolah , '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')  ?>
								<a onclick="javascript: return confirm('Anda Yakin Mau Menghapus')" href="<?= site_url('kepala_sekolah/delete/').$row->id_kepala_sekolah  ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>  
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
       <form action="<?= base_url(). 'kepala_sekolah/insert_action'; ?>" method="post" enctype="multipart/form-data">
       		
	   		<div class="form-group">
       			<label>Id Kepala Sekolah</label>
       			<input type="text" name="id_kepala_sekolah" class="form-control" required="true">
			</div>
       		<div class="form-group">
       			<label>Id Kurikulum</label>
       			<select class="form-control" name="id_kurikulum">
            	<?php foreach ($kurikulum as $row): ?>
             	 <option value="<?= $row->id_kurikulum ?>" ><?= $row->id_kurikulum ?></option>
            	<?php endforeach ?>
            </select>  	
			</div>
			<div class="form-group">
       			<label>User Id</label>
       			<select class="form-control" name="user_id">
            	<?php foreach ($user as $row): ?>
             	 <option value="<?= $row->user_id ?>" ><?= $row->user_id ?></option>
            	<?php endforeach ?>
            </select>  	
			</div>
       		<div class="form-group">
       			<label>Jumlah Beli</label>
       			<input type="number" name="jumlah_beli" class="form-control" required="true">
			</div>
			 <div class="form-group">
       			<label>Total Harga</label>
       			<input type="text" name="total_harga" class="form-control" required="true">
			</div>
			<div class="form-group">
       			<label>Tgl Beli</label>
       			<input type="date" name="tgl_beli" class="form-control" required="true">
			   </div>
	       <div class="modal-footer">
		        <button type="submit" class="btn btn-danger">Save</button>
		      </div>
		</form>
    </div>
  </div>
</div> 

<?php $this->load->view("asesoris/footer.php") ?>