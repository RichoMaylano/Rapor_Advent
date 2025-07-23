<?php 
session_start();
include '../database/database.php';
$id_guru = $_POST['id_guru'];

// ke tabel data_guru
$nama_guru = $_POST['nama_guru'];
$nip_guru = $_POST['nip_guru'];
$jabatan = $_POST['jabatan'];
$nomor = $_POST['nomor'];

if(isset($_POST['submit'])){
$sql = "UPDATE data_guru SET nama_guru='$nama_guru', nip_guru='$nip_guru', jabatan='$jabatan', nomor='$nomor' WHERE id_guru='$id_guru'";

$result = mysqli_query($db_conn, $sql);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['pesan'] = 'Data Guru dan Karyawan Berhasil Diupdate !';
} 
} 

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
?>