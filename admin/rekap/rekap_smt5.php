<?php 
session_start();
include '../../database/database.php';
$id_siswa = $_POST['id_siswa'];

// ke tabel data_rapor
$sakit_smt5 = $_POST['sakit_smt5'];
$izin_smt5 = $_POST['izin_smt5'];
$alpha_smt5 = $_POST['alpha_smt5'];


if(isset($_POST['submit'])){
$sql = "UPDATE data_hadir SET sakit_smt5='$sakit_smt5', izin_smt5='$izin_smt5', alpha_smt5='$alpha_smt5' WHERE id_siswa='$id_siswa'";

$result = mysqli_query($db_conn, $sql);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['pesan'] = 'Data Rekap Kehadiran Semester 5 Berhasil Diupdate !';
} 
} 

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
?>