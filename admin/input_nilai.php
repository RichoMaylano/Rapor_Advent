<?php
$title = 'Detail Siswa | Aplikasi Pengumuman Kelulusan';
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
                <h5 class="card-header bg-primary text-white mb-6"><strong>Input Nilai Rapor | <?php echo $data['nama']?> | SMP Advent Surakarta</strong></h5>

                <?php
                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    // echo '<script>
                    //       Swal.fire({
                    //       icon: "success",
                    //       title: "'.$_SESSION['pesan'].'",
                    //       showConfirmButton: false,
                    //       timer: 2000
                    //       });
                    //   </script>

                    echo ' <div class="alert alert-success alert-dismissible" role="alert">'
                        .$_SESSION['pesan'].
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                    $_SESSION['pesan'] = '';
                ?>
<div class="container">
<a href="detail_siswa.php?nisn=<?php echo $data['nisn']?>" class="btn btn-danger btn-sm"><i class="bx bxs-chevrons-left"></i> Kembali Halaman Sebelumnya</a><hr>
</div>
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
          <?php }?>
      <?php }?>

  </ul>

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
      
      <?php $query_siswa = "SELECT * FROM data_siswa WHERE nisn = '$nisn'";
        // Melakukan query ke database
        $result_siswa = mysqli_query($db_conn, $query_siswa);
        // Cek jika query berhasil
        if (!$result_siswa) {
            die("Query Error: " . mysqli_error($db_conn));
        }
        $siswa = mysqli_fetch_assoc($result_siswa);
        ?>

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

    <div class="row">
        <div class="col">
        <h5>Pilih Wali Kelas Semester 1</h5><hr>
        <form action="upload/upload_smt1.php" class="form-horizontal" method="post">
        <?php 
        echo '
       <input type="hidden" name="id_siswa" value='.$data['id_siswa'].'>
        <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">Semester</td>
        <td>Nama Wali Kelas</td>
      </tr>
      
      <tr>
        <td align="center">Semester 1</td>
        <td>
        <select class="form-select" id="wali_smt1" name="wali_smt1" aria-label="Default select example">';
        if($siswa['wali_smt1'] == NULL){
        echo'
        <option selected disabled>Pilih Wali Kelas Murid</option>
          <option value="Martha Santi Nugraheni, S.Pd.">Martha Santi Nugraheni, S.Pd.</option>
          <option value="Wilmer F Lumbangaol, S.Fil.">Wilmer F Lumbangaol, S.Fil.</option>
          <option value="Yuriska Christina Arnita Sandy, S.Mat.">Yuriska Christina Arnita Sandy, S.Mat.</option>
          <option value="Niken Agustiningrum, S.Pd.">Niken Agustiningrum, S.Pd.</option>
          <option value="Daniel Adipawoko, S.Kom.">Daniel Adipawoko, S.Kom.</option>
          <option value="Yeni Rustanti, S.Pd.">Yeni Rustanti, S.Pd.</option>
          <option value="Dwi Prasetyo, S.Sn.">Dwi Prasetyo, S.Sn.</option>
          <option value="Nanda Fauzi Amrullah, S.Pd.">Nanda Fauzi Amrullah, S.Pd.</option>
          <option value="Elvy S. J. Nasution, S.I.Kom.">Elvy S. J. Nasution, S.I.Kom.</option>
          <option value="Monika Fitri Setyowati, S.S.">Monika Fitri Setyowati, S.S.</option>
          <option value="Pdt. Deddy Panjaitan">Pdt. Deddy Panjaitan</option>
          <option value="Anton Anita Setyaningsih, A.Md.">Anton Anita Setyaningsih, A.Md.</option>
          <option value="Petrania Putri, S.E.">Petrania Putri, S.E.</option>
          ';
        } else {
          echo '
          <option selected value="'.$siswa['wali_smt1'].'">'.$siswa['wali_smt1'].'</option>
        <option disabled>Pilih Wali Kelas Murid</option>
          <option value="Martha Santi Nugraheni, S.Pd.">Martha Santi Nugraheni, S.Pd.</option>
          <option value="Wilmer F Lumbangaol, S.Fil.">Wilmer F Lumbangaol, S.Fil.</option>
          <option value="Yuriska Christina Arnita Sandy, S.Mat.">Yuriska Christina Arnita Sandy, S.Mat.</option>
          <option value="Niken Agustiningrum, S.Pd.">Niken Agustiningrum, S.Pd.</option>
          <option value="Daniel Adipawoko, S.Kom.">Daniel Adipawoko, S.Kom.</option>
          <option value="Yeni Rustanti, S.Pd.">Yeni Rustanti, S.Pd.</option>
          <option value="Dwi Prasetyo, S.Sn.">Dwi Prasetyo, S.Sn.</option>
          <option value="Nanda Fauzi Amrullah, S.Pd.">Nanda Fauzi Amrullah, S.Pd.</option>
          <option value="Elvy S. J. Nasution, S.I.Kom.">Elvy S. J. Nasution, S.I.Kom.</option>
          <option value="Monika Fitri Setyowati, S.S.">Monika Fitri Setyowati, S.S.</option>
          <option value="Pdt. Deddy Panjaitan">Pdt. Deddy Panjaitan</option>
          <option value="Anton Anita Setyaningsih, A.Md.">Anton Anita Setyaningsih, A.Md.</option>
          <option value="Petrania Putri, S.E.">Petrania Putri, S.E.</option>
          ';
        }
        echo'
    </select>
    </td>

      </tbody>
      </table>
      <br>';
        ?>

        <h5>Input Nilai Rapor Semester 1</h5><hr>
    <?php
    echo'
    <table class="table table-bordered" width="100%" border="1">
    <tbody>

<tr style="background-color:#ffbbb8;">
<td align="center"><b>No</b></td>
<td align="center"><b>Mata Pelajaran</b></td>
    <td width="20%" align="center"><b>Nilai Akhir</b></td>
    <td align="center"><b>Keterangan</b></td>
  </tr>
  
  <tr>
<td  align="center">1.</td>
<td >&nbsp Pendidikan Agama dan Budi Pekerti</td>
    <td align="center"><input type="number" min="0" max="100" class="form-control" name="agama_smt1" id="agama_smt1" value='.$data['agama_smt1'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="agama_smt1_tercapai" id="agama_smt1_tercapai">'.$data['agama_smt1_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="agama_smt1_tidak_tercapai" id="agama_smt1_tidak_tercapai">'.$data['agama_smt1_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">2.</td>
<td >&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="pkn_smt1" id="pkn_smt1" value='.$data['pkn_smt1'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="pkn_smt1_tercapai" id="pkn_smt1_tercapai">'.$data['pkn_smt1_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="pkn_smt1_tidak_tercapai" id="pkn_smt1_tidak_tercapai">'.$data['pkn_smt1_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">3. </td>
<td >&nbsp Bahasa Indonesia</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="indo_smt1" id="indo_smt1" value='.$data['indo_smt1'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="indo_smt1_tercapai" id="indo_smt1_tercapai">'.$data['indo_smt1_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="indo_smt1_tidak_tercapai" id="indo_smt1_tidak_tercapai">'.$data['indo_smt1_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">4. </td>
<td >&nbsp Matematika</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="mtk_smt1" id="mtk_smt1" value='.$data['mtk_smt1'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="mtk_smt1_tercapai" id="mtk_smt1_tercapai">'.$data['mtk_smt1_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="mtk_smt1_tidak_tercapai" id="mtk_smt1_tidak_tercapai">'.$data['mtk_smt1_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">5. </td>
<td >&nbsp Ilmu Pengetahuan Alam</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="ipa_smt1" id="ipa_smt1" value='.$data['ipa_smt1'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="ipa_smt1_tercapai" id="ipa_smt1_tercapai">'.$data['ipa_smt1_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="ipa_smt1_tidak_tercapai" id="ipa_smt1_tidak_tercapai">'.$data['ipa_smt1_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">6. </td>
<td >&nbsp Ilmu Pengetahuan Sosial</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="ips_smt1" id="ips_smt1" value='.$data['ips_smt1'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="ips_smt1_tercapai" id="ips_smt1_tercapai">'.$data['ips_smt1_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="ips_smt1_tidak_tercapai" id="ips_smt1_tidak_tercapai">'.$data['ips_smt1_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">7. </td>
<td >&nbsp Bahasa Inggris</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="inggris_smt1" id="inggris_smt1" value='.$data['inggris_smt1'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="inggris_smt1_tercapai" id="inggris_smt1_tercapai">'.$data['inggris_smt1_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="inggris_smt1_tidak_tercapai" id="inggris_smt1_tidak_tercapai">'.$data['inggris_smt1_tidak_tercapai'].'</textarea>
    </td>
  </tr>

<tr>
  <td  align="center">8.</td>
<td >&nbsp Seni</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="seni_smt1" id="seni_smt1" value='.$data['seni_smt1'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="seni_smt1_tercapai" id="seni_smt1_tercapai">'.$data['seni_smt1_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="seni_smt1_tidak_tercapai" id="seni_smt1_tidak_tercapai">'.$data['seni_smt1_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">9.</td>
<td >&nbsp Pendidikan Jasmani, Olahraga & Kesehatan</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="pjok_smt1" id="pjok_smt1" value='.$data['pjok_smt1'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="pjok_smt1_tercapai" id="pjok_smt1_tercapai">'.$data['pjok_smt1_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="pjok_smt1_tidak_tercapai" id="pjok_smt1_tidak_tercapai">'.$data['pjok_smt1_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">10.</td>
<td >&nbsp Informatika</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="informatika_smt1" id="informatika_smt1" value='.$data['informatika_smt1'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="informatika_smt1_tercapai" id="informatika_smt1_tercapai">'.$data['informatika_smt1_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="informatika_smt1_tidak_tercapai" id="informatika_smt1_tidak_tercapai">'.$data['informatika_smt1_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">11.</td>
<td >&nbsp Bahasa Jawa</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="jawa_smt1" id="jawa_smt1" value='.$data['jawa_smt1'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="jawa_smt1_tercapai" id="jawa_smt1_tercapai">'.$data['jawa_smt1_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="jawa_smt1_tidak_tercapai" id="jawa_smt1_tidak_tercapai">'.$data['jawa_smt1_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">12.</td>
<td >&nbsp Kesenian Daerah</td>
    <td align="center"><input type="number" min="0" max="100" class="form-control" name="kesda_smt1" id="kesda_smt1" value='.$data['kesda_smt1'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="kesda_smt1_tercapai" id="kesda_smt1_tercapai">'.$data['kesda_smt1_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="kesda_smt1_tidak_tercapai" id="kesda_smt1_tidak_tercapai">'.$data['kesda_smt1_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  </table>

  <br>
  <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Ekstrakurikuler</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>English Conversation</td>
        <td> 
          <select class="form-select" id="english_smt1" name="english_smt1" aria-label="Default select example">
              <option selected value="'.$ekskul['english_smt1'].'">'.$ekskul['english_smt1'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
          </td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Pathfinder</td>
        <td>
          <select class="form-select" id="pathfinder_smt1" name="pathfinder_smt1" aria-label="Default select example">
              <option selected value="'.$ekskul['pathfinder_smt1'].'">'.$ekskul['pathfinder_smt1'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>

      <tr>
        <td align="center">3.</td>
        <td>Karawitan</td>
        <td>
          <select class="form-select" id="karawitan_smt1" name="karawitan_smt1" aria-label="Default select example">
              <option selected value="'.$ekskul['karawitan_smt1'].'">'.$ekskul['karawitan_smt1'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>
      </tbody>
      </table>

      <br>
  <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Pengembangan Diri</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>Bimbingan & Konseling</td>
        <td> 
          <select class="form-select" id="bk_smt1" name="bk_smt1" aria-label="Default select example">
              <option selected value="'.$pengembangan['bk_smt1'].'">'.$pengembangan['bk_smt1'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
          </td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Follow The Bible</td>
        <td>
          <select class="form-select" id="bible_smt1" name="bible_smt1" aria-label="Default select example">
              <option selected value="'.$pengembangan['bible_smt1'].'">'.$pengembangan['bible_smt1'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>

<tr>
  <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
<td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
    <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Nilai</button></td>
  </tr>

  </tbody>
  </table>';

    ?>
    </form>
      </div>
        </div>
    </div>
    
    <!-- Tab Semester 2 -->
    <div class="tab-pane fade" id="navs-justified-dua" role="tabpanel">
  
    <div class="row">
        <div class="col">
        <h5>Pilih Wali Kelas Semester 2</h5><hr>
        <form action="upload/upload_smt2.php" class="form-horizontal" method="post">
        <?php 
        echo '
       <input type="hidden" name="id_siswa" value='.$data['id_siswa'].'>
        <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">Semester</td>
        <td>Nama Wali Kelas</td>
      </tr>
      
      <tr>
        <td align="center">Semester 2</td>
        <td>
        <select class="form-select" id="wali_smt2" name="wali_smt2" aria-label="Default select example">';
        if($siswa['wali_smt2'] == NULL){
        echo'
        <option disabled selected>Pilih Wali Kelas Murid</option>
          <option value="Martha Santi Nugraheni, S.Pd.">Martha Santi Nugraheni, S.Pd.</option>
          <option value="Wilmer F Lumbangaol, S.Fil.">Wilmer F Lumbangaol, S.Fil.</option>
          <option value="Yuriska Christina Arnita Sandy, S.Mat.">Yuriska Christina Arnita Sandy, S.Mat.</option>
          <option value="Niken Agustiningrum, S.Pd.">Niken Agustiningrum, S.Pd.</option>
          <option value="Daniel Adipawoko, S.Kom.">Daniel Adipawoko, S.Kom.</option>
          <option value="Yeni Rustanti, S.Pd.">Yeni Rustanti, S.Pd.</option>
          <option value="Dwi Prasetyo, S.Sn.">Dwi Prasetyo, S.Sn.</option>
          <option value="Nanda Fauzi Amrullah, S.Pd.">Nanda Fauzi Amrullah, S.Pd.</option>
          <option value="Elvy S. J. Nasution, S.I.Kom.">Elvy S. J. Nasution, S.I.Kom.</option>
          <option value="Monika Fitri Setyowati, S.S.">Monika Fitri Setyowati, S.S.</option>
          <option value="Pdt. Deddy Panjaitan">Pdt. Deddy Panjaitan</option>
          <option value="Anton Anita Setyaningsih, A.Md.">Anton Anita Setyaningsih, A.Md.</option>
          <option value="Petrania Putri, S.E.">Petrania Putri, S.E.</option>
          ';
        } else {
          echo '
        <option selected value="'.$siswa['wali_smt2'].'">'.$siswa['wali_smt2'].'</option>
          <option disabled>Pilih Wali Kelas Murid</option>
          <option value="Martha Santi Nugraheni, S.Pd.">Martha Santi Nugraheni, S.Pd.</option>
          <option value="Wilmer F Lumbangaol, S.Fil.">Wilmer F Lumbangaol, S.Fil.</option>
          <option value="Yuriska Christina Arnita Sandy, S.Mat.">Yuriska Christina Arnita Sandy, S.Mat.</option>
          <option value="Niken Agustiningrum, S.Pd.">Niken Agustiningrum, S.Pd.</option>
          <option value="Daniel Adipawoko, S.Kom.">Daniel Adipawoko, S.Kom.</option>
          <option value="Yeni Rustanti, S.Pd.">Yeni Rustanti, S.Pd.</option>
          <option value="Dwi Prasetyo, S.Sn.">Dwi Prasetyo, S.Sn.</option>
          <option value="Nanda Fauzi Amrullah, S.Pd.">Nanda Fauzi Amrullah, S.Pd.</option>
          <option value="Elvy S. J. Nasution, S.I.Kom.">Elvy S. J. Nasution, S.I.Kom.</option>
          <option value="Monika Fitri Setyowati, S.S.">Monika Fitri Setyowati, S.S.</option>
          <option value="Pdt. Deddy Panjaitan">Pdt. Deddy Panjaitan</option>
          <option value="Anton Anita Setyaningsih, A.Md.">Anton Anita Setyaningsih, A.Md.</option>
          <option value="Petrania Putri, S.E.">Petrania Putri, S.E.</option>
          ';
        }
        echo'
    </select>
    </td>

      </tbody>
      </table>
      <br>';
        ?>

        <h5>Input Nilai Rapor Semester 2</h5><hr>
    <?php
    echo'
    <table class="table table-bordered" width="100%" border="1">
    <tbody>

<tr style="background-color:#ffbbb8;">
<td align="center"><b>No</b></td>
<td align="center"><b>Mata Pelajaran</b></td>
    <td width="20%" align="center"><b>Nilai Akhir</b></td>
    <td align="center"><b>Keterangan</b></td>
  </tr>
  
  <tr>
<td  align="center">1.</td>
<td >&nbsp Pendidikan Agama dan Budi Pekerti</td>
    <td align="center"><input type="number" min="0" max="100" class="form-control" name="agama_smt2" id="agama_smt2" value='.$data['agama_smt2'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="agama_smt2_tercapai" id="agama_smt2_tercapai">'.$data['agama_smt2_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="agama_smt2_tidak_tercapai" id="agama_smt2_tidak_tercapai">'.$data['agama_smt2_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">2.</td>
<td >&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="pkn_smt2" id="pkn_smt2" value='.$data['pkn_smt2'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="pkn_smt2_tercapai" id="pkn_smt2_tercapai">'.$data['pkn_smt2_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="pkn_smt2_tidak_tercapai" id="pkn_smt2_tidak_tercapai">'.$data['pkn_smt2_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">3. </td>
<td >&nbsp Bahasa Indonesia</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="indo_smt2" id="indo_smt2" value='.$data['indo_smt2'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="indo_smt2_tercapai" id="indo_smt2_tercapai">'.$data['indo_smt2_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="indo_smt2_tidak_tercapai" id="indo_smt2_tidak_tercapai">'.$data['indo_smt2_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">4. </td>
<td >&nbsp Matematika</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="mtk_smt2" id="mtk_smt2" value='.$data['mtk_smt2'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="mtk_smt2_tercapai" id="mtk_smt2_tercapai">'.$data['mtk_smt2_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="mtk_smt2_tidak_tercapai" id="mtk_smt2_tidak_tercapai">'.$data['mtk_smt2_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">5. </td>
<td >&nbsp Ilmu Pengetahuan Alam</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="ipa_smt2" id="ipa_smt2" value='.$data['ipa_smt2'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="ipa_smt2_tercapai" id="ipa_smt2_tercapai">'.$data['ipa_smt2_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="ipa_smt2_tidak_tercapai" id="ipa_smt2_tidak_tercapai">'.$data['ipa_smt2_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">6. </td>
<td >&nbsp Ilmu Pengetahuan Sosial</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="ips_smt2" id="ips_smt2" value='.$data['ips_smt2'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="ips_smt2_tercapai" id="ips_smt2_tercapai">'.$data['ips_smt2_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="ips_smt2_tidak_tercapai" id="ips_smt2_tidak_tercapai">'.$data['ips_smt2_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">7. </td>
<td >&nbsp Bahasa Inggris</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="inggris_smt2" id="inggris_smt2" value='.$data['inggris_smt2'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="inggris_smt2_tercapai" id="inggris_smt2_tercapai">'.$data['inggris_smt2_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="inggris_smt2_tidak_tercapai" id="inggris_smt2_tidak_tercapai">'.$data['inggris_smt2_tidak_tercapai'].'</textarea>
    </td>
  </tr>

<tr>
  <td  align="center">8.</td>
<td >&nbsp Seni</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="seni_smt2" id="seni_smt2" value='.$data['seni_smt2'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="seni_smt2_tercapai" id="seni_smt2_tercapai">'.$data['seni_smt2_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="seni_smt2_tidak_tercapai" id="seni_smt2_tidak_tercapai">'.$data['seni_smt2_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">9.</td>
<td >&nbsp Pendidikan Jasmani, Olahraga & Kesehatan</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="pjok_smt2" id="pjok_smt2" value='.$data['pjok_smt2'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="pjok_smt2_tercapai" id="pjok_smt2_tercapai">'.$data['pjok_smt2_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="pjok_smt2_tidak_tercapai" id="pjok_smt2_tidak_tercapai">'.$data['pjok_smt2_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">10.</td>
<td >&nbsp Informatika</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="informatika_smt2" id="informatika_smt2" value='.$data['informatika_smt2'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="informatika_smt2_tercapai" id="informatika_smt2_tercapai">'.$data['informatika_smt2_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="informatika_smt2_tidak_tercapai" id="informatika_smt2_tidak_tercapai">'.$data['informatika_smt2_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">11.</td>
<td >&nbsp Bahasa Jawa</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="jawa_smt2" id="jawa_smt2" value='.$data['jawa_smt2'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="jawa_smt2_tercapai" id="jawa_smt2_tercapai">'.$data['jawa_smt2_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="jawa_smt2_tidak_tercapai" id="jawa_smt2_tidak_tercapai">'.$data['jawa_smt2_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">12.</td>
<td >&nbsp Kesenian Daerah</td>
    <td align="center"><input type="number" min="0" max="100" class="form-control" name="kesda_smt2" id="kesda_smt2" value='.$data['kesda_smt2'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="kesda_smt2_tercapai" id="kesda_smt2_tercapai">'.$data['kesda_smt2_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="kesda_smt2_tidak_tercapai" id="kesda_smt2_tidak_tercapai">'.$data['kesda_smt2_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  </table>

  <br>
  <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Ekstrakurikuler</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>English Conversation</td>
        <td> 
          <select class="form-select" id="english_smt2" name="english_smt2" aria-label="Default select example">
              <option selected value="'.$ekskul['english_smt2'].'">'.$ekskul['english_smt2'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
          </td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Pathfinder</td>
        <td>
          <select class="form-select" id="pathfinder_smt2" name="pathfinder_smt2" aria-label="Default select example">
              <option selected value="'.$ekskul['pathfinder_smt2'].'">'.$ekskul['pathfinder_smt2'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>

      <tr>
        <td align="center">3.</td>
        <td>Karawitan</td>
        <td>
          <select class="form-select" id="karawitan_smt2" name="karawitan_smt2" aria-label="Default select example">
              <option selected value="'.$ekskul['karawitan_smt2'].'">'.$ekskul['karawitan_smt2'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>
      </tbody>
      </table>

      <br>
  <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Pengembangan Diri</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>Bimbingan & Konseling</td>
        <td> 
          <select class="form-select" id="bk_smt2" name="bk_smt2" aria-label="Default select example">
              <option selected value="'.$pengembangan['bk_smt2'].'">'.$pengembangan['bk_smt2'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
          </td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Follow The Bible</td>
        <td>
          <select class="form-select" id="bible_smt2" name="bible_smt2" aria-label="Default select example">
              <option selected value="'.$pengembangan['bible_smt2'].'">'.$pengembangan['bible_smt2'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
        </tbody>
 </table> 

        <br>
        <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td colspan="3">Kenaikan Kelas</td>
      </tr>
      
      <tr>
        <td colspan="2" align="center">Status Kenaikan</td>
        <td colspan="2">
        <select class="form-select" id="kenaikan_smt2" name="kenaikan_smt2" aria-label="Default select example">';
        if($siswa['kenaikan_smt2'] == 'Naik Ke Kelas VIII'){
        echo'
              <option value="'.$siswa['kenaikan_smt2'].'">'.$siswa['kenaikan_smt2'].'</option>
              <option value="Tidak Naik Kelas">Tidak Naik Kelas</option> ';
        } else if($siswa['kenaikan_smt2'] == 'Tidak Naik Kelas'){
          echo'
              <option value="'.$siswa['kenaikan_smt2'].'">'.$siswa['kenaikan_smt2'].'</option>
              <option value="Naik Ke Kelas VIII">Naik Kelas</option>';
              } else {
                echo '
                <option disabled selected value="">Input Kenaikan Kelas</option>
                <option value="Naik Ke Kelas VIII">Naik Kelas</option>
                <option value="Tidak Naik Kelas">Tidak Naik Kelas</option>';
              }
              
              echo'
              </select>
    </td>

  <tr>
  <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
<td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
    <td style="border-right:hidden; border-bottom:hidden;" align="center"></td>
    </tr>
    
    <tr align="center">
        <td width="12%" style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
        <td style="border-right:hidden; border-bottom:hidden;"></td>
        <td style="border-right:hidden; border-bottom:hidden;" width="20%"><button type="submit" name="submit" class="btn btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Nilai</button></td>
      </tr>

  </tbody>
  </table>';

    ?>
    </form>
      </div>
        </div>
    </div>
    
    <!-- Tab Semester 3 -->
    <div class="tab-pane fade" id="navs-justified-tiga" role="tabpanel">
    
    <div class="row">
        <div class="col">
       <h5>Pilih Wali Kelas Semester 3</h5><hr>
        <form action="upload/upload_smt3.php" class="form-horizontal" method="post">
        <?php 
        echo '
       <input type="hidden" name="id_siswa" value='.$data['id_siswa'].'>
        <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">Semester</td>
        <td>Nama Wali Kelas</td>
      </tr>
      
      <tr>
        <td align="center">Semester 3</td>
        <td>
        <select class="form-select" id="wali_smt3" name="wali_smt3" aria-label="Default select example">';
        if($siswa['wali_smt3'] == NULL){
        echo'
        <option disabled selected>Pilih Wali Kelas Murid</option>
          <option value="Martha Santi Nugraheni, S.Pd.">Martha Santi Nugraheni, S.Pd.</option>
          <option value="Wilmer F Lumbangaol, S.Fil.">Wilmer F Lumbangaol, S.Fil.</option>
          <option value="Yuriska Christina Arnita Sandy, S.Mat.">Yuriska Christina Arnita Sandy, S.Mat.</option>
          <option value="Niken Agustiningrum, S.Pd.">Niken Agustiningrum, S.Pd.</option>
          <option value="Daniel Adipawoko, S.Kom.">Daniel Adipawoko, S.Kom.</option>
          <option value="Yeni Rustanti, S.Pd.">Yeni Rustanti, S.Pd.</option>
          <option value="Dwi Prasetyo, S.Sn.">Dwi Prasetyo, S.Sn.</option>
          <option value="Nanda Fauzi Amrullah, S.Pd.">Nanda Fauzi Amrullah, S.Pd.</option>
          <option value="Elvy S. J. Nasution, S.I.Kom.">Elvy S. J. Nasution, S.I.Kom.</option>
          <option value="Monika Fitri Setyowati, S.S.">Monika Fitri Setyowati, S.S.</option>
          <option value="Pdt. Deddy Panjaitan">Pdt. Deddy Panjaitan</option>
          <option value="Anton Anita Setyaningsih, A.Md.">Anton Anita Setyaningsih, A.Md.</option>
          <option value="Petrania Putri, S.E.">Petrania Putri, S.E.</option>
          ';
        } else {
          echo '
        <option selected value="'.$siswa['wali_smt3'].'">'.$siswa['wali_smt3'].'</option>
          <option value="Martha Santi Nugraheni, S.Pd.">Martha Santi Nugraheni, S.Pd.</option>
          <option value="Wilmer F Lumbangaol, S.Fil.">Wilmer F Lumbangaol, S.Fil.</option>
          <option value="Yuriska Christina Arnita Sandy, S.Mat.">Yuriska Christina Arnita Sandy, S.Mat.</option>
          <option value="Niken Agustiningrum, S.Pd.">Niken Agustiningrum, S.Pd.</option>
          <option value="Daniel Adipawoko, S.Kom.">Daniel Adipawoko, S.Kom.</option>
          <option value="Yeni Rustanti, S.Pd.">Yeni Rustanti, S.Pd.</option>
          <option value="Dwi Prasetyo, S.Sn.">Dwi Prasetyo, S.Sn.</option>
          <option value="Nanda Fauzi Amrullah, S.Pd.">Nanda Fauzi Amrullah, S.Pd.</option>
          <option value="Elvy S. J. Nasution, S.I.Kom.">Elvy S. J. Nasution, S.I.Kom.</option>
          <option value="Monika Fitri Setyowati, S.S.">Monika Fitri Setyowati, S.S.</option>
          <option value="Pdt. Deddy Panjaitan">Pdt. Deddy Panjaitan</option>
          <option value="Anton Anita Setyaningsih, A.Md.">Anton Anita Setyaningsih, A.Md.</option>
          <option value="Petrania Putri, S.E.">Petrania Putri, S.E.</option>
          ';
        }
        echo'
    </select>
    </td>

      </tbody>
      </table>
      <br>';
        ?>

      <h5>Input Nilai Semester 3</h5><hr>
    <?php
    echo'
    <table class="table table-bordered" width="100%" border="1">
    <tbody>

<tr style="background-color:#ffbbb8;">
<td align="center"><b>No</b></td>
<td align="center"><b>Mata Pelajaran</b></td>
    <td width="20%" align="center"><b>Nilai Akhir</b></td>
    <td align="center"><b>Keterangan</b></td>
  </tr>
  
  <tr>
<td  align="center">1.</td>
<td >&nbsp Pendidikan Agama dan Budi Pekerti</td>
    <td align="center"><input type="number" min="0" max="100" class="form-control" name="agama_smt3" id="agama_smt3" value='.$data['agama_smt3'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="agama_smt3_tercapai" id="agama_smt3_tercapai">'.$data['agama_smt3_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="agama_smt3_tidak_tercapai" id="agama_smt3_tidak_tercapai">'.$data['agama_smt3_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">2.</td>
<td >&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="pkn_smt3" id="pkn_smt3" value='.$data['pkn_smt3'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="pkn_smt3_tercapai" id="pkn_smt3_tercapai">'.$data['pkn_smt3_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="pkn_smt3_tidak_tercapai" id="pkn_smt3_tidak_tercapai">'.$data['pkn_smt3_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">3. </td>
<td >&nbsp Bahasa Indonesia</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="indo_smt3" id="indo_smt3" value='.$data['indo_smt3'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="indo_smt3_tercapai" id="indo_smt3_tercapai">'.$data['indo_smt3_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="indo_smt3_tidak_tercapai" id="indo_smt3_tidak_tercapai">'.$data['indo_smt3_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">4. </td>
<td >&nbsp Matematika</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="mtk_smt3" id="mtk_smt3" value='.$data['mtk_smt3'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="mtk_smt3_tercapai" id="mtk_smt3_tercapai">'.$data['mtk_smt3_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="mtk_smt3_tidak_tercapai" id="mtk_smt3_tidak_tercapai">'.$data['mtk_smt3_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">5. </td>
<td >&nbsp Ilmu Pengetahuan Alam</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="ipa_smt3" id="ipa_smt3" value='.$data['ipa_smt3'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="ipa_smt3_tercapai" id="ipa_smt3_tercapai">'.$data['ipa_smt3_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="ipa_smt3_tidak_tercapai" id="ipa_smt3_tidak_tercapai">'.$data['ipa_smt3_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">6. </td>
<td >&nbsp Ilmu Pengetahuan Sosial</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="ips_smt3" id="ips_smt3" value='.$data['ips_smt3'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="ips_smt3_tercapai" id="ips_smt3_tercapai">'.$data['ips_smt3_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="ips_smt3_tidak_tercapai" id="ips_smt3_tidak_tercapai">'.$data['ips_smt3_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">7. </td>
<td >&nbsp Bahasa Inggris</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="inggris_smt3" id="inggris_smt3" value='.$data['inggris_smt3'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="inggris_smt3_tercapai" id="inggris_smt3_tercapai">'.$data['inggris_smt3_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="inggris_smt3_tidak_tercapai" id="inggris_smt3_tidak_tercapai">'.$data['inggris_smt3_tidak_tercapai'].'</textarea>
    </td>
  </tr>

<tr>
  <td  align="center">8.</td>
<td >&nbsp Seni</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="seni_smt3" id="seni_smt3" value='.$data['seni_smt3'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="seni_smt3_tercapai" id="seni_smt3_tercapai">'.$data['seni_smt3_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="seni_smt3_tidak_tercapai" id="seni_smt3_tidak_tercapai">'.$data['seni_smt3_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">9.</td>
<td >&nbsp Pendidikan Jasmani, Olahraga & Kesehatan</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="pjok_smt3" id="pjok_smt3" value='.$data['pjok_smt3'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="pjok_smt3_tercapai" id="pjok_smt3_tercapai">'.$data['pjok_smt3_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="pjok_smt3_tidak_tercapai" id="pjok_smt3_tidak_tercapai">'.$data['pjok_smt3_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">10.</td>
<td >&nbsp Informatika</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="informatika_smt3" id="informatika_smt3" value='.$data['informatika_smt3'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="informatika_smt3_tercapai" id="informatika_smt3_tercapai">'.$data['informatika_smt3_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="informatika_smt3_tidak_tercapai" id="informatika_smt3_tidak_tercapai">'.$data['informatika_smt3_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">11.</td>
<td >&nbsp Bahasa Jawa</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="jawa_smt3" id="jawa_smt3" value='.$data['jawa_smt3'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="jawa_smt3_tercapai" id="jawa_smt3_tercapai">'.$data['jawa_smt3_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="jawa_smt3_tidak_tercapai" id="jawa_smt3_tidak_tercapai">'.$data['jawa_smt3_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">12.</td>
<td >&nbsp Kesenian Daerah</td>
    <td align="center"><input type="number" min="0" max="100" class="form-control" name="kesda_smt3" id="kesda_smt3" value='.$data['kesda_smt3'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="kesda_smt3_tercapai" id="kesda_smt3_tercapai">'.$data['kesda_smt3_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="kesda_smt3_tidak_tercapai" id="kesda_smt3_tidak_tercapai">'.$data['kesda_smt3_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  </table>

  <br>
  <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Ekstrakurikuler</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>English Conversation</td>
        <td> 
          <select class="form-select" id="english_smt3" name="english_smt3" aria-label="Default select example">
              <option selected value="'.$ekskul['english_smt3'].'">'.$ekskul['english_smt3'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
          </td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Pathfinder</td>
        <td>
          <select class="form-select" id="pathfinder_smt3" name="pathfinder_smt3" aria-label="Default select example">
              <option selected value="'.$ekskul['pathfinder_smt3'].'">'.$ekskul['pathfinder_smt3'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>

      <tr>
        <td align="center">3.</td>
        <td>Karawitan</td>
        <td>
          <select class="form-select" id="karawitan_smt3" name="karawitan_smt3" aria-label="Default select example">
              <option selected value="'.$ekskul['karawitan_smt3'].'">'.$ekskul['karawitan_smt3'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>
      </tbody>
      </table>

      <br>
  <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Pengembangan Diri</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>Bimbingan & Konseling</td>
        <td> 
          <select class="form-select" id="bk_smt3" name="bk_smt3" aria-label="Default select example">
              <option selected value="'.$pengembangan['bk_smt3'].'">'.$pengembangan['bk_smt3'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
          </td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Follow The Bible</td>
        <td>
          <select class="form-select" id="bible_smt3" name="bible_smt3" aria-label="Default select example">
              <option selected value="'.$pengembangan['bible_smt3'].'">'.$pengembangan['bible_smt3'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>

  <tr>
  <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
<td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
    <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Nilai</button></td>
  </tr>

  </tbody>
  </table>';

    ?>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 4 -->
    <div class="tab-pane fade" id="navs-justified-empat" role="tabpanel">
    
    <div class="row">
        <div class="col">
       <h5>Pilih Wali Kelas Semester 4</h5><hr>
        <form action="upload/upload_smt4.php" class="form-horizontal" method="post">
        <?php 
        echo '
       <input type="hidden" name="id_siswa" value='.$data['id_siswa'].'>
        <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">Semester</td>
        <td>Nama Wali Kelas</td>
      </tr>
      
      <tr>
        <td align="center">Semester 4</td>
        <td>
        <select class="form-select" id="wali_smt4" name="wali_smt4" aria-label="Default select example">';
        if($siswa['wali_smt4'] == NULL){
        echo'
        <option disabled selected>Pilih Wali Kelas Murid</option>
          <option value="Martha Santi Nugraheni, S.Pd.">Martha Santi Nugraheni, S.Pd.</option>
          <option value="Wilmer F Lumbangaol, S.Fil.">Wilmer F Lumbangaol, S.Fil.</option>
          <option value="Yuriska Christina Arnita Sandy, S.Mat.">Yuriska Christina Arnita Sandy, S.Mat.</option>
          <option value="Niken Agustiningrum, S.Pd.">Niken Agustiningrum, S.Pd.</option>
          <option value="Daniel Adipawoko, S.Kom.">Daniel Adipawoko, S.Kom.</option>
          <option value="Yeni Rustanti, S.Pd.">Yeni Rustanti, S.Pd.</option>
          <option value="Dwi Prasetyo, S.Sn.">Dwi Prasetyo, S.Sn.</option>
          <option value="Nanda Fauzi Amrullah, S.Pd.">Nanda Fauzi Amrullah, S.Pd.</option>
          <option value="Elvy S. J. Nasution, S.I.Kom.">Elvy S. J. Nasution, S.I.Kom.</option>
          <option value="Monika Fitri Setyowati, S.S.">Monika Fitri Setyowati, S.S.</option>
          <option value="Pdt. Deddy Panjaitan">Pdt. Deddy Panjaitan</option>
          <option value="Anton Anita Setyaningsih, A.Md.">Anton Anita Setyaningsih, A.Md.</option>
          <option value="Petrania Putri, S.E.">Petrania Putri, S.E.</option>
          ';
        } else {
          echo '
        <option selected value="'.$siswa['wali_smt4'].'">'.$siswa['wali_smt4'].'</option>
          <option value="Martha Santi Nugraheni, S.Pd.">Martha Santi Nugraheni, S.Pd.</option>
          <option value="Wilmer F Lumbangaol, S.Fil.">Wilmer F Lumbangaol, S.Fil.</option>
          <option value="Yuriska Christina Arnita Sandy, S.Mat.">Yuriska Christina Arnita Sandy, S.Mat.</option>
          <option value="Niken Agustiningrum, S.Pd.">Niken Agustiningrum, S.Pd.</option>
          <option value="Daniel Adipawoko, S.Kom.">Daniel Adipawoko, S.Kom.</option>
          <option value="Yeni Rustanti, S.Pd.">Yeni Rustanti, S.Pd.</option>
          <option value="Dwi Prasetyo, S.Sn.">Dwi Prasetyo, S.Sn.</option>
          <option value="Nanda Fauzi Amrullah, S.Pd.">Nanda Fauzi Amrullah, S.Pd.</option>
          <option value="Elvy S. J. Nasution, S.I.Kom.">Elvy S. J. Nasution, S.I.Kom.</option>
          <option value="Monika Fitri Setyowati, S.S.">Monika Fitri Setyowati, S.S.</option>
          <option value="Pdt. Deddy Panjaitan">Pdt. Deddy Panjaitan</option>
          <option value="Anton Anita Setyaningsih, A.Md.">Anton Anita Setyaningsih, A.Md.</option>
          <option value="Petrania Putri, S.E.">Petrania Putri, S.E.</option>
          ';
        }
        echo'
    </select>
    </td>

      </tbody>
      </table>
      <br>';
        ?>

      <h5>Input Nilai Semester 4</h5><hr>
    <?php
    echo'
    <table class="table table-bordered" width="100%" border="1">
    <tbody>

<tr style="background-color:#ffbbb8;">
<td align="center"><b>No</b></td>
<td align="center"><b>Mata Pelajaran</b></td>
    <td width="20%" align="center"><b>Nilai Akhir</b></td>
    <td align="center"><b>Keterangan</b></td>
  </tr>
  
  <tr>
<td  align="center">1.</td>
<td >&nbsp Pendidikan Agama dan Budi Pekerti</td>
    <td align="center"><input type="number" min="0" max="100" class="form-control" name="agama_smt4" id="agama_smt4" value='.$data['agama_smt4'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="agama_smt4_tercapai" id="agama_smt4_tercapai">'.$data['agama_smt4_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="agama_smt4_tidak_tercapai" id="agama_smt4_tidak_tercapai">'.$data['agama_smt4_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">2.</td>
<td >&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="pkn_smt4" id="pkn_smt4" value='.$data['pkn_smt4'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="pkn_smt4_tercapai" id="pkn_smt4_tercapai">'.$data['pkn_smt4_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="pkn_smt4_tidak_tercapai" id="pkn_smt4_tidak_tercapai">'.$data['pkn_smt4_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">3. </td>
<td >&nbsp Bahasa Indonesia</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="indo_smt4" id="indo_smt4" value='.$data['indo_smt4'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="indo_smt4_tercapai" id="indo_smt4_tercapai">'.$data['indo_smt4_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="indo_smt4_tidak_tercapai" id="indo_smt4_tidak_tercapai">'.$data['indo_smt4_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">4. </td>
<td >&nbsp Matematika</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="mtk_smt4" id="mtk_smt4" value='.$data['mtk_smt4'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="mtk_smt4_tercapai" id="mtk_smt4_tercapai">'.$data['mtk_smt4_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="mtk_smt4_tidak_tercapai" id="mtk_smt4_tidak_tercapai">'.$data['mtk_smt4_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">5. </td>
<td >&nbsp Ilmu Pengetahuan Alam</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="ipa_smt4" id="ipa_smt4" value='.$data['ipa_smt4'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="ipa_smt4_tercapai" id="ipa_smt4_tercapai">'.$data['ipa_smt4_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="ipa_smt4_tidak_tercapai" id="ipa_smt4_tidak_tercapai">'.$data['ipa_smt4_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">6. </td>
<td >&nbsp Ilmu Pengetahuan Sosial</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="ips_smt4" id="ips_smt4" value='.$data['ips_smt4'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="ips_smt4_tercapai" id="ips_smt4_tercapai">'.$data['ips_smt4_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="ips_smt4_tidak_tercapai" id="ips_smt4_tidak_tercapai">'.$data['ips_smt4_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">7. </td>
<td >&nbsp Bahasa Inggris</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="inggris_smt4" id="inggris_smt4" value='.$data['inggris_smt4'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="inggris_smt4_tercapai" id="inggris_smt4_tercapai">'.$data['inggris_smt4_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="inggris_smt4_tidak_tercapai" id="inggris_smt4_tidak_tercapai">'.$data['inggris_smt4_tidak_tercapai'].'</textarea>
    </td>
  </tr>

<tr>
  <td  align="center">8.</td>
<td >&nbsp Seni</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="seni_smt4" id="seni_smt4" value='.$data['seni_smt4'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="seni_smt4_tercapai" id="seni_smt4_tercapai">'.$data['seni_smt4_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="seni_smt4_tidak_tercapai" id="seni_smt4_tidak_tercapai">'.$data['seni_smt4_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">9.</td>
<td >&nbsp Pendidikan Jasmani, Olahraga & Kesehatan</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="pjok_smt4" id="pjok_smt4" value='.$data['pjok_smt4'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="pjok_smt4_tercapai" id="pjok_smt4_tercapai">'.$data['pjok_smt4_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="pjok_smt4_tidak_tercapai" id="pjok_smt4_tidak_tercapai">'.$data['pjok_smt4_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">10.</td>
<td >&nbsp Informatika</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="informatika_smt4" id="informatika_smt4" value='.$data['informatika_smt4'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="informatika_smt4_tercapai" id="informatika_smt4_tercapai">'.$data['informatika_smt4_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="informatika_smt4_tidak_tercapai" id="informatika_smt4_tidak_tercapai">'.$data['informatika_smt4_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">11.</td>
<td >&nbsp Bahasa Jawa</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="jawa_smt4" id="jawa_smt4" value='.$data['jawa_smt4'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="jawa_smt4_tercapai" id="jawa_smt4_tercapai">'.$data['jawa_smt4_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="jawa_smt4_tidak_tercapai" id="jawa_smt4_tidak_tercapai">'.$data['jawa_smt4_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">12.</td>
<td >&nbsp Kesenian Daerah</td>
    <td align="center"><input type="number" min="0" max="100" class="form-control" name="kesda_smt4" id="kesda_smt4" value='.$data['kesda_smt4'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="kesda_smt4_tercapai" id="kesda_smt4_tercapai">'.$data['kesda_smt4_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="kesda_smt4_tidak_tercapai" id="kesda_smt4_tidak_tercapai">'.$data['kesda_smt4_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  </table>

  <br>
  <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Ekstrakurikuler</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>English Conversation</td>
        <td> 
          <select class="form-select" id="english_smt4" name="english_smt4" aria-label="Default select example">
              <option selected value="'.$ekskul['english_smt4'].'">'.$ekskul['english_smt4'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
          </td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Pathfinder</td>
        <td>
          <select class="form-select" id="pathfinder_smt4" name="pathfinder_smt4" aria-label="Default select example">
              <option selected value="'.$ekskul['pathfinder_smt4'].'">'.$ekskul['pathfinder_smt4'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>

      <tr>
        <td align="center">3.</td>
        <td>Karawitan</td>
        <td>
          <select class="form-select" id="karawitan_smt4" name="karawitan_smt4" aria-label="Default select example">
              <option selected value="'.$ekskul['karawitan_smt4'].'">'.$ekskul['karawitan_smt4'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>
      </tbody>
      </table>

      <br>
  <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Pengembangan Diri</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>Bimbingan & Konseling</td>
        <td> 
          <select class="form-select" id="bk_smt4" name="bk_smt4" aria-label="Default select example">
              <option selected value="'.$pengembangan['bk_smt4'].'">'.$pengembangan['bk_smt4'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
          </td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Follow The Bible</td>
        <td>
          <select class="form-select" id="bible_smt4" name="bible_smt4" aria-label="Default select example">
              <option selected value="'.$pengembangan['bible_smt4'].'">'.$pengembangan['bible_smt4'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>
       </tbody>
 </table> 

        <br>
        <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td colspan="3">Kenaikan Kelas</td>
      </tr>
      
      <tr>
        <td colspan="2" align="center">Status Kenaikan</td>
        <td colspan="2">
        <select class="form-select" id="kenaikan_smt4" name="kenaikan_smt4" aria-label="Default select example">';
        if($siswa['kenaikan_smt4'] == 'Naik Ke Kelas IX'){
        echo'
              <option value="'.$siswa['kenaikan_smt4'].'">'.$siswa['kenaikan_smt4'].'</option>
              <option value="Tidak Naik Kelas">Tidak Naik Kelas</option> ';
        } else if($siswa['kenaikan_smt4'] == 'Tidak Naik Kelas'){
          echo'
              <option value="'.$siswa['kenaikan_smt4'].'">'.$siswa['kenaikan_smt4'].'</option>
              <option value="Naik Ke Kelas IX">Naik Kelas</option>';
              } else {
                echo '
                <option disabled selected value="">Input Kenaikan Kelas</option>
                <option value="Naik Ke Kelas IX">Naik Kelas</option>
                <option value="Tidak Naik Kelas">Tidak Naik Kelas</option>';
              }
              
              echo'
              </select>
    </td>

  <tr>
  <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
<td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
    <td style="border-right:hidden; border-bottom:hidden;" align="center"></td>
  </tr>

  <tr align="center">
        <td width="12%" style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
        <td style="border-right:hidden; border-bottom:hidden;"></td>
        <td style="border-right:hidden; border-bottom:hidden;" width="20%"><button type="submit" name="submit" class="btn btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Nilai</button></td>
      </tr>

  </tbody>
  </table>';

    ?>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 5 -->
    <div class="tab-pane fade" id="navs-justified-lima" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Pilih Wali Kelas Semester 5</h5><hr>
        <form action="upload/upload_smt5.php" class="form-horizontal" method="post">
        <?php 
        echo '
       <input type="hidden" name="id_siswa" value='.$data['id_siswa'].'>
        <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">Semester</td>
        <td>Nama Wali Kelas</td>
      </tr>
      
      <tr>
        <td align="center">Semester 5</td>
        <td>
        <select class="form-select" id="wali_smt5" name="wali_smt5" aria-label="Default select example">';
        if($siswa['wali_smt5'] == NULL){
        echo'
        <option disabled selected>Pilih Wali Kelas Murid</option>
          <option value="Martha Santi Nugraheni, S.Pd.">Martha Santi Nugraheni, S.Pd.</option>
          <option value="Wilmer F Lumbangaol, S.Fil.">Wilmer F Lumbangaol, S.Fil.</option>
          <option value="Yuriska Christina Arnita Sandy, S.Mat.">Yuriska Christina Arnita Sandy, S.Mat.</option>
          <option value="Niken Agustiningrum, S.Pd.">Niken Agustiningrum, S.Pd.</option>
          <option value="Daniel Adipawoko, S.Kom.">Daniel Adipawoko, S.Kom.</option>
          <option value="Yeni Rustanti, S.Pd.">Yeni Rustanti, S.Pd.</option>
          <option value="Dwi Prasetyo, S.Sn.">Dwi Prasetyo, S.Sn.</option>
          <option value="Nanda Fauzi Amrullah, S.Pd.">Nanda Fauzi Amrullah, S.Pd.</option>
          <option value="Elvy S. J. Nasution, S.I.Kom.">Elvy S. J. Nasution, S.I.Kom.</option>
          <option value="Monika Fitri Setyowati, S.S.">Monika Fitri Setyowati, S.S.</option>
          <option value="Pdt. Deddy Panjaitan">Pdt. Deddy Panjaitan</option>
          <option value="Anton Anita Setyaningsih, A.Md.">Anton Anita Setyaningsih, A.Md.</option>
          <option value="Petrania Putri, S.E.">Petrania Putri, S.E.</option>
          ';
        } else {
          echo '
          <option selected value="'.$siswa['wali_smt5'].'">'.$siswa['wali_smt5'].'</option>
        <option disabled>Pilih Wali Kelas Murid</option>
          <option value="Martha Santi Nugraheni, S.Pd.">Martha Santi Nugraheni, S.Pd.</option>
          <option value="Wilmer F Lumbangaol, S.Fil.">Wilmer F Lumbangaol, S.Fil.</option>
          <option value="Yuriska Christina Arnita Sandy, S.Mat.">Yuriska Christina Arnita Sandy, S.Mat.</option>
          <option value="Niken Agustiningrum, S.Pd.">Niken Agustiningrum, S.Pd.</option>
          <option value="Daniel Adipawoko, S.Kom.">Daniel Adipawoko, S.Kom.</option>
          <option value="Yeni Rustanti, S.Pd.">Yeni Rustanti, S.Pd.</option>
          <option value="Dwi Prasetyo, S.Sn.">Dwi Prasetyo, S.Sn.</option>
          <option value="Nanda Fauzi Amrullah, S.Pd.">Nanda Fauzi Amrullah, S.Pd.</option>
          <option value="Elvy S. J. Nasution, S.I.Kom.">Elvy S. J. Nasution, S.I.Kom.</option>
          <option value="Monika Fitri Setyowati, S.S.">Monika Fitri Setyowati, S.S.</option>
          <option value="Pdt. Deddy Panjaitan">Pdt. Deddy Panjaitan</option>
          <option value="Anton Anita Setyaningsih, A.Md.">Anton Anita Setyaningsih, A.Md.</option>
          <option value="Petrania Putri, S.E.">Petrania Putri, S.E.</option>
          ';
        }
        echo'
    </select>
    </td>

      </tbody>
      </table>
      <br>';
        ?>

      <h5>Input Nilai Semester 5</h5><hr>
    <?php
    echo'
    <table class="table table-bordered" width="100%" border="1">
    <tbody>

<tr style="background-color:#ffbbb8;">
<td align="center"><b>No</b></td>
<td align="center"><b>Mata Pelajaran</b></td>
    <td width="20%" align="center"><b>Nilai Akhir</b></td>
    <td align="center"><b>Keterangan</b></td>
  </tr>
  
  <tr>
<td  align="center">1.</td>
<td >&nbsp Pendidikan Agama dan Budi Pekerti</td>
    <td align="center"><input type="number" min="0" max="100" class="form-control" name="agama_smt5" id="agama_smt5" value='.$data['agama_smt5'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="agama_smt5_tercapai" id="agama_smt5_tercapai">'.$data['agama_smt5_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="agama_smt5_tidak_tercapai" id="agama_smt5_tidak_tercapai">'.$data['agama_smt5_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">2.</td>
<td >&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="pkn_smt5" id="pkn_smt5" value='.$data['pkn_smt5'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="pkn_smt5_tercapai" id="pkn_smt5_tercapai">'.$data['pkn_smt5_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="pkn_smt5_tidak_tercapai" id="pkn_smt5_tidak_tercapai">'.$data['pkn_smt5_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">3. </td>
<td >&nbsp Bahasa Indonesia</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="indo_smt5" id="indo_smt5" value='.$data['indo_smt5'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="indo_smt5_tercapai" id="indo_smt5_tercapai">'.$data['indo_smt5_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="indo_smt5_tidak_tercapai" id="indo_smt5_tidak_tercapai">'.$data['indo_smt5_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">4. </td>
<td >&nbsp Matematika</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="mtk_smt5" id="mtk_smt5" value='.$data['mtk_smt5'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="mtk_smt5_tercapai" id="mtk_smt5_tercapai">'.$data['mtk_smt5_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="mtk_smt5_tidak_tercapai" id="mtk_smt5_tidak_tercapai">'.$data['mtk_smt5_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">5. </td>
<td >&nbsp Ilmu Pengetahuan Alam</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="ipa_smt5" id="ipa_smt5" value='.$data['ipa_smt5'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="ipa_smt5_tercapai" id="ipa_smt5_tercapai">'.$data['ipa_smt5_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="ipa_smt5_tidak_tercapai" id="ipa_smt5_tidak_tercapai">'.$data['ipa_smt5_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">6. </td>
<td >&nbsp Ilmu Pengetahuan Sosial</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="ips_smt5" id="ips_smt5" value='.$data['ips_smt5'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="ips_smt5_tercapai" id="ips_smt5_tercapai">'.$data['ips_smt5_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="ips_smt5_tidak_tercapai" id="ips_smt5_tidak_tercapai">'.$data['ips_smt5_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">7. </td>
<td >&nbsp Bahasa Inggris</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="inggris_smt5" id="inggris_smt5" value='.$data['inggris_smt5'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="inggris_smt5_tercapai" id="inggris_smt5_tercapai">'.$data['inggris_smt5_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="inggris_smt5_tidak_tercapai" id="inggris_smt5_tidak_tercapai">'.$data['inggris_smt5_tidak_tercapai'].'</textarea>
    </td>
  </tr>

<tr>
  <td  align="center">8.</td>
<td >&nbsp Seni</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="seni_smt5" id="seni_smt5" value='.$data['seni_smt5'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="seni_smt5_tercapai" id="seni_smt5_tercapai">'.$data['seni_smt5_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="seni_smt5_tidak_tercapai" id="seni_smt5_tidak_tercapai">'.$data['seni_smt5_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">9.</td>
<td >&nbsp Pendidikan Jasmani, Olahraga & Kesehatan</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="pjok_smt5" id="pjok_smt5" value='.$data['pjok_smt5'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="pjok_smt5_tercapai" id="pjok_smt5_tercapai">'.$data['pjok_smt5_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="pjok_smt5_tidak_tercapai" id="pjok_smt5_tidak_tercapai">'.$data['pjok_smt5_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">10.</td>
<td >&nbsp Informatika</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="informatika_smt5" id="informatika_smt5" value='.$data['informatika_smt5'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="informatika_smt5_tercapai" id="informatika_smt5_tercapai">'.$data['informatika_smt5_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="informatika_smt5_tidak_tercapai" id="informatika_smt5_tidak_tercapai">'.$data['informatika_smt5_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">11.</td>
<td >&nbsp Bahasa Jawa</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="jawa_smt5" id="jawa_smt5" value='.$data['jawa_smt5'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="jawa_smt5_tercapai" id="jawa_smt5_tercapai">'.$data['jawa_smt5_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="jawa_smt5_tidak_tercapai" id="jawa_smt5_tidak_tercapai">'.$data['jawa_smt5_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">12.</td>
<td >&nbsp Kesenian Daerah</td>
    <td align="center"><input type="number" min="0" max="100" class="form-control" name="kesda_smt5" id="kesda_smt5" value='.$data['kesda_smt5'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="kesda_smt5_tercapai" id="kesda_smt5_tercapai">'.$data['kesda_smt5_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="kesda_smt5_tidak_tercapai" id="kesda_smt5_tidak_tercapai">'.$data['kesda_smt5_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  </table>

  <br>
  <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Ekstrakurikuler</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>English Conversation</td>
        <td> 
          <select class="form-select" id="english_smt5" name="english_smt5" aria-label="Default select example">
              <option selected value="'.$ekskul['english_smt5'].'">'.$ekskul['english_smt5'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
          </td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Pathfinder</td>
        <td>
          <select class="form-select" id="pathfinder_smt5" name="pathfinder_smt5" aria-label="Default select example">
              <option selected value="'.$ekskul['pathfinder_smt5'].'">'.$ekskul['pathfinder_smt5'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>

      <tr>
        <td align="center">3.</td>
        <td>Karawitan</td>
        <td>
          <select class="form-select" id="karawitan_smt5" name="karawitan_smt5" aria-label="Default select example">
              <option selected value="'.$ekskul['karawitan_smt5'].'">'.$ekskul['karawitan_smt5'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>
      </tbody>
      </table>

      <br>
  <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Pengembangan Diri</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>Bimbingan & Konseling</td>
        <td> 
          <select class="form-select" id="bk_smt5" name="bk_smt5" aria-label="Default select example">
              <option selected value="'.$pengembangan['bk_smt5'].'">'.$pengembangan['bk_smt5'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
          </td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Follow The Bible</td>
        <td>
          <select class="form-select" id="bible_smt5" name="bible_smt5" aria-label="Default select example">
              <option selected value="'.$pengembangan['bible_smt5'].'">'.$pengembangan['bible_smt5'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>

  <tr>
  <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
<td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
    <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Nilai</button></td>
  </tr>

  </tbody>
  </table>';

    ?>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 6 -->
    <div class="tab-pane fade" id="navs-justified-enam" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Pilih Wali Kelas Semester 6</h5><hr>
        <form action="upload/upload_smt6.php" class="form-horizontal" method="post">
        <?php 
        echo '
       <input type="hidden" name="id_siswa" value='.$data['id_siswa'].'>
        <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">Semester</td>
        <td>Nama Wali Kelas</td>
      </tr>
      
      <tr>
        <td align="center">Semester 6</td>
        <td>
        <select class="form-select" id="wali_smt6" name="wali_smt6" aria-label="Default select example">';
        if($siswa['wali_smt6'] == NULL){
        echo'
        <option disabled selected>Pilih Wali Kelas Murid</option>
          <option value="Martha Santi Nugraheni, S.Pd.">Martha Santi Nugraheni, S.Pd.</option>
          <option value="Wilmer F Lumbangaol, S.Fil.">Wilmer F Lumbangaol, S.Fil.</option>
          <option value="Yuriska Christina Arnita Sandy, S.Mat.">Yuriska Christina Arnita Sandy, S.Mat.</option>
          <option value="Niken Agustiningrum, S.Pd.">Niken Agustiningrum, S.Pd.</option>
          <option value="Daniel Adipawoko, S.Kom.">Daniel Adipawoko, S.Kom.</option>
          <option value="Yeni Rustanti, S.Pd.">Yeni Rustanti, S.Pd.</option>
          <option value="Dwi Prasetyo, S.Sn.">Dwi Prasetyo, S.Sn.</option>
          <option value="Nanda Fauzi Amrullah, S.Pd.">Nanda Fauzi Amrullah, S.Pd.</option>
          <option value="Elvy S. J. Nasution, S.I.Kom.">Elvy S. J. Nasution, S.I.Kom.</option>
          <option value="Monika Fitri Setyowati, S.S.">Monika Fitri Setyowati, S.S.</option>
          <option value="Pdt. Deddy Panjaitan">Pdt. Deddy Panjaitan</option>
          <option value="Anton Anita Setyaningsih, A.Md.">Anton Anita Setyaningsih, A.Md.</option>
          <option value="Petrania Putri, S.E.">Petrania Putri, S.E.</option>
          ';
        } else {
          echo '
          <option selected value="'.$siswa['wali_smt6'].'">'.$siswa['wali_smt6'].'</option>
        <option disabled>Pilih Wali Kelas Murid</option>
          <option value="Martha Santi Nugraheni, S.Pd.">Martha Santi Nugraheni, S.Pd.</option>
          <option value="Wilmer F Lumbangaol, S.Fil.">Wilmer F Lumbangaol, S.Fil.</option>
          <option value="Yuriska Christina Arnita Sandy, S.Mat.">Yuriska Christina Arnita Sandy, S.Mat.</option>
          <option value="Niken Agustiningrum, S.Pd.">Niken Agustiningrum, S.Pd.</option>
          <option value="Daniel Adipawoko, S.Kom.">Daniel Adipawoko, S.Kom.</option>
          <option value="Yeni Rustanti, S.Pd.">Yeni Rustanti, S.Pd.</option>
          <option value="Dwi Prasetyo, S.Sn.">Dwi Prasetyo, S.Sn.</option>
          <option value="Nanda Fauzi Amrullah, S.Pd.">Nanda Fauzi Amrullah, S.Pd.</option>
          <option value="Elvy S. J. Nasution, S.I.Kom.">Elvy S. J. Nasution, S.I.Kom.</option>
          <option value="Monika Fitri Setyowati, S.S.">Monika Fitri Setyowati, S.S.</option>
          <option value="Pdt. Deddy Panjaitan">Pdt. Deddy Panjaitan</option>
          <option value="Anton Anita Setyaningsih, A.Md.">Anton Anita Setyaningsih, A.Md.</option>
          <option value="Petrania Putri, S.E.">Petrania Putri, S.E.</option>
          ';
        }
        echo'
    </select>
    </td>

      </tbody>
      </table>
      <br>';
        ?>

        <h5>Input Nilai Rapor Semester 6</h5><hr>
    <?php
    echo'
    <table class="table table-bordered" width="100%" border="1">
    <tbody>

<tr style="background-color:#ffbbb8;">
<td align="center"><b>No</b></td>
<td align="center"><b>Mata Pelajaran</b></td>
    <td width="20%" align="center"><b>Nilai Akhir</b></td>
    <td align="center"><b>Keterangan</b></td>
  </tr>
  
  <tr>
<td  align="center">1.</td>
<td >&nbsp Pendidikan Agama dan Budi Pekerti</td>
    <td align="center"><input type="number" min="0" max="100" class="form-control" name="agama_smt6" id="agama_smt6" value='.$data['agama_smt6'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="agama_smt6_tercapai" id="agama_smt6_tercapai">'.$data['agama_smt6_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="agama_smt6_tidak_tercapai" id="agama_smt6_tidak_tercapai">'.$data['agama_smt6_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">2.</td>
<td >&nbsp Pendidikan Pancasila dan Kewarganegaraan</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="pkn_smt6" id="pkn_smt6" value='.$data['pkn_smt6'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="pkn_smt6_tercapai" id="pkn_smt6_tercapai">'.$data['pkn_smt6_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="pkn_smt6_tidak_tercapai" id="pkn_smt6_tidak_tercapai">'.$data['pkn_smt6_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">3. </td>
<td >&nbsp Bahasa Indonesia</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="indo_smt6" id="indo_smt6" value='.$data['indo_smt6'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="indo_smt6_tercapai" id="indo_smt6_tercapai">'.$data['indo_smt6_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="indo_smt6_tidak_tercapai" id="indo_smt6_tidak_tercapai">'.$data['indo_smt6_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">4. </td>
<td >&nbsp Matematika</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="mtk_smt6" id="mtk_smt6" value='.$data['mtk_smt6'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="mtk_smt6_tercapai" id="mtk_smt6_tercapai">'.$data['mtk_smt6_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="mtk_smt6_tidak_tercapai" id="mtk_smt6_tidak_tercapai">'.$data['mtk_smt6_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">5. </td>
<td >&nbsp Ilmu Pengetahuan Alam</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="ipa_smt6" id="ipa_smt6" value='.$data['ipa_smt6'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="ipa_smt6_tercapai" id="ipa_smt6_tercapai">'.$data['ipa_smt6_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="ipa_smt6_tidak_tercapai" id="ipa_smt6_tidak_tercapai">'.$data['ipa_smt6_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">6. </td>
<td >&nbsp Ilmu Pengetahuan Sosial</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="ips_smt6" id="ips_smt6" value='.$data['ips_smt6'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="ips_smt6_tercapai" id="ips_smt6_tercapai">'.$data['ips_smt6_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="ips_smt6_tidak_tercapai" id="ips_smt6_tidak_tercapai">'.$data['ips_smt6_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  
  <tr>
  <td  align="center">7. </td>
<td >&nbsp Bahasa Inggris</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="inggris_smt6" id="inggris_smt6" value='.$data['inggris_smt6'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="inggris_smt6_tercapai" id="inggris_smt6_tercapai">'.$data['inggris_smt6_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="inggris_smt6_tidak_tercapai" id="inggris_smt6_tidak_tercapai">'.$data['inggris_smt6_tidak_tercapai'].'</textarea>
    </td>
  </tr>

<tr>
  <td  align="center">8.</td>
<td >&nbsp Seni</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="seni_smt6" id="seni_smt6" value='.$data['seni_smt6'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="seni_smt6_tercapai" id="seni_smt6_tercapai">'.$data['seni_smt6_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="seni_smt6_tidak_tercapai" id="seni_smt6_tidak_tercapai">'.$data['seni_smt6_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">9.</td>
<td >&nbsp Pendidikan Jasmani, Olahraga & Kesehatan</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="pjok_smt6" id="pjok_smt6" value='.$data['pjok_smt6'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="pjok_smt6_tercapai" id="pjok_smt6_tercapai">'.$data['pjok_smt6_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="pjok_smt6_tidak_tercapai" id="pjok_smt6_tidak_tercapai">'.$data['pjok_smt6_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">10.</td>
<td >&nbsp Informatika</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="informatika_smt6" id="informatika_smt6" value='.$data['informatika_smt6'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="informatika_smt6_tercapai" id="informatika_smt6_tercapai">'.$data['informatika_smt6_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="informatika_smt6_tidak_tercapai" id="informatika_smt6_tidak_tercapai">'.$data['informatika_smt6_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">11.</td>
<td >&nbsp Bahasa Jawa</td>
    <td  align="center"><input type="number" min="0" max="100" class="form-control" name="jawa_smt6" id="jawa_smt6" value='.$data['jawa_smt6'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="jawa_smt6_tercapai" id="jawa_smt6_tercapai">'.$data['jawa_smt6_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="jawa_smt6_tidak_tercapai" id="jawa_smt6_tidak_tercapai">'.$data['jawa_smt6_tidak_tercapai'].'</textarea>
    </td>
  </tr>

  <tr>
  <td  align="center">12.</td>
<td >&nbsp Kesenian Daerah</td>
    <td align="center"><input type="number" min="0" max="100" class="form-control" name="kesda_smt6" id="kesda_smt6" value='.$data['kesda_smt6'].'></td>
    <td>
      <label><span>TP Tercapai :</span></label> <textarea rows="1" class="form-control" name="kesda_smt6_tercapai" id="kesda_smt6_tercapai">'.$data['kesda_smt6_tercapai'].'</textarea> <br>
      <label><span>TP Tidak Tercapai :</span></label> <textarea rows="1" class="form-control" name="kesda_smt6_tidak_tercapai" id="kesda_smt6_tidak_tercapai">'.$data['kesda_smt6_tidak_tercapai'].'</textarea>
    </td>
  </tr>
  </table>

  <br>
  <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Ekstrakurikuler</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>English Conversation</td>
        <td> 
          <select class="form-select" id="english_smt6" name="english_smt6" aria-label="Default select example">
              <option selected value="'.$ekskul['english_smt6'].'">'.$ekskul['english_smt6'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
          </td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Pathfinder</td>
        <td>
          <select class="form-select" id="pathfinder_smt6" name="pathfinder_smt6" aria-label="Default select example">
              <option selected value="'.$ekskul['pathfinder_smt6'].'">'.$ekskul['pathfinder_smt6'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>

      <tr>
        <td align="center">3.</td>
        <td>Karawitan</td>
        <td>
          <select class="form-select" id="karawitan_smt6" name="karawitan_smt6" aria-label="Default select example">
              <option selected value="'.$ekskul['karawitan_smt6'].'">'.$ekskul['karawitan_smt6'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>
      </tbody>
      </table>

      <br>
  <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td width="12%">No</td>
        <td>Pengembangan Diri</td>
        <td width="20%">Keterangan</td>
      </tr>
      
      <tr>
        <td align="center">1.</td>
        <td>Bimbingan & Konseling</td>
        <td> 
          <select class="form-select" id="bk_smt6" name="bk_smt6" aria-label="Default select example">
              <option selected value="'.$pengembangan['bk_smt6'].'">'.$pengembangan['bk_smt6'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
          </td>
      </tr>

      <tr>
        <td align="center">2.</td>
        <td>Follow The Bible</td>
        <td>
          <select class="form-select" id="bible_smt6" name="bible_smt6" aria-label="Default select example">
              <option selected value="'.$pengembangan['bible_smt6'].'">'.$pengembangan['bible_smt6'].'</option>
              <option value="Sangat Baik">Sangat Baik</option>
              <option value="Baik">Baik</option>
              <option value="Cukup Baik">Cukup Baik</option>
          </select>
        </td>
      </tr>
      </tbody>
 </table> 

        <br>
        <table class="table table-bordered" width="100%" border="1">
    <tbody>
      <tr style="background-color:#ffbbb8; font-weight:bold" align="center">
        <td colspan="3">Kenaikan Kelas</td>
      </tr>
      
      <tr>
        <td colspan="2" align="center">Status Kenaikan</td>
        <td colspan="2">
        <select class="form-select" id="kenaikan_smt6" name="kenaikan_smt6" aria-label="Default select example">';
        if($siswa['kenaikan_smt6'] == 'Lulus'){
        echo'
              <option value="'.$siswa['kenaikan_smt6'].'">'.$siswa['kenaikan_smt6'].'</option>
              <option value="Tidak Lulus">Tidak Lulus</option> ';
        } else if($siswa['kenaikan_smt6'] == 'Tidak Lulus'){
          echo'
              <option value="'.$siswa['kenaikan_smt6'].'">'.$siswa['kenaikan_smt6'].'</option>
              <option value="Lulus">Lulus</option>';
              } else {
                echo '
                <option disabled selected value="">Input Kelulusan</option>
                <option value="Lulus">Lulus</option>
                <option value="Tidak Lulus">Tidak Lulus</option>';
              }
              
              echo'
              </select>
    </td>

  <tr>
  <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
<td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
    <td style="border-right:hidden; border-bottom:hidden;" align="center"></td>
  </tr>

   <tr align="center">
        <td width="12%" style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
        <td style="border-right:hidden; border-bottom:hidden;"></td>
        <td style="border-right:hidden; border-bottom:hidden;" width="20%"><button type="submit" name="submit" class="btn btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Nilai</button></td>
      </tr>


  </tbody>
  </table>';

    ?>
    </form>
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
                    <form action="update_siswa.php" method="POST">
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
                        <label for="kelas" class="form-label">Kelas</label>
                        <input
                          type="text"
                          class="form-control"
                          id="kelas"
                          name="kelas"
                          value = "<?php echo $siswa['kelas']?>"  />
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