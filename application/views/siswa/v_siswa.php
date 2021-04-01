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
                <h4 style="color: white;">Table Siswa</h4>
                     </div>
                           <div class="card-body p-0">
                             <div class="table-responsive">
                               <table class="table table-striped table-md" id = "tbl_siswa">
                              <thead>
		                             <tr>  
		                    	         <th>No</th>
		                               <th>Id Siswa</th>
                                   <th>Nama Siswa</th>
                                   <th>Rombel</th>
                                   <th>Rayon</th>
                                   <th>jk</th>
                                   <th>keterangan</th>
                                   <th>alasan</th>
                                   <th>Created_at</th>
                                  <th>Action</th>
		                           </tr>
                              </thead>
                              <tbody>
                            <?php $no=1; foreach($siswa as $row) :?>
                                <tr>
                                    <th><?php echo $no++?></th>
                                    <th><?php echo $row->id_siswa?></th>
                                    <th><?php echo $row->siswa?></th>
                                    <th><?php echo $row->rombel?></th>
                                    <th><?php echo $row->rayon?></th>
                                    <?php if ($row->jk == 1): ?>
                                    <td>L</td>
                                    <?php else : ?>
                                    <td>P</td>
                                    <?php endif ?>
                                    <?php if ($row->keterangan == 1): ?>
                                    <td>Masuk</td>
                                    <?php else : ?>
                                    <td>Tidak</td>
                                    <?php endif ?>
                                    <th><?php echo $row->alasan?></th>
                                    <th><?php echo $row->created_at?></th>
                                    <td><?= anchor('siswa/edit/' .$row->id_siswa , '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>')  ?>
								                    <a onclick="javascript: return confirm('Anda Yakin Mau Menghapus')" href="<?= site_url('siswa/delete/').$row->id_siswa ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>  
							                  	 </td>
                                </tr>
                            <?php endforeach?>
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
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT SISWA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form action="<?= base_url(). 'siswa/insert_action'; ?>" method="post" enctype="multipart/form-data">
       		
	   		<div class="form-group">
       			<label>Id Siswa</label>
       			<input type="number" name="id_siswa" class="form-control" required="true">
			</div>
       		<div class="form-group">
       			<label>Nama Siswa</label>
       			<input type="text" name="siswa" class="form-control" required="true">
      </div>
      <div class="form-group">
       			<label>Rombel</label>
       			<input type="text" name="rombel" class="form-control" required="true">
         </div>
         <div class="form-group">
       			<label>Rayon</label>
       			<input type="text" name="rayon" class="form-control" required="true">
         </div>
         <div class="form-group">
       			<label>Jenis Kelamin</label>
       			<select class="form-control" name="jk">
       				<option value="1" >L</option>
       				<option value="0">P</option>
       			</select>
         </div>
         <div class="form-group">
       			<label>Keterangan</label>
             <select class="form-control" name="keterangan">
       				<option value="1" >Masuk</option>
       				<option value="0">Tidak</option>
       			</select>
         </div>
         <div class="form-group">
       			<label>Alasan</label>
       			<input type="text" name="alasan" class="form-control" required="true">
			   </div>
      
          
        <div class="modal-footer">
		        <button type="submit" class="btn btn-danger">Save</button>
		      </div>
		</form>
    </div>
  </div>
</div> 

    <?php $this->load->view("asesoris/footer.php") ?>
