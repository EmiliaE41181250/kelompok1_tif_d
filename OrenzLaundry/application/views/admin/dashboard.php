
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pendapatan per Bulan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> Rp. <?= number_format($bulanan, 0, ',', '.'); ?> </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan per Tahun</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($tahunan, 0, ',', '.'); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pelanggan</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= number_format($pelanggan, 0, ',', '.'); ?></div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <a href="<?= base_url('admin/user');?>">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi Hari Ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> <?= number_format($history, 0, ',', '.'); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-ijo">Grafik Pendapatan Minggu ini</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <?php

                foreach ($grafik as $data){
          
                  $tgl_transaksi[] = substr($data->tgl_transaksi, 0, 10);
                  $total_harga[] = $data->total_harga;
                }
            

              ?>

            <script src="<?=base_url()?>assets/admin/vendor/chart.js/Chart.min.js"></script>
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
              var ctx = document.getElementById("myAreaChart");
              var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                  // ============ LABEL DIGANTI SESUAIKAN KEBUTUHAN (1 Minggu sebelumnya )==============
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
                        // ==================== DATA DIGANTI SESUAIKAN DATA PENDAPATAN PER HARI SELAMA SEMINGGU ===========
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

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-ijo">5 Customer Tervaforit</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
              <?php

                foreach ($favorit as $data){
                  $nama_user[] = $data->nama_user;
                  $total_berat[] =  number_format((float)$data->total_berat, 2, '.', '');
                }
            

              ?>
          <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
            Chart.defaults.global.defaultFontColor = '#858796';

            // Pie Chart Example
            var ctx = document.getElementById("myPieChart");
            var myPieChart = new Chart(ctx, {
              type: 'doughnut',
              data: {
                // ============ LABEL DIGANTI 5 NAMA CUSTOMER TERFAVORIT ==============
                labels: <?php echo json_encode($nama_user); ?>,
                datasets: [{
                  // ============ DATA DIGANTI TOTAL BERAT CUCIAN MASING2 CUSTOMER TERFAVORIT ==============
                  data: <?php echo json_encode($total_berat); ?>,
                  // ============ WARNA DISESUAIKAN MENJADI 5 BUKAN 3 ======================
                  backgroundColor: ['#669A00', '#80C000', '#C0C200','#FFC300', '#CC9500' ],
                  hoverBackgroundColor: ['#FFC300', '#DFC200', '#C0C200', '#A0C100', '#80C000'],
                  hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
              },
              options: {
                maintainAspectRatio: false,
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  caretPadding: 10,
                },
                legend: {
                  display: true,
                  position: "bottom",
                  labels: {
                    boxWidth: 30,
                    fontStyle: 'bold'
                  }
                  //align: 'left'
                  
                
                },
                cutoutPercentage: 80,
              },
            });
          </script>