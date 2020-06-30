<div class="container-fluid">
  <div class="row justify-content-center py-3">
    <div class="col-md-12 card p-0">
      <div class="card-header pb-0">
      <div class="block-header">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h2 class="font-weight-bolder">Detail Transaksi</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Detail Transaksi</li>
                </ul>
            </div>
            <div class="col-md-6 col-sm-12">
              <?php foreach ($transaksi as $trs) {  ?>
              <div class="row">
                <div class="col-12 text-right pt-4">
                  <a class="btn btn-sm btn-ijo mb-2" href="<?=base_url()?>admin/notifikasi/detail/<?=$trs->id_transaksi?>"><i class="fas fa-clipboard-list fa-sm mr-2"></i>Detail Transaksi</a>
                  <a class="btn btn-sm btn-warning mb-2" href="<?=base_url()?>admin/notifikasi/cetak_nota"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Pdf</a>
                </div>
              </div>
            </div>
        </div>
    </div>
      </div>
      <div class="card-body">
      <?php echo $this->session->flashdata('pesan_trs');?>
      <?php echo $this->session->flashdata('pesan_saldo');?>

    <form action="<?= base_url() . 'admin/C_transaksi/update_status'; ?>" method="post" enctype="multipart/form-data">
    <div class="row">
    <input type="hidden" name="id_transaksi" value="<?=$trs->id_transaksi?>">

    <div class="col-md-6 col-sm-12">
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">ID Transaksi</span>
        </div>
        <input disabled type="text" class="form-control" value="<?=$trs->id_transaksi?>">
      </div>

      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Nama Customer</span>
        </div>
        <input disabled type="text" class="form-control" value="<?php foreach ($user as $us){ echo $us->id_user == $trs->id_user ? $us->nama_user : ""; }?>">
      </div>

      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Nama Admin</span>
        </div>
        <input disabled type="text" class="form-control" value="<?php foreach ($admin as $ad){ echo $ad->id_admin == $trs->id_admin ? $ad->nama_admin : ""; }?>">
      </div>

      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Nama Promo</span>
        </div>
        <input disabled type="text" class="form-control" value="<?php foreach ($promo as $prm){ echo $prm->id_promo == $trs->id_promo ? $prm->judul_promo : ""; }?>">
      </div>

      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Waktu Kurir</span>
        </div>
        <input disabled type="text" class="form-control" value="<?php foreach ($waktu as $wkt){ echo $wkt->id == $trs->id_waktu ? $wkt->waktu : ""; }?>">
      </div>

      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Tanggal & Waktu</span>
        </div>
        <input disabled type="text" class="form-control" value="<?=$trs->tgl_transaksi?>">
      </div>

      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Total Harga</span>
        </div>
        <input disabled type="text" class="form-control" value="<?=$trs->total_harga?>">
      </div>
    </div>

    <div class="col-md-6 col-sm-12">
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Tanggal Antar</span>
        </div>
        <input disabled type="text" class="form-control" value="<?= $trs->tgl_antar != null ? substr($trs->tgl_antar, 0, 10) : "";?>">
      </div>

      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Tanggal Jemput</span>
        </div>
        <input disabled type="text" class="form-control" value="<?= $trs->tgl_jemput != null ? substr($trs->tgl_jemput, 0, 10) : "";?>">
      </div>

      <?php if($trs->alamat_antar != null) { $arr_almantar = preg_split ("/\,/", $trs->alamat_antar);?>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Alamat Antar</span>
        </div>
        <input disabled type="text" class="form-control" value="<?=$arr_almantar[0]?>">
      </div>

      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Maps Alamat Antar</span>
        </div>
        <a class="form-control" target="_blank" href="https://www.google.com/maps/?q=<?=$arr_almantar[1]?>,<?=$arr_almantar[2]?>">Link Maps</a>
      </div>

      <?php }else{?>

        <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Alamat Antar</span>
        </div>
        <input disabled type="text" class="form-control" value="-">
      </div>

      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Maps Alamat Antar</span>
        </div>
        <input disabled type="text" class="form-control" value="-">
      </div>

      <?php }?>

      <?php if($trs->alamat_jemput != '') { $arr_almjemput = preg_split ("/\,/", $trs->alamat_jemput);?>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Alamat Jemput</span>
        </div>
        <input disabled type="text" class="form-control" value="<?=$arr_almjemput[0]?>">
      </div>

      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Maps Alamat Jemput</span>
        </div>
        <a class="form-control" target="_blank" href="https://www.google.com/maps/?q=<?=$arr_almjemput[1]?>,<?=$arr_almjemput[2]?>">Link Maps</a>
      </div>

      <?php }else{?>

        <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Alamat Jemput</span>
        </div>
        <input disabled type="text" class="form-control" value="-">
      </div>

      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Maps Alamat Jemput</span>
        </div>
        <input disabled type="text" class="form-control" value="-">
      </div>

      <?php }?>

      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <span class="input-group-text">Status</span>
        </div>
        <select name="status" class="form-control"  id="status">
          <option value="0" <?= $trs->status == 0 ? "selected" : "" ;?>>0. Penjemputan Cucian</option>
          <option value="1" <?= $trs->status == 1 ? "selected" : "" ;?>>1. Proses Sorting dan Timbang</option>
          <option value="2" <?= $trs->status == 2 ? "selected" : "" ;?>>2. Permohonan Konfirmasi Customer</option>
          <option value="3" <?= $trs->status == 3 ? "selected" : "" ;?>>3. Sedang Memproses Pesanan</option>
          <option value="4" <?= $trs->status == 4 ? "selected" : "" ;?>>4. Cucian siap diantar</option>
          <option value="5" <?= $trs->status == 5 ? "selected" : "" ;?>>5. Pesanan telah diantar</option>
          <option value="6" <?= $trs->status == 6 ? "selected" : "" ;?>>6. Pesanan dibatalkan</option>
        </select>
      </div>
    </div>
    </div>

    <div class="form-group text-center mt-2">
      <button class="btn btn-primary px-2 mr-1" type="submit">Simpan</button>
      <button class="btn btn-secondary" onclick="window.history.back()"><i class="fas fa-arrow-left"></i></button>
    </div>

    </form>


    <div class="row card mt-3 mx-1">
      <div class="col card-body table-responsive">
        <h2>Detail Transaksi</h2>
        <div class="row">
          <div class="col-6">
            <a href="<?= base_url() . 'admin/C_transaksi/adddetail/' . $trs->id_transaksi;?>" class="btn btn-sm btn-ijo mb-2"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Paket</a>
          </div>
        </div>
        <?php echo $this->session->flashdata('pesan');?>
        <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Paket</th>
            <th>Harga</th>
            <th>Berat (kg)</th>
            <th>Sub Total</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($detail as $dt ) { 
        //$jenis = $this->db->query("SELECT nama_jenis_paket FROM jenis_paket WHERE id_jenis_paket = '$pk->id_jenis_paket'")->row();?>
          <tr>
            <td><?=$no++?></td>
            <td><?php foreach ($paket as $pk){ echo $pk->id_paket == $dt->id_paket ? $pk->nama_paket : ""; }?></td>
            <td><?php foreach ($paket as $pk){ echo $pk->id_paket == $dt->id_paket ? "Rp. " . number_format($pk->harga, 0, ",", ".") : ""; }?></td>
            <td><?=$dt->berat?></td>
            <td>Rp. <?=number_format($dt->sub_total, 0, ",", ".")?></td>
            <td class="text-center">
              <?php echo anchor('admin/C_transaksi/editdetail/' . $dt->id_paket . "/" . $trs->id_transaksi, '<div class="btn btn-primary btn-sm mr-2"><i class="fa fa-edit"></i></div>')?>
              <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini (<?=$pk->nama_paket?>)?');" href="<?=base_url('admin/c_transaksi/destroydetail/' . $dt->id_paket . "/" . $trs->id_transaksi)?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
    </div>
    </div>
    </div>
  </div>

  
</div>
<script>
    CKEDITOR.replace('editor1');           
</script>
<?php }?>
          