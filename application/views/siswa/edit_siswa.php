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
    <?php echo form_open_multipart('siswa/update'); ?>
    <div class="card">
      <div class="card-header">
          <h2>Edit Form</h2>
      </div>
      <div class="card-body">
      <?php foreach ($siswa as $row) { ?>
         <input type="hidden" name="id_siswa" value="<?= $row->id_siswa ?>">
      
        <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" name="siswa" class="form-control" value="<?= $row->siswa?>">
        </div>
        <div class="form-group">
            <label>Rombel</label>
            <input type="text" name="rombel" class="form-control" value="<?= $row->rombel?>">
        </div>
        <div class="form-group">
            <label>Rayon</label>
            <input type="text" name="rayon" class="form-control" value="<?= $row->rayon?>">
        </div>
        <div class="form-grpup">
          <label>Jenis kelamin</label>
          <select name="jk" class="form-control" value="">  
              <?php 

                $jk = [ ['L','1'] , ['P','0'] ];

                for ($i=0; $i < count($jk) ; $i++) {  ?>

                <?php if ($row->jk == $jk[$i][1]): ?>
                  <option selected value="<?php echo $jk[$i][1] ?>"><?php echo $jk[$i][0] ?></option>
                <?php else: ?>
                  <option value="<?php echo $jk[$i][1] ?>"><?php echo $jk[$i][0] ?></option>
                <?php endif ?>

                <?php } ?>
          </select>
        </div>
        <div class="form-grpup">
          <label>Keterangan</label>
          <select name="keterangan" class="form-control" value="">  
              <?php 

                $keterangan = [ ['Masuk','1'] , ['Tidak','0'] ];

                for ($i=0; $i < count($keterangan) ; $i++) {  ?>

                <?php if ($row->keterangan == $keterangan[$i][1]): ?>
                  <option selected value="<?php echo $keterangan[$i][1] ?>"><?php echo $keterangan[$i][0] ?></option>
                <?php else: ?>
                  <option value="<?php echo $keterangan[$i][1] ?>"><?php echo $keterangan[$i][0] ?></option>
                <?php endif ?>

                <?php } ?>
          </select>
        </div>
        <div class="form-group">
            <label>Alasan</label>
            <input type="text" name="alasan" class="form-control" value="<?= $row->alasan?>">
        </div>

        <div class="modal-footer">
            <a  class="btn btn-success" href="<?= base_url('siswa/index') ?>">Back</a>   
            <button type="submit" class="btn btn-danger">Update</button>
        </div>
      <?php  } ?>
    </div>
  </div>     
  <?php form_close();  ?>
  </div>
</div>