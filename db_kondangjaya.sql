-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 06:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kondangjaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` char(8) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `username`, `password`) VALUES
(74, 'admin', 'admin1', '$2y$10$uYzk7MJ1Z86eUE88VxvcCedDdl5uF3VgmD9tWJndwaivLf93fToYW');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berkas`
--

CREATE TABLE `tb_berkas` (
  `id_berkas` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `jenis_berkas` varchar(30) NOT NULL,
  `poto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_inventaris`
--

CREATE TABLE `tb_inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `jenis_bb` varchar(50) NOT NULL,
  `asal_bb` varchar(50) NOT NULL,
  `keadaan_bb_awal_t` varchar(20) NOT NULL,
  `tgl_pengesahan` varchar(50) NOT NULL,
  `keadaan_bb_akhir_t` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_inventaris`
--

INSERT INTO `tb_inventaris` (`id_inventaris`, `jenis_bb`, `asal_bb`, `keadaan_bb_awal_t`, `tgl_pengesahan`, `keadaan_bb_akhir_t`, `keterangan`) VALUES
(149, 'asasasas', 'asasas', 'asasasasas', '2022-12-18', 'asas', 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pejabat`
--

CREATE TABLE `tb_pejabat` (
  `id_pejabat` char(4) NOT NULL,
  `nama_pejabat` varchar(35) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pejabat`
--

INSERT INTO `tb_pejabat` (`id_pejabat`, `nama_pejabat`, `jabatan`) VALUES
('PJ01', 'ANJA SUGIANA,SE ', 'kades'),
('PJ02', 'H. SARNO SUKARDI', 'sekdes'),
('PJ03', 'DADE SURYADI', 'babinsa'),
('PJ04', 'ANDI SETIADI,SH ', 'babinmas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengiriman`
--

CREATE TABLE `tb_pengiriman` (
  `no` int(11) NOT NULL,
  `id_surat` char(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_whatsapp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_permohonan`
--

CREATE TABLE `tb_permohonan` (
  `id_permohonan` int(11) NOT NULL,
  `no_nik` bigint(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_whatsaap` text NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `tujuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sktm_sekolah`
--

CREATE TABLE `tb_sktm_sekolah` (
  `id_surat` char(8) NOT NULL,
  `id_pejabat` char(4) NOT NULL,
  `no_surat` char(19) NOT NULL,
  `nama_pemohon` varchar(35) NOT NULL,
  `no_nik_pemohon` bigint(16) NOT NULL,
  `ttl_pemohon` varchar(50) NOT NULL,
  `jenis_kelamin_pemohon` enum('Laki-Laki','Perempuan') NOT NULL,
  `bangsa_agama_pemohon` varchar(20) NOT NULL,
  `pekerjaan_pemohon` varchar(20) NOT NULL,
  `tempat_tinggal_pemohon` text NOT NULL,
  `nama_ortu` varchar(35) NOT NULL,
  `no_nik_ortu` bigint(16) NOT NULL,
  `data_ortu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `tb_sktm_sekolah`
--
DELIMITER $$
CREATE TRIGGER `deletePengirmanSktmSekolah` AFTER DELETE ON `tb_sktm_sekolah` FOR EACH ROW BEGIN
    DELETE FROM tb_pengiriman WHERE id_surat = old.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sk_desa`
--

CREATE TABLE `tb_sk_desa` (
  `id_surat` char(8) NOT NULL,
  `id_pejabat` char(4) NOT NULL,
  `no_surat` char(19) NOT NULL,
  `nama_pemohon` varchar(35) NOT NULL,
  `no_nik` bigint(16) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') DEFAULT NULL,
  `agama` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_sk_desa` varchar(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `tb_sk_desa`
--
DELIMITER $$
CREATE TRIGGER `deletePengirmanSkDesa` AFTER DELETE ON `tb_sk_desa` FOR EACH ROW BEGIN
    DELETE FROM tb_pengiriman WHERE id_surat = old.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sk_kematian`
--

CREATE TABLE `tb_sk_kematian` (
  `id_surat` char(8) NOT NULL,
  `id_pejabat` char(4) NOT NULL,
  `no_surat` char(21) NOT NULL,
  `nama_alm` varchar(35) NOT NULL,
  `no_nik_alm` bigint(16) NOT NULL,
  `ttlu_alm` varchar(50) NOT NULL,
  `pekerjaan_alm` varchar(20) NOT NULL,
  `alamat_alm` text NOT NULL,
  `nama_pelapor` varchar(35) NOT NULL,
  `no_nik_pelapor` bigint(16) NOT NULL,
  `data_pelapor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `tb_sk_kematian`
--
DELIMITER $$
CREATE TRIGGER `deletePengirmanSkKematian` AFTER DELETE ON `tb_sk_kematian` FOR EACH ROW BEGIN
    DELETE FROM tb_pengiriman WHERE id_surat = old.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sk_keramaian`
--

CREATE TABLE `tb_sk_keramaian` (
  `id_surat` char(8) NOT NULL,
  `no_ttd_kiri` int(11) NOT NULL,
  `no_ttd_tengah` int(11) NOT NULL,
  `no_ttd_kanan` int(11) NOT NULL,
  `no_surat` char(18) NOT NULL,
  `nama_pemohon` varchar(35) NOT NULL,
  `no_nik` bigint(16) NOT NULL,
  `ttl` varchar(30) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `tempat_pelaksanaan` text NOT NULL,
  `hiburan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `tb_sk_keramaian`
--
DELIMITER $$
CREATE TRIGGER `deletePengirmanSkKeramaian` AFTER DELETE ON `tb_sk_keramaian` FOR EACH ROW BEGIN
    DELETE FROM tb_pengiriman WHERE id_surat = old.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_sk_usaha`
--

CREATE TABLE `tb_sk_usaha` (
  `id_surat` char(8) NOT NULL,
  `id_pejabat` char(4) NOT NULL,
  `no_surat` char(19) NOT NULL,
  `nama_pemohon` varchar(35) NOT NULL,
  `no_nik` bigint(16) NOT NULL,
  `ttl` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `tb_sk_usaha`
--
DELIMITER $$
CREATE TRIGGER `deletePengirmanSkUsaha` AFTER DELETE ON `tb_sk_usaha` FOR EACH ROW BEGIN
    DELETE FROM tb_pengiriman WHERE id_surat = old.id_surat;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttd_kanan`
--

CREATE TABLE `tb_ttd_kanan` (
  `no_ttd_kanan` int(11) NOT NULL,
  `id_pejabat` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ttd_kanan`
--

INSERT INTO `tb_ttd_kanan` (`no_ttd_kanan`, `id_pejabat`) VALUES
(1, 'PJ01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttd_kiri`
--

CREATE TABLE `tb_ttd_kiri` (
  `no_ttd_kiri` int(11) NOT NULL,
  `id_pejabat` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ttd_kiri`
--

INSERT INTO `tb_ttd_kiri` (`no_ttd_kiri`, `id_pejabat`) VALUES
(1, 'PJ03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ttd_tengah`
--

CREATE TABLE `tb_ttd_tengah` (
  `no_ttd_tengah` int(11) NOT NULL,
  `id_pejabat` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ttd_tengah`
--

INSERT INTO `tb_ttd_tengah` (`no_ttd_tengah`, `id_pejabat`) VALUES
(1, 'PJ04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `id_permohonan` (`id_permohonan`);

--
-- Indexes for table `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  ADD PRIMARY KEY (`id_inventaris`);

--
-- Indexes for table `tb_pejabat`
--
ALTER TABLE `tb_pejabat`
  ADD PRIMARY KEY (`id_pejabat`);

--
-- Indexes for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  ADD PRIMARY KEY (`no`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indexes for table `tb_sktm_sekolah`
--
ALTER TABLE `tb_sktm_sekolah`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- Indexes for table `tb_sk_desa`
--
ALTER TABLE `tb_sk_desa`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- Indexes for table `tb_sk_kematian`
--
ALTER TABLE `tb_sk_kematian`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- Indexes for table `tb_sk_keramaian`
--
ALTER TABLE `tb_sk_keramaian`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `no_ttd_kiri` (`no_ttd_kiri`),
  ADD KEY `no_ttd_tengah` (`no_ttd_tengah`),
  ADD KEY `no_ttd_kanan` (`no_ttd_kanan`);

--
-- Indexes for table `tb_sk_usaha`
--
ALTER TABLE `tb_sk_usaha`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- Indexes for table `tb_ttd_kanan`
--
ALTER TABLE `tb_ttd_kanan`
  ADD PRIMARY KEY (`no_ttd_kanan`),
  ADD KEY `id_surat` (`id_pejabat`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- Indexes for table `tb_ttd_kiri`
--
ALTER TABLE `tb_ttd_kiri`
  ADD PRIMARY KEY (`no_ttd_kiri`),
  ADD KEY `id_surat` (`id_pejabat`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- Indexes for table `tb_ttd_tengah`
--
ALTER TABLE `tb_ttd_tengah`
  ADD PRIMARY KEY (`no_ttd_tengah`),
  ADD KEY `id_surat` (`id_pejabat`),
  ADD KEY `id_pejabat` (`id_pejabat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `tb_inventaris`
--
ALTER TABLE `tb_inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `tb_pengiriman`
--
ALTER TABLE `tb_pengiriman`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tb_permohonan`
--
ALTER TABLE `tb_permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `tb_ttd_kanan`
--
ALTER TABLE `tb_ttd_kanan`
  MODIFY `no_ttd_kanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_ttd_kiri`
--
ALTER TABLE `tb_ttd_kiri`
  MODIFY `no_ttd_kiri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_ttd_tengah`
--
ALTER TABLE `tb_ttd_tengah`
  MODIFY `no_ttd_tengah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_berkas`
--
ALTER TABLE `tb_berkas`
  ADD CONSTRAINT `tb_berkas_ibfk_1` FOREIGN KEY (`id_permohonan`) REFERENCES `tb_permohonan` (`id_permohonan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sktm_sekolah`
--
ALTER TABLE `tb_sktm_sekolah`
  ADD CONSTRAINT `tb_sktm_sekolah_ibfk_1` FOREIGN KEY (`id_pejabat`) REFERENCES `tb_pejabat` (`id_pejabat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sk_desa`
--
ALTER TABLE `tb_sk_desa`
  ADD CONSTRAINT `tb_sk_desa_ibfk_1` FOREIGN KEY (`id_pejabat`) REFERENCES `tb_pejabat` (`id_pejabat`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_sk_kematian`
--
ALTER TABLE `tb_sk_kematian`
  ADD CONSTRAINT `tb_sk_kematian_ibfk_1` FOREIGN KEY (`id_pejabat`) REFERENCES `tb_pejabat` (`id_pejabat`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_sk_keramaian`
--
ALTER TABLE `tb_sk_keramaian`
  ADD CONSTRAINT `tb_sk_keramaian_ibfk_1` FOREIGN KEY (`no_ttd_kiri`) REFERENCES `tb_ttd_kiri` (`no_ttd_kiri`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_sk_keramaian_ibfk_2` FOREIGN KEY (`no_ttd_tengah`) REFERENCES `tb_ttd_tengah` (`no_ttd_tengah`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_sk_keramaian_ibfk_3` FOREIGN KEY (`no_ttd_kanan`) REFERENCES `tb_ttd_kanan` (`no_ttd_kanan`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_sk_usaha`
--
ALTER TABLE `tb_sk_usaha`
  ADD CONSTRAINT `tb_sk_usaha_ibfk_1` FOREIGN KEY (`id_pejabat`) REFERENCES `tb_pejabat` (`id_pejabat`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_ttd_kanan`
--
ALTER TABLE `tb_ttd_kanan`
  ADD CONSTRAINT `tb_ttd_kanan_ibfk_2` FOREIGN KEY (`id_pejabat`) REFERENCES `tb_pejabat` (`id_pejabat`) ON DELETE CASCADE;

--
-- Constraints for table `tb_ttd_kiri`
--
ALTER TABLE `tb_ttd_kiri`
  ADD CONSTRAINT `tb_ttd_kiri_ibfk_2` FOREIGN KEY (`id_pejabat`) REFERENCES `tb_pejabat` (`id_pejabat`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_ttd_tengah`
--
ALTER TABLE `tb_ttd_tengah`
  ADD CONSTRAINT `tb_ttd_tengah_ibfk_2` FOREIGN KEY (`id_pejabat`) REFERENCES `tb_pejabat` (`id_pejabat`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
