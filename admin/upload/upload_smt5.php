<?php 
session_start();
include '../../database/database.php';
$id_siswa = $_POST['id_siswa'];

// ke tabel data_rapor
$agama_smt5 = $_POST['agama_smt5'];
$pkn_smt5 = $_POST['pkn_smt5'];
$indo_smt5 = $_POST['indo_smt5'];
$mtk_smt5 = $_POST['mtk_smt5'];
$ipa_smt5 = $_POST['ipa_smt5'];
$ips_smt5 = $_POST['ips_smt5'];
$inggris_smt5 = $_POST['inggris_smt5'];
$seni_smt5 = $_POST['seni_smt5'];
$pjok_smt5 = $_POST['pjok_smt5'];
$informatika_smt5 = $_POST['informatika_smt5'];
$jawa_smt5 = $_POST['jawa_smt5'];
$kesda_smt5 = $_POST['kesda_smt5'];

// ke tabel data_ekskul
$english_smt5 = $_POST['english_smt5'];
$pathfinder_smt5 = $_POST['pathfinder_smt5'];
$karawitan_smt5 = $_POST['karawitan_smt5'];

// ke tabel data_pengembangan
$bk_smt5 = $_POST['bk_smt5'];
$bible_smt5 = $_POST['bible_smt5'];

// ke table data_siswa
$wali_smt5 = $_POST['wali_smt5'];

// ke table data_rapor
$agama_smt5_tercapai = $_POST['agama_smt5_tercapai'];
$pkn_smt5_tercapai = $_POST['pkn_smt5_tercapai'];
$indo_smt5_tercapai = $_POST['indo_smt5_tercapai'];
$mtk_smt5_tercapai = $_POST['mtk_smt5_tercapai'];
$ipa_smt5_tercapai = $_POST['ipa_smt5_tercapai'];
$ips_smt5_tercapai = $_POST['ips_smt5_tercapai'];
$inggris_smt5_tercapai = $_POST['inggris_smt5_tercapai'];
$seni_smt5_tercapai = $_POST['seni_smt5_tercapai'];
$pjok_smt5_tercapai = $_POST['pjok_smt5_tercapai'];
$informatika_smt5_tercapai = $_POST['informatika_smt5_tercapai'];
$jawa_smt5_tercapai = $_POST['jawa_smt5_tercapai'];
$kesda_smt5_tercapai = $_POST['kesda_smt5_tercapai'];

$agama_smt5_tidak_tercapai = $_POST['agama_smt5_tidak_tercapai'];
$pkn_smt5_tidak_tercapai = $_POST['pkn_smt5_tidak_tercapai'];
$indo_smt5_tidak_tercapai = $_POST['indo_smt5_tidak_tercapai'];
$mtk_smt5_tidak_tercapai = $_POST['mtk_smt5_tidak_tercapai'];
$ipa_smt5_tidak_tercapai = $_POST['ipa_smt5_tidak_tercapai'];
$ips_smt5_tidak_tercapai = $_POST['ips_smt5_tidak_tercapai'];
$inggris_smt5_tidak_tercapai = $_POST['inggris_smt5_tidak_tercapai'];
$seni_smt5_tidak_tercapai = $_POST['seni_smt5_tidak_tercapai'];
$pjok_smt5_tidak_tercapai = $_POST['pjok_smt5_tidak_tercapai'];
$informatika_smt5_tidak_tercapai = $_POST['informatika_smt5_tidak_tercapai'];
$jawa_smt5_tidak_tercapai = $_POST['jawa_smt5_tidak_tercapai'];
$kesda_smt5_tidak_tercapai = $_POST['kesda_smt5_tidak_tercapai'];

if(isset($_POST['submit'])){
$sql = "UPDATE data_rapor SET agama_smt5='$agama_smt5', pkn_smt5='$pkn_smt5', indo_smt5='$indo_smt5', mtk_smt5='$mtk_smt5', 
    ipa_smt5='$ipa_smt5', ips_smt5='$ips_smt5', inggris_smt5='$inggris_smt5', seni_smt5='$seni_smt5', pjok_smt5='$pjok_smt5',
    informatika_smt5='$informatika_smt5',jawa_smt5='$jawa_smt5', kesda_smt5='$kesda_smt5' WHERE id_siswa='$id_siswa'";
$sql2 = "UPDATE data_ekskul SET english_smt5='$english_smt5', pathfinder_smt5='$pathfinder_smt5', karawitan_smt5='$karawitan_smt5' WHERE id_siswa='$id_siswa'";
$sql3 = "UPDATE data_pengembangan SET bk_smt5='$bk_smt5', bible_smt5='$bible_smt5' WHERE id_siswa='$id_siswa'";
$sql4 = "UPDATE data_siswa SET wali_smt5='$wali_smt5' WHERE id_siswa='$id_siswa'";
$sql5 = "UPDATE data_rapor SET 
            agama_smt5_tercapai='$agama_smt5_tercapai',
            agama_smt5_tidak_tercapai='$agama_smt5_tidak_tercapai', 
            pkn_smt5_tercapai='$pkn_smt5_tercapai',
            pkn_smt5_tidak_tercapai='$pkn_smt5_tidak_tercapai', 
            indo_smt5_tercapai='$indo_smt5_tercapai',
            indo_smt5_tidak_tercapai='$indo_smt5_tidak_tercapai',  
            mtk_smt5_tercapai='$mtk_smt5_tercapai',
            mtk_smt5_tidak_tercapai='$mtk_smt5_tidak_tercapai',  
            ipa_smt5_tercapai='$ipa_smt5_tercapai',
            ipa_smt5_tidak_tercapai='$ipa_smt5_tidak_tercapai',  
            ips_smt5_tercapai='$ips_smt5_tercapai',
            ips_smt5_tidak_tercapai='$ips_smt5_tidak_tercapai',  
            inggris_smt5_tercapai='$inggris_smt5_tercapai',
            inggris_smt5_tidak_tercapai='$inggris_smt5_tidak_tercapai',  
            seni_smt5_tercapai='$seni_smt5_tercapai',
            seni_smt5_tidak_tercapai='$seni_smt5_tidak_tercapai', 
            pjok_smt5_tercapai='$pjok_smt5_tercapai',
            pjok_smt5_tidak_tercapai='$pjok_smt5_tidak_tercapai', 
            informatika_smt5_tercapai='$informatika_smt5_tercapai',
            informatika_smt5_tidak_tercapai='$informatika_smt5_tidak_tercapai', 
            jawa_smt5_tercapai='$jawa_smt5_tercapai',
            jawa_smt5_tidak_tercapai='$jawa_smt5_tidak_tercapai', 
            kesda_smt5_tercapai='$kesda_smt5_tercapai',
            kesda_smt5_tidak_tercapai='$kesda_smt5_tidak_tercapai'
         WHERE id_siswa='$id_siswa'";

$result = mysqli_query($db_conn, $sql);
$result2 = mysqli_query($db_conn, $sql2);
$result3 = mysqli_query($db_conn, $sql3);
$result4 = mysqli_query($db_conn, $sql4);
$result5 = mysqli_query($db_conn, $sql5);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['pesan'] = 'Data Rapor Semester 5 Berhasil Diupdate !';
} 
} 

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
?>