<div class="container-fluid">

<div class="block-header">
    <div class="row">
        <div class="col-12">
            <h2 class="font-weight-bolder">Data Waktu Kurir</h2>
            <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                <li class="breadcrumb-item active">Waktu Kurir</li>
            </ul>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-6">
    <button class="btn btn-sm btn-ijo mb-2" data-toggle="modal" data-target="#tambah_data"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Data</button>
  </div>
</div>

<?php echo $this->session->flashdata('pesan');?>
<div class="row card shadow">
  <div class="col card-body table-responsive">
    <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr class="font-weight-bolder text-center">
          <th>NO</th>
          <th>WAKTU</th>
          <th>AKSI</th>
        </tr>
      </thead>

      <tbody>
      <?php 
      $no = 1;
      foreach ($waktu as $wkt ) { ?>
        <tr class="text-center">
          <td><?=$no++?></td>
          <td><?=$wkt->waktu?></td>
          <td class="text-center">
            <a href="<?=base_url('admin/c_waktu/edit/' . $wkt->id)?>" 
            class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
            <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini (<?=$wkt->waktu?>)?');" href="<?=base_url('admin/c_waktu/destroy/' . $wkt->id)?>" 
            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php }?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
<form action="<?= base_url() . 'admin/c_waktu/tambah'; ?>" method="post" enctype="multipart/form-data">
  <div class="modal-header">
    <h5 class="modal-title font-weight-bolder text-ijo">Tambah Data</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <div class="modal-body">
    <div class="form-group">
      <label for="waktu">Judul Promo</label>
      <input type="text" name="waktu" id="waktu" class="form-control" placeholder="Masukkan Waktu Kurir . ." aria-describedby="WaktuKurir" maxlength="100" required>
      <small id="WaktuKurir" class="text-muted">Masukkan Judul Promo tidak lebih dari 100 Karakter</small>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-ijo">Tambah</button>
  </div>
</form>
</div>
</div>
</div>


