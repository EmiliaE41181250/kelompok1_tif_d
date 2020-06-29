<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <div class="col-md-7 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Saya</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Profil Saya</li>
                </ul>
            </div>
            
            <?php foreach ($admin as $adm) { ?>
            <div class="card-body">

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <th><?= $adm->nama_admin ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?= $adm->alamat ?></td>
                            </tr>
                            <tr>
                                <td>No. Hp</td>
                                <td>:</td>
                                <td><?= $adm->no_hp ?></td>
                            </tr>
                            <tr>
                                <td>No. Telp</td>
                                <td>:</td>
                                <td><?= $adm->no_telp ?></td>
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td><?= $adm->username ?></td>
                            </tr>
                            <tr>
                                <td>Logo</td>
                                <td>:</td>
                                <td><img src="<?=base_url()?>assets/files/<?=$adm->logo?>" alt="Gambar <?= $adm->username ?>"></td>
                            </tr>
                            <div class="form-group text-center">
                                <td colspan="3" class="text-center">
                                    <?php echo anchor(
                                            'admin/C_saya/edit/' . $adm->id_admin,
                                            '<div class="btn btn-ijo btn-sm mr-2"><i class="fa fa-edit"></i> Edit</div>'
                                        ) ?>
                                </td>

                            </div>
                        </tbody>
                    </table>

            </div>
            
            <?php } ?>
        </div>
    </div>

</div>