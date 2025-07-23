<?php
$title = 'Dashboard | Aplikasi Rapor SMP Advent Surakarta';
include "header.php";
?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

<div class="container">
  <div class="col-xxl-12 order-0">
    <div class="card mt-4">

    <div class="row">
      <div class="col-sm-6">
      <div class="card-body">
        <h5 class="card-title text-primary mb-3"><strong>HALO, <?php echo strtoupper($_SESSION['nama_lengkap'])?>! 🎉</strong></h5>
                          <p class="mb-6">
                            <?php if($_SESSION['role'] == 'wali'){
                              echo 'Anda adalah <strong>Wali Kelas</strong> Aplikasi Rapor SMP Advent Surakarta<br>';
                            } else if($_SESSION['role'] == 'admin'){
                              echo 'Anda adalah <strong>Administrator</strong> Aplikasi Rapor SMP Advent Surakarta<br>';
                            }?>
                          <hr>
                            <button class="btn btn-sm btn-success"><i class='bx bxs-bell-ring mb-1' ></i> &nbspStatus Anda Aktif &nbsp</button>
                            <?php 
                        $admin = mysqli_query($db_conn,"SELECT * FROM data_admin WHERE nama_lengkap='{$_SESSION['nama_lengkap']}'");
                        if(mysqli_num_rows($admin) > 0){
                          while($data = mysqli_fetch_array($admin)){ ?>
                          <button class="btn btn-sm btn-warning"><i class='bx bx-log-in mb-1'></i> &nbsp <?php echo $data['sesi_login'] ?> WIB</button>
                      <?php }
                        } else {
                          echo '';
                      }?></p>
        </div>
      </div>

        <div class="col-sm-6 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-6">
            <img
              src="../assets/Sneat/assets/img/illustrations/man-with-laptop.png"
              height="175"
              class="scaleX-n1-rtl"
              alt="View Badge User" />
          </div>
        </div>

        <!-- row -->
      </div>

    </div>
  </div>
</div>

            <div class="container-xxl flex-grow-1 container-p-y">
            <div class="col-xxl-12 order-0">
              <div class="card-header"><h5 class="btn btn-primary text-white">PENGUMUMAN !</h5></div>
            <div class="card bg-primary">
            <div class="d-flex align-items-start row">
            <?php
                $query = "SELECT * FROM data_konfig";
                // Melakukan query ke database
                $result = mysqli_query($db_conn, $query);

                // Cek jika query berhasil
                if (!$result) {
                    die("Query Error: " . mysqli_error($db_conn));
                }

                $konfig = mysqli_fetch_assoc($result);
                ?>
                
                  <div class="card-body">
                    <h3 class="text-white mt-3"><marquee behavior="" direction="left"><strong>PENGUMUMAN HASIL RAPOR SEMESTER GENAP AKAN DILAKSANAKAN PADA TANGGAL <?php echo strtoupper(tgl_indo(date('Y-m-d',strtotime($konfig['tgl_pengumuman'])))) ?> PUKUL <?php echo date('H:i',strtotime($konfig['tgl_pengumuman'])) ?></strong></marquee></h3>
                  </div>
                </div>
          </div>
          </div>
          </div>

           
            

            
<?php
include 'footer.php';
?>
          