<?php
$title = 'Dashboard | Aplikasi Pengumuman Kelulusan';
include "header.php";
$nisn = $_SESSION['nisn'];

$query = mysqli_query($db_conn, "SELECT * FROM data_siswa WHERE nisn='$nisn'");
$data2 = mysqli_fetch_array($query);

$que = mysqli_query($db_conn, "SELECT * FROM data_konfig");
$hsl = mysqli_fetch_array($que);

$timestamp = strtotime($hsl['tgl_pengumuman']);
?>
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="col-xxl-12 mb-6 order-0">
                    <div class="d-flex align-items-start row">
                   
<div class="card mb-4">
  <div class="card-body text-center">
    <img src="../SMKN7.png" width="100px" alt="" class="mb-4">
  <h4><strong><?php echo $hsl['sekolah']; ?><br> SURAKARTA</strong></h4>
  <p>PENGUMUMAN KELULUSAN PESERTA DIDIK SMK NEGERI 7 SURAKARTA TAHUN <?php echo $data2['tahun_ajaran']?></p></td>

  </div>
</div>


	
<div class="card">
  <div class="card-body">
  <div id="clock" class="lead"></div>
		
		<div id="xpengumuman">
		<?php
		
		$hasil = mysqli_query($db_conn,"SELECT * FROM data_siswa WHERE nisn='$nisn'");
			if(mysqli_num_rows($hasil) > 0){
				$data = mysqli_fetch_array($hasil);
				
		?>
		<div class="card">
			<div class="card-header"><b>A. BIODATA SISWA</b></div>
			<div class="card-body">
			<table class="table">
				<tr>
					<td rowspan="8" width="10%"><img src="../assets/images/Foto_Siswa/<?php echo $data['nis']?>.jpg" width="150px"/>
					</td>
				</tr>
				<tr><td width=35%>Nama Siswa</td><td><?php echo $data['nama']; ?></td></tr>
				<tr><td>NISN</td><td><?php echo $data['nisn']; ?></td></tr>
				<tr><td>Konsentrasi Keahlian</td><td><?php echo $data['jurusan']; ?></td></tr>
				<tr><td>Tempat, Tanggal lahir</td><td><?php echo $data['tempat_lahir'].', '.$data['tanggal_lahir']; ?></td></tr>
				<tr><td>Nama Orang tua/Wali</td><td><?php echo $data['nama_ortu']; ?></td></tr>
				<tr><td>Jenis Kelamin</td>
				<?php if($data['jk']=='L'){?>
				<td>Laki - Laki</td>
				<?php }else if($data['jk']=='P'){?>
				<td>Perempuan</td>
				<?php }?>
			</tr>
		
			</table>
			</div>
		</div>
			<br>
			
		
			<div class="card">
				<div class="card-header"><b>B. NILAI AKADEMIK</b></div>
				<div class="card-body">
				<table class="table">
						<tr align="center"><td><b>Mata Pelajaran</b></td><td><b>Nilai rata-rata</b></td></tr>

						<!-- Kelompok Mapel Umum -->
						<tr><td style="border:none"><b>A. Kelompok Mata Pelajaran Umum</b></td></tr>
						<tr><td>1. Pendidikan Agama dan Budi Pekerti</td><td align="center"><?php echo $data['agama']; ?></td></tr>
						<tr><td>2. Pendidikan Pancasila dan Kewarganegaraan</td><td align="center"><?php echo $data['pancasila']; ?></td></tr>
						<tr><td>3. Bahasa Indonesia</td><td align="center"><?php echo $data['bhs_indo']; ?></td></tr>
						<tr><td>4. Pendidikan Jasmani, Olahraga dan Kesehatan</td><td align="center"><?php echo $data['pjok']; ?></td></tr>
						<tr><td>5. Sejarah Indonesia</td><td align="center"><?php echo $data['sejarah']; ?></td></tr>
						<tr><td>6. Seni Budaya</td><td align="center"><?php echo $data['senbud']; ?></td></tr>
						<tr><td>7. Muatan Lokal</td><td align="center"><?php echo $data['muatan_lokal']; ?></td></tr>

						<!-- Kelompok Mapel Jurusan -->
						<tr><td style="border:none"><b>B. Kelompok Mata Pelajaran Kejuruan</b></td></tr>
						<tr><td>1. Matematika</td><td align="center"><?php echo $data['matematika']; ?></td></tr>
						<tr><td>2. Bahasa Inggris</td><td align="center"><?php echo $data['bhs_inggris']; ?></td></tr>
						<tr><td>3. Informatika</td><td align="center"><?php echo $data['informatika']; ?></td></tr>
						<tr><td>4. Projek IPAS</td><td align="center"><?php echo $data['ipas']; ?></td></tr>
						<tr><td>5. Dasar-Dasar Program Keahlian</td><td align="center"><?php echo $data['dasprog']; ?></td></tr>
						<tr><td>6. Konsentrasi Keahlian</td><td align="center"><?php echo $data['keahlian']; ?></td></tr>
						<tr><td>7. Projek Kreatif dan Kewirausahaan</td><td align="center"><?php echo $data['pkk']; ?></td></tr>
						<tr><td>8. Praktik Kerja Lapangan</td><td align="center"><?php echo $data['pkl']; ?></td></tr>
						<tr><td>9. Mata Pelajaran Pilihan</td><td align="center"><?php echo $data['mapel_pilihan']; ?></td></tr>
						
						<tr><td align="center"><b>Rata-rata</b></td><td align="center"><b><?php echo $data['rata_rata']; ?></b></td></tr>
					</table>
				</div>
			</div>
					
			
			<br>
			<?php
			//tampilkan status lulus atau tidak lulus 
			if( $data['status'] == 1 ){
				echo '<div class="alert alert-success" role="alert"><strong>SELAMAT !</strong> Anda dinyatakan <b>LULUS</b>.</div>';
				echo '<div class="alert alert-warning" role="alert"><strong>SKL ASLI DAPAT DIAMBIL KE WALI KELAS MASING-MASING !</strong>.</div>';
			} else {
				echo '<div class="alert alert-danger" role="alert"><strong>MAAF !</strong> Anda dinyatakan TIDAK LULUS.</div>';
			}				
			echo '<a href="cetakskl.php?nisn='.$data['nisn'].'"><button class="btn btn-primary" style="width:100%"><i class="fas fa-download"></i> Cetak Surat Keterangan Lulus</button></a> <p></p>';
		}
		?>
    
  </div>
</div>



                            </div>
                          </div>
                        </div>
                      </div>

<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/jquery.countdown.min.js"></script>
<script type="text/javascript">
	var skrg = Date.now();
	$('#clock').countdown("<?=$hsl['tgl_pengumuman'] ?>", {elapse: true})
	.on('update.countdown', function(event) {
	var $this = $(this);
	if (event.elapsed) {
		$( "#xpengumuman" ).show();
		$( "#clock" ).hide();
	} else {
		$this.html(event.strftime('<p align="center"><strong>Pengumuman belum dapat dilihat </strong></p><p align="center">Countdown: <span>%D hari %H jam %M menit %S detik </span> </p>'));
		$( "#xpengumuman" ).hide();
	}
	});

	</script>
<?php
include 'footer.php';
?>

          