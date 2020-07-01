<div class="container-fluid">
  <div class="row justify-content-center py-3">
    <div class="col-md-8 card p-0 shadow mb-4">
      <div class="card-header pb-0">
        <h2 class="font-weight-bolder mb-0">Detail Data Promo</h2>
        <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
            <li class="breadcrumb-item"><a href="<?=base_url()?>admin/promo"></i> Promo</a></li>
            <li class="breadcrumb-item active">Detail Promo</li>
        </ul>
      </div>
      <div class="card-body">

        <?php foreach ($detail as $dt) { 
             $usr = $this->db->query("SELECT nama_user FROM user WHERE id_user = '$dt->id_user'")->row();?>
          
          <table class="table table-borderless">
            <thead>
              <tr>
                <th>ID Pesan</th>
                <th>:</th>
                <th><?=$dt->id_pesan?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Tanggal Pesan</td>
                <td>:</td>
                <td><?=$dt->tanggal_pesan?></td>
              </tr>
              <tr>
                <td>Nama Customer</td>
                <td>:</td>
                <td><?=$usr->nama_user?></td>
              </tr>
              <tr>
                <td>Isi Pesan</td>
                <td>:</td>
                <td class="text-justify"><?=$dt->isi_pesan?></td>
              </tr>
              
            </tbody>
          </table>

      </div>
    </div>
  </div>

  
</div>
<?php }?>