<div class="container-fluid">
  <div class="row justify-content-center py-3">
    <div class="col-md-8 card p-0">
      <div class="card-header pb-0">
        <h2 class="font-weight-bolder mb-0">Tambah Data Detail Transaksi</h2>
        <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/C_transaksi"></i> Transaksi</a></li>
            <li class="breadcrumb-item active">Edit Detail Transaksi</li>
        </ul>
      </div>
      <div class="card-body">

        <?php foreach ($transaksi as $trs) { ?>
          
          <form action="<?=  base_url() . 'admin/C_transaksi/tambahdetail'?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_transaksi" value="<?=$trs->id_transaksi?>">

            <div class="form-group">
              <label for="nama_paket">Nama Paket</label>
                <select name="id_paket" id="nama_paket" class="selectpicker form-control mb-3" data-live-search="true" placeholder="Masukkan Jenis Paket . ." aria-describedby="formPaket">
                  <option value=""> Please select </option>
                  <?php foreach ($paket as $pk ) { ?>
                  <option value="<?=$pk->id_paket?>" harga="<?=$pk->harga?>"><?=$pk->nama_paket?> => Harga Rp. <?=$pk->harga?></option>
                  <?php }?>
                </select>
            </div>

            <div class="form-group">
              <label for="berat">Berat</label>
              <input value="" type="number" min="0" step=".0001" name="berat" id="berat_tambah" class="form-control w-50" placeholder="Masukkan Berat Cucian . ." aria-describedby="Berat" required>
            </div>

            <div class="form-group">
              <label for="sub_total">Sub Total</label>
              <input readonly value="" type="number" min="0" name="sub_total" id="sub_total" class="form-control w-50" placeholder="Masukkan Sub Total Harga . ." aria-describedby="SubTotal" required>
            </div>

            <div class="form-group text-center">
              <button class="btn btn-primary px-2 mr-1" type="submit">Simpan</button>
              <button class="btn btn-secondary" onclick="window.history.back()"><i class="fas fa-arrow-left"></i></button>
            </div>
          </form>

        <?php }?>
      </div>
    </div>
  </div>
