<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../");
  exit(); // Terminate script execution after the redirect
}

include '../database/database.php';
include '../assets/indo.php';
include '../assets/tgl_indo.php';
?>

<?php
  date_default_timezone_set("Asia/jakarta");
?>


<!doctype html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/Sneat/assets/"
  data-template="vertical-menu-template-free"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?php echo $title?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="../assets/Sneat/image/x-icon" href="../assets/Sneat/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="../assets/Sneat/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/Sneat/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/Sneat/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/Sneat/assets/css/demo.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" />
    
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/Sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/Sneat/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- Helpers -->
    <script src="../assets/Sneat/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/Sneat/assets/js/config.js"></script>
  </head>

  <body>
    <?php
      $date = date("Y-m-d");
    ?>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="#" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink">
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g id="Path-3" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-3"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                          </g>
                          <g id="Path-4" mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-4"></use>
                            <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                          </g>
                        </g>
                        <g
                          id="Triangle"
                          transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                          <use fill="#696cff" xlink:href="#path-5"></use>
                          <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bold ms-2">sneat</span>
              <span class="demo menu-text fw-bold mt-1 ms-6" id="jam"></span>
              
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboards -->
            <li class="menu-item <?php if($title == "Dashboard | Aplikasi Rapor SMP Advent Surakarta"){ echo 'active'; } ?>">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-smile"></i>
                <div class="text-truncate" data-i18n="Dashboards">Dashboards</div>
                <span class="badge rounded-pill bg-danger ms-auto">home</span>
              </a>
            </li>

            <!-- Apps & Pages -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Features &amp; Apps</span>
            </li>
            
            <!-- Nilai Rapor -->
            <li class="menu-item <?php if($title == "Data Siswa Kelas 7 Tahun 2023/2024 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 8 Tahun 2023/2024 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 9 Tahun 2023/2024 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 7 Tahun 2024/2025 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 8 Tahun 2024/2025 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 9 Tahun 2024/2025 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 7 Tahun 2025/2026 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 8 Tahun 2025/2026 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 9 Tahun 2025/2026 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
              <a href="#" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-book-bookmark"></i>
                <div class="text-truncate" data-i18n="Account Settings">Nilai Rapor</div>
              </a>
              <ul class="menu-sub">
                
              <?php if($_SESSION['role'] == 'admin'){?>
              <!-- Tahun Ajaran -->
              <li class="menu-item <?php if($title == "Data Siswa Kelas 7 Tahun 2023/2024 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 8 Tahun 2023/2024 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 9 Tahun 2023/2024 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 7 Tahun 2024/2025 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 8 Tahun 2024/2025 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 9 Tahun 2024/2025 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 7 Tahun 2025/2026 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 8 Tahun 2025/2026 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 9 Tahun 2025/2026 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
              <a href="#" class="menu-link menu-toggle">
                <div class="text-truncate" data-i18n="Account Settings">Tahun Ajaran</div>
              </a>
              
              <ul class="menu-sub">
                <li class="menu-item <?php if($title == "Data Siswa Kelas 7 Tahun 2023/2024 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 8 Tahun 2023/2024 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 9 Tahun 2023/2024 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
              <a href="#" class="menu-link menu-toggle">
                <div class="text-truncate" data-i18n="Account Settings">2023/2024</div>
              </a>
              <ul class="menu-sub">
                
                <li class="menu-item <?php if($title == "Data Siswa Kelas 7 Tahun 2023/2024 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
                  <a href="kelas7_23.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Account">Kelas 7</div>
                  </a>
                </li>
                <li class="menu-item <?php if($title == "Data Siswa Kelas 8 Tahun 2023/2024 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
                  <a href="kelas8_23.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Account">Kelas 8</div>
                  </a>
                </li>
                <li class="menu-item <?php if($title == "Data Siswa Kelas 9 Tahun 2023/2024 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
                  <a href="kelas9_23.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Account">Kelas 9</div>
                  </a>
                </li>
              
            </ul>
                </li>

              <li class="menu-item <?php if($title == "Data Siswa Kelas 7 Tahun 2024/2025 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 8 Tahun 2024/2025 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 9 Tahun 2024/2025 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
              <a href="#" class="menu-link menu-toggle">
                <div class="text-truncate" data-i18n="Account Settings">2024/2025</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item <?php if($title == "Data Siswa Kelas 7 Tahun 2024/2025 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
                  <a href="kelas7_24.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Account">Kelas 7</div>
                  </a>
                </li>
                <li class="menu-item <?php if($title == "Data Siswa Kelas 8 Tahun 2024/2025 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
                  <a href="kelas8_24.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Account">Kelas 8</div>
                  </a>
                </li>
                <li class="menu-item <?php if($title == "Data Siswa Kelas 9 Tahun 2024/2025 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
                  <a href="kelas9_24.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Account">Kelas 9</div>
                  </a>
                </li>
              
              
            </ul>
                </li>
              </ul>

              <ul class="menu-sub">
              <li class="menu-item <?php if($title == "Data Siswa Kelas 7 Tahun 2025/2026 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 8 Tahun 2025/2026 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 9 Tahun 2025/2026 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
              <a href="#" class="menu-link menu-toggle">
                <div class="text-truncate" data-i18n="Account Settings">2025/2026</div>
              </a>
              <ul class="menu-sub">
              
                <li class="menu-item <?php if($title == "Data Siswa Kelas 7 Tahun 2025/2026 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
                  <a href="kelas7_25.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Account">Kelas 7</div>
                  </a>
                </li>
                <li class="menu-item <?php if($title == "Data Siswa Kelas 8 Tahun 2025/2026 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
                  <a href="kelas8_25.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Account">Kelas 8</div>
                  </a>
                </li>
                <li class="menu-item <?php if($title == "Data Siswa Kelas 9 Tahun 2025/2026 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
                  <a href="kelas9_25.php" class="menu-link">
                    <div class="text-truncate" data-i18n="Account">Kelas 9</div>
                  </a>
                </li>
            
                <?php } else if($_SESSION['role'] == 'wali'){?>
              <!-- Tahun Ajaran -->
              <li class="menu-item <?php if($title == "Data Siswa Kelas 7 Tahun 2023/2024 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 8 Tahun 2023/2024 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 9 Tahun 2023/2024 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 7 Tahun 2024/2025 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 8 Tahun 2024/2025 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 9 Tahun 2024/2025 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 7 Tahun 2025/2026 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 8 Tahun 2025/2026 | Aplikasi Rapor SMP Advent" || $title == "Data Siswa Kelas 9 Tahun 2025/2026 | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
              <a href="data_siswa.php" class="menu-link">
                <div class="text-truncate" data-i18n="Account Settings">Data Siswa</div>
              </a>
            </li>
 
              <?php } else {?>

                <?php }?>

            </ul>
                </li>
              </ul>
              
                </li>
          </ul>
          
          <?php if($_SESSION['role'] == 'admin'){?>
          <!-- Alumni -->
          <li class="menu-item <?php if($title == "Data Alumni | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
              <a href="alumni.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                <div class="text-truncate" data-i18n="User">Data Alumni</div>
              </a>
            </li>
          
            <!-- Alumni -->
          <li class="menu-item <?php if($title == "Data Guru dan Karyawan | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
              <a href="data_guru.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div class="text-truncate" data-i18n="User">Data Guru</div>
              </a>
            </li>

          <!-- Akses Pengguna -->
          <li class="menu-item <?php if($title == "Akses Pengguna | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
              <a href="akses_pengguna.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-user"></i>
                <div class="text-truncate" data-i18n="User">Akses Pengguna</div>
              </a>
            </li>

          <!-- Konfigurasi -->
          <li class="menu-item <?php if($title == "Konfigurasi | Aplikasi Rapor SMP Advent"){ echo 'active'; } ?>">
              <a href="konfigurasi.php" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-cog"></i>
                <div class="text-truncate" data-i18n="Config">Konfigurasi</div>
              </a>
            </li>
          
            <!-- Apps & Pages -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text"><strong><?php echo tgl_indo($date);?></strong></span>
            </li>

            <?php } else if($_SESSION['role'] == 'wali'){?>
        <!-- Apps & Pages -->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text"><strong><?php echo tgl_indo($date);?></strong></span>
            </li>
              <?php }?>
          

              </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                <i class="bx bx-menu bx-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center d-none d-lg-block">
                <span class="demo menu-text fw-bold mt-1 ms-6"><i class='bx bx-bell mb-1'></i> &nbsp Selamat Datang di Aplikasi Rapor SMP Advent Surakarta</span>
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-4">
                <?php if(date("H:i:s") >= '06:00:00' && date("H:i:s") <= '10:00:00'){?>
                  <a href="#" class="btn btn-primary"><i class="bx bx-sun"></i> &nbspSelamat Pagi, <?php echo $_SESSION['username']?></a> 
                  <?php } else if(date("H:i:s") >= '10:00:01' && date("H:i:s") <= '14:00:00'){?>
                  <a href="#" class="btn btn-primary"><i class="bx bxs-sun"></i> &nbspSelamat Siang, <?php echo $_SESSION['username']?></a>
                  <?php } else if(date("H:i:s") >= '14:00:01' && date("H:i:s") <= '15:30:00'){?>
                  <a href="#" class="btn btn-primary"><i class="bx bxs-sun"></i> &nbspSelamat Sore, <?php echo $_SESSION['username']?></a>  
                  <?php } else if(date("H:i:s") >= '15:30:01'){?>
                  <a href="#" class="btn btn-primary"><i class="bx bx-run"></i> &nbspWaktunya Pulang</a>
                  <?php } else if(date("H:i:s") >= '18:00:01'){?>
                    <a href="#" class="btn btn-primary"><i class="bx bxs-moon"></i> &nbspSelamat Malam, <?php echo $_SESSION['username']?></a> 
                <?php } else { 
                  echo '' ;
                }?>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../assets/Sneat/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="./">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../assets/Sneat/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-0"><?php echo $_SESSION['nama_lengkap']?></h6>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="profile.php">
                        <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="konfigurasi.php"> <i class="bx bx-cog bx-md me-3"></i><span>Settings</span> </a>
                    </li>
                    <li>
                      <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')">
                        <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

<script type="text/javascript">
  window.onload = function() { 
  jam(); }

  function jam() {
  var e = document.getElementById('jam'),
  d = new Date(), h, m, s;
  h = d.getHours();
  m = set(d.getMinutes());
  s = set(d.getSeconds());

  e.innerHTML = h +':'+ m +':'+ s;

  setTimeout('jam()', 1000);
  }

  function set(e) {
  e = e < 10 ? '0'+ e : e;
  return e;
}
</script>
