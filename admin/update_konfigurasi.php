<?php 
session_start();
include '../database/database.php';
$id = $_POST['id'];

// ke tabel data_konfig
$pemerintah = $_POST['pemerintah'];
$dinas = $_POST['dinas'];
$sekolah = $_POST['sekolah'];
$alamat = $_POST['alamat'];
$tahun = $_POST['tahun'];
$tanggal = $_POST['cfgTanggal'].' '.$_POST['cfgJam'];
$nama_kepsek = $_POST['nama_kepsek'];
$nip_kepsek = $_POST['nip_kepsek'];

if(isset($_POST['submit'])){
$sql = "UPDATE data_konfig SET pemerintah='$pemerintah', dinas='$dinas', sekolah='$sekolah', alamat='$alamat', 
tahun='$tahun', tgl_pengumuman='$tanggal', nama_kepsek='$nama_kepsek', nip_kepsek='$nip_kepsek' WHERE id='$id'";

$result = mysqli_query($db_conn, $sql);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['pesan'] = 'Data Konfigurasi Berhasil Diupdate !';
} 
} 

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
?>