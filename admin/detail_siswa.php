<?php
$title = 'Detail Siswa | Aplikasi Rapor SMP Advent Surakarta';
include "header.php";
$nisn = $_GET['nisn'];
?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
            <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

        <?php $query = "SELECT * FROM data_siswa WHERE nisn = '$nisn'";
        // Melakukan query ke database
        $result = mysqli_query($db_conn, $query);
        // Cek jika query berhasil
        if (!$result) {
            die("Query Error: " . mysqli_error($db_conn));
        }
        $data = mysqli_fetch_assoc($result);
        ?>

        <?php 
        $gabungan = "SELECT * FROM data_rapor JOIN data_siswa ON data_rapor.id_siswa = data_siswa.id_siswa WHERE data_rapor.nisn = '$nisn'";
        // Melakukan query ke database
        $result_gabungan = mysqli_query($db_conn, $gabungan);

        // Cek jika query berhasil
        if (!$result_gabungan) {
            die("Query Error: " . mysqli_error($db_conn));
        }
        $gab_siswa = mysqli_fetch_assoc($result_gabungan);
        ?>

        <div class="card p-5">
                <h5 class="card-header bg-primary text-white mb-6"><strong>Detail Rapor <?php echo $data['nama']?> | SMP Advent Surakarta</strong></h5>

                <?php
                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo '<div class="alert alert-success alert-dismissible" role="alert">'
                        .$_SESSION['pesan'].
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                    $_SESSION['pesan'] = '';
                ?>
        
        <?php $query_ekskul = "SELECT * FROM data_ekskul WHERE nisn = '$nisn'";
        // Melakukan query ke database
        $result_ekskul = mysqli_query($db_conn, $query_ekskul);
        // Cek jika query berhasil
        if (!$result_ekskul) {
            die("Query Error: " . mysqli_error($db_conn));
        }
        $ekskul = mysqli_fetch_assoc($result_ekskul);
        ?>

      <?php $query_pengembangan = "SELECT * FROM data_pengembangan WHERE nisn = '$nisn'";
        // Melakukan query ke database
        $result_pengembangan = mysqli_query($db_conn, $query_pengembangan);
        // Cek jika query berhasil
        if (!$result_pengembangan) {
            die("Query Error: " . mysqli_error($db_conn));
        }
        $pengembangan = mysqli_fetch_assoc($result_pengembangan);
        ?>

      <?php 
        $query_kehadiran = "SELECT * FROM data_hadir WHERE nisn = '$nisn'";
        // Melakukan query ke database
        $result_hadir = mysqli_query($db_conn, $query_kehadiran);

        // Cek jika query berhasil
        if (!$result_hadir) {
            die("Query Error: " . mysqli_error($db_conn));
        }
        $hadir = mysqli_fetch_assoc($result_hadir);
        ?>

<div class="nav-align-top nav-tabs-shadow">
  <ul class="nav nav-tabs nav-pills mb-4 nav-fill" role="tablist">
    <!-- Tab Profile -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link active"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-profile"
        aria-controls="navs-justified-profile"
        aria-selected="true">
        <span class="d-none d-sm-inline-flex align-items-center">
          <i class="icon-base bx bx-user icon-sm me-1_5"></i>Pofile
        </span>
        <i class="icon-base bx bx-user icon-sm d-sm-none"></i>
      </button>
    </li>

    <?php if($_SESSION['role'] == 'admin'){?>
   
        <!-- Tab Semester 1 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-satu"
        aria-controls="navs-justified-satu"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-1 icon-sm me-1_5"></i>Semester 1</span
        >
        <i class="icon-base bx bxs-dice-1 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 2 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-dua"
        aria-controls="navs-justified-dua"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-2 icon-sm me-1_5"></i>Semester 2</span
        >
        <i class="icon-base bx bxs-dice-2 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 3 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-tiga"
        aria-controls="navs-justified-tiga"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-3 icon-sm me-1_5"></i>Semester 3</span
        >
        <i class="icon-base bx bxs-dice-3 icon-sm d-sm-none"></i>
      </button>
    </li>
    
    <!-- Tab Semester 4 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-empat"
        aria-controls="navs-justified-empat"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-4 icon-sm me-1_5"></i>Semester 4</span
        >
        <i class="icon-base bx bxs-dice-4 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 5 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-lima"
        aria-controls="navs-justified-lima"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-5 icon-sm me-1_5"></i>Semester 5</span
        >
        <i class="icon-base bx bxs-dice-5 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 6 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-enam"
        aria-controls="navs-justified-enam"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-6 icon-sm me-1_5"></i>Semester 6</span
        >
        <i class="icon-base bx bxs-dice-6 icon-sm d-sm-none"></i>
      </button>
    </li>
    <?php } else if($_SESSION['role'] == 'wali'){?>
      <!-- Semester 1,2,3,4,5 dan 6 -->
        <?php if($gab_siswa['wali_smt1'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt2'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt3'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt4'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt5'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt6'] == $_SESSION['nama_lengkap']){?>
      
        <!-- Tab Semester 1 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-satu"
        aria-controls="navs-justified-satu"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-1 icon-sm me-1_5"></i>Semester 1</span
        >
        <i class="icon-base bx bxs-dice-1 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 2 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-dua"
        aria-controls="navs-justified-dua"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-2 icon-sm me-1_5"></i>Semester 2</span
        >
        <i class="icon-base bx bxs-dice-2 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 3 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-tiga"
        aria-controls="navs-justified-tiga"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-3 icon-sm me-1_5"></i>Semester 3</span
        >
        <i class="icon-base bx bxs-dice-3 icon-sm d-sm-none"></i>
      </button>
    </li>
    
    <!-- Tab Semester 4 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-empat"
        aria-controls="navs-justified-empat"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-4 icon-sm me-1_5"></i>Semester 4</span
        >
        <i class="icon-base bx bxs-dice-4 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 5 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-lima"
        aria-controls="navs-justified-lima"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-5 icon-sm me-1_5"></i>Semester 5</span
        >
        <i class="icon-base bx bxs-dice-5 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 6 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-enam"
        aria-controls="navs-justified-enam"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-6 icon-sm me-1_5"></i>Semester 6</span
        >
        <i class="icon-base bx bxs-dice-6 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Semester 1,2,3 dan 4 -->
          <?php } else if($gab_siswa['wali_smt1'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt2'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt3'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt4'] == $_SESSION['nama_lengkap']){?>
    <!-- Tab Semester 1 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-satu"
        aria-controls="navs-justified-satu"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-1 icon-sm me-1_5"></i>Semester 1</span
        >
        <i class="icon-base bx bxs-dice-1 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 2 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-dua"
        aria-controls="navs-justified-dua"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-2 icon-sm me-1_5"></i>Semester 2</span
        >
        <i class="icon-base bx bxs-dice-2 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 3 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-tiga"
        aria-controls="navs-justified-tiga"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-3 icon-sm me-1_5"></i>Semester 3</span
        >
        <i class="icon-base bx bxs-dice-3 icon-sm d-sm-none"></i>
      </button>
    </li>
    
    <!-- Tab Semester 4 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-empat"
        aria-controls="navs-justified-empat"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-4 icon-sm me-1_5"></i>Semester 4</span
        >
        <i class="icon-base bx bxs-dice-4 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Semester 3,4,5 dan 6 -->
        <?php } else if($gab_siswa['wali_smt3'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt4'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt5'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt6'] == $_SESSION['nama_lengkap']){?>
      <!-- Tab Semester 3 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-tiga"
        aria-controls="navs-justified-tiga"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-3 icon-sm me-1_5"></i>Semester 3</span
        >
        <i class="icon-base bx bxs-dice-3 icon-sm d-sm-none"></i>
      </button>
    </li>
    
    <!-- Tab Semester 4 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-empat"
        aria-controls="navs-justified-empat"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-4 icon-sm me-1_5"></i>Semester 4</span
        >
        <i class="icon-base bx bxs-dice-4 icon-sm d-sm-none"></i>
      </button>
    </li>
 
    <!-- Tab Semester 5 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-lima"
        aria-controls="navs-justified-lima"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-5 icon-sm me-1_5"></i>Semester 5</span
        >
        <i class="icon-base bx bxs-dice-5 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 6 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-enam"
        aria-controls="navs-justified-enam"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-6 icon-sm me-1_5"></i>Semester 6</span
        >
        <i class="icon-base bx bxs-dice-6 icon-sm d-sm-none"></i>
      </button>
    </li>
      
    <!-- Semester 1,2,5 dan 6 -->
          <?php } else if($gab_siswa['wali_smt1'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt2'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt5'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt6'] == $_SESSION['nama_lengkap']){?>
      <!-- Tab Semester 1 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-satu"
        aria-controls="navs-justified-satu"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-1 icon-sm me-1_5"></i>Semester 1</span
        >
        <i class="icon-base bx bxs-dice-1 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 2 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-dua"
        aria-controls="navs-justified-dua"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-2 icon-sm me-1_5"></i>Semester 2</span
        >
        <i class="icon-base bx bxs-dice-2 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 5 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-lima"
        aria-controls="navs-justified-lima"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-5 icon-sm me-1_5"></i>Semester 5</span
        >
        <i class="icon-base bx bxs-dice-5 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 6 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-enam"
        aria-controls="navs-justified-enam"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-6 icon-sm me-1_5"></i>Semester 6</span
        >
        <i class="icon-base bx bxs-dice-6 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Semester 1 dan 2 -->
        <?php } else if($gab_siswa['wali_smt1'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt2']){?>
          <!-- Tab Semester 1 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-satu"
        aria-controls="navs-justified-satu"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-1 icon-sm me-1_5"></i>Semester 1</span
        >
        <i class="icon-base bx bxs-dice-1 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 2 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-dua"
        aria-controls="navs-justified-dua"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-2 icon-sm me-1_5"></i>Semester 2</span
        >
        <i class="icon-base bx bxs-dice-2 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Semester 3 dan 4 -->
        <?php } else if($gab_siswa['wali_smt3'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt4'] == $_SESSION['nama_lengkap']){?>
          <!-- Tab Semester 3 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-tiga"
        aria-controls="navs-justified-tiga"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-3 icon-sm me-1_5"></i>Semester 3</span
        >
        <i class="icon-base bx bxs-dice-3 icon-sm d-sm-none"></i>
      </button>
    </li>
    
    <!-- Tab Semester 4 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-empat"
        aria-controls="navs-justified-empat"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-4 icon-sm me-1_5"></i>Semester 4</span
        >
        <i class="icon-base bx bxs-dice-4 icon-sm d-sm-none"></i>
      </button>
    </li>
        
    <!-- Semester 5 dan 6 -->
        <?php } else if($gab_siswa['wali_smt5'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt6'] == $_SESSION['nama_lengkap']){?>
          <!-- Tab Semester 5 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-lima"
        aria-controls="navs-justified-lima"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-5 icon-sm me-1_5"></i>Semester 5</span
        >
        <i class="icon-base bx bxs-dice-5 icon-sm d-sm-none"></i>
      </button>
    </li>

    <!-- Tab Semester 6 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link"
        role="tab"
        data-bs-toggle="tab"
        data-bs-target="#navs-justified-enam"
        aria-controls="navs-justified-enam"
        aria-selected="false">
        <span class="d-none d-sm-inline-flex align-items-center"
          ><i class="icon-base bx bxs-dice-6 icon-sm me-1_5"></i>Semester 6</span
        >
        <i class="icon-base bx bxs-dice-6 icon-sm d-sm-none"></i>
      </button>
    </li>
        <?php } ?>
      <?php } ?>
  </ul>

  <!-- Tab Profile -->
  <div class="tab-content">
    <div class="tab-pane fade show active" id="navs-justified-profile" role="tabpanel">

      <?php 
        $query = "SELECT * FROM data_siswa WHERE nisn = '$nisn'";
        // Melakukan query ke database
        $result = mysqli_query($db_conn, $query);
        // Cek jika query berhasil
        if (!$result) {
            die("Query Error: " . mysqli_error($db_conn));
        }
        $siswa = mysqli_fetch_assoc($result);
      ?>

      <?php
        $date = date("d-m-Y");
      ?>

        <div class="row">
            <h5>Biodata Peserta Didik</h5><hr>
            <div class="col-sm-3">
            <table width="100%" border="0">
                    <tr>
                        <td>
                            <center><img src="../assets/images/<?php echo $siswa['foto']?>" alt="" width="125px" class="mt-4 mb-2"></center>
                            <hr>
                            <center><a href="#" class="btn btn-warning mb-4" data-bs-toggle="modal" data-bs-target="#edit_siswa<?php echo htmlspecialchars($siswa['nisn'])?>"><i class="bx bx-edit"></i>&nbspEdit Data</a></center>
                            <center><a href="input_nilai.php?nisn=<?php echo htmlspecialchars($siswa['nisn'])?>" class="btn btn-primary mb-4"><i class="bx bx-import"></i>&nbsp Input Nilai Rapor</a></center>
                            <center><a href="input_kehadiran.php?nisn=<?php echo htmlspecialchars($siswa['nisn'])?>" class="btn btn-info mb-4"><i class='bx bx-calendar-check'></i>&nbsp Input Rekap Kehadiran</a></center>
                        </td>  
                        </tr>
                    </table>
                    </div>

                    <div class="col-sm-9">
                    <table class="table table-bordered table-striped" width="100%" border="1">
                    <tr>
                        <td width="40%">Nama Lengkap</td>
                        <td width="60%"><?php echo $siswa['nama'] ?></td>
                    </tr>
                    <tr>
                        <td>NIS / NISN</td>
                        <td><?php echo $siswa['nis']?> / <?php echo $siswa['nisn']?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td><?php if($siswa['jk'] == 'P'){?> Perempuan
                            <?php } else if($siswa['jk'] == 'L'){ ?> 
                                Laki-Laki 
                            <?php }?> 
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat, Tanggal Lahir</td>
                        <td><?php echo $siswa['ttl']?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo $siswa['alamat']?></td>
                    </tr>
                    <tr>
                        <td>Tahun Masuk</td>
                        <td><?php echo $siswa['tahun_masuk']?></td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>
                          <?php
                            if($date >= '14-07-2025' && $siswa['tahun_masuk'] == '2023/2024'){
                              echo 'Kelas 9';
                            } else if($date >= '14-07-2025' && $siswa['tahun_masuk'] == '2024/2025'){
                              echo 'Kelas 8';
                            } else if($date >= '14-07-2025' && $siswa['tahun_masuk'] == '2025/2026'){
                              echo 'Kelas 7';
                            }
                          ?>
                        </td>
                    </tr>
                    </table>
            </div>
        </div>
    </div>

    <!-- Tab Semester 1 -->
    <div class="tab-pane fade" id="navs-justified-satu" role="tabpanel">
    
    <?php 
        $query = "SELECT * FROM data_rapor WHERE nisn = '$nisn'";
        // Melakukan query ke database
        $result = mysqli_query($db_conn, $query);

        // Cek jika query berhasil
        if (!$result) {
            die("Query Error: " . mysqli_error($db_conn));
        }

        $data = mysqli_fetch_assoc($result);

        $smt1 = array($data['agama_smt1'] , $data['pkn_smt1'] , $data['indo_smt1'] , $data['mtk_smt1'] , $data['ipa_smt1'] , $data['ips_smt1'] , $data['inggris_smt1'] , $data['seni_smt1'] , $data['pjok_smt1'] , $data['informatika_smt1'] , $data['jawa_smt1'] , $data['kesda_smt1']);
        $smt2 = array($data['agama_smt2'] , $data['pkn_smt2'] , $data['indo_smt2'] , $data['mtk_smt2'] , $data['ipa_smt2'] , $data['ips_smt2'] , $data['inggris_smt2'] , $data['seni_smt2'] , $data['pjok_smt2'] , $data['informatika_smt2'] , $data['jawa_smt2'] , $data['kesda_smt2']);
        $smt3 = array($data['agama_smt3'] , $data['pkn_smt3'] , $data['indo_smt3'] , $data['mtk_smt3'] , $data['ipa_smt3'] , $data['ips_smt3'] , $data['inggris_smt3'] , $data['seni_smt3'] , $data['pjok_smt3'] , $data['informatika_smt3'] , $data['jawa_smt3'] , $data['kesda_smt3']);
        $smt4 = array($data['agama_smt4'] , $data['pkn_smt4'] , $data['indo_smt4'] , $data['mtk_smt4'] , $data['ipa_smt4'] , $data['ips_smt4'] , $data['inggris_smt4'] , $data['seni_smt4'] , $data['pjok_smt4'] , $data['informatika_smt4'] , $data['jawa_smt4'] , $data['kesda_smt4']);
        $smt5 = array($data['agama_smt5'] , $data['pkn_smt5'] , $data['indo_smt5'] , $data['mtk_smt5'] , $data['ipa_smt5'] , $data['ips_smt5'] , $data['inggris_smt5'] , $data['seni_smt5'] , $data['pjok_smt5'] , $data['informatika_smt5'] , $data['jawa_smt5'] , $data['kesda_smt5']);
        $smt6 = array($data['agama_smt6'] , $data['pkn_smt6'] , $data['indo_smt6'] , $data['mtk_smt6'] , $data['ipa_smt6'] , $data['ips_smt6'] , $data['inggris_smt6'] , $data['seni_smt6'] , $data['pjok_smt6'] , $data['informatika_smt6'] , $data['jawa_smt6'] , $data['kesda_smt6']);
        
        $rata_smt1 = array_sum($smt1) / count($smt1);
        $rata_smt2 = array_sum($smt2) / count($smt2);
        $rata_smt3 = array_sum($smt3) / count($smt3);
        $rata_smt4 = array_sum($smt4) / count($smt4);
        $rata_smt5 = array_sum($smt5) / count($smt5);
        $rata_smt6 = array_sum($smt6) / count($smt6);
        ?>

    <div class="row">
        <div class="col">
        <h5>Nilai Rapor Semester 1</h5><hr>
        <center><a href="cetak/rapor_smt1.php?nisn=<?php echo htmlspecialchars($data['nisn'])?>" class="btn btn-primary mb-4"><i class="bx bxs-printer"></i>&nbspCetak Rapor Semester 1</a></center>
    <?php
     echo'
     <h5><strong>WALI KELAS</strong></h5>
              <table class="table table-striped table-bordered" width="100%" border="1">
        <tbody>
          <tr style="font-weight:bold" align="center">
            <td width="12%">Semester 1</td>
            ';
        if($siswa['wali_smt1'] == NULL){
          echo '<td><i>Nama Wali Kelas Belum Diinputkan</i></td>';
        } else {
        echo '           
            <td>'.$siswa['wali_smt1'].'</td>
            ';
          }
      echo'
          </tr>
          </tbody>
          </table>
    <br>

     <h5><strong>NILAI AKADEMIK</strong></h5>
      <table class="table table-bordered table-striped" width="100%" border="1">
      <tbody >
  
  <tr>
  <td align="center"><b>No</b></td>
  <td align="center"><b>Mata Pelajaran</b></td>
      <td  align="center"><b>Nilai Akhir</b></td>
    </tr>
    
    <tr>
  <td  align="center">1.</td>
  <td >&nbsp Pendidikan Agama dan Budi Pekerti</td>
      <td  align="center">'.$data['agama_smt1'].'</td>
    </tr>

    <tr>
    <td  align="center">2.</td>
  <td >&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
      <td  align="center">'.$data['pkn_smt1'].'</td>
    </tr>

    <tr>
    <td  align="center">3. </td>
  <td >&nbsp Bahasa Indonesia</td>
      <td  align="center">'.$data['indo_smt1'].'</td>
    </tr>
    
    <tr>
    <td  align="center">4. </td>
  <td >&nbsp Matematika</td>
      <td  align="center">'.$data['mtk_smt1'].'</td>
    </tr>
    
    <tr>
    <td  align="center">5. </td>
  <td >&nbsp Ilmu Pengetahuan Alam</td>
      <td  align="center">'.$data['ipa_smt1'].'</td>
    </tr>
    
    <tr>
    <td  align="center">6. </td>
  <td >&nbsp Ilmu Pengetahuan Sosial</td>
      <td  align="center">'.$data['ips_smt1'].'</td>
    </tr>
    
    <tr>
    <td  align="center">7. </td>
  <td >&nbsp Bahasa Inggris</td>
      <td  align="center">'.$data['inggris_smt1'].'</td>
    </tr>

  <tr>
    <td  align="center">8.</td>
  <td >&nbsp Seni</td>
      <td  align="center">'.$data['seni_smt1'].'</td>
    </tr>
  
    </tr>
    <td  align="center">9.</td>
  <td >&nbsp Pendidikan Jasmani, Olahraga & Kesehatan</td>
      <td  align="center">'.$data['pjok_smt1'].'</td>
    </tr>
  
    </tr>
    <td  align="center">10.</td>
  <td >&nbsp Informatika</td>
      <td  align="center">'.$data['informatika_smt1'].'</td>
    </tr>
  
    </tr>
    <td  align="center">11.</td>
  <td >&nbsp Bahasa Jawa</td>
      <td  align="center">'.$data['jawa_smt1'].'</td>
    </tr>
  
    </tr>
    <td  align="center">12.</td>
  <td >&nbsp Kesenian Daerah</td>
      <td  align="center">'.$data['kesda_smt1'].'</td>
    </tr>
    
    </tr>
    <td></td>
    <td style="border:none"><center><b>Rata-Rata</b></center></td>
      <td align="center"><b>'.round($rata_smt1, 2).'</b></td>
    </tr>
  </tr>
     
    </tr>
  </tbody>
</table>
  <br>
    <h5><strong>EKSTRAKURIKULER</strong></h5>
              <table class="table table-striped table-bordered" width="100%" border="1">
        <tbody>
          <tr style="font-weight:bold" align="center">
            <td width="12%">No</td>
            <td>Ekstrakurikuler</td>
            <td width="20%">Keterangan</td>
          </tr>
          
          <tr>
            <td align="center">1.</td>
            <td>English Conversation</td>
            <td align="center">'.$ekskul['english_smt1'].'</td>
          </tr>

          <tr>
            <td align="center">2.</td>
            <td>Pathfinder</td>
            <td align="center">'.$ekskul['pathfinder_smt1'].'</td>
          </tr>

          <tr>
            <td align="center">3.</td>
            <td>Karawitan</td>
          <td align="center">'.$ekskul['karawitan_smt1'].'</td>
          </tr>
          </tbody>
          </table>
    <br>
      
  <h5><strong>PENGEMBANGAN DIRI</strong></h5>
    <table class="table table-striped table-bordered" width="100%" border="1">
    <tbody>
      <tr style="font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Jenis Kegiatan</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>Bimbingan & Konseling</td>
        <td align="center">'.$pengembangan['bk_smt1'].'</td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Follow The Bible</td>
        <td align="center">'.$pengembangan['bible_smt1'].'</td>
      </tr>

      </tbody>
      </table>
      <br>

      <h5><strong>REKAP KEHADIRAN</strong></h5>
          <table class="table table-striped table-bordered" width="100%" border="1">
    <tbody>
      <tr style="font-weight:bold" align="center">
        <td width="30%">Nama Siswa</td>
        <td>Keterangan</td>
        <td width="20%">Rekap Kehadiran</td>
      </tr>
      
      <tr>
        <td style="font-weight:bold" align="center" rowspan="3">'.strtoupper($hadir['nama']).'</td>
        <td>Sakit</td>
        <td align="center">'.$hadir['sakit_smt1'].'</td>
      </tr>

      <tr>
        <td>Izin</td>
        <td align="center">'.$hadir['izin_smt1'].'</td>
      </tr>

      <tr>
        <td>Tanpa Keterangan (Alpha)</td>
       <td align="center">'.$hadir['alpha_smt1'].'</td>
      </tr>
      </tbody>
      </table>
      ';
    ?>
      </div>
        </div>
    </div>
    
    <!-- Tab Semester 2 -->
    <div class="tab-pane fade" id="navs-justified-dua" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Nilai Rapor Semester 2</h5><hr>
        <center><a href="cetak/rapor_smt2.php?nisn=<?php echo htmlspecialchars($data['nisn'])?>" class="btn btn-primary mb-4"><i class="bx bxs-printer"></i>&nbspCetak Rapor Semester 2</a></center>
        <?php
     echo'
     <h5><strong>WALI KELAS</strong></h5>
              <table class="table table-striped table-bordered" width="100%" border="1">
        <tbody>
          <tr style="font-weight:bold" align="center">
            <td width="12%">Semester 2</td>
             ';
        if($siswa['wali_smt2'] == NULL){
          echo '<td><i>Nama Wali Kelas Belum Diinputkan</i></td>';
        } else {
        echo '           
            <td>'.$siswa['wali_smt2'].'</td>
            ';
          }
      echo'
          </tr>
          </tbody>
          </table>
    <br>

     <h5><strong>NILAI AKADEMIK</strong></h5>
      <table class="table table-bordered table-striped" width="100%" border="1">
      <tbody >
  
  <tr>
  <td align="center"><b>No</b></td>
  <td align="center"><b>Mata Pelajaran</b></td>
      <td  align="center"><b>Nilai Akhir</b></td>
    </tr>
    
    <tr>
  <td  align="center">1.</td>
  <td >&nbsp Pendidikan Agama dan Budi Pekerti</td>
      <td  align="center">'.$data['agama_smt2'].'</td>
    </tr>

    <tr>
    <td  align="center">2.</td>
  <td >&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
      <td  align="center">'.$data['pkn_smt2'].'</td>
    </tr>

    <tr>
    <td  align="center">3. </td>
  <td >&nbsp Bahasa Indonesia</td>
      <td  align="center">'.$data['indo_smt2'].'</td>
    </tr>
    
    <tr>
    <td  align="center">4. </td>
  <td >&nbsp Matematika</td>
      <td  align="center">'.$data['mtk_smt2'].'</td>
    </tr>
    
    <tr>
    <td  align="center">5. </td>
  <td >&nbsp Ilmu Pengetahuan Alam</td>
      <td  align="center">'.$data['ipa_smt2'].'</td>
    </tr>
    
    <tr>
    <td  align="center">6. </td>
  <td >&nbsp Ilmu Pengetahuan Sosial</td>
      <td  align="center">'.$data['ips_smt2'].'</td>
    </tr>
    
    <tr>
    <td  align="center">7. </td>
  <td >&nbsp Bahasa Inggris</td>
      <td  align="center">'.$data['inggris_smt2'].'</td>
    </tr>

  <tr>
    <td  align="center">8.</td>
  <td >&nbsp Seni</td>
      <td  align="center">'.$data['seni_smt2'].'</td>
    </tr>
  
    </tr>
    <td  align="center">9.</td>
  <td >&nbsp Pendidikan Jasmani, Olahraga & Kesehatan</td>
      <td  align="center">'.$data['pjok_smt2'].'</td>
    </tr>
  
    </tr>
    <td  align="center">10.</td>
  <td >&nbsp Informatika</td>
      <td  align="center">'.$data['informatika_smt2'].'</td>
    </tr>
  
    </tr>
    <td  align="center">11.</td>
  <td >&nbsp Bahasa Jawa</td>
      <td  align="center">'.$data['jawa_smt2'].'</td>
    </tr>
  
    </tr>
    <td  align="center">12.</td>
  <td >&nbsp Kesenian Daerah</td>
      <td  align="center">'.$data['kesda_smt2'].'</td>
    </tr>
    
    </tr>
    <td></td>
    <td style="border:none"><center><b>Rata-Rata</b></center></td>
      <td align="center"><b>'.round($rata_smt2, 2).'</b></td>
    </tr>
  </tr>
     
    </tr>
  </tbody>
</table>
  <br>
    <h5><strong>EKSTRAKURIKULER</strong></h5>
              <table class="table table-striped table-bordered" width="100%" border="1">
        <tbody>
          <tr style="font-weight:bold" align="center">
            <td width="12%">No</td>
            <td>Ekstrakurikuler</td>
            <td width="20%">Keterangan</td>
          </tr>
          
          <tr>
            <td align="center">1.</td>
            <td>English Conversation</td>
            <td align="center">'.$ekskul['english_smt2'].'</td>
          </tr>

          <tr>
            <td align="center">2.</td>
            <td>Pathfinder</td>
            <td align="center">'.$ekskul['pathfinder_smt2'].'</td>
          </tr>

          <tr>
            <td align="center">3.</td>
            <td>Karawitan</td>
          <td align="center">'.$ekskul['karawitan_smt2'].'</td>
          </tr>
          </tbody>
          </table>
    <br>
      
  <h5><strong>PENGEMBANGAN DIRI</strong></h5>
    <table class="table table-striped table-bordered" width="100%" border="1">
    <tbody>
      <tr style="font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Jenis Kegiatan</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>Bimbingan & Konseling</td>
        <td align="center">'.$pengembangan['bk_smt2'].'</td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Follow The Bible</td>
        <td align="center">'.$pengembangan['bible_smt2'].'</td>
      </tr>

      </tbody>
      </table>
      <br>

      <h5><strong>REKAP KEHADIRAN</strong></h5>
          <table class="table table-striped table-bordered" width="100%" border="1">
    <tbody>
      <tr style="font-weight:bold" align="center">
        <td width="30%">Nama Siswa</td>
        <td>Keterangan</td>
        <td width="20%">Rekap Kehadiran</td>
      </tr>
      
      <tr>
        <td style="font-weight:bold" align="center" rowspan="3">'.strtoupper($hadir['nama']).'</td>
        <td>Sakit</td>
        <td align="center">'.$hadir['sakit_smt2'].'</td>
      </tr>

      <tr>
        <td>Izin</td>
        <td align="center">'.$hadir['izin_smt2'].'</td>
      </tr>

      <tr>
        <td>Tanpa Keterangan (Alpha)</td>
       <td align="center">'.$hadir['alpha_smt2'].'</td>
      </tr>
      </tbody>
      </table>
      <br>

      <h5><strong>STATUS KENAIKAN</strong></h5>
      ';
      if($siswa['kenaikan_smt2'] == 'Naik Ke Kelas VIII'){
        echo '<table class="table" width="100%">
    <tbody>
      <tr style="font-weight:bold; background-color:#5cb85c;" align="center">
        <td colspan="3" style="color:#f7f7f7">NAIK KE KELAS VIII</td>
      </tr>
      </tbody>
      </table>';
      } else if($siswa['kenaikan_smt2'] == 'Tidak Naik Kelas'){
        echo '<table class="table" width="100%">
    <tbody>
      <tr style="font-weight:bold; background-color:#d9534f;" align="center">
        <td colspan="3" style="color:#f7f7f7">TIDAK NAIK KELAS</td>
      </tr>
      </tbody>
      </table>';
      } else {
        echo '<table class="table" width="100%">
    <tbody>
      <tr style="font-weight:bold; background-color:#f0ad4e;" align="center">
        <td colspan="3" style="color:#f7f7f7">WALI KELAS BELUM MENGINPUTKAN STATUS KENAIKAN</td>
      </tr>
      </tbody>
      </table>';
      }
    ?>
      </div>
        </div>
    </div>
    
    <!-- Tab Semester 3 -->
    <div class="tab-pane fade" id="navs-justified-tiga" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Nilai Rapor Semester 3</h5><hr>
        <center><a href="cetak/rapor_smt3.php?nisn=<?php echo htmlspecialchars($data['nisn'])?>" class="btn btn-primary mb-4"><i class="bx bxs-printer"></i>&nbspCetak Rapor Semester 3</a></center>
        <?php
     echo'
     <h5><strong>WALI KELAS</strong></h5>
              <table class="table table-striped table-bordered" width="100%" border="1">
        <tbody>
          <tr style="font-weight:bold" align="center">
            <td width="12%">Semester 3</td>
             ';
        if($siswa['wali_smt3'] == NULL){
          echo '<td><i>Nama Wali Kelas Belum Diinputkan</i></td>';
        } else {
        echo '           
            <td>'.$siswa['wali_smt3'].'</td>
            ';
          }
      echo'
          </tr>
          </tbody>
          </table>
    <br>

     <h5><strong>NILAI AKADEMIK</strong></h5>
      <table class="table table-bordered table-striped" width="100%" border="1">
      <tbody >
  
  <tr>
  <td align="center"><b>No</b></td>
  <td align="center"><b>Mata Pelajaran</b></td>
      <td  align="center"><b>Nilai Akhir</b></td>
    </tr>
    
    <tr>
  <td  align="center">1.</td>
  <td >&nbsp Pendidikan Agama dan Budi Pekerti</td>
      <td  align="center">'.$data['agama_smt3'].'</td>
    </tr>

    <tr>
    <td  align="center">2.</td>
  <td >&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
      <td  align="center">'.$data['pkn_smt3'].'</td>
    </tr>

    <tr>
    <td  align="center">3. </td>
  <td >&nbsp Bahasa Indonesia</td>
      <td  align="center">'.$data['indo_smt3'].'</td>
    </tr>
    
    <tr>
    <td  align="center">4. </td>
  <td >&nbsp Matematika</td>
      <td  align="center">'.$data['mtk_smt3'].'</td>
    </tr>
    
    <tr>
    <td  align="center">5. </td>
  <td >&nbsp Ilmu Pengetahuan Alam</td>
      <td  align="center">'.$data['ipa_smt3'].'</td>
    </tr>
    
    <tr>
    <td  align="center">6. </td>
  <td >&nbsp Ilmu Pengetahuan Sosial</td>
      <td  align="center">'.$data['ips_smt3'].'</td>
    </tr>
    
    <tr>
    <td  align="center">7. </td>
  <td >&nbsp Bahasa Inggris</td>
      <td  align="center">'.$data['inggris_smt3'].'</td>
    </tr>

  <tr>
    <td  align="center">8.</td>
  <td >&nbsp Seni</td>
      <td  align="center">'.$data['seni_smt3'].'</td>
    </tr>
  
    </tr>
    <td  align="center">9.</td>
  <td >&nbsp Pendidikan Jasmani, Olahraga & Kesehatan</td>
      <td  align="center">'.$data['pjok_smt3'].'</td>
    </tr>
  
    </tr>
    <td  align="center">10.</td>
  <td >&nbsp Informatika</td>
      <td  align="center">'.$data['informatika_smt3'].'</td>
    </tr>
  
    </tr>
    <td  align="center">11.</td>
  <td >&nbsp Bahasa Jawa</td>
      <td  align="center">'.$data['jawa_smt3'].'</td>
    </tr>
  
    </tr>
    <td  align="center">12.</td>
  <td >&nbsp Kesenian Daerah</td>
      <td  align="center">'.$data['kesda_smt3'].'</td>
    </tr>
    
    </tr>
    <td></td>
    <td style="border:none"><center><b>Rata-Rata</b></center></td>
      <td align="center"><b>'.round($rata_smt3, 2).'</b></td>
    </tr>
  </tr>
     
    </tr>
  </tbody>
</table>
  <br>
    <h5><strong>EKSTRAKURIKULER</strong></h5>
              <table class="table table-striped table-bordered" width="100%" border="1">
        <tbody>
          <tr style="font-weight:bold" align="center">
            <td width="12%">No</td>
            <td>Ekstrakurikuler</td>
            <td width="20%">Keterangan</td>
          </tr>
          
          <tr>
            <td align="center">1.</td>
            <td>English Conversation</td>
            <td align="center">'.$ekskul['english_smt3'].'</td>
          </tr>

          <tr>
            <td align="center">2.</td>
            <td>Pathfinder</td>
            <td align="center">'.$ekskul['pathfinder_smt3'].'</td>
          </tr>

          <tr>
            <td align="center">3.</td>
            <td>Karawitan</td>
          <td align="center">'.$ekskul['karawitan_smt3'].'</td>
          </tr>
          </tbody>
          </table>
    <br>
      
  <h5><strong>PENGEMBANGAN DIRI</strong></h5>
    <table class="table table-striped table-bordered" width="100%" border="1">
    <tbody>
      <tr style="font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Jenis Kegiatan</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>Bimbingan & Konseling</td>
        <td align="center">'.$pengembangan['bk_smt3'].'</td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Follow The Bible</td>
        <td align="center">'.$pengembangan['bible_smt3'].'</td>
      </tr>

      </tbody>
      </table>
      <br>

      <h5><strong>REKAP KEHADIRAN</strong></h5>
          <table class="table table-striped table-bordered" width="100%" border="1">
    <tbody>
      <tr style="font-weight:bold" align="center">
        <td width="30%">Nama Siswa</td>
        <td>Keterangan</td>
        <td width="20%">Rekap Kehadiran</td>
      </tr>
      
      <tr>
        <td style="font-weight:bold" align="center" rowspan="3">'.strtoupper($hadir['nama']).'</td>
        <td>Sakit</td>
        <td align="center">'.$hadir['sakit_smt3'].'</td>
      </tr>

      <tr>
        <td>Izin</td>
        <td align="center">'.$hadir['izin_smt3'].'</td>
      </tr>

      <tr>
        <td>Tanpa Keterangan (Alpha)</td>
       <td align="center">'.$hadir['alpha_smt3'].'</td>
      </tr>
      </tbody>
      </table>
      ';
    ?>
      </div>
        </div>
    </div>

    <!-- Tab Semester 4 -->
    <div class="tab-pane fade" id="navs-justified-empat" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Nilai Rapor Semester 4</h5><hr>
        <center><a href="cetak/rapor_smt4.php?nisn=<?php echo htmlspecialchars($data['nisn'])?>" class="btn btn-primary mb-4"><i class="bx bxs-printer"></i>&nbspCetak Rapor Semester 4</a></center>
        <?php
     echo'
     <h5><strong>WALI KELAS</strong></h5>
              <table class="table table-striped table-bordered" width="100%" border="1">
        <tbody>
          <tr style="font-weight:bold" align="center">
            <td width="12%">Semester 4</td>
             ';
        if($siswa['wali_smt4'] == NULL){
          echo '<td><i>Nama Wali Kelas Belum Diinputkan</i></td>';
        } else {
        echo '           
            <td>'.$siswa['wali_smt4'].'</td>
            ';
          }
      echo'
          </tr>
          </tbody>
          </table>
    <br>

     <h5><strong>NILAI AKADEMIK</strong></h5>
      <table class="table table-bordered table-striped" width="100%" border="1">
      <tbody >
  
  <tr>
  <td align="center"><b>No</b></td>
  <td align="center"><b>Mata Pelajaran</b></td>
      <td  align="center"><b>Nilai Akhir</b></td>
    </tr>
    
    <tr>
  <td  align="center">1.</td>
  <td >&nbsp Pendidikan Agama dan Budi Pekerti</td>
      <td  align="center">'.$data['agama_smt4'].'</td>
    </tr>

    <tr>
    <td  align="center">2.</td>
  <td >&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
      <td  align="center">'.$data['pkn_smt4'].'</td>
    </tr>

    <tr>
    <td  align="center">3. </td>
  <td >&nbsp Bahasa Indonesia</td>
      <td  align="center">'.$data['indo_smt4'].'</td>
    </tr>
    
    <tr>
    <td  align="center">4. </td>
  <td >&nbsp Matematika</td>
      <td  align="center">'.$data['mtk_smt4'].'</td>
    </tr>
    
    <tr>
    <td  align="center">5. </td>
  <td >&nbsp Ilmu Pengetahuan Alam</td>
      <td  align="center">'.$data['ipa_smt4'].'</td>
    </tr>
    
    <tr>
    <td  align="center">6. </td>
  <td >&nbsp Ilmu Pengetahuan Sosial</td>
      <td  align="center">'.$data['ips_smt4'].'</td>
    </tr>
    
    <tr>
    <td  align="center">7. </td>
  <td >&nbsp Bahasa Inggris</td>
      <td  align="center">'.$data['inggris_smt4'].'</td>
    </tr>

  <tr>
    <td  align="center">8.</td>
  <td >&nbsp Seni</td>
      <td  align="center">'.$data['seni_smt4'].'</td>
    </tr>
  
    </tr>
    <td  align="center">9.</td>
  <td >&nbsp Pendidikan Jasmani, Olahraga & Kesehatan</td>
      <td  align="center">'.$data['pjok_smt4'].'</td>
    </tr>
  
    </tr>
    <td  align="center">10.</td>
  <td >&nbsp Informatika</td>
      <td  align="center">'.$data['informatika_smt4'].'</td>
    </tr>
  
    </tr>
    <td  align="center">11.</td>
  <td >&nbsp Bahasa Jawa</td>
      <td  align="center">'.$data['jawa_smt4'].'</td>
    </tr>
  
    </tr>
    <td  align="center">12.</td>
  <td >&nbsp Kesenian Daerah</td>
      <td  align="center">'.$data['kesda_smt4'].'</td>
    </tr>
    
    </tr>
    <td></td>
    <td style="border:none"><center><b>Rata-Rata</b></center></td>
      <td align="center"><b>'.round($rata_smt4, 2).'</b></td>
    </tr>
  </tr>
     
    </tr>
  </tbody>
</table>
  <br>
    <h5><strong>EKSTRAKURIKULER</strong></h5>
              <table class="table table-striped table-bordered" width="100%" border="1">
        <tbody>
          <tr style="font-weight:bold" align="center">
            <td width="12%">No</td>
            <td>Ekstrakurikuler</td>
            <td width="20%">Keterangan</td>
          </tr>
          
          <tr>
            <td align="center">1.</td>
            <td>English Conversation</td>
            <td align="center">'.$ekskul['english_smt4'].'</td>
          </tr>

          <tr>
            <td align="center">2.</td>
            <td>Pathfinder</td>
            <td align="center">'.$ekskul['pathfinder_smt4'].'</td>
          </tr>

          <tr>
            <td align="center">3.</td>
            <td>Karawitan</td>
          <td align="center">'.$ekskul['karawitan_smt4'].'</td>
          </tr>
          </tbody>
          </table>
    <br>
      
  <h5><strong>PENGEMBANGAN DIRI</strong></h5>
    <table class="table table-striped table-bordered" width="100%" border="1">
    <tbody>
      <tr style="font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Jenis Kegiatan</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>Bimbingan & Konseling</td>
        <td align="center">'.$pengembangan['bk_smt4'].'</td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Follow The Bible</td>
        <td align="center">'.$pengembangan['bible_smt4'].'</td>
      </tr>

      </tbody>
      </table>
      <br>

      <h5><strong>REKAP KEHADIRAN</strong></h5>
          <table class="table table-striped table-bordered" width="100%" border="1">
    <tbody>
      <tr style="font-weight:bold" align="center">
        <td width="30%">Nama Siswa</td>
        <td>Keterangan</td>
        <td width="20%">Rekap Kehadiran</td>
      </tr>
      
      <tr>
        <td style="font-weight:bold" align="center" rowspan="3">'.strtoupper($hadir['nama']).'</td>
        <td>Sakit</td>
        <td align="center">'.$hadir['sakit_smt4'].'</td>
      </tr>

      <tr>
        <td>Izin</td>
        <td align="center">'.$hadir['izin_smt4'].'</td>
      </tr>

      <tr>
        <td>Tanpa Keterangan (Alpha)</td>
       <td align="center">'.$hadir['alpha_smt4'].'</td>
      </tr>
      </tbody>
      </table>
      <br>

      <h5><strong>STATUS KENAIKAN</strong></h5>
      ';
      if($siswa['kenaikan_smt4'] == 'Naik Ke Kelas IX'){
        echo '<table class="table" width="100%">
    <tbody>
      <tr style="font-weight:bold; background-color:#5cb85c;" align="center">
        <td colspan="3" style="color:#f7f7f7">NAIK KE KELAS IX</td>
      </tr>
      </tbody>
      </table>';
      } else if($siswa['kenaikan_smt4'] == 'Tidak Naik Kelas'){
        echo '<table class="table" width="100%">
    <tbody>
      <tr style="font-weight:bold; background-color:#d9534f;" align="center">
        <td colspan="3" style="color:#f7f7f7">TIDAK NAIK KELAS</td>
      </tr>
      </tbody>
      </table>';
      } else {
        echo '<table class="table" width="100%">
    <tbody>
      <tr style="font-weight:bold; background-color:#f0ad4e;" align="center">
        <td colspan="3" style="color:#f7f7f7">WALI KELAS BELUM MENGINPUTKAN STATUS KENAIKAN</td>
      </tr>
      </tbody>
      </table>';
      }
    ?>
      </div>
        </div>
    </div>

    <!-- Tab Semester 5 -->
    <div class="tab-pane fade" id="navs-justified-lima" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Nilai Rapor Semester 5</h5><hr>
        <center><a href="cetak/rapor_smt5.php?nisn=<?php echo htmlspecialchars($data['nisn'])?>" class="btn btn-primary mb-4"><i class="bx bxs-printer"></i>&nbspCetak Rapor Semester 5</a></center>
        <?php
     echo'
     <h5><strong>WALI KELAS</strong></h5>
              <table class="table table-striped table-bordered" width="100%" border="1">
        <tbody>
          <tr style="font-weight:bold" align="center">
            <td width="12%">Semester 5</td>
            ';
        if($siswa['wali_smt5'] == NULL){
          echo '<td><i>Nama Wali Kelas Belum Diinputkan</i></td>';
        } else {
        echo '           
            <td>'.$siswa['wali_smt5'].'</td>
            ';
          }
      echo'
          </tr>
          </tbody>
          </table>
    <br>

     <h5><strong>NILAI AKADEMIK</strong></h5>
      <table class="table table-bordered table-striped" width="100%" border="1">
      <tbody >
  
  <tr>
  <td align="center"><b>No</b></td>
  <td align="center"><b>Mata Pelajaran</b></td>
      <td  align="center"><b>Nilai Akhir</b></td>
    </tr>
    
    <tr>
  <td  align="center">1.</td>
  <td >&nbsp Pendidikan Agama dan Budi Pekerti</td>
      <td  align="center">'.$data['agama_smt5'].'</td>
    </tr>

    <tr>
    <td  align="center">2.</td>
  <td >&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
      <td  align="center">'.$data['pkn_smt5'].'</td>
    </tr>

    <tr>
    <td  align="center">3. </td>
  <td >&nbsp Bahasa Indonesia</td>
      <td  align="center">'.$data['indo_smt5'].'</td>
    </tr>
    
    <tr>
    <td  align="center">4. </td>
  <td >&nbsp Matematika</td>
      <td  align="center">'.$data['mtk_smt5'].'</td>
    </tr>
    
    <tr>
    <td  align="center">5. </td>
  <td >&nbsp Ilmu Pengetahuan Alam</td>
      <td  align="center">'.$data['ipa_smt5'].'</td>
    </tr>
    
    <tr>
    <td  align="center">6. </td>
  <td >&nbsp Ilmu Pengetahuan Sosial</td>
      <td  align="center">'.$data['ips_smt5'].'</td>
    </tr>
    
    <tr>
    <td  align="center">7. </td>
  <td >&nbsp Bahasa Inggris</td>
      <td  align="center">'.$data['inggris_smt5'].'</td>
    </tr>

  <tr>
    <td  align="center">8.</td>
  <td >&nbsp Seni</td>
      <td  align="center">'.$data['seni_smt5'].'</td>
    </tr>
  
    </tr>
    <td  align="center">9.</td>
  <td >&nbsp Pendidikan Jasmani, Olahraga & Kesehatan</td>
      <td  align="center">'.$data['pjok_smt5'].'</td>
    </tr>
  
    </tr>
    <td  align="center">10.</td>
  <td >&nbsp Informatika</td>
      <td  align="center">'.$data['informatika_smt5'].'</td>
    </tr>
  
    </tr>
    <td  align="center">11.</td>
  <td >&nbsp Bahasa Jawa</td>
      <td  align="center">'.$data['jawa_smt5'].'</td>
    </tr>
  
    </tr>
    <td  align="center">12.</td>
  <td >&nbsp Kesenian Daerah</td>
      <td  align="center">'.$data['kesda_smt5'].'</td>
    </tr>
    
    </tr>
    <td></td>
    <td style="border:none"><center><b>Rata-Rata</b></center></td>
      <td align="center"><b>'.round($rata_smt5, 2).'</b></td>
    </tr>
  </tr>
     
    </tr>
  </tbody>
</table>
  <br>
    <h5><strong>EKSTRAKURIKULER</strong></h5>
              <table class="table table-striped table-bordered" width="100%" border="1">
        <tbody>
          <tr style="font-weight:bold" align="center">
            <td width="12%">No</td>
            <td>Ekstrakurikuler</td>
            <td width="20%">Keterangan</td>
          </tr>
          
          <tr>
            <td align="center">1.</td>
            <td>English Conversation</td>
            <td align="center">'.$ekskul['english_smt5'].'</td>
          </tr>

          <tr>
            <td align="center">2.</td>
            <td>Pathfinder</td>
            <td align="center">'.$ekskul['pathfinder_smt5'].'</td>
          </tr>

          <tr>
            <td align="center">3.</td>
            <td>Karawitan</td>
          <td align="center">'.$ekskul['karawitan_smt5'].'</td>
          </tr>
          </tbody>
          </table>
    <br>
      
  <h5><strong>PENGEMBANGAN DIRI</strong></h5>
    <table class="table table-striped table-bordered" width="100%" border="1">
    <tbody>
      <tr style="font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Jenis Kegiatan</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>Bimbingan & Konseling</td>
        <td align="center">'.$pengembangan['bk_smt5'].'</td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Follow The Bible</td>
        <td align="center">'.$pengembangan['bible_smt5'].'</td>
      </tr>

      </tbody>
      </table>
      <br>

      <h5><strong>REKAP KEHADIRAN</strong></h5>
          <table class="table table-striped table-bordered" width="100%" border="1">
    <tbody>
      <tr style="font-weight:bold" align="center">
        <td width="30%">Nama Siswa</td>
        <td>Keterangan</td>
        <td width="20%">Rekap Kehadiran</td>
      </tr>
      
      <tr>
        <td style="font-weight:bold" align="center" rowspan="3">'.strtoupper($hadir['nama']).'</td>
        <td>Sakit</td>
        <td align="center">'.$hadir['sakit_smt5'].'</td>
      </tr>

      <tr>
        <td>Izin</td>
        <td align="center">'.$hadir['izin_smt5'].'</td>
      </tr>

      <tr>
        <td>Tanpa Keterangan (Alpha)</td>
       <td align="center">'.$hadir['alpha_smt5'].'</td>
      </tr>
      </tbody>
      </table>
      ';
    ?>
      </div>
        </div>
    </div>

    <!-- Tab Semester 5 -->
    <div class="tab-pane fade" id="navs-justified-enam" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Nilai Rapor Semester 6</h5><hr>
        <center><a href="cetak/rapor_smt6.php?nisn=<?php echo htmlspecialchars($data['nisn'])?>" class="btn btn-primary mb-4"><i class="bx bxs-printer"></i>&nbspCetak Rapor Semester 6</a></center>
        <?php
     echo'
     <h5><strong>WALI KELAS</strong></h5>
              <table class="table table-striped table-bordered" width="100%" border="1">
        <tbody>
          <tr style="font-weight:bold" align="center">
            <td width="12%">Semester 6</td>
             ';
        if($siswa['wali_smt6'] == NULL){
          echo '<td><i>Nama Wali Kelas Belum Diinputkan</i></td>';
        } else {
        echo '           
            <td>'.$siswa['wali_smt6'].'</td>
            ';
          }
      echo'
          </tr>
          </tbody>
          </table>
    <br>

     <h5><strong>NILAI AKADEMIK</strong></h5>
      <table class="table table-bordered table-striped" width="100%" border="1">
      <tbody >
  
  <tr>
  <td align="center"><b>No</b></td>
  <td align="center"><b>Mata Pelajaran</b></td>
      <td  align="center"><b>Nilai Akhir</b></td>
    </tr>
    
    <tr>
  <td  align="center">1.</td>
  <td >&nbsp Pendidikan Agama dan Budi Pekerti</td>
      <td  align="center">'.$data['agama_smt6'].'</td>
    </tr>

    <tr>
    <td  align="center">2.</td>
  <td >&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
      <td  align="center">'.$data['pkn_smt6'].'</td>
    </tr>

    <tr>
    <td  align="center">3. </td>
  <td >&nbsp Bahasa Indonesia</td>
      <td  align="center">'.$data['indo_smt6'].'</td>
    </tr>
    
    <tr>
    <td  align="center">4. </td>
  <td >&nbsp Matematika</td>
      <td  align="center">'.$data['mtk_smt6'].'</td>
    </tr>
    
    <tr>
    <td  align="center">5. </td>
  <td >&nbsp Ilmu Pengetahuan Alam</td>
      <td  align="center">'.$data['ipa_smt6'].'</td>
    </tr>
    
    <tr>
    <td  align="center">6. </td>
  <td >&nbsp Ilmu Pengetahuan Sosial</td>
      <td  align="center">'.$data['ips_smt6'].'</td>
    </tr>
    
    <tr>
    <td  align="center">7. </td>
  <td >&nbsp Bahasa Inggris</td>
      <td  align="center">'.$data['inggris_smt6'].'</td>
    </tr>

  <tr>
    <td  align="center">8.</td>
  <td >&nbsp Seni</td>
      <td  align="center">'.$data['seni_smt6'].'</td>
    </tr>
  
    </tr>
    <td  align="center">9.</td>
  <td >&nbsp Pendidikan Jasmani, Olahraga & Kesehatan</td>
      <td  align="center">'.$data['pjok_smt6'].'</td>
    </tr>
  
    </tr>
    <td  align="center">10.</td>
  <td >&nbsp Informatika</td>
      <td  align="center">'.$data['informatika_smt6'].'</td>
    </tr>
  
    </tr>
    <td  align="center">11.</td>
  <td >&nbsp Bahasa Jawa</td>
      <td  align="center">'.$data['jawa_smt6'].'</td>
    </tr>
  
    </tr>
    <td  align="center">12.</td>
  <td >&nbsp Kesenian Daerah</td>
      <td  align="center">'.$data['kesda_smt6'].'</td>
    </tr>
    
    </tr>
    <td></td>
    <td style="border:none"><center><b>Rata-Rata</b></center></td>
      <td align="center"><b>'.round($rata_smt6, 2).'</b></td>
    </tr>
  </tr>
     
    </tr>
  </tbody>
</table>
  <br>
    <h5><strong>EKSTRAKURIKULER</strong></h5>
              <table class="table table-striped table-bordered" width="100%" border="1">
        <tbody>
          <tr style="font-weight:bold" align="center">
            <td width="12%">No</td>
            <td>Ekstrakurikuler</td>
            <td width="20%">Keterangan</td>
          </tr>
          
          <tr>
            <td align="center">1.</td>
            <td>English Conversation</td>
            <td align="center">'.$ekskul['english_smt6'].'</td>
          </tr>

          <tr>
            <td align="center">2.</td>
            <td>Pathfinder</td>
            <td align="center">'.$ekskul['pathfinder_smt6'].'</td>
          </tr>

          <tr>
            <td align="center">3.</td>
            <td>Karawitan</td>
          <td align="center">'.$ekskul['karawitan_smt6'].'</td>
          </tr>
          </tbody>
          </table>
    <br>
      
  <h5><strong>PENGEMBANGAN DIRI</strong></h5>
    <table class="table table-striped table-bordered" width="100%" border="1">
    <tbody>
      <tr style="font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Jenis Kegiatan</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>Bimbingan & Konseling</td>
        <td align="center">'.$pengembangan['bk_smt6'].'</td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Follow The Bible</td>
        <td align="center">'.$pengembangan['bible_smt6'].'</td>
      </tr>

      </tbody>
      </table>
      <br>

      <h5><strong>REKAP KEHADIRAN</strong></h5>
          <table class="table table-striped table-bordered" width="100%" border="1">
    <tbody>
      <tr style="font-weight:bold" align="center">
        <td width="30%">Nama Siswa</td>
        <td>Keterangan</td>
        <td width="20%">Rekap Kehadiran</td>
      </tr>
      
      <tr>
        <td style="font-weight:bold" align="center" rowspan="3">'.strtoupper($hadir['nama']).'</td>
        <td>Sakit</td>
        <td align="center">'.$hadir['sakit_smt6'].'</td>
      </tr>

      <tr>
        <td>Izin</td>
        <td align="center">'.$hadir['izin_smt6'].'</td>
      </tr>

      <tr>
        <td>Tanpa Keterangan (Alpha)</td>
       <td align="center">'.$hadir['alpha_smt6'].'</td>
      </tr>
      </tbody>
      </table>
      <br>

      <h5><strong>STATUS KELULUSAN</strong></h5>
      ';
      if($siswa['kenaikan_smt6'] == 'Lulus'){
        echo '<table class="table" width="100%">
    <tbody>
      <tr style="font-weight:bold; background-color:#5cb85c;" align="center">
        <td colspan="3" style="color:#f7f7f7"><i class="bx bxs-graduation mb-1"></i> SELAMAT ANDA DINYATAKAN TELAH LULUS DARI SMP ADVENT SURAKARTA !</td>
      </tr>
      </tbody>
      </table>';
      } else if($siswa['kenaikan_smt6'] == 'Tidak Lulus'){
        echo '<table class="table" width="100%">
    <tbody>
      <tr style="font-weight:bold; background-color:#d9534f;" align="center">
        <td colspan="3" style="color:#f7f7f7">MOHON MAAF, ANDA TIDAK LULUS</td>
      </tr>
      </tbody>
      </table>';
      } else {
        echo '<table class="table" width="100%">
    <tbody>
      <tr style="font-weight:bold; background-color:#f0ad4e;" align="center">
        <td colspan="3" style="color:#f7f7f7">WALI KELAS BELUM MENGINPUTKAN STATUS KELULUSAN</td>
      </tr>
      </tbody>
      </table>';
      }
    ?>
      </div>
        </div>
    </div>

<!-- Modal Edit Siswa -->
<div class="modal fade" id="edit_siswa<?php echo htmlspecialchars($siswa['nisn'])?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="card">
                    <h4 class="card-header"><strong>Edit Profile | <?php echo $siswa['nama']?></strong></h4>
                    <div class="card-body">
                    <form action="update_siswa.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_siswa" value="<?php echo $siswa['id_siswa'] ?>">

                      <div class="mb-4">
                        <label for="nama" class="form-label">Nama Peserta Didik</label>
                        <input
                          type="text"
                          class="form-control"
                          id="nama"
                          name="nama"
                          value="<?php echo $siswa['nama']?>" />
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <div class="mb-4">
                            <label for="nis" class="form-label">NIS</label>
                            <input
                              class="form-control"
                              type="text"
                              id="nis"
                              name="nis"
                              value="<?php echo $siswa['nis']?>"/>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-4">
                            <label for="nisn" class="form-label">NISN</label>
                            <input
                              class="form-control"
                              type="text"
                              id="nisn"
                              name="nisn"
                              value="<?php echo $siswa['nisn']?>"/>
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="mb-4">
                            <label for="jk" class="form-label">Jenis Kelamin</label>
                              <select class="form-select" id="jk" name="jk" aria-label="Default select example">
                                <?php if($siswa['jk'] == "L"){?>
                                  <option selected value="<?php echo $siswa['jk'] ?>">Laki-Laki</option>
                                  <option value="P">Perempuan</option>
                                  
                                  <?php } else if($siswa['jk'] == "P"){?>
                                  <option selected value="<?php echo $siswa['jk'] ?>">Perempuan</option>
                                  <option value="L">Laki-Laki</option>
                                  <?php }?>
                              </select>
                          </div>
                        </div>
                      </div>
                      <div class="mb-4">
                        <label for="ttl" class="form-label">Tempat, Tanggal Lahir</label>
                        <input
                          type="text"
                          class="form-control"
                          id="ttl"
                          name="ttl"
                          value = "<?php echo $siswa['ttl']?>" />
                      </div>
                      <div class="mb-4">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input
                          type="text"
                          class="form-control"
                          id="alamat"
                          name="alamat"
                          value = "<?php echo $siswa['alamat']?>"  />
                      </div>
                      <div class="mb-4">
                        <label for="tahun_masuk" class="form-label">Tahun Masuk</label>
                        <input
                          type="text"
                          class="form-control"
                          id="tahun_masuk"
                          name="tahun_masuk"
                          value = "<?php echo $siswa['tahun_masuk']?>"  />
                      </div>
                      <div class="mb-4">
                        <label for="foto" class="form-label">Foto</label>
                        <input
                          type="file"
                          class="form-control"
                          id="foto"
                          name="foto" 
                          required autofocus/>
                      </div>

                      <button type="submit" name="submit" class="btn btn-success"><i class="bx bx-check-double"></i> &nbspUpdate</button>
                    </form>
                  </div>
                      
                     
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Of Modals -->
      </div>
<?php
include "footer.php";
?>