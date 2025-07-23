<?php 
session_start();
include '../database/database.php';
$nisn = $_POST['nisn'];

// ke tabel data_konfig
$nama_lengkap = $_POST['nama_lengkap'];
$nisn = $_POST['nisn'];
$username = $_POST['username'];
$role = $_POST['role'];

if(isset($_POST['submit'])){
$sql = "UPDATE data_admin SET nama_lengkap='$nama_lengkap', nisn='$nisn', username='$username', role='$role' WHERE nisn='$nisn'";

$result = mysqli_query($db_conn, $sql);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    
// Initialize cURL session
$curl = curl_init();

// Your API credentials
$token = "EkY0lvmfw7Rm1wXtxeOn911zBj38zs3OrwrCAR2tk5RfhmFMimVELL9";
$secret_key = "PNdw91y0";

// Message details
$phone = "6285600242904";  // Recipient's phone number
$message = '*INFORMASI PENTING !*<br><br> Nama : '.$nama_lengkap.' <br> Jabatan : '.$role.' <br> Kelas : 7 <br> Tahun Ajaran : 2025/2026 <br><br> Kepada Wali Kelas yang bersangkutan silahkan menginputkan nilai Rapor di Aplikasi Rapor SMP Advent Surakarta <br><br> Admin -'.$_SESSION['nama_lengkap'].'- ';

// Set up the API request
curl_setopt($curl, CURLOPT_URL, "https://sby.wablas.com/api/send-message?token=$token.$secret_key&phone=$phone&message=$message");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

// Execute the request
$result = curl_exec($curl);

// Check for errors
if(curl_errno($curl)) {
    $_SESSION['pesan'] = 'Terdapat kesalahan saat mengirimkan notifikasi pesan Whatsapp';
}

// Close cURL session
curl_close($curl);

// Display the result
$_SESSION['pesan'] = 'Berhasil mengirimkan notifikasi pesan Whatsapp !';

} 
} 

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
?>