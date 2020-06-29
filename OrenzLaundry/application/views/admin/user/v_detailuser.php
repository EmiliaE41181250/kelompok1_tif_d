<div class="container-fluid">
    <div class="row justify-content-center py-3">
        <div class="col-md-8 card p-0">
            <div class="card-header pb-0">
                <h2 class="font-weight-bolder mb-0">Detail Customer</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n3 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/User"></i>Customer</a></li>
                    <li class="breadcrumb-item active">Detail Data Customer</li>
                </ul>
            </div>
            <div class="card-body">

                <?php foreach ($user as $usr) { ?>

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>ID Customer</th>
                                <th>:</th>
                                <th><?= $usr->id_user ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nama Customer</td>
                                <td>:</td>
                                <td><?= $usr->nama_user ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td class="text-justify"><?= $usr->alamat ?></td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>:</td>
                                <td class="text-justify"><?= $usr->jenis_kelamin ?></td>
                            </tr>
                            <tr>
                                <td>Tgl Lahir</td>
                                <td>:</td>
                                <td><?= $usr->tgl_lahir ?></td>
                            </tr>
                            <tr>
                                <td>No.Hp</td>
                                <td>:</td>
                                <td><?= $usr->no_hp ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?= $usr->email ?></td>
                            </tr>
                            <tr>
                                <td>Saldo</td>
                                <td>:</td>
                                <td>Rp. <?= number_format($usr->saldo, 0, ",", ".") ?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>
                                    <?php if ($usr->status == "1") { ?>
                                        <span class="badge badge-pill px-4 badge-warning"><?= $usr->status ?></span>
                                    <?php } else { ?>
                                        <span class="badge badge-pill px-4 badge-secondary"><?= $usr->status ?></span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Dibuat Oleh</td>
                                <td>:</td>
                                <td><span class="font-weight-bolder"><?= $usr->created_by ?></span>, pada <span class="font-italic text-success"><?= $usr->created_at ?></span></td>
                            </tr>
                            <tr>
                                <td>Terakhir diubah oleh</td>
                                <td>:</td>
                                <td><span class="font-weight-bolder"><?= $usr->updated_by ?></span>, pada <span class="font-italic text-warning"><?= $usr->updated_at ?></span></td>
                            </tr>
                        </tbody>
                    </table>

            </div>
        </div>
    </div>


</div>
<?php } ?>