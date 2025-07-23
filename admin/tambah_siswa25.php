<?php 
session_start();
include '../database/database.php';

// ke tabel data_siswa
$nama = $_POST['nama'];
$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$ttl = $_POST['ttl'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$tahun_masuk = $_POST['tahun_masuk'];

if(isset($_POST['submit'])){
$siswa = "INSERT INTO data_siswa(id_siswa, nisn, nis, nama, ttl, jk, alamat, tahun_masuk)
VALUES ('$nisn', '$nisn', '$nis', '$nama', '$ttl', '$jk', '$alamat', '$tahun_masuk')";
$result = mysqli_query($db_conn, $siswa);

$rapor = "INSERT INTO data_rapor(id_rapor, id_siswa, nama, nisn, tahun_pelajaran, tahun_masuk)
VALUES ('', '$nisn', '$nama', '$nisn', '$tahun_masuk', '$tahun_masuk')";
$result2 = mysqli_query($db_conn, $rapor);

$ekskul = "INSERT INTO data_ekskul(id_ekskul, id_siswa, nama, nisn, tahun_pelajaran)
VALUES ('', '$nisn', '$nama', '$nisn', '$tahun_masuk')";
$result3 = mysqli_query($db_conn, $ekskul);

$hadir = "INSERT INTO data_hadir(id_hadir, id_siswa, nama, nisn, tahun_pelajaran, tahun_masuk)
VALUES ('', '$nisn', '$nama', '$nisn', '$tahun_masuk', '$tahun_masuk')";
$result4 = mysqli_query($db_conn, $hadir);

$pengembangan = "INSERT INTO data_pengembangan(id_pengembangan, id_siswa, nama, nisn, tahun_pelajaran, tahun_masuk)
VALUES ('', '$nisn', '$nama', '$nisn', '$tahun_masuk', '$tahun_masuk')";
$result5 = mysqli_query($db_conn, $pengembangan);


if(!$result5){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 

// Initialize cURL session
$curl = curl_init();

// Your API credentials
$token = "EkY0lvmfw7Rm1wXtxeOn911zBj38zs3OrwrCAR2tk5RfhmFMimVELL9";
$secret_key = "PNdw91y0";

// Message details
$phone = "6285600242904";  // Recipient's phone number
$message = '*INFORMASI PENTING !*<br><br> Nama Lengkap : '.$nama.' <br> NISN : '.$nisn.' <br> Kelas : 7 <br> Tahun Ajaran : 2025/2026 <br><br> Berhasil diinputkan oleh '.$_SESSION['nama_lengkap']. ' di Aplikasi Rapor SMP Advent Surakarta.';

// Set up the API request
curl_setopt($curl, CURLOPT_URL, "https://sby.wablas.com/api/send-message?token=$token.$secret_key&phone=$phone&message=$message");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

// Execute the request
$result = curl_exec($curl);

// Check for errors
if(curl_errno($curl)) {
    $_SESSION['pesan'] = 'Request failed: ' . curl_error($curl);
}

// Close cURL session
curl_close($curl);

// Display the result
$_SESSION['pesan'] = "$result";


} 
} 

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
?>