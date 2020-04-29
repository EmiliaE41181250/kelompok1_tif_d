<div class="container-fluid">
  <div class="row justify-content-center py-3">
    <div class="col-md-8 card p-0">
      <div class="card-header pb-0">
        <h2 class="font-weight-bolder mb-0">Edit Data Promo</h2>
        <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/C_isipaket"></i>Isi Paket</a></li>
            <li class="breadcrumb-item active">Edit Isi Paket</li>
        </ul>
      </div>
      <div class="card-body">

        <?php foreach ($isi_paket as $ip) { ?>
          
          <form action="<?=  base_url() . 'admin/C_isipaket/update'?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_isi_paket" value="<?=$ip->id_isi_paket?>">

            <div class="form-group">
              <label for="judul_promo">Isi Paket</label>
              <input value="<?=$ip->nama_isi_paket?>" type="text" name="nama_isi_paket" id="nama_isi_paket" class="form-control" placeholder="Masukkan Isi Paket . ." aria-describedby="NamaIsiPaket" maxlength="100" required>
              <small id="NamaIsiPaket" class="text-muted">Masukkan Isi Paket tidak lebih dari 100 Karakter</small>
            </div>
            <div class="form-group">
              <label for="deskripsi">Keterangan</label>
              <textarea type="text" name="keterangan" id="keterangan" class="form-control" aria-describedby="ketIsiPaket" required><?=$ip->keterangan?></textarea>
              <small id="ketIsiPaket" class="text-muted">Tulislah keterangan idealnya 1 Paragraph.</small>
            </div>
            <!-- <div class="form-group">
              <label for="">Syarat & Ketentuan</label>
              <textarea type="text" name="syarat_ketentuan" id="editor1" class="form-control" placeholder="Masukkan Syarat & Ketentuan" aria-describedby="helpId" required><?php echo $prm->syarat_ketentuan; ?></textarea>
            </div> -->
            <!-- <div class="form-group">
              <label for="jumlah">Jumlah Diskon</label><br>
              <input value="<?=$prm->jumlah?>" type="number" name="jumlah" id="jumlah" class="form-control d-inline w-25" placeholder="Diskon . ." aria-describedby="jumlahDiskon" min="0" max="99" required> / 100 <br>
              <small id="jumlahDiskon" class="text-muted">Tuliskan jumlah diskon dari 0 - 99</small>
            </div> -->
            <!-- <div class="row">
              <div class="col-lg-6 col-md-10">
                <div class="form-group">
                  <label for="awal">Pilih Awal Periode Promo</label>
                  <input value="<?=substr($prm->awal,0,10);?>" type="date" name="awal" id="awal" class="form-control" required>
                </div>
              </div>
              <div class="col-lg-6 col-md-10">
                <div class="form-group">
                  <label for="akhir">Pilih Akhir Periode Promo</label>
                  <input value="<?=substr($prm->akhir,0,10);?>" type="date" name="akhir" id="akhir" class="form-control" required>
                </div>
              </div>
            </div> -->
            <!-- <div class="form-group">
              <label for="gambar_promo">Banner Promo</label> <br>
              <img src="<?=base_url()?>assets/files/gambar_promo/<?=$prm->gambar?>" alt="Gambar <?=$prm->judul_promo?>" class="w-50 img-fluid img-rounded img-responsive mb-3" required>
              <div class="custom-file">
                  <input type="file" class="custom-file-input" name="gambar_promo" id="gambar_promo">
                  <label class="custom-file-label" for="gambar_promo">Masukkan Gambar berukuran 753 x 258 . .</label>
              </div>
              <small id="gambarPromo" class="form-text text-muted">Pilihlah File gambar banner promo berukuran 753 x 258. Max 3 MB. Format (JPG/PNG)</small>
            </div> -->
            <div class="form-group w-50">
              <label for="status">Status Isi Paket</label>
              <select class="form-control" name="status" id="status" required>
                <option>Pilih Status Isi Paket :</option>
                <option value="Aktif" <?=$ip->status == "Aktif" ? "selected" : ""?>>Aktif</option>
                <option value="Draft" <?=$ip->status == "Draft" ? "selected" : ""?>>Draft</option>
              </select>
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
<script>
    CKEDITOR.replace('editor1');           
</script>
<?php }?>