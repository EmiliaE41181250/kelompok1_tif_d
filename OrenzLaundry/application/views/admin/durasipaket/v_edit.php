<div class="container-fluid">
  <div class="row justify-content-center py-3">
    <div class="col-md-8 card p-0">
      <div class="card-header pb-0">
        <h2 class="font-weight-bolder mb-0">Edit Durasi Paket</h2>
        <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/C_paket"></i>Durasi Paket</a></li>
            <li class="breadcrumb-item active">Edit Durasi Paket</li>
        </ul>
      </div>
      <div class="card-body">

      <?php foreach ($paket as $pk) { ?>

    <form action="<?= base_url() . 'admin/C_paket/update'; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_durasipaket" value="<?=$pk->id_durasipaket?>">

      <div class="modal-header">
        <h5 class="modal-title font-weight-bolder text-ijo">Tambah Durasi Paket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="nama_paket">Durasi</label>
          <input value="<?=$pk->durasi_paket?>" type="text" name="durasi_paket" id="durasi_paket" class="form-control" placeholder="Masukkan Durasi paket . ." aria-describedby="durasipaket" maxlength="100">
          <small id="durasi_paket" class="text-muted">Masukkan Durasi Paket</small>
        </div>
        <div class="form-group">
          <label for="nama_paket">status durasi</label>
          <input value="<?=$pk->status_durasi?>" type="text" name="status
          _durasi" id="durasi_paket" class="form-control" placeholder="Masukkan status durasi . ." aria-describedby="statusdurasi" maxlength="100">
          <small id="durasi" class="text-muted">Masukkan Durasi Paket</small>
        </div>
          
      <div class="form-group text-center">
        <button class="btn btn-primary px-2 mr-1" type="submit">SIMPAN</button>
        <button class="btn btn-secondary" onclick="window.history.back()"><i class="fas fa-arrow-left"></i></button>
      </div>
    </form>

    </div>
    </div>
  </div>

  
</div>
<script>
    CKEDITOR.replace('editor1');           
</script>
<?php }?>
          