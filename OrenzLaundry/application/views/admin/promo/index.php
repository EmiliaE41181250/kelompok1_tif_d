  <div class="container-fluid">

    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Promo</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Promo</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-6">
        <button class="btn btn-sm btn-ijo mb-2" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Barang</button>
      </div>
    </div>

    <?php echo $this->session->flashdata('pesan');?>
    <div class="row card shadow">
      <div class="col card-body table-responsive">
        <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="font-weight-bolder">
              <th>NO</th>
              <th>JUDUL PROMO</th>
              <th>DISKON</th>
              <th>KODE</th>
              <th>STATUS</th>
              <th>AKSI</th>
            </tr>
          </thead>

          <tbody>
          <?php 
          $no = 1;
          foreach ($promo as $prm ) { ?>
            <tr>
              <td><?=$no++?></td>
              <td><?=$prm->judul_promo?></td>
              <td><?=$prm->jumlah?>%</td>
              <td><?=$prm->kode?></td>
              <td class="text-center">
                <?php if($prm->status == "Aktif"){?>
                <span class="badge badge-pill px-4 badge-warning"><?=$prm->status?></span>
                <?php }else{ ?>
                <span class="badge badge-pill px-4 badge-secondary"><?=$prm->status?></span>
                <?php }?>
              </td>
              <td class="text-center">
                <a href="<?=base_url('admin/Promo/detail/' . $prm->id_promo)?>" 
                class="btn btn-info mb-2 btn-sm"><i class="px-1 fa fa-info"></i></a>
                <a href="<?=base_url('admin/Promo/edit/' . $prm->id_promo)?>" 
                class="btn btn-primary mb-2 btn-sm"><i class="fa fa-edit"></i></a>
                <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini (<?=$prm->judul_promo?>)?');" href="<?=base_url('admin/Promo/destroy/' . $prm->id_promo)?>" 
                class="btn btn-danger mb-2 btn-sm"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <form action="<?= base_url() . 'admin/Promo/tambah'; ?>" method="post" enctype="multipart/form-data">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bolder text-ijo">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="judul_promo">Judul Promo</label>
          <input type="text" name="judul_promo" id="judul_promo" class="form-control" placeholder="Masukkan Judul Promo . ." aria-describedby="JudulPromo" maxlength="100" required>
          <small id="JudulPromo" class="text-muted">Masukkan Judul Promo tidak lebih dari 100 Karakter</small>
        </div>
        <div class="form-group">
          <label for="deskripsi">Deskripsi</label>
          <textarea type="text" name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan Deskripsi . ." aria-describedby="descPromo" required></textarea>
          <small id="descPromo" class="text-muted">Tulislah deskripsi idealnya 1 Paragraph.</small>
        </div>
        <div class="form-group">
          <label for="">Syarat & Ketentuan</label>
          <textarea type="text" name="syarat_ketentuan" id="editor1" class="form-control" placeholder="Masukkan Syarat & Ketentuan" aria-describedby="helpId" required></textarea>
        </div>
        <div class="form-group">
          <label for="jumlah">Jumlah Diskon</label><br>
          <input type="number" name="jumlah" id="jumlah" class="form-control d-inline w-25" placeholder="Diskon . ." aria-describedby="jumlahDiskon" min="0" max="99" required> / 100 <br>
          <small id="jumlahDiskon" class="text-muted">Tuliskan jumlah diskon dari 0 - 99</small>
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-10">
            <div class="form-group">
              <label for="awal">Pilih Awal Periode Promo</label>
              <input type="date" name="awal" id="awal" class="form-control" required>
            </div>
          </div>
          <div class="col-lg-6 col-md-10">
            <div class="form-group">
              <label for="akhir">Pilih Akhir Periode Promo</label>
              <input type="date" name="akhir" id="akhir" class="form-control" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="gambar_promo">Banner Promo</label>
          <div class="custom-file mb-2">
              <input type="file" class="custom-file-input" name="gambar_promo" id="gambar_promo" required>
              <label class="custom-file-label" for="gambar_promo">Masukkan Gambar berukuran 753 x 258 . .</label>
          </div>
          <small id="gambarPromo" class="form-text text-muted">Pilihlah File gambar banner promo berukuran 710 x 285. Max 3 MB. Format (JPG/PNG)</small>
        </div>
        <div class="form-group">
          <label for="kode_promo">Kode Promo</label>
          <input type="text" name="kode_promo" id="kode_promo" class="form-control" placeholder="Masukkan Kode Promo . ." aria-describedby="KodePromo" maxlength="50" required>
          <small id="KodePromo" class="text-muted">Masukkan Kode Promo tidak lebih dari 50 Karakter</small>
        </div>
        <div class="form-group w-50">
          <label for="status">Status Promo</label>
          <select class="form-control" name="status" id="status" required>
            <option>Pilih Status Promo :</option>
            <option value="Aktif">Aktif</option>
            <option value="Draft">Draft</option>
          </select>
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

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'editor1' );
</script>


