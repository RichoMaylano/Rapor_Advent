<?php 
session_start();
include '../../database/database.php';
$id_siswa = $_POST['id_siswa'];

// ke tabel data_rapor
$agama_smt2 = $_POST['agama_smt2'];
$pkn_smt2 = $_POST['pkn_smt2'];
$indo_smt2 = $_POST['indo_smt2'];
$mtk_smt2 = $_POST['mtk_smt2'];
$ipa_smt2 = $_POST['ipa_smt2'];
$ips_smt2 = $_POST['ips_smt2'];
$inggris_smt2 = $_POST['inggris_smt2'];
$seni_smt2 = $_POST['seni_smt2'];
$pjok_smt2 = $_POST['pjok_smt2'];
$informatika_smt2 = $_POST['informatika_smt2'];
$jawa_smt2 = $_POST['jawa_smt2'];
$kesda_smt2 = $_POST['kesda_smt2'];

// ke tabel data_ekskul
$english_smt2 = $_POST['english_smt2'];
$pathfinder_smt2 = $_POST['pathfinder_smt2'];
$karawitan_smt2 = $_POST['karawitan_smt2'];

// ke tabel data_pengembangan
$bk_smt2 = $_POST['bk_smt2'];
$bible_smt2 = $_POST['bible_smt2'];

// ke table data_siswa
$wali_smt2 = $_POST['wali_smt2'];
$kenaikan_smt2 = $_POST['kenaikan_smt2'];

// ke tabel data_rapor
$agama_smt2_tercapai = $_POST['agama_smt2_tercapai'];
$pkn_smt2_tercapai = $_POST['pkn_smt2_tercapai'];
$indo_smt2_tercapai = $_POST['indo_smt2_tercapai'];
$mtk_smt2_tercapai = $_POST['mtk_smt2_tercapai'];
$ipa_smt2_tercapai = $_POST['ipa_smt2_tercapai'];
$ips_smt2_tercapai = $_POST['ips_smt2_tercapai'];
$inggris_smt2_tercapai = $_POST['inggris_smt2_tercapai'];
$seni_smt2_tercapai = $_POST['seni_smt2_tercapai'];
$pjok_smt2_tercapai = $_POST['pjok_smt2_tercapai'];
$informatika_smt2_tercapai = $_POST['informatika_smt2_tercapai'];
$jawa_smt2_tercapai = $_POST['jawa_smt2_tercapai'];
$kesda_smt2_tercapai = $_POST['kesda_smt2_tercapai'];

$agama_smt2_tidak_tercapai = $_POST['agama_smt2_tidak_tercapai'];
$pkn_smt2_tidak_tercapai = $_POST['pkn_smt2_tidak_tercapai'];
$indo_smt2_tidak_tercapai = $_POST['indo_smt2_tidak_tercapai'];
$mtk_smt2_tidak_tercapai = $_POST['mtk_smt2_tidak_tercapai'];
$ipa_smt2_tidak_tercapai = $_POST['ipa_smt2_tidak_tercapai'];
$ips_smt2_tidak_tercapai = $_POST['ips_smt2_tidak_tercapai'];
$inggris_smt2_tidak_tercapai = $_POST['inggris_smt2_tidak_tercapai'];
$seni_smt2_tidak_tercapai = $_POST['seni_smt2_tidak_tercapai'];
$pjok_smt2_tidak_tercapai = $_POST['pjok_smt2_tidak_tercapai'];
$informatika_smt2_tidak_tercapai = $_POST['informatika_smt2_tidak_tercapai'];
$jawa_smt2_tidak_tercapai = $_POST['jawa_smt2_tidak_tercapai'];
$kesda_smt2_tidak_tercapai = $_POST['kesda_smt2_tidak_tercapai'];

if(isset($_POST['submit'])){
$sql = "UPDATE data_rapor SET agama_smt2='$agama_smt2', pkn_smt2='$pkn_smt2', indo_smt2='$indo_smt2', mtk_smt2='$mtk_smt2', 
    ipa_smt2='$ipa_smt2', ips_smt2='$ips_smt2', inggris_smt2='$inggris_smt2', seni_smt2='$seni_smt2', pjok_smt2='$pjok_smt2',
    informatika_smt2='$informatika_smt2',jawa_smt2='$jawa_smt2', kesda_smt2='$kesda_smt2' WHERE id_siswa='$id_siswa'";
$sql2 = "UPDATE data_ekskul SET english_smt2='$english_smt2', pathfinder_smt2='$pathfinder_smt2', karawitan_smt2='$karawitan_smt2' WHERE id_siswa='$id_siswa'";
$sql3 = "UPDATE data_pengembangan SET bk_smt2='$bk_smt2', bible_smt2='$bible_smt2' WHERE id_siswa='$id_siswa'";
$sql4 = "UPDATE data_siswa SET wali_smt2='$wali_smt2', kenaikan_smt2='$kenaikan_smt2' WHERE id_siswa='$id_siswa'";
$sql5 = "UPDATE data_rapor SET 
            agama_smt2_tercapai='$agama_smt2_tercapai',
            agama_smt2_tidak_tercapai='$agama_smt2_tidak_tercapai', 
            pkn_smt2_tercapai='$pkn_smt2_tercapai',
            pkn_smt2_tidak_tercapai='$pkn_smt2_tidak_tercapai', 
            indo_smt2_tercapai='$indo_smt2_tercapai',
            indo_smt2_tidak_tercapai='$indo_smt2_tidak_tercapai',  
            mtk_smt2_tercapai='$mtk_smt2_tercapai',
            mtk_smt2_tidak_tercapai='$mtk_smt2_tidak_tercapai',  
            ipa_smt2_tercapai='$ipa_smt2_tercapai',
            ipa_smt2_tidak_tercapai='$ipa_smt2_tidak_tercapai',  
            ips_smt2_tercapai='$ips_smt2_tercapai',
            ips_smt2_tidak_tercapai='$ips_smt2_tidak_tercapai',  
            inggris_smt2_tercapai='$inggris_smt2_tercapai',
            inggris_smt2_tidak_tercapai='$inggris_smt2_tidak_tercapai',  
            seni_smt2_tercapai='$seni_smt2_tercapai',
            seni_smt2_tidak_tercapai='$seni_smt2_tidak_tercapai', 
            pjok_smt2_tercapai='$pjok_smt2_tercapai',
            pjok_smt2_tidak_tercapai='$pjok_smt2_tidak_tercapai', 
            informatika_smt2_tercapai='$informatika_smt2_tercapai',
            informatika_smt2_tidak_tercapai='$informatika_smt2_tidak_tercapai', 
            jawa_smt2_tercapai='$jawa_smt2_tercapai',
            jawa_smt2_tidak_tercapai='$jawa_smt2_tidak_tercapai', 
            kesda_smt2_tercapai='$kesda_smt2_tercapai',
            kesda_smt2_tidak_tercapai='$kesda_smt2_tidak_tercapai'
         WHERE id_siswa='$id_siswa'";


$result = mysqli_query($db_conn, $sql);
$result2 = mysqli_query($db_conn, $sql2);
$result3 = mysqli_query($db_conn, $sql3);
$result4 = mysqli_query($db_conn, $sql4);
$result5 = mysqli_query($db_conn, $sql5);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['pesan'] = 'Data Rapor Semester 2 Berhasil Diupdate !';
} 
} 

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
?>