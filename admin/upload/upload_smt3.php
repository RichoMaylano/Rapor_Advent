<?php 
session_start();
include '../../database/database.php';
$id_siswa = $_POST['id_siswa'];

// ke tabel data_rapor
$agama_smt3 = $_POST['agama_smt3'];
$pkn_smt3 = $_POST['pkn_smt3'];
$indo_smt3 = $_POST['indo_smt3'];
$mtk_smt3 = $_POST['mtk_smt3'];
$ipa_smt3 = $_POST['ipa_smt3'];
$ips_smt3 = $_POST['ips_smt3'];
$inggris_smt3 = $_POST['inggris_smt3'];
$seni_smt3 = $_POST['seni_smt3'];
$pjok_smt3 = $_POST['pjok_smt3'];
$informatika_smt3 = $_POST['informatika_smt3'];
$jawa_smt3 = $_POST['jawa_smt3'];
$kesda_smt3 = $_POST['kesda_smt3'];

// ke tabel data_ekskul
$english_smt3 = $_POST['english_smt3'];
$pathfinder_smt3 = $_POST['pathfinder_smt3'];
$karawitan_smt3 = $_POST['karawitan_smt3'];

// ke tabel data_pengembangan
$bk_smt3 = $_POST['bk_smt3'];
$bible_smt3 = $_POST['bible_smt3'];

// ke table data_siswa
$wali_smt3 = $_POST['wali_smt3'];

// ke table data_rapor
$agama_smt3_tercapai = $_POST['agama_smt3_tercapai'];
$pkn_smt3_tercapai = $_POST['pkn_smt3_tercapai'];
$indo_smt3_tercapai = $_POST['indo_smt3_tercapai'];
$mtk_smt3_tercapai = $_POST['mtk_smt3_tercapai'];
$ipa_smt3_tercapai = $_POST['ipa_smt3_tercapai'];
$ips_smt3_tercapai = $_POST['ips_smt3_tercapai'];
$inggris_smt3_tercapai = $_POST['inggris_smt3_tercapai'];
$seni_smt3_tercapai = $_POST['seni_smt3_tercapai'];
$pjok_smt3_tercapai = $_POST['pjok_smt3_tercapai'];
$informatika_smt3_tercapai = $_POST['informatika_smt3_tercapai'];
$jawa_smt3_tercapai = $_POST['jawa_smt3_tercapai'];
$kesda_smt3_tercapai = $_POST['kesda_smt3_tercapai'];

$agama_smt3_tidak_tercapai = $_POST['agama_smt3_tidak_tercapai'];
$pkn_smt3_tidak_tercapai = $_POST['pkn_smt3_tidak_tercapai'];
$indo_smt3_tidak_tercapai = $_POST['indo_smt3_tidak_tercapai'];
$mtk_smt3_tidak_tercapai = $_POST['mtk_smt3_tidak_tercapai'];
$ipa_smt3_tidak_tercapai = $_POST['ipa_smt3_tidak_tercapai'];
$ips_smt3_tidak_tercapai = $_POST['ips_smt3_tidak_tercapai'];
$inggris_smt3_tidak_tercapai = $_POST['inggris_smt3_tidak_tercapai'];
$seni_smt3_tidak_tercapai = $_POST['seni_smt3_tidak_tercapai'];
$pjok_smt3_tidak_tercapai = $_POST['pjok_smt3_tidak_tercapai'];
$informatika_smt3_tidak_tercapai = $_POST['informatika_smt3_tidak_tercapai'];
$jawa_smt3_tidak_tercapai = $_POST['jawa_smt3_tidak_tercapai'];
$kesda_smt3_tidak_tercapai = $_POST['kesda_smt3_tidak_tercapai'];

if(isset($_POST['submit'])){
$sql = "UPDATE data_rapor SET agama_smt3='$agama_smt3', pkn_smt3='$pkn_smt3', indo_smt3='$indo_smt3', mtk_smt3='$mtk_smt3', 
    ipa_smt3='$ipa_smt3', ips_smt3='$ips_smt3', inggris_smt3='$inggris_smt3', seni_smt3='$seni_smt3', pjok_smt3='$pjok_smt3',
    informatika_smt3='$informatika_smt3',jawa_smt3='$jawa_smt3', kesda_smt3='$kesda_smt3' WHERE id_siswa='$id_siswa'";
$sql2 = "UPDATE data_ekskul SET english_smt3='$english_smt3', pathfinder_smt3='$pathfinder_smt3', karawitan_smt3='$karawitan_smt3' WHERE id_siswa='$id_siswa'";
$sql3 = "UPDATE data_pengembangan SET bk_smt3='$bk_smt3', bible_smt3='$bible_smt3' WHERE id_siswa='$id_siswa'";
$sql4 = "UPDATE data_siswa SET wali_smt3='$wali_smt3' WHERE id_siswa='$id_siswa'";
$sql5 = "UPDATE data_rapor SET 
            agama_smt3_tercapai='$agama_smt3_tercapai',
            agama_smt3_tidak_tercapai='$agama_smt3_tidak_tercapai', 
            pkn_smt3_tercapai='$pkn_smt3_tercapai',
            pkn_smt3_tidak_tercapai='$pkn_smt3_tidak_tercapai', 
            indo_smt3_tercapai='$indo_smt3_tercapai',
            indo_smt3_tidak_tercapai='$indo_smt3_tidak_tercapai',  
            mtk_smt3_tercapai='$mtk_smt3_tercapai',
            mtk_smt3_tidak_tercapai='$mtk_smt3_tidak_tercapai',  
            ipa_smt3_tercapai='$ipa_smt3_tercapai',
            ipa_smt3_tidak_tercapai='$ipa_smt3_tidak_tercapai',  
            ips_smt3_tercapai='$ips_smt3_tercapai',
            ips_smt3_tidak_tercapai='$ips_smt3_tidak_tercapai',  
            inggris_smt3_tercapai='$inggris_smt3_tercapai',
            inggris_smt3_tidak_tercapai='$inggris_smt3_tidak_tercapai',  
            seni_smt3_tercapai='$seni_smt3_tercapai',
            seni_smt3_tidak_tercapai='$seni_smt3_tidak_tercapai', 
            pjok_smt3_tercapai='$pjok_smt3_tercapai',
            pjok_smt3_tidak_tercapai='$pjok_smt3_tidak_tercapai', 
            informatika_smt3_tercapai='$informatika_smt3_tercapai',
            informatika_smt3_tidak_tercapai='$informatika_smt3_tidak_tercapai', 
            jawa_smt3_tercapai='$jawa_smt3_tercapai',
            jawa_smt3_tidak_tercapai='$jawa_smt3_tidak_tercapai', 
            kesda_smt3_tercapai='$kesda_smt3_tercapai',
            kesda_smt3_tidak_tercapai='$kesda_smt3_tidak_tercapai'
         WHERE id_siswa='$id_siswa'";

$result = mysqli_query($db_conn, $sql);
$result2 = mysqli_query($db_conn, $sql2);
$result3 = mysqli_query($db_conn, $sql3);
$result4 = mysqli_query($db_conn, $sql4);
$result5 = mysqli_query($db_conn, $sql5);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['pesan'] = 'Data Rapor Semester 3 Berhasil Diupdate !';
} 
} 

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
?>