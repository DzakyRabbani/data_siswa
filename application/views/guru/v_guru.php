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
                <h4 style="color: white;">Table Guru</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">

				<table class="table table-striped table-md" id = "tbl_guru">
                        <thead>
					            	<tr>
		                      	  <th>No</th>
		                          <th>Id Guru</th>
                              <th>Nama Guru</th>
                              <th>Alamat</th>
                              <th>No Telp</th>
                              <th>Action</th>              
                            </tr>
                          </thead>
                          <tbody>
						            <?php 
                            $no = 1;
                       		  foreach ($guru as $row): ?>
	                        <tr>
	                            <td><?= $no++; ?></td>
                              <td><?= $row->id_guru; ?></td>
                              <td><?= $row->nama_guru; ?></td>
                              <td><?= $row->alamat; ?></td>
                              <td><?= $row->no_telp; ?></td>
	                            <td><?= anchor('guru/edit/' .$row->id_guru , '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')  ?>
							  	      <a onclick="javascript: return confirm('Anda Yakin Mau Menghapus')" href="<?= site_url('guru/delete/').$row->id_guru  ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>  
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
       <form action="<?= base_url(). 'guru/insert_action'; ?>" method="post" enctype="multipart/form-data">
       		
       		<div class="form-group">
       			<label>Id_guru</label>
       			<input type="text" name="id_guru" class="form-control" required="true">
			    </div>
          <div class="form-group">
       			<label>Nama_guru</label>
       			<input type="text" name="nama_guru" class="form-control" required="true">
			    </div>
          <div class="form-group">
       			<label>Alamat</label>
       			<textarea input type="text" name="alamat" class="form-control" required="true"></textarea>
			    </div>
          <div class="form-group">
       			<label>No_Telp</label>
       			<input type="number" name="no_telp" class="form-control" required="true">
			    </div>
          <div class="modal-footer">
		        <button type="submit" class="btn btn-danger">Save</button>
		      </div>
		</form>
    </div>
  </div>
</div> 
<?php $this->load->view("asesoris/footer.php") ?>