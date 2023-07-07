-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 05, 2023 at 06:53 
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
-- Table structure for table `data_keluarga`
--

CREATE TABLE `data_keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `kk_id` int(11) NOT NULL,
  `nama_keluarga` text NOT NULL,
  `status_hubungan` text NOT NULL,
  `tmpt_lahir` text NOT NULL,
  `tgl_lahir_keluarga` date NOT NULL,
  `alamat` text NOT NULL,
  `telp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_warga`
--

CREATE TABLE `data_warga` (
  `id_warga` int(11) NOT NULL,
  `tgl_register` date NOT NULL,
  `nama_warga` varchar(250) NOT NULL,
  `tempat_lahir` varchar(250) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat_sekarang` varchar(250) NOT NULL,
  `jml_keluarga` int(11) NOT NULL,
  `no_nik` varchar(250) NOT NULL,
  `no_kk` varchar(250) NOT NULL,
  `alamat_asal` varchar(250) NOT NULL,
  `no_telp` varchar(250) NOT NULL,
  `status_nikah` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_dokumen`
--

CREATE TABLE `db_dokumen` (
  `id_db_dokumen` int(11) NOT NULL,
  `sess_id` int(11) NOT NULL,
  `tgl_dokumen` date NOT NULL,
  `tgl_respon` date NOT NULL,
  `no_dokumen` varchar(250) NOT NULL,
  `dokumen_id` int(11) NOT NULL,
  `pembuat` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `pengantar` varchar(250) NOT NULL,
  `tmp_lhr` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat_pembuat` varchar(150) NOT NULL,
  `alamat_usaha` varchar(150) NOT NULL,
  `alamat_tujuan` varchar(150) NOT NULL,
  `ktp_pelapor` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `ket_db_dok` varchar(250) NOT NULL,
  `nama_usaha` varchar(150) NOT NULL,
  `hub` varchar(20) NOT NULL,
  `nama_pelapor` varchar(150) NOT NULL,
  `nik_pelapor` varchar(16) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `no_msn` varchar(17) NOT NULL,
  `atn` varchar(250) NOT NULL,
  `jns` varchar(250) NOT NULL,
  `wrn` varchar(50) NOT NULL,
  `no_polisi` varchar(8) NOT NULL,
  `no_rgk` varchar(17) NOT NULL,
  `no_bpkb` varchar(8) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `tgl_mgl` date NOT NULL,
  `ayah` varchar(150) NOT NULL,
  `ibu` varchar(150) NOT NULL,
  `anakke` varchar(2) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `ktp` varchar(250) NOT NULL,
  `kk` varchar(250) NOT NULL,
  `lampiran` varchar(250) NOT NULL,
  `lampiran2` varchar(250) NOT NULL,
  `lampiran3` varchar(250) NOT NULL,
  `lampiran4` varchar(250) NOT NULL,
  `status_db_dokumen` int(11) NOT NULL,
  `awee` varchar(123) NOT NULL,
  `unit_kerja_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `sub_kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_permintaan`
--

CREATE TABLE `db_permintaan` (
  `id_db_permintaan` int(11) NOT NULL,
  `sess_id` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `jam_permintaan` time NOT NULL,
  `tgl_respon` date NOT NULL,
  `urgas` varchar(100) NOT NULL,
  `status_db_permintaan` int(11) NOT NULL,
  `unit_kerja_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `sub_kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_pesan`
--

CREATE TABLE `db_pesan` (
  `id_pesan` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `nama_pesan` text NOT NULL,
  `email_pesan` text NOT NULL,
  `subyek_pesan` text NOT NULL,
  `pesan` text NOT NULL,
  `aweee` varchar(123) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `profile_desa`
--

CREATE TABLE `profile_desa` (
  `id_profile` int(11) NOT NULL,
  `nama_website` text NOT NULL,
  `nama_desa` text NOT NULL,
  `alamat_desa` text NOT NULL,
  `email_desa` text NOT NULL,
  `penanggung_jawab` text NOT NULL,
  `telp_desa` text NOT NULL,
  `whatsapp_desa` text NOT NULL,
  `map_desa` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_kategori` int(100) NOT NULL,
  `nama_sub_kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id_unit` int(100) NOT NULL,
  `nama_unit` varchar(250) NOT NULL,
  `status_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload_dokumen`
--

CREATE TABLE `upload_dokumen` (
  `id_upload_dokumen` int(11) NOT NULL,
  `db_dokumen_id` int(11) NOT NULL,
  `tgl_upload` date NOT NULL,
  `no_dokumen_upload` text NOT NULL,
  `file_dokumen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'admin', '1998-05-29', 'Laki-Laki', 'admin@gmail.com', '085158398392', 'admin', '$2y$10$BvwR9yx/Qz8akN2kDos6.OM.JKNZMTyArEY0BqwNgEzEUVYTlfiui', 'Admin', 'hasil.jpg', '2022-03-01', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  ADD PRIMARY KEY (`id_keluarga`);

--
-- Indexes for table `data_warga`
--
ALTER TABLE `data_warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- Indexes for table `db_dokumen`
--
ALTER TABLE `db_dokumen`
  ADD PRIMARY KEY (`id_db_dokumen`);

--
-- Indexes for table `db_permintaan`
--
ALTER TABLE `db_permintaan`
  ADD PRIMARY KEY (`id_db_permintaan`);

--
-- Indexes for table `db_pesan`
--
ALTER TABLE `db_pesan`
  ADD PRIMARY KEY (`id_pesan`);

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
-- Indexes for table `profile_desa`
--
ALTER TABLE `profile_desa`
  ADD PRIMARY KEY (`id_profile`);

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
-- Indexes for table `upload_dokumen`
--
ALTER TABLE `upload_dokumen`
  ADD PRIMARY KEY (`id_upload_dokumen`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_keluarga`
--
ALTER TABLE `data_keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_warga`
--
ALTER TABLE `data_warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_dokumen`
--
ALTER TABLE `db_dokumen`
  MODIFY `id_db_dokumen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_permintaan`
--
ALTER TABLE `db_permintaan`
  MODIFY `id_db_permintaan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_pesan`
--
ALTER TABLE `db_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profile_desa`
--
ALTER TABLE `profile_desa`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub_kategori` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id_unit` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upload_dokumen`
--
ALTER TABLE `upload_dokumen`
  MODIFY `id_upload_dokumen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
