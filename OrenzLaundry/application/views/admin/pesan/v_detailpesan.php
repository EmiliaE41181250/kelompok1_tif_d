<div class="container-fluid">

<!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Detail Pesan</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Detail Pesan</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
      <div class="col-12 text-right">
        <a class="btn btn-sm btn-warning mb-2" href="<?=base_url()?>admin/C_pesan"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Pdf</a>
      </div>
    </div>
    
    <?php echo $this->session->flashdata('pesan');?>
    <div class="row card shadow">
      <div class="col card-body table-responsive">
        <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th>Tanggal Pesan</th>
            <th>Nama Customer</th>
            <th>Subjek Pesan</th>
            <th>Isi Pesan</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        foreach ($pesan as $psn ) { 
            $usr = $this->db->query("SELECT nama_user FROM user WHERE id_user = '$psn->id_user'")->row();?>
          <tr>
            <td><?=$psn->tanggal_pesan?></td>
            <td><?=$psn->nama_user?></td>
            <td><?=$psn->subjek_pesan?></td>
            <td><?=$psn->isi_pesan?></td>
          <button class="btn btn-secondary" onclick="window.history.back()"><i class="fas fa-arrow-left"></i></button>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

</footer>
      <!-- End of Footer -->

    </div>