<div class="container-fluid">

<!-- Page Heading -->
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
                  <a class="btn btn-sm btn-primary mb-2" href="<?=base_url()?>admin/C_transaksi/edit/<?=$trs->id_transaksi?>"><i class="fas fa-edit fa-sm mr-2"></i>Edit Transaksi</a>
                  <a class="btn btn-sm btn-warning mb-2" href="<?=base_url()?>admin/C_transaksi/nota/<?=$trs->id_transaksi?>"><i class="fas fa-file-pdf fa-sm mr-2"></i>Nota Transaksi</a>
                </div>
              </div>
            </div>
        </div>
    </div>
    
    <?php echo $this->session->flashdata('pesan');?>
    <div class="">
    <div class="card shadow">
    <div class="card-header text-center text-light bg-warning">
    </div>
    <div class="card-body py-4 px-5 ">
      <table class="w-100 table text-center py-0 m-0">
        <tbody>
          <tr>
            <td class="text-left"><strong>ID TRS : </strong><?=$trs->id_transaksi?></td>
            <td colspan="3" class="text-right"><?=$trs->tgl_transaksi?></td>
          <tr>
        </tbody>
      </table>
      <table class="w-100 table table-bordered table-hover text-center">
        <thead>
          <tr>
            <th>Paket</th>
            <th>Berat(kg)</th>
            <th>Harga(Rp)</th>
            <th>Subtotal(Rp)</th>
          </tr>
          
        </thead>
        <tbody>
        <?php
        foreach ($detail as $dn ) {
          $ik = $this->db->query("SELECT nama_paket, harga FROM paket WHERE id_paket = '$dn->id_paket'")->row();?>
          <tr>
            <!-- NAMA PRODUK, WARNA, UKURAN, BAHAN -->
            <td style="width: 30%;"><p><?=$ik->nama_paket?></p></td>
            <td><?=$dn->berat?></td>
            <td><?=$ik->harga?></td>
            <td><?=$dn->sub_total?></td>
          </tr>

        <?php }?>
          
          <tr class="font-weight-bolder">
            <td class="border-0"> </td>
            <td class="text-right ">Total Harga : </td>
            <td colspan="3" class="text-right "><?=$trs->total_harga?></td>
          <tr>
          <tr class="font-weight-bolder">
            <td class="border-0"> </td>
            <td class="text-right ">Diskon : </td>
            <?php $promo = $this->db->query("SELECT jumlah FROM promo WHERE id_promo = '$trs->id_promo'")->row();?>
            <td colspan="3" class="text-right " ><?=$promo->jumlah?>%</td>
          <tr>
          <tr class="font-weight-bolder">
            <td class="border-0"> </td>
            <td class="text-right ">Status : </td>
            <td colspan="3" class="text-right " >
            <?php if($trs->status == 0){?>
                <span class="badge badge-pill px-4 badge-secondary">Penjemputan Cucian</span>
                <?php }else if($trs->status == 1){ ?>
                <span class="badge badge-pill px-4 badge-secondary">Proses Sorting dan Timbang</span>
                <?php }else if($trs->status == 2){?>
                <span class="badge badge-pill px-4 badge-warning">Permohonan Konfirmasi Customer</span>
                <?php }else if($trs->status == 3){?>
                <span class="badge badge-pill px-4 badge-warning">Sedang Memproses Pesanan</span>
                <?php }else if($trs->status == 4){?>
                <span class="badge badge-pill px-4 badge-primary">Cucian siap diantar</span>
                <?php }else if($trs->status == 5){?>
                <span class="badge badge-pill px-4 badge-primary">Pesanan telah diantar</span>
                <?php }else if($trs->status == 6){?>
                <span class="badge badge-pill px-4 badge-danger">Pesanan dibatalkan</span>
                <?php }?>
            </td>
          <tr>
          <tr class="font-weight-bolder">
            <td class="border-0"> </td>
            <td class="text-right ">Tanggal Jemput : </td>
            <td colspan="3" class="text-right " ><?=$trs->tgl_jemput?></td>
          </tr>
          <tr>
          <tr class="font-weight-bolder">
            <td class="border-0"> </td>
            <td class="text-right ">Tanggal Antar : </td>
            <td colspan="3" class="text-right " ><?=$trs->tgl_antar?></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      </div>
    </div>
  </div>
 </div>