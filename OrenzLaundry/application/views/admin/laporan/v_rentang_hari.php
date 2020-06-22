<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="block-header">
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bolder">Laporan Transaksi</h2>
                <ul class="breadcrumb bg-transparent ml-n3 mt-n4 mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>admin/dashboard"><i class="fa fa-home"></i> OrenzLaundry</a></li>
                    <li class="breadcrumb-item active">Rentang Hari</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-10 text-right">
            <a class="btn btn-sm btn-warning mb-2" href="<?= base_url() ?>admin/laporan_rentang_hari"><i class="fas fa-file-pdf fa-sm mr-2"></i>Cetak Pdf</a>
        </div>
    </div>

    <head>
        <?php
        foreach ($data as $data) {
            $tgl_transaksi[] = $data->tgl_transaksi;
            $total_harga[] = (float) $data->total_harga;
        }
        ?>
    </head>

    <body>

        <canvas id="canvas" width="1000" height="280"></canvas>

        <!--Load chart js-->
        <script type="text/javascript" src="<?php echo base_url() . 'assets/chartjs/chart.min.js' ?>"></script>
        <script>
            var lineChartData = {
                labels: <?php echo json_encode($tgl_transaksi); ?>,
                datasets: [

                    {
                        fillColor: "rgba(60,141,188,0.9)",
                        strokeColor: "rgba(60,141,188,0.8)",
                        pointColor: "#3b8bba",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(152,235,239,1)",
                        data: <?php echo json_encode($total_harga); ?>
                    }

                ]

            }

            var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
        </script>
    </body>

    </html>