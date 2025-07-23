<?php 
session_start();
include '../../database/database.php';
$id_siswa = $_POST['id_siswa'];

// ke tabel data_rapor
$agama_smt1 = $_POST['agama_smt1'];
$pkn_smt1 = $_POST['pkn_smt1'];
$indo_smt1 = $_POST['indo_smt1'];
$mtk_smt1 = $_POST['mtk_smt1'];
$ipa_smt1 = $_POST['ipa_smt1'];
$ips_smt1 = $_POST['ips_smt1'];
$inggris_smt1 = $_POST['inggris_smt1'];
$seni_smt1 = $_POST['seni_smt1'];
$pjok_smt1 = $_POST['pjok_smt1'];
$informatika_smt1 = $_POST['informatika_smt1'];
$jawa_smt1 = $_POST['jawa_smt1'];
$kesda_smt1 = $_POST['kesda_smt1'];

// ke tabel data_ekskul
$english_smt1 = $_POST['english_smt1'];
$pathfinder_smt1 = $_POST['pathfinder_smt1'];
$karawitan_smt1 = $_POST['karawitan_smt1'];

// ke tabel data_pengembangan
$bk_smt1 = $_POST['bk_smt1'];
$bible_smt1 = $_POST['bible_smt1'];

// ke table data_siswa
$wali_smt1 = $_POST['wali_smt1'];

// ke tabel data_rapor
$agama_smt1_tercapai = $_POST['agama_smt1_tercapai'];
$pkn_smt1_tercapai = $_POST['pkn_smt1_tercapai'];
$indo_smt1_tercapai = $_POST['indo_smt1_tercapai'];
$mtk_smt1_tercapai = $_POST['mtk_smt1_tercapai'];
$ipa_smt1_tercapai = $_POST['ipa_smt1_tercapai'];
$ips_smt1_tercapai = $_POST['ips_smt1_tercapai'];
$inggris_smt1_tercapai = $_POST['inggris_smt1_tercapai'];
$seni_smt1_tercapai = $_POST['seni_smt1_tercapai'];
$pjok_smt1_tercapai = $_POST['pjok_smt1_tercapai'];
$informatika_smt1_tercapai = $_POST['informatika_smt1_tercapai'];
$jawa_smt1_tercapai = $_POST['jawa_smt1_tercapai'];
$kesda_smt1_tercapai = $_POST['kesda_smt1_tercapai'];

$agama_smt1_tidak_tercapai = $_POST['agama_smt1_tidak_tercapai'];
$pkn_smt1_tidak_tercapai = $_POST['pkn_smt1_tidak_tercapai'];
$indo_smt1_tidak_tercapai = $_POST['indo_smt1_tidak_tercapai'];
$mtk_smt1_tidak_tercapai = $_POST['mtk_smt1_tidak_tercapai'];
$ipa_smt1_tidak_tercapai = $_POST['ipa_smt1_tidak_tercapai'];
$ips_smt1_tidak_tercapai = $_POST['ips_smt1_tidak_tercapai'];
$inggris_smt1_tidak_tercapai = $_POST['inggris_smt1_tidak_tercapai'];
$seni_smt1_tidak_tercapai = $_POST['seni_smt1_tidak_tercapai'];
$pjok_smt1_tidak_tercapai = $_POST['pjok_smt1_tidak_tercapai'];
$informatika_smt1_tidak_tercapai = $_POST['informatika_smt1_tidak_tercapai'];
$jawa_smt1_tidak_tercapai = $_POST['jawa_smt1_tidak_tercapai'];
$kesda_smt1_tidak_tercapai = $_POST['kesda_smt1_tidak_tercapai'];



if(isset($_POST['submit'])){
$sql = "UPDATE data_rapor SET agama_smt1='$agama_smt1', pkn_smt1='$pkn_smt1', indo_smt1='$indo_smt1', mtk_smt1='$mtk_smt1', 
    ipa_smt1='$ipa_smt1', ips_smt1='$ips_smt1', inggris_smt1='$inggris_smt1', seni_smt1='$seni_smt1', pjok_smt1='$pjok_smt1',
    informatika_smt1='$informatika_smt1',jawa_smt1='$jawa_smt1', kesda_smt1='$kesda_smt1' WHERE id_siswa='$id_siswa'";
$sql2 = "UPDATE data_ekskul SET english_smt1='$english_smt1', pathfinder_smt1='$pathfinder_smt1', karawitan_smt1='$karawitan_smt1' WHERE id_siswa='$id_siswa'";
$sql3 = "UPDATE data_pengembangan SET bk_smt1='$bk_smt1', bible_smt1='$bible_smt1' WHERE id_siswa='$id_siswa'";
$sql4 = "UPDATE data_siswa SET wali_smt1='$wali_smt1' WHERE id_siswa='$id_siswa'";
$sql5 = "UPDATE data_rapor SET 
            agama_smt1_tercapai='$agama_smt1_tercapai',
            agama_smt1_tidak_tercapai='$agama_smt1_tidak_tercapai', 
            pkn_smt1_tercapai='$pkn_smt1_tercapai',
            pkn_smt1_tidak_tercapai='$pkn_smt1_tidak_tercapai', 
            indo_smt1_tercapai='$indo_smt1_tercapai',
            indo_smt1_tidak_tercapai='$indo_smt1_tidak_tercapai',  
            mtk_smt1_tercapai='$mtk_smt1_tercapai',
            mtk_smt1_tidak_tercapai='$mtk_smt1_tidak_tercapai',  
            ipa_smt1_tercapai='$ipa_smt1_tercapai',
            ipa_smt1_tidak_tercapai='$ipa_smt1_tidak_tercapai',  
            ips_smt1_tercapai='$ips_smt1_tercapai',
            ips_smt1_tidak_tercapai='$ips_smt1_tidak_tercapai',  
            inggris_smt1_tercapai='$inggris_smt1_tercapai',
            inggris_smt1_tidak_tercapai='$inggris_smt1_tidak_tercapai',  
            seni_smt1_tercapai='$seni_smt1_tercapai',
            seni_smt1_tidak_tercapai='$seni_smt1_tidak_tercapai', 
            pjok_smt1_tercapai='$pjok_smt1_tercapai',
            pjok_smt1_tidak_tercapai='$pjok_smt1_tidak_tercapai', 
            informatika_smt1_tercapai='$informatika_smt1_tercapai',
            informatika_smt1_tidak_tercapai='$informatika_smt1_tidak_tercapai', 
            jawa_smt1_tercapai='$jawa_smt1_tercapai',
            jawa_smt1_tidak_tercapai='$jawa_smt1_tidak_tercapai', 
            kesda_smt1_tercapai='$kesda_smt1_tercapai',
            kesda_smt1_tidak_tercapai='$kesda_smt1_tidak_tercapai'
         WHERE id_siswa='$id_siswa'";

$result = mysqli_query($db_conn, $sql);
$result2 = mysqli_query($db_conn, $sql2);
$result3 = mysqli_query($db_conn, $sql3);
$result4 = mysqli_query($db_conn, $sql4);
$result5 = mysqli_query($db_conn, $sql5);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['pesan'] = 'Data Rapor Semester 1 Berhasil Diupdate !';
} 
} 

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
?>