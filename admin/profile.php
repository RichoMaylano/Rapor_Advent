<?php
$title = "My Profile | Aplikasi Pengumuman Kelulusan";
include "header.php";

?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
            <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card p-5">
            <h5 class="card-header bg-primary text-white mb-6"><strong>Profile | <?php echo $_SESSION['nama_lengkap']?> | <?php if($_SESSION['role'] == 'admin'){
                echo 'Admin';
            } else {
                echo 'User';
            }?></strong></h5>
                <div class="card-body">
                    <h5><strong>MY PROFILE</strong></h5>
                    
                    <?php
                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo '<div class="alert alert-success alert-dismissible" role="alert">'
                        .$_SESSION['pesan'].
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
                    }
                    $_SESSION['pesan'] = '';
                ?>
            <div class="row">
                <div class="col-sm-3 mt-4 mb-4">
                <table width="100%">
                    <tr>
                    <td class="text-center"><img src="../assets/images/admin.jpg" width="150px" alt=""></td>
                    </tr>
                </table>
                </div>
                   <div class="col-sm-9 mt-1">
                     <table class="table" width="100%">
                        <tbody>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>Richo Maylano Yozienanda</td>
                        </tr>
                        <tr>
                            <td>Nama Panggilan</td>
                            <td>Richo</td>
                        </tr>
                        <tr>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>Surakarta, 18 Mei 2000</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>Sumpingan RT 05/ RW 06, Kadipiro, Banjarsari, Surakarta</td>
                        </tr>
                        <tr>
                            <td>Nomor Telepon</td>
                            <td>085600242904</td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>Administrator</td>
                        </tr>
                        </tbody>
                    </table></div>
</div>

                </div>
            </div>
            </div>
        </div>


<?php
include "footer.php";
?>