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
    <?php echo form_open_multipart('kurikulum/update'); ?>
    <div class="card">
      <div class="card-header">
          <h2>Edit Form</h2>
      </div>
      <div class="card-body">
      <?php foreach ($kurikulum as $row) { ?>
         <input type="hidden" name="id_kurikulum" value="<?= $row->id_kurikulum ?>">
        <div class="form-group">
           <label>Nama Kurikulum</label>
           <input type="text" name="nama_kurikulum" class="form-control" value="<?= $row->nama_kurikulum ?>">
        </div>
        <div class="form-group">
            <label>Id Siswa</label>
            <select name="id_siswa" class="form-control" value="">  
             <?php foreach ($siswa as $row_siswa):?>

              <?php if ($row_siswa->id_siswa == $row->id_siswa): ?>
                <option selected value="<?php echo $row_siswa->id_siswa ?>"><?php echo $row_siswa->id_siswa ?></option>
              <?php else: ?>
                <option value="<?php echo $row_siswa->id_siswa ?>"><?php echo $row_siswa->id_siswa ?></option>
              <?php endif ?>

              <?php endforeach ?>
          </select>       
           </div>
        <div class="form-group">
            <label>Id Guru</label>
            <select name="id_guru" class="form-control" value="">  
             <?php foreach ($guru as $row_guru):?>

              <?php if ($row_guru->id_guru == $row->id_guru): ?>
                <option selected value="<?php echo $row_guru->id_guru ?>"><?php echo $row_guru->id_guru ?></option>
              <?php else: ?>
                <option value="<?php echo $row_guru->id_guru ?>"><?php echo $row_guru->id_guru ?></option>
              <?php endif ?>

              <?php endforeach ?>
          </select>          
         </div>
        <div class="form-group">
            <label>Tanggal_Masuk</label>
            <input type="date" name="tgl_masuk" class="form-control" value="<?= $row->tgl_masuk?>">
        </div>
        <div class="form-group">
            <label>Harga_kurikulum</label>
            <input type="text" name="harga_kurikulum" class="form-control" value="<?= $row->harga_kurikulum?>">
        </div>
        <div class="form-group">
            <label>Stok_kurikulum</label>
            <input type="text" name="stok_kurikulum" class="form-control" value="<?= $row->stok_kurikulum?>">
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="<?= $row->keterangan?>">
        </div>

        <div class="modal-footer">
            <a  class="btn btn-success" href="<?= base_url('kurikulum/index') ?>">Back</a>   
            <button type="submit" class="btn btn-danger">Update</button>
        </div>
      <?php  } ?>
    </div>
  </div>     
  <?php form_close();  ?>
  </div>
</div>