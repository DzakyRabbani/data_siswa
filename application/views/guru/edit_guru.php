<div class="main-content">
  <div class="section-body">  
<!-- 	<?php if($this->session->flashdata('success')){ ?>  
     <div class="alert alert-success" id="flashdata-alert">  
       <a href="#" class="close" data-dismiss="alert">&times;</a>  
       <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>  
     </div>  
   <?php } else if($this->session->flashdata('error')){ ?>  
     <div class="alert alert-danger">  
       <a href="#" class="close" data-dismiss="alert">&times;</a>  
       <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>  
     </div>  
	 <?php }?> -->
    <?php echo form_open_multipart('guru/update'); ?>
    <div class="card">
      <div class="card-header">
          <h2>Edit Form</h2>
      </div>
      <div class="card-body">
      <?php foreach ($guru as $row) : ?>
         <input type="hidden" name="id_guru" value="<?= $row->id_guru ?>">
        <div class="form-group">
           <label>Nama_guru</label>
           <input type="text" name="nama_guru" class="form-control" value="<?= $row->nama_guru ?>">
        </div>
        <div class="form-group">
           <label>Alamat</label>
           <input type="text" name="alamat" class="form-control" value="<?= $row->alamat ?>">
        </div>
        <div class="form-group">
           <label>NO_Telp</label>
           <input type="number" name="no_telp" class="form-control" value="<?= $row->no_telp ?>">
        </div>
        <div class="modal-footer">
            <a  class="btn btn-success" href="<?= base_url('guru/index') ?>">Back</a>   
            <button type="submit" class="btn btn-danger">Update</button>
        </div>
      <?php  endforeach ?>
    </div>
  </div>     
  <?php form_close();  ?>
  </div>
</div>