<?php
$title = "Data Siswa Kelas 9 Tahun 2024/2025 | Aplikasi Rapor SMP Advent";
include "header.php";
?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
            <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card p-5">
                <h5 class="card-header bg-primary text-white mb-6"><strong>Data Rapor Peserta Didik SMP Advent Surakarta</strong></h5>
                <div class="table-responsive text-nowrap">

                <?php
                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo '<div class="alert alert-success alert-dismissible" role="alert">'
                        .$_SESSION['pesan'].
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                    $_SESSION['pesan'] = '';
                ?>

                  <table id="example" class="table" width="100%" >
                  <thead class="table-dark">
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">NISN</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Tahun Masuk</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
        <?php
			$qsiswa = mysqli_query($db_conn,"SELECT * FROM data_rapor WHERE tahun_pelajaran='2024/2025' AND tahun_masuk='2022/2023' ORDER BY nama ASC");
			$no = 1;
			if(mysqli_num_rows($qsiswa) > 0){
				while($data = mysqli_fetch_array($qsiswa)){ ?>
                <tr>
                    <td class="text-center"><?php echo $no++?></td>
                    <td class="text-center"><?php echo $data['nisn']?></td>
                    <td><a class="btn btn-sm btn-primary" href="detail_siswa.php?nisn=<?php echo htmlspecialchars($data['nisn'])?>"><i class='bx bxs-copy-alt'></i></a>
                            &nbsp<?php echo $data['nama']?></button>
                        </td>
                    <td class="text-center">Kelas 9</td>
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