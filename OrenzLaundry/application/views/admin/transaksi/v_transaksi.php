<!-- Begin Page Content -->
<div class="container-fluid pb-3">

<!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Transaksi</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Paket</li>
                </ul>
            </div>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan');?>
    <div class="row card shadow">
      <div class="col card-body table-responsive">
        <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Customer</th>
            <th>Tanggal & Waktu</th>
            <th>Total</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $no = 1;
        foreach ($transaksi as $trns ) { 
        //$jenis = $this->db->query("SELECT nama_jenis_paket FROM jenis_paket WHERE id_jenis_paket = '$pk->id_jenis_paket'")->row();?>
          <tr>
            <td><?=$no++?></td>
            <td><?php foreach ($user as $us){ echo $us->id_user == $trns->id_user ? $us->nama_user : ""; }?></td>
            <td><?=$trns->tgl_transaksi?></td>
            <td>Rp. <?=number_format($trns->total_harga, 0, ",", ".")?></td>
            <td class="text-center">
                <?php if($trns->status == 0){?>
                <span class="badge badge-pill px-4 badge-secondary">Penjemputan Cucian</span>
                <?php }else if($trns->status == 1){ ?>
                <span class="badge badge-pill px-4 badge-secondary">Proses Sorting dan Timbang</span>
                <?php }else if($trns->status == 2){?>
                <span class="badge badge-pill px-4 badge-warning">Permohonan Konfirmasi Customer</span>
                <?php }else if($trns->status == 3){?>
                <span class="badge badge-pill px-4 badge-warning">Sedang Memproses Pesanan</span>
                <?php }else if($trns->status == 4){?>
                <span class="badge badge-pill px-4 badge-primary">Cucian siap diantar</span>
                <?php }else if($trns->status == 5){?>
                <span class="badge badge-pill px-4 badge-primary">Pesanan telah diantar</span>
                <?php }else if($trns->status == 6){?>
                <span class="badge badge-pill px-4 badge-danger">Pesanan dibatalkan</span>
                <?php }?>
                
            </td>
            <td class="text-center">
                <?php echo anchor('admin/notifikasi/detail/' . $trns->id_transaksi, '
                <div class="btn btn-info btn-sm mr-2 pr-3 pl-3"><i class="fa fa-info"></i></div>')?>
                <?php echo anchor('admin/C_transaksi/edit/' . $trns->id_transaksi, '
                <div class="btn btn-primary btn-sm mr-2"><i class="fa fa-edit"></i></div>')?>
            </td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
