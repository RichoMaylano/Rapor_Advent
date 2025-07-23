<?php
$title = "Konfigurasi | Aplikasi Rapor SMP Advent";
include "header.php";

$query = "SELECT * FROM data_konfig";
// Melakukan query ke database
$result = mysqli_query($db_conn, $query);

// Cek jika query berhasil
if (!$result) {
    die("Query Error: " . mysqli_error($db_conn));
}

$data = mysqli_fetch_assoc($result);
?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
            <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card p-5">
            <h5 class="card-header bg-primary text-white mb-6"><strong>Konfigurasi Pengumuman Rapor SMP Advent Surakarta</strong></h5>
                <div class="card-body">
                    <h5><strong>KONFIGURASI</strong></h5><hr>
                    
                    <?php
                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo '<div class="alert alert-success alert-dismissible" role="alert">'
                        .$_SESSION['pesan'].
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                    $_SESSION['pesan'] = '';
                ?>

                    <table class="table table-bordered table-striped" width="100%" border="1">
                        <tbody>
                        <tr>
                            <td>Pemerintah</td>
                            <td><?php echo $data['pemerintah']?></td>
                        </tr>
                        <tr>
                            <td>Dinas</td>
                            <td><?php echo $data['dinas']?></td>
                        </tr>
                        <tr>
                            <td>Nama Sekolah</td>
                            <td><?php echo $data['sekolah']?></td>
                        </tr>
                        <tr>
                            <td>Alamat Sekolah</td>
                            <td><?php echo strtoupper($data['alamat'])?></td>
                        </tr>
                        <tr>
                            <td>Tahun Pengumuman</td>
                            <td><?php echo $data['tahun']?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Pengumuman</td>
                            <td><?php echo strtoupper(indo($data['tgl_pengumuman']))?></td>
                        </tr>
                        <tr>
                            <td>Kepala Sekolah</td>
                            <td><?php echo strtoupper($data['nama_kepsek'])?> <br><strong>NIP. <?php echo $data['nip_kepsek']?></strong></td>
                        </tr>
                        </tbody>
                    </table>

                        <div class="row mt-3">
                            <div class="col-sm-3">
                                <a href="#" class="btn btn-warning mb-4" data-bs-toggle="modal" data-bs-target="#edit_konfigurasi"><i class="bx bx-edit"></i>&nbspEdit Konfigurasi</a>
                            </div>
                            <div class="col-sm-9"></div>
                        </div>
                </div>
            </div>
            </div>
        </div>


        <!-- Modal Edit Konfigurasi -->
        <div class="modal fade" id="edit_konfigurasi" tabindex="-1" aria-hidden="true">
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
                    $query_conf = "SELECT * FROM data_konfig";
                    // Melakukan query ke database
                    $hsl_config = mysqli_query($db_conn, $query_conf);

                    // Cek jika query berhasil
                    if (!$hsl_config) {
                        die("Query Error: " . mysqli_error($db_conn));
                    }

                    $config = mysqli_fetch_assoc($hsl_config);
                    ?>

                    <div class="card">
                        <div class="card-body">
                            <h5><i class='bx bxs-cog me-1'></i> <strong><?php echo strtoupper("Edit Konfigurasi Pengumuman Kelulusan")?></strong></h5><hr>
                        <form action="update_konfigurasi.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $config['id'] ?>">

                        <div class="mb-6">
                          <label class="form-label" for="basic-default-fullname">Nama Pemerintah</label>
                          <input type="text" class="form-control" id="pemerintah" name="pemerintah" value="<?php echo $config['pemerintah'] ?>" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Nama Dinas</label>
                          <input type="text" class="form-control" id="dinas" name="dinas" value="<?php echo $config['dinas'] ?>" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Nama Sekolah</label>
                          <input type="text" class="form-control" id="sekolah" name="sekolah" value="<?php echo $config['sekolah'] ?>" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Alamat Sekolah</label>
                          <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $config['alamat'] ?>" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Tahun Pengumuman</label>
                          <input type="text" class="form-control" id="tahun" name="tahun" value="<?php echo $config['tahun'] ?>" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Tanggal Pengumuman</label>
                          <input type="date" class="form-control" id="tgl_pengumuman" name="cfgTanggal" value="<?php echo date('Y-m-d',strtotime($config['tgl_pengumuman'])) ?>" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Jam Pengumuman</label>
                          <input type="time" class="form-control" id="jam_pengumuman" name="cfgJam" value="<?php echo date('H:i',strtotime($config['tgl_pengumuman'])) ?>" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">Nama Kepala Sekolah</label>
                          <input type="text" class="form-control" id="nama_kepsek" name="nama_kepsek" value="<?php echo $config['nama_kepsek'] ?>" />
                        </div>
                        <div class="mb-6">
                          <label class="form-label" for="basic-default-company">NIP Kepala Sekolah</label>
                          <input type="text" class="form-control" id="nip_kepsek" name="nip_kepsek" value="<?php echo $config['nip_kepsek'] ?>" />
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-primary">Send</button>
                      </form>
                        </div>
                    </div>

                          
                                    </div>
                                </div>
                              </div>
                            </div>

<?php
include "footer.php";
?>