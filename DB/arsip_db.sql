-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Mar 2022 pada 15.14
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_arsip_inaktif`
--

CREATE TABLE `tbl_arsip_inaktif` (
  `id` int(11) NOT NULL,
  `id_arsip_inaktif` varchar(255) NOT NULL,
  `id_klasifikasi` varchar(255) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tanggal_akhir_surat` date NOT NULL,
  `id_perkembangan` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_satuan` varchar(255) NOT NULL,
  `keterangan_arsip` varchar(255) NOT NULL,
  `no_folder_books` varchar(255) NOT NULL,
  `lokasi_simpan` varchar(255) NOT NULL,
  `masuk_pengolah` date NOT NULL,
  `id_retensi` varchar(255) NOT NULL,
  `id_kategori_arsip` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_arsip_inaktif`
--

INSERT INTO `tbl_arsip_inaktif` (`id`, `id_arsip_inaktif`, `id_klasifikasi`, `isi`, `tgl_surat`, `tanggal_akhir_surat`, `id_perkembangan`, `jumlah`, `id_satuan`, `keterangan_arsip`, `no_folder_books`, `lokasi_simpan`, `masuk_pengolah`, `id_retensi`, `id_kategori_arsip`, `id_user`, `created_at`, `updated_at`) VALUES
(14, 'INAKTIF-6229a2c348b2a', 'KLASIFIKASI-621b033317fec', 'Mohon Pembetulan Masa Kerja a.n. Yuyun Nalifah, S.E', '2022-03-10', '2030-08-10', 'PERKEMBANGAN-62178b36aa1d6', 1, 'SATUAN-621a381ab550c', 'Tekstual Baik', '9.1', 'Sekretariat', '2032-08-10', 'RETENSI-62179e83ec6e5', 'KATEGORI-621709dedb052', 'USER-62165225b5f18', '2022-03-10 14:03:31', '2022-03-10 14:03:31'),
(15, 'INAKTIF-622aa1b7cbea4', 'KLASIFIKASI-6217106a8c29b', 'Surat Pernyataan Pelantikan a.n. Faida Aryani, S.E.', '2022-03-18', '2027-07-18', 'PERKEMBANGAN-62178b36aa1d6', 1, 'SATUAN-621a381ab550c', 'Tekstual Baik', '9.1', 'Sekretariat', '2029-07-18', 'RETENSI-62179e83ec6e5', 'KATEGORI-621709dedb052', 'USER-62165225b5f18', '2022-03-11 08:11:19', '2022-03-11 08:17:52'),
(16, 'INAKTIF-622e9cff27ef4', 'KLASIFIKASI-621b033317fec', 'Pengangkatan / Penunjukan dalam Jabatan Struktural Eselon IV di Lingkungan Pemerintah Kabupaten Kudus', '2022-03-14', '2023-07-14', 'PERKEMBANGAN-621a3f0a4fc76', 1, 'SATUAN-621a381ab550c', 'Tekstual Baik', '5.1', 'Bappeda Kudus', '2025-07-14', 'RETENSI-62179e83ec6e5', 'KATEGORI-621709dedb052', 'USER-62165225b5f18', '2022-03-14 08:40:15', '2022-03-14 14:05:34'),
(17, 'INAKTIF-622ea041599f3', 'KLASIFIKASI-621b033317fec', 'Kenaikan Gaji Berkala a.n. Yogi Kuntoro, ST, Cs', '2024-07-14', '2027-12-14', 'PERKEMBANGAN-62178b36aa1d6', 1, 'SATUAN-621a381ab550c', 'Tekstual Baik', '5.1', 'Sekretariat', '2029-12-14', 'RETENSI-6217a19048ae4', 'KATEGORI-621709dedb052', 'USER-62165225b5f18', '2022-03-14 08:54:09', '2022-03-14 08:54:09'),
(18, 'INAKTIF-622ee97da3ac7', 'KLASIFIKASI-6217106a8c29b', 'Nota Dinas Laporan', '2022-03-14', '2022-03-14', 'PERKEMBANGAN-62178b36aa1d6', 1, 'SATUAN-621a3824e2ada', 'Tekstual Baik', '13.1', 'Sekretariat', '2024-03-14', 'RETENSI-62179e83ec6e5', 'KATEGORI-62170519c89f6', 'USER-62165225b5f18', '2022-03-14 14:06:37', '2022-03-14 14:06:37'),
(20, 'INAKTIF-622f47a40222e', 'KLASIFIKASI-621b033317fec', 'Menghadapkan Pejabat Baru a.n Matta Tyas Kaesti, S.Si', '2013-01-14', '2017-01-14', 'PERKEMBANGAN-621a3f0a4fc76', 5, 'SATUAN-621a381ab550c', 'Tekstual Baik', '13.1', 'Sekretariat', '2019-01-14', 'RETENSI-62179e83ec6e5', 'KATEGORI-621709dedb052', 'USER-62165225b5f18', '2022-03-14 20:48:20', '2022-03-14 20:48:20'),
(21, 'INAKTIF-6232eb49b7629', 'KLASIFIKASI-6217106a8c29b', 'Peserta Bimtek Keahlian Pengadaan Barang / Jasa Pemerintah a.n. Yusuf Iswahyudi', '2015-06-17', '2017-06-17', 'PERKEMBANGAN-62178b36aa1d6', 1, 'SATUAN-621a381ab550c', 'Tekstual Baik', '12.1', 'Bappeda Kudus', '2019-06-17', 'RETENSI-62179e83ec6e5', 'KATEGORI-621709dedb052', 'USER-62165225b5f18', '2022-03-17 15:03:21', '2022-03-19 22:58:34'),
(22, 'INAKTIF-6232edaaa8633', 'KLASIFIKASI-6217106a8c29b', 'Pajak Penghasilan Orang Pribadi (PPh Pasal 21 ) a.n. Susie Prabaningsih, A.Md, Cs', '2016-07-17', '2017-01-17', 'PERKEMBANGAN-62178b36aa1d6', 1, 'SATUAN-621a381ab550c', 'Tekstual Baik', '12.1', 'Sekretariat', '2019-01-17', 'RETENSI-62179e83ec6e5', 'KATEGORI-62170519c89f6', 'USER-62165225b5f18', '2022-03-17 15:13:30', '2022-03-19 22:57:47'),
(23, 'INAKTIF-6236015407ee1', 'KLASIFIKASI-621b033317fec', 'Usulan Kenaikan Gaji Berkala a.n. Matta Tyas Kaesti, S.Si', '2022-03-01', '2026-08-01', 'PERKEMBANGAN-621a3f0a4fc76', 5, 'SATUAN-621a381ab550c', 'Tekstual Baik', '5.1', 'Bappeda Kudus', '2028-08-01', 'RETENSI-62179e83ec6e5', 'KATEGORI-621709dedb052', 'USER-6236003a3a002', '2022-03-19 23:14:12', '2022-03-19 23:14:12'),
(26, 'INAKTIF-6239d6255f826', 'KLASIFIKASI-6239cc0c6f646', 'Pelayanan Kearsipan Dinas Pelayanan Publik Kudus', '2022-03-22', '2025-12-22', 'PERKEMBANGAN-62178b36aa1d6', 2, 'SATUAN-621a3824e2ada', 'Tekstual Baik', '1.2', 'Bappeda Kudus', '2027-12-22', 'RETENSI-62182320075b2', 'KATEGORI-621709dedb052', 'USER-3b25235d', '2022-03-22 20:59:01', '2022-03-22 21:00:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori_arsip`
--

CREATE TABLE `tbl_kategori_arsip` (
  `id` int(11) NOT NULL,
  `id_kategori_arsip` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori_arsip`
--

INSERT INTO `tbl_kategori_arsip` (`id`, `id_kategori_arsip`, `kategori`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 'KATEGORI-62170519c89f6', 'Rahasia', 'USER-62165225b5f18', '2022-02-24 11:10:01', '2022-02-24 11:30:00'),
(3, 'KATEGORI-621709dedb052', 'Biasa', 'USER-62165225b5f18', '2022-02-24 11:30:22', '2022-02-24 11:30:22'),
(9, 'KATEGORI-6239c78001d2e', 'Umum', 'USER-3b25235d', '2022-03-22 19:56:32', '2022-03-22 19:56:32'),
(14, 'KATEGORI-6239d42617d1e', 'Super', 'USER-3b25235d', '2022-03-22 20:50:30', '2022-03-22 20:50:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_klasifikasi`
--

CREATE TABLE `tbl_klasifikasi` (
  `id` int(11) NOT NULL,
  `id_klasifikasi` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama_klasifikasi` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_klasifikasi`
--

INSERT INTO `tbl_klasifikasi` (`id`, `id_klasifikasi`, `kode`, `nama_klasifikasi`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 'KLASIFIKASI-6217106a8c29b', '822', 'Anggaran', 'USER-62165225b5f18', '2022-02-24 11:58:18', '2022-02-24 11:58:18'),
(5, 'KLASIFIKASI-62172f646e2b1', '821', 'Tata Negara', 'USER-62165225b5f18', '2022-02-24 14:10:28', '2022-02-24 14:15:04'),
(6, 'KLASIFIKASI-621b033317fec', '821.1', 'Administrasi', 'USER-62165225b5f18', '2022-02-27 11:50:59', '2022-02-27 11:50:59'),
(9, 'KLASIFIKASI-6239cc0c6f646', '865', 'Umum', 'USER-3b25235d', '2022-03-22 20:15:56', '2022-03-22 20:15:56'),
(14, 'KLASIFIKASI-6239d49b929e5', '876', 'Pancasila', 'USER-3b25235d', '2022-03-22 20:52:27', '2022-03-22 20:52:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id` int(11) NOT NULL,
  `id_log` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_log`
--

INSERT INTO `tbl_log` (`id`, `id_log`, `id_user`, `session_id`, `ip_address`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 'LOG-6236a46c0dba1', 'USER-62165225b5f18', '8abhjs2tokmbmnv1gs4n8hdhj4u37lpr', '::1', '2022-03-20 10:50:04', '2022-03-20 10:52:02', '2022-03-20 10:52:02'),
(13, 'LOG-6236a4f27c6aa', 'USER-62165225b5f18', 'g5j4bsocle3b5knlco9jmjtphl31bj8g', '::1', '2022-03-20 10:52:18', '2022-03-20 10:52:24', '2022-03-20 10:52:24'),
(14, 'LOG-6236a4fe66422', 'USER-6236003a3a002', 'ker7d9jh26vlcsq5bc0c1lmr9cb0prbg', '::1', '2022-03-20 10:52:30', '2022-03-20 10:52:38', '2022-03-20 10:52:38'),
(15, 'LOG-6236a50c3a94b', 'USER-62360069e7beb', 'nq6elsthl1actv0ln1lhhjl54orq5dcd', '::1', '2022-03-20 10:52:44', '2022-03-20 10:52:51', '2022-03-20 10:52:51'),
(16, 'LOG-6236a52e13368', 'USER-62165225b5f18', 'f0424idq959scsc70ffe7c863r8akm63', '::1', '2022-03-20 10:53:18', '2022-03-20 10:53:27', '2022-03-20 10:53:27'),
(17, 'LOG-6236a5767eccf', 'USER-62165225b5f18', '9pq3bc9tm0btohk5c00d8cqjbmom89i7', '::1', '2022-03-20 10:54:30', '2022-03-20 10:54:59', '2022-03-20 10:54:59'),
(18, 'LOG-6236a59dbe8f1', 'USER-62165225b5f18', 'pfcgv0pa3rqg1nd0m0s2khu9kqha0723', '::1', '2022-03-20 10:55:09', '2022-03-20 10:55:14', '2022-03-20 10:55:14'),
(19, 'LOG-6236a5dbc454c', 'USER-62165225b5f18', '3rh08ftf6p7otnhevm9k8ik5cqapfrnq', '::1', '2022-03-20 10:56:11', '2022-03-20 10:56:23', '2022-03-20 10:56:23'),
(20, 'LOG-6236a64d02f0a', 'USER-62165225b5f18', '44vtprc0l2s1t64sb34rm18rbv734ccj', '::1', '2022-03-20 10:58:05', '2022-03-20 10:58:13', '2022-03-20 10:58:13'),
(21, 'LOG-6236a674b75ef', 'USER-62165225b5f18', 'as4aqpj04idvc8c9beg0ojji570s4hpg', '::1', '2022-03-20 10:58:44', '2022-03-20 10:58:54', '2022-03-20 10:58:54'),
(22, 'LOG-6236ac6385a88', 'USER-62165225b5f18', 'u5t7p2suk5gu56qgmqvq3gkj87usd7gl', '::1', '2022-03-20 11:24:03', '2022-03-20 11:24:33', '2022-03-20 11:24:33'),
(23, 'LOG-6236acca8b901', 'USER-6236acb546733', 'u5t7p2suk5gu56qgmqvq3gkj87usd7gl', '::1', '2022-03-20 11:25:46', '2022-03-20 11:26:03', '2022-03-20 11:26:03'),
(24, 'LOG-6236b010dafc3', 'USER-6236afe662ee7', 'dkla9obrovjhlj498c8ljudiudv1p7ro', '::1', '2022-03-20 11:39:44', '2022-03-20 11:39:52', '2022-03-20 11:39:52'),
(25, 'LOG-623733cb0c964', 'USER-62165225b5f18', 'oauluji522hf619f7dr38il0qvdbo33m', '::1', '2022-03-20 21:01:47', '2022-03-20 22:09:44', '2022-03-20 22:09:44'),
(26, 'LOG-623743c02c7a7', 'USER-62165225b5f18', '8g5i9od3bjbo8f0nhrcs46tsouv41scs', '::1', '2022-03-20 22:09:52', '2022-03-20 22:36:01', '2022-03-20 22:36:01'),
(27, 'LOG-623749ed8db4d', 'USER-62165225b5f18', 'gmebqg76drrsltk58pb8ljfroihko2ru', '::1', '2022-03-20 22:36:13', '2022-03-21 09:03:58', '2022-03-21 09:03:58'),
(28, 'LOG-6237d49d047eb', 'USER-62165225b5f18', '2m37ncfn6k3ph1vbj5vmeu14sm11pi19', '::1', '2022-03-21 08:27:57', '2022-03-21 09:05:18', '2022-03-21 09:05:18'),
(29, 'LOG-6237dd5908c04', 'USER-62165225b5f18', '9ferkn6vnqd3fn2oejddek873tavnn7p', '::1', '2022-03-21 09:05:13', '2022-03-21 09:05:13', NULL),
(30, 'LOG-6237e36af2613', 'USER-3b25235d', 'ci1fakoivpna9l5l7dobcu6dpqh3pd88', '::1', '2022-03-21 09:31:06', '2022-03-21 11:11:56', '2022-03-21 11:11:56'),
(31, 'LOG-6237fb2a8accf', 'USER-3b25235d', '9rmpl52d4pm9tc0p3jpdo8hs05k58lvk', '::1', '2022-03-21 11:12:26', '2022-03-21 11:12:29', '2022-03-21 11:12:29'),
(32, 'LOG-62382d007ca74', 'USER-3b25235d', '17civc6m0rpmea2c3ephujbdinai3j18', '::1', '2022-03-21 14:45:04', '2022-03-21 14:45:07', '2022-03-21 14:45:07'),
(33, 'LOG-6239c72d54f83', 'USER-3b25235d', 'f28g8vlfl04voj1djgrlj412iu56klfe', '::1', '2022-03-22 19:55:09', '2022-03-22 19:58:56', '2022-03-22 19:58:56'),
(34, 'LOG-6239c8b8d3436', 'USER-3b25235d', 'o7np7hcc3rqc7upjo928ktfc64b5cv6o', '::1', '2022-03-22 20:01:44', '2022-03-22 20:07:43', '2022-03-22 20:07:43'),
(35, 'LOG-6239ca35c8e49', 'USER-3b25235d', 'hpv7siu8igqgp919h9ma6du18nctdptl', '::1', '2022-03-22 20:08:05', '2022-03-22 20:13:41', '2022-03-22 20:13:41'),
(36, 'LOG-6239cbaa6fbe6', 'USER-3b25235d', '61gmrnb3ciusvtnd8apo2769e4o7iiv4', '::1', '2022-03-22 20:14:18', '2022-03-22 20:24:57', '2022-03-22 20:24:57'),
(37, 'LOG-6239d3ddc3522', 'USER-3b25235d', 'r8k4sfa8hq6j0k404gvd8vbk8g6t3mib', '::1', '2022-03-22 20:49:17', '2022-03-22 20:49:47', '2022-03-22 20:49:47'),
(38, 'LOG-6239d40333580', 'USER-3b25235d', '6e47espb8khiuh8hl4tnv1j84vlmri92', '::1', '2022-03-22 20:49:55', '2022-03-22 21:01:53', '2022-03-22 21:01:53'),
(39, 'LOG-6239d6de76ed0', 'USER-3b25235d', 'qqki5cci37sltnvgkcalitqdcn0vac7g', '::1', '2022-03-22 21:02:06', '2022-03-22 21:02:06', '2022-03-22 21:02:06'),
(40, 'LOG-6239d6df1491a', 'USER-3b25235d', '', '::1', '2022-03-22 21:02:07', '2022-03-22 21:02:16', '2022-03-22 21:02:16'),
(41, 'LOG-6239d6e472330', 'USER-3b25235d', 'ufff9jkfgkdn63a3udff134l7t119tqh', '::1', '2022-03-22 21:02:12', '2022-03-22 21:02:55', '2022-03-22 21:02:55'),
(42, 'LOG-6239d6fe1cd57', 'USER-3b25235d', 'fi7j3a5a9h2ivkge0ru0t33have99133', '::1', '2022-03-22 21:02:38', '2022-03-22 21:03:23', '2022-03-22 21:03:23'),
(43, 'LOG-6239d72994f85', 'USER-3b25235d', 's9niv1rctdm5aab1vkm3bngq93hr6vjd', '::1', '2022-03-22 21:03:21', '2022-03-22 21:03:37', '2022-03-22 21:03:37'),
(44, 'LOG-6239d737292a2', 'USER-3b25235d', '85sqmqc4c07p0q3c7ngrc5p29v29hhrg', '::1', '2022-03-22 21:03:35', '2022-03-22 21:03:53', '2022-03-22 21:03:53'),
(45, 'LOG-6239d7468773c', 'USER-3b25235d', 'obuch5pr54ud0c0vui47cc5pd939qva1', '::1', '2022-03-22 21:03:50', '2022-03-22 21:04:04', '2022-03-22 21:04:04'),
(46, 'LOG-6239d75267e17', 'USER-3b25235d', 'u366u4pro873m878476im40nguabfgt6', '::1', '2022-03-22 21:04:02', '2022-03-22 21:04:02', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_perkembangan`
--

CREATE TABLE `tbl_perkembangan` (
  `id` int(11) NOT NULL,
  `id_perkembangan` varchar(255) NOT NULL,
  `nama_perkembangan` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_perkembangan`
--

INSERT INTO `tbl_perkembangan` (`id`, `id_perkembangan`, `nama_perkembangan`, `id_user`, `created_at`, `updated_at`) VALUES
(5, 'PERKEMBANGAN-62178b36aa1d6', 'Asli', 'USER-62165225b5f18', '2022-02-24 20:42:14', '2022-02-27 11:53:14'),
(7, 'PERKEMBANGAN-621a3f0a4fc76', 'Fotocopy', 'USER-62165225b5f18', '2022-02-26 21:54:02', '2022-02-26 21:54:02'),
(8, 'PERKEMBANGAN-621a3f105ce70', 'Fotocopy / Asli', 'USER-62165225b5f18', '2022-02-26 21:54:08', '2022-02-26 21:54:08'),
(10, 'PERKEMBANGAN-6239cc2f3fe14', 'Fax', 'USER-3b25235d', '2022-03-22 20:16:31', '2022-03-22 20:16:31'),
(12, 'PERKEMBANGAN-6239d4dd5040b', 'Scan', 'USER-3b25235d', '2022-03-22 20:53:33', '2022-03-22 20:53:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_retensi`
--

CREATE TABLE `tbl_retensi` (
  `id` int(11) NOT NULL,
  `id_retensi` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tahun_aksi` int(11) NOT NULL,
  `keterangan_aksi` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_retensi`
--

INSERT INTO `tbl_retensi` (`id`, `id_retensi`, `judul`, `tahun_aksi`, `keterangan_aksi`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'RETENSI-62179e83ec6e5', 'RAPBD', 3, 'Dipermanenkan', 'USER-62165225b5f18', '2022-02-24 22:04:35', '2022-03-15 07:52:39'),
(4, 'RETENSI-6217a19048ae4', 'RAPBD-P', 10, 'Dipermanenkan', 'USER-62165225b5f18', '2022-02-24 22:17:36', '2022-03-14 14:10:51'),
(5, 'RETENSI-62182320075b2', 'RKA PD-P', 10, 'Dinilai Kembali', 'USER-62165225b5f18', '2022-02-25 07:30:24', '2022-02-25 07:30:34'),
(8, 'RETENSI-6239d552a4071', 'DPA-D', 10, 'Permanen', 'USER-3b25235d', '2022-03-22 20:55:30', '2022-03-22 20:55:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `id` int(11) NOT NULL,
  `id_satuan` varchar(255) NOT NULL,
  `nama_satuan` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`id`, `id_satuan`, `nama_satuan`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'SATUAN-621a381ab550c', 'Lembar', 'USER-62165225b5f18', '2022-02-26 21:24:26', '2022-02-26 21:24:26'),
(2, 'SATUAN-621a3824e2ada', 'Berkas', 'USER-62165225b5f18', '2022-02-26 21:24:36', '2022-02-26 21:24:36'),
(3, 'SATUAN-621a38301471a', 'Lembar / Berkas', 'USER-62165225b5f18', '2022-02-26 21:24:48', '2022-02-26 21:24:48'),
(8, 'SATUAN-6239d5b10e700', 'Jilid', 'USER-3b25235d', '2022-03-22 20:57:05', '2022-03-22 20:57:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bidang` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `id_user`, `nama`, `username`, `password`, `bidang`, `level`, `created_at`, `updated_at`) VALUES
(2, 'USER-62165225b5f18', 'Rinaldi Hendrawan', 'rinaldi2007', '$2y$10$duJpn8kfGgNkkOeI5mBtsO0OWyNNpo6tNqq0WdIskmYVL91GtWnFS', 'Litbang', 1, '2022-02-23 22:26:29', '2022-02-23 22:26:29'),
(3, 'USER-6236003a3a002', 'Shaka Rizky Ramadhan', 'shaka76', '$2y$10$QQsg1W0oOGitiP7J86QV2uJFDMbCCl03v5U6xovYcelL3cbvpJkXi', 'Sekretariat', 1, '2022-03-19 23:09:30', '2022-03-19 23:09:30'),
(4, 'USER-62360069e7beb', 'Radhitya Bagas Andrizza', 'bagas34', '$2y$10$A2Gt3SKT8uW/Bhtatgbc2uNvNZluGclJU.TvHYkiyweKicAaviCrO', 'PEP', 1, '2022-03-19 23:10:18', '2022-03-19 23:10:18'),
(5, 'USER-6236acb546733', 'Jono Prasasta', 'jono12', '$2y$10$EgHApqxf./vR6visGEwTFuWK6KXbEjKVCzbJFmo6VPa.b.hXDryxG', 'Sekretariat', 1, '2022-03-20 11:25:25', '2022-03-20 11:25:25'),
(6, 'USER-6236afe662ee7', 'Cinthia Farida', 'faridac20', '$2y$10$9VwPi1oFWt43eU1IpCsgr.EnRJYKNjs0kLBLHBOp4GlzHxe8/7D4i', 'Litbang', 1, '2022-03-20 11:39:02', '2022-03-20 11:39:02'),
(7, 'USER-3b25235d', 'Super Admin Arsip', 'DNSBAPPEDA21', '$2y$10$I4A1f8GFihJOaeJwDJt8su0ibgKXvQ3uzdLendS8glaDCcExSrsP.', 'Kearsipan', 1, '2022-03-21 09:18:34', '2022-03-22 21:01:50');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_arsip_inaktif`
--
ALTER TABLE `tbl_arsip_inaktif`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_arsip_inaktif_unique` (`id_arsip_inaktif`),
  ADD KEY `fk_id_klasifikasi` (`id_klasifikasi`),
  ADD KEY `fk_id_perkembangan` (`id_perkembangan`),
  ADD KEY `fk_id_satuan` (`id_satuan`),
  ADD KEY `fk_id_retensi` (`id_retensi`),
  ADD KEY `fk_kategori_arsip` (`id_kategori_arsip`),
  ADD KEY `fk_id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_kategori_arsip`
--
ALTER TABLE `tbl_kategori_arsip`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_kategori_arsip_unique` (`id_kategori_arsip`),
  ADD KEY `fk_id_user_dua` (`id_user`);

--
-- Indeks untuk tabel `tbl_klasifikasi`
--
ALTER TABLE `tbl_klasifikasi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_klasifikasi` (`id_klasifikasi`),
  ADD KEY `fk_id_user_tiga` (`id_user`);

--
-- Indeks untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_key_unique` (`id_log`),
  ADD KEY `fk_id_user_tujuh` (`id_user`);

--
-- Indeks untuk tabel `tbl_perkembangan`
--
ALTER TABLE `tbl_perkembangan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_perkembangan_unique` (`id_perkembangan`),
  ADD KEY `fk_id_user_empat` (`id_user`);

--
-- Indeks untuk tabel `tbl_retensi`
--
ALTER TABLE `tbl_retensi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_retensi_unique` (`id_retensi`),
  ADD KEY `fk_id_user_lima` (`id_user`);

--
-- Indeks untuk tabel `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_satuan_unique` (`id_satuan`),
  ADD KEY `fk_id_user_enam` (`id_user`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user_unique` (`id_user`),
  ADD UNIQUE KEY `username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_arsip_inaktif`
--
ALTER TABLE `tbl_arsip_inaktif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori_arsip`
--
ALTER TABLE `tbl_kategori_arsip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_klasifikasi`
--
ALTER TABLE `tbl_klasifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tbl_perkembangan`
--
ALTER TABLE `tbl_perkembangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_retensi`
--
ALTER TABLE `tbl_retensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_arsip_inaktif`
--
ALTER TABLE `tbl_arsip_inaktif`
  ADD CONSTRAINT `fk_id_klasifikasi` FOREIGN KEY (`id_klasifikasi`) REFERENCES `tbl_klasifikasi` (`id_klasifikasi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_perkembangan` FOREIGN KEY (`id_perkembangan`) REFERENCES `tbl_perkembangan` (`id_perkembangan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_retensi` FOREIGN KEY (`id_retensi`) REFERENCES `tbl_retensi` (`id_retensi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_satuan` FOREIGN KEY (`id_satuan`) REFERENCES `tbl_satuan` (`id_satuan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kategori_arsip` FOREIGN KEY (`id_kategori_arsip`) REFERENCES `tbl_kategori_arsip` (`id_kategori_arsip`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_kategori_arsip`
--
ALTER TABLE `tbl_kategori_arsip`
  ADD CONSTRAINT `fk_id_user_dua` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tbl_klasifikasi`
--
ALTER TABLE `tbl_klasifikasi`
  ADD CONSTRAINT `fk_id_user_tiga` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD CONSTRAINT `fk_id_user_tujuh` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_perkembangan`
--
ALTER TABLE `tbl_perkembangan`
  ADD CONSTRAINT `fk_id_user_empat` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_retensi`
--
ALTER TABLE `tbl_retensi`
  ADD CONSTRAINT `fk_id_user_lima` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tbl_satuan`
--
ALTER TABLE `tbl_satuan`
  ADD CONSTRAINT `fk_id_user_enam` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
