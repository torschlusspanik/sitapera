-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2023 pada 00.36
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
-- Struktur dari tabel `data_keluarga`
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

--
-- Dumping data untuk tabel `data_keluarga`
--

INSERT INTO `data_keluarga` (`id_keluarga`, `kk_id`, `nama_keluarga`, `status_hubungan`, `tmpt_lahir`, `tgl_lahir_keluarga`, `alamat`, `telp`) VALUES
(2, 3, 'asd', 'Anak', 'asdasd', '2022-04-16', 'xdzcxzczxc', '12312321'),
(3, 3, 'hola', 'Anak', 'asdasd', '2022-03-28', '123', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_warga`
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

--
-- Dumping data untuk tabel `data_warga`
--

INSERT INTO `data_warga` (`id_warga`, `tgl_register`, `nama_warga`, `tempat_lahir`, `tgl_lahir`, `alamat_sekarang`, `jml_keluarga`, `no_nik`, `no_kk`, `alamat_asal`, `no_telp`, `status_nikah`) VALUES
(3, '2022-04-01', 'bachtiar setyo', 'jombang', '2022-04-07', 'jl pb sudirman no 57', 1, '123123131', '1231231321', 'jl pb sudirman no 57', '12123131', 'kawin'),
(4, '2022-04-01', 'asdasd', '231', '2022-02-10', '1231313', 1, '123', '1231231', 'jl pb sudirman no 57', '1', 'Belum Kawin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_dokumen`
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

--
-- Dumping data untuk tabel `db_dokumen`
--

INSERT INTO `db_dokumen` (`id_db_dokumen`, `sess_id`, `tgl_dokumen`, `tgl_respon`, `no_dokumen`, `dokumen_id`, `pembuat`, `no_hp`, `pengantar`, `tmp_lhr`, `tgl_lahir`, `jk`, `alamat_pembuat`, `alamat_usaha`, `alamat_tujuan`, `ktp_pelapor`, `keterangan`, `ket_db_dok`, `nama_usaha`, `hub`, `nama_pelapor`, `nik_pelapor`, `agama`, `no_msn`, `atn`, `jns`, `wrn`, `no_polisi`, `no_rgk`, `no_bpkb`, `tahun`, `tgl_mgl`, `ayah`, `ibu`, `anakke`, `nik`, `ktp`, `kk`, `lampiran`, `lampiran2`, `lampiran3`, `lampiran4`, `status_db_dokumen`, `awee`, `unit_kerja_id`, `kategori_id`, `sub_kategori_id`) VALUES
(74, 50, '2022-07-15', '0000-00-00', 'jombatan/20220715/144915', 9, 'Luluk ambarwati', '063263226363', '2990411545_e7dee57164_b1.jpg', 'jombang', '2022-06-28', 'Perempuan', 'jl pb sudirman no 57', 'jl pb sudirman no 57', '', '', '', '', 'PT testing 3', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '6666666666666666', '2990411545_e7dee57164_b.jpg', '', '', '2990411545_e7dee57164_b2.jpg', '2990411545_e7dee57164_b3.jpg', '2990411545_e7dee57164_b3.jpg', 1, '', 0, 0, 0),
(75, 50, '2022-07-15', '2023-07-01', 'jombatan/20220715/145923', 16, 'Luluk ambarwati', '063263226363', 'contoh-surat-pernyataan-jual-beli-rumah-dan-tanah.jpg', '', '0000-00-00', '', 'jl pb sudirman no 57', '', '', '', '', '', '', '', '', '', '', '08515812941', 'bachtiar', 'Suzuki PCX', 'Hitam', 'S 5592 C', '08515812941', '08515812', '1998', '0000-00-00', '', '', '', '3517092905980002', '1.jpeg', '', '', '741222741c5c890d348feccd8a3c0048.jpg', '', '', 2, '', 0, 0, 0),
(76, 46, '2022-07-15', '0000-00-00', 'jombatan/20220715/150040', 10, 'bachtiar setyo', '063263226363', 'contoh-surat-pernyataan-jual-beli-rumah-dan-tanah1.jpg', 'jombang', '1998-05-29', 'Laki-Laki', 'jl pb sudirman no 57', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '3517092905980002', '3.jpg', '', '', 'hasil21.jpg', '', '', 0, '', 0, 0, 0),
(77, 46, '2022-07-16', '2022-07-15', 'jombatan/20220716/001858', 10, 'bachtiar setyo', '063263226363', '2990411545_e7dee57164_b5.jpg', 'jombang', '1998-05-29', 'Laki-Laki', 'jl pb sudirman no 57', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '3517092905980002', '2990411545_e7dee57164_b4.jpg', '', '', '2990411545_e7dee57164_b6.jpg', '', '', 1, '', 0, 0, 0),
(78, 46, '2022-08-10', '0000-00-00', 'jombatan/20220810/073755', 10, 'bachtiar setyo', '063263226363', '290233007_597156475100590_2473471881894861058_n.jpg', 'jombang', '1998-05-29', 'Laki-Laki', 'jl pb sudirman no 57', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '1231232132131231', '8ed1e4ef53ebfff78d3a13850eac10533.jpg', '', '', '123438609_3457676130993653_7086659335539606238_n.jpg', '', '', 0, '', 0, 0, 0),
(79, 46, '2022-08-10', '0000-00-00', 'jombatan/20220810/075013', 15, 'Bachtiar Setyo', '081249485577', '8ed1e4ef53ebfff78d3a13850eac10534.jpg', '', '1998-05-29', '', 'sad', 'ad', '', '', '12424', '', 'asd', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '123123', '3a2bcc66ced74b17ecab946dc193a2c84f89d033_full32.jpg', '3a2bcc66ced74b17ecab946dc193a2c84f89d033_full32.jpg', '', '295577511_614899006644133_4147462711925752855_n.jpg', '', '', 0, '', 0, 0, 0),
(80, 46, '2022-08-10', '0000-00-00', 'jombatan/20220810/075243', 10, 'Bachtiar Setyo', '081249485577', '290919480_114506531299020_4921337391829809821_n.jpg', 'asd', '1998-05-29', 'Laki-Laki', 'asd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '123', '291221116_110635758365660_3303818790036294999_n.jpg', '', '', '296361331_735328264414688_8938752428924999954_n.jpg', '', '', 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_permintaan`
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

--
-- Dumping data untuk tabel `db_permintaan`
--

INSERT INTO `db_permintaan` (`id_db_permintaan`, `sess_id`, `tgl_permintaan`, `jam_permintaan`, `tgl_respon`, `urgas`, `status_db_permintaan`, `unit_kerja_id`, `petugas_id`, `kategori_id`, `sub_kategori_id`) VALUES
(1, 52, '2023-07-04', '05:06:55', '0000-00-00', '', 1, 25, 0, 25, 25),
(2, 52, '2023-07-04', '05:08:52', '0000-00-00', '', 1, 25, 0, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_pesan`
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

--
-- Dumping data untuk tabel `db_pesan`
--

INSERT INTO `db_pesan` (`id_pesan`, `tgl_pesan`, `nama_pesan`, `email_pesan`, `subyek_pesan`, `pesan`, `aweee`) VALUES
(6, '2022-04-01', 'hai', 'neerdowells98@gmail.com', 'hehe', 'hwhwhww', '');

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
-- Struktur dari tabel `profile_desa`
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

--
-- Dumping data untuk tabel `profile_desa`
--

INSERT INTO `profile_desa` (`id_profile`, `nama_website`, `nama_desa`, `alamat_desa`, `email_desa`, `penanggung_jawab`, `telp_desa`, `whatsapp_desa`, `map_desa`) VALUES
(1, 'KelurahanKu', 'Jombatan', 'Jl. Ki Hajar Dewantara No.1, Jombatan, Kec. Jombang, Kabupaten Jombang, Jawa Timur 61419', 'neerdowells98@gmail.com', 'Indra Lesmana S.H', '0321-873254', '085158398392', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.223402432722!2d112.23014006633674!3d-7.550601136947762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5100e2141de084d%3A0x6cb659a540ce6713!2sKelurahan%20Jombatan!5e0!3m2!1sid!2sid!4v1648776944661!5m2!1sid!2sid');

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
-- Struktur dari tabel `upload_dokumen`
--

CREATE TABLE `upload_dokumen` (
  `id_upload_dokumen` int(11) NOT NULL,
  `db_dokumen_id` int(11) NOT NULL,
  `tgl_upload` date NOT NULL,
  `no_dokumen_upload` text NOT NULL,
  `file_dokumen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `upload_dokumen`
--

INSERT INTO `upload_dokumen` (`id_upload_dokumen`, `db_dokumen_id`, `tgl_upload`, `no_dokumen_upload`, `file_dokumen`) VALUES
(6, 5, '2022-04-01', 'SDS/20220401/094707', '2022-01-10 18-12-51_00_00_44_04_Still001.bmp'),
(7, 6, '2022-04-01', 'SDS/20220401/102647', '53-537898_38444471-sweating-towel-guy-meme-template-clipart.png'),
(8, 11, '2022-04-04', 'SDS/20220404/110801', '133659736_4888934984511834_7442280315044412045_n1.jpg'),
(9, 28, '2022-06-29', 'jombatan/20220524/024802', 'Logo Kabupaten Jombang.png'),
(10, 30, '2022-06-29', 'jombatan/20220626/205317', 'doc.pdf'),
(11, 37, '2022-07-01', 'jombatan/20220701/162901', 'Logo Kabupaten Jombang.png'),
(12, 39, '2022-07-01', 'jombatan/20220701/163651', 'dokumen1_21.pdf'),
(13, 43, '2022-07-12', 'jombatan/20220712/130727', 'SKRIPSI_2021_Diska_revisi_13_16-03-2022_(1).pdf'),
(14, 53, '2022-07-12', 'jombatan/20220712/203339', 'FORMULER_F1_02.pdf'),
(15, 0, '2022-07-12', '', ''),
(16, 0, '2022-07-12', '', ''),
(17, 76, '2022-07-28', 'jombatan/20220715/150040', 'SKRIPSI bachtiar-1.pdf'),
(18, 78, '2022-08-10', 'jombatan/20220810/073755', 'skripsi_4118012_sidang.pdf'),
(19, 79, '2022-08-10', 'jombatan/20220810/075013', 'testupl.pdf'),
(20, 80, '2022-08-10', 'jombatan/20220810/075243', 'testuplskck.pdf');

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
(1, 'admin', '1998-05-29', 'Laki-Laki', 'admin@gmail.com', '085158398392', 'admin', '$2y$10$BvwR9yx/Qz8akN2kDos6.OM.JKNZMTyArEY0BqwNgEzEUVYTlfiui', 'Admin', 'hasil.jpg', '2022-03-01', 1),
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
-- Indeks untuk tabel `data_keluarga`
--
ALTER TABLE `data_keluarga`
  ADD PRIMARY KEY (`id_keluarga`);

--
-- Indeks untuk tabel `data_warga`
--
ALTER TABLE `data_warga`
  ADD PRIMARY KEY (`id_warga`);

--
-- Indeks untuk tabel `db_dokumen`
--
ALTER TABLE `db_dokumen`
  ADD PRIMARY KEY (`id_db_dokumen`);

--
-- Indeks untuk tabel `db_permintaan`
--
ALTER TABLE `db_permintaan`
  ADD PRIMARY KEY (`id_db_permintaan`);

--
-- Indeks untuk tabel `db_pesan`
--
ALTER TABLE `db_pesan`
  ADD PRIMARY KEY (`id_pesan`);

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
-- Indeks untuk tabel `profile_desa`
--
ALTER TABLE `profile_desa`
  ADD PRIMARY KEY (`id_profile`);

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
-- Indeks untuk tabel `upload_dokumen`
--
ALTER TABLE `upload_dokumen`
  ADD PRIMARY KEY (`id_upload_dokumen`);

--
-- Indeks untuk tabel `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_keluarga`
--
ALTER TABLE `data_keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_warga`
--
ALTER TABLE `data_warga`
  MODIFY `id_warga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `db_dokumen`
--
ALTER TABLE `db_dokumen`
  MODIFY `id_db_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `db_permintaan`
--
ALTER TABLE `db_permintaan`
  MODIFY `id_db_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `db_pesan`
--
ALTER TABLE `db_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT untuk tabel `profile_desa`
--
ALTER TABLE `profile_desa`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT untuk tabel `upload_dokumen`
--
ALTER TABLE `upload_dokumen`
  MODIFY `id_upload_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
