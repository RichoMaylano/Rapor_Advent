<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: ../");
  exit(); // Terminate script execution after the redirect
}
?>

<html>
  <head>
    <!-- Favicon -->
 <link rel="icon" type="../../assets/Sneat/image/x-icon" href="../../assets/Sneat/assets/img/favicon/favicon.ico" />
   
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php 
    include "../../phpqrcode/qrlib.php";
	include('../../database/database.php');
    $nisn = $_GET['nisn'];
    $a = mysqli_query($db_conn,"SELECT * FROM data_siswa WHERE nisn='$nisn'");
    $siswa = mysqli_fetch_array($a);
    ?>
    <title>Cetak Rapor Semester 1 - <?php echo $siswa['nama'];?> - <?php echo $siswa['nis'];?></title>
<style>
    @media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
}
</style>

<style type="text/css">
body{
	font-family: Times New Roman;
}

</style>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div><button class="no-print" style="height:40px;" onclick="window.print();"><i class="fa fa-download"></i>&nbspCetak Rapor Semester 1</button></div>
<?php
// 	include "../phpqrcode/qrlib.php";
// 	include('../database.php');
	$que = mysqli_query($db_conn, "SELECT * FROM data_konfig");
	$hsl = mysqli_fetch_array($que);
	
	$nisn = $_GET['nisn'];
  
  $query_ekskul = "SELECT * FROM data_ekskul WHERE nisn = '$nisn'";
        // Melakukan query ke database
        $result_ekskul = mysqli_query($db_conn, $query_ekskul);
        // Cek jika query berhasil
        if (!$result_ekskul) {
            die("Query Error: " . mysqli_error($db_conn));
        }
        $ekskul = mysqli_fetch_assoc($result_ekskul);

      $query_pengembangan = "SELECT * FROM data_pengembangan WHERE nisn = '$nisn'";
        // Melakukan query ke database
        $result_pengembangan = mysqli_query($db_conn, $query_pengembangan);
        // Cek jika query berhasil
        if (!$result_pengembangan) {
            die("Query Error: " . mysqli_error($db_conn));
        }
        $pengembangan = mysqli_fetch_assoc($result_pengembangan);
        
  
	//$q = mysqli_query("SELECT * FROM data_siswa where noujian = '$noujian'");
	$q = mysqli_query($db_conn,"SELECT * FROM data_rapor WHERE nisn='$nisn'");
	if(mysqli_num_rows($q) > 0){
				$data = mysqli_fetch_array($q);
	
//	while($r = mysql_fetch_array($q))
//	{
  echo '<table width="800" align="center" border="0">
			<tbody>
				<tr>
					<td style="width: 90px;" align="center" rowspan="4"><img src="../../logo_advent.png" alt=""  height="100px" /></td>
				</tr>
				<tr>
					<td style="text-align: center;font-size:22px;"><b>'.$hsl['dinas'].' <br> '.$hsl['sekolah'].' SURAKARTA</b> </td>
				</tr>
				<tr>
					<td style="text-align: center;font-size:13px;">'.$hsl['alamat'].' <br> Telepon (0271) 633316 Surat Elektronik sekolahadvent.surakarta@gmail.com</td>
				</tr>
			</tbody>
		</table>
		<hr width="800" style="height:5px;color:black;background-color:black;">	';
			
	echo '<table border="0" width="800" align="center">';
  
   echo '<tr>
    <td colspan="4" style="font-size:18px;"><div align="center">
      <p><b>PENCAPAIAN KOMPETENSI PESERTA DIDIK</b>
    </div></td>
  </tr>
  </table>';

  echo '<table border="0" width="800" align="center">
  <tr><br>
  <td width="100" height="15px">Nama</td>
  <td width="400" height="15px">: '.strtoupper($data['nama']).'</td>
  <td width="150" height="15px">Kelas</td>
  <td width="100" height="15px">: VII</td>
  </tr>
  
  <tr>
  <td height="15px">NISN</td>
  <td height="15px">: '.strtoupper($data['nisn']).'</td>
  <td height="15px">Fase</td>
  <td height="15px">: D</td>
  </tr>
  
  <tr>
  <td height="15px">Sekolah</td>
  <td height="15px">: SMP Advent Surakarta</td>
  <td height="15px">Semester</td>
  <td height="15px">: Gasal</td>
  </tr>
  
  <tr>
  <td height="15px">Alamat</td>
  <td height="15px">: Jl. Pratanggapati 53 Ngemingan Surakarta</td>
  <td height="15px">Tahun Pelajaran</td>
  <td height="15px">: '.$data['tahun_masuk'].'
</td>
  </tr>
 </table>';
  
   echo '<table border="0" width="800" align="center">
   
  </table>';
  
  echo '<table style="border-collapse:collapse;" border="1" width="800" align="center">
  <tr style="background-color:#ffbbb8; font-weight:bold;"><br>
  <td width="50" height="50px" align="center">No.</td>
  <td width="250" height="50px" align="center">Mata Pelajaran</td>
  <td width="100" height="50px" align="center">Nilai <br> Akhir</td>
  <td width="5" height="50px" align="center"></td>
  <td width="395" height="50px" align="center" style="border-left:hidden;">Capaian Kompetensi</td>
  </tr>
  
  <tr>
  <td rowspan="2" align="center">1.</td>
  <td rowspan="2">&nbsp Pendidikan Agama dan <br> &nbsp Budi Pekerti</td>
  <td rowspan="2" align="center">'.$data['agama_smt1'].'</td>
  <td align="center" style="border-right:hidden;"></td>
  <td>';
    if($data['agama_smt1'] > 70){
      echo 'Menunjukkan Penguasaan dalam materi '.$data['agama_smt1_tercapai'].'';
    } else {
      echo 'Perlu Bimbingan dalam materi '.$data['agama_smt1_tercapai'].'';
    }
  echo '</td>
  </tr>
  <tr>
  <td style="border-right:hidden;"></td>
  <td>Perlu Bimbingan dalam materi '.$data['agama_smt1_tidak_tercapai'].'</td>
  </tr>
  
  <tr>
  <td rowspan="2" align="center">2.</td>
  <td rowspan="2">&nbsp Pendidikan Pancasila dan <br> &nbsp Kewarganegaraan</td>
  <td rowspan="2" align="center">'.$data['pkn_smt1'].'</td>
  <td align="center" style="border-right:hidden;"></td>
  <td>';
    if($data['pkn_smt1'] > 70){
      echo 'Menunjukkan Penguasaan dalam materi '.$data['pkn_smt1_tercapai'].'';
    } else {
      echo 'Perlu Bimbingan dalam materi '.$data['pkn_smt1_tercapai'].'';
    }
  echo '</td>
  </tr>
  <tr>
  <td style="border-right:hidden;"></td>
  <td>Perlu Bimbingan dalam materi '.$data['pkn_smt1_tidak_tercapai'].'</td>
  </tr>
  
  <tr>
  <td rowspan="2" align="center">3.</td>
  <td rowspan="2">&nbsp Bahasa Indonesia</td>
  <td rowspan="2" align="center">'.$data['indo_smt1'].'</td>
  <td align="center" style="border-right:hidden;"></td>
  <td>';
    if($data['indo_smt1'] > 70){
      echo 'Menunjukkan Penguasaan dalam materi '.$data['indo_smt1_tercapai'].'';
    } else {
      echo 'Perlu Bimbingan dalam materi '.$data['indo_smt1_tercapai'].'';
    }
  echo '</td>
  </tr>
  <tr>
  <td style="border-right:hidden;"></td>
  <td>Perlu Bimbingan dalam materi '.$data['indo_smt1_tidak_tercapai'].'</td>
  </tr>
  
  <tr>
  <td rowspan="2" align="center">4.</td>
  <td rowspan="2">&nbsp Matematika</td>
  <td rowspan="2" align="center">'.$data['mtk_smt1'].'</td>
  <td align="center" style="border-right:hidden;"></td>
  <td>';
    if($data['mtk_smt1'] > 70){
      echo 'Menunjukkan Penguasaan dalam materi '.$data['mtk_smt1_tercapai'].'';
    } else {
      echo 'Perlu Bimbingan dalam materi '.$data['mtk_smt1_tercapai'].'';
    }
  echo '</td>
  </tr>
  <tr>
  <td style="border-right:hidden;"></td>
  <td>Perlu Bimbingan dalam materi '.$data['mtk_smt1_tidak_tercapai'].'</td>
  </tr>
  
  <tr>
  <td rowspan="2" align="center">5.</td>
  <td rowspan="2">&nbsp Ilmu Pengetahuan Alam</td>
  <td rowspan="2" align="center">'.$data['ipa_smt1'].'</td>
  <td align="center" style="border-right:hidden;"></td>
  <td>';
    if($data['ipa_smt1'] > 70){
      echo 'Menunjukkan Penguasaan dalam materi '.$data['ipa_smt1_tercapai'].'';
    } else {
      echo 'Perlu Bimbingan dalam materi '.$data['ipa_smt1_tercapai'].'';
    }
  echo '</td>
  </tr>
  <tr>
  <td style="border-right:hidden;"></td>
  <td>Perlu Bimbingan dalam materi '.$data['ipa_smt1_tidak_tercapai'].'</td>
  </tr>
  
  <tr>
  <td rowspan="2" align="center">6.</td>
  <td rowspan="2">&nbsp Ilmu Pengetahuan Sosial</td>
  <td rowspan="2" align="center">'.$data['ips_smt1'].'</td>
  <td align="center" style="border-right:hidden;"></td>
  <td>';
    if($data['ips_smt1'] > 70){
      echo 'Menunjukkan Penguasaan dalam materi '.$data['ips_smt1_tercapai'].'';
    } else {
      echo 'Perlu Bimbingan dalam materi '.$data['ips_smt1_tercapai'].'';
    }
  echo '</td>
  </tr>
  <tr>
  <td style="border-right:hidden;"></td>
  <td>Perlu Bimbingan dalam materi '.$data['ips_smt1_tidak_tercapai'].'</td>
  </tr>
  
  <tr>
  <td rowspan="2" align="center">7.</td>
  <td rowspan="2">&nbsp Bahasa Inggris</td>
  <td rowspan="2" align="center">'.$data['inggris_smt1'].'</td>
  <td align="center" style="border-right:hidden;"></td>
  <td>';
    if($data['inggris_smt1'] > 70){
      echo 'Menunjukkan Penguasaan dalam materi <i>'.$data['inggris_smt1_tercapai'].'</i>';
    } else {
      echo 'Perlu Bimbingan dalam materi <i>'.$data['inggris_smt1_tercapai'].'</i>';
    }
  echo '</td>
  </tr>
  <tr>
  <td style="border-right:hidden;"></td>
  <td>Perlu Bimbingan dalam materi <i>'.$data['inggris_smt1_tidak_tercapai'].'</i></td>
  </tr>
  
  <tr>
  <td rowspan="2" align="center">8.</td>
  <td rowspan="2">&nbsp Seni</td>
  <td rowspan="2" align="center">'.$data['seni_smt1'].'</td>
  <td align="center" style="border-right:hidden;"></td>
  <td>';
    if($data['seni_smt1'] > 70){
      echo 'Menunjukkan Penguasaan dalam materi '.$data['seni_smt1_tercapai'].'';
    } else {
      echo 'Perlu Bimbingan dalam materi '.$data['seni_smt1_tercapai'].'';
    }
  echo '</td>
  </tr>
  <tr>
  <td style="border-right:hidden;"></td>
  <td>Perlu Bimbingan dalam materi '.$data['seni_smt1_tidak_tercapai'].'</td>
  </tr>
  
  <tr>
  <td rowspan="2" align="center">9.</td>
  <td rowspan="2">&nbsp Pendidikan Jasmani, Olahraga <br> &nbsp dan Kesehatan</td>
  <td rowspan="2" align="center">'.$data['pjok_smt1'].'</td>
  <td align="center" style="border-right:hidden;"></td>
  <td>';
    if($data['pjok_smt1'] > 70){
      echo 'Menunjukkan Penguasaan dalam materi '.$data['pjok_smt1_tercapai'].'';
    } else {
      echo 'Perlu Bimbingan dalam materi '.$data['pjok_smt1_tercapai'].'';
    }
  echo '</td>
  </tr>
  <tr>
  <td style="border-right:hidden;"></td>
  <td>Perlu Bimbingan dalam materi '.$data['pjok_smt1_tidak_tercapai'].'</td>
  </tr>
  
  <tr>
  <td rowspan="2" align="center">10.</td>
  <td rowspan="2">&nbsp Informatika</td>
  <td rowspan="2" align="center">'.$data['informatika_smt1'].'</td>
  <td align="center" style="border-right:hidden;"></td>
  <td>';
    if($data['informatika_smt1'] > 70){
      echo 'Menunjukkan Penguasaan dalam materi '.$data['informatika_smt1_tercapai'].'';
    } else {
      echo 'Perlu Bimbingan dalam materi '.$data['informatika_smt1_tercapai'].'';
    }
  echo '</td>
  </tr>
  <tr>
  <td style="border-right:hidden;"></td>
  <td>Perlu Bimbingan dalam materi '.$data['informatika_smt1_tidak_tercapai'].'</td>
  </tr>
  
  <tr>
  <td rowspan="2" align="center">11.</td>
  <td rowspan="2">&nbsp Bahasa Jawa</td>
  <td rowspan="2" align="center">'.$data['jawa_smt1'].'</td>
  <td align="center" style="border-right:hidden;"></td>
  <td>';
    if($data['jawa_smt1'] > 70){
      echo 'Menunjukkan Penguasaan dalam materi '.$data['jawa_smt1_tercapai'].'';
    } else {
      echo 'Perlu Bimbingan dalam materi '.$data['jawa_smt1_tercapai'].'';
    }
  echo '</td>
  </tr>
  <tr>
  <td style="border-right:hidden;"></td>
  <td>Perlu Bimbingan dalam materi '.$data['jawa_smt1_tidak_tercapai'].'</td>
  </tr>
  
  <tr>
  <td rowspan="2" align="center">12.</td>
  <td rowspan="2">&nbsp Kesenian Daerah</td>
  <td rowspan="2" align="center">'.$data['kesda_smt1'].'</td>
  <td align="center" style="border-right:hidden;"></td>
  <td>';
    if($data['kesda_smt1'] > 70){
      echo 'Menunjukkan Penguasaan dalam materi '.$data['kesda_smt1_tercapai'].'';
    } else {
      echo 'Perlu Bimbingan dalam materi '.$data['kesda_smt1_tercapai'].'';
    }
  echo '</td>
  </tr>
  <tr>
  <td style="border-right:hidden;"></td>
  <td style="page-break-after: always;">Perlu Bimbingan dalam materi '.$data['kesda_smt1_tidak_tercapai'].'</td>
  </tr>
  
 </table>';

 echo '
 <table width="800" align="center" border="0" >
 <tbody>
   <tr><br>
    <td width="300" colspan="2" style="font-size:18px;"><b>EKTRAKURIKULER</b></td>
    <td width="200"></td>
    <td width="300"></td>
   </tr>
   </tbody>
</table>
  
<table width="800" align="center" border="1" style="border-collapse:collapse;">
   <tr style="background-color:#ffbbb8; font-weight:bold;">
    <td width="50" align="center" height="30">No.</td>
    <td width="2" align="center" height="30" style="border-right:hidden;"></td>
    <td width="250" align="center">Jenis Kegiatan</td>
    <td width="2" align="center" height="30" style="border-right:hidden;"></td>
    <td colspan="2" align="center">Keterangan</td>
   </tr>
   
   <tr>
    <td align="center">1.</td>
    <td style="border-right:hidden;"></td>
    <td>English Conversation</td>
    <td style="border-right:hidden;"></td>
    <td colspan="2">'.$ekskul['english_smt1'].' dalam memahami materi Greeting and Vocabulary dan menjawab pertanyaan dengan Bahasa Inggris.</td>
   </tr>
   
   <tr>
    <td align="center">2.</td>
    <td style="border-right:hidden;"></td>
    <td>Pathfinder</td>
    <td style="border-right:hidden;"></td>
    <td colspan="2">'.$ekskul['pathfinder_smt1'].' dalam mengikuti kegiatan Pathfinder, aktif dan disiplin dalam mengerjakan tugas serta bertanggung jawab.</td>
   </tr>
   
   <tr>
    <td align="center">3.</td>
    <td style="border-right:hidden;"></td>
    <td>Karawitan</td>
    <td style="border-right:hidden;"></td>
    <td colspan="2">'.$ekskul['karawitan_smt1'].' dalam penguasaan irama. '.$ekskul['karawitan_smt1'].' dalam menerapkan teknik tabuhan gending bentuk lancaran. </td>
   </tr>
 </tbody>
</table>';
  

echo '
<table width="800" align="center" border="0" >
<tbody>
  <tr><br>
   <td width="300" colspan="2" style="font-size:18px;"><b>PENGEMBANGAN DIRI</b></td>
   <td width="200"></td>
   <td width="300"></td>
  </tr>
  </tbody>
</table>
 
<table width="800" align="center" border="1" style="border-collapse:collapse;">
  <tr style="background-color:#ffbbb8; font-weight:bold;">
   <td width="50" align="center" height="30">No.</td>
   <td width="2" align="center" height="30" style="border-right:hidden;"></td>
   <td width="250" align="center">Jenis Kegiatan</td>
   <td width="2" align="center" height="30" style="border-right:hidden;"></td>
   <td colspan="2" align="center">Keterangan</td>
  </tr>
  
  <tr>
   <td align="center">1.</td>
   <td style="border-right:hidden;"></td>
   <td>Bimbingan & Konseling</td>
   <td style="border-right:hidden;"></td>
   <td colspan="2">'.$pengembangan['bk_smt1'].' dalam mengetahui bakat dan minatnya, mampu merencanakan kegiatan untuk pencapaian tujuannya, '.$pengembangan['bk_smt1'].' dalam bersikap dan berperilaku sopan santun di sekolah.</td>
  </tr>
  
  <tr>
   <td align="center">2.</td>
   <td style="border-right:hidden;"></td>
   <td>Follow The Bible</td>
   <td style="border-right:hidden;"></td>
   <td colspan="2">'.$pengembangan['bible_smt1'].' dalam mengikuti Follow The Bible, '.$pengembangan['bible_smt1'].' dalam menafsirkan bacaan dan aktif saat berdiskusi tentang topik yang didiskusikan dari buku Penemuan Baru.</td>
  </tr>
  
</tbody>
</table>';

$sql_query = mysqli_query($db_conn, "SELECT * FROM data_hadir WHERE nisn='$nisn'");
	$hadir = mysqli_fetch_array($sql_query);

echo '
<table width="800" align="center" border="0" >
<tbody>
  <tr><br>
   <td width="300" colspan="2" style="font-size:18px;"><b>KETIDAKHADIRAN</b></td>
   <td width="200"></td>
   <td width="300"></td>
  </tr>
  </tbody>
</table>
 
<table width="800" align="center" border="1" style="border-collapse:collapse;">
  <tr>
  <td width="2" style="border-right:hidden;"></td>
  <td height="30" width="200" style="border-right:hidden;">Sakit</td>
  <td width="10" align="center" style="border-right:hidden;">:</td>
  <td width="40" align="center" style="border-right:hidden;">'.$hadir['sakit_smt1'].'</td>
  <td width="70" align="center">hari</td>
  <td style="border-right:hidden; border-top:hidden;"></td>
  </tr>
  
  <tr>
  <td width="2" style="border-right:hidden;"></td>
  <td height="30" width="200" style="border-right:hidden;">Izin</td>
  <td width="10" align="center" style="border-right:hidden;">:</td>
  <td width="40" align="center" style="border-right:hidden;">'.$hadir['izin_smt1'].'</td>
  <td width="70" align="center">hari</td>
  <td style="border-right:hidden; border-top:hidden;"></td>
  </tr>
  
  <tr>
  <td width="2" style="border-right:hidden;"></td>
  <td height="30" width="200" style="border-right:hidden;">Tanpa Keterangan</td>
  <td width="10" align="center" style="border-right:hidden;">:</td>
  <td width="40" align="center" style="border-right:hidden;">'.$hadir['alpha_smt1'].'</td>
  <td width="70" align="center">hari</td>
  <td style="border-right:hidden; border-top:hidden; border-bottom:hidden;"></td>
  </tr>
  
</tbody>
</table>';

echo '
<table width="800" align="center" border="0" >
<tbody>
  <tr><br><br>
   <td width="300" colspan="2" style="font-size:18px;"></td>
   <td width="200"></td>
   <td width="300"></td>
  </tr>
  </tbody>
</table>
 
<table width="800" align="center" border="0">
  <tr>
  <td height="20" width="250"></td>
  <td></td>
  <td width="250" align="center">Surakarta, 20 Desember 2024</td>
  </tr>

  <tr>
  <td height="20" width="250">Orang Tua/Wali</td>
  <td></td>
  <td width="250" align="center">a/n Kepala Sekolah</td>
  </tr>

  <tr>
  <td height="70" width="250"></td>
  <td></td>
  <td width="250" align="center"></td>
  </tr>

  <tr>
  <td height="20" width="250">...............................................</td>
  <td></td>
  <td width="250" align="center">'.$siswa['wali_smt1'].'</td>
  </tr>
  
</tbody>
</table>';
  }
?>
</body>
</html>