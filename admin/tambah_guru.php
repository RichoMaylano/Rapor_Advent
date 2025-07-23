<?php 
session_start();
include '../database/database.php';

// ke tabel data_siswa
$nama_guru = $_POST['nama_guru'];
$nip_guru = $_POST['nip_guru'];
$jabatan = $_POST['jabatan'];
$nomor = $_POST['nomor'];

if(isset($_POST['submit'])){
$guru = "INSERT INTO data_guru(id_guru, nama_guru, nip_guru, jabatan, nomor)
VALUES ('', '$nama_guru', '$nip_guru', '$jabatan', '$nomor')";
$result = mysqli_query($db_conn, $guru);

if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['pesan'] = 'Berhasil menambahkan data guru dan karyawan';
}
} 

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
?>