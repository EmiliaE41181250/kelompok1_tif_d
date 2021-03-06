<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Barang</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Barang</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <button class="btn btn-sm btn-ijo mb-2" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Barang</button>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan'); ?>
    <div class="row card shadow">
        <div class="col card-body table-responsive">
            <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($barang as $brg) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $brg->nama_barang ?></td>
                            <td class="text-center">
                                <?php if($brg->status == "Aktif"){?>
                                <span class="badge badge-pill px-4 badge-warning"><?=$brg->status?></span>
                                <?php }else{ ?>
                                <span class="badge badge-pill px-4 badge-secondary"><?=$brg->status?></span>
                                <?php }?>
                            </td>
                            <td class="text-center">
                                <?php echo anchor('admin/C_barang/edit/' . $brg->id_barang, '
                                <div class="btn btn-primary btn-sm mb-2 mr-2"><i class="fa fa-edit"></i></div>') ?>
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini?');" href="<?=base_url('admin/C_barang/destroy/' . $brg->id_barang)?>" 
                                class="btn btn-danger mb-2 btn-sm"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?= base_url() . 'admin/C_barang/tambah'; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title font-weight-bolder text-ijo">Tambah Data Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_barang">Barang</label>
                        <input required type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Masukkan Nama Barang . ." aria-describedby="namabarang" maxlength="100">
                        <small id="namabarang" class="text-muted">Masukkan Nama Barang tidak lebih dari 100 Karakter</small>
                    </div>
                    <div class="form-group w-50">
                        <label for="status">Status Barang</label>
                        <select required class="form-control" name="status" id="status">
                        <option value="">Pilih Status Barang :</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Draft">Draft</option>
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
<!-- /.container-fluid -->

</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->


<!-- End of Page Wrapper -->