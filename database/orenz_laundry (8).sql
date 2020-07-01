-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2020 pada 15.58
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orenz_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(15) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `alamat` tinytext DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `no_telp` varchar(14) DEFAULT NULL,
  `logo` varchar(40) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat`, `no_hp`, `no_telp`, `logo`, `username`, `password`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('ADM000000000001', 'Administrator', 'Perumahan Mastrip Blok G-21, Krajan Barat, Sumbersari, Kec. Sumbersari, Kabupaten Jember, Jawa Timur', '082335949731', '', 'logoorenz.png', 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL, '2020-04-24 03:26:57', 'admin', '2020-07-01 19:14:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(15) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('BRG000000000001', '-----', 'Draft', NULL, '2020-04-21 13:59:00', 'admin', '2020-06-19 18:20:02'),
('BRG000000000002', 'Selimut/Sprei Kecil', 'Aktif', NULL, '2020-04-21 13:59:19', 'admin', '2020-06-25 14:51:46'),
('BRG000000000005', 'Selimut/Sprei Sedang', 'Aktif', 'admin', '2020-06-25 14:51:35', NULL, NULL),
('BRG000000000006', 'Selimut/Sprei Besar', 'Aktif', 'admin', '2020-06-25 14:52:12', 'admin', '2020-06-25 14:52:18'),
('BRG000000000007', 'Boneka Kecil', 'Aktif', 'admin', '2020-06-25 14:52:33', NULL, NULL),
('BRG000000000008', 'Boneka Sedang', 'Aktif', 'admin', '2020-06-25 14:52:47', NULL, NULL),
('BRG000000000009', 'Boneka Besar', 'Aktif', 'admin', '2020-06-25 14:52:59', NULL, NULL),
('BRG000000000010', 'Tas Ransel', 'Aktif', 'admin', '2020-06-25 14:53:16', NULL, NULL),
('BRG000000000011', 'Bed Cover Kecil', 'Aktif', 'admin', '2020-06-25 14:53:37', NULL, NULL),
('BRG000000000012', 'Bed Cover Sedang', 'Aktif', 'admin', '2020-06-25 14:53:55', NULL, NULL),
('BRG000000000013', 'Bed Cover Besar', 'Aktif', 'admin', '2020-06-25 14:54:07', NULL, NULL),
('BRG000000000014', 'Bantal Guling', 'Aktif', 'admin', '2020-06-25 14:54:23', NULL, NULL),
('BRG000000000015', 'Karpet', 'Aktif', 'admin', '2020-06-25 16:06:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_paket` varchar(15) NOT NULL,
  `id_transaksi` varchar(15) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `berat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_paket`, `id_transaksi`, `sub_total`, `berat`) VALUES
('PKT000000000001', 'TRS000000000001', 35000, 7),
('PKT000000000001', 'TRS000000000004', 10000, 2),
('PKT000000000002', 'TRS000000000005', 8000, 2.6),
('PKT000000000001', 'TRS000000000007', 50000, 10),
('PKT000000000014', 'TRS000000000002', 17000, 2.665),
('PKT000000000004', 'TRS000000000002', 25000, 2.3),
('PKT000000000010', 'TRS000000000003', 20000, 2),
('PKT000000000001', 'TRS000000000003', 35000, 7),
('PKT000000000015', 'TRS000000000005', 56000, 4),
('PKT000000000013', 'TRS000000000006', 37500, 2.5),
('PKT000000000001', 'TRS000000000008', 35000, 7),
('PKT000000000001', 'TRS000000000009', 24350, 4.87),
('PKT000000000017', 'TRS000000000010', 18000, 2),
('PKT000000000022', 'TRS000000000010', 6000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `durasi_paket`
--

CREATE TABLE `durasi_paket` (
  `id_durasi` varchar(15) NOT NULL,
  `durasi_paket` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `durasi_paket`
--

INSERT INTO `durasi_paket` (`id_durasi`, `durasi_paket`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('DRS000000000001', '3 Hari', 'Aktif', NULL, '2020-04-29 20:30:32', NULL, '2020-04-29 20:30:32'),
('DRS000000000002', '2 Hari', 'Aktif', NULL, '2020-04-29 20:30:58', 'admin', '2020-06-25 14:10:28'),
('DRS000000000003', '1 Hari', 'Aktif', NULL, '2020-04-29 20:31:25', NULL, '2020-04-29 20:31:25'),
('DRS000000000004', '1/2 Hari', 'Aktif', NULL, '2020-04-29 20:36:33', NULL, '2020-04-29 20:36:33'),
('DRS000000000005', 'Xpress', 'Aktif', 'admin', '2020-06-25 15:05:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi_paket`
--

CREATE TABLE `isi_paket` (
  `id_isi_paket` varchar(15) NOT NULL,
  `nama_isi_paket` varchar(50) NOT NULL,
  `keterangan` tinytext NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `isi_paket`
--

INSERT INTO `isi_paket` (`id_isi_paket`, `nama_isi_paket`, `keterangan`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('IPT000000000001', 'Cuci Kering Setrika (CKS)', 'Cuci kering pakaian beserta setrika di lakukan selama 3 hari', 'Aktif', NULL, '2020-04-29 20:00:37', NULL, '2020-04-29 20:00:37'),
('IPT000000000002', 'Cuci Kering (CK)', 'Cuci kering pakaian tanpa setrika dilakukan selama 3 hari', 'Aktif', NULL, '2020-04-29 20:01:35', NULL, '2020-04-29 20:01:35'),
('IPT000000000003', 'Setrika (S)', 'Setrika pakaian yang telah dicuci dilakukan selama 3 hari', 'Aktif', NULL, '2020-04-29 20:02:45', NULL, '2020-04-29 20:02:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_paket`
--

CREATE TABLE `jenis_paket` (
  `id_jenis_paket` varchar(15) NOT NULL,
  `nama_jenis_paket` varchar(50) NOT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_paket`
--

INSERT INTO `jenis_paket` (`id_jenis_paket`, `nama_jenis_paket`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('JPK000000000001', 'Reguler', 'admin', '2020-04-29 20:22:32', NULL, '2020-04-29 20:22:32'),
('JPK000000000002', 'Ekspress', 'admin', '2020-04-29 20:24:38', NULL, '2020-04-29 20:24:38'),
('JPK000000000003', 'Satuan', 'admin', '2020-04-29 20:24:50', NULL, '2020-04-29 20:24:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(15) NOT NULL,
  `id_barang` varchar(15) NOT NULL,
  `id_jenis_paket` varchar(15) NOT NULL,
  `id_isi_paket` varchar(15) NOT NULL,
  `id_durasi` varchar(15) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `gambar` varchar(40) DEFAULT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `id_barang`, `id_jenis_paket`, `id_isi_paket`, `id_durasi`, `nama_paket`, `harga`, `status`, `gambar`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('PKT000000000001', 'BRG000000000001', 'JPK000000000001', 'IPT000000000001', 'DRS000000000001', 'Reguler CKS 3 Hari', 5000, 'Aktif', NULL, NULL, '2020-04-29 20:42:14', NULL, '2020-04-29 20:42:14'),
('PKT000000000002', 'BRG000000000002', 'JPK000000000001', 'IPT000000000002', 'DRS000000000001', 'Reguler CK 3 Hari', 4000, 'Aktif', NULL, NULL, '2020-04-29 20:42:46', NULL, '2020-04-29 20:42:46'),
('PKT000000000003', 'BRG000000000001', 'JPK000000000001', 'IPT000000000003', 'DRS000000000001', 'Reguler S 3 Hari', 4000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000004', 'BRG000000000001', 'JPK000000000002', 'IPT000000000001', 'DRS000000000002', 'Express CKS 2 Hari', 6000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000005', 'BRG000000000001', 'JPK000000000002', 'IPT000000000002', 'DRS000000000002', 'Express CK 2 Hari', 5000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000006', 'BRG000000000001', 'JPK000000000002', 'IPT000000000003', 'DRS000000000002', 'Express S 2 Hari', 5000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000007', 'BRG000000000001', 'JPK000000000002', 'IPT000000000001', 'DRS000000000003', 'Express CKS 1 Hari (24 jam)', 8000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000008', 'BRG000000000001', 'JPK000000000002', 'IPT000000000002', 'DRS000000000003', 'Express CK 1 Hari (24 jam)', 7000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000009', 'BRG000000000001', 'JPK000000000002', 'IPT000000000003', 'DRS000000000003', 'Express S 1 Hari (24 jam)', 7000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000010', 'BRG000000000001', 'JPK000000000002', 'IPT000000000001', 'DRS000000000004', 'Express CKS 1/2 Hari (12 jam)', 10000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000011', 'BRG000000000001', 'JPK000000000002', 'IPT000000000002', 'DRS000000000004', 'Express CK 1/2 Hari (12 jam)', 9000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000012', 'BRG000000000001', 'JPK000000000002', 'IPT000000000003', 'DRS000000000004', 'Express S 1/2 Hari (12 jam)', 9000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000013', 'BRG000000000001', 'JPK000000000002', 'IPT000000000001', 'DRS000000000005', 'Express Xpress CKS (6 jam)', 15000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000014', 'BRG000000000001', 'JPK000000000002', 'IPT000000000002', 'DRS000000000005', 'Express Xpress CK (6 jam)', 14000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000015', 'BRG000000000001', 'JPK000000000002', 'IPT000000000003', 'DRS000000000005', 'Express Xpress S (6 jam)', 14000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000016', 'BRG000000000002', 'JPK000000000003', 'IPT000000000001', 'DRS000000000002', 'Satuan Selimut/Sprei Kecil', 8000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000017', 'BRG000000000005', 'JPK000000000003', 'IPT000000000001', 'DRS000000000002', 'Satuan Selimut/Sprei Sedang', 9000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000018', 'BRG000000000006', 'JPK000000000003', 'IPT000000000001', 'DRS000000000002', 'Satuan Selimut/Sprei Besar', 10000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000019', 'BRG000000000007', 'JPK000000000003', 'IPT000000000002', 'DRS000000000002', 'Boneka Kecil', 5000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000020', 'BRG000000000008', 'JPK000000000003', 'IPT000000000002', 'DRS000000000002', 'Boneka Sedang', 6000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000021', 'BRG000000000009', 'JPK000000000003', 'IPT000000000002', 'DRS000000000002', 'Boneka Besar', 8000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000022', 'BRG000000000010', 'JPK000000000003', 'IPT000000000002', 'DRS000000000002', 'Tas Ransel', 6000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000023', 'BRG000000000011', 'JPK000000000003', 'IPT000000000001', 'DRS000000000002', 'Bed Cover Kecil', 15000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000024', 'BRG000000000012', 'JPK000000000003', 'IPT000000000001', 'DRS000000000002', 'Bed Cover Sedang', 20000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000025', 'BRG000000000013', 'JPK000000000003', 'IPT000000000001', 'DRS000000000002', 'Bed Cover Besar', 25000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000026', 'BRG000000000014', 'JPK000000000003', 'IPT000000000002', 'DRS000000000002', 'Bantal Guling', 8000, 'Aktif', NULL, NULL, NULL, NULL, NULL),
('PKT000000000027', 'BRG000000000015', 'JPK000000000003', 'IPT000000000002', 'DRS000000000002', 'Karpet', 10000, 'Aktif', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `subjek_pesan` varchar(50) NOT NULL,
  `isi_pesan` text NOT NULL,
  `tanggal_pesan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_user`, `subjek_pesan`, `isi_pesan`, `tanggal_pesan`) VALUES
('PSN000000000001', 'USR000000000002', 'Tidak ada kolom catatan', 'Mohon diperbaiki aplikasi ini karena kami tidak dapat menambahkan catatan kepada transaksi yang dilakukan. Terimakasih', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `id_promo` varchar(15) NOT NULL,
  `judul_promo` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `syarat_ketentuan` text NOT NULL,
  `gambar` varchar(40) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `awal` datetime NOT NULL,
  `akhir` datetime NOT NULL,
  `kode` varchar(50) NOT NULL,
  `status` varchar(25) DEFAULT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`id_promo`, `judul_promo`, `deskripsi`, `syarat_ketentuan`, `gambar`, `jumlah`, `awal`, `akhir`, `kode`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('PRM000000000001', '-----', '-----', '<p>-----</p>\r\n', 'cf97e8e9ad4657768b74bca384451b2b.jpg', 0, '2020-04-21 00:00:00', '2030-07-31 00:00:00', '-----', 'Draft', 'admin', '2020-04-28 10:18:37', 'admin', '2020-06-22 21:57:45'),
('PRM000000000002', 'Promo Grand Opening', 'Promo ini berlaku dalam rangka grand opening orenz laundry.', '<p>1. Promo berlaku selama 18 hari</p>\r\n\r\n<p>2. Promo berlaku untuk paket reguler, ekspres dan satuan</p>\r\n', '83da12ceb6c313422b4a91cddd791e86.png', 15, '2020-03-13 00:00:00', '2020-03-31 00:00:00', 'OPENING2020', 'Aktif', 'admin', '2020-04-28 10:26:30', 'admin', '2020-07-01 19:39:00'),
('PRM000000000003', 'Event Tahun Baru', 'Promo ini berlaku selama natal-tahun baru', '<p>1. Promo berlaku selama 20 hari</p>\r\n\r\n<p>2. Promo berlaku untuk paket reguler, ekspres dan satuan</p>\r\n', '4bf6b40c370b60a75b9d66a6cbe02e02.JPG', 20, '2019-12-25 00:00:00', '2020-01-15 00:00:00', 'TAHUNBARU', 'Aktif', 'admin', '2020-04-28 10:29:01', NULL, '2020-04-28 10:29:01'),
('PRM000000000004', 'Ramadhan Promo 30% Hype', 'Promo ini berlaku selama bulan ramadhan', '<p>1. Promo berlaku selama 20 hari</p>\r\n\r\n<p>2. Promo berlaku untuk paket reguler, ekspres dan satuan</p>', 'cf97e8e9ad4657768b74bca384451b2b.jpg', 20, '2020-06-26 00:00:00', '2020-06-30 00:00:00', 'RAMADHAN1441', 'Aktif', 'admin', '2020-04-28 10:29:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(15) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_promo` varchar(15) DEFAULT NULL,
  `id_admin` varchar(15) NOT NULL,
  `id_waktu` varchar(15) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `tgl_antar` datetime DEFAULT NULL,
  `tgl_jemput` datetime DEFAULT NULL,
  `alamat_jemput` text DEFAULT NULL,
  `alamat_antar` text DEFAULT NULL,
  `status` varchar(25) NOT NULL,
  `catatan` tinytext DEFAULT NULL,
  `notif_admin` varchar(1) NOT NULL DEFAULT '0',
  `notif_user` varchar(1) NOT NULL DEFAULT '0',
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_promo`, `id_admin`, `id_waktu`, `total_harga`, `tgl_transaksi`, `tgl_antar`, `tgl_jemput`, `alamat_jemput`, `alamat_antar`, `status`, `catatan`, `notif_admin`, `notif_user`, `updated_by`, `updated_at`) VALUES
('TRS000000000001', 'USR000000000001', 'PRM000000000001', 'ADM000000000001', 'KRR000000000003', 35000, '2020-05-19 08:18:39', '2020-06-23 00:00:00', '2020-06-20 00:00:00', 'Maesan,-8.024459135247778,113.77731453627348', NULL, '1', NULL, '1', '0', NULL, NULL),
('TRS000000000002', 'USR000000000002', 'PRM000000000001', 'ADM000000000001', 'KRR000000000003', 42000, '2020-06-28 07:11:43', '2020-06-26 00:00:00', '2020-06-26 00:00:00', 'Maesan,-8.030889130467791,113.78238424658775', 'Maesan,-8.030889130467791,113.78238424658775', '1', 'contoh catatan belum diatur', '0', '0', 'USR000000000002', '2020-06-21 15:32:21'),
('TRS000000000003', 'USR000000000002', 'PRM000000000003', 'ADM000000000001', 'KRR000000000002', 55000, '2020-04-23 07:16:11', '2020-06-30 00:00:00', '2020-06-20 00:00:00', 'Madam,37.42521812368733,-122.08263494074343', 'BABABA,37.421031090104215,-122.08666462451218', '4', 'contoh catatan belum diatur', '1', '0', 'USR000000000002', '2020-06-21 15:36:39'),
('TRS000000000004', 'USR000000000003', 'PRM000000000001', 'ADM000000000001', 'KRR000000000003', 10000, '2020-06-24 06:29:44', NULL, '2020-06-24 00:00:00', 'Tidar,-8.172620815442802,113.73409476131202', NULL, '0', '', '1', '0', NULL, NULL),
('TRS000000000005', 'USR000000000004', 'PRM000000000001', 'ADM000000000001', 'KRR000000000003', 64000, '2020-06-23 06:30:50', NULL, '2020-06-24 00:00:00', 'Tidar dua,-8.170256890207073,113.73425301164389', NULL, '3', '', '0', '0', NULL, NULL),
('TRS000000000006', 'USR000000000003', 'PRM000000000001', 'ADM000000000001', 'KRR000000000002', 37500, '2020-06-25 06:34:21', NULL, '2020-06-24 00:00:00', 'Tidar anjay,-8.17197233868004,113.73407632112504', NULL, '0', '', '1', '1', NULL, NULL),
('TRS000000000007', 'USR000000000002', 'PRM000000000001', 'ADM000000000001', 'KRR000000000003', 50000, '2020-06-29 20:45:44', NULL, '2020-06-24 00:00:00', 'tidar,-8.172047341675796,113.73424228280783', NULL, '4', '', '1', '0', NULL, NULL),
('TRS000000000008', 'USR000000000003', 'PRM000000000001', 'ADM000000000001', 'KRR000000000001', 35000, '2020-06-30 20:33:18', '2020-07-01 00:00:00', '2020-06-30 00:00:00', 'Jember,37.42196570422577,-122.08335410803558', 'adoh,37.42198194670425,-122.08399415016176', '6', '', '1', '0', 'USR000000000003', '2020-06-30 20:43:07'),
('TRS000000000009', 'USR000000000007', 'PRM000000000003', 'ADM000000000001', 'KRR000000000001', 19480, '2020-07-01 11:46:07', '2020-07-01 00:00:00', '2020-07-01 00:00:00', 'Jl  Adityawarman,Karangrejo,-8.171300297934058,113.73402535915373', 'perum puri bunga nirwana,-8.171310585973757,113.73446960002184', '5', '', '1', '0', 'USR000000000007', '2020-07-01 11:49:30'),
('TRS000000000010', 'USR000000000008', 'PRM000000000001', 'ADM000000000001', 'KRR000000000003', 24000, '2020-07-01 18:42:06', '2020-07-11 00:00:00', '2020-07-10 00:00:00', 'as,37.421887953296405,-122.08409808576107', 'M,37.42192709504149,-122.08385299891233', '5', '', '1', '0', 'USR000000000008', '2020-07-01 18:47:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(15) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `alamat` tinytext DEFAULT NULL,
  `jenis_kelamin` varchar(12) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `status` varchar(25) NOT NULL DEFAULT '0',
  `saldo` int(11) NOT NULL DEFAULT 0,
  `device_token` varchar(200) DEFAULT NULL,
  `token` varchar(40) DEFAULT NULL,
  `created_by` varchar(15) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(15) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `jenis_kelamin`, `tgl_lahir`, `no_hp`, `email`, `username`, `password`, `photo`, `status`, `saldo`, `device_token`, `token`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
('USR000000000001', 'Adi', 'Sumbersari', 'Laki Laki', '2015-07-13', '089987776890', 'adi123@gmail.com', 'adi', 'adi123', NULL, '1', 0, NULL, '', NULL, '2020-04-29 20:48:23', NULL, '2020-04-29 20:48:23'),
('USR000000000002', 'Primasdika Yunia Putra', 'Maesan', 'Perempuan', '2020-06-25', '083847008485', 'hackjones002@gmail.com', 'prmsdk', '$2y$10$.oDkd9/BJbIVzP3a7h1HtOU2PQWse1vgdgDDKdFN2SDTZRQpRMeW2', 'USR000000000002.jpeg', '0', 0, 'dGVV3eIcS4yUAIoMCVo-8g:APA91bGy3_rDWypyhCZxcKwFRpF2uunYlDkh1UujwiUBxPqPznVCgdF9-StHzXyyEiGw7qurPlxG0oHnh3YT4fYIXUAS68Dm_0_DsONVte4Qc9DnVb3J4k_h0FWTKi7dLChgIWXIv9C-', '5722', NULL, NULL, 'USR000000000002', '2020-06-24 00:08:42'),
('USR000000000003', 'Wildan Aulia Kahfi', '', 'Jenis Kelami', '0000-00-00', '', 'wildanmangli29@gmail.com', NULL, '$2y$10$euDPRaG8k4VTsklPlNSb1urI13uEEOfzM4kPbkgIeR2qaiWoEI/Ea', NULL, '0', 130000, 'eYTbyP-cRsOhGk5FJn1f-W:APA91bGwrcGcg4cpqyXlxHVKzX6okcgKIVM5vH8Jomk7HFtLXFjqNbKsGwqcGsWsaYAxruyZPeGf30G41tdgLdIAH3j0Pzi5AKJGKrzMckK3Y5iat44ZMO03kt0xShk8IA3I049dx2r2', '9439', NULL, NULL, 'USR000000000003', '2020-06-30 20:45:13'),
('USR000000000004', 'Yoga Bayuwandana', NULL, NULL, NULL, NULL, 'agoyjatim@gmail.com', NULL, '$2y$10$.JniyEFMgiT7CztiXw8tE.bZe38kqNqQEdsdqJ3wc9h73XJDpqRUu', NULL, '0', 0, 'fQAxK2z6SJu3hukzvBlQgO:APA91bG1yRczpTMwf9sk2304FJetgOs8blZAW3fyoEnRaZsgrhx7K8WsSw5lFNfQbPY2oSHzfAspprqNUctS1uJh1sA9zvgWARsAi4rUQY4i3mGyr-ATQZ6fzswtYnykzgVMli60fQzB', '1171', NULL, NULL, NULL, NULL),
('USR000000000005', 'Melodynae', NULL, NULL, NULL, NULL, 'melody3@gmail.com', NULL, '$2y$10$/W19z2oRO0fP.c9uw5qu9eC/eiVa5pEiJHkojxuMESicYlRYqceTa', NULL, '0', 0, 'eYTbyP-cRsOhGk5FJn1f-W:APA91bHbpEFd3EBkJrZ1DpJHy3-8kTqhfiBSK--HKErek3yPHAcJcroEw9BT57hC75gtuqK2dmGYKA2Wp3fcQCVMS0lBM7mR2fxrzPUF6pTnnHQc2gTPMKbvfCbNGfM2dpUYc566m6NQ', '7162', NULL, NULL, NULL, NULL),
('USR000000000006', 'Rio Triadi Prasetyo', 'Gg. Kenari no 99 RT 08 RW 01\nMaesan, Bondowoso', 'Laki laki', '1998-06-18', '083847008485', 'hackjones001@gmail.com', 'riotriadi', '$2y$10$dL.vBraDGqnpaSSpEvZ8t.2elKHr/sAObSyp9YMaDEsgp3PzjadZi', 'USR000000000006.jpeg', '1', 0, 'djC2umkDRbyNIm4Cc-qOOT:APA91bHnnkvoCnbuBVhEIDwgkw_oVmx0UGo5H92fRGyMtN430naUwCMLnsppbeLgiWXz1YDaSkaOQoLJa5wMEuMLatykjNAoAmJFX-i3-riJqGx9IvcE3CizUSgGWa1Vd5lR7F7NSSDM', '7219', NULL, NULL, 'USR000000000006', '2020-07-01 11:28:55'),
('USR000000000007', 'Emilia Efatul', 'Patrang Jember', 'Perempuan', '2015-09-06', '089510225377', 'emilialaily12@gmail.com', 'emilia00', '$2y$10$dgQIcVFkYS9T0TQY6drpte0BIklVZVSi84y5XIAF1Du0T4zbdtX7.', NULL, '1', 200000, 'djC2umkDRbyNIm4Cc-qOOT:APA91bHnnkvoCnbuBVhEIDwgkw_oVmx0UGo5H92fRGyMtN430naUwCMLnsppbeLgiWXz1YDaSkaOQoLJa5wMEuMLatykjNAoAmJFX-i3-riJqGx9IvcE3CizUSgGWa1Vd5lR7F7NSSDM', '5923', NULL, NULL, 'USR000000000007', '2020-07-01 11:51:05'),
('USR000000000008', 'Agoy Reborn', 'jemberkadaskfjaksfsafjsakfj', 'Jenis Kelami', '2000-07-25', '0852369521', 'ichayoga1@gmail.com', 'Agoy', '$2y$10$520AoUSMqYKyeNSMkU8G9OhciYUu/J4Z1KfZCvrQboeje9lrXgDiy', NULL, '1', 52000, 'f6TGdLL6ReCqlhjUPo3ZwM:APA91bEBVywG11yuAN1DbxSq6TnEwChcYUjxdmrej5g7N7AmbFs5RQipCQQGJcS3MQ_h8ivdk6QFepmkqr8abQY9Cr2tXFKEG418uQcY8PqofwyPFzXrRSxSt7MmyKyiWEuVU_8hSvc4', '2842', NULL, NULL, 'USR000000000008', '2020-07-01 18:48:35');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vfetchnotif`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vfetchnotif` (
`id_transaksi` varchar(15)
,`tgl_transaksi` datetime
,`nama_user` varchar(50)
,`nama_paket` varchar(50)
,`notif_admin` varchar(1)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vtotalberat`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vtotalberat` (
`total_berat` double
,`id_transaksi` varchar(15)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktujemput`
--

CREATE TABLE `waktujemput` (
  `id` varchar(15) NOT NULL,
  `waktu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `waktujemput`
--

INSERT INTO `waktujemput` (`id`, `waktu`) VALUES
('KRR000000000001', '08:00 - 10:00 WIB'),
('KRR000000000002', '14:00 - 16:00 WIB'),
('KRR000000000003', '18:00 - 20:00 WIB');

-- --------------------------------------------------------

--
-- Struktur untuk view `vfetchnotif`
--
DROP TABLE IF EXISTS `vfetchnotif`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vfetchnotif`  AS  select `transaksi`.`id_transaksi` AS `id_transaksi`,`transaksi`.`tgl_transaksi` AS `tgl_transaksi`,`user`.`nama_user` AS `nama_user`,`paket`.`nama_paket` AS `nama_paket`,`transaksi`.`notif_admin` AS `notif_admin` from (((`transaksi` join `user`) join `paket`) join `detail_transaksi`) where `transaksi`.`id_transaksi` = `detail_transaksi`.`id_transaksi` and `paket`.`id_paket` = `detail_transaksi`.`id_paket` and `transaksi`.`id_user` = `user`.`id_user` group by `transaksi`.`id_transaksi` order by `transaksi`.`tgl_transaksi` desc limit 4 ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vtotalberat`
--
DROP TABLE IF EXISTS `vtotalberat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtotalberat`  AS  select sum(`detail_transaksi`.`berat`) AS `total_berat`,`detail_transaksi`.`id_transaksi` AS `id_transaksi` from `detail_transaksi` group by `detail_transaksi`.`id_transaksi` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `durasi_paket`
--
ALTER TABLE `durasi_paket`
  ADD PRIMARY KEY (`id_durasi`);

--
-- Indeks untuk tabel `isi_paket`
--
ALTER TABLE `isi_paket`
  ADD PRIMARY KEY (`id_isi_paket`);

--
-- Indeks untuk tabel `jenis_paket`
--
ALTER TABLE `jenis_paket`
  ADD PRIMARY KEY (`id_jenis_paket`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_jenis_paket` (`id_jenis_paket`),
  ADD KEY `id_isi_paket` (`id_isi_paket`),
  ADD KEY `id_durasi` (`id_durasi`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_promo` (`id_promo`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `transaksi_ibfk_4` (`id_waktu`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `waktujemput`
--
ALTER TABLE `waktujemput`
  ADD PRIMARY KEY (`id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`);

--
-- Ketidakleluasaan untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `paket_ibfk_1` FOREIGN KEY (`id_isi_paket`) REFERENCES `isi_paket` (`id_isi_paket`),
  ADD CONSTRAINT `paket_ibfk_2` FOREIGN KEY (`id_durasi`) REFERENCES `durasi_paket` (`id_durasi`),
  ADD CONSTRAINT `paket_ibfk_3` FOREIGN KEY (`id_jenis_paket`) REFERENCES `jenis_paket` (`id_jenis_paket`),
  ADD CONSTRAINT `paket_ibfk_4` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_promo`) REFERENCES `promo` (`id_promo`),
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_waktu`) REFERENCES `waktujemput` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
