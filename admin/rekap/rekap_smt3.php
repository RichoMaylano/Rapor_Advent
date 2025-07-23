<?php 
session_start();
include '../../database/database.php';
$id_siswa = $_POST['id_siswa'];

// ke tabel data_rapor
$sakit_smt3 = $_POST['sakit_smt3'];
$izin_smt3 = $_POST['izin_smt3'];
$alpha_smt3 = $_POST['alpha_smt3'];


if(isset($_POST['submit'])){
$sql = "UPDATE data_hadir SET sakit_smt3='$sakit_smt3', izin_smt3='$izin_smt3', alpha_smt3='$alpha_smt3' WHERE id_siswa='$id_siswa'";

$result = mysqli_query($db_conn, $sql);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['pesan'] = 'Data Rekap Kehadiran Semester 3 Berhasil Diupdate !';
} 
} 

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
?>