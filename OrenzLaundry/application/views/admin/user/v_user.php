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
    <div class="row">
        <div class="col-6">
            <button class="btn btn-sm btn-ijo mb-2" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Data Customer</button>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-sm btn-warning mb-2" href="<?= base_url() ?>admin/User/pdf"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Pdf</a>
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
                        <th>Alamat</th>
                        <th>No.HP</th>
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
                            <td><?= $usr->alamat ?></td>
                            <td><?= $usr->no_hp ?></td>
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
                <div class="btn btn-info btn-sm mr-2 pr-3 pl-3"><i class="fa fa-info"></i></div>') ?>
                                <?php echo anchor('admin/User/edit/' . $usr->id_user, '
                <div class="btn btn-primary btn-sm mr-2"><i class="fa fa-edit"></i></div>') ?>
                                <?php echo anchor('admin/User/destroy/' . $usr->id_user, '
                <div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?>

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
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?= base_url() . 'admin/User/tambah'; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bolder text-ijo">Tambah Data Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_user">Nama Customer</label>
                        <input type="text" name="nama_user" id="nama_user" class="form-control" placeholder="Masukkan Nama Customer . ." aria-describedby="NamaUser" maxlength="100" required>
                        <small id="NamaUser" class="text-muted">Masukkan Nama Customer tidak lebih dari 100 Karakter</small>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Customer . ." aria-describedby="AlamatUser" maxlength="100" required>
                    </div>

                    <div class="form-group w-50">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option>Pilih jenis kelamin:</option>
                            <option value="Laki Laki">Laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tgl_lahir">Tgl Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" aria-describedby="TglLahir" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No.Hp</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan No.Hp Customer . ." aria-describedby="NoHp" maxlength="100" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email Customer . ." aria-describedby="Email" maxlength="100" required>
                    </div>

                    <div class="form-group w-50">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status" required>
                            <option>Pilih Status:</option>
                            <option value="1">1</option>
                            <option value="0">0</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-ijo">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>