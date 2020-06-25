<div class="container-fluid">
  <div class="row justify-content-center py-3">
    <div class="col-md-8 card p-0">
      <div class="card-header pb-0">
        <h2 class="font-weight-bolder mb-0">Edit Data Waktu Kurir</h2>
        <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/c_waktu"></i> Waktu Kurir</a></li>
            <li class="breadcrumb-item active">Edit Waktu Kurir</li>
        </ul>
      </div>
      <div class="card-body">

        <?php foreach ($waktu as $wkt) { ?>
          
          <form action="<?=  base_url() . 'admin/c_waktu/update'?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$wkt->id?>">

            <div class="form-group">
              <label for="waktu">Waktu Kurir</label>
              <input value="<?=$wkt->waktu?>" type="text" name="waktu" id="waktu" class="form-control" placeholder="Masukkan Waktu Kurir . ." aria-describedby="WaktuKurir" maxlength="100" required>
              <small id="WaktuKurir" class="text-muted">Masukkan Waktu Kurir tidak lebih dari 100 Karakter</small>
            </div>

            <div class="form-group text-center">
              <button class="btn btn-primary px-2 mr-1" type="submit">Simpan</button>
              <button class="btn btn-secondary" onclick="window.history.back()"><i class="fas fa-arrow-left"></i></button>
            </div>
          </form>


      </div>
    </div>
  </div>
  
</div>
<?php }?>