<?php 
session_start();
include '../../database/database.php';
$id_siswa = $_POST['id_siswa'];

// ke tabel data_rapor
$agama_smt4 = $_POST['agama_smt4'];
$pkn_smt4 = $_POST['pkn_smt4'];
$indo_smt4 = $_POST['indo_smt4'];
$mtk_smt4 = $_POST['mtk_smt4'];
$ipa_smt4 = $_POST['ipa_smt4'];
$ips_smt4 = $_POST['ips_smt4'];
$inggris_smt4 = $_POST['inggris_smt4'];
$seni_smt4 = $_POST['seni_smt4'];
$pjok_smt4 = $_POST['pjok_smt4'];
$informatika_smt4 = $_POST['informatika_smt4'];
$jawa_smt4 = $_POST['jawa_smt4'];
$kesda_smt4 = $_POST['kesda_smt4'];

// ke tabel data_ekskul
$english_smt4 = $_POST['english_smt4'];
$pathfinder_smt4 = $_POST['pathfinder_smt4'];
$karawitan_smt4 = $_POST['karawitan_smt4'];

// ke tabel data_pengembangan
$bk_smt4 = $_POST['bk_smt4'];
$bible_smt4 = $_POST['bible_smt4'];

// ke table data_siswa
$wali_smt4 = $_POST['wali_smt4'];
$kenaikan_smt4 = $_POST['kenaikan_smt4'];

// ke table data_rapor
$agama_smt4_tercapai = $_POST['agama_smt4_tercapai'];
$pkn_smt4_tercapai = $_POST['pkn_smt4_tercapai'];
$indo_smt4_tercapai = $_POST['indo_smt4_tercapai'];
$mtk_smt4_tercapai = $_POST['mtk_smt4_tercapai'];
$ipa_smt4_tercapai = $_POST['ipa_smt4_tercapai'];
$ips_smt4_tercapai = $_POST['ips_smt4_tercapai'];
$inggris_smt4_tercapai = $_POST['inggris_smt4_tercapai'];
$seni_smt4_tercapai = $_POST['seni_smt4_tercapai'];
$pjok_smt4_tercapai = $_POST['pjok_smt4_tercapai'];
$informatika_smt4_tercapai = $_POST['informatika_smt4_tercapai'];
$jawa_smt4_tercapai = $_POST['jawa_smt4_tercapai'];
$kesda_smt4_tercapai = $_POST['kesda_smt4_tercapai'];

$agama_smt4_tidak_tercapai = $_POST['agama_smt4_tidak_tercapai'];
$pkn_smt4_tidak_tercapai = $_POST['pkn_smt4_tidak_tercapai'];
$indo_smt4_tidak_tercapai = $_POST['indo_smt4_tidak_tercapai'];
$mtk_smt4_tidak_tercapai = $_POST['mtk_smt4_tidak_tercapai'];
$ipa_smt4_tidak_tercapai = $_POST['ipa_smt4_tidak_tercapai'];
$ips_smt4_tidak_tercapai = $_POST['ips_smt4_tidak_tercapai'];
$inggris_smt4_tidak_tercapai = $_POST['inggris_smt4_tidak_tercapai'];
$seni_smt4_tidak_tercapai = $_POST['seni_smt4_tidak_tercapai'];
$pjok_smt4_tidak_tercapai = $_POST['pjok_smt4_tidak_tercapai'];
$informatika_smt4_tidak_tercapai = $_POST['informatika_smt4_tidak_tercapai'];
$jawa_smt4_tidak_tercapai = $_POST['jawa_smt4_tidak_tercapai'];
$kesda_smt4_tidak_tercapai = $_POST['kesda_smt4_tidak_tercapai'];

if(isset($_POST['submit'])){
$sql = "UPDATE data_rapor SET agama_smt4='$agama_smt4', pkn_smt4='$pkn_smt4', indo_smt4='$indo_smt4', mtk_smt4='$mtk_smt4', 
    ipa_smt4='$ipa_smt4', ips_smt4='$ips_smt4', inggris_smt4='$inggris_smt4', seni_smt4='$seni_smt4', pjok_smt4='$pjok_smt4',
    informatika_smt4='$informatika_smt4',jawa_smt4='$jawa_smt4', kesda_smt4='$kesda_smt4' WHERE id_siswa='$id_siswa'";
$sql2 = "UPDATE data_ekskul SET english_smt4='$english_smt4', pathfinder_smt4='$pathfinder_smt4', karawitan_smt4='$karawitan_smt4' WHERE id_siswa='$id_siswa'";
$sql3 = "UPDATE data_pengembangan SET bk_smt4='$bk_smt4', bible_smt4='$bible_smt4' WHERE id_siswa='$id_siswa'";
$sql4 = "UPDATE data_siswa SET wali_smt4='$wali_smt4', kenaikan_smt4='$kenaikan_smt4' WHERE id_siswa='$id_siswa'";
$sql5 = "UPDATE data_rapor SET 
            agama_smt4_tercapai='$agama_smt4_tercapai',
            agama_smt4_tidak_tercapai='$agama_smt4_tidak_tercapai', 
            pkn_smt4_tercapai='$pkn_smt4_tercapai',
            pkn_smt4_tidak_tercapai='$pkn_smt4_tidak_tercapai', 
            indo_smt4_tercapai='$indo_smt4_tercapai',
            indo_smt4_tidak_tercapai='$indo_smt4_tidak_tercapai',  
            mtk_smt4_tercapai='$mtk_smt4_tercapai',
            mtk_smt4_tidak_tercapai='$mtk_smt4_tidak_tercapai',  
            ipa_smt4_tercapai='$ipa_smt4_tercapai',
            ipa_smt4_tidak_tercapai='$ipa_smt4_tidak_tercapai',  
            ips_smt4_tercapai='$ips_smt4_tercapai',
            ips_smt4_tidak_tercapai='$ips_smt4_tidak_tercapai',  
            inggris_smt4_tercapai='$inggris_smt4_tercapai',
            inggris_smt4_tidak_tercapai='$inggris_smt4_tidak_tercapai',  
            seni_smt4_tercapai='$seni_smt4_tercapai',
            seni_smt4_tidak_tercapai='$seni_smt4_tidak_tercapai', 
            pjok_smt4_tercapai='$pjok_smt4_tercapai',
            pjok_smt4_tidak_tercapai='$pjok_smt4_tidak_tercapai', 
            informatika_smt4_tercapai='$informatika_smt4_tercapai',
            informatika_smt4_tidak_tercapai='$informatika_smt4_tidak_tercapai', 
            jawa_smt4_tercapai='$jawa_smt4_tercapai',
            jawa_smt4_tidak_tercapai='$jawa_smt4_tidak_tercapai', 
            kesda_smt4_tercapai='$kesda_smt4_tercapai',
            kesda_smt4_tidak_tercapai='$kesda_smt4_tidak_tercapai'
         WHERE id_siswa='$id_siswa'";

$result = mysqli_query($db_conn, $sql);
$result2 = mysqli_query($db_conn, $sql2);
$result3 = mysqli_query($db_conn, $sql3);
$result4 = mysqli_query($db_conn, $sql4);
$result5 = mysqli_query($db_conn, $sql5);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['pesan'] = 'Data Rapor Semester 4 Berhasil Diupdate !';
} 
} 

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
?>