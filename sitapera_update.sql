-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2023 pada 17.08
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Struktur dari tabel `db_permintaan`
--

CREATE TABLE `db_permintaan` (
  `id_db_permintaan` int(11) NOT NULL,
  `sess_id` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL,
  `jam_permintaan` time NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jam_selesai` time NOT NULL,
  `urgas` varchar(100) NOT NULL,
  `status_db_permintaan` int(11) NOT NULL,
  `unit_kerja_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `sub_kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_permintaan`
--

INSERT INTO `db_permintaan` (`id_db_permintaan`, `sess_id`, `tgl_permintaan`, `jam_permintaan`, `tgl_selesai`, `jam_selesai`, `urgas`, `status_db_permintaan`, `unit_kerja_id`, `petugas_id`, `kategori_id`, `sub_kategori_id`) VALUES
(1, 52, '2023-07-04', '05:06:55', '2023-07-07', '17:00:46', '', 5, 25, 0, 25, 25),
(2, 52, '2023-07-04', '05:08:52', '2023-07-07', '17:01:56', '', 5, 25, 30, 2, 1),
(3, 52, '2023-07-04', '07:12:04', '2023-07-07', '17:02:07', 'ahee', 5, 25, 30, 2, 1),
(5, 52, '2023-07-05', '15:00:00', '2023-07-07', '22:05:37', 'ehehe', 5, 25, 30, 1, 1),
(6, 52, '2023-07-05', '05:10:07', '2023-07-07', '16:39:31', 'aw', 5, 25, 30, 1, 1),
(7, 52, '2023-07-05', '05:10:27', '2023-07-07', '16:45:30', 'a', 5, 25, 0, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(100) NOT NULL,
  `nama_dokumen` varchar(250) NOT NULL,
  `status_dokumen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `nama_dokumen`, `status_dokumen`) VALUES
(8, 'SURAT KELAHIRAN', 0),
(9, 'SURAT KETERANGAN USAHA', 1),
(10, 'SURAT PENGANTAR SKCK', 1),
(11, 'SURAT KETERANGAN TIDAK MAMPU', 1),
(12, 'SURAT PINDAH PENDUDUK', 1),
(13, 'SURAT KEMATIAN', 1),
(14, 'SURAT DOMISILI UMUM', 1),
(15, 'SURAT DOMISILI TEMPAT USAHA', 1),
(16, 'SURAT KEPEMILIKAN KENDARAAN', 1),
(17, 'SURAT KEPEMILIKAN TANAH', 1),
(18, 'PENGAJUAN SURAT PERBEDAAN DOKUMEN', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(100) NOT NULL,
  `nama_kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'KERUSAKAN HARDWARE123123123'),
(2, 'KERUSAKAN SOFTWARE'),
(4, 'wewew');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(100) NOT NULL,
  `nama_petugas` varchar(250) NOT NULL,
  `tgl_lahir_petugas` date NOT NULL,
  `jk_petugas` varchar(250) NOT NULL,
  `status_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `tgl_lahir_petugas`, `jk_petugas`, `status_petugas`) VALUES
(30, 'awewww', '2023-04-06', 'Perempuan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_kategori` int(100) NOT NULL,
  `nama_sub_kategori` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub_kategori`, `nama_sub_kategori`) VALUES
(1, 'sub');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_kerja`
--

CREATE TABLE `unit_kerja` (
  `id_unit` int(100) NOT NULL,
  `nama_unit` varchar(250) NOT NULL,
  `status_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `unit_kerja`
--

INSERT INTO `unit_kerja` (`id_unit`, `nama_unit`, `status_unit`) VALUES
(25, 'tes5', 1),
(26, 'awe', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
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
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`id_user`, `nama`, `tanggal_lahir_lgn`, `jk_lgn`, `email`, `hp`, `username`, `password`, `level`, `image`, `date_created`, `is_active`) VALUES
(1, 'admin', '1998-05-29', 'Laki-Laki', 'admin@gmail.com', '085158398392', 'admin', '$2y$10$BvwR9yx/Qz8akN2kDos6.OM.JKNZMTyArEY0BqwNgEzEUVYTlfiui', 'Admin', '3a1c67e8-064d-4f56-80eb-feced76cad3e_16919_(2).jpg', '2022-03-01', 1),
(46, 'Bachtiar Setyo', '1998-05-29', 'Laki-Laki', 'neerdowells98@gmail.com', '081249485577', 'bachtiar', '$2y$10$ZFnbHsasyHM1bcArob/5tuTs3HzsV0ChPT/RKQqtewHqBCEl./gS6', 'User', 'default.jpg', '2022-07-15', 1),
(47, 'Hakim Azhari', '1991-02-26', 'Laki-Laki', 'hakim2206@gmail.com', '085158398392', 'hakim', '$2y$10$RnMhN0MChOuBI3tbZLVYuOC13yMAiOklRsyMu8EGfbo.Bj96BwUWS', 'Admin', '2990411545_e7dee57164_b.jpg', '2022-07-15', 1),
(49, 'Putri Pangaribuan', '1996-11-04', 'Perempuan', 'Putri_pangaribuan@gmail.com', '081255913148', 'putri', '$2y$10$Mc7rdhBLmIzfFKYd39BN8uSg/baoEt41XxMNz6YOiM5r9E9GYJU8G', 'User', 'default.jpg', '2022-07-15', 1),
(50, 'Luluk ambarwati', '2000-02-26', 'Perempuan', 'luluklaw@gmail.com', '08515812941', 'luluk', '$2y$10$vbVwKGOkUPsIP3fD10IKQurxN/FVHYOvBhzlBfzcOLUq05fyglU8C', 'User', 'default.jpg', '2022-07-15', 0),
(51, 'Tulus Kodir', '1945-10-15', 'Laki-Laki', 'tuluskodir881@yahoo.co.id', '081229485712', 'tulus', '$2y$10$Wklp8K/Ri4zidGb1pROYo.ymU0wF7FxEKqpF.ISQfetkGPrsR63Iq', 'User', 'default.jpg', '2022-07-15', 1),
(52, 'bachtiar setyo', '2023-06-03', 'Perempuan', 'farhad_rachman@yahoo.com', '5', 'bg', '$2y$10$a83VierLORRQO4qwA2M.xeR0z8AQ1U1NKvYuYWjFDpj9PCTsRQKUi', 'User', 'default.jpg', '2023-06-26', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `db_permintaan`
--
ALTER TABLE `db_permintaan`
  ADD PRIMARY KEY (`id_db_permintaan`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`);

--
-- Indeks untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indeks untuk tabel `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `db_permintaan`
--
ALTER TABLE `db_permintaan`
  MODIFY `id_db_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub_kategori` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `unit_kerja`
--
ALTER TABLE `unit_kerja`
  MODIFY `id_unit` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
