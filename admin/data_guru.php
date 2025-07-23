<?php
$title = "Data Guru dan Karyawan | Aplikasi Rapor SMP Advent";
include "header.php";
?>

    <!-- Content wrapper -->
    <div class="content-wrapper">
            <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card p-5">
                <h5 class="card-header bg-primary text-white mb-6"><strong>Data Guru dan Karyawan SMP Advent Surakarta</strong></h5>
                <?php
                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo '<div class="alert alert-success alert-dismissible" role="alert">'
                        .$_SESSION['pesan'].
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                    $_SESSION['pesan'] = '';
                ?>
                    <div class="row mt-1">
                            <div class="col-sm-3">
                                <a href="#" class="btn btn-md btn-success mb-4" data-bs-toggle="modal" data-bs-target="#add_guru"><i class="bx bxs-user-plus"></i>&nbsp Tambah Data Guru</a>
                            </div>
                            <div class="col-sm-9"></div>
                        </div>
                <div class="table-responsive text-nowrap">
                  <table id="example" class="table" width="100%" >
                  <thead class="table-dark">
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Guru</th>
                        <th class="text-center">Jabatan</th>
                        <th class="text-center">Nomor Whatsapp</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
        <?php
			$qsiswa = mysqli_query($db_conn,"SELECT * FROM data_guru");
			$no = 1;
			if(mysqli_num_rows($qsiswa) > 0){
				while($data = mysqli_fetch_array($qsiswa)){ ?>
                <tr>
                    <td class="text-center"><?php echo $no++?></td>
                    <td class=""><?php echo $data['nama_guru']?><br><strong>NIP. <?php echo $data['nip_guru']?></strong></td>
                    <td class="text-center"><?php echo $data['jabatan']?></td>
                    <td class="text-center"><?php echo $data['nomor']?></td>
                    <td class="text-center"><a class="btn btn-md btn-warning" href="#" data-bs-toggle="modal" data-bs-target="#edit_guru<?php echo htmlspecialchars($data['id_guru'])?>"><i class='bx bx-edit-alt'></i>&nbsp Edit Data</a></td>
                      </tr>

		

        <!-- Modal Tambah Guru -->
        <div class="modal fade" id="add_guru" tabindex="-1" aria-hidden="true">
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
                            <h5><i class='bx bxs-user-plus mb-1'></i> <strong><?php echo strtoupper("Tambah Data Guru dan Karyawan SMP Advent Surakarta")?></strong></h5><hr>
                        <form action="tambah_guru.php" method="POST">

                        <div class="mb-6">
                          <label class="form-label" for="basic-default-fullname">Nama Guru</label>
                          <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Masukkan Nama Guru" autofocus required/>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">NIP</label>
                          <input type="text" class="form-control" id="nip_guru" name="nip_guru" placeholder="Masukkan NIP" autofocus required/>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Jabatan</label>
                          <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" autofocus required/>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Nomor Whatsapp (*62)</label>
                          <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Masukkan Nomor Whatsapp" autofocus required/>
                          <span class="form-label text-danger">Contoh : 6285600242904</span>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary"><i class="bx bx-paper-plane"></i>&nbsp Tambah Data</button>
                      </form>
                        </div>
                    </div>

                    </div>
                </div>
                </div>
            </div>

             <!-- Modal Edit Guru -->
        <div class="modal fade" id="edit_guru<?php echo htmlspecialchars($data['id_guru'])?>" tabindex="-1" aria-hidden="true">
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
                            <h5><i class='bx bxs-user-circle mb-1'></i>&nbsp&nbsp <strong><?php echo strtoupper(" ".$data['nama_guru']." ")?></strong></h5><hr>
                        <form action="update_guru.php" method="POST">
                          <input type="hidden" name="id_guru" value="<?php echo $data['id_guru'] ?>">

                        <div class="mb-6">
                          <label class="form-label" for="basic-default-fullname">Nama Guru</label>
                          <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?php echo $data['nama_guru']?>" autofocus required/>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">NIP</label>
                          <input type="text" class="form-control" id="nip_guru" name="nip_guru" value="<?php echo $data['nip_guru']?>" autofocus required/>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Jabatan</label>
                          <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $data['jabatan']?>" autofocus required/>
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Nomor Whatsapp (*62)</label>
                          <input type="text" class="form-control" id="nomor" name="nomor" value="<?php echo $data['nomor']?>" autofocus required/>
                          <span class="form-label text-danger">Contoh : 6285600242904</span>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-warning"><i class="bx bx-paper-plane"></i>&nbsp Edit Data</button>
                      </form>
                        </div>
                    </div>

                    </div>
                </div>
                </div>
            </div>

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