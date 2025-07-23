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
                <h5 class="card-header bg-primary text-white mb-6"><strong>Input Rekap Kehadiran | <?php echo $data['nama']?> | SMP Advent Surakarta</strong></h5>

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
                echo'
                    <div class="alert alert-success alert-dismissible" role="alert">'
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
   
  <?php if($_SESSION['role'] == 'admin'){?>
    <!-- Tab Semester 1 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link active"
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
        class="nav-link active"
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
        class="nav-link active"
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
        class="nav-link active"
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
        class="nav-link active"
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
        class="nav-link active"
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
      <?php } else if($gab_siswa['wali_smt3'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt4'] == $_SESSION['nama_lengkap']){?>
        <!-- Tab Semester 3 -->
    <li class="nav-item">
      <button
        type="button"
        class="nav-link active"
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
        class="nav-link active"
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

  <!-- Tab Profile -->
  <div class="tab-content">
    <?php 
        $query = "SELECT * FROM data_hadir WHERE nisn = '$nisn'";
        // Melakukan query ke database
        $result = mysqli_query($db_conn, $query);

        // Cek jika query berhasil
        if (!$result) {
            die("Query Error: " . mysqli_error($db_conn));
        }

        $data = mysqli_fetch_assoc($result);

        ?>

<?php if($_SESSION['role'] == 'admin'){?>
  <!-- Tab Semester 1 -->
    <div class="tab-pane fade show active" id="navs-justified-satu" role="tabpanel">
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 1</h5><hr>
        <form action="rekap/rekap_smt1.php" class="form-horizontal" method="post">
        <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
    <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt1" id="sakit_smt1" value="<?php echo $data['sakit_smt1']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt1" id="izin_smt1" value="<?php echo $data['izin_smt1']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt1" id="alpha_smt1" value="<?php echo $data['alpha_smt1']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>
    
    <!-- Tab Semester 2 -->
    <div class="tab-pane fade" id="navs-justified-dua" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 2</h5><hr>
    <form action="rekap/rekap_smt2.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt2" id="sakit_smt2" value="<?php echo $data['sakit_smt2']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt2" id="izin_smt2" value="<?php echo $data['izin_smt2']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt2" id="alpha_smt2" value="<?php echo $data['alpha_smt2']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>
    
    <!-- Tab Semester 3 -->
    <div class="tab-pane fade" id="navs-justified-tiga" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 3</h5><hr>
    <form action="rekap/rekap_smt3.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt3" id="sakit_smt3" value="<?php echo $data['sakit_smt3']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt3" id="izin_smt3" value="<?php echo $data['izin_smt3']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt3" id="alpha_smt3" value="<?php echo $data['alpha_smt3']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 4 -->
    <div class="tab-pane fade" id="navs-justified-empat" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 4</h5><hr>
    <form action="rekap/rekap_smt4.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt4" id="sakit_smt4" value="<?php echo $data['sakit_smt4']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt4" id="izin_smt4" value="<?php echo $data['izin_smt4']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt4" id="alpha_smt4" value="<?php echo $data['alpha_smt4']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 5 -->
    <div class="tab-pane fade" id="navs-justified-lima" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 5</h5><hr>
    <form action="rekap/rekap_smt5.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt5" id="sakit_smt5" value="<?php echo $data['sakit_smt5']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt5" id="izin_smt5" value="<?php echo $data['izin_smt5']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt5" id="alpha_smt5" value="<?php echo $data['alpha_smt5']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 6 -->
    <div class="tab-pane fade" id="navs-justified-enam" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 6</h5><hr>
    <form action="rekap/rekap_smt6.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
    <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt6" id="sakit_smt6" value="<?php echo $data['sakit_smt6']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt6" id="izin_smt6" value="<?php echo $data['izin_smt6']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt6" id="alpha_smt6" value="<?php echo $data['alpha_smt6']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <?php } else if($_SESSION['role'] == 'wali'){?>
       <!-- Semester 1,2,3,4,5 dan 6 -->
      <?php if($gab_siswa['wali_smt1'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt2'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt3'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt4'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt5'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt6']){?>
<!-- Tab Semester 1 -->
    <div class="tab-pane fade show active" id="navs-justified-satu" role="tabpanel">
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 1</h5><hr>
        <form action="rekap/rekap_smt1.php" class="form-horizontal" method="post">
        <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
    <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt1" id="sakit_smt1" value="<?php echo $data['sakit_smt1']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt1" id="izin_smt1" value="<?php echo $data['izin_smt1']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt1" id="alpha_smt1" value="<?php echo $data['alpha_smt1']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>
    
    <!-- Tab Semester 2 -->
    <div class="tab-pane fade" id="navs-justified-dua" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 2</h5><hr>
    <form action="rekap/rekap_smt2.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt2" id="sakit_smt2" value="<?php echo $data['sakit_smt2']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt2" id="izin_smt2" value="<?php echo $data['izin_smt2']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt2" id="alpha_smt2" value="<?php echo $data['alpha_smt2']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>
    
    <!-- Tab Semester 3 -->
    <div class="tab-pane fade" id="navs-justified-tiga" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 3</h5><hr>
    <form action="rekap/rekap_smt3.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt3" id="sakit_smt3" value="<?php echo $data['sakit_smt3']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt3" id="izin_smt3" value="<?php echo $data['izin_smt3']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt3" id="alpha_smt3" value="<?php echo $data['alpha_smt3']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 4 -->
    <div class="tab-pane fade" id="navs-justified-empat" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 4</h5><hr>
    <form action="rekap/rekap_smt4.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt4" id="sakit_smt4" value="<?php echo $data['sakit_smt4']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt4" id="izin_smt4" value="<?php echo $data['izin_smt4']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt4" id="alpha_smt4" value="<?php echo $data['alpha_smt4']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 5 -->
    <div class="tab-pane fade" id="navs-justified-lima" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 5</h5><hr>
    <form action="rekap/rekap_smt5.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt5" id="sakit_smt5" value="<?php echo $data['sakit_smt5']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt5" id="izin_smt5" value="<?php echo $data['izin_smt5']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt5" id="alpha_smt5" value="<?php echo $data['alpha_smt5']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 6 -->
    <div class="tab-pane fade" id="navs-justified-enam" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 6</h5><hr>
    <form action="rekap/rekap_smt6.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
    <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt6" id="sakit_smt6" value="<?php echo $data['sakit_smt6']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt6" id="izin_smt6" value="<?php echo $data['izin_smt6']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt6" id="alpha_smt6" value="<?php echo $data['alpha_smt6']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

     <!-- Semester 1,2,3 dan 4 -->
      <?php } else if($gab_siswa['wali_smt1'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt2'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt3'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt4'] == $_SESSION['nama_lengkap']){?>
      <!-- Tab Semester 1 -->
    <div class="tab-pane fade show active" id="navs-justified-satu" role="tabpanel">
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 1</h5><hr>
        <form action="rekap/rekap_smt1.php" class="form-horizontal" method="post">
        <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
    <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt1" id="sakit_smt1" value="<?php echo $data['sakit_smt1']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt1" id="izin_smt1" value="<?php echo $data['izin_smt1']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt1" id="alpha_smt1" value="<?php echo $data['alpha_smt1']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>
    
    <!-- Tab Semester 2 -->
    <div class="tab-pane fade" id="navs-justified-dua" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 2</h5><hr>
    <form action="rekap/rekap_smt2.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt2" id="sakit_smt2" value="<?php echo $data['sakit_smt2']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt2" id="izin_smt2" value="<?php echo $data['izin_smt2']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt2" id="alpha_smt2" value="<?php echo $data['alpha_smt2']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

        <!-- Tab Semester 3 -->
    <div class="tab-pane fade" id="navs-justified-tiga" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 3</h5><hr>
    <form action="rekap/rekap_smt3.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt3" id="sakit_smt3" value="<?php echo $data['sakit_smt3']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt3" id="izin_smt3" value="<?php echo $data['izin_smt3']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt3" id="alpha_smt3" value="<?php echo $data['alpha_smt3']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 4 -->
    <div class="tab-pane fade" id="navs-justified-empat" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 4</h5><hr>
    <form action="rekap/rekap_smt4.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt4" id="sakit_smt4" value="<?php echo $data['sakit_smt4']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt4" id="izin_smt4" value="<?php echo $data['izin_smt4']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt4" id="alpha_smt4" value="<?php echo $data['alpha_smt4']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

        <!-- Semester 3,4,5 dan 6 -->
     <?php } else if($gab_siswa['wali_smt3'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt4'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt5'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt6'] == $_SESSION['nama_lengkap']){?>
      <!-- Tab Semester 3 -->
    <div class="tab-pane fade show active" id="navs-justified-tiga" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 3</h5><hr>
    <form action="rekap/rekap_smt3.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt3" id="sakit_smt3" value="<?php echo $data['sakit_smt3']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt3" id="izin_smt3" value="<?php echo $data['izin_smt3']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt3" id="alpha_smt3" value="<?php echo $data['alpha_smt3']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 4 -->
    <div class="tab-pane fade" id="navs-justified-empat" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 4</h5><hr>
    <form action="rekap/rekap_smt4.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt4" id="sakit_smt4" value="<?php echo $data['sakit_smt4']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt4" id="izin_smt4" value="<?php echo $data['izin_smt4']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt4" id="alpha_smt4" value="<?php echo $data['alpha_smt4']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 5 -->
    <div class="tab-pane fade" id="navs-justified-lima" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 5</h5><hr>
    <form action="rekap/rekap_smt5.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt5" id="sakit_smt5" value="<?php echo $data['sakit_smt5']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt5" id="izin_smt5" value="<?php echo $data['izin_smt5']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt5" id="alpha_smt5" value="<?php echo $data['alpha_smt5']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 6 -->
    <div class="tab-pane fade" id="navs-justified-enam" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 6</h5><hr>
    <form action="rekap/rekap_smt6.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
    <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt6" id="sakit_smt6" value="<?php echo $data['sakit_smt6']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt6" id="izin_smt6" value="<?php echo $data['izin_smt6']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt6" id="alpha_smt6" value="<?php echo $data['alpha_smt6']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Semester 1,2,5 dan 6 -->
        <?php } else if($gab_siswa['wali_smt1'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt2'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt5'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt6'] == $_SESSION['nama_lengkap']){?>
<!-- Tab Semester 1 -->
    <div class="tab-pane fade show active" id="navs-justified-satu" role="tabpanel">
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 1</h5><hr>
        <form action="rekap/rekap_smt1.php" class="form-horizontal" method="post">
        <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
    <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt1" id="sakit_smt1" value="<?php echo $data['sakit_smt1']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt1" id="izin_smt1" value="<?php echo $data['izin_smt1']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt1" id="alpha_smt1" value="<?php echo $data['alpha_smt1']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>
    
    <!-- Tab Semester 2 -->
    <div class="tab-pane fade" id="navs-justified-dua" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 2</h5><hr>
    <form action="rekap/rekap_smt2.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt2" id="sakit_smt2" value="<?php echo $data['sakit_smt2']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt2" id="izin_smt2" value="<?php echo $data['izin_smt2']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt2" id="alpha_smt2" value="<?php echo $data['alpha_smt2']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

          <!-- Tab Semester 5 -->
    <div class="tab-pane fade" id="navs-justified-lima" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 5</h5><hr>
    <form action="rekap/rekap_smt5.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt5" id="sakit_smt5" value="<?php echo $data['sakit_smt5']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt5" id="izin_smt5" value="<?php echo $data['izin_smt5']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt5" id="alpha_smt5" value="<?php echo $data['alpha_smt5']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 6 -->
    <div class="tab-pane fade" id="navs-justified-enam" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 6</h5><hr>
    <form action="rekap/rekap_smt6.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
    <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt6" id="sakit_smt6" value="<?php echo $data['sakit_smt6']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt6" id="izin_smt6" value="<?php echo $data['izin_smt6']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt6" id="alpha_smt6" value="<?php echo $data['alpha_smt6']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Semester 1 dan 2 -->
      <?php } else if($gab_siswa['wali_smt1'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt2']){?>
        <!-- Tab Semester 1 -->
    <div class="tab-pane fade show active" id="navs-justified-satu" role="tabpanel">
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 1</h5><hr>
        <form action="rekap/rekap_smt1.php" class="form-horizontal" method="post">
        <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
    <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt1" id="sakit_smt1" value="<?php echo $data['sakit_smt1']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt1" id="izin_smt1" value="<?php echo $data['izin_smt1']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt1" id="alpha_smt1" value="<?php echo $data['alpha_smt1']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>
    
    <!-- Tab Semester 2 -->
    <div class="tab-pane fade" id="navs-justified-dua" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 2</h5><hr>
    <form action="rekap/rekap_smt2.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt2" id="sakit_smt2" value="<?php echo $data['sakit_smt2']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt2" id="izin_smt2" value="<?php echo $data['izin_smt2']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt2" id="alpha_smt2" value="<?php echo $data['alpha_smt2']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Semester 3 dan 4 -->
        <?php } else if($gab_siswa['wali_smt3'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt4']){?>
           <!-- Tab Semester 3 -->
    <div class="tab-pane fade show active" id="navs-justified-tiga" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 3</h5><hr>
    <form action="rekap/rekap_smt3.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt3" id="sakit_smt3" value="<?php echo $data['sakit_smt3']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt3" id="izin_smt3" value="<?php echo $data['izin_smt3']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt3" id="alpha_smt3" value="<?php echo $data['alpha_smt3']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 4 -->
    <div class="tab-pane fade" id="navs-justified-empat" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 4</h5><hr>
    <form action="rekap/rekap_smt4.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt4" id="sakit_smt4" value="<?php echo $data['sakit_smt4']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt4" id="izin_smt4" value="<?php echo $data['izin_smt4']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt4" id="alpha_smt4" value="<?php echo $data['alpha_smt4']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Semester 5 dan 6 -->
      <?php } else if($gab_siswa['wali_smt5'] == $_SESSION['nama_lengkap'] && $gab_siswa['wali_smt6']){?>
    <!-- Tab Semester 5 -->
    <div class="tab-pane fade show active" id="navs-justified-lima" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 5</h5><hr>
    <form action="rekap/rekap_smt5.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
        <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt5" id="sakit_smt5" value="<?php echo $data['sakit_smt5']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt5" id="izin_smt5" value="<?php echo $data['izin_smt5']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt5" id="alpha_smt5" value="<?php echo $data['alpha_smt5']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>

    <!-- Tab Semester 6 -->
    <div class="tab-pane fade" id="navs-justified-enam" role="tabpanel">
    
    <div class="row">
        <div class="col">
        <h5>Input Rekap Kehadiran Semester 6</h5><hr>
    <form action="rekap/rekap_smt6.php" class="form-horizontal" method="post">
    <input type="hidden" name="id_siswa" value="<?php echo $data['id_siswa']?>">
    <table class="table table-bordered" width="100%">
        <thead style="font-weight:bold;" align="center">
            <tr>
                <td>NAMA SISWA</td>
                <td>KETERANGAN</td>
                <td width="20%">JUMLAH REKAP KEHADIRAN</td>
            </tr>
        </thead>
        <tbody align="center">
            <tr>
                <td rowspan="3" style="font-weight:bold;"><?php echo strtoupper($data['nama'])?></td>
                <td>SAKIT</td>
                <td><input type="number" min="0" max="16" class="form-control" name="sakit_smt6" id="sakit_smt6" value="<?php echo $data['sakit_smt6']?>"></td>
            </tr>
            <tr>
                <td>IZIN</td>
                <td><input type="number" min="0" max="16" class="form-control" name="izin_smt6" id="izin_smt6" value="<?php echo $data['izin_smt6']?>"></td>
            </tr>
            <tr>
                <td>TANPA KETERANGAN (ALPHA)</td>
                <td><input type="number" min="0" max="16" class="form-control" name="alpha_smt6" id="alpha_smt6" value="<?php echo $data['alpha_smt6']?>"></td>
            </tr>
            <tr>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-left:hidden; border-bottom:hidden;"></td>
                <td style="border-right:hidden; border-bottom:hidden;" align="center"><br><button type="submit" name="submit" class="btn btn-sm btn-primary mb-4"><i class="bx bx-save"></i>&nbsp Simpan Rekap Kehadiran</button></td>
            </tr>
        </tbody>
    </table>
    </form>
      </div>
        </div>
    </div>
        <?php }?>
    <?php }?>

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