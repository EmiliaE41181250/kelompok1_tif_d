
<div class="container-fluid">
  <div class="row justify-content-center py-3">
    <div class="col-md-8 card p-0 shadow mb-4">
      <div class="card-header pb-0">
        <h2 class="font-weight-bolder mb-0">Detail Data Paket</h2>
        <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/C_paket"></i> Paket</a></li>
            <li class="breadcrumb-item active">Detail Paket</li>
        </ul>
      </div>
      <div class="card-body">

        <?php foreach ($detail as $dtl) { ?>
          
          <table class="table table-borderless">
            <thead>
              <tr>
                <th>ID Paket</th>
                <th>:</th>
                <th><?=$dtl->id_paket?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Nama paket</td>
                <td>:</td>
                <td><?=$dtl->nama_paket?></td>
              </tr>
              <tr>
                <td>Jenis paket</td>
                <td>:</td>
                <td><?php foreach($jenis as $jns){ if($dtl->id_jenis_paket == $jns->id_jenis_paket){ echo $jns->nama_jenis_paket; } }?></td>
              </tr>

              <tr>
                <td>Isi paket</td>
                <td>:</td>
                <td><?php foreach($isi as $i){ if($dtl->id_isi_paket == $i->id_isi_paket){ echo $i->nama_isi_paket; } }?></td>
              </tr>

              <tr>
                <td>Durasi paket</td>
                <td>:</td>
                <td><?php foreach($durasi as $drs){ if($dtl->id_durasi == $drs->id_durasi){ echo $drs->durasi_paket; } }?></td>
              </tr>

              <tr>
                <td>Barang</td>
                <td>:</td>
                <td><?php foreach($barang as $brg){ if($dtl->id_barang == $brg->id_barang){ echo $brg->nama_barang; } }?></td>
              </tr>

              <tr>
                <td>Harga</td>
                <td>:</td>
                <td>Rp. <?=number_format($dtl->harga, 0, ",", ".")?></td>
              </tr>

              <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                  <?php if($dtl->status == "Aktif"){?>
                  <span class="badge badge-pill px-4 badge-warning"><?=$dtl->status?></span>
                  <?php }else{ ?>
                  <span class="badge badge-pill px-4 badge-secondary"><?=$dtl->status?></span>
                  <?php }?>
                </td>
              </tr>
              <tr>
                <td>Dibuat Oleh</td>
                <td>:</td>
                <?php if($dtl->created_by != null){?>
                <td><span class="font-weight-bolder"><?=$dtl->created_by?></span>, pada <span class="font-italic text-success"><?=$dtl->created_at?></span></td>
                <?php }?>
              </tr>
              <tr>
                <td>Terakhir diubah oleh</td>
                <td>:</td>
                <?php if($dtl->updated_by != null){?>
                <td><span class="font-weight-bolder"><?=$dtl->updated_by?></span>, pada <span class="font-italic text-warning"><?=$dtl->updated_at?></span></td>
                <?php }?>
              </tr>
            </tbody>
          </table>

      </div>
    </div>
  </div>

  
</div>
<?php }?>