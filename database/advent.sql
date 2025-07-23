-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2025 pada 11.21
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advent`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_admin`
--

CREATE TABLE `data_admin` (
  `nisn` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sesi_login` time NOT NULL,
  `status_login` varchar(11) NOT NULL,
  `waktu_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_admin`
--

INSERT INTO `data_admin` (`nisn`, `username`, `nama_lengkap`, `password`, `sesi_login`, `status_login`, `waktu_login`, `role`) VALUES
('', 'Wilmer', 'Wilmer F. Lumbangaol, S.Fil.', 'c24da714d5061299253a937dbcd5f0ba', '00:00:00', '0', '2025-07-18 04:18:28', 'wali'),
('1', 'Richo', 'Richo Maylano Yozienanda', '8306b07bbfa69ac7a71d44ef85e18f59', '15:08:40', '1', '2025-07-22 08:08:40', 'admin'),
('2', 'Yuriska', 'Yuriska Christina Arnita Sandy, S.Mat.', 'b478f079a84cffb44b52fe1d76250dc2', '11:19:08', '0', '2025-07-18 04:28:51', 'wali'),
('3', 'Niken', 'Niken Agustiningrum, S.Pd.', 'b74a38b1c15c4c6e22eff53a5b8993c8', '15:09:28', '1', '2025-07-22 08:09:28', 'wali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ekskul`
--

CREATE TABLE `data_ekskul` (
  `id_ekskul` int(8) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `tahun_pelajaran` varchar(15) NOT NULL,
  `english_smt1` text NOT NULL,
  `english_smt2` text NOT NULL,
  `english_smt3` text NOT NULL,
  `english_smt4` text NOT NULL,
  `english_smt5` text NOT NULL,
  `english_smt6` text NOT NULL,
  `pathfinder_smt1` text NOT NULL,
  `pathfinder_smt2` text NOT NULL,
  `pathfinder_smt3` text NOT NULL,
  `pathfinder_smt4` text NOT NULL,
  `pathfinder_smt5` text NOT NULL,
  `pathfinder_smt6` text NOT NULL,
  `karawitan_smt1` text NOT NULL,
  `karawitan_smt2` text NOT NULL,
  `karawitan_smt3` text NOT NULL,
  `karawitan_smt4` text NOT NULL,
  `karawitan_smt5` text NOT NULL,
  `karawitan_smt6` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_ekskul`
--

INSERT INTO `data_ekskul` (`id_ekskul`, `id_siswa`, `nama`, `nisn`, `tahun_pelajaran`, `english_smt1`, `english_smt2`, `english_smt3`, `english_smt4`, `english_smt5`, `english_smt6`, `pathfinder_smt1`, `pathfinder_smt2`, `pathfinder_smt3`, `pathfinder_smt4`, `pathfinder_smt5`, `pathfinder_smt6`, `karawitan_smt1`, `karawitan_smt2`, `karawitan_smt3`, `karawitan_smt4`, `karawitan_smt5`, `karawitan_smt6`) VALUES
(24, '11223344', 'Richo Maylano Yozienanda', '11223344', '2024/2025', 'Sangat Baik', '', '', '', '', '', 'Baik', '', '', '', '', '', 'Sangat Baik', '', '', '', '', ''),
(25, '0028105654', 'Yuriska Christina Arnita Sandy', '0028105654', '2024/2025', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, '0031528802', 'Farrel Dwi Putranto', '0031528802', '2024/2025', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, '001677213', 'Maria Christiana', '001677213', '2025/2026', 'Sangat Baik', 'Baik', '', '', '', '', 'Sangat Baik', 'Sangat Baik', '', '', '', '', 'Sangat Baik', 'Sangat Baik', '', '', '', ''),
(28, '00552713', 'Imanuel Budi Santoso', '00552713', '2023/2024', '', '', '', '', 'Sangat Baik', '', '', '', '', '', 'Sangat Baik', '', '', '', '', '', 'Sangat Baik', ''),
(29, '0098322314', 'Abigail Agnes Putri Chrisans', '0098322314', '2023/2024', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_guru`
--

CREATE TABLE `data_guru` (
  `id_guru` int(8) NOT NULL,
  `nama_guru` varchar(255) NOT NULL,
  `nip_guru` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_guru`
--

INSERT INTO `data_guru` (`id_guru`, `nama_guru`, `nip_guru`, `jabatan`, `nomor`) VALUES
(1, 'Yuriska Christina Arnita Sandy, S.Mat.', '-', 'Waka Kurikulum, Wali Kelas VIII, Guru Matematika', '6285642698349'),
(2, 'Niken Agustiningrum, S.Pd.', '-', 'Wali Kelas IX, Kepala Lab. IPA, Guru IPA', '-'),
(3, 'Aris Hernowo, S.Pd., M.Fil.', '-', 'Kepala Perguruan, Follow The Bible IX, Guru BK', '-'),
(4, 'Martha Santi Nugraheni, S.Pd.', '-', 'Kepala Sekolah, Follow The Bible VIII, Guru Bahasa Inggris, Pathfinder IX', '-'),
(5, 'Wilmer F. Lumbangaol, S.Fil.', '-', 'Wali Kelas VII, Follow The Bible VII, Guru Agama, Pathfinder VII', '-'),
(6, 'Daniel Adipawoko, S.Kom.', '-', 'Waka Kesiswaan, Kepala Lab. Komputer, Guru Informatika', '-'),
(7, 'Yeni Rustanti, S.Pd.', '-', 'Guru PKN, Guru IPS', '-'),
(8, 'Dwi Prasetyo, S.Sn.', '-', 'Guru Kesenian Daerah, Guru Seni Budaya', '-'),
(9, 'Nanda Fauzi Amrullah, S.Pd.', '-', 'Guru Penjasorkes', '-'),
(10, 'Elvy S. J. Nasution, S.I.Kom.', '-', 'Guru Bahasa Indonesia', '-'),
(11, 'Monika Fitri Setyowati, S.S.', '-', 'Guru Bahasa Jawa', '-'),
(12, 'Pdt. Deddy Panjaitan', '-', 'Guru Agama IX', '-'),
(13, 'Anton Anita Setyaningsih, A.Md.', '-', 'English Conversation', '-'),
(14, 'Petrania Putri, S.E.', '-', 'Bendahara, Pathfinder VIII', '-'),
(15, 'Miss Meta', '-', 'English Club for Students', '-'),
(16, 'Miss Kasa', '-', 'English Club for Students', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_hadir`
--

CREATE TABLE `data_hadir` (
  `id_hadir` int(8) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `tahun_pelajaran` varchar(25) NOT NULL,
  `tahun_masuk` varchar(25) NOT NULL,
  `sakit_smt1` text NOT NULL,
  `sakit_smt2` text NOT NULL,
  `sakit_smt3` text NOT NULL,
  `sakit_smt4` text NOT NULL,
  `sakit_smt5` text NOT NULL,
  `sakit_smt6` text NOT NULL,
  `izin_smt1` text NOT NULL,
  `izin_smt2` text NOT NULL,
  `izin_smt3` text NOT NULL,
  `izin_smt4` text NOT NULL,
  `izin_smt5` text NOT NULL,
  `izin_smt6` text NOT NULL,
  `alpha_smt1` text NOT NULL,
  `alpha_smt2` text NOT NULL,
  `alpha_smt3` text NOT NULL,
  `alpha_smt4` text NOT NULL,
  `alpha_smt5` text NOT NULL,
  `alpha_smt6` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_hadir`
--

INSERT INTO `data_hadir` (`id_hadir`, `id_siswa`, `nama`, `nisn`, `tahun_pelajaran`, `tahun_masuk`, `sakit_smt1`, `sakit_smt2`, `sakit_smt3`, `sakit_smt4`, `sakit_smt5`, `sakit_smt6`, `izin_smt1`, `izin_smt2`, `izin_smt3`, `izin_smt4`, `izin_smt5`, `izin_smt6`, `alpha_smt1`, `alpha_smt2`, `alpha_smt3`, `alpha_smt4`, `alpha_smt5`, `alpha_smt6`) VALUES
(23, '11223344', 'Richo Maylano Yozienanda', '11223344', '2024/2025', '2024/2025', '0', '0', '1', '0', '1', '2', '0', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(24, '0028105654', 'Yuriska Christina Arnita Sandy', '0028105654', '2024/2025', '2024/2025', '', '', '0', '0', '', '', '', '', '0', '0', '', '', '', '', '0', '0', '', ''),
(25, '0031528802', 'Farrel Dwi Putranto', '0031528802', '2024/2025', '2024/2025', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, '001677213', 'Maria Christiana', '001677213', '2025/2026', '2025/2026', '0', '0', '', '', '', '', '0', '0', '', '', '', '', '0', '0', '', '', '', ''),
(27, '00552713', 'Imanuel Budi Santoso', '00552713', '2023/2024', '2023/2024', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, '0098322314', 'Abigail Agnes Putri Chrisans', '0098322314', '2023/2024', '2023/2024', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_konfig`
--

CREATE TABLE `data_konfig` (
  `id` int(11) NOT NULL,
  `pemerintah` varchar(100) NOT NULL,
  `dinas` varchar(255) NOT NULL,
  `sekolah` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `tahun` year(4) NOT NULL,
  `tgl_pengumuman` datetime NOT NULL,
  `nama_kepsek` varchar(55) NOT NULL,
  `nip_kepsek` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_konfig`
--

INSERT INTO `data_konfig` (`id`, `pemerintah`, `dinas`, `sekolah`, `alamat`, `tahun`, `tgl_pengumuman`, `nama_kepsek`, `nip_kepsek`) VALUES
(3, 'DINAS PENDIDIKAN KOTA SURAKARTA', 'YAYASAN PENDIDIKAN ADVENT SURAKARTA', 'SMP ADVENT', 'Jalan Pratanggapati RT 03/RW 01 Nomor 05 Jebres, Surakarta Kode Pos 57126', 2024, '2024-05-02 16:00:00', 'Martha Santi Nugraheni, S.Pd', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pengembangan`
--

CREATE TABLE `data_pengembangan` (
  `id_pengembangan` int(8) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `nisn` varchar(25) NOT NULL,
  `tahun_pelajaran` varchar(25) NOT NULL,
  `tahun_masuk` varchar(25) NOT NULL,
  `bk_smt1` text NOT NULL,
  `bk_smt2` text NOT NULL,
  `bk_smt3` text NOT NULL,
  `bk_smt4` text NOT NULL,
  `bk_smt5` text NOT NULL,
  `bk_smt6` text NOT NULL,
  `bible_smt1` text NOT NULL,
  `bible_smt2` text NOT NULL,
  `bible_smt3` text NOT NULL,
  `bible_smt4` text NOT NULL,
  `bible_smt5` text NOT NULL,
  `bible_smt6` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pengembangan`
--

INSERT INTO `data_pengembangan` (`id_pengembangan`, `id_siswa`, `nama`, `nisn`, `tahun_pelajaran`, `tahun_masuk`, `bk_smt1`, `bk_smt2`, `bk_smt3`, `bk_smt4`, `bk_smt5`, `bk_smt6`, `bible_smt1`, `bible_smt2`, `bible_smt3`, `bible_smt4`, `bible_smt5`, `bible_smt6`) VALUES
(23, '11223344', 'Richo Maylano Yozienanda', '11223344', '2024/2025', '2024/2025', 'Sangat Baik', '', '', '', '', '', 'Sangat Baik', '', '', '', '', ''),
(24, '0028105654', 'Yuriska Christina Arnita Sandy', '0028105654', '2024/2025', '2024/2025', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, '0031528802', 'Farrel Dwi Putranto', '0031528802', '2024/2025', '2024/2025', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, '001677213', 'Maria Christiana', '001677213', '2025/2026', '2025/2026', 'Baik', 'Sangat Baik', '', '', '', '', 'Baik', 'Baik', '', '', '', ''),
(27, '00552713', 'Imanuel Budi Santoso', '00552713', '2023/2024', '2023/2024', '', '', '', '', 'Baik', '', '', '', '', '', 'Sangat Baik', ''),
(28, '0098322314', 'Abigail Agnes Putri Chrisans', '0098322314', '2023/2024', '2023/2024', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_rapor`
--

CREATE TABLE `data_rapor` (
  `id_rapor` int(8) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `tahun_pelajaran` text NOT NULL,
  `tahun_masuk` text NOT NULL,
  `agama_smt1` text NOT NULL,
  `agama_smt2` text NOT NULL,
  `agama_smt3` text NOT NULL,
  `agama_smt4` text NOT NULL,
  `agama_smt5` text NOT NULL,
  `agama_smt6` text NOT NULL,
  `pkn_smt1` text NOT NULL,
  `pkn_smt2` text NOT NULL,
  `pkn_smt3` text NOT NULL,
  `pkn_smt4` text NOT NULL,
  `pkn_smt5` text NOT NULL,
  `pkn_smt6` text NOT NULL,
  `indo_smt1` text NOT NULL,
  `indo_smt2` text NOT NULL,
  `indo_smt3` text NOT NULL,
  `indo_smt4` text NOT NULL,
  `indo_smt5` text NOT NULL,
  `indo_smt6` text NOT NULL,
  `mtk_smt1` text NOT NULL,
  `mtk_smt2` text NOT NULL,
  `mtk_smt3` text NOT NULL,
  `mtk_smt4` text NOT NULL,
  `mtk_smt5` text NOT NULL,
  `mtk_smt6` text NOT NULL,
  `ipa_smt1` text NOT NULL,
  `ipa_smt2` text NOT NULL,
  `ipa_smt3` text NOT NULL,
  `ipa_smt4` text NOT NULL,
  `ipa_smt5` text NOT NULL,
  `ipa_smt6` text NOT NULL,
  `ips_smt1` text NOT NULL,
  `ips_smt2` text NOT NULL,
  `ips_smt3` text NOT NULL,
  `ips_smt4` text NOT NULL,
  `ips_smt5` text NOT NULL,
  `ips_smt6` text NOT NULL,
  `inggris_smt1` text NOT NULL,
  `inggris_smt2` text NOT NULL,
  `inggris_smt3` text NOT NULL,
  `inggris_smt4` text NOT NULL,
  `inggris_smt5` text NOT NULL,
  `inggris_smt6` text NOT NULL,
  `seni_smt1` text NOT NULL,
  `seni_smt2` text NOT NULL,
  `seni_smt3` text NOT NULL,
  `seni_smt4` text NOT NULL,
  `seni_smt5` text NOT NULL,
  `seni_smt6` text NOT NULL,
  `pjok_smt1` text NOT NULL,
  `pjok_smt2` text NOT NULL,
  `pjok_smt3` text NOT NULL,
  `pjok_smt4` text NOT NULL,
  `pjok_smt5` text NOT NULL,
  `pjok_smt6` text NOT NULL,
  `informatika_smt1` text NOT NULL,
  `informatika_smt2` text NOT NULL,
  `informatika_smt3` text NOT NULL,
  `informatika_smt4` text NOT NULL,
  `informatika_smt5` text NOT NULL,
  `informatika_smt6` text NOT NULL,
  `jawa_smt1` text NOT NULL,
  `jawa_smt2` text NOT NULL,
  `jawa_smt3` text NOT NULL,
  `jawa_smt4` text NOT NULL,
  `jawa_smt5` text NOT NULL,
  `jawa_smt6` text NOT NULL,
  `kesda_smt1` text NOT NULL,
  `kesda_smt2` text NOT NULL,
  `kesda_smt3` text NOT NULL,
  `kesda_smt4` text NOT NULL,
  `kesda_smt5` text NOT NULL,
  `kesda_smt6` text NOT NULL,
  `agama_smt1_tercapai` text NOT NULL,
  `agama_smt1_tidak_tercapai` text NOT NULL,
  `pkn_smt1_tercapai` text NOT NULL,
  `pkn_smt1_tidak_tercapai` text NOT NULL,
  `indo_smt1_tercapai` text NOT NULL,
  `indo_smt1_tidak_tercapai` text NOT NULL,
  `mtk_smt1_tercapai` text NOT NULL,
  `mtk_smt1_tidak_tercapai` text NOT NULL,
  `ipa_smt1_tercapai` text NOT NULL,
  `ipa_smt1_tidak_tercapai` text NOT NULL,
  `ips_smt1_tercapai` text NOT NULL,
  `ips_smt1_tidak_tercapai` text NOT NULL,
  `inggris_smt1_tercapai` text NOT NULL,
  `inggris_smt1_tidak_tercapai` text NOT NULL,
  `seni_smt1_tercapai` text NOT NULL,
  `seni_smt1_tidak_tercapai` text NOT NULL,
  `pjok_smt1_tercapai` text NOT NULL,
  `pjok_smt1_tidak_tercapai` text NOT NULL,
  `informatika_smt1_tercapai` text NOT NULL,
  `informatika_smt1_tidak_tercapai` text NOT NULL,
  `jawa_smt1_tercapai` text NOT NULL,
  `jawa_smt1_tidak_tercapai` text NOT NULL,
  `kesda_smt1_tercapai` text NOT NULL,
  `kesda_smt1_tidak_tercapai` text NOT NULL,
  `agama_smt2_tercapai` text NOT NULL,
  `agama_smt2_tidak_tercapai` text NOT NULL,
  `pkn_smt2_tercapai` text NOT NULL,
  `pkn_smt2_tidak_tercapai` text NOT NULL,
  `indo_smt2_tercapai` text NOT NULL,
  `indo_smt2_tidak_tercapai` text NOT NULL,
  `mtk_smt2_tercapai` text NOT NULL,
  `mtk_smt2_tidak_tercapai` text NOT NULL,
  `ipa_smt2_tercapai` text NOT NULL,
  `ipa_smt2_tidak_tercapai` text NOT NULL,
  `ips_smt2_tercapai` text NOT NULL,
  `ips_smt2_tidak_tercapai` text NOT NULL,
  `inggris_smt2_tercapai` text NOT NULL,
  `inggris_smt2_tidak_tercapai` text NOT NULL,
  `seni_smt2_tercapai` text NOT NULL,
  `seni_smt2_tidak_tercapai` text NOT NULL,
  `pjok_smt2_tercapai` text NOT NULL,
  `pjok_smt2_tidak_tercapai` text NOT NULL,
  `informatika_smt2_tercapai` text NOT NULL,
  `informatika_smt2_tidak_tercapai` text NOT NULL,
  `jawa_smt2_tercapai` text NOT NULL,
  `jawa_smt2_tidak_tercapai` text NOT NULL,
  `kesda_smt2_tercapai` text NOT NULL,
  `kesda_smt2_tidak_tercapai` text NOT NULL,
  `agama_smt3_tercapai` text NOT NULL,
  `agama_smt3_tidak_tercapai` text NOT NULL,
  `pkn_smt3_tercapai` text NOT NULL,
  `pkn_smt3_tidak_tercapai` text NOT NULL,
  `indo_smt3_tercapai` text NOT NULL,
  `indo_smt3_tidak_tercapai` text NOT NULL,
  `mtk_smt3_tercapai` text NOT NULL,
  `mtk_smt3_tidak_tercapai` text NOT NULL,
  `ipa_smt3_tercapai` text NOT NULL,
  `ipa_smt3_tidak_tercapai` text NOT NULL,
  `ips_smt3_tercapai` text NOT NULL,
  `ips_smt3_tidak_tercapai` text NOT NULL,
  `inggris_smt3_tercapai` text NOT NULL,
  `inggris_smt3_tidak_tercapai` text NOT NULL,
  `seni_smt3_tercapai` text NOT NULL,
  `seni_smt3_tidak_tercapai` text NOT NULL,
  `pjok_smt3_tercapai` text NOT NULL,
  `pjok_smt3_tidak_tercapai` text NOT NULL,
  `informatika_smt3_tercapai` text NOT NULL,
  `informatika_smt3_tidak_tercapai` text NOT NULL,
  `jawa_smt3_tercapai` text NOT NULL,
  `jawa_smt3_tidak_tercapai` text NOT NULL,
  `kesda_smt3_tercapai` text NOT NULL,
  `kesda_smt3_tidak_tercapai` text NOT NULL,
  `agama_smt4_tercapai` text NOT NULL,
  `agama_smt4_tidak_tercapai` text NOT NULL,
  `pkn_smt4_tercapai` text NOT NULL,
  `pkn_smt4_tidak_tercapai` text NOT NULL,
  `indo_smt4_tercapai` text NOT NULL,
  `indo_smt4_tidak_tercapai` text NOT NULL,
  `mtk_smt4_tercapai` text NOT NULL,
  `mtk_smt4_tidak_tercapai` text NOT NULL,
  `ipa_smt4_tercapai` text NOT NULL,
  `ipa_smt4_tidak_tercapai` text NOT NULL,
  `ips_smt4_tercapai` text NOT NULL,
  `ips_smt4_tidak_tercapai` text NOT NULL,
  `inggris_smt4_tercapai` text NOT NULL,
  `inggris_smt4_tidak_tercapai` text NOT NULL,
  `seni_smt4_tercapai` text NOT NULL,
  `seni_smt4_tidak_tercapai` text NOT NULL,
  `pjok_smt4_tercapai` text NOT NULL,
  `pjok_smt4_tidak_tercapai` text NOT NULL,
  `informatika_smt4_tercapai` text NOT NULL,
  `informatika_smt4_tidak_tercapai` text NOT NULL,
  `jawa_smt4_tercapai` text NOT NULL,
  `jawa_smt4_tidak_tercapai` text NOT NULL,
  `kesda_smt4_tercapai` text NOT NULL,
  `kesda_smt4_tidak_tercapai` text NOT NULL,
  `agama_smt5_tercapai` text NOT NULL,
  `agama_smt5_tidak_tercapai` text NOT NULL,
  `pkn_smt5_tercapai` text NOT NULL,
  `pkn_smt5_tidak_tercapai` text NOT NULL,
  `indo_smt5_tercapai` text NOT NULL,
  `indo_smt5_tidak_tercapai` text NOT NULL,
  `mtk_smt5_tercapai` text NOT NULL,
  `mtk_smt5_tidak_tercapai` text NOT NULL,
  `ipa_smt5_tercapai` text NOT NULL,
  `ipa_smt5_tidak_tercapai` text NOT NULL,
  `ips_smt5_tercapai` text NOT NULL,
  `ips_smt5_tidak_tercapai` text NOT NULL,
  `inggris_smt5_tercapai` text NOT NULL,
  `inggris_smt5_tidak_tercapai` text NOT NULL,
  `seni_smt5_tercapai` text NOT NULL,
  `seni_smt5_tidak_tercapai` text NOT NULL,
  `pjok_smt5_tercapai` text NOT NULL,
  `pjok_smt5_tidak_tercapai` text NOT NULL,
  `informatika_smt5_tercapai` text NOT NULL,
  `informatika_smt5_tidak_tercapai` text NOT NULL,
  `jawa_smt5_tercapai` text NOT NULL,
  `jawa_smt5_tidak_tercapai` text NOT NULL,
  `kesda_smt5_tercapai` text NOT NULL,
  `kesda_smt5_tidak_tercapai` text NOT NULL,
  `agama_smt6_tercapai` text NOT NULL,
  `agama_smt6_tidak_tercapai` text NOT NULL,
  `pkn_smt6_tercapai` text NOT NULL,
  `pkn_smt6_tidak_tercapai` text NOT NULL,
  `indo_smt6_tercapai` text NOT NULL,
  `indo_smt6_tidak_tercapai` text NOT NULL,
  `mtk_smt6_tercapai` text NOT NULL,
  `mtk_smt6_tidak_tercapai` text NOT NULL,
  `ipa_smt6_tercapai` text NOT NULL,
  `ipa_smt6_tidak_tercapai` text NOT NULL,
  `ips_smt6_tercapai` text NOT NULL,
  `ips_smt6_tidak_tercapai` text NOT NULL,
  `inggris_smt6_tercapai` text NOT NULL,
  `inggris_smt6_tidak_tercapai` text NOT NULL,
  `seni_smt6_tercapai` text NOT NULL,
  `seni_smt6_tidak_tercapai` text NOT NULL,
  `pjok_smt6_tercapai` text NOT NULL,
  `pjok_smt6_tidak_tercapai` text NOT NULL,
  `informatika_smt6_tercapai` text NOT NULL,
  `informatika_smt6_tidak_tercapai` text NOT NULL,
  `jawa_smt6_tercapai` text NOT NULL,
  `jawa_smt6_tidak_tercapai` text NOT NULL,
  `kesda_smt6_tercapai` text NOT NULL,
  `kesda_smt6_tidak_tercapai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_rapor`
--

INSERT INTO `data_rapor` (`id_rapor`, `id_siswa`, `nama`, `nisn`, `tahun_pelajaran`, `tahun_masuk`, `agama_smt1`, `agama_smt2`, `agama_smt3`, `agama_smt4`, `agama_smt5`, `agama_smt6`, `pkn_smt1`, `pkn_smt2`, `pkn_smt3`, `pkn_smt4`, `pkn_smt5`, `pkn_smt6`, `indo_smt1`, `indo_smt2`, `indo_smt3`, `indo_smt4`, `indo_smt5`, `indo_smt6`, `mtk_smt1`, `mtk_smt2`, `mtk_smt3`, `mtk_smt4`, `mtk_smt5`, `mtk_smt6`, `ipa_smt1`, `ipa_smt2`, `ipa_smt3`, `ipa_smt4`, `ipa_smt5`, `ipa_smt6`, `ips_smt1`, `ips_smt2`, `ips_smt3`, `ips_smt4`, `ips_smt5`, `ips_smt6`, `inggris_smt1`, `inggris_smt2`, `inggris_smt3`, `inggris_smt4`, `inggris_smt5`, `inggris_smt6`, `seni_smt1`, `seni_smt2`, `seni_smt3`, `seni_smt4`, `seni_smt5`, `seni_smt6`, `pjok_smt1`, `pjok_smt2`, `pjok_smt3`, `pjok_smt4`, `pjok_smt5`, `pjok_smt6`, `informatika_smt1`, `informatika_smt2`, `informatika_smt3`, `informatika_smt4`, `informatika_smt5`, `informatika_smt6`, `jawa_smt1`, `jawa_smt2`, `jawa_smt3`, `jawa_smt4`, `jawa_smt5`, `jawa_smt6`, `kesda_smt1`, `kesda_smt2`, `kesda_smt3`, `kesda_smt4`, `kesda_smt5`, `kesda_smt6`, `agama_smt1_tercapai`, `agama_smt1_tidak_tercapai`, `pkn_smt1_tercapai`, `pkn_smt1_tidak_tercapai`, `indo_smt1_tercapai`, `indo_smt1_tidak_tercapai`, `mtk_smt1_tercapai`, `mtk_smt1_tidak_tercapai`, `ipa_smt1_tercapai`, `ipa_smt1_tidak_tercapai`, `ips_smt1_tercapai`, `ips_smt1_tidak_tercapai`, `inggris_smt1_tercapai`, `inggris_smt1_tidak_tercapai`, `seni_smt1_tercapai`, `seni_smt1_tidak_tercapai`, `pjok_smt1_tercapai`, `pjok_smt1_tidak_tercapai`, `informatika_smt1_tercapai`, `informatika_smt1_tidak_tercapai`, `jawa_smt1_tercapai`, `jawa_smt1_tidak_tercapai`, `kesda_smt1_tercapai`, `kesda_smt1_tidak_tercapai`, `agama_smt2_tercapai`, `agama_smt2_tidak_tercapai`, `pkn_smt2_tercapai`, `pkn_smt2_tidak_tercapai`, `indo_smt2_tercapai`, `indo_smt2_tidak_tercapai`, `mtk_smt2_tercapai`, `mtk_smt2_tidak_tercapai`, `ipa_smt2_tercapai`, `ipa_smt2_tidak_tercapai`, `ips_smt2_tercapai`, `ips_smt2_tidak_tercapai`, `inggris_smt2_tercapai`, `inggris_smt2_tidak_tercapai`, `seni_smt2_tercapai`, `seni_smt2_tidak_tercapai`, `pjok_smt2_tercapai`, `pjok_smt2_tidak_tercapai`, `informatika_smt2_tercapai`, `informatika_smt2_tidak_tercapai`, `jawa_smt2_tercapai`, `jawa_smt2_tidak_tercapai`, `kesda_smt2_tercapai`, `kesda_smt2_tidak_tercapai`, `agama_smt3_tercapai`, `agama_smt3_tidak_tercapai`, `pkn_smt3_tercapai`, `pkn_smt3_tidak_tercapai`, `indo_smt3_tercapai`, `indo_smt3_tidak_tercapai`, `mtk_smt3_tercapai`, `mtk_smt3_tidak_tercapai`, `ipa_smt3_tercapai`, `ipa_smt3_tidak_tercapai`, `ips_smt3_tercapai`, `ips_smt3_tidak_tercapai`, `inggris_smt3_tercapai`, `inggris_smt3_tidak_tercapai`, `seni_smt3_tercapai`, `seni_smt3_tidak_tercapai`, `pjok_smt3_tercapai`, `pjok_smt3_tidak_tercapai`, `informatika_smt3_tercapai`, `informatika_smt3_tidak_tercapai`, `jawa_smt3_tercapai`, `jawa_smt3_tidak_tercapai`, `kesda_smt3_tercapai`, `kesda_smt3_tidak_tercapai`, `agama_smt4_tercapai`, `agama_smt4_tidak_tercapai`, `pkn_smt4_tercapai`, `pkn_smt4_tidak_tercapai`, `indo_smt4_tercapai`, `indo_smt4_tidak_tercapai`, `mtk_smt4_tercapai`, `mtk_smt4_tidak_tercapai`, `ipa_smt4_tercapai`, `ipa_smt4_tidak_tercapai`, `ips_smt4_tercapai`, `ips_smt4_tidak_tercapai`, `inggris_smt4_tercapai`, `inggris_smt4_tidak_tercapai`, `seni_smt4_tercapai`, `seni_smt4_tidak_tercapai`, `pjok_smt4_tercapai`, `pjok_smt4_tidak_tercapai`, `informatika_smt4_tercapai`, `informatika_smt4_tidak_tercapai`, `jawa_smt4_tercapai`, `jawa_smt4_tidak_tercapai`, `kesda_smt4_tercapai`, `kesda_smt4_tidak_tercapai`, `agama_smt5_tercapai`, `agama_smt5_tidak_tercapai`, `pkn_smt5_tercapai`, `pkn_smt5_tidak_tercapai`, `indo_smt5_tercapai`, `indo_smt5_tidak_tercapai`, `mtk_smt5_tercapai`, `mtk_smt5_tidak_tercapai`, `ipa_smt5_tercapai`, `ipa_smt5_tidak_tercapai`, `ips_smt5_tercapai`, `ips_smt5_tidak_tercapai`, `inggris_smt5_tercapai`, `inggris_smt5_tidak_tercapai`, `seni_smt5_tercapai`, `seni_smt5_tidak_tercapai`, `pjok_smt5_tercapai`, `pjok_smt5_tidak_tercapai`, `informatika_smt5_tercapai`, `informatika_smt5_tidak_tercapai`, `jawa_smt5_tercapai`, `jawa_smt5_tidak_tercapai`, `kesda_smt5_tercapai`, `kesda_smt5_tidak_tercapai`, `agama_smt6_tercapai`, `agama_smt6_tidak_tercapai`, `pkn_smt6_tercapai`, `pkn_smt6_tidak_tercapai`, `indo_smt6_tercapai`, `indo_smt6_tidak_tercapai`, `mtk_smt6_tercapai`, `mtk_smt6_tidak_tercapai`, `ipa_smt6_tercapai`, `ipa_smt6_tidak_tercapai`, `ips_smt6_tercapai`, `ips_smt6_tidak_tercapai`, `inggris_smt6_tercapai`, `inggris_smt6_tidak_tercapai`, `seni_smt6_tercapai`, `seni_smt6_tidak_tercapai`, `pjok_smt6_tercapai`, `pjok_smt6_tidak_tercapai`, `informatika_smt6_tercapai`, `informatika_smt6_tidak_tercapai`, `jawa_smt6_tercapai`, `jawa_smt6_tidak_tercapai`, `kesda_smt6_tercapai`, `kesda_smt6_tidak_tercapai`) VALUES
(61, '11223344', 'Richo Maylano Yozienanda', '11223344', '2024/2025', '2024/2025', '88', '', '', '', '', '', '85', '', '', '', '', '', '80', '', '', '', '', '', '84', '', '', '', '', '', '86', '', '', '', '', '', '83', '', '', '', '', '', '85', '', '', '', '', '', '83', '', '', '', '', '', '85', '', '', '', '', '', '86', '', '', '', '', '', '84', '', '', '', '', '', '85', '', '', '', '', '', 'Allah sebagai Pencipta dan Pemelihara', 'Manusia sebagai Ciptaan Allah', 'Penerapan Nilai-Nilai Pancasila', 'Sejarah Kelahiran Pancasila', 'Teks Prosedur, Deskripsi, dan Cerita Imajinasi', 'Buku Fiksi dan Nonfiksi', 'Persamaan dan Pertidaksamaan Linear Satu Variabel', 'Bentuk Aljabar', 'Hakikat Ilmu Sains dan Metode Ilmiah', 'Suhu, Kalor, dan Pemuaian', 'Kondisi Wilayah Indonesia', 'Keberadaan Diri dan Keluarga', 'Introducing Myself', 'Greetings and Partings', 'Ragam Hias', 'Dasar-Dasar Seni Rupa', 'Permainan Bola Besar', 'Kebugaran Jasmani', 'Berpikir Komputasional, Sistem Komputer, dan Teknologi Informasi dan Komunikasi', 'Jaringan Komputer dan Internet', 'Aksara Jawa', 'Unggah - Ungguh ', 'Ragam Gerak', 'Ragam Hias', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(62, '0028105654', 'Yuriska Christina Arnita Sandy', '0028105654', '2024/2025', '2024/2025', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, '0031528802', 'Farrel Dwi Putranto', '0031528802', '2024/2025', '2024/2025', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, '001677213', 'Maria Christiana', '001677213', '2025/2026', '2025/2026', '87', '87', '', '', '', '', '88', '84', '', '', '', '', '85', '85', '', '', '', '', '84', '83', '', '', '', '', '86', '86', '', '', '', '', '87', '88', '', '', '', '', '88', '90', '', '', '', '', '83', '93', '', '', '', '', '80', '84', '', '', '', '', '86', '88', '', '', '', '', '85', '83', '', '', '', '', '84', '84', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, '00552713', 'Imanuel Budi Santoso', '00552713', '2023/2024', '2023/2024', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, '0098322314', 'Abigail Agnes Putri Chrisans', '0098322314', '2023/2024', '2023/2024', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, '00552713', 'Imanuel Budi Santoso', '00552713', '2024/2025', '2023/2024', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(68, '0098322314', 'Abigail Agnes Putri Chrisans', '0098322314', '2024/2025', '2023/2024', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, '00552713', 'Imanuel Budi Santoso', '00552713', '2025/2026', '2023/2024', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, '0098322314', 'Abigail Agnes Putri Chrisans', '0098322314', '2025/2026', '2023/2024', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(73, '11223344', 'Richo Maylano Yozienanda', '11223344', '2025/2026', '2024/2025', '88', '', '', '', '', '', '85', '', '', '', '', '', '80', '', '', '', '', '', '84', '', '', '', '', '', '86', '', '', '', '', '', '83', '', '', '', '', '', '85', '', '', '', '', '', '83', '', '', '', '', '', '85', '', '', '', '', '', '86', '', '', '', '', '', '84', '', '', '', '', '', '85', '', '', '', '', '', 'Allah sebagai Pencipta dan Pemelihara', 'Manusia sebagai Ciptaan Allah', 'Penerapan Nilai-Nilai Pancasila', 'Sejarah Kelahiran Pancasila', 'Teks Prosedur, Deskripsi, dan Cerita Imajinasi', 'Buku Fiksi dan Nonfiksi', 'Persamaan dan Pertidaksamaan Linear Satu Variabel', 'Bentuk Aljabar', 'Hakikat Ilmu Sains dan Metode Ilmiah', 'Suhu, Kalor, dan Pemuaian', 'Kondisi Wilayah Indonesia', 'Keberadaan Diri dan Keluarga', 'Introducing Myself', 'Greetings and Partings', 'Ragam Hias', 'Dasar-Dasar Seni Rupa', 'Permainan Bola Besar', 'Kebugaran Jasmani', 'Berpikir Komputasional, Sistem Komputer, dan Teknologi Informasi dan Komunikasi', 'Jaringan Komputer dan Internet', 'Aksara Jawa', 'Unggah - Ungguh ', 'Ragam Gerak', 'Ragam Hias', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(74, '0028105654', 'Yuriska Christina Arnita Sandy', '0028105654', '2025/2026', '2024/2025', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(75, '0031528802', 'Farrel Dwi Putranto', '0031528802', '2025/2026', '2024/2025', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id_siswa` varchar(20) NOT NULL,
  `nisn` varchar(25) CHARACTER SET latin1 NOT NULL,
  `nis` varchar(25) NOT NULL,
  `nama` text NOT NULL,
  `ttl` text NOT NULL,
  `jk` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tahun_masuk` varchar(20) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `wali_smt1` text NOT NULL,
  `wali_smt2` text NOT NULL,
  `wali_smt3` text NOT NULL,
  `wali_smt4` text NOT NULL,
  `wali_smt5` text NOT NULL,
  `wali_smt6` text NOT NULL,
  `kenaikan_smt2` varchar(255) NOT NULL,
  `kenaikan_smt4` varchar(255) NOT NULL,
  `kenaikan_smt6` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_siswa`
--

INSERT INTO `data_siswa` (`id_siswa`, `nisn`, `nis`, `nama`, `ttl`, `jk`, `alamat`, `tahun_masuk`, `kelas`, `wali_smt1`, `wali_smt2`, `wali_smt3`, `wali_smt4`, `wali_smt5`, `wali_smt6`, `kenaikan_smt2`, `kenaikan_smt4`, `kenaikan_smt6`, `foto`) VALUES
('001677213', '001677213', '008', 'Maria Christiana', 'Surakarta, 12 Juli 2010', 'P', 'Pucangsawit', '2025/2026', '', 'Wilmer F. Lumbangaol, S.Fil.', 'Wilmer F. Lumbangaol, S.Fil.', '', '', '', '', '', '', '', 'Logo_Advent.png'),
('0028105654', '0028105654', '002', 'Intan Taricha', 'Surakarta, 23 September 2000', 'P', 'Bayan Krajan RT 05/ RW 06, Kadipiro, Banjarsari, Surakarta', '2024/2025', '', '', '', 'Yuriska Christina Arnita Sandy, S.Mat.', 'Yuriska Christina Arnita Sandy, S.Mat.', '', '', '', '', '', 'Logo_Advent.png'),
('0031528802', '0031528802', '003', 'Farrel Dwi Putranto', 'Surakarta, 13 Oktober 2006', 'L', 'Semanggi RT 02/ RW 11, Semanggi, Kec. Pasar Kliwon, Surakarta', '2024/2025', '', '', '', 'Yuriska Christina Arnita Sandy, S.Mat.', 'Yuriska Christina Arnita Sandy, S.Mat.', '', '', '', '', '', 'Logo_Advent.png'),
('00552713', '00552713', '009', 'Imanuel Budi Santoso', 'Surakarta, 02 Mei 2000', 'L', 'Sumber Nayu', '2023/2024', '', '', '', '', '', 'Niken Agustiningrum, S.Pd.', 'Niken Agustiningrum, S.Pd.', '', '', '', 'Logo_Advent.png'),
('0098322314', '0098322314', '004', 'Abigail Agnes Putri Chrisans', 'Surakarta, 18 Mei 2000', 'P', 'Jl. S. Parman No. 15, Margonda, Depok, Jawa Barat ', '2023/2024', '', '', '', '', '', 'Niken Agustiningrum, S.Pd.', 'Niken Agustiningrum, S.Pd.', '', '', '', 'Logo_Advent.png'),
('11223344', '11223344', '1234', 'Richo Maylano Yozienanda', 'Surakarta, 18 Mei 2000', 'L', 'Sumpingan RT 05/ RW 06, Kadipiro, Banjarsari, Surakarta', '2024/2025', '', '', '', 'Yuriska Christina Arnita Sandy, S.Mat.', 'Yuriska Christina Arnita Sandy, S.Mat.', '', '', '', '', '', 'admin.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_admin`
--
ALTER TABLE `data_admin`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `data_ekskul`
--
ALTER TABLE `data_ekskul`
  ADD PRIMARY KEY (`id_ekskul`);

--
-- Indeks untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `data_hadir`
--
ALTER TABLE `data_hadir`
  ADD PRIMARY KEY (`id_hadir`);

--
-- Indeks untuk tabel `data_konfig`
--
ALTER TABLE `data_konfig`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pengembangan`
--
ALTER TABLE `data_pengembangan`
  ADD PRIMARY KEY (`id_pengembangan`);

--
-- Indeks untuk tabel `data_rapor`
--
ALTER TABLE `data_rapor`
  ADD PRIMARY KEY (`id_rapor`);

--
-- Indeks untuk tabel `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id_siswa`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_ekskul`
--
ALTER TABLE `data_ekskul`
  MODIFY `id_ekskul` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id_guru` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `data_hadir`
--
ALTER TABLE `data_hadir`
  MODIFY `id_hadir` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `data_konfig`
--
ALTER TABLE `data_konfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_pengembangan`
--
ALTER TABLE `data_pengembangan`
  MODIFY `id_pengembangan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `data_rapor`
--
ALTER TABLE `data_rapor`
  MODIFY `id_rapor` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
