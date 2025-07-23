<?php
$title = "Data Siswa | Aplikasi Rapor SMP Advent";
include "header.php";
?>

    <!-- Content wrapper -->
    <div class="content-wrapper">
            <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card p-5">
                <h5 class="card-header bg-primary text-white mb-6"><strong>Data Rapor Peserta Didik SMP Advent Surakarta | Wali Kelas : <?php echo $_SESSION['nama_lengkap']?></strong></h5>

                        <?php
                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo '<div class="alert alert-success alert-dismissible" role="alert">'
                        .$_SESSION['pesan'].
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                    $_SESSION['pesan'] = '';
                ?>

                <div class="table-responsive text-nowrap">
                  <table id="example" class="table" width="100%" >
                  <thead class="table-dark">
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NISN</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Kelas Saat Ini</th>
                        <th class="text-center">Tahun Masuk</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
        <?php
			$qsiswa = mysqli_query($db_conn,"SELECT * FROM data_siswa WHERE wali_smt1= '".$_SESSION['nama_lengkap']."' OR wali_smt2= '".$_SESSION['nama_lengkap']."' OR wali_smt3= '".$_SESSION['nama_lengkap']."' OR wali_smt4= '".$_SESSION['nama_lengkap']."' OR wali_smt5= '".$_SESSION['nama_lengkap']."' OR wali_smt6= '".$_SESSION['nama_lengkap']."'");
			$no = 1;
			if(mysqli_num_rows($qsiswa) > 0){
				while($data = mysqli_fetch_array($qsiswa)){ ?>
                <tr>
                    <td class="text-center"><?php echo $no++?></td>
                    <td class="text-center"><?php echo $data['nisn']?></td>
                    <td><a class="btn btn-sm btn-primary" href="detail_siswa.php?nisn=<?php echo htmlspecialchars($data['nisn'])?>"><i class='bx bxs-copy-alt'></i></a>
                            &nbsp<?php echo $data['nama']?></button>
                        </td>
                    <td class="text-center">
                      <?php
                            if($date >= '14-07-2025' && $data['tahun_masuk'] == '2023/2024'){
                              echo 'Kelas 9';
                            } else if($date >= '14-07-2025' && $data['tahun_masuk'] == '2024/2025'){
                              echo 'Kelas 8';
                            } else if($date >= '14-07-2025' && $data['tahun_masuk'] == '2025/2026'){
                              echo 'Kelas 7';
                            }
                          ?></td>
                    <td class="text-center"><?php echo $data['tahun_masuk']?></td>
                      </tr>

		<?php }
			} else {
				echo '<tr><td colspan="8"><em>Belum ada data! Segera lakukan upload data.</em></td></tr>';
			}
			?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Bootstrap Dark Table -->
              
            </div>
        </div>

<?php
include "footer.php";
?>