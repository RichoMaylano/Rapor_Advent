  <!-- Footer -->
  <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                  <div class="text-body">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by
                    <a href="https://themeselection.com" target="_blank" class="footer-link">Richo Maylano Yozienanda</a>
                  </div>
                  <div class="d-none d-lg-inline-block">
                  <p class="mb-0"><strong>Contact Person</strong> : 085600242904 &nbsp( &nbsp<a href="https://api.whatsapp.com/send?phone=6285600242904" class="footer-link me-4" target="_blank"><i class="bx bxl-whatsapp"></i> Whatsapp</a>)</p>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="../assets/Sneat/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/Sneat/assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/Sneat/assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/Sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/Sneat/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/Sneat/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/Sneat/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/Sneat/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag before closing body tag for github widget button. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

    <script>
      'use strict';

(function () {
  let cardColor, headingColor, legendColor, labelColor, shadeColor, borderColor;

  cardColor = config.colors.cardColor;
  headingColor = config.colors.headingColor;
  legendColor = config.colors.bodyColor;
  labelColor = config.colors.textMuted;
  borderColor = config.colors.borderColor;

      // Income Chart - Area chart
  // --------------------------------------------------------------------
  const incomeChartEl = document.querySelector('#ChartSiswa'),
    incomeChartConfig = {
      series: [
        {
          data: [
          <?php 
            $bcf = mysqli_query($db_conn,"select * from data_siswa WHERE jurusan='Broadcasting dan Perfilman' ");
            echo mysqli_num_rows($bcf);
					?>,
          <?php 
            $dkv = mysqli_query($db_conn,"select * from data_siswa WHERE jurusan='Desain Komunikasi Visual' ");
            echo mysqli_num_rows($dkv);
					?>,
          <?php 
            $ph = mysqli_query($db_conn,"select * from data_siswa WHERE jurusan='Perhotelan' ");
            echo mysqli_num_rows($ph);
					?>,
          <?php 
            $kul = mysqli_query($db_conn,"select * from data_siswa WHERE jurusan='Kuliner' ");
            echo mysqli_num_rows($kul);
          ?>, 
          <?php 
            $ulp = mysqli_query($db_conn,"select * from data_siswa WHERE jurusan='Usaha Layanan Pariwisata' ");
            echo mysqli_num_rows($ulp);
					?>,
          <?php 
            $ps = mysqli_query($db_conn,"select * from data_siswa WHERE jurusan='Pekerjaan Sosial' ");
            echo mysqli_num_rows($ps);
          ?>]
        }
      ],
      chart: {
        height: 232,
        parentHeightOffset: 0,
        parentWidthOffset: 0,
        toolbar: {
          show: false
        },
        type: 'area'
      },
      dataLabels: {
        enabled: false
      },
      stroke: {
        width: 3,
        curve: 'smooth'
      },
      legend: {
        show: false
      },
      markers: {
        size: 6,
        colors: 'transparent',
        strokeColors: 'transparent',
        strokeWidth: 4,
        discrete: [
          {
            fillColor: config.colors.white,
            seriesIndex: 0,
            dataPointIndex: 6,
            strokeColor: config.colors.primary,
            strokeWidth: 2,
            size: 6,
            radius: 8
          }
        ],
        hover: {
          size: 7
        }
      },
      colors: [config.colors.primary],
      fill: {
        type: 'gradient',
        gradient: {
          shade: shadeColor,
          shadeIntensity: 0.6,
          opacityFrom: 0.5,
          opacityTo: 0.25,
          stops: [0, 95, 100]
        }
      },
      grid: {
        borderColor: borderColor,
        strokeDashArray: 8,
        padding: {
          top: -20,
          bottom: -8,
          left: 0,
          right: 8
        }
      },
      xaxis: {
        categories: ['BCF', 'DKV', 'PH', 'KUL', 'ULP', 'PS'],
        axisBorder: {
          show: false
        },
        axisTicks: {
          show: false
        },
        labels: {
          show: true,
          style: {
            fontSize: '13px',
            colors: labelColor
          }
        }
      },
      yaxis: {
        labels: {
          show: false
        },
        min: 10,
        max: 200,
        tickAmount: 4
      }
    };
  if (typeof incomeChartEl !== undefined && incomeChartEl !== null) {
    const incomeChart = new ApexCharts(incomeChartEl, incomeChartConfig);
    incomeChart.render();
  }

  // Order Statistics Chart
  // --------------------------------------------------------------------
  const chartOrderStatistics = document.querySelector('#orderstat'),
    orderChartConfig = {
      chart: {
        height: 145,
        width: 110,
        type: 'donut'
      },
      labels: ['BCF', 'DKV', 'PH', 'KUL', 'ULP', 'PS'],
      series: [ 
        <?php 
            $bcf = mysqli_query($db_conn,"select * from data_siswa WHERE jurusan='Broadcasting dan Perfilman' ");
            echo mysqli_num_rows($bcf);
					?>,
          <?php 
            $dkv = mysqli_query($db_conn,"select * from data_siswa WHERE jurusan='Desain Komunikasi Visual' ");
            echo mysqli_num_rows($dkv);
					?>,
          <?php 
            $ph = mysqli_query($db_conn,"select * from data_siswa WHERE jurusan='Perhotelan' ");
            echo mysqli_num_rows($ph);
					?>,
          <?php 
            $kul = mysqli_query($db_conn,"select * from data_siswa WHERE jurusan='Kuliner' ");
            echo mysqli_num_rows($kul);
          ?>, 
          <?php 
            $ulp = mysqli_query($db_conn,"select * from data_siswa WHERE jurusan='Usaha Layanan Pariwisata' ");
            echo mysqli_num_rows($ulp);
					?>,
          <?php 
            $ps = mysqli_query($db_conn,"select * from data_siswa WHERE jurusan='Pekerjaan Sosial' ");
            echo mysqli_num_rows($ps);
          ?>],
      colors: [config.colors.danger, config.colors.primary, config.colors.success, config.colors.warning, config.colors.info, config.colors.secondary,],
      stroke: {
        width: 5,
        colors: [cardColor]
      },
      dataLabels: {
        enabled: false,
        formatter: function (val, opt) {
          return parseInt(val) + '%';
        }
      },
      legend: {
        show: false
      },
      grid: {
        padding: {
          top: 0,
          bottom: 0,
          right: 15
        }
      },
      states: {
        hover: {
          filter: { type: 'none' }
        },
        active: {
          filter: { type: 'none' }
        }
      },
      plotOptions: {
        pie: {
          donut: {
            size: '75%',
            labels: {
              show: true,
              value: {
                fontSize: '18px',
                fontFamily: 'Public Sans',
                fontWeight: 500,
                color: headingColor,
                offsetY: -17,
                formatter: function (val) {
                  return parseInt(val) + '';
                }
              },
              name: {
                offsetY: 17,
                fontFamily: 'Public Sans'
              },
              total: {
                show: true,
                fontSize: '13px',
                color: legendColor,
                label: 'Siswa',
                formatter: function (w) {
                  return '<?php $pd = mysqli_query($db_conn, "SELECT COUNT(nisn) AS 'count' FROM data_siswa");
                  $query_siswa = mysqli_fetch_array($pd);
                  $peserta_didik = $query_siswa['count'];
                  echo $peserta_didik ;
                ?>';
                }
              }
            }
          }
        }
      }
    };
  if (typeof chartOrderStatistics !== undefined && chartOrderStatistics !== null) {
    const statisticsChart = new ApexCharts(chartOrderStatistics, orderChartConfig);
    statisticsChart.render();
  }
})();
    </script>
    
    <script>
      new DataTable('#example');
    </script>

  </body>
</html>