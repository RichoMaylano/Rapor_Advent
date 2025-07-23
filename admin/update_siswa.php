<?php 
session_start();
include '../database/database.php';
$id_siswa = $_POST['id_siswa'];

// ke tabel data_siswa
$nisn = $_POST['nisn'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$ttl = $_POST['ttl'];
$jk = $_POST['jk'];
$alamat = $_POST['alamat'];
$tahun_masuk = $_POST['tahun_masuk'];

$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

$date = date("d-m-Y");

if(isset($_POST['submit'])){
if(!in_array($ext,$ekstensi) ) {
	header("location:index.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/images/'.$filename);
		$sql = "UPDATE data_siswa SET nisn='$nisn', nis='$nis', nama='$nama', ttl='$ttl', 
        jk='$jk', alamat='$alamat', tahun_masuk='$tahun_masuk', kelas='', foto='$xx' WHERE id_siswa='$id_siswa'";
	}else{
        $_SESSION['pesan'] = 'Profile Siswa Gagal Diupdate !';
	}
}    

$result = mysqli_query($db_conn, $sql);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['pesan'] = 'Profile Siswa Berhasil Diupdate !';
} 
} 

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
?>