<div class="container-fluid">

    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Customer</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Customer</li>
                </ul>
            </div>
        </div>
    </div>
    

    <?php echo $this->session->flashdata('pesan'); ?>
    <div class="row card shadow">
        <div class="col card-body table-responsive">
            <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="font-weight-bolder">
                        <th>NO</th>
                        <th>Nama Customer</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    foreach ($user as $usr) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $usr->nama_user ?></td>
                            <td><?= $usr->email ?></td>
                            <td class="text-center">
                                <?php if ($usr->status == "1") { ?>
                                    <span class="badge badge-pill px-4 badge-warning"><?= $usr->status ?></span>
                                <?php } else { ?>
                                    <span class="badge badge-pill px-4 badge-secondary"><?= $usr->status ?></span>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <?php echo anchor('admin/User/detail/' . $usr->id_user, '
                <div class="btn btn-info btn-sm mb-2 mr-2 pr-3 pl-3"><i class="fa fa-info"></i></div>') ?>
                                <?php echo anchor('admin/User/edit/' . $usr->id_user, '
                <div class="btn btn-primary btn-sm mb-2 mr-2"><i class="fa fa-edit"></i></div>') ?>
                                
                <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="<?=base_url('admin/User/destroy/' . $usr->id_user)?>" 
                                class="btn btn-danger mb-2 btn-sm"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<!-- Modal -->
