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
    <?php echo form_open_multipart('kepala_sekolah/update'); ?>
    <div class="card">
      <div class="card-header">
          <h2>Edit Form</h2>
      </div>
      <div class="card-body">
      <?php foreach ($kepala_sekolah as $row) { ?>
         <input type="hidden" name="id_kepala_sekolah" value="<?= $row->id_kepala_sekolah ?>">
        <div class="form-group">
           <label>Id Kurikulum</label>
           <select name="id_kurikulum" class="form-control" value="">  
             <?php foreach ($kurikulum as $row_kurikulum):?>

              <?php if ($row_kurikulum->id_kurikulum == $row->id_kurikulum): ?>
                <option selected value="<?php echo $row_kurikulum->id_kurikulum ?>"><?php echo $row_kurikulum->id_kurikulum ?></option>
              <?php else: ?>
                <option value="<?php echo $row_kurikulum->id_kurikulum ?>"><?php echo $row_kurikulum->id_kurikulum ?></option>
              <?php endif ?>

              <?php endforeach ?>
          </select>          
          </div>
        <div class="form-group">
            <label>User Id</label>
            <select name="user_id" class="form-control" value="">  
             <?php foreach ($user as $row_user):?>

              <?php if ($row_user->user_id == $row->user_id): ?>
                <option selected value="<?php echo $row_user->user_id ?>"><?php echo $row_user->user_id ?></option>
              <?php else: ?>
                <option value="<?php echo $row_user->user_id ?>"><?php echo $row_user->user_id ?></option>
              <?php endif ?>

              <?php endforeach ?>
          </select>                  </div>
        <div class="form-group">
            <label>Jumlah Beli</label>
            <input type="number" name="jumlah_beli" class="form-control" value="<?= $row->jumlah_beli?>">
        </div>
        <div class="form-group">
            <label>Total_Harga</label>
            <input type="text" name="total_harga" class="form-control" value="<?= $row->total_harga?>">
        </div>
        <div class="form-group">
            <label>Tgl Beli</label>
            <input type="date" name="tgl_beli" class="form-control" value="<?= $row->tgl_beli?>">
        </div>

        <div class="modal-footer">
            <a  class="btn btn-success" href="<?= base_url('kepala_sekolah/index') ?>">Back</a>   
            <button type="submit" class="btn btn-danger">Update</button>
        </div>
      <?php  } ?>
    </div>
  </div>     
  <?php form_close();  ?>
  </div>
</div>