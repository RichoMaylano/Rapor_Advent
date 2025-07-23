<?php 
session_start();
include '../../database/database.php';
$id_siswa = $_POST['id_siswa'];

// ke tabel data_rapor
$agama_smt6 = $_POST['agama_smt6'];
$pkn_smt6 = $_POST['pkn_smt6'];
$indo_smt6 = $_POST['indo_smt6'];
$mtk_smt6 = $_POST['mtk_smt6'];
$ipa_smt6 = $_POST['ipa_smt6'];
$ips_smt6 = $_POST['ips_smt6'];
$inggris_smt6 = $_POST['inggris_smt6'];
$seni_smt6 = $_POST['seni_smt6'];
$pjok_smt6 = $_POST['pjok_smt6'];
$informatika_smt6 = $_POST['informatika_smt6'];
$jawa_smt6 = $_POST['jawa_smt6'];
$kesda_smt6 = $_POST['kesda_smt6'];

// ke tabel data_ekskul
$english_smt6 = $_POST['english_smt6'];
$pathfinder_smt6 = $_POST['pathfinder_smt6'];
$karawitan_smt6 = $_POST['karawitan_smt6'];

// ke tabel data_pengembangan
$bk_smt6 = $_POST['bk_smt6'];
$bible_smt6 = $_POST['bible_smt6'];

// ke table data_siswa
$wali_smt6 = $_POST['wali_smt6'];
$kenaikan_smt6 = $_POST['kenaikan_smt6'];

// ke table data_rapor
$agama_smt6_tercapai = $_POST['agama_smt6_tercapai'];
$pkn_smt6_tercapai = $_POST['pkn_smt6_tercapai'];
$indo_smt6_tercapai = $_POST['indo_smt6_tercapai'];
$mtk_smt6_tercapai = $_POST['mtk_smt6_tercapai'];
$ipa_smt6_tercapai = $_POST['ipa_smt6_tercapai'];
$ips_smt6_tercapai = $_POST['ips_smt6_tercapai'];
$inggris_smt6_tercapai = $_POST['inggris_smt6_tercapai'];
$seni_smt6_tercapai = $_POST['seni_smt6_tercapai'];
$pjok_smt6_tercapai = $_POST['pjok_smt6_tercapai'];
$informatika_smt6_tercapai = $_POST['informatika_smt6_tercapai'];
$jawa_smt6_tercapai = $_POST['jawa_smt6_tercapai'];
$kesda_smt6_tercapai = $_POST['kesda_smt6_tercapai'];

$agama_smt6_tidak_tercapai = $_POST['agama_smt6_tidak_tercapai'];
$pkn_smt6_tidak_tercapai = $_POST['pkn_smt6_tidak_tercapai'];
$indo_smt6_tidak_tercapai = $_POST['indo_smt6_tidak_tercapai'];
$mtk_smt6_tidak_tercapai = $_POST['mtk_smt6_tidak_tercapai'];
$ipa_smt6_tidak_tercapai = $_POST['ipa_smt6_tidak_tercapai'];
$ips_smt6_tidak_tercapai = $_POST['ips_smt6_tidak_tercapai'];
$inggris_smt6_tidak_tercapai = $_POST['inggris_smt6_tidak_tercapai'];
$seni_smt6_tidak_tercapai = $_POST['seni_smt6_tidak_tercapai'];
$pjok_smt6_tidak_tercapai = $_POST['pjok_smt6_tidak_tercapai'];
$informatika_smt6_tidak_tercapai = $_POST['informatika_smt6_tidak_tercapai'];
$jawa_smt6_tidak_tercapai = $_POST['jawa_smt6_tidak_tercapai'];
$kesda_smt6_tidak_tercapai = $_POST['kesda_smt6_tidak_tercapai'];

if(isset($_POST['submit'])){
$sql = "UPDATE data_rapor SET agama_smt6='$agama_smt6', pkn_smt6='$pkn_smt6', indo_smt6='$indo_smt6', mtk_smt6='$mtk_smt6', 
    ipa_smt6='$ipa_smt6', ips_smt6='$ips_smt6', inggris_smt6='$inggris_smt6', seni_smt6='$seni_smt6', pjok_smt6='$pjok_smt6',
    informatika_smt6='$informatika_smt6',jawa_smt6='$jawa_smt6', kesda_smt6='$kesda_smt6' WHERE id_siswa='$id_siswa'";
$sql2 = "UPDATE data_ekskul SET english_smt6='$english_smt6', pathfinder_smt6='$pathfinder_smt6', karawitan_smt6='$karawitan_smt6' WHERE id_siswa='$id_siswa'";
$sql3 = "UPDATE data_pengembangan SET bk_smt6='$bk_smt6', bible_smt6='$bible_smt6' WHERE id_siswa='$id_siswa'";
$sql4 = "UPDATE data_siswa SET wali_smt6='$wali_smt6', kenaikan_smt6='$kenaikan_smt6' WHERE id_siswa='$id_siswa'";
$sql5 = "UPDATE data_rapor SET 
            agama_smt6_tercapai='$agama_smt6_tercapai',
            agama_smt6_tidak_tercapai='$agama_smt6_tidak_tercapai', 
            pkn_smt6_tercapai='$pkn_smt6_tercapai',
            pkn_smt6_tidak_tercapai='$pkn_smt6_tidak_tercapai', 
            indo_smt6_tercapai='$indo_smt6_tercapai',
            indo_smt6_tidak_tercapai='$indo_smt6_tidak_tercapai',  
            mtk_smt6_tercapai='$mtk_smt6_tercapai',
            mtk_smt6_tidak_tercapai='$mtk_smt6_tidak_tercapai',  
            ipa_smt6_tercapai='$ipa_smt6_tercapai',
            ipa_smt6_tidak_tercapai='$ipa_smt6_tidak_tercapai',  
            ips_smt6_tercapai='$ips_smt6_tercapai',
            ips_smt6_tidak_tercapai='$ips_smt6_tidak_tercapai',  
            inggris_smt6_tercapai='$inggris_smt6_tercapai',
            inggris_smt6_tidak_tercapai='$inggris_smt6_tidak_tercapai',  
            seni_smt6_tercapai='$seni_smt6_tercapai',
            seni_smt6_tidak_tercapai='$seni_smt6_tidak_tercapai', 
            pjok_smt6_tercapai='$pjok_smt6_tercapai',
            pjok_smt6_tidak_tercapai='$pjok_smt6_tidak_tercapai', 
            informatika_smt6_tercapai='$informatika_smt6_tercapai',
            informatika_smt6_tidak_tercapai='$informatika_smt6_tidak_tercapai', 
            jawa_smt6_tercapai='$jawa_smt6_tercapai',
            jawa_smt6_tidak_tercapai='$jawa_smt6_tidak_tercapai', 
            kesda_smt6_tercapai='$kesda_smt6_tercapai',
            kesda_smt6_tidak_tercapai='$kesda_smt6_tidak_tercapai'
         WHERE id_siswa='$id_siswa'";

$result = mysqli_query($db_conn, $sql);
$result2 = mysqli_query($db_conn, $sql2);
$result3 = mysqli_query($db_conn, $sql3);
$result4 = mysqli_query($db_conn, $sql4);
$result5 = mysqli_query($db_conn, $sql5);
if(!$result){ 
   die('Could not update data: '.  mysqli_error()); 
} else{ 
    $_SESSION['pesan'] = 'Data Rapor Semester 6 Berhasil Diupdate !';
} 
} 

$referer = $_SERVER['HTTP_REFERER'];
header("Location: $referer");
?>