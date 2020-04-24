<div class="container-fluid">
  <div class="row justify-content-center py-3">
    <div class="col-md-8 card p-0">
      <div class="card-header pb-0">
        <h2 class="font-weight-bolder mb-0">Detail Data Promo</h2>
        <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/promo"></i> Promo</a></li>
            <li class="breadcrumb-item active">Detail Promo</li>
        </ul>
      </div>
      <div class="card-body">

        <?php foreach ($promo as $prm) { ?>
          
          <table class="table table-borderless">
            <thead>
              <tr>
                <th>ID Promo</th>
                <th>:</th>
                <th><?=$prm->id_promo?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Judul Promo</td>
                <td>:</td>
                <td><?=$prm->judul_promo?></td>
              </tr>
              <tr>
                <td>Deskripsi Promo</td>
                <td>:</td>
                <td class="text-justify"><?=$prm->deskripsi?></td>
              </tr>
              <tr>
                <td>Syarat & Ketentuan</td>
                <td>:</td>
                <td class="text-justify"><?=$prm->syarat_ketentuan?></td>
              </tr>
              <tr>
                <td>Jumlah</td>
                <td>:</td>
                <td><?=$prm->jumlah?>%</td>
              </tr>
              <tr>
                <td>Awal Periode</td>
                <td>:</td>
                <td><?=substr($prm->awal, 0, 10)?></td>
              </tr>
              <tr>
                <td>Akhir Periode</td>
                <td>:</td>
                <td><?=substr($prm->akhir, 0, 10)?></td>
              </tr>
              <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                  <?php if($prm->status == "Aktif"){?>
                  <span class="badge badge-pill px-4 badge-warning"><?=$prm->status?></span>
                  <?php }else{ ?>
                  <span class="badge badge-pill px-4 badge-secondary"><?=$prm->status?></span>
                  <?php }?>
                </td>
              </tr>
              <tr>
                <td>Dibuat Oleh</td>
                <td>:</td>
                <td><span class="font-weight-bolder"><?=$prm->created_by?></span>, pada <span class="font-italic text-success"><?=$prm->created_at?></span></td>
              </tr>
              <tr>
                <td>Terakhir diubah oleh</td>
                <td>:</td>
                <td><span class="font-weight-bolder"><?=$prm->updated_by?></span>, pada <span class="font-italic text-warning"><?=$prm->updated_at?></span></td>
              </tr>
            </tbody>
          </table>

      </div>
    </div>
  </div>

  
</div>
<?php }?>