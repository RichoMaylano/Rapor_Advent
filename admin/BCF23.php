<?php
$title = "Data Siswa Broadcasting dan Perfilman 2023/2024 | Aplikasi Pengumuman Kelulusan";
include "header.php";
?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
            <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card p-5">
                <h5 class="card-header bg-primary text-white mb-6"><strong>Data SKL Peserta Didik SMK Negeri 7 Surakarta</strong></h5>
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
                        <th class="text-center">Jurusan</th>
                        <th class="text-center">Tahun Ajaran</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
        <?php
			$qsiswa = mysqli_query($db_conn,"SELECT * FROM data_siswa WHERE jurusan='Broadcasting dan Perfilman' AND tahun_ajaran='2023/2024' ORDER BY nama ASC");
			$no = 1;
			if(mysqli_num_rows($qsiswa) > 0){
				while($data = mysqli_fetch_array($qsiswa)){ ?>
                <tr>
                    <td><?php echo $no++?></td>
                    <td><?php echo $data['nisn']?></td>
                    <td>
                            <?php if($data['jk'] == 'L'){?>
                                <a class="btn btn-sm btn-primary" href="detail_siswa.php?nisn=<?php echo htmlspecialchars($data['nisn'])?>">
                                    <i class='bx bx-male-sign'></i></a>
                                    <?php } else if($data['jk'] == 'P'){?>
                                        <a class="btn btn-sm btn-danger" href="detail_siswa.php?nisn=<?php echo htmlspecialchars($data['nisn'])?>">
                                            <i class='bx bx-female-sign'></i></a>
                                    <?php }?>
                            &nbsp<?php echo $data['nama']?></button>
                        </td>
                    <td>
                    <button class="btn btn-sm">
                        <?php if($data['jurusan'] == 'Broadcasting dan Perfilman'){?>
                            <img src="../assets/images/bcf.png" alt="Avatar" class="circle pull-up" width="5%"/>
                        <?php } else if($data['jurusan'] == 'Desain Komunikasi Visual'){?>
                            <img src="../assets/images/dkv.png" alt="Avatar" class="circle pull-up" width="5%"/>
                        <?php } else if($data['jurusan'] == 'Usaha Layanan Pariwisata'){?>
                            <img src="../assets/images/ulp.png" alt="Avatar" class="circle pull-up" width="5%"/>
                        <?php } else if($data['jurusan'] == 'Pekerjaan Sosial'){?>
                            <img src="../assets/images/peksos.png" alt="Avatar" class="circle pull-up" width="5%"/>
                        <?php } else if($data['jurusan'] == 'Kuliner'){?>
                            <img src="../assets/images/kuliner.png" alt="Avatar" class="circle pull-up" width="5%"/>
                        <?php } else if($data['jurusan'] == 'Perhotelan'){?>
                            <img src="../assets/images/perhotelan.png" alt="Avatar" class="circle pull-up" width="5%"/>
                        <?php }?>
                        &nbsp<?php echo $data['jurusan']?></button></td>
                    <td><?php echo $data['tahun_ajaran']?></td>
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