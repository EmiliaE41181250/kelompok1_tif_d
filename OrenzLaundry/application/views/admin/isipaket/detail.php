<div class="container-fluid">
  <div class="row justify-content-center py-3">
    <div class="col-md-8 card p-0">
      <div class="card-header pb-0">
        <h2 class="font-weight-bolder mb-0">Detail Isi Paket</h2>
        <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/C_isipaket"></i> Isi Paket</a></li>
            <li class="breadcrumb-item active">Detail Isi Paket</li>
        </ul>
      </div>
      <div class="card-body">
      <?php echo $this->session->flashdata('pesan');?>

        <?php foreach ($detail as $dl) { ?>
          
          <table class="table table-borderless">
            <thead>
              <tr>
                <th>ID Isi Paket</th>
                <th>:</th>
                <th><?=$dl->id_isi_paket?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Nama Isi Paket</td>
                <td>:</td>
                <td><?=$dl->nama_isi_paket?></td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td>:</td>
                <td class="text-justify"><?=$dl->keterangan?></td>
              </tr>
                <td>Status</td>
                <td>:</td>
                <td>
                  <?php if($dl->status == "Aktif"){?>
                  <span class="badge badge-pill px-4 badge-warning"><?=$dl->status?></span>
                  <?php }else{ ?>
                  <span class="badge badge-pill px-4 badge-secondary"><?=$dl->status?></span>
                  <?php }?>
                </td>
              </tr>
              <tr>
                <td>Dibuat Oleh</td>
                <td>:</td>
                <td><span class="font-weight-bolder"><?=$dl->created_by?></span>, pada <span class="font-italic text-success"><?=$dl->created_at?></span></td>
              </tr>
              <tr>
                <td>Terakhir diubah oleh</td>
                <td>:</td>
                <td><span class="font-weight-bolder"><?=$dl->updated_by?></span>, pada <span class="font-italic text-warning"><?=$dl->updated_at?></span></td>
              </tr>
            </tbody>
          </table>

      </div>
    </div>
  </div>

  
</div>
<?php }?>