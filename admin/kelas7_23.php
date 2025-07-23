<?php
$title = "Data Siswa Kelas 7 Tahun 2023/2024 | Aplikasi Rapor SMP Advent";
include "header.php";
?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
            <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card p-5">
                <h5 class="card-header bg-primary text-white mb-6"><strong>Data Rapor Peserta Didik SMP Advent Surakarta</strong></h5>
                <div class="row mt-1">
                            <div class="col-sm-3">
                                <a href="#" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#add_siswa"><i class="bx bxs-user-plus"></i>&nbspTambah Siswa</a>
                            </div>
                            <div class="col-sm-9"></div>
                        </div>

                        <?php
                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo '<div class="alert alert-success alert-dismissible" role="alert">'
                        .$_SESSION['pesan'].
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                    $_SESSION['pesan'] = '';
                ?>

                        <!-- Modal Edit Konfigurasi -->
        <div class="modal fade" id="add_siswa" tabindex="-1" aria-hidden="true">
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
                        <div class="card-body">
                            <h5><i class='bx bxs-user-plus me-1'></i> <strong><?php echo strtoupper("Tambah Siswa Kelas 7 Tahun Ajaran 2023/2024")?></strong></h5><hr>
                        <form action="tambah_siswa23.php" method="POST">

                        <div class="mb-6">
                          <label class="form-label" for="basic-default-fullname">Nama Siswa</label>
                          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Siswa" autofocus required/>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">NISN</label>
                          <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukkan NISN Siswa" autofocus required/>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">NIS</label>
                          <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS Siswa" autofocus required/>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Tempat, Tanggal Lahir</label>
                          <input type="text" class="form-control" id="ttl" name="ttl" placeholder="Masukkan Tempat dan Tanggal Lahir" autofocus required/>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Jenis Kelamin</label>
                          <select class="form-select" id="jk" name="jk" aria-label="Default select example" autofocus required>
                              <option disabled selected value="">------ Silahkan Pilih Jenis Kelamin ------</option>
                              <option value="L">Laki-Laki</option>
                              <option value="P">Perempuan</option>
                          </select>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Alamat</label>
                          <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Siswa" autofocus required/>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Tahun Masuk Ajaran</label>
                          <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" value="2023/2024"/>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary"><i class="bx bx-paper-plane"></i>&nbsp Tambah Siswa</button>
                      </form>
                        </div>
                    </div>

                          
                                    </div>
                                </div>
                              </div>
                            </div>

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
			$qsiswa = mysqli_query($db_conn,"SELECT * FROM data_rapor WHERE tahun_pelajaran='2023/2024' AND tahun_masuk='2023/2024' ORDER BY nama ASC");
			$no = 1;
			if(mysqli_num_rows($qsiswa) > 0){
				while($data = mysqli_fetch_array($qsiswa)){ ?>
                <tr>
                    <td class="text-center"><?php echo $no++?></td>
                    <td class="text-center"><?php echo $data['nisn']?></td>
                    <td><a class="btn btn-sm btn-primary" href="detail_siswa.php?nisn=<?php echo htmlspecialchars($data['nisn'])?>"><i class='bx bxs-copy-alt'></i></a>
                            &nbsp<?php echo $data['nama']?></button>
                        </td>
                    <td class="text-center">Kelas 7</td>
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