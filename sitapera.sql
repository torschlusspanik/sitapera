-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 08, 2023 at 05:13 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sitapera`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_permintaan`
--

CREATE TABLE `db_permintaan` (
  `id_db_permintaan` int(11) NOT NULL,
  `sess_id` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_permintaan` time NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jam_selesai` time NOT NULL,
  `urgas` varchar(100) NOT NULL,
  `status_db_permintaan` int(11) NOT NULL,
  `unit_kerja_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `sub_kategori_id` int(11) NOT NULL,
  `signature` varchar(250) NOT NULL,
  `signature_iprs` varchar(250) NOT NULL,
  `signature_mengetahui` varchar(250) NOT NULL,
  `hasil_kgt` varchar(250) NOT NULL,
  `bhn_hasil` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(100) NOT NULL,
  `nama_dokumen` varchar(250) NOT NULL,
  `status_dokumen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(100) NOT NULL,
  `nama_kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Listrik'),
(2, 'Bangunan'),
(3, 'Elektromedik');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(100) NOT NULL,
  `nama_petugas` varchar(250) NOT NULL,
  `tgl_lahir_petugas` date NOT NULL,
  `jk_petugas` varchar(250) NOT NULL,
  `status_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `tgl_lahir_petugas`, `jk_petugas`, `status_petugas`) VALUES
(1, 'Pongky Septiandy', '2023-07-01', 'Laki-Laki', 1),
(2, 'Ridho Armi Nabawi', '2023-07-01', 'Laki-Laki', 1),
(3, 'Aljaziroh Jannatul Maghfiroh', '2023-07-01', 'Perempuan', 1),
(4, 'Nasrullah', '2023-07-01', 'Laki-Laki', 1),
(5, 'Maulana Benhur', '2023-07-01', 'Laki-Laki', 1),
(6, 'Sefhanus Widyanto', '2023-07-01', 'Laki-Laki', 1),
(7, 'Fredy David Nirwana', '2023-07-01', 'Laki-Laki', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_kategori` int(100) NOT NULL,
  `nama_sub_kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub_kategori`, `nama_sub_kategori`) VALUES
(1, 'lampu mati'),
(2, 'stop kontak rusak'),
(3, 'telpon rusak'),
(4, 'air mati'),
(5, 'pasang telpon'),
(6, 'sound rusak'),
(7, 'microfon rusak'),
(8, 'kipas angin rusak'),
(9, 'lemari es rusak'),
(10, 'pintu rusak'),
(11, 'wastafel rusak'),
(12, 'printer rusak'),
(13, 'komputer rusak'),
(14, 'AC rusak'),
(15, 'lemari rusak'),
(16, 'kursi rusak'),
(17, 'meja rusak'),
(18, 'pasien monitor error'),
(19, 'tensi digital error'),
(20, 'ECG error'),
(21, 'lampu tindakan error'),
(22, 'dental unit error'),
(23, 'film viewer error'),
(24, 'nebulizer error'),
(25, 'infant warmer error'),
(26, 'CPAP error'),
(27, 'infra red error'),
(28, 'hepafilter error'),
(29, 'lampu operasi error'),
(30, 'USG error'),
(31, 'X-Ray error'),
(32, 'termometer error'),
(33, 'doppler error');

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id_unit` int(100) NOT NULL,
  `nama_unit` varchar(250) NOT NULL,
  `status_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit_kerja`
--

INSERT INTO `unit_kerja` (`id_unit`, `nama_unit`, `status_unit`) VALUES
(1, 'Admisi Pendaftaran', 1),
(2, 'Admisi IGD', 1),
(3, 'IGD', 1),
(4, 'Poliklinik', 1),
(5, 'Rawat Inap', 1),
(6, 'Farmasi', 1),
(7, 'Laboratorium', 1),
(8, 'Radiologi', 1),
(9, 'Gizi', 1),
(10, 'Kasir', 1),
(11, 'OK', 1),
(12, 'ICU', 1),
(13, 'Rekam Medis', 1),
(14, 'Humas', 1),
(15, 'Verifikasi', 1),
(16, 'IPRS', 1),
(17, 'Kesehatan Lingkungan', 1),
(18, 'Keuangan', 1),
(19, 'Umum - Kepegawaian', 1),
(20, 'Perencanaan', 1),
(21, 'IT - SIMRS', 1),
(22, 'CSSD', 1),
(23, 'Laundry', 1),
(24, 'Kamar Jenasah', 1),
(25, 'Ambulans', 1),
(26, 'Pengelolaan Aset', 1),
(27, 'Logistik', 1),
(28, 'Pengamanan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id_user` int(100) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tanggal_lahir_lgn` date NOT NULL,
  `jk_lgn` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `hp` varchar(250) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id_user`, `nama`, `tanggal_lahir_lgn`, `jk_lgn`, `email`, `hp`, `username`, `password`, `level`, `image`, `date_created`, `is_active`) VALUES
(1, 'Administrator', '2023-01-01', 'Laki-Laki', 'admin@gmail.com', '081234567890', 'admin', '$2y$10$/DzJH0KwhvtZDIEI.koBBO9PSN6a3osCq1KZJGF9LGDG5MEHHUTDG', 'Admin', 'avatar5.png', '2023-07-01', 1),
(54, 'Operator', '2023-07-01', 'Perempuan', 'operator@gmail.com', '081111111111', 'operator', '$2y$10$05oNgh292nLVllOEIoS.POoBejp9H8B0zEtZkI6KKK06yFTSqiqO.', 'Admin', 'default.jpg', '2023-07-08', 1),
(55, 'Unit', '2023-07-01', 'Laki-Laki', 'unit@gmail.com', '082222222222', 'unit', '$2y$10$HqaD680zEUlNsm0ZRR.5cuGQ5fBhaHCJyAXdZuuLilCm1VBsMf.eq', 'User', 'default.jpg', '2023-07-08', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_permintaan`
--
ALTER TABLE `db_permintaan`
  ADD PRIMARY KEY (`id_db_permintaan`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`);

--
-- Indexes for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_permintaan`
--
ALTER TABLE `db_permintaan`
  MODIFY `id_db_permintaan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id_unit` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
