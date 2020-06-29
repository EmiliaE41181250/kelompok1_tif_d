<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Laporan Transaksi</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Tahunan</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-10">
                    <div class="form-group">
                        <label for="awal">Pilih Tahun :</label>

                        <form action="<?= base_url() . "admin/laporan_rentang_hari/tahunan_report" ?>" method="post">
                            <!-- <input type="text" name="awal" id="monthpicker" class="form-control mr-2" required> -->
                            <div class="input-group mb-3">
                                <input type="text" name="tahunan" id="yearpicker" required class="form-control" placeholder="Pilih Tahun . ." aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-warning" type="submit" id="button-addon2">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (isset($data_tahunan)) { ?>
        <div class="card mt-3">
            <div class="card-body">
                <canvas id="canvas" width="1000" height="280"></canvas>

                <?php
                    foreach ($data_tahunan as $data) {
                        $tgl_transaksi[] = substr($data->tgl_transaksi, 0, 7);
                        $total_harga[] = (float) $data->total_harga;
                    }
                    ?>

                <script type="text/javascript" src="<?php echo base_url() . 'assets/chartjs/chart.min.js' ?>"></script>
                <script>
                    var lineChartData = {
                        labels: <?php echo json_encode($tgl_transaksi); ?>,
                        datasets: [

                            {
                                fillColor: "#FFC300",
                                strokeColor: "#FF9300",
                                pointColor: "#FF0300",
                                pointStrokeColor: "#fff",
                                pointHighlightFill: "#fff",
                                pointHighlightStroke: "rgba(152,235,239,1)",
                                data: <?php echo json_encode($total_harga); ?>
                            }

                        ]

                    }

                    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
                </script>
            </div>
        </div>

        <div class="row card mt-3 mb-4 mx-1">
            <div class="col card-body table-responsive">
                <h2>Detail Transaksi</h2>
                <div class="row">
                    <div class="col-6">
                        <a href="<?= base_url() . 'admin/laporan_rentang_hari/print_pdf_bulanan/' ?>" class="btn btn-sm btn-warning mb-2"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Pdf</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Bulan</th>
                                    <th>Total Harga</th>
                                    <th>Total Berat (kg)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($data_tahunan as $dt) {
                                        //$jenis = $this->db->query("SELECT nama_jenis_paket FROM jenis_paket WHERE id_jenis_paket = '$pk->id_jenis_paket'")->row();
                                        ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= date('yy M', strtotime(substr($dt->tgl_transaksi, 0, 7))) ?></td>
                                        <td class="text-right">Rp. <?= number_format($dt->total_harga, 0, ",", ".") ?></td>
                                        <td class="text-right"><?= number_format((float) $dt->total_berat, 2, '.', '') ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <h5 class="text-center">10 Customer Favorit</h5 class="text-center">
                        <table class="table table-bordered bg-white" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Nama User</th>
                                    <th>Total Berat (kg)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($data_berat as $brt) {
                                        //$jenis = $this->db->query("SELECT nama_jenis_paket FROM jenis_paket WHERE id_jenis_paket = '$pk->id_jenis_paket'")->row();
                                        ?>
                                    <tr>
                                        <td class="text-center"><?= $brt->nama_user ?></td>
                                        <td class="text-right"><?= number_format((float) $brt->total_berat, 2, '.', '') ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>
<?php } ?>

</div>