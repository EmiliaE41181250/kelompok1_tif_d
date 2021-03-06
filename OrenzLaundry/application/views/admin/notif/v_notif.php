<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Notifikasi</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Notifikasi</li>
                </ul>
            </div>
        </div>
    </div>

    <?php echo $this->session->flashdata('pesan'); ?>
    <div class="row card shadow">
        <div class="col card-body table-responsive">
            <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Paket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($transaksi as $trs) {
                        $usr = $this->db->query("SELECT nama_user FROM user WHERE id_user = '$trs->id_user'")->row(); ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $usr->nama_user ?></td>

                            <?php foreach ($detail_transaksi as $dtt) {
                                    $dtt = $this->db->query("SELECT id_paket FROM detail_transaksi WHERE id_transaksi = '$trs->id_transaksi'")->row();
                                    $pk = $this->db->query("SELECT nama_paket FROM paket WHERE id_paket = '$dtt->id_paket'")->row(); ?>
                            <?php } ?>

                            <td><?= $pk->nama_paket ?></td>
                            <td class="text-center">
                                <?php echo anchor('admin/Notifikasi/detail/' . $trs->id_transaksi, '
                <div class="btn btn-info btn-sm mr-2 pr-3 pl-3"><i class="fa fa-info"></i></div>') ?>
                            </td>
                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</footer>
<!-- End of Footer -->

</div>