<div class="container-fluid">

<!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Detail Data Notifikasi</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Detail Notifikasi</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-12 text-right">
        <a class="btn btn-sm btn-warning mb-2" href="<?=base_url()?>admin/C_paket"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Pdf</a>
      </div>
    </div>
    
    <?php echo $this->session->flashdata('pesan');?>
    <div class="container-fluid">
  <div class="card m-5 shadow">
    <div class="card-header text-center text-light bg-primary">
      <a class="mt-2 mr-2 btn btn-light float-right ml-auto" href="nota/nota_pesanan.php?id_pesanan=<?=$id_pesanan?>"><i class="fas fa-fw fa-print"></i></a>
    </div>
    <div class="card-body py-4 px-5 ">
      <table class="w-100 table text-center py-0 m-0">
        <tbody>
        <?php
        foreach ($detail as $dn ) {
          $ik = $this->db->query("SELECT nama_paket FROM paket WHERE id_paket = '$dn->id_paket'")->row();
          $bt = $this->db->query("SELECT berat FROM detail_transaksi = '$dn->berat'")->row();?>
          <tr>
            <td class="text-left"><strong>ID TRS : </strong><?=$dn->id_transaksi?></td>
            <td colspan="3" class="text-right"><?=$dn->tgl_transaksi?></td>
          <tr>
        </tbody>
      </table>
      <table class="w-100 table table-bordered table-hover text-center">
        <thead>
          <tr>
            <th>Paket</th>
            <th>Berat(kg)</th>
            <th>Harga(Rp)</th>
            <th>Subtotal(Rp)</th
          </tr>
        </thead>
        <tbody>
        <tr>
            <!-- NAMA PRODUK, WARNA, UKURAN, BAHAN -->
            <td style="width: 30%;"><p><?php echo "$nama_produk / $jenis_warna / $nama_bahan / $jenis_ukuran";?></p></td>
            <td><?= $status_desain?><br><?=$upload_desain?></td>
            <td><?= $ket_pembayaran?></td>
            <td><?= number_format($quantity, 0,".",".")?></td>
            <td>Rp. <?=number_format($sub_total, 0,".",".")?>,-</td>
          </tr>
          <?php }?>
          <tr class="font-weight-bolder">
            <td class="border-0"> </td>
            <td class="text-right ">Total Harga : </td>
            <td colspan="3" class="text-right " >Rp. <?=number_format($total_harga, 0,".",".")?>,-</td>
          <tr>
          <tr class="font-weight-bolder">
            <td class="border-0"> </td>
            <td class="text-right ">Status Pesanan : </td>
            <td colspan="3" class="text-right " ><?=$ket_status?></td>
          <tr>
          <tr class="font-weight-bolder">
            <td class="border-0"> </td>
            <td class="text-right ">Lama Pengerjaan : </td>
            <td colspan="3" class="text-right " ><?=$antrian?> Jam</td>
          <tr>
          <tr class="font-weight-bolder">
            <td class="border-0"> </td>
            <td class="text-right ">Bukti TF : </td>
            <td colspan="3" class="text-right " >
            <?php 
            if($bukti_tf != null){ ?>
            <img src="pictures/bukti_transfer/<?=$bukti_tf?>" alt="" class="img-fluid">
            <?php }else{ 
            echo "<a href='verif_pembayaran.php?id_pesanan=$id_pesanan&id_bank=$id_bank' class='btn btn-primary px-2'>Upload Bukti TF</a>";
            } ?>
            </td>
          <tr>
        </tbody>
      </table>
      </div>
    </div>
  </div>
</div>

