<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Data Isi Paket</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Isi Paket</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <button class="btn btn-sm btn-ijo mb-2" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm mr-2"></i>Tambah Isi Paket</button>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan'); ?>
    <div class="row card shadow">
        <div class="col card-body table-responsive">
            <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Subjek Pesan</th>
                        <th>Tanggal Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pesan as $psn) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?php foreach ($user as $us){ echo $us->id_user == $psn->id_user ? $us->nama_user : ""; }?></td>
                            <td><?=$psn->subjek_pesan?></td>
                            <td><?=$psn->tanggal_pesan?></td>
                            <td class="text-center">
                            <a href="<?=base_url('admin/C_pesan/detail/' . $psn->id_pesan)?>" 
                            class="btn btn-info mb-2 btn-sm"><i class="px-1 fa fa-info"></i></a>
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus item ini ?');" href="<?=base_url('admin/C_pesan/destroy/' . $psn->id_ipesan)?>" 
                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



