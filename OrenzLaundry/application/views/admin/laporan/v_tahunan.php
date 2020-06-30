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
                        $tgl_transaksi[] = substr($data->tgl_transaksi, 0, 10);
                        $total_harga[] = (float) $data->total_harga;
                    }
                    ?>

                <script src="<?= base_url() ?>assets/admin/vendor/chart.js/Chart.min.js"></script>
                <script>
                    // Set new default font family and font color to mimic Bootstrap's default styling
                    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
                    Chart.defaults.global.defaultFontColor = '#858796';

                    function number_format(number, decimals, dec_point, thousands_sep) {
                        // *     example: number_format(1234.56, 2, ',', ' ');
                        // *     return: '1 234,56'
                        number = (number + '').replace(',', '').replace(' ', '');
                        var n = !isFinite(+number) ? 0 : +number,
                            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                            // ================ RIBUAN MENJADI TITIK, DESIMAL MENJADI COMMA ==========
                            sep = (typeof thousands_sep === 'undefined') ? '.' : thousands_sep,
                            dec = (typeof dec_point === 'undefined') ? ',' : dec_point,
                            s = '',
                            toFixedFix = function(n, prec) {
                                var k = Math.pow(10, prec);
                                return '' + Math.round(n * k) / k;
                            };
                        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                        if (s[0].length > 3) {
                            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                        }
                        if ((s[1] || '').length < prec) {
                            s[1] = s[1] || '';
                            s[1] += new Array(prec - s[1].length + 1).join('0');
                        }
                        return s.join(dec);
                    }
                    // Area Chart Example
                    var ctx = document.getElementById("canvas");
                    var myLineChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            // ============ LABEL DIGANTI SESUAIKAN KEBUTUHAN ==============
                            labels: <?php echo json_encode($tgl_transaksi); ?>,
                            datasets: [{
                                label: "Pendapatan",
                                lineTension: 0.3,
                                backgroundColor: "rgba(255, 195, 0, 0.5)",
                                borderColor: "rgba(255, 195, 0, 1)",
                                pointRadius: 3,
                                pointBackgroundColor: "rgba(255, 3, 0, 1)",
                                pointBorderColor: "rgba(255, 3, 0, 0.5)",
                                pointHoverRadius: 3,
                                pointHoverBackgroundColor: "rgba(255, 100, 0, 1)",
                                pointHoverBorderColor: "rgba(255, 100, 0, 1)",
                                pointHitRadius: 10,
                                pointBorderWidth: 2,
                                // ==================== DATA DIGANTI SESUAIKAN DATA ===========
                                data: <?php echo json_encode($total_harga); ?>,
                            }],
                        },
                        options: {
                            maintainAspectRatio: false,
                            layout: {
                                padding: {
                                    left: 10,
                                    right: 25,
                                    top: 25,
                                    bottom: 0
                                }
                            },
                            scales: {
                                xAxes: [{
                                    time: {
                                        unit: 'date'
                                    },
                                    gridLines: {
                                        display: false,
                                        drawBorder: false
                                    },
                                    ticks: {
                                        maxTicksLimit: 7
                                    }
                                }],
                                yAxes: [{
                                    ticks: {
                                        maxTicksLimit: 5,
                                        padding: 10,
                                        // Include a dollar sign in the ticks
                                        callback: function(value, index, values) {
                                            return 'Rp. ' + number_format(value);
                                        }
                                    },
                                    gridLines: {
                                        color: "rgb(234, 236, 244)",
                                        zeroLineColor: "rgb(234, 236, 244)",
                                        drawBorder: false,
                                        borderDash: [2],
                                        zeroLineBorderDash: [2]
                                    }
                                }],
                            },
                            legend: {
                                display: false
                            },
                            tooltips: {
                                backgroundColor: "rgb(255,255,255)",
                                bodyFontColor: "#858796",
                                titleMarginBottom: 10,
                                titleFontColor: '#6e707e',
                                titleFontSize: 14,
                                borderColor: '#dddfeb',
                                borderWidth: 1,
                                xPadding: 15,
                                yPadding: 15,
                                displayColors: false,
                                intersect: false,
                                mode: 'index',
                                caretPadding: 10,
                                callbacks: {
                                    label: function(tooltipItem, chart) {
                                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                                        return datasetLabel + ': Rp. ' + number_format(tooltipItem.yLabel);
                                    }
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>

        <div class="row card mt-3 mb-4 mx-1">
            <div class="col card-body table-responsive">
                <h2>Detail Transaksi</h2>
                <div class="row">
                    <div class="col-6">
                        <a href="<?= base_url() . 'admin/laporan_rentang_hari/print_pdf_tahunan/' . $hasil_cari ?>" class="btn btn-sm btn-warning mb-2"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Pdf</a>
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