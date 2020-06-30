<div class="container-fluid">
  <div class="row justify-content-center py-3">
    <div class="col-md-8 card p-0">
      <div class="card-header pb-0">
        <h2 class="font-weight-bolder mb-0">Edit Durasi Paket</h2>
        <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/C_durasipaket"></i>Durasi Paket</a></li>
            <li class="breadcrumb-item active">Edit Durasi Paket</li>
        </ul>
      </div>
      <div class="card-body">

      <?php foreach ($durasi_paket as $ip) { ?>

    <form action="<?= base_url() . 'admin/C_durasipaket/update'; ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_durasi" value="<?=$ip->id_durasi?>">

      <div class="modal-header">
        <h5 class="modal-title font-weight-bolder text-ijo">Tambah Durasi Paket</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="durasi_paket">Durasi</label>
          <input required value="<?=$ip->durasi_paket?>" type="text" name="durasi_paket" id="durasi_paket" class="form-control" placeholder="Masukkan Durasi paket . ." aria-describedby="durasipaket" maxlength="100">
          <small id="durasi_paket" class="text-muted">Masukkan Durasi Paket</small>
        </div>
        <div class="form-group w-50">
          <label for="status">Status Durasi</label>
          <select required class="form-control" name="status" id="status">
            <option value="">Pilih Status Paket :</option>
            <option value="Aktif" <?=$ip->status == "Aktif" ? "selected" : ""?>>Aktif</option>
            <option value="Draft" <?=$ip->status == "Draft" ? "selected" : ""?>>Draft</option>
          </select>
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
          