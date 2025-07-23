<?php
$title = "Akses Pengguna | Aplikasi Rapor SMP Advent";
include "header.php";

?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
            <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card p-5">
            <h5 class="card-header bg-primary text-white mb-6"><strong>Konfigurasi Akses Pengguna Aplikasi Rapor SMP Advent Surakarta</strong></h5>
            
            <?php
                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo '<div class="alert alert-success alert-dismissible" role="alert">'
                        .$_SESSION['pesan'].
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                    $_SESSION['pesan'] = '';
                ?>

                <div class="card-body">
                    <h5><strong>KONFIGURASI</strong></h5><hr>
                    <table id="example" class="table" width="100%" >
                  <thead class="table-dark">
                      <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Last Login</th>
                        <th>Role</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
        <?php
			$query = mysqli_query($db_conn,"SELECT * FROM data_admin");
			$no = 1;
			if(mysqli_num_rows($query) > 0){
				while($data = mysqli_fetch_array($query)){ ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_lengkap']; ?></td>
                        <td><?php echo $data['username']; ?></td>
                        <td><?php if($data['status_login'] == '1'){
                          echo '<a href="" class="btn btn-success"><i class="bx bx-user-check"></i>&nbsp Aktif</a>';
                        } else {
                          echo '<a href="" class="btn btn-danger"><i class="bx bx-user-x"></i>&nbsp Tidak Aktif</a>';
                        }?></td>
                        <td><a href="" class="btn btn-primary"><i class='bx bxs-stopwatch'></i>&nbsp <?php echo indo($data['waktu_login']); ?></a></td>
                        <td>
                            <?php if($data['role'] == 'user'){ ?>
                                <a href="" class="btn btn-success"><i class="bx bxs-user"></i>&nbsp User</a>
                            <?php } else if($data['role'] == 'wali'){?>
                                <a href="" class="btn btn-warning"><i class="bx bxs-user-detail"></i>&nbsp Wali</a>
                            <?php } else {?>
                                <a href="" class="btn btn-info"><i class="bx bxs-user-plus"></i>&nbsp Admin</a>
                            <?php }?>
                        </td>
                        <td><a href="" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit_pengguna<?php echo htmlspecialchars($data['nisn'])?>"><i class="bx bxs-edit"></i>&nbsp Edit</a></td>
                      </tr>


                <!-- Modal Edit Akses Pengguna -->
                <div class="modal fade" id="edit_pengguna<?php echo htmlspecialchars($data['nisn'])?>" tabindex="-1" aria-hidden="true">
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
                  
                  <?php 
                  $nisn = htmlspecialchars($data['nisn']);
                    $query_siswa = "SELECT * FROM data_admin WHERE nisn='$nisn'";
                    // Melakukan query ke database
                    $hsl_siswa = mysqli_query($db_conn, $query_siswa);

                    // Cek jika query berhasil
                    if (!$hsl_siswa) {
                        die("Query Error: " . mysqli_error($db_conn));
                    }

                    $siswa = mysqli_fetch_assoc($hsl_siswa);
                    ?>

                    <div class="card">
                        <div class="card-body">
                            <h5><i class='bx bxs-user me-1'></i> <strong><?php echo strtoupper("Edit Akses Pengguna")?></strong></h5><hr>
                        <form action="update_pengguna.php" method="POST">
                        <input type="hidden" name="nisn" value="<?php echo $siswa['nisn'] ?>">

                        <div class="mb-6">
                          <label class="form-label" for="basic-default-fullname">Nama Lengkap</label>
                          <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?php echo $siswa['nama_lengkap'] ?>" />
                        </div>
                        
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">NISN</label>
                          <input type="text" class="form-control bg-light" id="nisn" name="nisn" value="<?php echo $siswa['nisn'] ?>" readonly/>
                        </div>

                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Username</label>
                          <input type="text" class="form-control" id="username" name="username" value="<?php echo $siswa['username'] ?>" />
                        </div>

                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Role</label>
                            <select class="form-select" id="exampleFormControlSelect1" name="role" aria-label="Default select example">
                          <?php if($siswa['role'] == "user"){?>
                            <option selected value="<?php echo $siswa['role'] ?>">User</option>
                            <option value="wali">Wali</option>
                            <option value="admin">Admin</option>
                          
                          <?php } else if($siswa['role'] == "wali"){?>
                            <option selected value="<?php echo $siswa['role'] ?>">Wali</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                            
                          <?php } else {?>
                            <option selected value="<?php echo $siswa['role'] ?>">Admin</option>
                            <option value="wali">Wali</option>
                            <option value="user">User</option>
                            <?php }?>
                        </select>
                        </div>

                        <button type="submit" name="submit" class="btn btn-success"><i class="bx bxl-whatsapp"></i> &nbspKirim Notifikasi Pesan</button>
                      </form>
                        </div>
                    </div>

                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
		<?php }
			} else {
				echo '<tr><td colspan="6"><em>Belum ada data! Segera lakukan upload data.</em></td></tr>';
			}
			?>
                    </tbody>
                  </table>
                </div>
            </div>
            </div>
        </div>

<?php
include "footer.php";
?>